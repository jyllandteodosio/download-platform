<?php 
    /*
    Plugin Name: WPDM Email Notice
    Description: Custom email notifier to operator accounts
    Dianne Katherine Delos Reyes
    Version: 1.0
    */
   	
    global $wea_db_version;
	$wea_db_version = '1.0'; /* Increment this version number if there's an update in the database structure */

    /** 
     * Function to create and update wpdm email notifier DB table upon plugin activation
     */
	function wpdm_email_activation() {
		global $wpdb;
		global $wea_db_version;

		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		$db_table_name = $wpdb->prefix . 'wpdm_email';
		$db_table_name_logs = $wpdb->prefix . 'wpdm_email_logs';

		/* Create a table if not yet existing */
		if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
			if ( ! empty( $wpdb->charset ) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty( $wpdb->collate ) )
				$charset_collate .= " COLLATE $wpdb->collate";
	 
			$sql = "CREATE TABLE $db_table_name (
				  id bigint(20) NOT NULL AUTO_INCREMENT,
				  date_emailed datetime DEFAULT '0000-00-00 00:00:00',
				  data_new longtext,
				  data_old longtext,
				  status varchar(55) DEFAULT 'pending',
				  post_id bigint(20),
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY  (id)
				) $charset_collate;

				CREATE TABLE $db_table_name_logs (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  status varchar(100),
				  recipient longtext,
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  PRIMARY KEY  (id)
				) $charset_collate;

				";
			dbDelta( $sql );

			add_option( 'wea_db_version', $wea_db_version );
		}

		/* Update table if there's a new plugin version */
		$installed_ver = get_option( "wea_db_version" );
		if ( $installed_ver != $wea_db_version ) {

			$sql = "CREATE TABLE $db_table_name (
				  id bigint(20) NOT NULL AUTO_INCREMENT,
				  date_emailed datetime DEFAULT '0000-00-00 00:00:00',
				  data_new longtext,
				  data_old longtext,
				  status varchar(55) DEFAULT 'pending',
				  post_id bigint(20),
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY  (id)
				) $charset_collate;

				CREATE TABLE $db_table_name_logs (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  status varchar(100),
				  recipient longtext,
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  PRIMARY KEY  (id)
				) $charset_collate;
				";

			dbDelta( $sql );

			update_option( "wea_db_version", $wea_db_version );
		}
	}
	register_activation_hook(__FILE__, 'wpdm_email_activation');

	/**
	 * Update table if there's a new plugin version
	 */
	function wea_update_db_check() {
	    global $wea_db_version;
	    if ( get_site_option( 'wea_db_version' ) != $wea_db_version ) {
	        wpdm_email_activation();
	    }
	}
	add_action( 'plugins_loaded', 'wea_update_db_check' );


/* Email Notice 
PROMO ROW ID REFERENCE ============================================================
    		[field_56bda97f2303e] => Promo Category
            [field_56bda9b52303f] => Upload Date
            [field_56bda9eb23040] => ID
            [field_57760648a7ca2] => Promo ID
            [field_56bda9fc23041] => Promo Start
            [field_56bdaa1123042] => Promo End
            [field_56bdaa2523043] => File Name
            [field_56bdaa2e23044] => Program Tx
            [field_56bdaa3923045] => Program Title
            [field_56bdaa4d23046] => Version
            [field_56bdaa5723047] => Duration
            [field_56bdaa6223048] => Notes
            [field_56bdaa6e23049] => Attached file
            [field_56cc2f84bbefe] => Thumbnail file
            [field_56de395d8068d] => Operator Group Access (all, singtel etc)
================================================================================= */


global $wpdb;
if (!isset($wpdb->wpdm_email)) {
	$wpdb->wpdm_email = $wpdb->prefix . 'wpdm_email';
}
if (!isset($wpdb->wpdm_email_logs)) {
	$wpdb->wpdm_email_logs = $wpdb->prefix . 'wpdm_email_logs';
}

add_action( 'pre_post_update', 'wpdm_check_new_files' );
function wpdm_check_new_files($post_id)
{
	// trigger_email_notification_checker();

	// send_email_notice();

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
	    /* END Check for attached promo files */
	    $email_entry = get_email_entries($post_id);
	    if(count($files_diff) >= 1 || count($promos_diff) >= 1){
	    	$structured_files_diff = categorized_files($files_diff,$wpdm_fileinfo_new);

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

	    		$merged_files_diff = categorized_files($files_diff, $wpdm_fileinfo_new, $raw_email_entry_new['raw_files']['files']);
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

	    }else if ( count($wpdm_files_old) > count($wpdm_files_new) || count($wpdm_promos_old) > count($wpdm_promos_new) ){
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

			    	$structured_files_diff = categorized_files($raw_email_entry_new['raw_files']['files'],$raw_email_entry_new['raw_files']['file_info']);
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


    }

}

if( !function_exists('get_email_entries') ){
	/**
	 * Get Email Entries by post ID
	 * @param  INT $post_id   Post ID
	 * @return ARRAY          Email entries
	 */
	function get_email_entries($post_id = null){
		global $wpdb;

		$where_post_id = $post_id != null ? " AND post_id = {$post_id} " : '';
		$limit = $post_id != null ? " LIMIT 1 " : '';

		$sql_query = "SELECT id, data_new, post_id FROM $wpdb->wpdm_email WHERE status = 'pending' ".$where_post_id."ORDER BY id DESC ".$limit;

		$email_entries = $post_id != null ? $wpdb->get_results( $sql_query)[0] : $wpdb->get_results( $sql_query);

		// echo "query:".$sql_query;
		return $email_entries;
	}
}

if(!function_exists('categorized_files')){
	/**
	 * Categorize a  list of files based on file title prefixes
	 * @param  Array $allfiles_sorted  Key/Value pair of files and their original file name
	 * @param  Array $fileinfo         Key/Value pair of files and their new file title
	 * @return Array                   Categorized array of files
	 */
	function categorized_files($allfiles_sorted, $fileinfo, $other_files = array()){
		$allfiles_sorted = $allfiles_sorted + $other_files;
		$categorized_files = array();
		$file_attr_list = array(
			                'image' =>  array (
			                    'show'  => array (
			                        'key_art'           => array('prefix' => 'key'          , 'template_shortcode' => 'file_category,key'), 
			                        'episodic_stills'   => array('prefix' => 'epi'          , 'template_shortcode' => 'file_category,epi'), 
			                        'gallery'           => array('prefix' => 'gallery'      , 'template_shortcode' => 'file_category,gal'), 
			                        'logos'             => array('prefix' => 'logo'         , 'template_shortcode' => 'file_category,log'),
			                        'others'            => array('prefix' => 'oth'          , 'template_shortcode' => 'file_category,oth')),
			                    'channel'=> array (
			                        'channel_logos'     => array('prefix' => 'logo'         , 'template_shortcode' => 'file_category,cm_log'), 
			                        'channel_elements'  => array('prefix' => 'elements'     , 'template_shortcode' => 'file_category,cm_ele'), 
			                        'channel_others'    => array('prefix' => 'cm_oth'       , 'template_shortcode' => 'file_category,cm_oth'))
			                    ),
			                'document' => array (
			                    'show'  => array (
			                        'synopses'          => array('prefix' => 'synopsis'     , 'template_shortcode' => 'file_category,syn' ),
			                        'transcripts'       => array('prefix' => 'transcript'        , 'template_shortcode' => 'file_category,epk' ),
			                        'fact_sheet'        => array('prefix' => 'fact'         , 'template_shortcode' => 'file_category,fac' ),
			                        'fonts'             => array('prefix' => 'font'         , 'template_shortcode' => 'file_category,fon' ),
			                        'document_others'   => array('prefix' => 'doth'         , 'template_shortcode' => 'file_category,doth')),
			                    'channel' => array (
			                        'channel_epg'       => array('prefix' => 'epg'          , 'template_shortcode' => 'file_category,cm_epg'),
			                        'channel_highlights'=> array('prefix' => 'highlights'   , 'template_shortcode' => 'file_category,cm_hig'),
			                        'channel_brand'     => array('prefix' => 'brand'        , 'template_shortcode' => 'file_category,cm_bra'),
			                        'channel_boiler'    => array('prefix' => 'boiler'       , 'template_shortcode' => 'file_category,cm_boi'),
			                        'channel_catchup'   => array('prefix' => 'catch'        , 'template_shortcode' => 'file_category,cm_cat'))
			                    ),
			                'promo' => array (
			                    'show'  => array (
			                        'promos'            => array('prefix' => 'promo'        , 'template_shortcode' => 'file_category,promo'))
			                    )
			                );

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


register_activation_hook(__FILE__, 'email_notice_activation');
function email_notice_activation() {
    if (! wp_next_scheduled ( 'email_notice_event' )) {
		wp_schedule_event( strtotime('22:50:00'), 'daily', 'email_notice_event' );
    }
}

register_deactivation_hook(__FILE__, 'email_notice_deactivation');
function email_notice_deactivation() {
	wp_clear_scheduled_hook('email_notice_event');
}

add_action('email_notice_event', 'trigger_email_notification_checker');

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
			    $entertainment_category_id = getCategoryIdBySlug('entertainment');
			    $extreme_category_id = getCategoryIdBySlug('extreme');

				/* Check if show categories includes entertainment or extreme */
				$is_exist_channel = array();
			    $is_exist_channel['entertainment'] = in_array($entertainment_category_id, $categories);
			    $is_exist_channel['extreme'] = in_array($extreme_category_id, $categories);

			    $operator_access = array();
			    $operator_access_channel = array();
			    foreach ($is_exist_channel as $key => $value) {
			    	if($value){
				    	$operator_access_channel[$key] = getOperatorCountryCombinationAccess($key);
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
			    $matched_operator_access = check_user_group_access($user, $operator_access);
				if($matched_operator_access){
					echo "<br>matched_operator_access['is_pr_group']:".$matched_operator_access['is_pr_group'];
					$uns_email_entry = unserialize($email_entry->data_new);
					$files[$email_entry->post_id]['promo'] = get_user_accessible_promos($user, $uns_email_entry['promos'], $matched_operator_access['is_pr_group'],$operator_access);
					$files[$email_entry->post_id]['show'] = get_user_accessible_files($user, $uns_email_entry['files'], $uns_email_entry['raw_files']['files'], $matched_operator_access['is_pr_group'],$operator_access);	
				}
			}
		}

		echo "<pre>";
			    print_r($files);
			    echo "</pre>";

		if( count($files) > 0 ){
			$email_sent = send_email_notice($user, $files);
			if($email_sent)
				array_push($email_recipient,$user->user_email);
		}
	}
	// die('asd');
	$email_recipient_serialized = serialize($email_recipient);
	$return_value_email = setEmailEntryStatus('sent');
	if( $return_value_email === FALSE )
		addEmailLogs('failed', $email_recipient_serialized);
	else
		addEmailLogs('success', $email_recipient_serialized);

}

if (!function_exists('check_user_group_access')){
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
}

if (!function_exists('get_user_accessible_promos')){
	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */
	function get_user_accessible_promos($user, $promo_files, $is_pr_group = '', $operator_access = array()){
		$accessible_promo_files = array();
		if (count($promo_files) > 0) {
			foreach ($promo_files as $key => $value) {
				if ( strtolower($value['operator_access']) == strtolower($user->operator_group) ||
					strtolower($value['operator_access']) == 'all' ) {
					array_push($accessible_promo_files, $value);
				}else if ( $is_pr_group == 'yes' ){
					if( strtolower($user->country_group) == 'all' ){
						array_push($accessible_promo_files, $value);
					}else{
						foreach ($operator_access as $key => $operator_access_item) {
							if( strtolower($operator_access_item['operator_group']) == strtolower($value['operator_access']) &&
								strtolower($operator_access_item['country_group']) == strtolower($user->country_group) ){
								array_push($accessible_promo_files, $value);
							}
						}
					}
				}
				else{
					continue;
				}
			}
		}
		return $accessible_promo_files;
	}
}

if (!function_exists('get_user_accessible_files')){
	/**
	 * Get all oerator available newly uploaded promo files
	 * @param  Object $user           	User
	 * @param  Array  $new_promos_ids 	ID of newly uploaded promo file
	 * @param  Array  $all_promos     	All current promos from the submitted form
	 * @return Array                  	Array of promo file names
	 */
	function get_user_accessible_files($user, $all_files, $raw_files, $is_pr_group = '', $operator_access = array()){
		$accessible_files = array();
		if (count($raw_files) > 0) {
			foreach ($raw_files as $key => $value) {
				// echo "<br><br>New file:".$value;
				if( contains($value, 'epg')){
					if ( ($is_pr_group == 'yes' && strtolower($user->country_group) == 'all') ||
						 contains($value, 'affiliate') ||
						 contains($value, $user->operator_group) ||
						 (checkEPGAccessibilityViaFilename($user, $operator_access, $value ) && $is_pr_group == 'yes' ) ){
							continue;
	                }else{
						if(isset($all_files['document']['epg'][$key])) unset($all_files['document']['epg'][$key]);
			            if(isset($all_files['document']['doth'][$key])) unset($all_files['document']['doth'][$key]);
	                }
				}
			}
		}
		return $all_files;
	}
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
	$plugin_img_dir = plugins_url().'/wpdm-email-notice/images/';
	$to = $user->user_email;
	// $to = "diannekatherinedelosreyes@gmail.com";
	$subject = 'RTL CBS Asia Notification - New files are available for you today!';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	$message = '
	
<html>
<style type="text/css">body, table, td {font-family: Arial, Helvetica, sans-serif !important;font-size:12px;text-align: left;line-height:15px;}<body>    
</style>
<table style="height: 617px; background-color: #a6a6a5;" width="599" cellspacing="0" cellpadding="0">

<tbody>

<tr>
<td valign="center"><img src="'.$plugin_img_dir.'email-banner.jpg" alt="RTL CBS Banner" width="599" height="130" /></td>
</tr>

<tr>
<td valign="top"><center>
<table style="height: 194px; background-color: #ffffff;margin-left: auto; margin-right: auto;" width="522">
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
// echo "<br>Send email:";
// echo "<pre>";
// print_r($files);
// echo "</pre>";
if( count($files) > 0 ):
	foreach ($files as $post_id => $type) :
		$is_channel_material = checkIfChannelMaterials($post_id);
		// echo "<br>is_channel_material:".$is_channel_material;
		if( count($type['show']) > 0 ) :
			$show_title = get_the_title($post_id);

			$show_title = $is_channel_material['is_channel_material'] != false ? $is_channel_material['channel'] : $show_title;
			$permalink = get_permalink($post_id).$is_channel_material['channel_switcher'];
			echo "<br>is_channel_material : ";
			print_r($is_channel_material);
			
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
								<td >'.getCategoryNameByPrefix($prefix).'</td>
							</tr>';
							$file_counter = 1;
							foreach ($file_list as $file_id => $file_name) :
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
			// echo "<br>is_channel_material['channel']:".$is_channel_material['channel'];
		if( count($type['promo']) > 0 ) :
			foreach ($type['promo'] as $key => $promo_info) :
				// echo "<br>Promo info:";print_r($promo_info);
				$permalink = $operator_site_link.'/promos/'.$is_channel_material['channel_switcher'];
				$message_temp = '
					<tr>
						<td style="line-height: 25px;"><a title="'.$promo_info['file_name'].'" href="'.$permalink.'" target="_blank">'.$promo_info['file_name'].'</a></td>
					</tr>
					';

				if( $is_channel_material['channel'] == 'entertainment' ){
					$message_entertainment['promos'] .= $message_temp;
				}else if( $is_channel_material['channel'] == 'extreme' ){
					$message_extreme['promos'] .= $message_temp;
				}
				$message_temp = '';
			endforeach;
		endif;
		// echo "<br>message_entertainment:";
		// print_r($message_entertainment);

		// echo "<br>message_extreme:";
		// print_r($message_extreme);
		

	endforeach;
	
endif;

if( isset($message_entertainment) ):
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

if( isset($message_extreme)):
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
<td><center><img src="'.$plugin_img_dir.'rtl-logo.png" alt="RTL CBS Logo" /></center>

<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
 </body></html>
	';
	
	// echo $message;
	
	// Start output buffering to grab smtp debugging output
	ob_start();

	// Send the test mail
	$result = wp_mail($to,$subject,$message,$headers);
		
	// Grab the smtp debugging output
	$smtp_debug = ob_get_clean();
	
	// Output the response
	return $result;
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
if(!function_exists('getCategoryIdBySlug')){
	function getCategoryIdBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = '{$slug}'");
		return $category_id;
	}
}

if(!function_exists('getPostBySlug')){
	function getPostBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$args = array( 'category_name' => $slug );
		$posts = get_posts( $args );
		return $posts;
	}
}

if (!function_exists('getOperatorCountryCombinationAccess')) {
	function getOperatorCountryCombinationAccess($channel = 'entertainment'){
		global $wpdb;
		$operator_access = $wpdb->get_results("SELECT id, operator_group, country_group, is_pr_group FROM $wpdb->operator_access WHERE meta_access LIKE '%{$channel}%'", ARRAY_A);
		return $operator_access;
	}
}
