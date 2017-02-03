<?php

if ( ! class_exists( 'WPDM_Notification_Trigger' ) ) {
class WPDM_Notification_Trigger {

	public function __construct( ) {
	}
	
	function trigger_email_notification_checker(){
		global $wpdb;

		$email_entries = get_email_entries();

		$users = getUsersByRole('Operator');
	    
		$permalink = get_permalink($id);
		$email_recipient = array();
		foreach ($users as $user) {
			echo '<pre><br><br>';
			/*echo $user->user_email . '<br>';
			echo $user->country_group . '<br>';
			echo $user->operator_group . '<br><br>';*/
			
			$show_files_raw = $user->show_files;
			$show_files = $show_files_raw != '' ? explode(",",$show_files_raw) : array();
			/*echo "Shows:<br>";
			print_r($show_files);*/
			
			$channel_materials_raw = $user->channel_materials;
			$channel_materials = $channel_materials_raw != '' ? explode(",",$channel_materials_raw) : array();
			/*echo "Channel Materials:<br>";
			print_r($channel_materials);*/
			
			$show_files = !empty($show_files) || !empty($channel_materials) ? array_merge($show_files, $channel_materials) : $show_files;
			/*echo "Accessible Files:<br>";
			print_r($show_files);
			echo '</pre>';*/

			$files = array();
			if( !empty($email_entries) ){
				foreach ($email_entries as $key => $email_entry) {
					/*echo '<pre>';
					print_r($email_entries);
					echo '</pre>';*/
					$post_ids = array();
					$post_ids[] = $email_entry->post_id;

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

				    $matched_operator_access = $this->check_user_group_access($user, $operator_access);
					if($matched_operator_access){
						$uns_email_entry = unserialize($email_entry->data_new);
						$files[$email_entry->post_id]['promo'] = $this->get_user_accessible_promos($user, $uns_email_entry['promos'], $matched_operator_access['is_pr_group'],$show_files,
							$post_ids);
						$files[$email_entry->post_id]['show'] = $this->get_user_accessible_files($user, $uns_email_entry['files'], $uns_email_entry['raw_files']['files'], $matched_operator_access['is_pr_group'],
							$uns_email_entry['raw_files']['file_info'],
							$show_files);
					}
				}
			}

			if( !empty($files) ){
				$email_sent = $this->send_email_notice($user, $files);
				if($email_sent)
					array_push($email_recipient,$user->user_email);
			}
		}                

		/* Code to update wpdm_email and wpdm_email_logs table. */
		if( count($email_recipient) > 0 ){
			$email_recipient_serialized = serialize($email_recipient);
			$return_value_email = $this->setEmailEntryStatus('sent');

			if( $return_value_email === FALSE ){
				$this->addEmailLogs('failed', $email_recipient_serialized);
			}else{
				$this->addEmailLogs('success', $email_recipient_serialized);
			}
		}
		/* END -  Code to update wpdm_email and wpdm_email_logs table. */
	}

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

	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */

	function get_user_accessible_promos($user, $promo_files, $is_pr_group = '', $show_files = array(), $post_ids = array()) {
		$accessible_promo_files = array();

		if ( in_array('promo', $show_files) || in_array('cm_promo', $show_files) || empty($show_files) ) {
			if (!empty($promo_files)) {
				foreach ($post_ids as $post_id) {
					$is_channel_material = checkIfChannelMaterials($post_id);

					foreach ( $promo_files as $key => $value ) {
						// Check post if channel material
						if ( $is_channel_material['is_channel_material'] == true && in_array('cm_promo', $show_files) ) {
							$accessible_promo_files = $this->add_promo_file($user, $is_pr_group, $value);
						} else if ( $is_channel_material['is_channel_material'] == false && in_array('promo', $show_files) || empty($show_files)) {
							$accessible_promo_files = $this->add_promo_file($user, $is_pr_group, $value);
						}
					}	
				}
			}
		}
		return $accessible_promo_files;
	}

	function add_promo_file($user, $is_pr_group = '', $value) {
		$accessible_promo_files = array();

		if (  $user->country_group == 'all' && $is_pr_group == 'yes' ||
			contains($value['operator_access'], $user->operator_group) ||
			contains($value['operator_access'], 'all' )
			) {
        	array_push($accessible_promo_files, $value);

        } else if( $is_pr_group == 'yes'){

            $sub_operators = get_operators_by_country( $user->country_group );

            foreach ($sub_operators as $so_key => $sub_op) {
                if ( contains($value['operator_access'], $sub_op->operator_group ) ){
                	array_push($accessible_promo_files, $value);
                    break;
                }
            }
        }
        return $accessible_promo_files;
	}

	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */
	function get_user_accessible_files($user, $all_files, $raw_files, $is_pr_group = '', $file_info = array(), $show_files = array()){
		$affiliate_files = array();
		$filtered_files = array();
		$filtered_categories = [ 'epg', 'catch' ];
		$file_types = [ 'image', 'document' ];

		if( !empty($show_files) ) {
			foreach( $file_types as $file_type ) {
				if (isset($all_files[$file_type])) {
					foreach( $all_files[$file_type] as $key => $value ) {
						if ( !in_array($key, $show_files) ) {
							unset( $all_files[$file_type][$key] );
						}
					}
				}
			}
		}
			
		if ( !empty($raw_files) ) {
			foreach ($raw_files as $key => $value) {
				$file_title = $file_info[$key]['title'];

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
	                        if( empty( $filtered_files['document'][$prefix][$key] ) && empty( $affiliate_files['document'][$prefix][$key] ) ){
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

				/* FOR EPG and CATCH UP ONLY */  
				foreach ($filtered_categories as $fc_key => $prefix) {
					if( empty($filtered_files['document'][$prefix]) && !empty($affiliate_files['document'][$prefix]) ){
						foreach ( $affiliate_files['document'][$prefix] as $key => $value) {
							$all_files['document'][$prefix][$key] = $value;
						}
					}
				}

			}
		}

		return $all_files;
	}

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
		$to = $user->user_email;
		// $to = "diannekatherinedelosreyes@gmail.com";
		$subject = 'RTL CBS Asia Notification - New files are available for you today!';
		$headers = array('Content-Type: text/html; charset=UTF-8');

		$operator_site_link = get_home_url();
		$plugin_img_dir = plugins_url().'/wpdm-email-notice/images/';

		$email_vars['user_email'] = $user->user_email;
		$email_vars['email_banner'] = $plugin_img_dir.'email-banner-black.jpg';
		$email_vars['email_logo'] = $plugin_img_dir.'rtl-logo-plain.png';
		$email_vars['operator_link'] = $operator_site_link;

		$email_files_counter = array();
		if( count($files) > 0 ):
			$promo_files_control['entertainment'] = 10;
			$promo_files_control['extreme'] = 10;

			foreach ($files as $post_id => $type) :
				$is_channel_material = checkIfChannelMaterials($post_id);
				$file_checker = 0;

				if( count($type['show']) > 0 ) :
					$show_title = get_the_title($post_id);

					$show_title = $is_channel_material['is_channel_material'] != false ? $is_channel_material['channel'] : $show_title;
					$permalink = get_permalink($post_id).$is_channel_material['channel_switcher'];
					
					$show_title_temp = '
					<tr style="background-color: #3b3838; color: #fff;"> <td>'.ucwords($show_title).'</td> </tr>';
					foreach ($type['show'] as $category => $prefixes) :
						if(count($prefixes) > 0):
							foreach ($prefixes as $prefix => $file_list) :
								$file_checker++;
								if( count($file_list) > 0 ) :
								$message_temp .= '
									<tr style="background-color: #d0cece;"> <td >'.get_file_prefixes('',$prefix).'</td> </tr>';
									$file_counter = 1;
									foreach ($file_list as $file_id => $file_name) :
										$email_files_counter[$is_channel_material['channel']]++;
										if( $file_counter <= 10 ) :
											$message_temp .='
												<tr> <td style="line-height: 25px;"><a title="'.$file_name.'" href="'.$permalink.'" target="_blank">'.$file_name.'</a></td> </tr>';
										else :
											$message_temp .='
												<tr> <td style="line-height: 25px;"><a title="'.$show_title.'" href="'.$permalink.'" target="_blank">Click here to view more</a></td> </tr> ';
											break;
										endif;
										$file_counter++;
									endforeach;
								endif;
							endforeach;
						endif;

						if( $is_channel_material['channel'] == 'entertainment' ){
							if( $is_channel_material['is_channel_material'] ){
								$message_entertainment_tmp['channel'] .= $message_temp;
							}else{
								$message_entertainment_tmp['shows'] .= $message_temp;
							}
						}else if( $is_channel_material['channel'] == 'extreme' ){
							if( $is_channel_material['is_channel_material'] ){
								$message_extreme_tmp['channel'] .= $message_temp;

							}else{
								$message_extreme_tmp['shows'] .= $message_temp;
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
									<tr> <td style="line-height: 25px;"><a title="'.$promo_info['file_name'].'" href="'.$permalink.'" target="_blank">'.$promo_info['file_name'].'</a></td> </tr> ';
							else :
								$message_temp = '
									<tr> <td style="line-height: 25px;"><a title="'.$is_channel_material['channel_switcher'].' Promos" href="'.$permalink.'" target="_blank">Click here to view more</a></td> </tr>
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

				if( $file_checker > 0 ){
					if( $is_channel_material['channel'] == 'entertainment' ){
						if( $is_channel_material['is_channel_material'] ){
							$message_entertainment['channel'] .= $show_title_temp . $message_entertainment_tmp['channel'];
						}else{
							$message_entertainment['shows'] .= $show_title_temp . $message_entertainment_tmp['shows'];
						}
					}else if( $is_channel_material['channel'] == 'extreme' ){
						if( $is_channel_material['is_channel_material'] ){
							$message_extreme['channel'] .= $show_title_temp . $message_extreme_tmp['channel'];

						}else{
							$message_extreme['shows'] .= $show_title_temp . $message_extreme_tmp['shows'];
						}
					}
				}

				unset( $message_entertainment_tmp );

			endforeach;
		endif;

		$message_table = '';
		if( isset($message_entertainment) && $email_files_counter['entertainment'] > 0  ):
			$message_table .= '<p style="color:#db302f" ><b>ENTERTAINMENT</b></p>';
			/* SHOWS SECTION */
			if( isset($message_entertainment['shows']) ):
				$message_table .= '
				<p><strong>Show Assets</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>';
				$message_table .= $message_entertainment['shows'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF SHOWS SECTION */

			/* CHANNEL SECTION */
			if( isset($message_entertainment['channel']) ):
				$message_table .= '
				<p><strong>Channel Materials</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>';
				$message_table .= $message_entertainment['channel'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF CHANNEL SECTION */

			/* PROMOS SECTION */
			if( isset($message_entertainment['promos']) ):
				$message_table .= '
				<p><strong>Promos</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>
				<tr style="background-color: #d0cece;"> <td style="text-align: left;">On-Air/Social</td> </tr>';
				$message_table .= $message_entertainment['promos'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF PROMOS SECTION */
		endif;

		if( isset($message_extreme) && $email_files_counter['extreme'] > 0 ):
			$message_table .= '<p style="color:#db302f;margin-top: 30px;" ><b>EXTREME</b></p>';
				/* SHOWS SECTION */
				if( isset($message_extreme['shows'])) :
				$message_table .= '
				<p><strong>Show Assets</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>';
				$message_table .= $message_extreme['shows'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF SHOWS SECTION */

			/* CHANNEL SECTION */
			if( isset($message_extreme['channel']) ):
				$message_table .= '
				<p><strong>Channel Materials</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>';
				$message_table .= $message_extreme['channel'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF CHANNEL SECTION */

			/* PROMOS SECTION */
			if( isset($message_extreme['promos']) ):
				$message_table .= '
				<p><strong>Promos</strong></p>
				<table style="border: 1px solid;" border="0" width="473" cellspacing="0" cellpadding="2">
				<tbody>
				<tr style="background-color: #d0cece;"> <td style="text-align: left;">On-Air/Social</td> </tr>';
				$message_table .= $message_extreme['promos'];
				$message_table .= '
				</tbody>
				</table>';
			endif;
			/* END OF PROMOS SECTION */
		endif;

		$email_vars['file_list'] = $message_table;

		if( $email_files_counter['entertainment'] > 0 ||  $email_files_counter['extreme'] > 0 ){
			$message = $this->update_email_template( $email_vars );

			/* Uncomment this echo code if you are not testing  */
			// echo $message;

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

	/* Start Replacing the shortcodes in the email template */
	function update_email_template( $email_vars = array() ){
		$template_path = plugin_dir_path( dirname( __FILE__ ) )  . 'email/tpls/email-template.php';
		if (file_exists($template_path)) {
			$message = file_get_contents($template_path);
		}
		foreach ($email_vars as $key => $value) {
			if(strpos($message, '['.$key.']')) {
				$message = str_replace('['.$key.']', $value, $message );
			}
		}

		// If option doesn't exist, save default option
		$message = templated_email($message);
		return $message;
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
	function getCategoryIdBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = '{$slug}'");
		return $category_id;
	}

	function getPostBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$args = array( 'category_name' => $slug );
		$posts = get_posts( $args );
		return $posts;
	}

	function getOperatorCountryCombinationAccess($channel = 'entertainment'){
		global $wpdb;
		$operator_access = $wpdb->get_results("SELECT id, operator_group, country_group, is_pr_group FROM $wpdb->operator_access WHERE meta_access LIKE '%{$channel}%'", ARRAY_A);
		return $operator_access;
	}
}

}