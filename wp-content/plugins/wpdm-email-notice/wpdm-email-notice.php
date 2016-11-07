<?php 
    /*
    Plugin Name: WPDM Email Notice
    Description: Custom email notifier to operator accounts
    Dianne Katherine Delos Reyes
    Version: 1.0
    */
   

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

add_action( 'pre_post_update', 'wpdm_check_new_files' );
function wpdm_check_new_files($id)
{
	/* Get current POST data */
    $post = get_post($id, ARRAY_A);

    /* Check for attached show files */
    $wpdm_files_old = get_post_meta($id, '__wpdm_files', true) != "" ? maybe_unserialize(get_post_meta($id, '__wpdm_files', true)) : array(); /* Old values from database */
    $wpdm_files_new = $_POST['file']['files'] != "" ? $_POST['file']['files'] : array(); /* New values from form */
    $files_diff = array_diff($wpdm_files_new,$wpdm_files_old);	/* Remove extra array at the last index */

    /* Check for attached promo files */
    $wpdm_promos_new_id = array();
    $wpdm_promos_old_id = array();
    $wpdm_promos_old = get_field( "add_promo_files" , $id) ? get_field( "add_promo_files" , $id) : array(); /* Old values from database */
    $wpdm_promos_new = $_POST['fields']['field_56bda9692303d'];	/* New values from form */
    if($wpdm_promos_new!= null) {
    	array_pop($wpdm_promos_new); /* Remove extra array at the last index  */
	    /* Restructure post data of promo files into key value pair */
	    foreach ($wpdm_promos_new as $key => $value) {
	        $wpdm_promos_new_id[$value['field_56bda9eb23040']] = $value['field_56bdaa2523043']; /* New values from form (key,value) */
	    }
	}
    /* Restructure DB data of promo files into key value pair */
    foreach ($wpdm_promos_old as $key => $value) {
        $wpdm_promos_old_id[$value['id']] = $value['file_name']; /* Old values from database (key,value) */
    }
    $promos_diff=array_diff($wpdm_promos_new_id,$wpdm_promos_old_id); /* Check number New Promo files added */
  	
  	// echo "<pre>";
    // echo "<br><br>wpdm_files_old:<br>";
 	// print_r($wpdm_files_old);
 	// echo "<br><br>wpdm_files_new:<br>";
 	// print_r($wpdm_files_new);
 	// echo "<br><br>files_diff:<br>";
 	// print_r($files_diff);
 	// echo "<br><br>wpdm_promos_old:<br>";
 	// print_r($wpdm_promos_old);
 	// echo "<br><br>wpdm_promos_new:<br>";
 	// print_r($wpdm_promos_new);
 	// echo "<br><br>POST:<br>";
 	// print_r($_POST);
 	// echo "<br><br>wpdm_promos_old_id:<br>";
 	// print_r( $wpdm_promos_old_id);
 	// echo "<br><br>wpdm_promos_new_id:<br>";
 	// print_r( $wpdm_promos_new_id);
 	// echo "<br><br>promos_diff:<br>";
 	// print_r($promos_diff);
    // echo "</pre>";

    if(count($files_diff) >= 1 || count($promos_diff) >= 1){
    	$categories = $_POST['tax_input']['wpdmcategory']; /* Get categories assigned */

	    $entertainment_category_id = getCategoryIdBySlug('shows-entertainment');
	    $extreme_category_id = getCategoryIdBySlug('shows-extreme');

		/* Check if show categories includes entertainment or extreme */
		$is_exist_channel = array();
	    $is_exist_channel['entertainment'] = array_search($entertainment_category_id, $categories);
	    $is_exist_channel['extreme'] = array_search($extreme_category_id, $categories);

	    $operator_access = array();
	    $operator_access_channel = array();
	    foreach ($is_exist_channel as $key => $value) {
	    	if($value){
		    	$operator_access_channel['entertainment'] = getOperatorCountryCombinationAccess($key);
		    }
	    }
	    foreach ($operator_access_channel as $key => $value) {
	    	if(isset($operator_access_channel['entertainment'])){
			    foreach ($operator_access_channel['entertainment'] as $key => $value) {
			    	$operator_access[$value['id']] = array('operator_group' => $value['operator_group'],'country_group' => $value['country_group']);
			    }
			}
	    }

		$users = getUsersByRole('Operator');
    
		$permalink = get_permalink($id);
		foreach ($users as $user) {
			if(check_user_group_access($user, $operator_access)){
				/* Check if there's a new promo file */
				$files['promo'] = get_user_accessible_promos($user, $promos_diff, $wpdm_promos_new);
				$files['show'] = get_user_accessible_files($user, $files_diff, $wpdm_files_new);
				send_email_notice($user, $files, $permalink);
			}
		}
    	// die("asd");
    }
}


function send_email_notice($user, $files, $show_link){
	$to = $user->user_email;
	// $to = "diannekatherinedelosreyes@gmail.com";
	$subject = 'RTL CBS Asia Notification - New files are available for you today!';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	$message = '';
	$message .= "Hi {$user->user_login},<br><br>";
	$message .= "New files are available for download on the RTL CBS Operator Site.<br>";
	
	if(!empty($files['promo']) || !empty($files['show']) ){
		$message .= "<br><br>Updated assets include:<br>";
	}
	if(!empty($files['show'])){
		$message .= "<ul>";
		foreach ($files['show'] as $file) {
			$message .= "<li><a href='".$show_link."'>".$file."</a></li>";
		}
		$message .= "</ul>";
	}
	if(!empty($files['promo'])){
		$message .= "<br>Promo file/s:<br>";
		$message .= "<ul>";
		foreach ($files['promo'] as $file) {
			$message .= "<li><a href='".$show_link."'>".$file."</a></li>";
		}
		$message .= "</ul>";
	}
	$message .= "<br>To view and download the files, log on to the <a href='".$show_link."'>Operator Site.</a><br><br>
				Thanks,<br>
				RTL CBS";
	// echo $message;
	// Start output buffering to grab smtp debugging output
	ob_start();

	// Send the test mail
	$result = wp_mail($to,$subject,$message,$headers);
		
	// Grab the smtp debugging output
	$smtp_debug = ob_get_clean();
		
	// Output the response
	// echo "res-".$result;
}

if (!function_exists('check_user_group_access')){
	/**
	 * Check if a particular user is included in array of allowed operator and country group combination
	 * @param  Object $user            User
	 * @param  Array $operator_access  Key value pair of allowed operator group and country group combination
	 * @return bool                    Returns 1 if accessible, otherwise 0
	 */
	function check_user_group_access($user, $operator_access){
		foreach ($operator_access as $key => $value) {
			if (strtolower($value['operator_group']) == strtolower($user->operator_group) 
				&& strtolower($value['country_group']) == strtolower($user->country_group)) {
				return 1;
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
	function get_user_accessible_promos($user, $new_promos_ids, $all_promos){
		/* Check if there's a new promo uploaded */
		$promo_files = array();
		if (count($new_promos_ids) >= 1) {
			foreach ($new_promos_ids as $pd_key => $pd_value) {
				foreach ($all_promos as $wpn_key => $wpn_value) {
					/* Check if KEYs are the same */
					if($wpn_value['field_56bda9eb23040'] == $pd_key){
						/* Check if Operator Group of promo is set to all or to a specific user operator group */
						if( strtolower($wpn_value['field_56de395d8068d']) == 'all' || 
							strtolower($wpn_value['field_56de395d8068d']) == strtolower($user->operator_group)){
							array_push($promo_files, $wpn_value['field_56bdaa2523043']);
						}
					}
				}
			}
		}
		return $promo_files;
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
	function get_user_accessible_files($user, $new_files_ids, $all_files){
		/* Check if there's a new promo uploaded */
		$files = array();
		if (count($new_files_ids) >= 1) {
			foreach ($new_files_ids as $pd_key => $pd_value) {
				foreach ($all_files as $wpn_key => $wpn_value) {
					/* Check if KEYs are the same */
					if($wpn_key == $pd_key){
						array_push($files, $wpn_value);
					}
				}
			}
		}
		return $files;
	}
}

/* Database Queries */
if(!function_exists('getCategoryIdBySlug')){
	function getCategoryIdBySlug($slug = 'shows-entertainment'){
		global $wpdb;
		$category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = '{$slug}'");
		return $category_id;
	}
}

if (!function_exists('getOperatorCountryCombinationAccess')) {
	function getOperatorCountryCombinationAccess($channel = 'entertainment'){
		global $wpdb;
		$operator_access = $wpdb->get_results("SELECT id, operator_group, country_group FROM $wpdb->operator_access WHERE meta_access LIKE '%{$channel}%'", ARRAY_A);
		return $operator_access;
	}
}
