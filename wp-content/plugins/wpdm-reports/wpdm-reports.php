<?php 
    /*
    Plugin Name: WPDM Reports
    Description: Custom reports
    Dianne Katherine Delos Reyes
    Version: 1.0
    */
   


define('WPDMR_PLUGIN_DIR', plugin_dir_path(__FILE__));

function plugin_menu() {
    add_menu_page( 'Reports', 'Reports', 'manage_options', 'wpdm-reports-data', 'wpdm_reports_data_content' );
    add_submenu_page( 'wpdm-reports-data', 'Send Reports', 'Send Reports', 'manage_options', 'wpdm-reports', 'reports_dashboard' );
}
add_action('admin_menu', "plugin_menu");

function reports_dashboard(){
    ?>
    <input type="button" value=" Send Monthly Reports " id="auto_report" class="button" style="" onclick="window.open('?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports','temp_report_window');">
    <iframe name="temp_report_window" id="temp_report_window" class="temp_report_window"></iframe>
    <?php
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


/* Cron job not working =================================================================================================*/
// function my_cron_schedules($schedules){
//     $schedules['five_seconds'] = array(
//         'interval' => 1,
//         'display'  => esc_html__( 'Every Second' ),
//     );
//     $schedules['monthly'] = array(      
//     	'interval'=> 2592000,      
//     	'display'=>  __('Once Every 30 Days')  
//     );
//     return $schedules;
// }
// add_filter('cron_schedules','my_cron_schedules');

// if ( ! wp_next_scheduled( 'my_task_hook' ) ) {
//   wp_schedule_event( time(), 'five_seconds', 'my_task_hook' );
// }

// add_action( 'my_task_hook', 'my_task_function' );

// function my_task_function() {
// 	// echo '<script>window.open("?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports","temp_report_window");</script>';
// 	// ob_start(); // ensures anything dumped out will be caught
// 	// // do stuff here
// 	// $url = 'http://example.com/thankyou.php'; // this can be set based on whatever
// 	// // clear out the output buffer
// 	// while (ob_get_status()) {ob_end_clean();}
// 	// // no redirect
// 	// header( "Location: $url" );

// 	echo '<input type="button" value=" Export Report " id="auto_report" class="button" title="" style="display:none" onclick="window.open("?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports","temp_report_window");">';
//     echo '<iframe name="temp_report_window" id="temp_report_window" class="temp_report_window"></iframe>';
//     echo "<script>jQuery('#auto_report').trigger('click');</script>";
//   // echo "<script>alert('omg!');</script>";
//   // wp_die('dieee');
// }


add_filter( 'cron_schedules', 'myprefix_add_weekly_cron_schedule' );
function myprefix_add_weekly_cron_schedule( $schedules ) {
    $schedules['minute'] = array(
        'interval' => 60, // 1 week in seconds
        'display'  => __( 'Per Minute' ),
    );
 
    return $schedules;
}

add_action( 'my_hourly_event',  'update_db_hourly' );

if ( ! wp_next_scheduled( 'my_hourly_event' ) ) {
    wp_schedule_event( time(), 'minute', 'my_hourly_event' );
}
function update_db_hourly() {
    global $wpdb;
    $wpdb->insert( 
        'rtl21016_cron', 
        array( 
            'test' => 'value1'
        ) 
    );
    testing();

} // end update_csv_hourly

function testing(){
	global $wpdb;
    $wpdb->insert( 
        'rtl21016_cron', 
        array( 
            'test' => 'value2'
        ) 
    );
    ?>
    <input type="button" value=" Export Report " id="auto_report" class="button" style="display:block; position:absolute; z-index:100; top:500; right:100" onclick="window.open('?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports','temp_report_window');">
    <iframe name="temp_report_window" id="temp_report_window" class="temp_report_window"></iframe>
    <script>console.log("Send RTL reports...");jQuery('#auto_report').trigger('click');</script>
    <?php

    global $wpdb;
    $wpdb->insert( 
        'rtl21016_cron', 
        array( 
            'test' => 'value3'
        ) 
    );
    // die('diane');
    // echo '<input type="button" value=" Export Report " id="auto_report" class="button" title="" style="display:none" onclick="window.open("?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports","temp_report_window");">';
    // echo '<iframe name="temp_report_window" id="temp_report_window" class="temp_report_window"></iframe>';
    // echo "<script>jQuery('#auto_report').trigger('click');</script>";
}
// testing();