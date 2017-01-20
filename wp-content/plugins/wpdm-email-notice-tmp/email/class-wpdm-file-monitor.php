<?php

if ( ! class_exists( 'WPDM_File_Monitor' ) ) {
class WPDM_File_Monitor {

	public function __construct(  ) {
		add_action( 'pre_post_update', array( $this, 'wpdm_check_new_files') );
	}

	function wpdm_check_new_files($post_id){
		/* Code to test email sender trigger */
		require_once plugin_dir_path( dirname( __FILE__ )  ) . 'email/class-wpdm-notification-trigger.php';
		$notification_trigger2 = new WPDM_Notification_Trigger( );
		$notification_trigger2->trigger_email_notification_checker();
		die('fsdfs');
		/* END - Code to test email sender trigger */

		    global $wpdb;
			/* Get current POST data */
		    $post = get_post($id, ARRAY_A);

		    if($post_id != '' || $post_id != null){
		    	$serialized_data_old = '';
		    	$serialized_data_new = '';


		    	/* Check for attached show files */
			    $wpdm_files_old = get_post_meta($post_id, '__wpdm_files', true) != "" ? maybe_unserialize(get_post_meta($post_id, '__wpdm_files', true)) : array(); /* Old values from database */
			    $wpdm_files_new = $_POST['file']['files'] != "" ? $_POST['file']['files'] : array(); /* New values from form */
			    $wpdm_fileinfo_new = $_POST['file']['fileinfo'] != "" ? $_POST['file']['fileinfo'] : array(); /* New values from form */
			    /* Derived Values */
			    $files_diff = array_diff($wpdm_files_new,$wpdm_files_old);	/* Remove extra array at the last index */
			    $fileinfo_intersect = array_intersect_key($wpdm_fileinfo_new, $files_diff);
			    /* END Check for attached show files */

			    /* Check for attached promo files */
			    $wpdm_promos_new_id = array();
			    $wpdm_promos_old_id = array();
			    $wpdm_promos_old = get_field( "add_promo_files" , $promo_id) ? get_field( "add_promo_files" , $post_id) : array(); /* Old values from database */
			    $wpdm_promos_new = $_POST['fields']['field_56bda9692303d'];	/* New values from form */

			    if($wpdm_promos_new!= null) {
			    	array_pop($wpdm_promos_new); /* Remove extra array at the last index  */
				    /* Restructure post data of promo files into key value pair */
				    foreach ($wpdm_promos_new as $key => $value) {
				        $wpdm_promos_new_id[$value['field_56bda9eb23040']] = array(
				        	'file_name' => $value['field_56bdaa2523043'], /* New values from form (key,value) */
			    			'operator_access' => $value['field_56de395d8068d']
			    			);
				    }
				}
				/* END Check for attached promo files */

			    /* Restructure DB data of promo files into key value pair */
			    foreach ($wpdm_promos_old as $key => $value) {
			        $wpdm_promos_old_id[$value['id']] = $value['file_name']; /* Old values from database (key,value) */
			    }
			    $promos_diff=array_diff_key($wpdm_promos_new_id,$wpdm_promos_old_id); /* Check number New Promo files added */

			    $structured_promos_diff = array();
			    foreach($promos_diff as $promo_id => $promo_data){
			    	$structured_promos_diff[$promo_id] = array(
			    			'file_name' => $promo_data['file_name'],
			    			'operator_access' => $promo_data['operator_access']
			    		);
			    }
			    /* END Restructure DB data of promo files into key value pair */

			    /* END Check for attached promo files */
			    $email_entry = get_email_entries($post_id);

			    /* Will evaluate to true if there are newly uploaded files or promos */
			    if(count($files_diff) >= 1 || count($promos_diff) >= 1){
			    	$structured_files_diff = $this->categorized_files($files_diff,$wpdm_fileinfo_new);

			    	/* Will evaluate to true if there are no current email entries for this show today  */
			    	if ( count($email_entry) == 0){
			    		$raw_data_new['raw_files']['files'] = $files_diff;
			    		$raw_data_new['raw_files']['file_info'] = $fileinfo_intersect;

			    		$raw_data_new['files'] = $structured_files_diff;
			    		$raw_data_old['files'] = $wpdm_files_old;

			    		$raw_data_new['promos'] = $structured_promos_diff;
			    		$raw_data_old['promos'] = $wpdm_promos_old_id;

			    		$serialized_data_new = serialize($raw_data_new);
			    		$serialized_data_old = serialize($raw_data_old);

					    $return_value = $wpdb->insert(
					                            $wpdb->wpdm_email,
					                            array(
					                                'data_old' => $serialized_data_old,
					                                'data_new' => $serialized_data_new,
					                                'post_id' => $post_id,
					                                'created_at' => current_time('mysql', false)
					                            )
					                        );
			    	}else{
			    		$raw_email_entry_new = unserialize($email_entry->data_new);

			    		$db_new_files_diff = array_diff($raw_email_entry_new['raw_files']['files'],$wpdm_files_new);
			    		if( count($db_new_files_diff) > 0){
			    			foreach ($db_new_files_diff as $key => $file_name) {
			    				unset($raw_email_entry_new['raw_files']['files'][$key]);
			    				unset($raw_email_entry_new['raw_files']['file_info'][$key]);
			    			}
			    		}
			    		$db_new_promos_diff = array_diff_key($raw_email_entry_new['promos'],$wpdm_promos_new_id);
			    		if( count($db_new_promos_diff) > 0){
			    			foreach ($db_new_promos_diff as $key => $file_name) {
			    				unset($raw_email_entry_new['promos'][$key]);
			    			}
			    		}

			    		
			    		$raw_data_new['raw_files']['files'] = $raw_email_entry_new['raw_files']['files'] + $files_diff;
			    		$raw_data_new['raw_files']['file_info'] = $raw_email_entry_new['raw_files']['file_info'] + $fileinfo_intersect;

			    		$merged_files_diff = $this->categorized_files($files_diff, $wpdm_fileinfo_new, $raw_email_entry_new['raw_files']['files']);
			    		$raw_data_new['files'] = $merged_files_diff;

			    		$raw_data_new['promos'] = $raw_email_entry_new['promos'] + $structured_promos_diff;
			    		$serialized_data_new = serialize($raw_data_new);

			    		$return_value = $wpdb->update( 
				                            $wpdb->wpdm_email, 
				                            array('data_new' =>  $serialized_data_new),
				                            array( 
				                                'id' => $email_entry->id
				                                )
			                        );
			    	}

			    }
			    /* Will evaluate to true if newly uploaded files are deleted */
			    else if ( count($wpdm_files_old) > count($wpdm_files_new) || count($wpdm_promos_old) > count($wpdm_promos_new) ){

			    	/* Will evaluate to true if there are no current email entries for this show today  */
			    	if ( count($email_entry) > 0){
				    	$raw_email_entry_new = unserialize($email_entry->data_new);
				    	$files_diff = array_diff($wpdm_files_old,$wpdm_files_new);	/* Remove extra array at the last index */

					    if( count($files_diff) > 0 ){
					    	foreach ($files_diff as $key => $value) {
					    		if( isset($raw_email_entry_new['raw_files']['files'][$key]) && ($raw_email_entry_new['raw_files']['files'][$key]!=null) ) 
					    			unset($raw_email_entry_new['raw_files']['files'][$key]);

					    		if( isset($raw_email_entry_new['raw_files']['file_info'][$key]) && ($raw_email_entry_new['raw_files']['file_info'][$key]!=null) ) 
					    			unset($raw_email_entry_new['raw_files']['file_info'][$key]);
					    	}

					    	$structured_files_diff = $this->categorized_files($raw_email_entry_new['raw_files']['files'],$raw_email_entry_new['raw_files']['file_info']);
						    $raw_email_entry_new['files'] = $structured_files_diff;
					    }

					    $promos_diff=array_diff_key($wpdm_promos_old_id,$wpdm_promos_new_id); /* Check number New Promo files added */
					    if( count($promos_diff) > 0 ){
					    	foreach ($promos_diff as $key => $value) {
					    		if( isset($raw_email_entry_new['promos'][$key]) && ($raw_email_entry_new['promos'][$key]!=null) ) 
					    			unset($raw_email_entry_new['promos'][$key]);
					    	}
					    }

					    $serialized_data_new = serialize($raw_email_entry_new);
					    $return_value = $wpdb->update( 
					                            $wpdb->wpdm_email, 
					                            array('data_new' =>  $serialized_data_new),
					                            array( 
					                                'id' => $email_entry->id
					                                )
				                        );
				    
					}
			    }
			    /* END Check if there are new files uploaded */

		    }
		}


// if(!function_exists('categorized_files')){
	/**
	 * Categorize a  list of files based on file title prefixes
	 * @param  Array $allfiles_sorted  Key/Value pair of files and their original file name
	 * @param  Array $fileinfo         Key/Value pair of files and their new file title
	 * @return Array                   Categorized array of files
	 */
	function categorized_files($allfiles_sorted, $fileinfo, $other_files = array()){
		$allfiles_sorted = $allfiles_sorted + $other_files;
		$categorized_files = array();
		$file_attr_list = get_file_prefixes('categorized'); 

		if (count($allfiles_sorted) > 0) {
	        foreach ($allfiles_sorted as $fileID => $sfileOriginal) {
	        	$sfile = $sfileOriginal; /* this to make it general */
	        	$fileTitle = $fileinfo[$fileID]['title'];

				if(checkIfImageFile($sfile, 'image')){

			        foreach ($file_attr_list['image'] as $file_type => $file_category) {
			            foreach ($file_category as $file_category_key => $tab) {
			                $prefix = $tab['prefix'];
			                /* SHOW IMAGES ========================================================================== */
			                // KEY
			                if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['image']['show']['key_art']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['show']['key_art']['prefix']][$fileID] = $fileTitle;
			                }
			                // EPI
			                else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['image']['show']['episodic_stills']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['show']['episodic_stills']['prefix']][$fileID] = $fileTitle;
			                }
			                // GAL
			                else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['image']['show']['gallery']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['show']['gallery']['prefix']][$fileID] = $fileTitle;
			                }
			                // LOG
			                else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['image']['show']['logos']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['show']['logos']['prefix']][$fileID] = $fileTitle;
			                }
			                // OTHERS
			                else if( !contains($fileTitle, $file_attr_list['image']['show']['key_art']['prefix']) 
			                    && !contains($fileTitle, $file_attr_list['image']['show']['episodic_stills']['prefix']) 
			                    && !contains($fileTitle, $file_attr_list['image']['show']['gallery']['prefix']) 
			                    && !contains($fileTitle, $file_attr_list['image']['show']['logos']['prefix']) 
			                    && !contains($fileTitle, $file_attr_list['image']['channel']['channel_elements']['prefix']) 
			                    && $prefix == $file_attr_list['image']['show']['others']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['show']['others']['prefix']][$fileID] = $fileTitle;
			                }
			                /* END SHOW IMAGES ======================================================================= */
			                /* CHANNEL IMAGES ======================================================================= */
			                // CM_ELE
			                else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['image']['channel']['channel_elements']['prefix']){
			                    $categorized_files['image'][$file_attr_list['image']['channel']['channel_elements']['prefix']][$fileID] = $fileTitle;
			                }
			            }   
			        }
			    } else{
	                foreach ($file_attr_list['document'] as $file_type => $file_category) {
	                    foreach ($file_category as $file_category_key => $tab) {
	                        $prefix = $tab['prefix'];

	                        // SYN
	                        if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['show']['synopses']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['show']['synopses']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // EPK
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['show']['transcripts']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['show']['transcripts']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // FAC
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['show']['fact_sheet']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['show']['fact_sheet']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // FON
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['show']['fonts']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['show']['fonts']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // CM_EPG
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['channel']['channel_epg']['prefix']){
	                        	$categorized_files['document'][$file_attr_list['document']['channel']['channel_epg']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // CM_HIG
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['channel']['channel_highlights']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['channel']['channel_highlights']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // CM_BRA
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['channel']['channel_brand']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['channel']['channel_brand']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // CM_BOI
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['channel']['channel_boiler']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['channel']['channel_boiler']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // CM_CAT
	                        else if( contains($fileTitle, $prefix) && $prefix == $file_attr_list['document']['channel']['channel_catchup']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['channel']['channel_catchup']['prefix']][$fileID] = $fileTitle;
	                        }
	                        // DOTH
	                        else if( !contains($fileTitle, $file_attr_list['document']['show']['synopses']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['show']['transcripts']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['show']['fact_sheet']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['show']['fonts']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['channel']['channel_epg']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['channel']['channel_highlights']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['channel']['channel_brand']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['channel']['channel_boiler']['prefix']) 
	                            && !contains($fileTitle, $file_attr_list['document']['channel']['channel_catchup']['prefix'])
	                            && $prefix == $file_attr_list['document']['show']['document_others']['prefix']){
	                            $categorized_files['document'][$file_attr_list['document']['show']['document_others']['prefix']][$fileID] = $fileTitle;
	                        }
	                    }
	                }
	            }


			}
		}

		return $categorized_files;
	}

}

}















