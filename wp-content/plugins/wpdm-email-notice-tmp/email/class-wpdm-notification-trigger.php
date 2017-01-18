<?php

class WPDM_Notification_Trigger {
	public function __construct( ) {
		add_action('email_notice_event', 'trigger_email_notification_checker');

	}
	
function trigger_email_notification_checker(){
	global $wpdb;

	$email_entries = get_email_entries();

	$users = getUsersByRole('Operator');
    
	$permalink = get_permalink($id);
	$email_recipient = array();
	foreach ($users as $user) {
		echo "<br>user_email : ".$user->user_email;
		echo "<br>operator_group : ".$user->operator_group;
		echo "<br>country_group : ".$user->country_group;
		$files = array();
		if(count($email_entries) > 0){
			foreach ($email_entries as $key => $email_entry) {
				echo "<br><br>Post_id:".$email_entry->post_id;

				$categories_data = array();
				$categories = array();
				$categories_data = get_the_terms($email_entry->post_id,'wpdmcategory');
				foreach ($categories_data as $key => $value) {
					$categories[$key] = $value->term_id;
				}
			    $entertainment_category_id = $this->getCategoryIdBySlug('entertainment');
			    $extreme_category_id = $this->getCategoryIdBySlug('extreme');

				/* Check if show categories includes entertainment or extreme */
				$is_exist_channel = array();
			    $is_exist_channel['entertainment'] = in_array($entertainment_category_id, $categories);
			    $is_exist_channel['extreme'] = in_array($extreme_category_id, $categories);

			    $operator_access = array();
			    $operator_access_channel = array();
			    foreach ($is_exist_channel as $key => $value) {
			    	if($value){
				    	$operator_access_channel[$key] = $this->getOperatorCountryCombinationAccess($key);
				    }
			    }

			    foreach ($operator_access_channel as $key => $value) {
			    	if(isset($operator_access_channel[$key])){
					    foreach ($operator_access_channel[$key] as $key => $value) {
					    	$operator_access[$value['id']] = array(	'operator_group' => $value['operator_group'],
					    											'country_group' => $value['country_group'],
					    											'is_pr_group' => $value['is_pr_group'] );
					    }
					}
			    }
			    // echo "<pre>";
			    // print_r($operator_access);
			    // echo "</pre>";
			    $matched_operator_access = $this->check_user_group_access($user, $operator_access);
			    // echo "<br>matched_operator_access : ".$matched_operator_access;
				if($matched_operator_access){
					echo "<br>matched_operator_access['is_pr_group']:".$matched_operator_access['is_pr_group'];
					$uns_email_entry = unserialize($email_entry->data_new);
					// echo "<br>uns_email_entry : ";
					// echo "<pre>";
					// echo "<br>".$email_entry->data_new;

					// var_dump($email_entry->data_new);
					// var_dump($uns_email_entry);
					// echo "</pre>";	

					$files[$email_entry->post_id]['promo'] = $this->get_user_accessible_promos($user, $uns_email_entry['promos'], $matched_operator_access['is_pr_group']);
					$files[$email_entry->post_id]['show'] = $this->get_user_accessible_files($user, $uns_email_entry['files'], $uns_email_entry['raw_files']['files'], $matched_operator_access['is_pr_group']);

					
				}
			}
		}
		// echo "<br>files : ";
		// echo "<pre>";
		// print_r($files);
		// echo "</pre>";

		if( count($files) > 0 ){
			$email_sent = $this->send_email_notice($user, $files);
			if($email_sent)
				array_push($email_recipient,$user->user_email);
		}
	}
	// echo "<br>count-email_recipient:".count($email_recipient);
	// die('asd');
	if( count($email_recipient) > 0 ){
		$email_recipient_serialized = serialize($email_recipient);
		$return_value_email = setEmailEntryStatus('sent');
		if( $return_value_email === FALSE ){
			addEmailLogs('failed', $email_recipient_serialized);
		}else{
			addEmailLogs('success', $email_recipient_serialized);
		}
	}

}

// if (!function_exists('check_user_group_access')){
	/**
	 * Check if a particular user is included in array of allowed operator and country group combination
	 * @param  Object $user            User
	 * @param  Array $operator_access  Key value pair of allowed operator group and country group combination
	 * @return bool                    Returns 1 if accessible, otherwise 0
	 */
	function check_user_group_access($user, $operator_access){
		$matched_operator_access = array();
		foreach ($operator_access as $key => $value) {
			if 	( 
					(	strtolower($value['operator_group']) == strtolower($user->operator_group)  && 
				 		(strtolower($value['country_group']) == strtolower($user->country_group) || 'all' == strtolower($user->country_group) ) 
				 	)
				) {
				$matched_operator_access['operator_group'] = $value['operator_group'];
				$matched_operator_access['country_group'] = $value['country_group'];
				$matched_operator_access['is_pr_group'] = $value['is_pr_group'];
				return $matched_operator_access;
			}else{
				continue;
			}
		}
		return 0;
	}
// }

// if (!function_exists('get_user_accessible_promos')){
	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */
	function get_user_accessible_promos($user, $promo_files, $is_pr_group = ''){
		$accessible_promo_files = array();

		if (count($promo_files) > 0) {
			foreach ($promo_files as $key => $value) {

				if(  $user->country_group == 'all' && $is_pr_group == 'yes' ||
					 contains($value['operator_access'], $user->operator_group) ||
					 contains($value['operator_access'], 'all' )
					){
                	array_push($accessible_promo_files, $value);

                }else if( $is_pr_group == 'yes'){

                    $sub_operators = get_operators_by_country( $user->country_group );

                    foreach ($sub_operators as $so_key => $sub_op) {
                        if ( contains($value['operator_access'], $sub_op->operator_group ) ){
                        	array_push($accessible_promo_files, $value);
                            break;

                        }
                    }
                }
			}
		}
		return $accessible_promo_files;
	}
// }

// if (!function_exists('get_user_accessible_files')){
	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */
	function get_user_accessible_files($user, $all_files, $raw_files, $is_pr_group = ''){
		$affiliate_files = array();
		$filtered_files = array();
		$filtered_categories = [ 'epg', 'catch' ];

		if (count($raw_files) > 0) {
			foreach ($raw_files as $key => $value) {

				foreach ($filtered_categories as $fc_key => $prefix) {
					if( contains($value, $prefix) ){
		                if(  $user->country_group == 'all' && $is_pr_group == 'yes' ){
		                	continue;
		                }else if( $is_pr_group == 'yes'){

	                        $sub_operators = get_operators_by_country( $user->country_group );

	                        foreach ($sub_operators as $so_key => $sub_op) {
	                            if ( contains($value, $sub_op->operator_group ) ){
	                                $filtered_files['document'][$prefix][$key] = $value;
	                                break;

	                            }else if ( contains($value, 'affiliate' ) ) {
	                                $affiliate_files['document'][$prefix][$key] = $value;
	                    			unset( $all_files['document'][$prefix][$key] );
	                    			break;
	                            }
	                        }
	                        if( count( $filtered_files['document'][$prefix][$key] ) == 0 && count( $affiliate_files['document'][$prefix][$key] ) == 0 ){
	                        	if(isset($all_files['document'][$prefix][$key])) unset($all_files['document'][$prefix][$key]);
	                        }

	                    }else if ( contains($value, $user->operator_group) ){
	                    	$filtered_files['document'][$prefix][$key] = $value;

	                    }else if ( contains($value, 'affiliate' ) ) {
	                        $affiliate_files['document'][$prefix][$key] = $value;
	                    	unset( $all_files['document'][$prefix][$key] );
	          
	                    }
	                    else{
							if(isset($all_files['document'][$prefix][$key])) unset($all_files['document'][$prefix][$key]);
		                }
					}
				}
				
			}
			/* FOR EPG and CATCH UP ONLY */  
			foreach ($filtered_categories as $fc_key => $prefix) {
				if( count($filtered_files['document'][$prefix]) == 0 && count($affiliate_files['document'][$prefix]) > 0 ){
					foreach ( $affiliate_files['document'][$prefix] as $key => $value) {
						$all_files['document'][$prefix][$key] = $value;
					}
				}
			}

		}
		return $all_files;
	}
// }

function getOperatorGroupInEPGFile($file_name = ''){
	$file_name = strtolower($file_name);
	$split_by_epg = explode("epg ",$file_name);
	$split_by_extension = explode(".",$split_by_epg[1]);
	return $split_by_extension[0];
}

function checkEPGAccessibilityViaFilename($user, $operator_access, $filename = '' ){
	foreach ($operator_access as $operator_access_key => $operator_access_item) {
		if( strtolower($operator_access_item['operator_group']) == strtolower(getOperatorGroupInEPGFile($filename)) &&
			strtolower($operator_access_item['country_group']) == strtolower($user->country_group) ){
			return 1;
		}
	}
	return 0;
}


















function send_email_notice($user = null, $files = null){
	$plugin_img_dir = plugins_url().'/wpdm-email-notice/images/';
	$to = $user->user_email;
	// $to = "diannekatherinedelosreyes@gmail.com";
	$subject = 'RTL CBS Asia Notification - New files are available for you today!';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;UTF-8" />
<style type="text/css">
body, table, td {font-family: Helvetica, Arial, sans-serif !important;font-size:12px;text-align: left;line-height:15px;}    
</style>
 </head>
<body >
<table style="height: 617px; background-color: #000;" width="599" cellspacing="0" cellpadding="0">

<tbody>

<tr>
<td valign="center">
<!--<p>&nbsp;</p><p>&nbsp;</p>-->
<img src="'.$plugin_img_dir.'email-banner-black.jpg" alt="RTL CBS Banner" width="599"/>

</td>
</tr>

<tr>
<td valign="top"><center>
<table style="height: 194px; background-color: #F4F3F4;color:#444444;margin-left: auto; margin-right: auto;" width="522">
<tbody>
<tr>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<p>Hi '.$user->user_login.',</p>
<p>&nbsp;</p>
<p>There are new files available for download in the RTL CBS Operator Site.</p>
<p>Please find the updated assets below.</p>
<p>&nbsp;</p>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
';

$operator_site_link = get_home_url();
$email_files_counter = array();
if( count($files) > 0 ):
	$promo_files_control['entertainment'] = 10;
	$promo_files_control['extreme'] = 10;

	foreach ($files as $post_id => $type) :
		$is_channel_material = $this->checkIfChannelMaterials($post_id);

		if( count($type['show']) > 0 ) :
			$show_title = get_the_title($post_id);

			$show_title = $is_channel_material['is_channel_material'] != false ? $is_channel_material['channel'] : $show_title;
			$permalink = get_permalink($post_id).$is_channel_material['channel_switcher'];
			
			$message_temp = '
			<tr style="background-color: #3b3838; color: #fff;">
				<td>'.ucwords($show_title).'</td>
			</tr>';
			foreach ($type['show'] as $category => $prefixes) :
				if(count($prefixes) > 0):
					foreach ($prefixes as $prefix => $file_list) :
						if( count($file_list) > 0 ) :
						$message_temp .= '
							<tr style="background-color: #d0cece;">
								<td >'.$this->getCategoryNameByPrefix($prefix).'</td>
							</tr>';
							$file_counter = 1;
							foreach ($file_list as $file_id => $file_name) :
								$email_files_counter[$is_channel_material['channel']]++;
								if( $file_counter <= 10 ) :
									$message_temp .='
										<tr>
											<td style="line-height: 25px;"><a title="'.$file_name.'" href="'.$permalink.'" target="_blank">'.$file_name.'</a></td>
										</tr>
									';
								else :
									$message_temp .='
										<tr>
											<td style="line-height: 25px;"><a title="'.$show_title.'" href="'.$permalink.'" target="_blank">Click here to view more</a></td>
										</tr>
									';
									break;
								endif;
								$file_counter++;
							endforeach;
						endif;
					endforeach;
				endif;

				if( $is_channel_material['channel'] == 'entertainment' ){
					if( $is_channel_material['is_channel_material'] ){
						$message_entertainment['channel'] .= $message_temp;
					}else{
						$message_entertainment['shows'] .= $message_temp;
					}
				}else if( $is_channel_material['channel'] == 'extreme' ){
					if( $is_channel_material['is_channel_material'] ){
						$message_extreme['channel'] .= $message_temp;

					}else{
						$message_extreme['shows'] .= $message_temp;
					}
				}
				$message_temp = '';
			endforeach;
		endif;
		
		if( $promo_files_control[ $is_channel_material['channel'] ] > 0 ){
			if( count($type['promo']) > 0 ) :
				$promo_counter = $promo_files_control[ $is_channel_material['channel'] ];
				$is_break = false;
				foreach ($type['promo'] as $key => $promo_info) :
					$email_files_counter[$is_channel_material['channel']]++;
					$permalink = $operator_site_link.'/promos/'.$is_channel_material['channel_switcher'];
					if( $promo_counter > 0 ) :
						$message_temp = '
							<tr>
								<td style="line-height: 25px;"><a title="'.$promo_info['file_name'].'" href="'.$permalink.'" target="_blank">'.$promo_info['file_name'].'</a></td>
							</tr>
							';
					else :
						$message_temp = '
							<tr>
								<td style="line-height: 25px;"><a title="'.$is_channel_material['channel_switcher'].' Promos" href="'.$permalink.'" target="_blank">Click here to view more</a></td>
							</tr>
						';
						$is_break = true;
					endif;
					$promo_counter--;

					if( $is_channel_material['channel'] == 'entertainment' ){
						$message_entertainment['promos'] .= $message_temp;
					}else if( $is_channel_material['channel'] == 'extreme' ){
						$message_extreme['promos'] .= $message_temp;
					}
					$message_temp = '';
					if( $is_break ){
						break;
					}
				endforeach;
				$promo_files_control[ $is_channel_material['channel'] ] = $promo_counter;
			endif;
		}
	endforeach;
endif;

if( isset($message_entertainment) && $email_files_counter['entertainment'] > 0  ):
	$message .= '<p style="color:#db302f" ><b>ENTERTAINMENT</b></p>';
	/* SHOWS SECTION */
	if( isset($message_entertainment['shows']) ):
	$message .= '
	<p><strong>Show Assets</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>';
	$message .= $message_entertainment['shows'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF SHOWS SECTION */

	/* CHANNEL SECTION */
	if( isset($message_entertainment['channel']) ):
	$message .= '
	<p><strong>Channel Materials</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>';
	$message .= $message_entertainment['channel'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF CHANNEL SECTION */

	/* PROMOS SECTION */
	if( isset($message_entertainment['promos']) ):
	$message .= '
	<p><strong>Promos</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>
	<tr style="background-color: #d0cece;"> <td style="text-align: left;">On-Air/Social</td> </tr>';
	$message .= $message_entertainment['promos'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF PROMOS SECTION */
endif;

if( isset($message_extreme) && $email_files_counter['extreme'] > 0 ):
	$message .= '<p style="color:#db302f;margin-top: 30px;" ><b>EXTREME</b></p>';
	/* SHOWS SECTION */
	if( isset($message_extreme['shows'])) :
	$message .= '
	<p><strong>Show Assets</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>';
	$message .= $message_extreme['shows'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF SHOWS SECTION */

	/* CHANNEL SECTION */
	if( isset($message_extreme['channel']) ):
	$message .= '
	<p><strong>Channel Materials</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>';
	$message .= $message_extreme['channel'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF CHANNEL SECTION */

	/* PROMOS SECTION */
	if( isset($message_extreme['promos']) ):
	$message .= '
	<p><strong>Promos</strong></p>
	<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
	<tbody>
	<tr style="background-color: #d0cece;"> <td style="text-align: left;">On-Air/Social</td> </tr>';
	$message .= $message_extreme['promos'];
	$message .= '
	</tbody>
	</table>';
	endif;
	/* END OF PROMOS SECTION */
endif;

$message .= '
<p>&nbsp;</p>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<p>To view and download the files, log on to the&nbsp;<a title="Operator Site" href="'.$operator_site_link.'" target="_blank">Operator Site</a>.</p>
<p>&nbsp;</p>
<p>Thanks,</p>
<p><strong>RTL CBS</strong></p>
<p>&nbsp;</p>
</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>

</center></td>
</tr>
<tr>
<td><center><img src="'.$plugin_img_dir.'rtl-logo-plain.png" alt="RTL CBS Logo" /></center>

<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
 </body></html>
	';
	
	if( $email_files_counter['entertainment'] > 0 ||  $email_files_counter['extreme'] > 0 ){
		/* Uncomment this group of code if you want to debug */
		// echo $message;
		// return true;
		/* END Uncomment this group of code if you want to debug */
		
		/* Start output buffering to grab smtp debugging output*/
		ob_start();

		/* Send the test mail*/
		$result = wp_mail($to,$subject,$message,$headers);
			
		/* Grab the smtp debugging output*/
		$smtp_debug = ob_get_clean();
		
		/* Output the response*/
		return $result;
	}
	return false;
}


function getCategoryNameByPrefix($prefix = null){
	$categories = array(
			'key' => 'Key Art',
			'epi' => 'Episodic Stills',
			'gallery' => 'Gallery',
			'logo' => 'Logos',
			'oth' => 'Others',
			'elements' => 'Elements',

			'synopsis' => 'Synopses',
			'transcript' => 'Transcripts/EPK',
			'fact' => 'Fact Sheet/Press Pack',
			'font' => 'Fonts',
			'doth' => 'Others',

			'epg' => 'EPG',
			'highlights' => 'Highlights',
			'brand' => 'Brand Guide',
			'boiler' => 'Boiler Plates',
			'catch' => 'Catch Up',

			'promo' => 'Promos'
		);

	if( isset($categories[$prefix]) ) 
		return $categories[$prefix];
	else 
		return '';
}

function checkIfChannelMaterials($post_id = null){
	if( $post_id != null ){
		$categories_data = get_the_terms($post_id,'wpdmcategory');
		$channel = array();
		foreach ($categories_data as $key => $value) {
			if(contains($value->slug, 'channel')){
				$channel = explode("-",$value->slug);
				if( in_array('extreme', $channel) ){
					return array( 'is_channel_material' => true, 'channel' => 'extreme', 'channel_switcher' => '?channel=extreme');
				}else{
					return array( 'is_channel_material' => true, 'channel' => 'entertainment', 'channel_switcher' => '?channel=entertainment');
				}
			}else if(contains($value->slug, 'extreme')){
				return array( 'is_channel_material' => false, 'channel' => 'extreme', 'channel_switcher' => '?channel=extreme');
			}else{
				return array( 'is_channel_material' => false, 'channel' => 'entertainment', 'channel_switcher' => '?channel=entertainment');
			}
		}
	}
	return false;
}

function setEmailEntryStatus($status = 'pending'){
	global $wpdb;
	$return_value = false;
	if($status == 'sent'){
		$return_value = $wpdb->update(
			                            $wpdb->wpdm_email,
			                            array(
			                                'status' => 'sent',
			                                'date_emailed' => current_time('mysql', false),
			                                'created_at' => current_time('mysql', false)
			                            ),
			                            array(
			                            	'status' => 'pending'
			                            )
			                        );
	}
	return $return_value;
}

function addEmailLogs($status = '', $recipient = ''){
	global $wpdb;
	$return_value = $wpdb->insert(
			                            $wpdb->wpdm_email_logs,
			                            array(
			                            	'status' => $status,
			                            	'recipient' => $recipient,
			                                'created_at' => current_time('mysql', false)
			                            )
			                        );
	
	return $return_value;
}

/* Database Queries */
// if(!function_exists('getCategoryIdBySlug')){
	function getCategoryIdBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = '{$slug}'");
		return $category_id;
	}
// }

// if(!function_exists('getPostBySlug')){
	function getPostBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$args = array( 'category_name' => $slug );
		$posts = get_posts( $args );
		return $posts;
	}
// }

// if (!function_exists('getOperatorCountryCombinationAccess')) {
	function getOperatorCountryCombinationAccess($channel = 'entertainment'){
		global $wpdb;
		$operator_access = $wpdb->get_results("SELECT id, operator_group, country_group, is_pr_group FROM $wpdb->operator_access WHERE meta_access LIKE '%{$channel}%'", ARRAY_A);
		return $operator_access;
	}
// }

}
