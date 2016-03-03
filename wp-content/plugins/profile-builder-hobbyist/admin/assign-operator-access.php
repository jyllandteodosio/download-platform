<?php
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

function process_operator_access(){
	// echo $_POST['data'];
	// TODO: fix unserializeForm function to properly draw checkbox data
	print_r(unserializeForm($_POST['data']));
	// echo "</pre>";
	// $data = unserializeForm($_POST['data']);
	// foreach ( $data as $key => $value) {
	//     	$data_serialized[$key]			= urldecode($value);
	//     	$data_unserialized[$key]		= unserialize($data_serialized[$key]);
	//     }
	// print_r($data);
	die();
}
add_action('wp_ajax_process_operator_access', 'process_operator_access');
add_action('wp_ajax_nopriv_process_operator_access', 'process_operator_access');