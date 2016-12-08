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
		wp_schedule_event( strtotime('22:50:00'), 'daily', 'email_notice_event' );
    }
}

register_deactivation_hook(__FILE__, 'email_notice_deactivation');
function email_notice_deactivation() {
	wp_clear_scheduled_hook('email_notice_event');
}


/**
 * Begins execution of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpdm-email-notice.php';
// if( is_admin() )
	$wen_plugin = new WPDM_Email_Notice();

