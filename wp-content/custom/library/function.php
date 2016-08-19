<?php
/**
 * Custom database table initialization
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

if (!function_exists('contains')) {
	// check filename prefix: key, log, oth, .docs, doc, docx, .docx
    /**
     * Description:					Check if a string contains a specified character
     * @param  string $str          The source string(3894343983483_KEY_349304930.jpg)
     * @param  string $charToSearch The character to search within in the string (KEY)
     * @return bool
     */
    function contains($str, $charToSearch){
        $str = strtolower($str);
        $charToSearch = strtolower($charToSearch);

        foreach((array) $charToSearch as $char){
            if(strpos($str, $char) !== FALSE){
                return true;
            }
        }
        return false;
    }
}

if( !function_exists('getFileExtension') ) {
	/**
	 * Description:					        Get file extension of a specified file name
     * @param  string $sfile                The source string(3894343983483_KEY_349304930.jpg)
	 * @param  string $maintain_case 	    False to convert extension to lowercase, else will maintain the case
	 * @return string 				        file extension
	 */
	function getFileExtension($sfile,$maintain_case = false) {
		$ext = explode(".", $sfile);
        $ext = end($ext);
        if(!$maintain_case){
            $ext = strtolower($ext);
        }
        return $ext;
	}
}

if( !function_exists('removeFileExtension') ) {
    /**
     * Description:                 Remove file extension of a specified file name
     * @param  string $sfile        The source string(3894343983483_KEY_349304930.jpg)
     * @return string               file name without extension
     */
    function removeFileExtension($filename) {
        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
        return $withoutExt;
    }
}

if( !function_exists('getFilePath') ) {
	/**
	 * Description:					Get file upload path of a specified file name
	 * @param  string $sfile 		The source string(3894343983483_KEY_349304930.jpg)
	 * @return string 				File path
	 */
	function getFilePath($sfile) {
        // $ind = \WPDM_Crypt::Encrypt($sfile);
        // return wpdm_download_url($sfile) . "&ind=" . $ind;
		return file_exists($sfile)?$sfile:UPLOAD_DIR.$sfile;
	}
}

if( !function_exists('getFileAbsolutePathByURL') ) {
    /**
     * Description:                 Transform a URL path to Local Absolute path. Useful in getting media file absolute path.
     * @param  string $url_path     Full URL path of a file.
     * @return string               Absolute file path
     */
    function getFileAbsolutePathByURL($url_path) {
        $current_absolute_path = dirname(__FILE__);
        $current_absolute_path_segments = explode('/wp-content', $current_absolute_path); /* For live server */
        // $current_absolute_path_segments = explode('\wp-content', $current_absolute_path); /* For Local Only*/
        $base_url = get_site_url();
        // Replace url path to absolute path 
        $full_absolute_path = str_replace($base_url,$current_absolute_path_segments[0],$url_path);
        // Replace forwardslash with backslash 
        // $full_absolute_path = str_replace('/','\\',$full_raw_absolute_path); /* For Local Only */
        return $full_absolute_path;
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
if( !function_exists('checkIfImageFile') ){
	/**
	 * Description:                 Checks the file type of a specified file        
	 * @param  string $sfile    	File name
     * @param  string $fileType     File type (image). For future improvements, include docs etc.
	 * @param  string $pureImageFile	'pure' if files should all be an actual image file not including .EPS files
	 * @return bool           
	 */
	function checkIfImageFile($sfile, $fileType, $pureImageFile = null){
        $imgext = "";
        $ext = getFileExtension($sfile);

        if($fileType == 'image' && $pureImageFile == 'pure'){
            $imgext = array('png','jpg','jpeg', 'gif');
        } else if($fileType == 'image' && $pureImageFile == 'notpure'){
            $imgext = array('eps', 'ai', 'psd', 'psb', 'tif');
        }else {
            $imgext = array('png','jpg','jpeg', 'gif', 'eps', 'ai', 'psd', 'psb', 'tif');
        }
        return in_array($ext, $imgext) ? 1 : 0;
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

if( !function_exists('getEPGThumbnail') ) {
    /**
     * Description:                        Get assigned EPG thumbnail for the given EPG file
     * @param  string $fileTitle           File title of epg file
     * @return string                      Associated EPG thumbnail for the given filename if available
     */
    function getEPGThumbnail($fileTitle) {
        $epg_thumbnails = array();
        if( have_rows('epg_thumbnail') ):
            while ( have_rows('epg_thumbnail') ) : the_row();
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

if( !function_exists('getDateRange')) {
    /**
     * Description:         Get an array of dates based on specified span of time
     * @param  string $span Span of dates. e.g. This week dates = this-week 
     * @return Array        Array of dates
     */
    function getDateRange($span = 'start-today'){
        $beginning_date = date( 'Y-m-d');
        $ending_date = date( 'Y-m-d');
        if($span == 'this-week'){
            $beginning_date = date( 'Y-m-d', strtotime( 'sunday last week' ) );
            $ending_date = date( 'Y-m-d', strtotime( 'saturday this week' ) );
        }else if($span == 'start-today'){
            $date_try = strtotime(date('2016-07-01'));
            $beginning_date = date( 'Y-m-d', $date_try);
            $ending_date = date( 'Y-m-d', strtotime("+6 day", $date_try ) );
            // $beginning_date = date( 'Y-m-d');
            // $ending_date = date( 'Y-m-d', strtotime( "+6 day" ) );
        }

        $begin = new DateTime( $beginning_date );
        $end = new DateTime( $ending_date );
        $end = $end->modify( '+1 day' ); 
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        return $daterange;
    }
}

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

if( !function_exists('getShowInfoByTitle')) {
    /**
     * Decription                Will return an array of unique timeslot in ascending order 
     * @param  Array $daterange  Range of dates to query
     * @return Array             Array of unique timeslots
     */
    function getShowInfoByTitle($post_title = ""){
        $current_blog_id = get_current_blog_id();
        if ($current_blog_id != 1) switch_to_blog( 1 );
        $show_info = getPostInfoByTitle($post_title);

        $background_image = "";
        if($show_info != ''):
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $show_info['id']), 'single-post-thumbnail' );
            $background_image = $image[0] != "" ? "background-image: url('".$image[0]."')" : "";
        endif;
        $show_info['featured_show'] = get_field('featured_show',$show_info['id'])[0];
        if ($current_blog_id != 1) restore_current_blog();

        $show_info['background_image'] = $background_image;

        return $show_info;
    }
}

if( !function_exists('getSlugByTitle')) {
    /**
     * Decription                Will return an array of unique timeslot in ascending order 
     * @param  Array $daterange  Range of dates to query
     * @return Array             Array of unique timeslots
     */
    function getSlugByTitle($post_title = ""){
        $current_blog_id = get_current_blog_id();
        if ($current_blog_id != 1) switch_to_blog( 1 );
        $show_slug = getPostSlugByTitle($post_title);
        return $show_slug;
    }
}


/**
 * Database functions for Custom Cart
 */
function getUsersByRole($role = 'administrator'){
    $args = array(
                'role' => $role
            );
    $query_users = new WP_User_Query( $args );
    $users = $query_users->get_results();
    return $users;
}

function getCustomCartContents(){
    global $wpdb;
    $userID = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    // $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$userID} AND channel = '{$channel}'" );
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$userID}" );
    return $rawCart;
}

function getCustomCartCount(){
	global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    // $cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
	$cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );

	return $cart_entry_count;
}

function getCustomCartItemsCount(){
    global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    // $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );
   
    if (!empty($rawCart)) {
        $rawCart = unserialize(trim($rawCart->meta_file));
        if($rawCart !== false){
            $return_value = count($rawCart);
        }else {
            $return_value = 0;
        }
    }else{
        $return_value = 0;
    }

    return $return_value;
}

function ajaxGetCustomCartItemsCount(){
    global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    // $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );
   
    if (!empty($rawCart)) {
        $rawCart = unserialize($rawCart->meta_file);
        if ($rawCart !== false){
            $return_value = count($rawCart);
        }else {
            $return_value = 0;
        }
    }else{
        $return_value = 0;
    }

    echo $return_value;
    die();
}
add_action('wp_ajax_get_custom_cart_items_count', 'ajaxGetCustomCartItemsCount');

function insertToCustomCart($serialized_cart){
	global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->insert(
	        				$wpdb->custom_cart,
					        array(
					            'user_id' => $user_id,
                                // 'channel' => $channel,
					            'meta_file' => $serialized_cart,
					            'created_at' => date('Y-m-d H:i:s')
					        )
	    				);
	return $return_value;
}

function updateToCustomCart($serialized_cart){
	global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->update( 
							$wpdb->custom_cart, 
							array('meta_file' => $serialized_cart), 
							array( 
                                'user_id' => $user_id
                                // ,'channel' => $channel
                                )
						);
	return $return_value;
}

function fetchEntryFromCustomCart(){
	global $wpdb;
    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    // $cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" )[0];
    $cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" )[0];

    return $cart_entry;
}

function deleteToCustomCart(){
	global $wpdb;

    $user_id = get_current_user_id( );
    // $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->delete( 
                            $wpdb->custom_cart, 
                            array( 
                                'user_id' => $user_id
                                // ,'channel' => $channel
                            ) 
                        );
	return $return_value;
}

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

function getPostIdBySlug($slug){
    global $wpdb;
    $post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'" );

    return $post_id;
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

/* END OF DATABASE FUNCTIONS */

if( !function_exists('get_current_user_role') ){
    /**
     * Get current role of logged user.
     * @return String|bool Returns user role if logged in, else return false;
     */
    function get_current_user_role(){
        if ( is_user_logged_in() ) {
            global $current_user;

            $user_roles = $current_user->roles;
            $user_role = array_shift($user_roles);

            $return_value = $user_role;
        }
        return $return_value;
    }
}

if( !function_exists('get_current_user_operator_group') ){
    /**
     * Get current role of logged user.
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
        $access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" )[0];
        $array_access = unserialize($access);
     
        $array_access_simplified = array();
        foreach ($array_access as $key => $value) {
            array_push($array_access_simplified,$value);
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

if(!function_exists('myStartSession')){
    /**
     * Start session on init
     */
    function myStartSession() {
        if(!session_id()) {
            session_start();
        }
    }
    add_action('init', 'myStartSession', 1);
}
if(!function_exists('myEndSession')){
    /**
     * End session on login and logout
     */
    function myEndSession() {
        session_destroy ();
    }
    add_action('wp_logout', 'myEndSession');
    add_action('wp_login', 'myEndSession');
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
            $access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" )[0];
            $array_access = unserialize($access);
            
            if(!empty($array_access)){
                // echo "-not admin-";
                $array_access_simplified = array();
                foreach ($array_access as $key => $value) {
                    array_push($array_access_simplified,$value);
                }
                $return_value = in_array($channel, $array_access_simplified);
                if($use_default) 
                    set_default_channel($array_access_simplified[0]);
                else
                    $_SESSION['channel'] = $channel;
                // echo '$use_default-'.$use_default;
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
            $array_access = unserialize($access);

            if(!empty($array_access)){
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

if(!function_exists('bulk_add_to_cart')){
    /**
     * Ajax function to o a bulk add to cart feature
     */
    function bulk_add_to_cart() {
    	global $wpdb;
    	$cartnonce = $_POST['cartnonce'];

    	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
    	    $cart_data['file_data']		= unserializeForm($_POST['data']);
            $cart_data_count = count($cart_data['file_data']);
            $empty_table_detector = true;
    	    foreach ( $cart_data['file_data'] as $key => $value) {
                $empty_table_detector = $cart_data_count == 1 ? ($key == '' ? false : true): true ;
    	    	$cart_data_serialized[$key]			= $value;//urldecode($value);
    	    	$cart_data_unserialized[$key]		= unserialize($cart_data_serialized[$key]);
                $cart_data_unserialized[$key]['download_url'] = urldecode($cart_data_unserialized[$key]['download_url']);
    	    }
            if($empty_table_detector){
        	    $user_id = get_current_user_id( );
        	    $cart_entry_count = getCustomCartCount();

        		if($cart_entry_count == 0 ){
        	    	$serialized_cart = serialize($cart_data_unserialized);
        	    	$return_value = insertToCustomCart($serialized_cart);
        		}else {
        			$cart_entry = fetchEntryFromCustomCart();
        			$unserialized_cart = unserialize($cart_entry);
                    $serialized_cart = serialize($unserialized_cart+$cart_data_unserialized);
        	   		// $serialized_cart = serialize(array_merge($unserialized_cart, $cart_data_unserialized));
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
    		$cart_data = prepare_cart_data($_POST['file-id'],$_POST['file-title'], $_POST['file-path'], $_POST['download-url'],$_POST['post-id'],$_POST['file-type'],$_POST['user-id'],$_POST['thumb']);
    	    $cart_array = structure_cart_data($cart_data);
    	    $cart_entry_count = getCustomCartCount();
    		if($cart_entry_count == 0 ){
    	    	$serialized_cart = serialize($cart_array);
    		    $return_value = insertToCustomCart($serialized_cart);
    		}else {
    			$cart_entry = fetchEntryFromCustomCart();
    			$unserialized_cart = unserialize($cart_entry);
                $serialized_cart = serialize($unserialized_cart+$cart_array);
    	   		// $serialized_cart = serialize(array_merge($unserialized_cart, $cart_array));
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

            $cart_entry_count = getCustomCartCount();

            if($cart_entry_count == 1 ){
                $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
        //          $cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
                $cart_entry = unserialize($wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']} AND channel = '{$channel}'" )[0]);
                $meta_file_count = count($cart_entry);

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
        echo $return_value;
        die();
    }
    add_action('wp_ajax_remove_to_cart', 'remove_to_cart');
}

if(!function_exists('unserializeForm')){
    /**
     * function to unserialize a form created by jquery .serialize method.
     */
    function unserializeForm($str) {
        $strArray = explode("&", $str);
        foreach($strArray as $item) {
            $item = urldecode($item);
            list($k, $v) = explode('=', $item);
            $returndata[ $k ] = $v;
        }
        return $returndata;
    }
}

if(!function_exists('prepare_cart_data')){
    /**
     * function to prepare cart data before structuring for serialization
     */
    function prepare_cart_data($fileID=null, $fileTitle=null, $filepath=null, $downloadUrl=null, $posdID=null, $fileType=null, $userID=null, $thumb=null){
    	if($fileID != null) $cart_data['file_id'] = $fileID;
        $cart_data['file_title'] 	= $fileTitle;
        $cart_data['file_path']     = $filepath;
        $cart_data['download_url'] 	= $downloadUrl;
        $cart_data['post_id'] 		= $posdID;
        $cart_data['file_type'] 	= $fileType;
        $cart_data['user_id'] 		= $userID;
        $cart_data['thumb']         = $thumb;
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
    		    		'thumb' => $cart_data['thumb']
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
    function get_custom_cart_contents($fileType = null){
    	$rawCart = getCustomCartContents();
        $myCart = array();
        if (!empty($rawCart)) {
        	$rawCart = unserialize($rawCart->meta_file);
        	if ($fileType != '' || $fileType != null) {
        		foreach ($rawCart as $key => $value) {
        			if($value['file_type'] == $fileType){
        				$myCart[$key] = array (
        			    			'file_title' => $value['file_title'],
                                    'file_path' => $value['file_path'],
        			    			'download_url' => $value['download_url'],
        			    			'post_id' => $value['post_id'],
        				    		'file_type' => $value['file_type'],
        				    		'user_id' => $value['user_id'],
        				    		'thumb' => $value['thumb']
        		    			);
        			}
        		}
        	}else {
        		$myCart = $rawCart;
        	}
        }
    	return $myCart != null ? $myCart : array();
    }
}


/* Show list page */
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

if(!function_exists('updateUrlParam')){
    /**
     * Build current URL with query parameters
     * @param  string $name  Query parameter name
     * @param  string $value Query parameter value
     * @return string        URL with query parameters
     */
    function updateUrlParam($name, $value)
    {
        if($value != ''){
            $params[$name] = $value;
            return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
        }else {
            return basename($_SERVER['PHP_SELF']);
        }
        
    }
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

if(!function_exists('reports_log')){
    /**
     * Function to save bulk downloads to reports table
     */
    function reports_log(){
        $raw_cart_data = fetchEntryFromCustomCart();
        return insertToCustomReports($raw_cart_data);
    }
}

if(!function_exists('insertToCustomReports')){
    /**
     * Insert download logs to custom reports table
     * @param  string $serialized_cart serialized cart data
     * @return bool                    Database insert boolean result
     */
    function insertToCustomReports($serialized_cart){
        global $wpdb;

        $unserialized_cart = unserialize($serialized_cart);

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
        return $return_value;
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
            $unserialized_cart = unserialize($raw_cart_data);
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

/* HOMEPAGE QUERIES */
if (!function_exists('getFeaturedBanners')) {
    /**
     * Get banners of featured shows
     * @param  string  $channel Either entertainment or extreme
     * @param  integer $count   Number of desired result
     * @return Object           Returns queried featured banners
     */
    function getFeaturedBanners($channel = 'entertainment',$count = 5){
        $args = array(
                    'posts_per_page' => $count,
                    'post_type' => 'wpdmpro', 
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
                    'post_type' => 'wpdmpro', 
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
        return $query_shows;
    }
}
if (!function_exists('getFeaturedShows')) {
    /**
     * Get featured shows (paginated)
     * @param  string  $channel        Either entertainment or extreme
     * @param  integer $posts_per_page Desired number of post per page
     * @param  string  $query_var      Either page or paged
     * @return Object                  Returns featured shows.
     */
    function getFeaturedShows($channel = 'entertainment', $posts_per_page = 1, $query_var = 'paged' ){
        $paged = ( get_query_var($query_var) ) ? get_query_var($query_var) : 1;
        $args = array(
                    'posts_per_page' => $posts_per_page,
                    'post_type' => 'wpdmpro', 
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
        $query_shows = new WP_Query( $args );
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

if (!function_exists('checkShowAssignedChannel')) {
    function checkShowAssignedChannel($posd_id, $channel){
        $terms = get_the_terms($posd_id,'wpdmcategory');
        $return_value = 0;
        foreach ($terms as $key => $value) {
            if ($value->slug == $channel || $value->slug == 'shows-'.$channel){
                $return_value = 1;
            }
        }
        return $return_value;
    }
}

if (!function_exists('checkPackageDownloadAvailabilityDate')) {
    /**
     * @usage function to check if package is available for download through the publish and expire field
     * @param $file
     * @return bool
     * @usage returns 1 if file is available for download, otherwise 0
     */
    function checkPackageDownloadAvailabilityDate($start_date, $end_date){
        $pd = isset($start_date)&&$start_date!=""?strtotime($start_date):0;
        $xd = isset($end_date)&&$end_date!=""?strtotime($end_date):0;
        return !($xd>0 && $xd<time()) && !($pd>0 && $pd>time()) ? 1 : 0;
    }
}

if (!function_exists('checkDateIfCurrentMonth')) {
    /**
     * @usage function to check if a given dat is a current month
     * @param $start_date, $end_date
     * @return bool
     * @usage returns 1 if date is current month, otherwise 0
     */
    function checkDatesIfCurrentMonth($start_date, $end_date, $promo_filter='this-month'){
        $first_day_of_month = mktime(0,0,0,date('n'),1,date('Y'));
        $last_day_of_month = mktime(23,59,59,date('n'),date('t'),date('Y')); 
        $current_day_of_month = time(); 

        if($promo_filter == 'this-month' && strtotime($start_date) <= $last_day_of_month && $first_day_of_month <= strtotime($end_date)){
            return 1;
        }else if ($promo_filter == 'all'){
            return 1;
        }else if ($promo_filter == 'upcoming' && strtotime($start_date) > $last_day_of_month){
            return 1;
        }else if ($promo_filter == 'current' && strtotime($start_date) <= $current_day_of_month && strtotime($end_date) >= $current_day_of_month){
            return 1;
        }
        return 0;
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
        //echo  $query_shows->request;
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

                    if(strtolower($promo['category']) == $category)
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
if (!function_exists('custom_get_country_groups')){
    /**
     * Get Country groups declared in profile builder plugin
     * @return array key value pair of country groups
     */
    function custom_get_country_groups()
    {
        global $wpdb;

        $raw_operator_group = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'wppb_manage_fields' ");
        $unserialized_operator_group = unserialize($raw_operator_group);

        $operator_groups = array();
        $operator_groups_options = explode( ',', $unserialized_operator_group[0]['options']);
        $operator_groups_labels = explode( ',', $unserialized_operator_group[0]['labels']);

        foreach ($operator_groups_options as $key => $value) {
            $operator_groups[$value] = $operator_groups_labels[$key];
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

if (!function_exists('get_country_name')) {
    
    function get_country_name($iso = 'PH'){
        $iso = strtoupper($iso);
        $country_groups = custom_get_country_groups();
        return $country_groups[$iso];
    }
}

if (!function_exists('get_user_info')) {
    
    function get_user_info($user_id, $data='email'){
        $user_info = get_userdata($user_id);
        $info = $data == 'email' ? $user_info->user_email : ($data == 'login' ? $user_info->user_login : "");
        return $info;
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

// ENQUEUE SCRIPTS
// function my_scripts(){
//     wp_enqueue_script('moment_js', "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js");
// }
// add_action("admin_enqueue_scripts", 'my_scripts');

// echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
// add_filter( 'cron_schedules', 'myprefix_add_weekly_cron_schedule' );
// function myprefix_add_weekly_cron_schedule( $schedules ) {
//     $schedules['minute'] = array(
//         'interval' => 60, // 1 week in seconds
//         'display'  => __( 'Per Minute' ),
//     );
 
//     return $schedules;
// }

// // add_action( 'my_hourly_event',  'update_db_hourly' );

// if ( ! wp_next_scheduled( 'my_hourly_event' ) ) {
//     // wp_schedule_event( time(), 'minute', 'my_hourly_event' );
// }
// function update_db_hourly() {
//     global $wpdb;
//     $wpdb->insert( 
//         'rtl21016_cron', 
//         array( 
//             'test' => 'value1'
//         ) 
//     );
//     // testing();

// } // end update_csv_hourly

// wp_clear_scheduled_hook( 'my_hourly_event' );
// add_action( 'init', 'testing', 100 );

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

if(!function_exists('getCommaSeparatedUserEmails')){
    /**
     * Get all administrator users
     * @return String Comma separated list of all administrator users
     */
    function getCommaSeparatedUserEmails(){
        $users = get_users('role=Administrator');
        $email_counter = 1;
        $formatted_email_recipient = '';
        foreach ($users as $user) {
            $formatted_email_recipient .= $user->user_email;
            if($email_counter < count($users)){
                $formatted_email_recipient .= ',';
            }
            $email_counter++;
        }
        return $formatted_email_recipient;
    }
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
