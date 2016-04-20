<?php 
    /*
    Plugin Name: WPDM Email Notice
    Description: Custom email notifier to operator accounts
    Dianne Katherine Delos Reyes
    Version: 1.0
    */
   

/* Email Notice */
add_action( 'pre_post_update', 'wpdm_check_new_files' );
function wpdm_check_new_files($id)
{
    $post = get_post($id, ARRAY_A);

    /* Check for attached show files */
    $wpdm_files_old = maybe_unserialize(get_post_meta($id, '__wpdm_files', true));
    $wpdm_files_new = $_POST['file']['files'];
    $files_diff=array_diff($wpdm_files_new,$wpdm_files_old);

    /* Check for attached promo files */
    $wpdm_promos_new_id = array();
    $wpdm_promos_old_id = array();
    $wpdm_promos_old = get_field( "add_promo_files" , $id);
    $wpdm_promos_new = $_POST['fields']['field_56bda9692303d'];
    array_pop($wpdm_promos_new); /* Necessary to remove extra array at the last index */

    /*
    		[field_56bda97f2303e] => On-Air
            [field_56bda9b52303f] => 20160330
            [field_56bda9eb23040] => ID
            [field_56bda9fc23041] => Start date
            [field_56bdaa1123042] => End date
            [field_56bdaa2523043] => file name
            [field_56bdaa2e23044] => Entertainment
            [field_56bdaa3923045] => Limitless
            [field_56bdaa4d23046] => RevJ
            [field_56bdaa5723047] => 30s
            [field_56bdaa6223048] => 44 MB
            [field_56bdaa6e23049] => 243
            [field_56cc2f84bbefe] => 
            [field_56de395d8068d] => Operator Group Access (all, singtel etc)
     */
    /* Restructure post data of promo files into key value pair */
    foreach ($wpdm_promos_new as $key => $value) {
        $wpdm_promos_new_id[$value['field_56bda9eb23040']] = $value['field_56bdaa2523043'];
    }
    /* Restructure DB data of promo files into key value pair */
    foreach ($wpdm_promos_old as $key => $value) {
        $wpdm_promos_old_id[$value['id']] = $value['file_name'];
    }
    $promos_diff=array_diff($wpdm_promos_new_id,$wpdm_promos_old_id);
  
    // if(count($files_diff) >= 1 || count($promos_diff) >= 1){
    	$categories = $_POST['tax_input']['wpdmcategory'];
    	// print_r($categories);
    	
	    global $wpdb;
	    $entertainment_category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = 'entertainment'");
	    $extreme_category_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = 'extreme'");

	    $is_exist_entertainment = array_search($entertainment_category_id, $categories);
	    $is_exist_extreme = array_search($extreme_category_id, $categories);

	    $operator_access = array();
	    if($is_exist_entertainment){
	    	$operator_access_entertainment = $wpdb->get_results("SELECT id, operator_group, country_group FROM $wpdb->operator_access WHERE meta_access LIKE '%entertainment%'", ARRAY_A);
	    }
	    
	    if($is_exist_extreme){
	    	$operator_access_extreme = $wpdb->get_results("SELECT id, operator_group, country_group FROM $wpdb->operator_access WHERE meta_access LIKE '%extreme%'", ARRAY_A);
	    }
	    if(isset($operator_access_entertainment)){
		    foreach ($operator_access_entertainment as $key => $value) {
		    	$operator_access[$value['id']] = array(
		    										'operator_group' => $value['operator_group'],
		    										'country_group' => $value['country_group']);
		    }
		}
	    if(isset($operator_access_extreme)){
		    foreach ($operator_access_extreme as $key => $value) {
		    	$operator_access[$value['id']] = array(
		    										'operator_group' => $value['operator_group'],
		    										'country_group' => $value['country_group']);
		    }
		}

		$operator_groups = array();
		$country_groups = array();
		if(isset($operator_access)){
		    foreach ($operator_access as $key => $value) {
		    	array_push($operator_groups, $value['operator_group']);
		    	array_push($country_groups, $value['country_group']);
		    }
		}

		$operator_groups_prepared = implode(",",$operator_groups); 
		$country_groups_prepared = implode(",",$country_groups); 

		$args = array(
			'meta_query' => array(
								'relation' => 'AND',
									array(
										'key'     => 'operator_group',
										'value'   => $operator_groups_prepared,
							 			'compare' => 'IN'
									),
									array(
										'key'     => 'country_group',
										'value'   => $country_groups_prepared,
							 			'compare' => 'IN'
									)
							)
		);
		$query_users = new WP_User_Query( $args );
		$users = $query_users->get_results();

		echo "post data-res";
	    echo "<pre>";
	    print_r($promos_diff);
	    print_r($wpdm_promos_new);
	    echo "</pre>";
	    echo "<br><br><br>";
    
		$permalink = get_permalink($id);
		foreach ($users as $user) {
			echo $user->user_email.'<br>';
			echo "link-".$permalink."<br>";
			echo "operator_group-".$user->operator_group."<br>";
			if (count($promos_diff) >= 1) {
				echo "promos:";
				foreach ($promos_diff as $pd_key => $pd_value) {
					echo "1";
					foreach ($wpdm_promos_new as $wpn_key => $wpn_value) {
						echo "2<pre>";
						// echo "->".$wpn_value['field_56bda9eb23040']."<-";
						// print_r($wpn_value);
						// echo "</pre><br>";
						
						if($wpn_value['field_56bda9eb23040'] == $pd_key){
							if($wpn_value['field_56de395d8068d'] == $user->operator_group)
								echo "->".$wpn_value['field_56bdaa2523043'];
						}
					}
					// echo "->".$wpdm_promos_new[];
				}
				// $wpdm_promos_new[]
			}
			echo "<br><br><br>";
		}

	    // echo "post data-res";
	    // echo "<pre>";
	    // print_r($operator_groups);
	    // print_r($query_string);
	    // print_r($users->operator_group);
	    // echo "string--".$query_users->request;
	    // echo "</pre>";
	    // echo "<br><br><br>";

	    // echo "post data-res";
	    // echo "<pre>";
	    // print_r($operator_access_extreme);
	    // echo "</pre>";
	    // echo "<br><br><br>";

    	die();
    // }

    // echo "promo data-new";
    // echo "<pre>";
    // print_r($wpdm_promos_new_id);
    // print_r($wpdm_promos_new);
    // echo "</pre>";
    // echo "<br><br><br>";

    // echo "promo data-old";
    // echo "<pre>";
    // print_r($wpdm_promos_old_id);
    // print_r($wpdm_promos_old);
    // echo "</pre>";
    // echo "<br><br><br>";

    // echo "promo data-diff";
    // echo "<pre>";
    // print_r($promos_diff);
    // echo "</pre>";
    // echo "<br><br><br>";
    

    // echo "post data-old";
    // echo "<pre>";
    // print_r($wpdm_files_old);
    // echo "</pre>";
    // echo "<br><br><br>";

    // echo "post data-new";
    // echo "<pre>";
    // print_r($wpdm_files_new);
    // echo "</pre>";
    // echo "<br><br><br>";

    // echo "post data-res";
    // echo "<pre>";
    // print_r($files_diff);
    // echo "</pre>";
    // echo "<br><br><br>";
    // 
    
    // echo "post data-res";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // echo "<br><br><br>";

    
}