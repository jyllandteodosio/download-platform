<?php 
    /*
    Plugin Name: WPDM Reports
    Description: Custom reports
    7M
    Version: 1.0
    */
   


define('WPDMR_PLUGIN_DIR', plugin_dir_path(__FILE__));

function plugin_menu() {

	add_menu_page( 'Reports', 'Reports Dashboard', 'manage_options', 'wpdm-reports', "reports_dashboard" );
	add_submenu_page( 'wpdm-reports', 'Reports Data', 'Reports Data', 'manage_options', 'wpdm-reports-data', 'wpdm_reports_data_content' );
}
add_action('admin_menu', "plugin_menu");

function reports_dashboard(){
	// die(WPDMR_PLUGIN_DIR);
	// 
	// require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
	echo "dashboard";
}
function wpdm_reports_data_content(){
	require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
}

// include_once(WPDMR_PLUGIN_DIR . 'submenu/wpdm-reports-data.php');
   

