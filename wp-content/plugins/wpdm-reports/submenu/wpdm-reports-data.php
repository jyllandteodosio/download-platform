<?php

function wpdm_reports_data_submenu_page() {
	// add_submenu_page ( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' );
	add_submenu_page( 'wpdm-reports', 'Reports Data', 'Reports Data', 'manage_options', 'wpdm-reports-data', 'wpdm_reports_data_content' );
}
add_action( 'admin_menu', 'wpdm_reports_data_submenu_page',  1);

function wpdm_reports_data_content(){
	require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
}