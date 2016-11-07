<?php
/*
Contents:
------------------------------------------------
- Custom database table initialization
- General Custom Helper Fucntions
- General Customized
- Custom Cart
- Custom Export Reports
- WPFront User Role Editor
- Profile Builder
- Custom Operator Access
- Download Manager reliant
- Download Manager and ACF
- Advance Custom Fields reliant
- The Events Manager reliant
 */

/**
 * Custom database table initialization
 * ====================================================================================================================================
 */
global $wpdb;
if (!isset($wpdb->custom_cart)) {
	$wpdb->custom_cart = $wpdb->prefix . 'custom_cart';
}
if (!isset($wpdb->custom_reports)) {
    $wpdb->custom_reports = $wpdb->prefix . 'custom_reports';
}
if (!isset($wpdb->operator_access)) {
    $wpdb->operator_access = $wpdb->prefix . 'operator_access';
}
if (!isset($wpdb->exportsreports_reports)) {
    $wpdb->exportsreports_reports = $wpdb->prefix . 'exportsreports_reports';
}

/*
General Customized
====================================================================================================================================
 */
if( !function_exists('set_last_visited_show') ){
    /**
     *saves show link of last visited show
     */
    function set_last_visited_show(){
        global $post;
        $post_slug=$post->post_name;
        $_SESSION['last_visited_show'] = $post_slug;
        $_SESSION['channel_of_last_visited_show'] = $_SESSION['channel'];
    }
}

if(!function_exists('set_session_notice')){
    /**
     * Set session trigger for hiding mobile modal notice
     */
    function set_session_notice(){
        $noticenonce = $_POST['noticenonce'];
        if (!empty($_POST) && wp_verify_nonce($noticenonce, '__rtl_modal_notice__') ){
            $_SESSION['modal_notice'] = 'hide';
            echo "success";
        }else{
            echo "Invalid Access";
        }
        die();
    }
    add_action('wp_ajax_set_session_notice', 'set_session_notice');
    add_action( 'wp_ajax_nopriv_set_session_notice', 'set_session_notice' );
}

/**
 * Adds 'episode' in query vars
 */
function add_query_vars_filter( $vars ){
  $vars[] = "episode";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

/**
 * To override Activate page function
 */
function rtl_wpmu_signup_user_notification( $user, $user_email, $key, $meta = array() ) {
    // Send email with activation link.
    $admin_email = get_site_option( 'admin_email' );
    if ( $admin_email == '' )
        $admin_email = 'support@' . $_SERVER['SERVER_NAME'];
    $from_name = get_site_option( 'site_name' ) == '' ? 'WordPress' : esc_html( get_site_option( 'site_name' ) );
    $message_headers = "From: \"{$from_name}\" <{$admin_email}>\n" . "Content-Type: text/plain; charset=\"" . get_option('blog_charset') . "\"\n";
    $message = sprintf(
        apply_filters( 'wpmu_signup_user_notification_email',
            __( "To activate your user, please click the following link:\n\n%s\n\nAfter you activate, you will receive *another email* with your login." ),
            $user, $user_email, $key, $meta
        ),
        site_url( "activate/?key=$key" )
    );
    // TODO: Don't hard code activation link.
    $subject = sprintf(
        apply_filters( 'wpmu_signup_user_notification_subject',
            __( '[%1$s] Activate %2$s' ),
            $user, $user_email, $key, $meta
        ),
        $from_name,
        $user
    );
    wp_mail( $user_email, wp_specialchars_decode( $subject ), $message, $message_headers );
    return true;
}
add_filter('wpmu_signup_user_notification', 'rtl_wpmu_signup_user_notification', 10, 4);

/*
Custom Cart
====================================================================================================================================
 */
if (!function_exists('getCustomCartData')){
    /**
     * Description:                  Returns cart count entry, cart contents or items count
     * @param  string $data_to_count 'cart count' - Cart entry count (1 or 0).
     *                               'items count' - Cart items count
     *                               'cart contents' - Array of cart files
     * @return Integer               Cart count or contents
     */
    function getCustomCartData($data = 'cart count'){
        global $wpdb;
        $user_id = get_current_user_id( );
        $return_value = 0;
       
        $cart_entry = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );

        if ($data == 'cart count'){
            $return_value = !empty($cart_entry) ? count($cart_entry) : 0;

        }else if ($data == 'items count') {
            if (!empty($cart_entry)) {
                $rawCart = unserialize(trim($cart_entry->meta_file));
                if($rawCart !== false){
                    $return_value = count($rawCart);
                }
            }

        }else if ($data == 'cart contents') { 
            $cart_data_unserialized = unserialize($cart_entry->meta_file);
            $return_value = $cart_data_unserialized !== false ? $cart_data_unserialized : array();
        }

        return $return_value;
    }
}

if (!function_exists('ajaxGetCustomCartItemsCount')){
    function ajaxGetCustomCartItemsCount(){
        $return_value = getCustomCartData('items count');
        echo $return_value;
        die();
    }
    add_action('wp_ajax_get_custom_cart_items_count', 'ajaxGetCustomCartItemsCount');
}

function insertToCustomCart($serialized_cart){
    global $wpdb;
    $user_id = get_current_user_id( );
    $return_value = $wpdb->insert(
                            $wpdb->custom_cart,
                            array(
                                'user_id' => $user_id,
                                'meta_file' => $serialized_cart,
                                'created_at' => date('Y-m-d H:i:s')
                            )
                        );
    return $return_value;
}

function updateToCustomCart($serialized_cart){
    global $wpdb;
    $user_id = get_current_user_id( );
    $return_value = $wpdb->update( 
                            $wpdb->custom_cart, 
                            array('meta_file' => $serialized_cart), 
                            array( 
                                'user_id' => $user_id
                                )
                        );
    return $return_value;
}

function deleteToCustomCart(){
    global $wpdb;

    $user_id = get_current_user_id( );
    $return_value = $wpdb->delete( 
                            $wpdb->custom_cart, 
                            array( 
                                'user_id' => $user_id
                            ) 
                        );
    return $return_value;
}

function fetchEntryFromCustomCart(){
    global $wpdb;
    $user_id = get_current_user_id( );
    $cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );
    $cart_entry = is_array($cart_entry) ? $cart_entry[0] : false;
    return $cart_entry;
}

if(!function_exists('bulk_add_to_cart')){
    /**
     * Ajax function to o a bulk add to cart feature
     */
    function bulk_add_to_cart() {
        global $wpdb;
        $cartnonce = $_POST['cartnonce'];

        if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
            $cart_data['file_data']     = unserializeForm($_POST['data']);
            $cart_data_count = count($cart_data['file_data']);
            $empty_table_detector = true;
            foreach ( $cart_data['file_data'] as $key => $value) {
                $empty_table_detector = $cart_data_count == 1 ? ($key == '' ? false : true): true ;
                $cart_data_serialized[$key]         = $value;//urldecode($value);
                $cart_data_unserialized[$key]       = unserialize($cart_data_serialized[$key]);
                $cart_data_unserialized[$key]['download_url'] = urldecode($cart_data_unserialized[$key]['download_url']);
            }
            if($empty_table_detector){
                $user_id = get_current_user_id( );
                $cart_entry_count = getCustomCartData();

                if($cart_entry_count == 0 ){
                    $serialized_cart = serialize($cart_data_unserialized);
                    $return_value = insertToCustomCart($serialized_cart);
                }else {
                    $cart_entry = fetchEntryFromCustomCart();
                    $unserialized_cart = unserialize($cart_entry);
                    $serialized_cart = serialize($unserialized_cart+$cart_data_unserialized);
                    $return_value = updateToCustomCart($serialized_cart);
                }
            }else{
                $return_value = 0;
            }
        }else {
            $return_value = 0;
        }
        echo $return_value == 1 ? "success" : "failed";
        die();
    }
    add_action('wp_ajax_bulk_add_to_cart', 'bulk_add_to_cart');
}

if(!function_exists('add_to_cart')){
    /**
     * Ajax function for adding specific files to cart
     */
    function add_to_cart(){
        global $wpdb;
        $cartnonce = $_POST['cartnonce'];
        if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
            $cart_data = prepare_cart_data($_POST);
            $cart_array = structure_cart_data($cart_data);
            $cart_entry_count = getCustomCartData();
            if($cart_entry_count == 0 ){
                $serialized_cart = serialize($cart_array);
                $return_value = insertToCustomCart($serialized_cart);
            }else {
                $cart_entry = fetchEntryFromCustomCart();
                $unserialized_cart = unserialize($cart_entry);
                $serialized_cart = serialize($unserialized_cart+$cart_array);
                $return_value = updateToCustomCart($serialized_cart);
            }
        }else {
            $return_value = 1;
        }
        echo $return_value == 1 ? "success" : "failed";
        die();
    }
    add_action('wp_ajax_add_to_cart', 'add_to_cart');
}

if(!function_exists('remove_to_cart')){
    /**
     * Ajax function to remove item in custom cart table
     */
    function remove_to_cart(){
        global $wpdb;

        $cartnonce = $_POST['cartnonce'];
        if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 

            $cart_data['file_id']       = $_POST['file-id'];
            $cart_data['user_id']       = $_POST['user-id'];

            $cart_entry_count = getCustomCartData();

            if($cart_entry_count == 1 ){
                $raw_cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}");
                $cart_entry = is_string($raw_cart_entry[0]) ? unserialize($raw_cart_entry[0]) : false;
                $meta_file_count = is_array($cart_entry) ? count($cart_entry) : 0;

                if($cart_entry!==false){
                    if(array_key_exists($cart_data['file_id'],$cart_entry)) {
                        if($meta_file_count > 1){
                            unset($cart_entry[$cart_data['file_id']]);
                            $serialized_cart = serialize($cart_entry);
                            $return_value = updateToCustomCart($serialized_cart);
                        }else {
                            $return_value = deleteToCustomCart();
                        }
                        $return_value = "success";
                    }
                }else {
                    $return_value = "failed";
                }
            }else {
                $return_value = "failed";
            }

        }else {
                $return_value = "failed";
        }
        echo $return_value;
        die();
    }
    add_action('wp_ajax_remove_to_cart', 'remove_to_cart');
}

if(!function_exists('bulk_download')){
    /**
     * function to do a bulk download
     */
    function bulk_download() {
        $files = array();
        $cart_files = get_custom_cart_contents();
        foreach ($cart_files as $key => $value) {
            $files[$key] = $value['file_path'];
        }
         
        $zip = new ZipArchive();
        $date_now = date('Y-m-d');
        $zipped = UPLOAD_DIR . 'Cart-files-'.$date_now.'.zip';
        $zip->open($zipped, ZIPARCHIVE::CREATE);

        foreach ($files as $file) {
            $file = trim($file);
            if (file_exists(UPLOAD_DIR . $file)) {
                $fnm = preg_replace("/^[0-9]+?wpdm_/", "", $file);
                $zip->addFile(UPLOAD_DIR . $file, $fnm);
            } else if (file_exists($file))
                $zip->addFile($file, wpdm_basename($file));
            else if (file_exists(WP_CONTENT_DIR . end($tmp = explode("wp-content", $file)))) //path fix on site move
                $zip->addFile(WP_CONTENT_DIR . end($tmp = explode("wp-content", $file)), wpdm_basename($file));
        }

        $zip->close();
        wpdm_download_file($zipped, 'Cart-files-'.$date_now.'.zip');
        @unlink($zipped);
    }
}

if(!function_exists('prepare_cart_data')){
    /**
     * function to prepare cart data before structuring for serialization
     */
    function prepare_cart_data($post_data){
        $cart_data['file_id']       = isset($post_data['file-id']) ? $post_data['file-id'] : null;
        $cart_data['file_title']    = isset($post_data['file-title']) ? $post_data['file-title'] : null;
        $cart_data['file_path']     = isset($post_data['file-path']) ? $post_data['file-path'] : null;
        $cart_data['download_url']  = isset($post_data['download-url']) ? $post_data['download-url'] : null;
        $cart_data['post_id']       = isset($post_data['post-id']) ? $post_data['post-id'] : null;
        $cart_data['file_type']     = isset($post_data['file-type']) ? $post_data['file-type'] : null;
        $cart_data['user_id']       = isset($post_data['user-id']) ? $post_data['user-id'] : null;
        $cart_data['thumb']         = isset($post_data['thumb']) ? $post_data['thumb'] : null;
        $cart_data['channel']       = isset($post_data['channel']) ? $post_data['channel'] : null;
        return $cart_data;
    }
}

if(!function_exists('structure_cart_data')){
    /**
     * function to structure cart data into serialization ready array
     */
    function structure_cart_data($cart_data){
        $cart_array = array (
                $cart_data['file_id'] => array (
                        'file_title' => $cart_data['file_title'],
                        'file_path' => $cart_data['file_path'],
                        'download_url' => $cart_data['download_url'],
                        'post_id' => $cart_data['post_id'],
                        'file_type' => $cart_data['file_type'],
                        'user_id' => $cart_data['user_id'],
                        'thumb' => $cart_data['thumb'],
                        'channel' => $cart_data['channel']
                    )
            );
        return $cart_array;
    }
}

if(!function_exists('get_custom_cart_contents')){
    /**
     * Get contents of custom cart
     * @param  String $fileType     Either image, promo or file
     * @return Array                Cart Contents
     */
    function get_custom_cart_contents($fileType = null,$format = null){
        $rawCart = getCustomCartData('cart contents');
        
        $myCart = array();
        if (!empty($rawCart)) {
                foreach ($rawCart as $key => $value) {
                    $channel = isset($value['channel']) && $value['channel'] != '' ? strtolower($value['channel']) : strtolower($_SESSION['channel']);
                    $file_type = isset($value['file_type']) && $value['file_type'] != '' ? strtolower($value['file_type']) : 'image';
                    if($format == 'categorized'){   
                        $myCart[$channel][$file_type][$key] = array (
                                    'file_title' => $value['file_title'],
                                    'file_path' => $value['file_path'],
                                    'download_url' => $value['download_url'],
                                    'post_id' => $value['post_id'],
                                    'file_type' => $value['file_type'],
                                    'user_id' => $value['user_id'],
                                    'thumb' => $value['thumb'],
                                    'channel' => $value['channel']
                                );
                    }else {
                        $myCart[$key] = array (
                                    'file_title' => $value['file_title'],
                                    'file_path' => $value['file_path'],
                                    'download_url' => $value['download_url'],
                                    'post_id' => $value['post_id'],
                                    'file_type' => $value['file_type'],
                                    'user_id' => $value['user_id'],
                                    'thumb' => $value['thumb'],
                                    'channel' => $value['channel']
                                );
                    }
                }
        }
        return $myCart != null ? $myCart : array();
    }
}

if(!function_exists('download_file')){
    /**
     * Ajax function for downloading specific files to cart and saving it to reports log
     */
    function download_file(){
        $cartnonce = $_POST['cartnonce'];
        if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
            $cart_data['file_title']     = $_POST['file-title'];
            $cart_data['file_path']     = $_POST['file-path'];
            $cart_data['download_url']  = $_POST['download-url'];
            $cart_data['post_id']       = $_POST['post-id'];
            $cart_data['file_type']     = $_POST['file-type'];
            $cart_data['user_id']       = get_current_user_id();
            $cart_data['file_id']       = $_POST['file-id'];

            $raw_cart_data = fetchEntryFromCustomCart();
            $unserialized_cart = is_string($raw_cart_data) ? unserialize($raw_cart_data) : false;
            $return_value = insertToCustomReports(serialize(structure_reports_data($cart_data)));
            
            $cart_files_count = count($unserialized_cart);

            if ($cart_files_count > 1) {
                unset($unserialized_cart[$cart_data['file_id']]);
                $return_value = updateToCustomCart(serialize($unserialized_cart));
            }else if ($cart_files_count == 1){
                $return_value = deleteToCustomCart();
            }
        }else {
            $return_value = 0;
        }
        // TODO: update return value
        echo $return_value == 1 ? "success" : "failed";
        die();
    }
    add_action('wp_ajax_download_file', 'download_file');
}

if (!function_exists('checkFileInCart')){
    /**
     * @usage function to check if a specific file is present in the cart
     * @param $fileID
     * @return bool
     * @usage returns 1 if file is present in the cart, otherwise 0
     */
    function checkFileInCart($fileID){
        $cart_array = get_custom_cart_contents();
        $cart_array_filtered = array_filter($cart_array);
        if(!empty($cart_array_filtered)){
            return array_key_exists($fileID, $cart_array);
        }
        return 0;
    }
}

/*
Custom Export Reports
====================================================================================================================================
 */
function updateToExportsReports($query_string_exportsreports_list){
    global $wpdb;
    $return_value = $wpdb->update( 
        $wpdb->exportsreports_reports, 
        array( 
            'sql_query' => $query_string_exportsreports_list
        ), 
        array( 'name' => 'RTLList' )
    );
    return $return_value;
}

if(!function_exists('insertToCustomReports')){
    /**
     * Insert download logs to custom reports table
     * @param  string $serialized_cart serialized cart data
     * @return bool                    Database insert boolean result
     */
    function insertToCustomReports($serialized_cart){
        global $wpdb;
        $return_value = 0;

        $unserialized_cart = unserialize($serialized_cart);

        if($unserialized_cart !== false){
            foreach ($unserialized_cart as $file_id => $value) {

                $user_id = get_current_user_id( );
                $country_group = get_current_user_country_group($user_id);
                $operator_group = get_current_user_operator_group($user_id);

                $return_value = $wpdb->insert(
                                        $wpdb->custom_reports,
                                        array(
                                            'user_id' => $user_id,
                                            'country_group' => $country_group,
                                            'operator_group' => $operator_group,
                                            'post_id' => $value['post_id'],
                                            'file_id' => $file_id,
                                            'file_title' => $value['file_title'],
                                            'file_path' => $value['file_path'],
                                            'file_type' => $value['file_type'],
                                            'download_url' => $value['download_url'],
                                            'created_at' => date('Y-m-d H:i:s')
                                        )
                                    );
            }
        }
        return $return_value;
    }
}

if(!function_exists('reports_log')){
    /**
     * Function to save bulk downloads to reports table
     */
    function reports_log(){
        $raw_cart_data = fetchEntryFromCustomCart();
        return insertToCustomReports($raw_cart_data);
    }
}

if(!function_exists('structure_reports_data')){
    /**
     * function to structure reports data into serialization ready array
     */
    function structure_reports_data($cart_data){
        $cart_array = array (
                $cart_data['file_id'] => array (
                        'file_title' => $cart_data['file_title'],
                        'file_path' => $cart_data['file_path'],
                        'download_url' => $cart_data['download_url'],
                        'post_id' => $cart_data['post_id'],
                        'file_type' => $cart_data['file_type'],
                        'user_id' => $cart_data['user_id']
                    )
            );
        return $cart_array;
    }
}

if(!function_exists('setRtlReportList')){
    /**
     * To generate query string of RTL Report List
     * @param string $period_date_format          Date format for display in tables
     * @param string $period_date_format_standard Date format for CSV
     * @param string $period_start_label          Column header of Period Start
     * @param string $select_max_created_at_list  Max created_at date
     * @param [type] $condition_period            Where clause
     */
    function setRtlReportList($period_date_format = "%m/%d/%Y", $period_date_format_standard = "%Y-%m-%d", $period_start_label = " Period", $select_max_created_at_list = "", $condition_period = null){
        global $wpdb;
        $country_groups_select_case .= getCountryGroupSelectCase();

        $condition_period = $condition_period != null || $condition_period != "" ? $condition_period : "r.created_at BETWEEN '".date('Y-m-01', strtotime('previous month'))." 00:00:00' AND '".date('Y-m-t', strtotime('previous month'))." 23:59:59'";
        $query_string_exportsreports_list = "
            SELECT date_format(r.created_at, '".$period_date_format_standard."') as ".$period_start_label.",
                ".$select_max_created_at_list."
                ".$country_groups_select_case."
                IF( r.operator_group IS NULL or r.operator_group = '','Admin',r.operator_group) as operator_group, 
                u.user_email, p.post_title, r.file_title as downloaded_files
            FROM ".$wpdb->custom_reports." r 
            INNER JOIN ".$wpdb->users." u ON r.user_id = u.id
            INNER JOIN ".$wpdb->posts." p ON r.post_id = p.id
            WHERE ".$condition_period.
            " ORDER BY ".$period_start_label." DESC,u.user_email,p.post_title
        ";
        // echo "<br><br>list:".$query_string_exportsreports_list;
        $return_value = updateToExportsReports($query_string_exportsreports_list);

        return $query_string_exportsreports_list;
    }
}

if(!function_exists('getCountryGroupSelectCase')){
    /**
     * Format select case of country group for RTL Report List
     */
    function getCountryGroupSelectCase(){
        $country_groups = custom_get_country_groups();
        $country_groups_select_case = "";

        $country_groups_select_case .= "case r.country_group ";
        foreach ($country_groups as $key => $value) {
            if($key != '')
                $country_groups_select_case .= "when '".$key."' then '".$value."' ";
            else
                $country_groups_select_case .= "when '' then 'Admin' ";
        }
        $country_groups_select_case .= "else 'Admin' ";
        $country_groups_select_case .= "end as country_group, ";

        return $country_groups_select_case;
    }
}

if(!function_exists('send_monthly_report')){
    /**
     * Send monthly reports to all administrator users
     * @param  String $file file name
     */
    function send_monthly_report($file){
        $users = get_users('role=Administrator');
        foreach ($users as $user) {
            $to = $user->user_email;//'diannekatherinedelosreyes@ymail.com';
            $subject = 'RTL CBS Asia Monthly Report';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            $mail_attachment = $file;

            $message = "
                Hi {$user->user_email},<br><br>
                Please see attached report:<br>
                <ul>
                    <li>List of Downloaded Files from All Operators of Previous Month</li>
                </ul>
                You may also <a href='".get_site_url()."/rtlcbs-admin'>Log In</a> to the Operator Website to see more reports.<br><br>
                Thanks,<br>
                RTL CBS Asia Team
            ";

            ob_start();
            $result = wp_mail($to,$subject,$message,$headers,$mail_attachment);
            $smtp_debug = ob_get_clean();
            echo "<script>console.log('Email sent to : {$user->user_email}')</script>";
            echo "<script>console.log('Result : {$result}')</script>";
        } 
    }
}

/*
WPFront User Role Editor
====================================================================================================================================
 */
if (!function_exists('custom_get_operator_accounts')) {
    /**
     * Get all operator accounts users
     * @return array key value pair of operator accounts
     */
    function custom_get_operator_accounts(){
        global $wpdb;

        $query_string = "   SELECT u.id, u.user_email 
                            FROM $wpdb->users u INNER JOIN $wpdb->usermeta um 
                            ON u.id = um.user_id
                            WHERE um.meta_key = '".$wpdb->prefix."capabilities'
                            AND um.meta_value LIKE '%operator%'
                            ORDER BY u.user_email
                            ";
        $raw_operator_accounts = $wpdb->get_results($query_string, ARRAY_A);

        $operator_accounts = array();

        foreach ($raw_operator_accounts as $key => $value) {
            $operator_accounts[$value['id']] = $value['user_email'];
        }
        // return $query_string;
        return $operator_accounts;
    }
}

/*
Profile Builder
====================================================================================================================================
 */
if( !function_exists('get_current_user_operator_group') ){
    /**
     * Get current operator group of logged user.
     * @return String|bool Returns user role if logged in, else return false;
     */
    function get_current_user_operator_group($user_id = NULL){
        $userid = $user_id == NULL || $user_id == '' ? get_current_user_id() : $user_id;
        return get_user_meta( $userid, 'operator_group', true);
    }
}

if( !function_exists('get_current_user_country_group') ){
    /**
     * Get current country group of logged user.
     * @return String|bool Returns country group if logged in, else return false;
     */
     function get_current_user_country_group($user_id = NULL){
        $userid = $user_id == NULL || $user_id == '' ? get_current_user_id() : $user_id;
        return get_user_meta( $userid, 'country_group', true);
    }
}

if (!function_exists('custom_get_country_groups')){
    /**
     * Get Country groups declared in profile builder plugin
     * @return array key value pair of country groups
     */
    function custom_get_country_groups()
    {
        global $wpdb;

        $raw_operator_group = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'wppb_manage_fields' ");
        $unserialized_operator_group = is_string($raw_operator_group) ? unserialize($raw_operator_group) : false;

        $operator_groups = array();
        if($unserialized_operator_group !== false){
            $operator_groups_options = explode( ',', $unserialized_operator_group[0]['options']);
            $operator_groups_labels = explode( ',', $unserialized_operator_group[0]['labels']);

            foreach ($operator_groups_options as $key => $value) {
                $operator_groups[$value] = $operator_groups_labels[$key];
            }
        }
        return $operator_groups;
    }
}

if (!function_exists('custom_get_operator_groups')){
    /**
     * Get all operator groups declared in profile builder plugin
     * @return array key value pair of operator groups
     */
    function custom_get_operator_groups()
    {
        global $wpdb;

        $raw_operator_group = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'wppb_manage_fields' ");
        $unserialized_operator_group = unserialize($raw_operator_group);

        $operator_groups = array();
        $operator_groups_options = explode( ',', $unserialized_operator_group[1]['options']);
        $operator_groups_labels = explode( ',', $unserialized_operator_group[1]['labels']);

        foreach ($operator_groups_options as $key => $value) {
            $operator_groups[$value] = $operator_groups_labels[$key];
        }
        return $operator_groups;
    }
}

if (!function_exists('get_country_name')) {
    /**
     * Description:        Returns country name via ISO
     * @param  string $iso ISO code of country
     * @return string      Country group name
     */
    function get_country_name($iso = 'PH'){
        $iso = strtoupper($iso);
        $country_groups = custom_get_country_groups();
        return $country_groups[$iso];
    }
}

if(!function_exists('modify_user_table_row')){
    /**
     * Override Country Group column in Users table
     */
    function modify_user_table_row( $val, $column_name, $user_id ) {
        $user = get_userdata( $user_id );
        return $column_name == 'country_group' ? get_country_name(get_user_meta($user_id, 'country_group', true)) : $val;
    }
    add_filter( 'manage_users_custom_column', 'modify_user_table_row', 10, 3 );
}

/*
Custom Operator Access
====================================================================================================================================
 */
if( !function_exists('get_current_user_operator_access') ){
    /**
     * Get current operator access of logged user.
     * @return Array Returns array of channels allowed to a specific account;
     */
    function get_current_user_operator_access(){
        global $wpdb;
        // echo get_current_user_operator_group();
        $user_id = get_current_user_id( );
        $country_group = get_current_user_country_group();
        $operator_group = get_current_user_operator_group();
        $access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" );
        $array_access = is_array($access) ? unserialize($access[0]) : false;
     
        $array_access_simplified = array();
        if($array_access !== false){
            foreach ($array_access as $key => $value) {
                array_push($array_access_simplified,$value);
            }
        }
        
        return $array_access_simplified;
    }
}

if( !function_exists('get_all_operator_access') ){
    /**
     * Get current operator access of logged user.
     * @return Array Returns array of channels allowed to a specific account;
     */
    function get_all_operator_access(){
        global $wpdb;
        $operator_access = $wpdb->get_results( "SELECT id, operator_group, country_group, meta_access FROM $wpdb->operator_access ORDER BY country_group, operator_group", ARRAY_A );
        $operator_access_prep = array();

        foreach ($operator_access as $key => $value) {
            $meta_access_unserialized = unserialize($value['meta_access']);
            // $meta_access_simplified = implode(' , ', $meta_access_unserialized);
            $meta_access_simplified = $meta_access_unserialized != NULL ? implode(' , ', $meta_access_unserialized) : "";
            $operator_access_prep[$value['id']] = array(
                                'operator_group' => $value['operator_group'],
                                'country_group' => $value['country_group'],
                                'meta_access_unserialized' => $meta_access_simplified);
        }
        
        return $operator_access_prep;
    }
}

if( !function_exists('set_channel_access') ){
    /**
     *Set channel access
     * @return Bool Returns 1 if user has an access, else 0
     */
    function set_channel_access($channel = 'entertainment', $use_default = false){
        $return_value = 0;
        if(is_user_logged_in()){
            global $wpdb;
            $user_id = get_current_user_id( );
            $country_group = get_current_user_country_group();
            $operator_group = get_current_user_operator_group();
            $access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" );
            
            if(!empty($access) && $access !== false){
                // echo "-not admin-";
                $array_access_simplified = array();
                $array_access = is_array($access) && count($access) > 0 ? unserialize($access[0]) : false;
                if(!empty($array_access) && $array_access !== false){
                    foreach ($array_access as $key => $value) {
                        array_push($array_access_simplified,$value);
                    }
                    $return_value = in_array($channel, $array_access_simplified);
                    if($use_default) 
                        set_default_channel($array_access_simplified[0]);
                    else
                        $_SESSION['channel'] = $channel;
                }else {
                    $_SESSION['channel'] = 'none';
                }
            }else if (get_current_user_role() == 'administrator'){
                // echo "-admin-";
                $return_value = 1;
                set_default_channel($channel);
            }else {
                $return_value = 0;
                $_SESSION['channel'] = 'none';
            }
        }
        return $return_value;
    }
}

if( !function_exists('set_selected_channel') ){
    /**
     *Set channel access
     * @return Bool Returns 1 if user has an access, else 0
     */
    function set_selected_channel($channel = 'entertainment'){
        $_SESSION['channel'] = $channel;
    }
}

if( !function_exists('check_if_have_channel_access') ){
    /**
     *Check if logged user has an access to a certain channel
     * @return Bool Returns 1 if user has an access, else 0
     */
    function check_if_have_channel_access($channel = 'entertainment'){
        $return_value = 0;
        if(is_user_logged_in()){
            global $wpdb;
            $user_id = get_current_user_id( );
            $country_group = get_current_user_country_group();
            $operator_group = get_current_user_operator_group();
            $raw_access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" );
            $access = count($raw_access) > 0 ? $raw_access[0] : "";
            $array_access = is_string($access) ? unserialize($access) : false;

            if(!empty($array_access) && $array_access !== false){
                $array_access_simplified = array();
                foreach ($array_access as $key => $value) {
                    array_push($array_access_simplified,$value);
                }
                $return_value = in_array($channel, $array_access_simplified);

            }else if (get_current_user_role() == 'administrator'){
                $return_value = 1;
            }else {
                $return_value = 0;
            }
        }
        return $return_value;
    }
}

if( !function_exists('set_default_channel') ){
    /**
     *Check if logged user has an access to a certain channel
     * @return Bool Returns 1 if user has an access, else 0
     */
    function set_default_channel($channel = 'entertainment'){
        $_SESSION['channel'] = $channel;
    }
}

if (!function_exists('checkShowAssignedChannel')) {
    /**
     * Description:            Check if specific show is assigned in a given channel
     * @param  string $posd_id Post ID of Shows
     * @param  string $channel entertainment or extreme
     * @return bool            1 if assigned, otherwise 0
     */
    function checkShowAssignedChannel($posd_id, $channel){
        $terms = get_the_terms($posd_id,'wpdmcategory');
        $return_value = 0;
        /* Check if current session channel matches the show */
        foreach ($terms as $key => $value) {
            if ($value->slug == $channel || $value->slug == 'shows-'.$channel){
                $return_value = 1;
            }else if (check_if_have_channel_access($value->slug)){
                $return_value = 1;
            }
        }
        return $return_value;
    }
}

if (!function_exists('custom_get_rtl_channels')){
    /**
     * Get rtl channels
     * @return array key value pair of name and slug of rtl channels
     */
    function custom_get_rtl_channels()
    {
        global $wpdb;

        $raw_rtl_channels = $wpdb->get_results("SELECT name,slug FROM $wpdb->terms WHERE slug IN('entertainment', 'extreme' ) ");
        $rtl_channels = array();

        foreach ($raw_rtl_channels as $key => $value) {
            $rtl_channels[$value->slug] = $value->name;
        }
        return $rtl_channels;
    }
}


/*
Download Manager reliant
====================================================================================================================================
 */
if( !function_exists('getFilePath') ) {
    /**
     * Description:                 Get file upload path of a specified file name
     * @param  string $sfile        The source string(3894343983483_KEY_349304930.jpg)
     * @return string               File path
     */
    function getFilePath($sfile) {
        // $ind = \WPDM_Crypt::Encrypt($sfile);
        // return wpdm_download_url($sfile) . "&ind=" . $ind;
        return file_exists($sfile)?$sfile:UPLOAD_DIR.$sfile;
    }
}

if (!function_exists('custom_wpdm_file_size')){
    /**
     * @usage Calculate file size
     * @param $file
     * @return float|int|mixed|string
     */
    function custom_wpdm_file_size($file, $decimal_place = 2){
        if(file_exists($file))
            $size = filesize($file);
        else if(file_exists(UPLOAD_DIR.$file))
            $size = filesize(UPLOAD_DIR.$file);
        else $size = 0;
        $size = $size / 1024;
        if ($size > 1024) $size = number_format($size / 1024, $decimal_place) . ' MB';
        else $size = number_format($size, $decimal_place) . ' KB';
        return $size;
    }
}

if( !function_exists('getImageThumbnail') ) {
    /**
     * Description:                         Get image special thumbnail for non web compatible file format
     * @param  string $filename             Filename of original file
     * @param  array $specific_thumbnails   Array of special uploaded image files
     * @return string                       Associated special thumbnail for the given filename if available
     */
    function getImageThumbnail($filename, $specific_thumbnails = null) {
        if (checkIfImageFile($filename,'image','notpure') && $specific_thumbnails != null){
            $sfile_withoutext = removeFileExtension($filename);
            foreach ($specific_thumbnails as $specificthumbnail_key => $specificthumbnail_value) {
                if(contains($specificthumbnail_value,$sfile_withoutext)){
                    $thumnail_name = $specificthumbnail_value;
                }else {
                    $thumnail_name = $filename;
                }
            }
        }else {
            $thumnail_name = $filename;
        }
        $thumb = checkIfImageFile($thumnail_name, 'image', 'pure' ) ? wpdm_dynamic_thumb(getFilePath($thumnail_name), array(500, 300)) : null;
        return $thumb;
    }
}

function getPostInfoByTitle($title){
    global $wpdb;  
    $prep_title = str_replace("'","\'",$title); 
    $show_query_string = "  SELECT DISTINCT p.id, p.post_name
                            FROM $wpdb->posts p 
                            JOIN $wpdb->postmeta pm
                            ON p.id = pm.post_id
                            WHERE p.post_title LIKE '%".$prep_title."'
                            AND p.post_status = 'publish'
                            AND p.post_type = 'wpdmpro'";                         
    $show_info = $wpdb->get_row( $show_query_string , ARRAY_A);
    return $show_info;
}

function custom_posts_where( $where){
    global $wpdb;
    if(isset($wpdb->letter_filter) && $wpdb->letter_filter != null && $wpdb->letter_filter != ''){
        if($wpdb->letter_filter != 'others')
            $where .= " AND post_title LIKE '".$wpdb->letter_filter."%' ";
        else 
            $where .= " AND post_title REGEXP '^[0-9#$%^&*()+=;,.{}]' ";
    }
    if(isset($wpdb->search_filter) && $wpdb->search_filter != null && $wpdb->search_filter != ''){
        $where .= " AND post_title LIKE '%".$wpdb->search_filter."%'";
    }
    return $where;
}

function wpdm_category_custom($params)
{
    $params['order_field'] = isset($params['order_by'])?$params['order_by']:'publish_date';
    unset($params['order_by']);
    if (isset($params['item_per_page']) && !isset($params['items_per_page'])) $params['items_per_page'] = $params['item_per_page'];
    unset($params['item_per_page']);
    return wpdm_embed_category_custom($params);
}

function wpdm_embed_category_custom($params = array('id' => '', 'operator' => 'IN' , 'items_per_page' => 10, 'title' => false, 'desc' => false, 'order_field' => 'create_date', 'order' => 'desc', 'paging' => false, 'toolbar' => 1, 'template' => '','cols'=>3, 'colspad'=>2, 'colsphone' => 1, 'letter_filter' => null, 'search_filter' => null))
{
    extract($params);
    $fnparams = $params;
    if(!isset($id)) return;
    if(!isset($items_per_page)) $items_per_page = 10;
    if(!isset($template)) $template = 'link-template-rtlcbscustom.php';
    if(!isset($cols)) $cols = 3;
    if(!isset($colspad)) $colspad = 2;
    if(!isset($colsphone)) $colsphone = 1;
    if(!isset($toolbar)) $toolbar = 1;
    $taxo = 'wpdmcategory';
    if(isset($tag) && $tag==1) $taxo = 'post_tag';

    $id = trim($id, ", ");
    $cids = explode(",", $id);
    $channel_materials = array('channel-materials-entertainment','channel-materials-extreme');

    global $wpdb, $current_user, $post, $wp_query;

    $order_field = isset($order_field) ? $order_field : 'publish_date';
    $order_field = isset($_GET['orderby']) ? $_GET['orderby'] : $order_field;
    $order = isset($order) ? $order : 'desc';
    $order = isset($_GET['order']) ? $_GET['order'] : $order;
    $operator = isset($operator)?$operator:'IN';
    $cpvar = 'cp_'.$cids[0];
    $cp = wpdm_query_var($cpvar,'num');
    if(!$cp) $cp = 1;
    $wpdb->letter_filter = $letter_filter;
    $wpdb->search_filter = $search_filter;

    $params = array(
        'post_type' => 'wpdmpro',
        'paged' => $cp,
        'posts_per_page' => $items_per_page,
        'include_children' => false,
        'tax_query' => array(array(
                'taxonomy' => $taxo,
                'field' => 'slug',
                'terms' => $cids,
                'operator' => $operator
            ), array(
                'taxonomy' => $taxo,
                'field' => 'slug',
                'terms' => $channel_materials,
                'operator' => 'NOT IN'
            )
        )
    );

    if (get_option('_wpdm_hide_all', 0) == 1) {
        $params['meta_query'] = array(
            array(
            'key' => '__wpdm_access',
            'value' => 'guest',
            'compare' => 'LIKE'
            )
        );
        if(is_user_logged_in()){
            global $current_user;
            $params['meta_query'][] = array(
                'key' => '__wpdm_access',
                'value' => $current_user->roles[0],
                'compare' => 'LIKE'
            );
            $params['meta_query']['relation'] = 'OR';
        }
    }

    if(isset($tags) && $tags != ''){
        $params['tag'] = $tags;
    }

    $params['orderby'] = $order_field;
    $params['order'] = $order;
    $params = apply_filters("wpdm_embed_category_query_params", $params);
    add_filter( 'posts_where' , 'custom_posts_where' );
    $packs = new WP_Query($params);
    remove_filter( 'posts_where' , 'custom_posts_where' );

    $total = $packs->found_posts;
    $pages = ceil($total / $items_per_page);
    $page = isset($_GET[$cpvar]) ? $_GET[$cpvar] : 1;
    $start = ($page - 1) * $items_per_page;

    if (!isset($paging) || $paging == 1) {
        $pag = new \WPDM\libs\Pagination();
        $pag->items($total);
        $pag->limit($items_per_page);
        $pag->currentPage($page);
    }

    $burl = get_permalink();
    $url = $_SERVER['REQUEST_URI']; //get_permalink();
    $url = strpos($url, '?') ? $url . '&' : $url . '?';
    $url = preg_replace("/[\&]*{$cpvar}=[0-9]+[\&]*/", "", $url);
    $url = strpos($url, '?') ? $url . '&' : $url . '?';
    if (!isset($paging) || $paging == 1)
        $pag->urlTemplate($url . "$cpvar=[%PAGENO%]");


    $html = '';
    $templates = maybe_unserialize(get_option("_fm_link_templates", true));

    if(isset($templates[$template])) $template = $templates[$template]['content'];

    global $post;
    while($packs->have_posts()) { $packs->the_post();
        $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);        
        $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
        if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):
            /* Show items */
            $pack = (array)$post;
            $repeater = FetchTemplate($template, $pack);
            $html .=  $repeater;
        endif;
    }
    wp_reset_query();

    $cname = array();
    foreach($cids as $cid){
        $cat = get_term_by('slug', $cid, $taxo);
        $cname[] = $cat->name;

    }
    $cats = implode(", ", $cname);

    //Added from v4.2.1
    $desc = '';

    if(isset($fnparams['title']) && $fnparams['title'] != false && intval($fnparams['title']) != 1) $cats = $fnparams['title'];
    if(isset($fnparams['desc']) && $fnparams['desc'] != false && intval($fnparams['desc']) != 1) $desc = $fnparams['desc'];
    if(isset($fnparams['desc']) && $fnparams['desc'] == 1) $desc = term_description($cids[0], $taxo);

     $cimg = '';


    $subcats = '';
    if (function_exists('wpdm_ap_categories') && $subcats == 1) {
        $schtml = wpdm_ap_categories(array('parent' => $id));
        if ($schtml != '') {
            $subcats = "<fieldset class='cat-page-tilte'><legend>" . __('Sub-Categories', 'wpdmpro') . "</legend>" . $schtml . "<div style='clear:both'></div></fieldset>" . "<fieldset class='cat-page-tilte'><legend>" . __('Downloads', 'wpdmpro') . "</legend>";
            $efs = '</fieldset>';
        }
    }

    if (!isset($paging) || $paging == 1)
        $pgn = $pag->show();
    else
        $pgn = "";
    global $post;

    $sap = get_option('permalink_structure') ? '?' : '&';
    $burl = $burl . $sap;
    if (isset($_GET['p']) && $_GET['p'] != '') $burl .= 'p=' . $_GET['p'] . '&';
    if (isset($_GET['src']) && $_GET['src'] != '') $burl .= 'src=' . $_GET['src'] . '&';
    $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'create_date';
    $order = ucfirst($order);
    $order_field = " " . __(ucwords(str_replace("_", " ", $order_field)),"wpdmpro");
    $ttitle = __('Title', 'wpdmpro');
    $tdls = __('Downloads', 'wpdmpro');
    $tcdate = __('Publish Date', 'wpdmpro');
    $tudate = __('Update Date', 'wpdmpro');
    $tasc = __('Asc', 'wpdmpro');
    $tdsc = __('Desc', 'wpdmpro');
    $tsrc = __('Search', 'wpdmpro');
    $order_by_label = __('Order By','wpdmpro');

    $html = $total != 0 || $total != NULL || $total != '' ? $html : "<p style='color:#000'>Sorry, nothing matched your search. Please try again.</p>";

        $toolbar = '';
        return $cimg . $desc . $subcats . $html  . $pgn . "<div style='clear:both'></div>";
}

if (!function_exists('checkIfPromoIsAccessible')) {
    /**
     * Check if current promo operator group is accessible to logged user.
     * @param  string $promo_assigned_operator_group     Assigned operator group to a specific promo
     * @return Bool                                      Return 1 if accessibl, else 0
     */
    function checkIfPromoIsAccessible($promo_assigned_operator_group = "all"){
        $current_user_role = strtolower(get_current_user_role());
        $current_user_operator_group = get_current_user_operator_group();
        if( ($current_user_role == 'administrator') || 
                (   $current_user_role == 'operator' && 
                    (   $promo_assigned_operator_group == $current_user_operator_group || 
                        $promo_assigned_operator_group == 'all'
                    )
                )
            ){
                $return_value = 1;
        }else {
            $return_value = 0;
        }
        return $return_value;
    }
}

if (!function_exists('getRecentFileUploads')){
    /**
     * Get Recently modified shows
     * @param  string $channel Either entertainment or extreme
     * @return Object          Returns recently modified shows within a month.
     */
    function getRecentFileUploads($channel = 'entertainment'){

        $args = array(
                    'orderby'=> 'modified',
                    'order' => 'DESC',
                    'post_type' => 'wpdmpro', 
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => 'shows-'.$channel,
                        ),
                      ),
                    'date_query' => array(
                      array(
                        'column' => 'post_modified',
                        'after'  => '1 month ago',
                      ))
                  );
        $query_shows = new WP_Query( $args );
        return $query_shows;
    }
}

if (!function_exists('custom_get_shows()')) {
    /**
     * Get Shows
     * @return array key value pair of show id and title
     */
    function custom_get_shows(){
        $cids = array('shows-entertainment', 'shows-extreme', 'extreme', 'entertainment');
        $channel_materials = array('channel-materials-entertainment','channel-materials-extreme');

        $params = array(
            'post_type' => 'wpdmpro',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(array(
                    'taxonomy' => 'wpdmcategory',
                    'field' => 'slug',
                    'terms' => $cids,
                    'operator' => $operator
                ), array(
                    'taxonomy' => 'wpdmcategory',
                    'field' => 'slug',
                    'terms' => $channel_materials,
                    'operator' => 'NOT IN'
                )
            )
        );
        
        $query = new WP_Query( $params );
        $shows = array();
        while($query->have_posts()) {$query->the_post();
            $shows[get_the_ID()] = get_the_title();
        }
        return $shows;
    }
}

if(!function_exists('generate_show_files')){
    /**
     * Ajax function for adding specific files to cart
     */
    function generate_show_files(){
        $security_nonce = $_POST['security_nonce'];
        $return_value = 0;
        $return_array = array();
        $return_array['hidden_files_count'] = 0;
        if (!empty($_POST) && wp_verify_nonce($security_nonce, '__show_files_nonce__') ){ 
            $serialized_data = $_POST['serialized-data'];
            $files_limit = $_POST['limit'];
            $unserialized_form = unserializeForm($serialized_data);

            $serialized_show_files = $unserialized_form['serialized-data'];
            $show_files = unserialize($serialized_show_files);
            $topreview_show_files = $show_files['all_files'];
            if ( count($show_files['all_files']) >= $files_limit ){
                $topreview_show_files = array_slice($show_files['all_files'],0,$files_limit,true);
                $return_array['topreview_show_files'] = $topreview_show_files;
            
                $show_files['all_files'] = array_diff_key($show_files['all_files'],$topreview_show_files);
                $return_array['show_all_files'] = $show_files['all_files'];
                
                $return_array['hidden_files_count'] = count($show_files['all_files']);
            }

            if ( $show_files !== false ){
                $categorizedFileList = \WPDM\libs\FileList::CategorizedFileList($topreview_show_files,$show_files['prefix'],$show_files['category'],$show_files['file_object'],$show_files['specific_thumbnails'],$show_files['file_type'],$show_files['file_info'],$show_files['post_id'],$show_files['permalink']);

                $return_array['files'] = $categorizedFileList;
                $return_array['updated_serialized_data'] = serialize($show_files);
                
                $return_value = 1;
            }
        }

        echo $return_value == 1 ? json_encode($return_array) : false;
        die();
    }
    add_action('wp_ajax_generate_show_files', 'generate_show_files');
}

/*
Download Manager and ACF
====================================================================================================================================
 */
if (!function_exists('getFeaturedShows')) {
    /**
     * Get featured shows (paginated)
     * @param  string  $channel        Either entertainment or extreme
     * @param  integer $posts_per_page Desired number of post per page
     * @param  string  $query_var      Either page or paged
     * @return Object                  Returns featured shows.
     */
    function getFeaturedShows($channel = 'entertainment', $posts_per_page = null, $query_var = 'page' ){
        $paged = ( get_query_var($query_var) ) ? get_query_var($query_var) : 1;

        $args = array(
                    'post_type' => 'wpdmpro', 
                    'orderby'   => 'title',
                    'order'     => 'ASC',
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => ' shows-'.$channel,
                        ),
                      ),
                    'meta_query'  => array(
                        array(
                          'key'   => 'featured_show',
                          'value'   => 'featured',
                          'compare' => 'LIKE'
                        )
                      )
                  );
        if ($posts_per_page != null && $posts_per_page > 0){
            $args ['posts_per_page'] = $posts_per_page;
        }
        $query_shows = new WP_Query( $args );
        return $query_shows;
    }
}

if (!function_exists('getAllShows')) {
    /**
     * Get featured shows (paginated)
     * @param  string  $channel        Either entertainment or extreme
     * @param  integer $posts_per_page Desired number of post per page
     * @param  string  $query_var      Either page or paged
     * @return Object                  Returns featured shows.
     */
    function getAllShows($channel = 'entertainment', $count = null, $have_vimeo = null){
        $vimeo_meta_query = array(
                                array(
                                    'key' => 'vimeo_id',
                                    'value'   => array(''),
                                    'compare' => 'NOT IN'
                                )
                            );
        $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'wpdmpro', 
                    'orderby'   => 'title',
                    'order'     =>  'ASC',
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => ' shows-'.$channel,
                        ),
                      )

                  );
        if($have_vimeo){
            $args['meta_query'] = $vimeo_meta_query;
        }
        if ($count != null && is_numeric($count)){
            $args['posts_per_page'] = $count;
        }
        $query_shows = new WP_Query( $args );
        // echo "query:".$query_shows->request;
        return $query_shows;
    }
}

if (!function_exists('getRecentFileUploadsCount')){
    /**
     * Get number of files under recent modified shows
     * @param  string $channel  Either entertainment or extreme
     * @return Integer          Number of files
     */
    function getRecentFileUploadsCount($channel = 'entertainment'){
        $query_shows = getRecentFileUploads($channel);
        $sum_files = 0;
        $promos_count = 0;
        if($query_shows->have_posts()){
            while($query_shows->have_posts()) { 
                $query_shows->the_post();
                $sum_files += count(get_post_meta(get_the_ID(), '__wpdm_files', true));
                $custom_fields = get_fields();
                foreach ($custom_fields['add_promo_files'] as $key => $value) {
                    if(checkIfPromoIsAccessible($value['operator_group'])){
                        $promos_count++;
                    }
                }
            }
        }
        return $sum_files+$promos_count;
    }
}

if (!function_exists('getMonthsPromos')) {
    /**
     * @usage function to get promo under a given category
     * @param $category
     * @return array
     * @usage returns an array of promo files, otherwise empty array
     */
    function getMonthsPromos($category = 'on-air', $promo_filter = 'this-month'){
        wp_reset_query();
        $channel = $_SESSION['channel'];


        $args = array(
                    'post_type' => 'wpdmpro', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => array('shows-'.$channel,'channel-materials-'.$channel ),
                        ),
                      )
                  );
        $query_shows = new WP_Query( $args );
        // echo  $query_shows->request;
        $promos = array();
        if($query_shows->have_posts()){
          while($query_shows->have_posts()) { 
            $query_shows->the_post();
            $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
            $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
            if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):

              if( have_rows('add_promo_files',get_the_ID()) ):
                while( have_rows('add_promo_files',get_the_ID()) ): the_row();
                  $promo['operator_group'] = get_sub_field('operator_group');
                  $promo['promo_start'] = get_sub_field('promo_start') != '' ? get_sub_field('promo_start') : date('Ymd');
                  $promo['promo_end'] = get_sub_field('promo_end') != '' ? get_sub_field('promo_end') : date('Ymd');
                  $operator_group_promo_access = isset($promo['operator_group']) ? $promo['operator_group'] : 'all';

                  if(checkIfPromoIsAccessible($operator_group_promo_access) && checkDatesIfCurrentMonth($promo['promo_start'],$promo['promo_end'], $promo_filter)){

                    $promo['category'] = get_sub_field('category') != '' ? get_sub_field('category') : '';
                    $promo['upload_date'] = get_sub_field('upload_date') != '' ? date("n/d/Y", strtotime(get_sub_field('upload_date'))) : '';
                    $promo['promo_start'] = get_sub_field('promo_start') != '' ? date("n/d/Y", strtotime(get_sub_field('promo_start'))) : '';
                    $promo['promo_end'] = get_sub_field('promo_end') != '' ? date("n/d/Y", strtotime(get_sub_field('promo_end'))) : '';
                    $promo['id'] = get_sub_field('id') != '' ? get_sub_field('id') : '';
                    $promo['promo_id'] = get_sub_field('promo_id') != '' ? get_sub_field('promo_id') : '';
                    $promo['file_name'] = get_sub_field('file_name') != '' ? get_sub_field('file_name') : '';
                    $promo['program_tx'] = get_sub_field('program_tx') != '' ? get_sub_field('program_tx') : '';
                    $promo['prog_title_stunts'] = get_sub_field('prog_title_stunts') != '' ? get_sub_field('prog_title_stunts') : '';
                    $promo['version'] = get_sub_field('version') != '' ? get_sub_field('version') : '';
                    $promo['duration'] = get_sub_field('duration') != '' ? get_sub_field('duration') : '';
                    $promo['notes'] = get_sub_field('notes') != '' ? get_sub_field('notes') : '';
                    $promo['attached_file'] = get_sub_field('attached_file') != '' ? get_sub_field('attached_file') : '';
                    $promo['post_id'] = get_the_ID();
                    $promo['user_id'] = get_current_user_id();

                    $ext = strtolower(getFileExtension($promo['attached_file']));
                    $thumb = WPDM_BASE_URL.'assets/file-type-icons/'.$ext.'.png';
                    $promo['thumb'] = $thumb;

                    $promo['isFileAdded'] = !checkFileInCart($promo['id']) ? "" : "disabled-links added-to-cart";
                    $promo['buttonText'] = !checkFileInCart($promo['id']) ? __("Add to Cart","wpdmpro") : "Added&nbsp;&nbsp;<i class='fa fa-check'></i>";

                    $absolute_file_path = getFileAbsolutePathByURL($promo['attached_file']);
                    $promo['file_size'] = custom_wpdm_file_size($absolute_file_path, 0);

                    if(strtolower($promo['category']) == $category || $category == 'all')
                      array_push($promos, $promo);
                  }
                endwhile;
              endif;
            endif;
          }
        } 
        wp_reset_query();
        return $promos;
    }
}

if (!function_exists('get_promos')) {
    /**
     * @usage function to get promo under a given category
     * @param $category
     * @return array
     * @usage returns an array of promo files, otherwise empty array
     */
    function get_promos(){
        $promononce = $_POST['promononce'];
        $promos = array();
        if (!empty($_POST) && wp_verify_nonce($promononce, '__promo_rtl_nonce__') ){
            $category = 'all';
            $promo_filter = $_POST['promo-timeline'];
            $promos = getMonthsPromos($category, $promo_filter);
        }
        echo json_encode($promos);
        die();
    }
    add_action( 'wp_ajax_get_promos', 'get_promos' );
}

/*
Advance Custom Fields reliant
====================================================================================================================================
 */
if (!function_exists('global_custom_field')){
    /* Global Custom Fields */
    /**
     * Description:        Returns the value of a global custom field via field name
     * @param  string $key Field name of the custom field
     * @return string      Value of the custom field
     */
    function global_custom_field($key = '') {
        $output = '';
        if($key != '' && $key != null){
            $page_object = get_page_by_path( 'global-custom-fields' );
            $output = get_post_meta($page_object->ID, $key, true);
        }
        return $output;
    }
}

if( !function_exists('getEPGThumbnail') ) {
    /**
     * Description:                        Get assigned EPG thumbnail for the given EPG file
     * @param  string $fileTitle           File title of epg file
     * @return string                      Associated EPG thumbnail for the given filename if available
     */
    function getEPGThumbnail($fileTitle, $postID) {
        $epg_thumbnails = array();
        if( have_rows('epg_thumbnail', $postID) ):
            while ( have_rows('epg_thumbnail', $postID) ) : the_row();
                $epg_month = strtolower(get_sub_field('epg_month'));
                $thumbnail_path = get_sub_field('epg_image_thumbnail');
                if(($epg_month!="" && $epg_month != null) && ($thumbnail_path != "" && $thumbnail_path != null)){
                    $epg_thumbnails[$epg_month] = $thumbnail_path;
                }
            endwhile;
        endif;
        foreach ($epg_thumbnails as $epg_month_key => $thumbnail_url) {
            if(contains($fileTitle,$epg_month_key)){
                $thumb = $thumbnail_url;
            }
        }
        return $thumb;
    }
}

/*
The Events Manager reliant
====================================================================================================================================
 */
if( !function_exists('getTribeEvents')) {
    /**
     * Description:                 Get all tribe events for the given date range.
     * @param  Date $start_date     Start date
     * @param  Date $end_date       End date
     * @return Array                Array of events
     */
    function getTribeEvents($start_date,$end_date){
        $start_date = $start_date != '' || $start_date != null ? $start_date : date("Y-m-d H:i");
        $end_date   = $end_date != '' || $end_date != null ? $end_date : date("Y-m-d H:i");
        $events = tribe_get_events( array(
                    'start_date'   => $start_date,
                    'end_date'     => $end_date
                ) );
        return $events;
    }
}

if( !function_exists('getTribeEventsUniqueStartTime')) {
    /**
     * Decription                Will return an array of unique timeslot in ascending order 
     * @param  Array $daterange  Range of dates to query
     * @return Array             Array of unique timeslots
     */
    function getTribeEventsUniqueStartTime($daterange = array()){
        $time_list_rebased = array();
        if(!empty($daterange)):
            $time_list = array();
            foreach($daterange as $date):
                $events = getTribeEvents($date->format("Y-m-d").' 00:00',$date->format("Y-m-d").' 23:59');
                if(count($events) > 0):
                    foreach ($events as $event) :
                        $show_start_time = date('H:i',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));
                        if(!in_array($show_start_time, $time_list)){
                            array_push($time_list, $show_start_time);
                        }
                    endforeach;
                endif;
            endforeach;
            asort($time_list);
            $time_list_rebased = array_values($time_list);
        endif;
        return $time_list_rebased;
    }
}

/**
 * The Event Manager plugin - Change label from 'Events' to 'Schedules'
 */
// @todo : create a plugin for the codes below (Events manager title customizer)
add_filter( 'tribe_event_label_singular', 'event_display_name' );
function event_display_name() {
    return 'Schedule';
}
add_filter( 'tribe_event_label_singular_lowercase', 'event_display_name_lowercase' );
function event_display_name_lowercase() {
    return 'schedule';
}
// Plural
add_filter( 'tribe_event_label_plural', 'event_display_name_plural' );
function event_display_name_plural() {
    return 'Schedules';
}
add_filter( 'tribe_event_label_plural_lowercase', 'event_display_name_plural_lowercase' );
function event_display_name_plural_lowercase() {
    return 'schedules';
}