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

	// ob_end_clean();
 //    $output .= 'column 1'. ',';
	// $output .= 'column 2'. ',';

	// $output .="\n";
	// $output .='"data 1",';
	// $output .='"data 2",';
	// $output .="\n";

	// $file = "custom_table";
	// $filename = $file."_".date("Y-m-d_H-i",time());
	// nocache_headers();
	// header("Content-type: application/vnd.ms-excel");
	// header("Content-disposition: csv" . date("Y-m-d") . ".csv");
	// header( "Content-disposition: filename=".$filename.".csv");
	
	// echo $output;

}
function wpdm_reports_data_content(){
	require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
}

// include_once(WPDMR_PLUGIN_DIR . 'submenu/wpdm-reports-data.php');
   
