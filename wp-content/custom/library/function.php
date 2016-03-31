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
	 * Description:					Get file extension of a specified file name
	 * @param  string $sfile 		The source string(3894343983483_KEY_349304930.jpg)
	 * @return string 				file extension
	 */
	function getFileExtension($sfile) {
		$ext = explode(".", $sfile);
        $ext = end($ext);
        $ext = strtolower($ext);
        return $ext;
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

if( !function_exists('checkFileType') ){
	/**
	 * Description:                 Checks the file type of a specified file        
	 * @param  string $sfile    	File name
	 * @param  string $fileType 	File type (image)
	 * @return bool           
	 */
	function checkFileType($sfile, $fileType){
        $imgext = "";
        $ext = getFileExtension($sfile);

        if($fileType == 'image'){
            $imgext = array('png','jpg','jpeg', 'gif',);
        }
        return in_array($ext, $imgext) ? 1 : 0;
    }
}

/**
 * Database functions for Custom Cart
 */
function getCustomCartContents(){
    global $wpdb;
    $userID = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$userID} AND channel = '{$channel}'" );
    return $rawCart;
}

function getCustomCartCount(){
	global $wpdb;
    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );

	return $cart_entry_count;
}

function getCustomCartItemsCount(){
    global $wpdb;
    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
    // print_r($rawCart);die();
    if (!empty($rawCart)) {
        $rawCart = unserialize($rawCart->meta_file);
        $return_value = count($rawCart);
    }else{
        $return_value = 0;
    }

    return $return_value;
}

function ajaxGetCustomCartItemsCount(){
    global $wpdb;
    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    $rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" );
    // print_r($rawCart);die();
    if (!empty($rawCart)) {
        $rawCart = unserialize($rawCart->meta_file);
        $return_value = count($rawCart);
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
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->insert(
	        				$wpdb->custom_cart,
					        array(
					            'user_id' => $user_id,
                                'channel' => $channel,
					            'meta_file' => $serialized_cart,
					            'created_at' => date('Y-m-d H:i:s')
					        )
	    				);
	return $return_value;
}

function updateToCustomCart($serialized_cart){
	global $wpdb;
    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->update( 
							$wpdb->custom_cart, 
							array('meta_file' => $serialized_cart), 
							array( 
                                'user_id' => $user_id,
                                'channel' => $channel
                                )
						);
	return $return_value;
}

function fetchEntryFromCustomCart(){
	global $wpdb;
    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
    $cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id} AND channel = '{$channel}'" )[0];

    return $cart_entry;
}

function deleteToCustomCart(){
	global $wpdb;

    $user_id = get_current_user_id( );
    $channel = isset($_SESSION['channel']) ? $_SESSION['channel'] : 'none';
	$return_value = $wpdb->delete( 
                            $wpdb->custom_cart, 
                            array( 
                                'user_id' => $user_id,
                                'channel' => $channel
                            ) 
                        );
	return $return_value;
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

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}
function myEndSession() {
    session_destroy ();
}

if( !function_exists('set_channel_access') ){
    /**
     *Set channel access
     * @return Bool Returns 1 if user has an access, else 0
     */
    function set_channel_access($channel = 'entertainment', $use_default = false){
        // die($channel);

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
        // die($_SESSION['channel']);

        return $return_value;
    }
}


if( !function_exists('check_if_have_channel_access') ){
    /**
     *Check if logged user has an access to a certain channel
     * @return Bool Returns 1 if user has an access, else 0
     */
    function check_if_have_channel_access($channel = 'entertainment'){
        global $wpdb;
        $user_id = get_current_user_id( );
        $country_group = get_current_user_country_group();
        $operator_group = get_current_user_operator_group();
        $access = $wpdb->get_col( "SELECT meta_access FROM $wpdb->operator_access WHERE operator_group = '{$operator_group}' AND country_group = '{$country_group}'" )[0];
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


/**
 * Ajax function to o a bulk add to cart feature
 */
function bulk_add_to_cart() {
	global $wpdb;
	$cartnonce = $_POST['cartnonce'];

	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
	    $cart_data['file_data']		= unserializeForm($_POST['data']);

	    foreach ( $cart_data['file_data'] as $key => $value) {
	    	$cart_data_serialized[$key]			= $value;//urldecode($value);
	    	$cart_data_unserialized[$key]		= unserialize($cart_data_serialized[$key]);
            $cart_data_unserialized[$key]['download_url'] = urldecode($cart_data_unserialized[$key]['download_url']);
	    }
	    $user_id = get_current_user_id( );
	    $cart_entry_count = getCustomCartCount();

		if($cart_entry_count == 0 ){
	    	$serialized_cart = serialize($cart_data_unserialized);
	    	$return_value = insertToCustomCart($serialized_cart);
		}else {
			$cart_entry = fetchEntryFromCustomCart();
			$unserialized_cart = unserialize($cart_entry);
	   		$serialized_cart = serialize(array_merge($unserialized_cart, $cart_data_unserialized));
	   		$return_value = updateToCustomCart($serialized_cart);
		}
	}else {
		$return_value = 0;
	}
    echo $return_value == 1 ? "success" : "failed";
	die();
}
add_action('wp_ajax_bulk_add_to_cart', 'bulk_add_to_cart');

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
	   		$serialized_cart = serialize(array_merge($unserialized_cart, $cart_array));
	   		$return_value = updateToCustomCart($serialized_cart);
		}
	}else {
		$return_value = 1;
	}
    echo $return_value == 1 ? "success" : "failed";
    die();
}
add_action('wp_ajax_add_to_cart', 'add_to_cart');

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
            $cart_entry = unserialize($wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}" )[0]);
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


// Show list page
function custom_posts_where( $where){
    global $wpdb;
    if(isset($wpdb->letter_filter) && $wpdb->letter_filter != null && $wpdb->letter_filter != ''){
        $where .= " AND SUBSTRING( post_title, 1, 1 ) ='".$wpdb->letter_filter."' ";
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
            // $repeater = "<div class='{$cwd_class} {$cwdsm_class} {$cwdxs_class}'>".FetchTemplate($template, $pack)."</div>";
            $html .=  $repeater;
        endif;
    }
    wp_reset_query();

    // $html = "<div class='row'>{$html}</div>";
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
        // $pgn = "<div style='clear:both'></div>" . $pag->show() . "<div style='clear:both'></div>";
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
        // return "<div class='w3eden'>" . $toolbar . $cimg . $desc . $subcats . $html  . $pgn . "<div style='clear:both'></div></div>";
}

function updateUrlParam($name, $value)
{
    // $params = $_GET;
    // unset($params[$name]);
    if($value != ''){
        $params[$name] = $value;
        return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
    }else {
        return basename($_SERVER['PHP_SELF']);
    }
    
}
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
    $zipped = UPLOAD_DIR . 'Cart-files.zip';
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
    wpdm_download_file($zipped, 'Cart-files.zip');
    @unlink($zipped);


}

/**
 * Function to save bulk downloads to reports table
 */
function reports_log(){
    $raw_cart_data = fetchEntryFromCustomCart();
    insertToCustomReports($raw_cart_data);
}

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
                                    'file_path' => $value['file_path'],
                                    'file_type' => $value['file_type'],
                                    'download_url' => $value['download_url'],
                                    'created_at' => date('Y-m-d H:i:s')
                                )
                            );
    }
}

/**
 * function to structure reports data into serialization ready array
 */
function structure_reports_data($cart_data){
    $cart_array = array (
            $cart_data['file_id'] => array (
                    'file_path' => $cart_data['file_path'],
                    'download_url' => $cart_data['download_url'],
                    'post_id' => $cart_data['post_id'],
                    'file_type' => $cart_data['file_type'],
                    'user_id' => $cart_data['user_id']
                )
        );
    return $cart_array;
}

/**
 * Ajax function for downloading specific files to cart and saving it to reports log
 */
function download_file(){
    $cartnonce = $_POST['cartnonce'];
    if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 
        $cart_data['file_path']     = $_POST['file-path'];
        $cart_data['download_url']  = $_POST['download-url'];
        $cart_data['post_id']       = $_POST['post-id'];
        $cart_data['file_type']     = $_POST['file-type'];
        $cart_data['user_id']       = get_current_user_id();
        $cart_data['file_id']       = $_POST['file-id'];

        $raw_cart_data = fetchEntryFromCustomCart();
        $unserialized_cart = unserialize($raw_cart_data);
        insertToCustomReports(serialize(structure_reports_data($cart_data)));
        
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

// TODO : lipat yung code below sa proper location
/**
 * Custom Css for 'Add New Operator' in Admin Dashboard.
 */
function custom_css_profile_builder() {
  echo '
    <style type="text/css">
      #wppb-register-user li {
        width: 45%;
        overflow: hidden;
        margin-top: 16px;
      }
      #wppb-register-user label {
        margin-bottom: 9px;
        padding: 15px 10px;
        line-height: 1.3;
        vertical-align: middle;
        font-weight: bold;
      }
      #wppb-register-user select,
      #wppb-register-user input {
        margin-bottom: 9px;
        line-height: 1.3;
        vertical-align: middle;
        float: right;
        width: 314px;
      }
      #wppb-register-user input#send_credentials_via_email {
        float: none;
        width: auto;
        margin-bottom: 0px;
      }
      #wppb-register-user .wppb-send-credentials-checkbox,
      #wppb-register-user p.form-submit {
        margin-top: 30px;
      }
      #wppb-register-user .send-credentials-via-email-container{
        display: inline-block;
        float: right;
      }
      #wppb-register-user p.form-submit input {
        float: none;
        width: auto;
      } 
    </style>';
}
add_action('admin_head', 'custom_css_profile_builder');



/**
 * Get NUmber of items in cart
 */
function getCartItemsCount(){

    return 123;
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

if (!function_exists('getFeaturedShows')) {
    /**
     * Get featured shows
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
     * @param $start_date
     * @return bool
     * @usage returns 1 if date is current month, otherwise 0
     */
    function checkDateIfCurrentMonth($start_date){
        $first_day_of_month = mktime(0,0,0,date('n'),1,date('Y'));
        $last_day_of_month = mktime(23,59,59,date('n'),date('t'),date('Y')); 

        if ((strtotime($start_date) >= $first_day_of_month) && (strtotime($start_date) <= $last_day_of_month)){
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
    function getMonthsPromos($category = 'on-air'){
        $channel = $_SESSION['channel'];
        $args = array(
                    'post_type' => 'wpdmpro', 
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'wpdmcategory',
                          'field'    => 'slug',
                          'terms'    => array('shows-'.$channel,'channel-materials-'.$channel ),
                        ),
                      )
                  );
        $query_shows = new WP_Query( $args );

        $promos = array();
        if($query_shows->have_posts()){
          while($query_shows->have_posts()) { 
            $query_shows->the_post();
            $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
            $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
            if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):
              if( have_rows('add_promo_files') ):
                while( have_rows('add_promo_files') ): the_row();
                  $promo['operator_group'] = get_sub_field('operator_group');
                  $promo['promo_start'] = get_sub_field('promo_start') != '' ? get_sub_field('promo_start') : date('Ymd');
                  $operator_group_promo_access = isset($promo['operator_group']) ? $promo['operator_group'] : 'all';
                  if(checkIfPromoIsAccessible($operator_group_promo_access) && checkDateIfCurrentMonth($promo['promo_start'])){

                    $promo['category'] = get_sub_field('category') != '' ? get_sub_field('category') : '';
                    $promo['upload_date'] = get_sub_field('upload_date') != '' ? date("d/n/Y", strtotime(get_sub_field('upload_date'))) : '';
                    $promo['promo_start'] = get_sub_field('promo_start') != '' ? date("d/n/Y", strtotime(get_sub_field('promo_start'))) : '';
                    $promo['promo_end'] = get_sub_field('promo_end') != '' ? date("d/n/Y", strtotime(get_sub_field('promo_end'))) : '';
                    $promo['id'] = get_sub_field('id') != '' ? get_sub_field('id') : '';
                    $promo['file_name'] = get_sub_field('file_name') != '' ? get_sub_field('file_name') : '';
                    $promo['program_tx'] = get_sub_field('program_tx') != '' ? get_sub_field('program_tx') : '';
                    $promo['prog_title_stunts'] = get_sub_field('prog_title_stunts') != '' ? get_sub_field('prog_title_stunts') : '';
                    $promo['version'] = get_sub_field('version') != '' ? get_sub_field('version') : '';
                    $promo['duration'] = get_sub_field('duration') != '' ? get_sub_field('duration') : '';
                    $promo['notes'] = get_sub_field('notes') != '' ? get_sub_field('notes') : '';
                    $promo['attached_file'] = get_sub_field('attached_file') != '' ? get_sub_field('attached_file') : '';
                    $promo['post_id'] = get_the_ID();
                    $promo['user_id'] = get_current_user_id();

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