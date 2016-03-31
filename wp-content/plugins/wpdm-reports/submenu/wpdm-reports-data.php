<?php
if(!function_exists('wpdm_reports_data_submenu_page')){
	function wpdm_reports_data_submenu_page() {
		add_submenu_page( 'wpdm-reports', 'Reports Data', 'Reports Data', 'manage_options', 'wpdm-reports-data', 'wpdm_reports_data_content' );
	}
}
add_action( 'admin_menu', 'wpdm_reports_data_submenu_page',  1);

if(!function_exists('wpdm_reports_data_content')){
	function wpdm_reports_data_content(){
		require_once WPDMR_PLUGIN_DIR . 'admin/front-reports-data.php';
	}
}

if(isset($_GET['country'])){
	echo "submitted";

    global $wpdb;
    $form_data['country'] = $_GET['country'] != NULL || $_GET['country'] != '' ? sanitize_text_field($_GET['country']) : '';
    $form_data['operator_group'] = $_GET['operator_group'] != NULL || $_GET['operator_group'] != '' ? sanitize_text_field($_GET['operator_group']) : '';
    $form_data['operator_account'] = $_GET['operator_account'] != NULL || $_GET['operator_account'] != '' ? sanitize_text_field($_GET['operator_account']) : '';
    $form_data['shows'] = $_GET['shows'] != NULL || $_GET['shows'] != '' ? sanitize_text_field($_GET['shows']) : '';
    $form_data['current_period'] = $_GET['current_period'] != NULL || $_GET['current_period'] != '' ? sanitize_text_field($_GET['current_period']): 'period-month';
    $form_data['date_from'] = $_GET['date_from'] != NULL || $_GET['date_from'] != '' ? sanitize_text_field($_GET['date_from'])." 00:00:00" : '';
    $form_data['date_to'] = $_GET['date_to'] != NULL || $_GET['date_to'] != '' ? sanitize_text_field($_GET['date_to'])." 23:59:59" : '';

    $condition_period = ($form_data['date_from'] != '' && $form_data['date_to'] != '') ? "r.created_at BETWEEN '".$form_data['date_from']."' AND '".$form_data['date_to']."'" : '1';
    $condition_country = ($form_data['country'] != '') ? "country_group = '".$form_data['country']."'" : '1';
    $condition_operator_group = ($form_data['operator_group'] != '') ? "operator_group = '".$form_data['operator_group']."'" : '1';
    $condition_operator_account = ($form_data['operator_account'] != '') ? "user_id = ".$form_data['operator_account'] : '1';
    $condition_show = ($form_data['show'] != '') ? "post_id = ".$form_data['show'] : '1';

    $query_string = "
		SELECT r.country_group, r.operator_group, u.user_email, p.post_title, count(*) as downloaded_files, min(r.created_at), max(r.created_at)
		FROM ".$wpdb->custom_reports." r 
		INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
		INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
		WHERE ".
		$condition_period.
		" AND ".$condition_country.
		" AND ".$condition_operator_group.
		" AND ".$condition_operator_account.
		" AND ".$condition_show.
		" GROUP BY r.user_id, r.post_id
    ";
    $reports_data = $wpdb->get_results($query_string, ARRAY_A);
    echo "<pre>";
    // print_r($query_string);
    // print_r($form_data);
    // print_r($reports_data);
    echo "</pre>";
}
