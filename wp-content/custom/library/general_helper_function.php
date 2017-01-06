<?php

/*
General Custom Helper Functions
====================================================================================================================================
 */
if (!function_exists('contains')) {
    /**
     * Description:                 Check if a string contains a specified character
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
     * Description:                         Get file extension of a specified file name
     * @param  string $sfile                The source string(3894343983483_KEY_349304930.jpg)
     * @param  string $maintain_case        False to convert extension to lowercase, else will maintain the case
     * @return string                       file extension
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

if( !function_exists('getFileAbsolutePathByURL') ) {
    /**
     * Description:                 Transform a URL path to Local Absolute path. Useful in getting media file absolute path.
     * @param  string $url_path     Full URL path of a file.
     * @return string               Absolute file path
     */
    function getFileAbsolutePathByURL($url_path) {
        $current_absolute_path = dirname(__FILE__);
        $base_url = get_site_url();
        if(contains($base_url,'localhost')){
            $current_absolute_path_segments = explode('\wp-content', $current_absolute_path); /* For Local Only*/
        }else{
            $current_absolute_path_segments = explode('/wp-content', $current_absolute_path); /* For live server */
        }
        
        // Replace url path to absolute path 
        $full_absolute_path = str_replace($base_url,$current_absolute_path_segments[0],$url_path);
        // Replace forwardslash with backslash - not working recently
        if(contains($base_url,'localhost')){
            $full_absolute_path = str_replace('/','\\',$full_absolute_path); /* For Local Only */
        }
        return $full_absolute_path;
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
            /* To show trial data - for testing*/
            // $date_try = strtotime(date('2016-12-08'));
            // $beginning_date = date( 'Y-m-d', $date_try);
            // $ending_date = date( 'Y-m-d', strtotime("+6 day", $date_try ) );
            /* To show actual data - for live */
            $beginning_date = date( 'Y-m-d');
            $ending_date = date( 'Y-m-d', strtotime( "+6 day" ) );
        }

        $begin = new DateTime( $beginning_date );
        $end = new DateTime( $ending_date );
        $end = $end->modify( '+1 day' ); 
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        return $daterange;
    }
}

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

if( !function_exists('getShowInfoByTitle')) {
    /**
     * Decription                Will return an array of show information via show title
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

if ( !function_exists('checkEventCategoryByTitle') ){
    function checkEventCategoryByTitle($channel = 'entertainment', $show_title = ''){
        $current_blog_id = get_current_blog_id();
        if ($current_blog_id != 1) switch_to_blog( 1 );
        $args = array(
                    'post_type' => 'wpdmpro', 
                    's' => $show_title,
                    'exact' => true,
                    'sentence' => true,
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => 'shows-'.$channel,
                        ),
                      )
                  );
        $query_shows = new WP_Query( $args );
        // echo "<br><br>".$query_shows->request;
        if ($current_blog_id != 1) restore_current_blog();

        return $query_shows->post_count;
    }
}

if( !function_exists('getTermIDBySlug') ){
    function getTermIDBySlug($slug){

        $current_blog_id = get_current_blog_id();
        if ($current_blog_id != 1) switch_to_blog( 1 );

        global $wpdb;
        $term_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = '{$slug}'" );

        if ($current_blog_id != 1) restore_current_blog();


        return $term_id;
    }
}

if( !function_exists('getSlugByTitle')) {
    /**
     * Decription                Will return the show slug via title
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

if( !function_exists('getPostIdBySlug') ){
    function getPostIdBySlug($slug){
        global $wpdb;
        $post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'" );

        return $post_id;
    }
}

if (!function_exists('getUsersByRole')){
    function getUsersByRole($role = 'administrator'){
        $args = array(
                    'role' => $role
                );
        $query_users = new WP_User_Query( $args );
        $users = $query_users->get_results();
        return $users;
    }
}

if( !function_exists('getPostIdBySlug') ){
    function getPostIdBySlug($slug){
        global $wpdb;
        $post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'" );

        return $post_id;
    }
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

if (!function_exists('get_user_info')) {
    /**
     * Description             Returns a specific user info like email and login name
     * @param  string $user_id User ID of user
     * @param  string $data    data to fetch. email or login name
     * @return string          Data requested
     */
    function get_user_info($user_id, $data='email'){
        $user_info = get_userdata($user_id);
        $info = $data == 'email' ? $user_info->user_email : ($data == 'login' ? $user_info->user_login : "");
        return $info;
    }
}

if( !function_exists('checkIfImageFile') ){
    /**
     * Description:                 Checks the file type of a specified file        
     * @param  string $sfile        File name
     * @param  string $fileType     File type (image). For future improvements, include docs etc.
     * @param  string $pureImageFile    'pure' if files should all be an actual image file not including .EPS files
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

function multi_array_filter($pattern = '/.*/', $haysack = array(), $limit = null){

        $filtered_results = array();

        foreach ($haysack as $key => $value) {
            /* TODO: clean this if part, null limit to show all files */
            if( ($limit != null && $limit < 1) || ($limit == 0)) {
            // if( ($limit != null && $limit < 1) || ($limit != null && $limit == 0)) {
                break;
            }
            if( preg_match($pattern, strtolower($value) ) ){
                $filtered_results[$key] = $value;
                $limit--;
            }
        }
        return $filtered_results;

}










