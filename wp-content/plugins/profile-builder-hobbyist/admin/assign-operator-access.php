<?php

global $wpdb;
if (!isset($wpdb->custom_cart)) {
	$wpdb->operator_access = $wpdb->prefix . 'operator_access';
}
/**
 * Function that creates the "Assign Operator Access" submenu page
 *
 * @since v.2.0
 *
 * @return void
 */
function wppb_assign_operator_access_submenu_page() {
	add_submenu_page( 'profile-builder', __( 'Assign Operator Access', 'profile-builder' ), __( 'Assign Operator Access', 'profile-builder' ), 'manage_options', 'profile-builder-assign-operator-access', 'wppb_assign_operator_access_content' );
}
add_action( 'admin_menu', 'wppb_assign_operator_access_submenu_page',  1);

/**
 * Function that adds content to the "Basic Information" submenu page
 *
 * @since v.2.0
 *
 * @return string
 */
function wppb_assign_operator_access_content() {
	
	// $version = 'Free';
	// $version = ( ( PROFILE_BUILDER == 'Profile Builder Pro' ) ? 'Pro' : $version );
	// $version = ( ( PROFILE_BUILDER == 'Profile Builder Hobbyist' ) ? 'Hobbyist' : $version );
	
	require_once WPPB_PLUGIN_DIR . 'admin/form/form-assign-operator-access.php';

}

function custom_get_operator_groups()
{
	global $wpdb;

	$raw_operator_group = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'wppb_manage_fields' ");
	$unserialized_operator_group = unserialize($raw_operator_group);

	$operator_groups = array();
	$operator_groups_options = explode( ',', $unserialized_operator_group[1]['options']);
	$operator_groups_labels = explode( ',', $unserialized_operator_group[1]['labels']);

	foreach ($operator_groups_options as $key => $value) {
		$operator_groups[$value] = $operator_groups_labels[$key];
	}
	return $operator_groups;
}

function custom_get_rtl_channels()
{
	global $wpdb;

	$raw_rtl_channels = $wpdb->get_results("SELECT name,slug FROM $wpdb->terms WHERE slug IN('entertainment', 'extreme' ) ");
	$rtl_channels = array();

	foreach ($raw_rtl_channels as $key => $value) {
		$rtl_channels[$value->slug] = $value->name;
	}
	return $rtl_channels;
}

/**
 * Process form submission from Assign opertor access
 * @return bool [description]
 */
function process_operator_access(){
	$cartnonce = $_POST['cartnonce'];
	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_assign_operator_access__') ){ 
		$data = unserializeForm($_POST['data']);
		if(!checkExistingCountryOperator($data)){
			$return_value = insertToOperatorAccess($data);
		}else {
			$return_value = updateToOperatorAccess($data);
		}

	}else {
		$return_value = 0;
	}
	// echo $return_value;
	echo $return_value ? "Saved Successfully." : "No changes found.";
	die();
}
add_action('wp_ajax_process_operator_access', 'process_operator_access');

/**
 * check if there is an existing entry with the same operator and group.
 * @param  Array $data 		Serialized form data from dorm submission.
 * @return Integer       	Number of found items.
 */
function checkExistingCountryOperator($data) {
	global $wpdb;
	$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->operator_access WHERE operator_group='{$data['operator_group']}' AND country_group='{$data['country']}'" );

	return $user_count;
}

/**
 * Insert new entry to operator_access custom table
 * @param  Array $data 		Serialized form data from dorm submission.
 * @return bool      		Return value from qpdb insert
 */
function insertToOperatorAccess($data){
	global $wpdb;

	$operator_data['country'] = $data['country']; 
	$operator_data['operator_group'] = $data['operator_group']; 

	$serialized_operator_access = serializeChannelAccess($data);
	// if($serialized_operator_access != 0){
		$return_value = $wpdb->insert(
		        				$wpdb->operator_access,
						        array(
						            'operator_group' 	=> $operator_data['operator_group'],
						            'country_group' 	=> $operator_data['country'],
						            'meta_access' 		=> $serialized_operator_access,
						            'created_at' 		=> date('Y-m-d H:i:s')
						        )
		    				);
	// } 
	// else {
	// 	$return_value = "Please choose a channel";
	// }
	// echo $return_value;die();
	return $return_value;
}

/**
 * Updates existing entry in operator_access custom table
 * @param  Array $data 		Serialized form data from dorm submission.
 * @return bool      		Return value from qpdb insert
 */
function updateToOperatorAccess($data){
	global $wpdb;

	$serialized_operator_access = serializeChannelAccess($data);
	$return_value = $wpdb->update( 
							$wpdb->operator_access, 
							array('meta_access' => $serialized_operator_access), 
							array( 
								'operator_group' => $data['operator_group'],
								'country_group' => $data['country'],
								)
						);
	return $return_value;
}

/**
 * Serialize data before inserting to database
 * @param  Array $data 		Serialized form data from dorm submission.
 * @return String       	Serialized chosen channel
 */
function serializeChannelAccess($data){
	unset($data['country']);
	unset($data['operator_group']);
	// $count = count($data);
	for ($i=0; $i < 2 ; $i++) { 
		if(isset($data["channel-access[{$i}]"]) && $data["channel-access[{$i}]"] != "" && $data["channel-access[{$i}]"] != null)
			$operator_data["channel-access[{$i}]"] = $data["channel-access[{$i}]"];
	}
	return serialize($operator_data);
	// return $count > 0 ? serialize($operator_data) : 0;
}

/**
 * Get matched result based on operator group and country group
 * @return Json Data       Returns an unserialized access meta of matched results
 */
function get_matching_operator_access(){
	$cartnonce = $_POST['cartnonce'];
	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_get_matching_operator_access__') ){ 
		$data = unserializeForm($_POST['data']);
		global $wpdb;

		$serialized_meta_access = $wpdb->get_var( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group='{$data['operator_group']}' AND country_group='{$data['country']}' " );
		$unserialized_meta_access = unserialize($serialized_meta_access);
	}
	// else {
		// $return_value = 0;
	// }
	// echo $return_value;
	echo json_encode($unserialized_meta_access);
	die();
}
add_action('wp_ajax_get_matching_operator_access', 'get_matching_operator_access');