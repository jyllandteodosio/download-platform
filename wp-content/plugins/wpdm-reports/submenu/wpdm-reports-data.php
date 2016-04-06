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
    global $wpdb;
    $form_data['filter'] = $_GET['filter'] != NULL || $_GET['filter'] != '' ? true : false;
    $form_data['country'] = $_GET['country'] != NULL || $_GET['country'] != '' ? sanitize_text_field($_GET['country']) : '';
    $form_data['operator_group'] = $_GET['operator_group'] != NULL || $_GET['operator_group'] != '' ? sanitize_text_field($_GET['operator_group']) : '';
    $form_data['operator_account'] = $_GET['operator_account'] != NULL || $_GET['operator_account'] != '' ? sanitize_text_field($_GET['operator_account']) : '';
    $form_data['shows'] = $_GET['shows'] != NULL || $_GET['shows'] != '' ? sanitize_text_field($_GET['shows']) : '';
    $form_data['current_period'] = $_GET['current_period'] != NULL || $_GET['current_period'] != '' ? sanitize_text_field($_GET['current_period']): '';
    $form_data['date_from'] = $_GET['date_from'] != NULL || $_GET['date_from'] != '' ? sanitize_text_field($_GET['date_from'])." 00:00:00" : '';
    $form_data['date_to'] = $_GET['date_to'] != NULL || $_GET['date_to'] != '' ? sanitize_text_field($_GET['date_to'])." 23:59:59" : '';

    $form_data['date_from_formatted_mdy'] = date_format(date_create($form_data['date_from']),"m/d/Y");
    $form_data['date_from_formatted_my'] = date_format(date_create($form_data['date_from']),"m/Y");
    $form_data['date_from_formatted_y'] = date_format(date_create($form_data['date_from']),"Y");
    $form_data['date_to_formatted_mdy'] = date_format(date_create($form_data['date_to']),"m/d/Y");

    $form_data['msg_dl_range'] = ($form_data['date_from'] != '' && $form_data['date_to'] != '') ? "Downloaded Files from ".$form_data['date_from_formatted_mdy']." to ".$form_data['date_to_formatted_mdy'] : "";

    switch ($_GET['current_period']) {
    	case 'period-day':
            $period_date_format = "%m/%d/%Y";
            $period_date_format_standard = "%Y-%m-%d";
            $groupby_period = " period_format_standard";
            $groupby_period_exportsreports = " Period";
            $select_max_created_at = "";
    		$form_data['results_period'] = $form_data['date_from_formatted_mdy'];
    		break;
    	case 'period-week':
            $period_date_format = "%m/%d/%Y";
            $period_date_format_standard = "%Y-%m-%d";
            $groupby_period = " YEARWEEK(r.created_at)";
            $groupby_period_exportsreports = " YEARWEEK(r.created_at)";
            $select_max_created_at = "date_format(max(r.created_at), '%Y-%m-%d') as 'Period End', ";
    		$form_data['results_period'] = $form_data['date_from_formatted_mdy'].' - '.$form_data['date_to_formatted_mdy'];
    		break;
    	case 'period-month':
            $period_date_format = "%m/%Y";
            $period_date_format_standard = "%Y-%m";
            $groupby_period = " period_format_standard";
            $groupby_period_exportsreports = " Period";
            $select_max_created_at = "";
    		$form_data['results_period'] = $form_data['date_from_formatted_my'];
    		break;
    	case 'period-year':
            $period_date_format = "%Y";
            $period_date_format_standard = "%Y";
            $groupby_period = " period_format_standard";
            $groupby_period_exportsreports = " Period";
            $select_max_created_at = "";
    		$form_data['results_period'] = $form_data['date_from_formatted_y'];
    		break;
    	default:
            $period_date_format = "%m/%d/%Y";
            $period_date_format_standard = "%Y-%m-%d";
            $groupby_period = "";
            $groupby_period_exportsreports = "";
            $select_max_created_at = "";
    		$form_data['results_period'] = "";
    		break;
    }
    $condition_period = ($form_data['date_from'] != '' && $form_data['date_to'] != '') ? "r.created_at BETWEEN '".$form_data['date_from']."' AND '".$form_data['date_to']."'" : '1';
    if ($form_data['date_from'] != '' && $form_data['date_to'] != '') {
    	$condition_period = "r.created_at BETWEEN '".$form_data['date_from']."' AND '".$form_data['date_to']."'";
    }else if ($form_data['date_to'] == ''){
    	$condition_period = "r.created_at >= '".$form_data['date_from']."'";
    }else if ($form_data['date_from'] == ''){
    	$condition_period = "r.created_at <= '".$form_data['date_to']."'";
    }

    $condition_country = ($form_data['country'] != '') ? "country_group = '".$form_data['country']."'" : '1';
    $condition_operator_group = ($form_data['operator_group'] != '') ? "operator_group = '".$form_data['operator_group']."'" : '1';
    $condition_operator_account = ($form_data['operator_account'] != '') ? "user_id = ".$form_data['operator_account'] : '1';
    $condition_show = ($form_data['shows'] != '') ? "post_id = ".$form_data['shows'] : '1';

    $query_string = "
		SELECT r.country_group, 
            IF( r.operator_group IS NULL or r.operator_group = '','Admin',r.operator_group) as operator_group, 
            u.user_email, p.post_title, count(*) as downloaded_files, 
            min(r.created_at) as min_created_date, max(r.created_at) as max_created_date,
            date_format(r.created_at, '".$period_date_format."') as period, 
            date_format(r.created_at, '".$period_date_format_standard."') as period_format_standard
		FROM ".$wpdb->custom_reports." r 
		INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
		INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
		WHERE ".
		$condition_period.
		" AND ".$condition_country.
		" AND ".$condition_operator_group.
		" AND ".$condition_operator_account.
		" AND ".$condition_show.
		" GROUP BY u.id, p.id, ". $groupby_period."
          ORDER BY period_format_standard,u.user_email,p.post_title
    ";
    $reports_data = $wpdb->get_results($query_string, ARRAY_A);
    echo $query_string;
    /* QUERY for export report */
    $country_groups = custom_get_country_groups();
    $country_groups_select_case = "";

    $country_groups_select_case .= "case r.country_group ";
    foreach ($country_groups as $key => $value) {
        $country_groups_select_case .= "when '".$key."' then '".$value."' ";
    }
    $country_groups_select_case .= "else 'Admin' ";
    $country_groups_select_case .= "end as country_group, ";


    $query_string_exportsreports = "
        SELECT date_format(r.created_at, '".$period_date_format_standard."') as Period,
            ".$select_max_created_at."
            ".$country_groups_select_case."
            IF( r.operator_group IS NULL or r.operator_group = '','Admin',r.operator_group) as operator_group, 
            u.user_email, p.post_title, count(*) as downloaded_files
        FROM ".$wpdb->custom_reports." r 
        INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
        INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
        WHERE ".
        $condition_period.
        " AND ".$condition_country.
        " AND ".$condition_operator_group.
        " AND ".$condition_operator_account.
        " AND ".$condition_show.
        " GROUP BY r.user_id, r.post_id, ". $groupby_period_exportsreports."
          ORDER BY Period,u.user_email,p.post_title
    ";
    $return_value = $wpdb->update( 
        $wpdb->exportsreports_reports, 
        array( 
            'sql_query' => $query_string_exportsreports
        ), 
        array( 'name' => 'RTL' )
    );

    // echo "<pre>";
    // print_r( $query_string_exportsreports);
    // print_r(custom_get_country_groups());
    // print_r($country_groups_select_case);

    // echo "return_value - ".$return_value;
    // print_r($form_data);
    // print_r($reports_data);
    // echo "</pre>";
}

