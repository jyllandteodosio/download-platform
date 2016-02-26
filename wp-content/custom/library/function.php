<?php


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



/**
 * Ajax function to update custom cart table
 */
function add_to_cart(){
    global $wpdb;
    if (!isset($wpdb->custom_cart)) {
	    $wpdb->custom_cart = $wpdb->prefix . 'custom_cart';
	}

    $cart_data['file_id'] 		= $_POST['file-id'];
    $cart_data['file_title'] 	= $_POST['file-title'];
    $cart_data['file_path'] 	= $_POST['file-path'];
    $cart_data['post_id'] 		= $_POST['post-id'];
    $cart_data['file_type'] 	= $_POST['file-type'];
    $cart_data['user_id'] 		= $_POST['user-id'];
    $cart_data['thumb'] 		= $_POST['thumb'];

    $cart_array = structure_cart_data($cart_data);

    $cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}" );
    // $return_value = 1;
	if($cart_entry_count == 0 ){
    	$serialized_cart = serialize($cart_array);

	    $return_value = $wpdb->insert(
	        				$wpdb->custom_cart,
					        array(
					            'user_id' => $cart_data['user_id'],
					            'meta_file' => $serialized_cart,
					            'created_at' => date('Y-m-d H:i:s')
					        )
	    				);
	}else {
    	$cart_entry = $wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}" )[0];

		$unserialized_cart = unserialize($cart_entry);
   		$serialized_cart = serialize(array_merge($unserialized_cart, $cart_array));

		$return_value = $wpdb->update( 
							$wpdb->custom_cart, 
							array('meta_file' => $serialized_cart), 
							array( 'user_id' => $cart_data['user_id'])
						);
	}
    echo $return_value == 1 ? "success" : "failed";
    die();
}
add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');

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
    if (!isset($wpdb->custom_cart)) {
	    $wpdb->custom_cart = $wpdb->prefix . 'custom_cart';
	}

    $cart_data['file_id'] 		= $_POST['file-id'];
    $cart_data['user_id'] 		= $_POST['user-id'];

    $cart_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}" );
    // $return_value = "success";
	if($cart_entry_count == 1 ){
		$cart_entry = unserialize($wpdb->get_col( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$cart_data['user_id']}" )[0]);
		$meta_file_count = count($cart_entry);

		if(array_key_exists($cart_data['file_id'],$cart_entry)) {
			if($meta_file_count > 1){
				unset($cart_entry[$cart_data['file_id']]);
				$serialized_cart = serialize($cart_entry);
				$return_value = $wpdb->update( 
									$wpdb->custom_cart, 
									array('meta_file' => $serialized_cart), 
									array( 'user_id' => $cart_data['user_id'])
								);
			}else {
				$return_value = $wpdb->delete( $wpdb->custom_cart, array( 'user_id' => $cart_data['user_id']) );
			}
			$return_value = "success";
		}
	}else {
		$return_value = "failed";
	}
    echo $return_value;
    die();
}
add_action('wp_ajax_remove_to_cart', 'remove_to_cart');
add_action('wp_ajax_nopriv_remove_to_cart', 'remove_to_cart');



function get_custom_cart_contents(){
	global $wpdb;
    if (!isset($wpdb->custom_cart)) {
	    $wpdb->custom_cart = $wpdb->prefix . 'custom_cart';
	}

	$userID = get_current_user_id( );
	$myCart = $wpdb->get_row( "SELECT meta_file FROM $wpdb->custom_cart WHERE user_id = {$userID}" );

	$myCart = unserialize($myCart->meta_file);

	return $myCart != null ? $myCart : array();
}

