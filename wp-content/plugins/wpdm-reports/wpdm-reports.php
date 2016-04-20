<?php 
    /*
    Plugin Name: WPDM Reports
    Description: Custom reports
    Dianne Katherine Delos Reyes
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
	
	echo "dashboard";
}
function wpdm_reports_data_content(){
	require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
}


// Register style sheet.
add_action( 'admin_enqueue_scripts', 'register_plugin_styles', 0 );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	/* Reprts page style */
	wp_register_style( 'wpdm-reports-main-css', plugins_url( 'wpdm-reports/assets/css/main.css' ) );
	wp_enqueue_style( 'wpdm-reports-main-css' );

	/* Date picker */
	wp_enqueue_script(
			'field-date-js', 
			'Field_Date.js', 
			array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
			time(),
			true
		);	

	wp_enqueue_style( 'jquery-ui-datepicker' );
	wp_register_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap_css' );

	wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
	wp_enqueue_style( 'jquery-ui' ); 
}