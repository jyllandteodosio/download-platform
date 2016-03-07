<?php
global $wpdb;
if (!isset($wpdb->custom_cart)) {
	$wpdb->custom_cart = $wpdb->prefix . 'custom_cart';
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
            $imgext = array('png','jpg','jpeg', 'gif');
        }
        return in_array($ext, $imgext) ? 1 : 0;
    }
}


// Database functions
function getCustomCartCount(){
	global $wpdb;

    $user_id = get_current_user_id( );

	$cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$user_id}" );
	return $cart_entry_count;
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
							array( 'user_id' => $user_id)
						);
	return $return_value;
}
function fetchEntryFromCustomCart(){
	global $wpdb;

    $user_id = get_current_user_id( );
    $cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$user_id}" )[0];

    return $cart_entry;
}
function deleteToCustomCart(){
	global $wpdb;

    $user_id = get_current_user_id( );
	$return_value = $wpdb->delete( $wpdb->custom_cart, array( 'user_id' => $user_id) );
	return $return_value;
}
/**
 * Ajax function to update custom cart table
 */
function bulk_add_to_cart() {
	global $wpdb;
	$cartnonce = $_POST['cartnonce'];
	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 

	    $cart_data['file_data']		= unserializeForm($_POST['data']);

	    foreach ( $cart_data['file_data'] as $key => $value) {
	    	$cart_data_serialized[$key]			= urldecode($value);
	    	$cart_data_unserialized[$key]		= unserialize($cart_data_serialized[$key]);
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
add_action('wp_ajax_nopriv_bulk_add_to_cart', 'bulk_add_to_cart');

/**
 * function to unserialize a form created by jquery serialize method.
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

function add_to_cart(){
	global $wpdb;
	$cartnonce = $_POST['cartnonce'];
	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 

		$cart_data = prepare_cart_data($_POST['file-id'],$_POST['file-title'],$_POST['file-path'],$_POST['post-id'],$_POST['file-type'],$_POST['user-id'],$_POST['thumb']);
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
		$return_value = 0;
	}

    echo $return_value == 1 ? "success" : "failed";
    die();
}
add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');


/**
 * function to prepare cart data before structuring for serialization
 */
function prepare_cart_data($fileID=null, $fileTitle=null, $filepath=null, $posdID=null, $fileType=null, $userID=null, $thumb=null){
	if($fileID != null) $cart_data['file_id'] = $fileID;
    $cart_data['file_title'] 	= $fileTitle;
    $cart_data['file_path'] 	= $filepath;
    $cart_data['post_id'] 		= $posdID;
    $cart_data['file_type'] 	= $fileType;
    $cart_data['user_id'] 		= $userID;
    $cart_data['thumb'] 		= $thumb;

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
	    			'post_id' => $cart_data['post_id'],
		    		'file_type' => $cart_data['file_type'],
		    		'user_id' => $cart_data['user_id'],
		    		'thumb' => $cart_data['thumb']
    			)
    	);
	return $cart_array;
}

/**
 * Ajax function to remove item in custom cart table
 */
function remove_to_cart(){
	global $wpdb;

	$cartnonce = $_POST['cartnonce'];
	if (!empty($_POST) && wp_verify_nonce($cartnonce, '__rtl_cart_nonce__') ){ 

	    $cart_data['file_id'] 		= $_POST['file-id'];
	    $cart_data['user_id'] 		= $_POST['user-id'];

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
add_action('wp_ajax_nopriv_remove_to_cart', 'remove_to_cart');

function get_custom_cart_contents($fileType = null){
	global $wpdb;

	$userID = get_current_user_id( );
	$rawCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$userID}" );

	$rawCart = unserialize($rawCart->meta_file);
	
	if ($fileType != '' || $fileType != null) {
		foreach ($rawCart as $key => $value) {
			if($value['file_type'] == $fileType){
				$myCart[$key] = array (
			    			'file_title' => $value['file_title'],
			    			'file_path' => $value['file_path'],
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

	return $myCart != null ? $myCart : array();
}

// Show list page

function custom_posts_where( $where){
    global $wpdb;
    if(isset($wpdb->letter_filter) && $wpdb->letter_filter != null && $wpdb->letter_filter != ''){
    	$where .= " AND SUBSTRING( post_title, 1, 1 ) ='".$wpdb->letter_filter."' ";
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

function wpdm_embed_category_custom($params = array('id' => '', 'operator' => 'IN' , 'items_per_page' => 10, 'title' => false, 'desc' => false, 'order_field' => 'create_date', 'order' => 'desc', 'paging' => false, 'toolbar' => 1, 'template' => '','cols'=>3, 'colspad'=>2, 'colsphone' => 1, 'letter_filter' => null))
{
    extract($params);
    $fnparams = $params;
    if(!isset($id)) return;
    if(!isset($items_per_page)) $items_per_page = 10;
    if(!isset($template)) $template = 'link-template-calltoaction3.php';
    if(!isset($cols)) $cols = 3;
    if(!isset($colspad)) $colspad = 2;
    if(!isset($colsphone)) $colsphone = 1;
    if(!isset($toolbar)) $toolbar = 1;
    $taxo = 'wpdmcategory';
    if(isset($tag) && $tag==1) $taxo = 'post_tag';
    $cwd_class = "col-md-".(int)(12/$cols);
    $cwdsm_class = "col-sm-".(int)(12/$colspad);
    $cwdxs_class = "col-xs-".(int)(12/$colsphone);

    $id = trim($id, ", ");
    $cids = explode(",", $id);

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
        ))
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
        $pag->nextLabel(' &#9658; ');
        $pag->prevLabel(' &#9668; ');
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

        $pack = (array)$post;
        $repeater = "<div class='{$cwd_class} {$cwdsm_class} {$cwdxs_class}'>".FetchTemplate($template, $pack)."</div>";
        $html .=  $repeater;

    }
    wp_reset_query();

    $html = "<div class='row'>{$html}</div>";
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
        $pgn = "<div style='clear:both'></div>" . $pag->show() . "<div style='clear:both'></div>";
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
    if ($toolbar || get_option('__wpdm_cat_tb') == 1)
        $toolbar = <<<TBR

                 <div class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">$cats</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$order_by_label} {$order_field} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li><a href="{$burl}orderby=title&order=asc">{$ttitle}</a></li>
                         <!-- li><a href="{$burl}orderby=download_count&order=desc">{$tdls}</a></li -->
                         <li><a href="{$burl}orderby=publish_date&order=desc">{$tcdate}</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">$order <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li><a href="{$burl}orderby={$orderby}&order=asc">{$tasc}</a></li>
                         <li><a href="{$burl}orderby={$orderby}&order=desc">{$tdsc}</a></li>
                        </ul>
                     </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>
TBR;
    else
        $toolbar = '';
    return "<div class='w3eden'>" . $toolbar . $cimg . $desc . $subcats . $html  . $pgn . "<div style='clear:both'></div></div>";
}
