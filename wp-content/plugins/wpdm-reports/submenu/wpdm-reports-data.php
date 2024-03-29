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
    /* Fetching of form inputs */
    $form_data['filter'] = $_GET['filter'] != NULL || $_GET['filter'] != '' ? true : false;
    $form_data['country'] = $_GET['country'] != NULL || $_GET['country'] != '' ? sanitize_text_field($_GET['country']) : '';
    $form_data['operator_group'] = $_GET['operator_group'] != NULL || $_GET['operator_group'] != '' ? sanitize_text_field($_GET['operator_group']) : '';
    $form_data['operator_account'] = $_GET['operator_account'] != NULL || $_GET['operator_account'] != '' ? sanitize_text_field($_GET['operator_account']) : '';
    $form_data['shows'] = $_GET['shows'] != NULL || $_GET['shows'] != '' ? sanitize_text_field($_GET['shows']) : '';
    $form_data['current_period'] = $_GET['current_period'] != NULL || $_GET['current_period'] != '' ? sanitize_text_field($_GET['current_period']): '';
    $form_data['date_from'] = $_GET['date_from'] != NULL || $_GET['date_from'] != '' ? sanitize_text_field($_GET['date_from'])." 00:00:00" : '';
    $form_data['date_to'] = $_GET['date_to'] != NULL || $_GET['date_to'] != '' ? sanitize_text_field($_GET['date_to'])." 23:59:59" : '';
    $form_data['result_type'] = $_GET['result_type'] != NULL || $_GET['result_type'] != '' ? sanitize_text_field($_GET['result_type']) : 'sum';

    if($form_data['date_from'] > $form_data['date_to']){
        $form_data['message'] = "Validation Error: From date should be earlier than To date";
    }else{
        /* Formatting of date (from and to) */
        $form_data['date_from_formatted_mdy'] = date_format(date_create($form_data['date_from']),"m/d/Y");
        $form_data['date_from_formatted_my'] = date_format(date_create($form_data['date_from']),"m/Y");
        $form_data['date_from_formatted_y'] = date_format(date_create($form_data['date_from']),"Y");
        $form_data['date_to_formatted_mdy'] = date_format(date_create($form_data['date_to']),"m/d/Y");

        /* Date layouting for filter message */
        $form_data['msg_dl_range'] = ($form_data['date_from'] != '' && $form_data['date_to'] != '') ? "Downloaded Files from ".$form_data['date_from_formatted_mdy']." to ".$form_data['date_to_formatted_mdy'] : "";

        /* Setting of parts of query specific for a certain date period */
        switch ($_GET['current_period']) {
        	case 'period-day':
                $period_date_format = "%m/%d/%Y";
                $period_date_format_standard = "%Y-%m-%d";
                $period_start_label = " Date";
                $groupby_period = " ,period_format_standard";
                $groupby_period_exportsreports = " Date";
                $select_max_created_at = "";
                $select_max_created_at_list = "";
        		$form_data['results_period'] = $form_data['date_from_formatted_mdy'];
        		break;
        	case 'period-week':
                $period_date_format = "%m/%d/%Y";
                $period_date_format_standard = "%Y-%m-%d";
                // $period_start_label = " Start";
                $period_start_label = " Date";
                $groupby_period = " ,YEARWEEK(r.created_at)";
                $groupby_period_exportsreports = " YEARWEEK(r.created_at)";
                // $select_max_created_at = "date_format(max(r.created_at), '%Y-%m-%d') as 'End', ";
                // $select_max_created_at_list = "date_format(r.created_at, '%Y-%m-%d') as 'End', ";
                $select_max_created_at = "";
                $select_max_created_at_list = "";
        		// $form_data['results_period'] = $form_data['date_from_formatted_mdy'].' - '.$form_data['date_to_formatted_mdy'];
        		$form_data['results_period'] = $form_data['date_from_formatted_mdy'];
                break;
        	case 'period-month':
                // $period_date_format = "%m/%Y";
                $period_date_format = "%m/%d/%Y";
                $period_date_format_standard = "%m/%d/%Y";
                $period_start_label = " Date";
                $groupby_period = " ,period_format_standard";
                $groupby_period_exportsreports = " Date";
                $select_max_created_at = "";
                $select_max_created_at_list = "";
        		$form_data['results_period'] = $form_data['date_from_formatted_my'];
        		break;
        	case 'period-year':
                // $period_date_format = "%Y";
                $period_date_format = "%m/%d/%Y";
                $period_date_format_standard = "%m/%d/%Y";
                $period_start_label = " Date";
                $groupby_period = " ,period_format_standard";
                $groupby_period_exportsreports = " Date";
                $select_max_created_at = "";
                $select_max_created_at_list = "";
        		$form_data['results_period'] = $form_data['date_from_formatted_y'];
        		break;
        	default:
                $period_date_format = "%m/%d/%Y";
                $period_date_format_standard = "%Y-%m-%d";
                $period_start_label = " Date";
                $groupby_period = "";
                $groupby_period_exportsreports = " Date";
                $select_max_created_at = "";
                $select_max_created_at_list = "";
        		$form_data['results_period'] = "";
        		break;
        }

        /* Setting WHERE condition for r.created_at date */
        $condition_period = '1';
        if ($form_data['date_from'] != '' && $form_data['date_to'] != '') {
        	$condition_period = "r.created_at BETWEEN '".$form_data['date_from']."' AND '".$form_data['date_to']."'";
        }else if ($form_data['date_to'] == ''){
        	$condition_period = "r.created_at >= '".$form_data['date_from']."'";
        }else if ($form_data['date_from'] == ''){
        	$condition_period = "r.created_at <= '".$form_data['date_to']."'";
        }
        /* Setting WHERE condition for country_group, operator_group, operator_account and show */
        $condition_country = ($form_data['country'] != '') ? "country_group = '".$form_data['country']."'" : '1';
        $condition_operator_group = ($form_data['operator_group'] != '') ? "operator_group = '".$form_data['operator_group']."'" : '1';
        $condition_operator_account = ($form_data['operator_account'] != '') ? "user_id = ".$form_data['operator_account'] : '1';
        $condition_show = ($form_data['shows'] != '') ? "post_id = ".$form_data['shows'] : '1';

        /* Select specific items per result type (sum or list) */
        $select_count = $form_data['result_type'] == 'sum' ?  " count(*) as downloaded_files, min(r.created_at) as min_created_date, max(r.created_at) as max_created_date, " : " r.file_title as downloaded_files, r.created_at as max_created_date, ";
        
        /* Group by specific item for result type (sum) */
        $group_by = $form_data['result_type'] == 'sum' ?  " GROUP BY u.id, p.id ". $groupby_period." " : " ";

        /* Preparing pagination details */
        $query_string_count = "
            SELECT date_format(r.created_at, '".$period_date_format_standard."') as period_format_standard
            FROM ".$wpdb->custom_reports." r
            INNER JOIN ".$wpdb->usermeta." um ON r.user_id = um.user_id 
            INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
            INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
            WHERE ".
            $condition_period.
            " AND ".$condition_country.
            " AND ".$condition_operator_group.
            " AND ".$condition_operator_account.
            " AND ".$condition_show.
            " AND um.meta_key = 'account_group' ".
            $group_by.
            " ORDER BY period_format_standard,u.user_email,p.post_title
        ";
        $reports_count = $wpdb->get_results($query_string_count, ARRAY_A);
        $reports_per_page = 30;
        $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
        $total_reports_count = count($reports_count);
        $limit_start = $reports_per_page * ($page - 1);

        /* Query string for displayed reports table */
        $query_string = "
    		SELECT u.id as user_id, r.country_group, r.operator_group, um.meta_value as account_group, u.user_email, p.post_title, 
                ".$select_count."
                date_format(r.created_at, '".$period_date_format."') as period, 
                date_format(r.created_at, '".$period_date_format_standard."') as period_format_standard
    		FROM ".$wpdb->custom_reports." r 
            INNER JOIN ".$wpdb->usermeta." um ON r.user_id = um.user_id
    		INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
    		INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
    		WHERE ".
    		$condition_period.
    		" AND ".$condition_country.
    		" AND ".$condition_operator_group.
    		" AND ".$condition_operator_account.
    		" AND ".$condition_show.
            " AND um.meta_key = 'account_group' ".
    		  $group_by."
              ORDER BY period_format_standard DESC,u.user_email,p.post_title
              LIMIT ".$limit_start.", ".$reports_per_page."
        ";
       
        $reports_data = $wpdb->get_results($query_string, ARRAY_A);
        // echo " <br>query_string : ".$query_string;


        /* TODO : MERGE! */
        /* QUERY string for exported reports */
        $country_groups_select_case .= getCountryGroupSelectCase();
        $group_by_exportsreports = $form_data['result_type'] == 'sum' ?  " GROUP BY r.user_id, r.post_id, ". $groupby_period_exportsreports." " : " ";
        $select_file_title_exportsreports = $form_data['result_type'] == 'sum' ?  " count(*) " : " r.file_title ";

        $query_string_exportsreports = "
            SELECT date_format(r.created_at, '".$period_date_format_standard."') as ".$period_start_label.",
                ".$select_max_created_at."
                ".$country_groups_select_case."
                IF( r.operator_group IS NULL or r.operator_group = '','Admin',r.operator_group) as operator_group, 
                IF( um.meta_value IS NULL or um.meta_value = '','',um.meta_value) as account_group, 
                u.user_email, p.post_title, ".$select_file_title_exportsreports." as downloaded_files
            FROM ".$wpdb->custom_reports." r
            INNER JOIN ".$wpdb->usermeta." um ON r.user_id = um.user_id 
            INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
            INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
            WHERE ".
            $condition_period.
            " AND ".$condition_country.
            " AND ".$condition_operator_group.
            " AND ".$condition_operator_account.
            " AND ".$condition_show.
            " AND um.meta_key = 'account_group' ".
            $group_by_exportsreports."
              ORDER BY ".$period_start_label." DESC,u.user_email,p.post_title
        ";
        // echo "<br></br>".$query_string_exportsreports;
        // $query_string_list = setRtlReportList($period_date_format, $period_date_format_standard, $period_start_label, $select_max_created_at_list, $condition_period );
        // $reports_data = $wpdb->get_results($query_string_list, ARRAY_A);
        
        // echo "<br>query_string_exportsreports : <br>".$query_string_exportsreports;

        $query_string_exportsreports_list = "
            SELECT date_format(r.created_at, '".$period_date_format_standard."') as ".$period_start_label.",
                ".$select_max_created_at."
                ".$country_groups_select_case."
                IF( r.operator_group IS NULL or r.operator_group = '','Admin',r.operator_group) as operator_group, 
                IF( um.meta_value IS NULL or um.meta_value = '','',um.meta_value) as account_group, 
                u.user_email, p.post_title, ".$select_file_title_exportsreports." as downloaded_files
            FROM ".$wpdb->custom_reports." r
            INNER JOIN ".$wpdb->usermeta." um ON r.user_id = um.user_id 
            INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
            INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
            WHERE ".
            $condition_period.
            " AND ".$condition_country.
            " AND ".$condition_operator_group.
            " AND ".$condition_operator_account.
            " AND ".$condition_show.
            " AND um.meta_key = 'account_group' ".
            $group_by_exportsreports."
              ORDER BY ".$period_start_label." DESC,u.user_email,p.post_title
        ";

        // echo "<br>query_string_exportsreports_list : <br>".$query_string_exportsreports_list;

        $return_value = updateToExportsReports($query_string_exportsreports_list, $report_name = 'RTLList' );
        $return_value = updateToExportsReports($query_string_exportsreports, $report_name = 'RTL' );

    }
}
