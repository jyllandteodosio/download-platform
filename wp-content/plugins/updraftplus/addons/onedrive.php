<?php
/*
UpdraftPlus Addon: onedrive:Microsoft OneDrive Support
Description: Microsoft OneDrive Support
Version: 1.6
Shop: /shop/onedrive/
Include: includes/onedrive
IncludePHP: methods/addon-base.php
RequiresPHP: 5.3.3
Latest Change: 1.12.19
*/

if (!defined('UPDRAFTPLUS_DIR')) die('No direct access allowed');

/*
do_bootstrap($possible_options_array, $connect = true) # Return a WP_Error object if something goes wrong
do_upload($file) # Return true/false
do_listfiles($match)
do_delete($file) - return true/false
do_download($file, $fullpath, $start_offset) - return true/false
do_config_print()
do_credentials_test_parameters() - return an array: keys = required _POST parameters; values = description of each
do_credentials_test($testfile, $posted_settings) - return true/false
do_credentials_test_deletefile($testfile, $posted_settings)
*/

if (!class_exists('UpdraftPlus_RemoteStorage_Addons_Base')) require_once(UPDRAFTPLUS_DIR.'/methods/addon-base.php');

class UpdraftPlus_Addons_RemoteStorage_onedrive extends UpdraftPlus_RemoteStorage_Addons_Base {

	// https://dev.onedrive.com/items/upload_large_files.htm says "Use a fragment size that is a multiple of 320 KB"
	private $chunk_size = 3276800;
	private $the_callback;
	private $the_client_id;

	public function __construct() {
	
		$this->the_client_id = defined('UPDRAFTPLUS_ONEDRIVE_CLIENT_ID') ? UPDRAFTPLUS_ONEDRIVE_CLIENT_ID : '276d9423-7d0c-41be-a3e1-4cdad89dc36f';
		$this->the_callback = defined('UPDRAFTPLUS_ONEDRIVE_CALLBACK_URL') ? UPDRAFTPLUS_ONEDRIVE_CALLBACK_URL : 'https://auth.updraftplus.com/auth/onedrive';
	
		# 3rd parameter: chunking? 4th: Test button?
		parent::__construct('onedrive', 'OneDrive', false, false);
		add_filter('updraft_onedrive_action_auth', array($this, 'action_auth'));
		if (defined('UPDRAFTPLUS_UPLOAD_CHUNKSIZE') && UPDRAFTPLUS_UPLOAD_CHUNKSIZE>0) $this->chunk_size = max(UPDRAFTPLUS_UPLOAD_CHUNKSIZE, 320*1024);
	}
	
	public function do_upload($file, $from) {

		global $updraftplus;
		$opts = $this->get_opts();
		
		$message = "OneDrive did not return the expected data";
		
		if (!function_exists("curl_init") || !function_exists('curl_exec')) {
			$updraftplus->log('The required Curl PHP module is not installed. This upload will abort');
			$updraftplus->log(sprintf(__('The required %s PHP module is not installed - ask your web hosting company to enable it.', 'updraftplus'), 'Curl'), 'error');
			return false;
		}
		
		try {
			$service = $this->bootstrap();
			if (is_wp_error($service)) throw new Exception($service->get_error_message());
			if (!is_object($service)) throw new Exception("OneDrive service error");
		} catch (Exception $e) {
			$message = $e->getMessage().' ('.get_class($e).') (line: '.$e->getLine().', file: '.$e->getFile().')';
			$updraftplus->log("OneDrive service error: ".$message);
			$updraftplus->log($message, 'error');
			return false;
		}
		
		$folder = empty($opts['folder']) ? '' : $opts['folder'];

		$filesize = filesize($from);
		$this->onedrive_file_size = $filesize;

		try {
			//Check if enough storage space in quota
			$quota = $service->fetchQuota();
			
			if (!is_object($quota)) {
			
				$updraftplus->log("OneDrive quota fetching failed; object returned was a: ".gettype($quota));
			
			} else {
			
				$total = $quota->total;
				$available = $quota->remaining;

				if (is_numeric($total) && is_numeric($available)) {
					$used = $total - $available;
					$used_perc = round($used*100/$total, 1);
					$message = sprintf('Your %s quota usage: %s %% used, %s available', 'OneDrive', $used_perc, round($available/1048576, 1).' MB');
				}

				if (isset($available) && $available != -1 && $available < $filesize) {
					$updraftplus->log("File upload expected to fail: file data remaining to upload ($file) size is ".($filesize)." b (overall file size; $filesize b), whereas available quota is only $available b");
					$updraftplus->log(sprintf(__("Account full: your %s account has only %d bytes left, but the file to be uploaded has %d bytes remaining (total size: %d bytes)",'updraftplus'), 'OneDrive', $available, $filesize, $filesize), 'error');
				}
			}
			
		} catch (Exception $e) {
			$message .= " ".get_class($e).": ".$e->getMessage();
		}

		$updraftplus->log($message.'. Upload folder: '.$folder);
		
		// Ensure directory exists
		$pointer = $this->get_pointer($folder, $service);

		// Perhaps it already exists? (if we didn't get the final confirmation)
		try {
			$items = $service->fetchObjects($pointer);
			foreach($items as $item){
				if ($file == $item->getName()) {
					if ($item->getSize() >= $filesize) {
						$updraftplus->log("$file: already uploaded");
						return true;
					} else {
						$updraftplus->log("$file: partially uploaded (".$item->getSize()." < $filesize)");
					}
				}
			}
		} catch (Exception $e) {
			$updraftplus->log($this->description." file check: exception: ($file) (".$e->getMessage().") (line: ".$e->getLine().', file: '.$e->getFile().')');
		}

		try {
			if (false != ($handle = fopen($from, 'rb'))) {
				if ($filesize < $this->chunk_size) {
					$service->createFile($file, $pointer, $handle);
					fclose($handle);
				} else {
					# https://dev.onedrive.com/items/upload_large_files.htm
					$path = $folder ? $folder.'/'.$file : $file;
					
					// This is only used in a corner-case
					$this->onedrive_folder = $folder;
					
					$session_key = "1d_sess_".md5($path);

					$possible_session = $updraftplus->jobdata_get($session_key);
					
					if (is_object($possible_session) && !empty($possible_session->uploadUrl)) {
						$updraftplus->log("OneDrive chunked upload: session appears to be underway/resumable; will attempt resumption");
						$session = $possible_session;
						
						$state = $service->getState();
						
						$upload_status = $service->apiGet($possible_session->uploadUrl.'?access_token=' . urlencode($state->token->data->access_token), array(), true);

						if (!is_object($upload_status) || empty($upload_status->nextExpectedRanges)) {
							// One retry
							$updraftplus->log("Failed to get upload status; making second attempt to request prior to re-starting");
							$upload_status = $service->apiGet($possible_session->uploadUrl.'?access_token=' . urlencode($state->token->data->access_token), array(), true);
						}
						
						if (is_object($upload_status) && !empty($upload_status->nextExpectedRanges)) {
							if (is_array($upload_status->nextExpectedRanges)) {
								$next_expected = $upload_status->nextExpectedRanges[0];
							} else {
								$next_expected = $upload_status->nextExpectedRanges;
							}

							if (preg_match('/^(\d+)/', $next_expected, $matches)) {
								$uploaded_size = $matches[1];
								$updraftplus->log("Resuming OneDrive upload session from byte: $uploaded_size (".serialize($upload_status->nextExpectedRanges).")");
							} else {
								$updraftplus->log("Could not parse next expected range: ".serialize($upload_status->nextExpectedRanges));
							}
						} else {
							$clean_state = $state;
							if (is_object($state) && !empty($state->token->data->access_token)) $clean_state->token->data->access_token = substr($state->token->data->access_token, 0, 3).'...';
							$updraftplus->log("Failed to get upload status - will re-start this upload: service_state=".serialize($clean_state).",  upload_status=".serialize($upload_status));
							$updraftplus->jobdata_delete($session_key);
						}
					}

					if (!isset($uploaded_size)) {
						$uploaded_size = 0;
						$session = $service->apiPost("https://api.onedrive.com/v1.0/drive/root:/". urlencode($path).':/upload.createSession');
						if (!is_object($session) || empty($session->uploadUrl)) {
							throw new Exception("Failed to create upload session (".serialize($session).")");
						}
						$updraftplus->jobdata_set($session_key, $session);
					}

					$this->onedrive_session = $session;

					$this->onedrive_uploaded_size = $uploaded_size;

					$ret = $updraftplus->chunked_upload($this, $file, $this->method."://".$folder."/".$file, $this->description, $this->chunk_size, $uploaded_size, false);
					fclose($handle);
					return $ret;
				}
				
			} else {
				throw new Exception("Failed to open file for reading: $from");
			}
		} catch (Exception $e) {
			$updraftplus->log($this->description." upload: error: ($file) (".$e->getMessage().") (line: ".$e->getLine().', file: '.$e->getFile().')');
			return false;
		}
		
		return true;
	}

	// Return: boolean
	public function chunked_upload($file, $fp, $chunk_index, $upload_size, $upload_start, $upload_end) {

		// Already done?
		if ($upload_start < $this->onedrive_uploaded_size) return 1;

		global $updraftplus;

		$service = $this->storage;
		
		$headers = array(
			"Content-Length: $upload_size",
			"Content-Range: bytes $upload_start-$upload_end/".$this->onedrive_file_size
		);

		try {
			$put_chunk = $service->apiPut($this->onedrive_session->uploadUrl, $fp, null, $upload_size, $headers, true);
		} catch (Exception $e) {
			$updraftplus->log($this->description." upload: exception (".get_class($e)."): ($file) (".$e->getMessage().") (line: ".$e->getLine().', file: '.$e->getFile().')');
			
			// See HS#6320 and https://github.com/OneDrive/onedrive-api-docs/blob/master/items/upload_large_files.md#handle-commit-errors
			if (false !== strpos($e->getMessage(), 'Optimistic concurrency failure during fragmented upload') && 0 == $this->onedrive_uploaded_size) {
			
				try {
				
					// It can be the case that the item was completely uploaded, but that $this->onedrive_uploaded_size was zero
				
					$already_there_perhaps = $this->do_listfiles($file);
					foreach ($already_there_perhaps as $file_object) {
						// This test is quite conservative - there are other things we could do (if there's ever a need)
						if ($file_object['name'] == $file && !empty($file_object['size']) && $file_object['size'] > $this->onedrive_uploaded_size) {
							$this->onedrive_uploaded_size = $file_object['size'];
							if ($upload_start < $this->onedrive_uploaded_size) {
								$updraftplus->log("More of file ($upload_start) is uploaded than previous API call indicated ");
								return 1;
							}
						}
					}
				
					// Tried this with just $file - which is what the doc suggests - but OneDrive returned an error with: The name in the provided oneDrive.item does not match the name in the URL
					// Update: turned out that OneDrive's error was bogus; the upload was already complete
// 					$name = $this->onedrive_folder ? $this->onedrive_folder.'/'.$file : $file;
					$name = $file;
				
					$put_url = 'https://api.onedrive.com/v1.0/drive/root:/'. urlencode($this->onedrive_folder);
				
					$updraftplus->log("Trying to PUT probably-completed upload to OneDrive: name=$name, PUT to: $put_url");
				
					$commit_body = json_encode(array(
						'name' => $name,
						'description' => null,
						'@name.conflictBehavior' => 'replace',
						'@content.sourceUrl' => $this->onedrive_session->uploadUrl
					));
					
					$commit_headers = array(
						"Content-Type: application/json",
						"Content-Length: ".strlen($commit_body),
					);
					
					$fp = fopen('php://temp', 'rw+b');

					if (!$fp) {
						$updraftplus->log('Trying to PUT probably-completed upload to OneDrive: failed to open php://temp');
						return false;
					}

					fwrite($fp, $commit_body);
					fseek($fp, 0); 
					
					$commit = $service->apiPut($put_url, $fp, null, strlen($commit_body), $commit_headers, true);
				
					if (is_object($commit) && (!empty($commit->expirationDateTime) || !empty($commit->id) || $commit === $empty_object)) {
						$updraftplus->log('Trying to PUT probably-completed upload to OneDrive: success');
						return true;
					}
					$updraftplus->log('Trying to PUT probably-completed upload to OneDrive: appears to have failed ('.gettype($commit).')');
					
				} catch (Exception $e) {
					$updraftplus->log($this->description." upload commit: exception (".get_class($e)."): ($file) (".$e->getMessage().") (line: ".$e->getLine().', file: '.$e->getFile().')');
				}
			
			}
			
			return false;
		}

		$empty_object = new stdClass;

		// It seems we get an empty response object (but success - i.e. no exception thrown above) when a chunk was already previously uploaded
		if (is_object($put_chunk) && (!empty($put_chunk->expirationDateTime) || !empty($put_chunk->id) || $put_chunk === $empty_object)) return true;

		$updraftplus->log("Unexpected response when putting chunk $chunk_index: ".serialize($put_chunk));
		return false;

	}

	private function get_pointer($folder, $service) {
		global $updraftplus;
		
		$pointer = null;
		try {
			$folder_array = explode('/', $folder);
			
			// Check if folder exists
			foreach ($folder_array as $val){
				if ($val == '') break; //If value is root break;
				
				$new_pointer = $pointer;
				
				//Fetch objects in dir
				$dirs = $service->fetchObjects($pointer);
				foreach($dirs as $dir){
					$dirname = $dir->getName();
					if(strtolower($dirname) == strtolower($val) && $dir->isFolder()){
						$new_pointer = $dir->getId();
						break; //This folder exists, we want to select this
					}
				}
				
				//If new_pointer is same, path doesn't exist, so create it
				if($pointer == $new_pointer){
					$newdir = $service->createFolder($val, $pointer);
					$new_pointer = $newdir->getId();
				}
				$pointer = $new_pointer;
				
			}//Should have moved to correct path, and have a pointer to the correct location
			return $pointer;
		} catch (Exception $e) {
			global $updraftplus;
			$updraftplus->log("get_pointer($folder) exception: backup may not go into desired folder: ".$e->getMessage().' ('.get_class($e).') (line: '.$e->getLine().', file: '.$e->getFile().')');
			return $pointer;
		}
	}

	public function do_download($file, $fullpath, $start_offset) {

		global $updraftplus;
		$opts = $this->get_opts();
		
		$message = "OneDrive did not return the expected data";
		
		try {
			$service = $this->bootstrap();
			if (!is_object($service)) throw new Exception('OneDrive service error');
		} catch (Exception $e) {
			$message = $e->getMessage().' ('.get_class($e).') (line: '.$e->getLine().', file: '.$e->getFile().')';
			$updraftplus->log($message);
			$updraftplus->log($message, 'error');
			return false;
		}
		
		$folder = $opts['folder'];
		$pointer = $this->get_pointer($folder, $service);

		$objs = $service->fetchObjects($pointer);
		foreach($objs as $obj){
			$obj_name = $obj->getName();
			if($obj_name == $file && !$obj->isFolder()){
				return $updraftplus->chunked_download($file, $this, $obj->getSize(), true, array($service, $obj));
// 				return $obj->fetchContent();
			}
		}

		$updraftplus->log("$file: ".sprintf("%s download: failed: file not found", 'OneDrive'));
		$updraftplus->log("$file: ".sprintf(__("%s download: failed: file not found", 'updraftplus'), 'OneDrive'), 'error');
		return false;

	}
	
	public function chunked_download($file, $headers, $data) {
		global $updraftplus;
		$service = $data[0];
		$file_obj = $data[1];

		$options = array();

		if (is_array($headers) && !empty($headers['Range']) && preg_match('/bytes=(.*)$/', $headers['Range'], $matches)) {
			$options[CURLOPT_RANGE] = $matches[1];
		}

		return $file_obj->fetchContent($options);

	}

	public function do_delete($file) {
		global $updraftplus;
		$opts = $this->get_opts();
		
		$message = "OneDrive did not return the expected data";
		
		try {
			$service = $this->bootstrap();
		} catch (Exception $e) {
			$service = $e->getMessage().' ('.get_class($e).') (line: '.$e->getLine().', file: '.$e->getFile().')';
		}
		
		if(is_object($service) && !is_wp_error($service)){
			// Get the folder from options
			$folder = $opts['folder'];
			$folder_array = explode('/', $folder);
			
			$pointer = null;
			// Check if folder exists
			foreach($folder_array as $val){
				if($val == '') break; //If value is root break;
				
				$new_pointer = $pointer;
				
				//Fetch objects in dir
				$dirs = $service->fetchObjects($pointer);
				foreach($dirs as $dir){
					$dirname = $dir->getName();
					if($dirname == $val && $dir->isFolder()){
						$new_pointer = $dir->getId();
						break; //This folder exists, we want to select this
					}
				}
				
				//If new_pointer is same, path doesn't exist, so can't delete
				if($pointer == $new_pointer){
					$updraftplus->log("OneDrive folder does not exist");
					return false;
				}
				$pointer = $new_pointer;
				
			} //Should be in the correct folder now
			
			$objs = $service->fetchObjects($pointer);
			foreach($objs as $obj){
				$obj_name = $obj->getName();
				if($obj_name == $file && !$obj->isFolder()){
					$service->deleteObject($obj->getId());
					return true;
				}
			}
			
			$updraftplus->log("OneDrive file does not exist");
			return false;
		}

		if (is_wp_error($service)) {
			$updraftplus->log("OneDrive: service was not available (".$service->get_error_message().")");
			return false;
		}

		$updraftplus->log("OneDrive delete error");
		return false;
	}

	public function do_listfiles($match = 'backup_') {
	
		global $updraftplus;
		$opts = $this->get_opts();
		
		$message = "OneDrive did not return the expected data";
		
		try {
			$service = $this->bootstrap();
			if (!is_object($service)) throw new Exception('OneDrive service error');
		} catch (Exception $e) {
			$service = $e->getMessage().' ('.get_class($e).') (line: '.$e->getLine().', file: '.$e->getFile().')';
			return array();
		}
		
		// https://dev.onedrive.com/items/list.htm
		// OneDrive doesn't (currently - 07-Jul-2016) allow filtering in the request; that has to be done client-side (i.e. here). So, we cache the result (because there are code paths in UD in which we call this multiple times).
		
		static $last_folder = null;
		static $fetched_results = null;
		
		// Get the folder from options
		$folder = $opts['folder'];

		if ($folder != $last_folder || empty($fetched_results)) {
			$pointer = $this->get_pointer($folder, $service);		
			$fetched_results = $service->fetchObjects($pointer);
			$last_folder = $folder;
		}
		
		$results = array();

		foreach($fetched_results as $obj){
			if(!$obj->isFolder()){
				$res = array(
					'name' => $obj->getName(),
					'size' => $obj->getSize()
				);
				if (!$match || 0 === strpos($res['name'], $match)) $results[] = $res;
			}
		}
		
		return $results;
		
	}

	/*Move the remote post to the redirect URL*/
	public function do_bootstrap($opts, $connect = true) {
	
		require_once(UPDRAFTPLUS_DIR.'/includes/onedrive/onedrive.php');

		$opts = $this->get_opts();
		
		$use_master = $this->use_master($opts);
		
		/*
			The redirect URI has been taken out of the below so that it no longer stores within OPTS.  
			This check if this is the master (local call) or Auth call and sets URI's appropriately
		*/
		if($use_master){
			$redirect_uri = $this->the_callback.'?ud_source_url='.urlencode(UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth');
		}else{
			$redirect_uri = UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth';
		}
		
		/*
			To save calls to the AUth server, Checking from the saved details (in $opts) from the last OneDrive call
			and to see if there needs to be a new call or to re-use the values.  This also double Checks to see 
			if the access_token_timeout is set. if this is a new setup, this would never be set and therfore
			initial a first request in order to be saved back to $opts for future calls.
		*/
		if(!isset($opts['access_token_timeout']) || time() > $opts['access_token_timeout']){
			if($use_master){ //use_master app
			
				$client_id = $this->the_client_id;
				$refresh_token = empty($opts['refresh_token']) ? '' : $opts['refresh_token'];
				
				$args = array(
					'code' => 'ud_onedrive_bootstrap',
					'ud_source_url' => UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth',
					'refresh_token' => $refresh_token,
				);
				
				$result = wp_remote_post($this->the_callback, array(
					'timeout' => 60,
					'body' => $args
				));
				
				$body = wp_remote_retrieve_body($result);
				$result_body_json = base64_decode($body);
				$result_body = json_decode($result_body_json);
				
			} else { //using own app	
			
				$client_id = $opts['clientid'];
				
				// Obtain new token using refresh token
				$args = array(
					'timeout' => 60,
					'body' => array(
						'client_id' => $client_id,
						'redirect_uri' => $redirect_uri,
						'client_secret' => $opts['secret'],
						'refresh_token' => empty($opts['refresh_token']) ? '' : $opts['refresh_token'],
						'grant_type' => 'refresh_token'
					)
				);
				
				$result = wp_remote_post('https://login.live.com/oauth20_token.srf', $args);
				
				$body = wp_remote_retrieve_body($result);
				
				$result_body = json_decode($body);
			}
			/*
				Before proceeding, check to make sure no errors returned from OneDrive.
				If no refresh_token returned, disply Errrors
			*/
			if (empty($result_body->refresh_token)) {
				global $updraftplus;
				
				$error_log = "Data: ".json_encode($body);
	
				$error_code = 'no_refresh_token';
				$error_message = sprintf(__('Please re-authorize the connection to your %s account.', 'updraftplus'), 'OneDrive');
				
				if (isset($result_body->error)) {
					$error_code = $result_body->error;
					if (isset($result_body->error_description)) $error_message = $result_body->error_description;
				}
	
				$updraftplus->log("OneDrive: no refresh token found: $error_code - $error_log");
	
				return new WP_Error('no_refresh_token', 'OneDrive: '.sprintf(__('Account is not authorized (%s).', 'updraftplus'), $error_code).' '.$error_message);
			}
			
			/*
				If no errors returned, setup opts values extra details 
				to be saved in $opts for less calls to Auth server
			*/
			
			/*
				Adding the expires_in value returned from OneDrive to the current time to to get the expired time
				If no expires_in value returned, set to current time so it can bypass the IF check on access_token_timeout
			*/
			$opts['access_token_timeout'] = (isset($result_body->expires_in) ? (time()+$result_body->expires_in) : time());
			$opts['access_token'] = $result_body->access_token;
			$opts['expires_in'] = $result_body->expires_in;
		}
		 
		//save details back to $opts
		UpdraftPlus_Options::update_updraft_option('updraft_onedrive', $opts);
		
		//setup array to be sent to oneDrive
		$onedrive_options = array(
			'client_id' => (empty($opts['clientid']) ? $this->the_client_id : $opts['clientid']),
			'state' => (object) array(
				'redirect_uri' => $redirect_uri,
				'token' => (object) array(
					'data' => (object) array(
						'obtained_at' => time(),
						'expires_in' => $opts['expires_in'],
						'access_token' => $opts['access_token']
					)
				)
			),
			'ssl_verify' => true
		);

		if (UpdraftPlus_Options::get_updraft_option('updraft_ssl_disableverify')) $onedrive_options['ssl_verify'] = false;
		if (!UpdraftPlus_Options::get_updraft_option('updraft_ssl_useservercerts')) $onedrive_options['ssl_capath'] = UPDRAFTPLUS_DIR.'/includes/cacert.pem';

		$this->storage = new \Onedrive\Client($onedrive_options);
		
		return $this->storage;
	}
	
	protected function use_master($opts) {
		if((!empty($opts['clientid']) && $opts['clientid'] != $this->the_client_id) || (defined('UPDRAFTPLUS_CUSTOM_ONEDRIVE_APP') && UPDRAFTPLUS_CUSTOM_ONEDRIVE_APP)) return false;
		return true;
	}
	
	protected function options_exist($opts) {
		if ((is_array($opts) && !empty($opts['clientid']) && !empty($opts['secret'])) || ($this->use_master($opts) && !empty($opts['refresh_token']))) return true;
		return false;
	}

	//Is called by the authenticate link and calls auth_request or auth_token
	//Is a multipurpose function for getting request
	public function action_auth() {
		if (isset($_GET['code'])) {
			// Shouldn't need to change this for user_master, as should never arrive here is that is set
			$this->auth_token($_GET['code']);
		} elseif(isset($_GET['state'])) {
				if($_GET['state'] == 'success') {
					add_action('all_admin_notices', array($this, 'show_authed_admin_warning'));
				} else if($_GET['state'] == 'token') {
					// For when master OneDrive app used
					$encoded_token = stripslashes($_GET['token']);
					$token = json_decode($encoded_token);
					
					$opts = $this->get_opts();
					$this->auth_token_stage2($token, $opts);
				}
		} elseif (isset($_GET['updraftplus_onedriveauth'])) {
			// Clear out the existing credentials
			if ('doit' == $_GET['updraftplus_onedriveauth']) {
				$opts = $this->get_opts();
				$opts['refresh_token'] = '';
				UpdraftPlus_Options::update_updraft_option('updraft_onedrive', $opts);
			}
			try {
				$this->auth_request();
			} catch (Exception $e) {
				global $updraftplus;
				$updraftplus->log(sprintf(__("%s error: %s", 'updraftplus'), sprintf(__("%s authentication", 'updraftplus'), 'OneDrive'), $e->getMessage()), 'error');
			}
		}
	}

	public function show_authed_admin_warning() {
		global $updraftplus_admin;

		$opts = $this->get_opts();

		if (empty($opts['refresh_token'])) return;
		//$updraftplus_refresh_token = $opts['refresh_token'];

		$message = '';
		try {
			// Remove existing object
			$this->storage = null;

			$service = $this->bootstrap($opts);

			if (false != $service && !is_wp_error($service)) {

				$quota = $service->fetchQuota();
				$total = $quota->total;
				$available = $quota->remaining;

				if (is_numeric($total) && is_numeric($available)) {
					$used = $total - $available;
					$used_perc = round($used*100/$total, 1);
					$message .= sprintf(__('Your %s quota usage: %s %% used, %s available','updraftplus'), 'OneDrive', $used_perc, round($available/1048576, 1).' MB');
				}

				$account_info = $service->fetchAccountInfo();

				$opts['ownername'] = '';
				if (!empty($account_info->user)) {
					$opts['ownername'] = $account_info->user->displayName;
					$message .= ". <br>".sprintf(__('Your %s account name: %s','updraftplus'),'OneDrive', htmlspecialchars($account_info->user->displayName));
				}
				UpdraftPlus_Options::update_updraft_option('updraft_onedrive', $opts);

			}
		} catch (Exception $e) {
// 			$errs = $e->getErrors();
			$errs = array(array('reason' => $e->getCode(), 'message' => $e->getMessage().' (line: '.$e->getLine().', file: '.$e->getFile().')'));
			$message .= __('However, subsequent access attempts failed:', 'updraftplus');
			if (is_array($errs)) {
				$message .= '<ul style="list-style: disc inside;">';
				foreach ($errs as $err) {
					$message .= '<li>';
					if (!empty($err['reason'])) $message .= '<strong>'.htmlspecialchars($err['reason']).':</strong> ';
					if (!empty($err['message'])) {
						$message .= htmlspecialchars($err['message']);
					} else {
						$message .= htmlspecialchars(serialize($err));
					}
					$message .= '</li>';
				}
				$message .= '</ul>';
			} else {
				$message .= htmlspecialchars(serialize($errs));
			}
		}
		try{
			$updraftplus_admin->show_admin_warning(__('Success', 'updraftplus').': '.sprintf(__('you have authenticated your %s account.', 'updraftplus'), __('OneDrive','updraftplus')).' '.$message);
		} catch (Exception $e) {
			$updraftplus_admin->show_admin_warning($e->getMessage());
		}
	}

	/*
	{
	"profile": {
	"read": true,
	"write": true,
	"email": {
		"read": true
	}
	},
	"inbox": {
	"read": true
	},
	"links": {
	"read": true,
	"write": true
	},
	"filesystem": {
	"read": true,
	"write": true
	}
	}
	*/

	private function get_onedrive_perms() {
		return json_encode(array(
			'profile' => array('read' => true),
			'filesystem' => array('read' => true, 'write' => true)
		));
	}
	
	public function get_opts() {
		global $updraftplus;
		$opts = $updraftplus->get_job_option('updraft_onedrive');
	
		if (!is_array($opts)) $opts = array('clientid' => '', 'secret' => '', 'url' => '');
		
		return $opts;
	}
	
	//Directs users to the login/authentication page
	private function auth_request() {

		require_once(UPDRAFTPLUS_DIR.'/includes/onedrive/onedrive.php');
	
		$opts = $this->get_opts();
		$use_master = $this->use_master($opts);
		
		//Get the client id
		if ($use_master) {
			$client_id = $this->the_client_id;
		} else{
			$client_id = empty($opts['clientid']) ? '' : $opts['clientid'];
		}
		
		//get the callback uri
		//echo UpdraftPlus_Options::admin_page_url();
		
		if (!$use_master) {
			$callback = UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth';
		} else {
			$callback = $this->the_callback.'?ud_source_url='.urlencode(UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth');
		}

		//Because OneDrive doesn't take localhost
		//$callback = "http://localhost.com/newest/wp-admin/options-general.php".'?page=updraftplus&action=updraftmethod-onedrive-auth';
		$scope = array(
			'wl.signin',
			//'wl.basic',
			//'wl.contacts_skydrive',
			//'wl.skydrive_update',
			'wl.offline_access',
			'onedrive.readwrite'
		);
		
		//Instantiate OneDrive client
		$onedrive = new \Onedrive\Client(array('client_id' => $client_id));

		$url = $onedrive->getLogInUrl($scope, $callback);

		if(headers_sent()) {
			global $updraftplus;
			$updraftplus->log(sprintf(__('The %s authentication could not go ahead, because something else on your site is breaking it. Try disabling your other plugins and switching to a default theme. (Specifically, you are looking for the component that sends output (most likely PHP warnings/errors) before the page begins. Turning off any debugging settings may also help).', 'updraftplus'), 'OneDrive'), 'error');
		} else {
			header('Location: '.esc_url_raw($url));
		}
	}
	
	private function auth_token($code) {

		$opts = $this->get_opts();
		$use_master = $this->use_master($opts);

		$secret = (empty($opts['secret'])) ? '' : $opts['secret'];
		
		if($use_master){
			$client_id = $this->the_client_id;
		} else{
			$client_id = (empty($opts['clientid'])) ? '' : $opts['clientid'];
		}
	
		require_once(UPDRAFTPLUS_DIR.'/includes/onedrive/onedrive.php');
		
		if(!$use_master){
			$callback = UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth';
		} else {
			$callback = $this->the_callback.'?ud_source_url='.UpdraftPlus_Options::admin_page_url();
		}
		
		$onedrive = new \Onedrive\Client(array(
			'client_id' => $client_id,
			'state' => (object) array('redirect_uri' => $callback)
		));

		$onedrive->obtainAccessToken($secret, $code);
		$token = $onedrive->getState();

		$this->auth_token_stage2($token, $opts);
	}
	
	//Split off so can be accessed directly when using master UDP OneDrive app
	private function auth_token_stage2($token, $opts){

		if (!empty($token->token->data->refresh_token)) {

			$opts['refresh_token'] = $token->token->data->refresh_token;

			UpdraftPlus_Options::update_updraft_option('updraft_onedrive', $opts);

			header('Location: '.UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth&state=success');
		} else {
			global $updraftplus;
			if (!empty($token->token->data->error)) {
				$updraftplus->log(sprintf(__('%s authorisation failed:', 'updraftplus'), 'OneDrive').' '.$token->token->data->error_description, 'error');
			} else {
				$updraftplus->log(sprintf(__('%s authorisation failed:', 'updraftplus'), 'OneDrive').' '."OneDrive service error: ".serialize($token), 'error');
			}
		}
	}
	
	public function do_config_print($opts) {
		global $updraftplus_admin;
		
		$use_master = $this->use_master($opts);

		$folder = (empty($opts['folder'])) ? '' : untrailingslashit($opts['folder']);
		
		$clientid = (empty($opts['clientid']) || $use_master) ? '' : $opts['clientid'];
		$secret = (empty($opts['secret']) || $use_master) ? '' : $opts['secret'];

		$site_host = parse_url(network_site_url(), PHP_URL_HOST);
		$site_scheme = parse_url(network_site_url(), PHP_URL_SCHEME);

		if ('127.0.0.1' == $site_host || '::1' == $site_host || 'localhost' == $site_host || 'https' != $site_scheme) {
			// Of course, there are other things that are effectively 127.0.0.1. This is just to help.
			$callback_text = '<p><strong>'.htmlspecialchars(sprintf(__('This site uses a URL which is either non-HTTPS, or is localhost or 127.0.0.1 URL. As such, you must use the main %s %s App to authenticate with your account.','updraftplus'),
			'UpdraftPlus', 'OneDrive')).'</strong></p>';
		} else {
			$callback_text = '<p>'.htmlspecialchars(__('You must add the following as the authorised redirect URI in your OneDrive console (under "API Settings") when asked','updraftplus')).': <kbd>'.UpdraftPlus_Options::admin_page_url().'</kbd></p>';
		}

		$header_string = '<img src="'.UPDRAFTPLUS_URL.'/images/onedrive.png">';
		if(!$use_master) { 
			$header_string .= $callback_text.'<p><a href="https://account.live.com/developers/applications/create">'.__('Create OneDrive credentials in your OneDrive developer console.', 'updraftplus').'</a></p><p><a href="https://updraftplus.com/microsoft-onedrive-setup-guide/">'.__('For longer help, including screenshots, follow this link.', 'updraftplus').'</a></p>';
		}
	
		$updraftplus_admin->storagemethod_row(
			'onedrive',
			'',
			$header_string
			);
		?>
		<tr class="updraftplusmethod onedrive">
			<th></th>
			<td><?php $updraftplus_admin->curl_check('OneDrive', true, 'onedrive', true); ?></td>
		</tr>
		<?php if(!$use_master) { ?>
		<tr class="updraftplusmethod onedrive">
			<th><?php echo __('OneDrive','updraftplus').' '.__('Client ID', 'updraftplus'); ?>:</th>
			<td><input type="text" autocomplete="off" style="width:442px" name="updraft_onedrive[clientid]" value="<?php echo esc_attr($clientid) ?>" /><br><em><?php echo htmlspecialchars(__('If OneDrive later shows you the message "unauthorized_client", then you did not enter a valid client ID here.','updraftplus'));?></em></td>
		</tr>
		<tr class="updraftplusmethod onedrive">
			<th><?php echo __('OneDrive','updraftplus').' '.__('Client Secret', 'updraftplus'); ?>:</th>
			<td><input type="<?php echo apply_filters('updraftplus_admin_secret_field_type', 'password'); ?>" style="width:442px" name="updraft_onedrive[secret]" value="<?php echo esc_attr($secret); ?>" /></td>
		</tr>
		<?php
		}
		
		$updraftplus_admin->storagemethod_row(
			'onedrive',
			'OneDrive '.__('Folder', 'updraftplus'),
			'<input title="'.esc_attr(sprintf(__('Enter the path of the %s folder you wish to use here.', 'updraftplus'), 'OneDrive').' '.__('If the folder does not already exist, then it will be created.').' '.sprintf(__('e.g. %s', 'updraftplus'), 'MyBackups/WorkWebsite.').' '.sprintf(__('If you leave it blank, then the backup will be placed in the root of your %s', 'updraftplus'), 'OneDrive account').' '.sprintf(__('N.B. %s is not case-sensitive.', 'updraftplus'), 'OneDrive')).'" type="text" style="width:442px" name="updraft_onedrive[folder]" value="'.esc_attr($folder).'">'
		);

		$updraftplus_admin->storagemethod_row(
			'onedrive', 
			sprintf(__('Authenticate with %s', 'updraftplus'), 'OneDrive').':',
			'<p>'.(!empty($opts['refresh_token']) ? "<strong>".__('(You appear to be already authenticated).', 'updraftplus').'</strong>' : '').
			((!empty($opts['refresh_token']) && !empty($opts['ownername'])) ? ' '.sprintf(__("Account holder's name: %s.", 'updraftplus'), htmlspecialchars($opts['ownername'])).' ' : '').
			'</p><p><a class="updraft_authlink" href="'.UpdraftPlus_Options::admin_page_url().'?page=updraftplus&action=updraftmethod-onedrive-auth&updraftplus_onedriveauth=doit">'.sprintf(__('<strong>After</strong> you have saved your settings (by clicking \'Save Changes\' below), then come back here once and click this link to complete authentication with %s.','updraftplus'), 'OneDrive').'</a></p>'
		);
	}

}

$updraftplus_addons_onedrive = new UpdraftPlus_Addons_RemoteStorage_onedrive;
