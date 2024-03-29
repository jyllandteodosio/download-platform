<?php 
/*
Plugin Name: WPDM Email Notice TMP
Description: Custom email notifier to operator accounts
Dianne Katherine Delos Reyes
Version: 1.0
*/
	
global $wea_db_version;
$wea_db_version = '1.0'; /* Increment this version number if there's an update in the database structure */

global $wpdb;
if (!isset($wpdb->wpdm_email)) {
	$wpdb->wpdm_email = $wpdb->prefix . 'wpdm_email';
}
if (!isset($wpdb->wpdm_email_logs)) {
	$wpdb->wpdm_email_logs = $wpdb->prefix . 'wpdm_email_logs';
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpdm-email-notice-activator.php
 */
function activate_wpdm_email_notice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpdm-email-notice-activator.php';
	WPDM_Email_Notice_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_wpdm_email_notice');

/**
 * Update table if there's a new plugin version
 */
function wea_update_db_check() {
    global $wea_db_version;
    if ( get_site_option( 'wea_db_version' ) != $wea_db_version ) {
    	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpdm-email-notice-activator.php';
        WPDM_Email_Notice_Activator::activate();
    }
}
add_action( 'plugins_loaded', 'wea_update_db_check' );


register_activation_hook(__FILE__, 'email_notice_activation');
function email_notice_activation() {
    if (! wp_next_scheduled ( 'email_notice_event' )) {
		wp_schedule_event( strtotime('22:30:00'), 'daily', 'email_notice_event' );
    }
}

register_deactivation_hook(__FILE__, 'email_notice_deactivation');
function email_notice_deactivation() {
	wp_clear_scheduled_hook('email_notice_event');
}


// if( !function_exists('get_email_entries') ){
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
		return $email_entries;
	}
// }
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

/**
 * Begins execution of the plugin.
 */
if( is_admin() ){
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-wpdm-email-notice-admin.php';
	$admin_dash = new WPDM_Email_Notice_Admin( );	

	require_once plugin_dir_path( __FILE__ ) . 'email/class-wpdm-file-monitor.php';
	$file_monitor = new WPDM_File_Monitor( );	
}

require_once plugin_dir_path( __FILE__ ) . 'email/class-wpdm-notification-trigger.php';
$notification_trigger = new WPDM_Notification_Trigger( );
add_action('email_notice_event', array($notification_trigger,'trigger_email_notification_checker'));
