<?php
/*
Plugin Name: LH Password Changer
Plugin URI: https://lhero.org/portfolio/lh-password-changer/
Description: Front end change password form
Version: 1.46
Author: Peter Shaw
Author URI: https://shawfactor.com/
*/


class LH_password_changer_plugin {

var $opt_name = 'lh_password_changer-options';
var $page_id_field = 'lh_password_changer-page_id';
var $hidden_field_name = 'lh_password_changer-submit_hidden';
var $namespace = 'lh_password_changer';

private function handle_result($result){



if (!is_numeric($result)){

$output = "There was an error: ";

$output .= $result;


} else {

$current_user = wp_get_current_user();

if ($current_user->ID != $userobject->ID){

$output .= "<p>The password for ".$userobject->user_login." has been changed.</p>";

} else {


$output .= "<p>Your password has been changed</p>";

}

}

return $output;


}


private function curpageurl() {
	$pageURL = 'http';

	if ((isset($_SERVER["HTTPS"])) && ($_SERVER["HTTPS"] == "on")){
		$pageURL .= "s";
}

	$pageURL .= "://";

	if (($_SERVER["SERVER_PORT"] != "80") and ($_SERVER["SERVER_PORT"] != "443")){
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

}

	return $pageURL;
}


private function create_page() {

$options = get_option($this->opt_name);

if (!$page = get_page($options[$this->page_id_field])){


$page['post_type']    = 'page';
$page['post_content'] = '[lh_password_changer_form]';
$page['post_status']  = 'publish';
$page['post_title']   = 'Change Password';

if ($pageid = wp_insert_post($page)){

$options = $this->options;

$options[$this->page_id_field] = $pageid;

if (update_option($this->opt_name, $options )){


}

}
}
}

private function can_user_edit(){

$userobject = $this->get_referenced_user();


if (current_user_can('edit_user', $userobject->ID) ){

return $userobject;

} else {

return false;


}

}


private function get_referenced_user(){

if ($_GET['user_id']){

$userobject = get_userdata( $_GET['user_id'] );


} else {

$userobject = wp_get_current_user();

}

if ($userobject->ID){

return $userobject;

} else {

return false;

}

}



function process_password_change(){



if ( (isset( $_POST['lh_password_changer-password1'] )) and ($user = wp_get_current_user())){

if ($userobject = $this->can_user_edit()){


if ( wp_verify_nonce( $_POST['lh_password_changer-form-nonce'], 'lh_password_changer-change_password'.$userobject->ID) ) {


$password1 = trim($_POST['lh_password_changer-password1']);

$password2 = trim($_POST['lh_password_changer-password2']);

if (empty($password1)){

$form_error = __( "The string is empty", $this->namespace );

} elseif ($password1 == $password2){

wp_set_password( $password1, $userobject->ID );

$current_user = wp_get_current_user();

if ($current_user->ID == $userobject->ID){

wp_set_auth_cookie( $userobject->ID, true);

}



} else {

$form_error = __( "The passwords do not match", $this->namespace );


}


if (isset($form_error ) ) {


setcookie($this->namespace.'-message', json_encode($form_error), time()+3600);  /* expire in 1 hour */

} else {

setcookie($this->namespace.'-message', $userobject->ID, time()+3600);  /* expire in 1 hour */


}

wp_redirect($this->curpageurl()); 
exit;

}

}

} elseif (is_singular() and isset($_COOKIE[$this->namespace.'-message'])){

if (is_numeric($_COOKIE[$this->namespace.'-message'])){

$GLOBALS['lh_password_changer-form-result'] = $_COOKIE[$this->namespace.'-message'];

} else {


$GLOBALS['lh_password_changer-form-result'] = json_decode(trim(stripslashes($_COOKIE[$this->namespace.'-message'])));


}

setcookie($this->namespace.'-message', '', time() - 3600);


}


}




function lh_password_changer_form_output(){


$content .= '';

if ( $this->can_user_edit() ) {

$userobject = $this->get_referenced_user();


if ($GLOBALS['lh_password_changer-form-result']){


$content .= $this->handle_result($GLOBALS['lh_password_changer-form-result']);





} else {

$current_user = wp_get_current_user();

if ($current_user->ID != $userobject->ID){

$content .= '<p>You are changing the password for '.$userobject->user_login.'</p>';

}

if ($page = get_page($this->options[$this->page_id_field])){

$action = get_permalink($this->options[ $this->page_id_field ]);



} else {

$action = "";


}

global $post;

include ('partials/lh_password_changer_form_output.php');


}


} else {

$content .= __('you are not logged in or cannot edit this user', $this->namespace);

}


return $content;

}


function register_shortcodes(){

add_shortcode('lh_password_changer_form', array($this,"lh_password_changer_form_output"));

}

public function plugin_menu() {
add_options_page('LH Password Changer Options', 'Password Changer', 'manage_options', $this->filename, array($this,"plugin_options")); 
}


function plugin_options() {

if (!current_user_can('manage_options')){

wp_die( __('You do not have sufficient permissions to access this page.', $this->namespace) );

}


if( isset($_POST[ $this->hidden_field_name ]) && $_POST[ $this->hidden_field_name ] == 'Y' ) {

if ($_POST[ $this->page_id_field ] != ""){
$options[ $this->page_id_field ] = $_POST[ $this->page_id_field ];
}



// Save the posted value in the database
update_option( $this->opt_name , $options );


// Put an settings updated message on the screen


?>
<div class="updated"><p><strong><?php _e('settings saved.', $this->namespace ); ?></strong></p></div>
<?php



} else {

$options  = get_option($this->opt_name);


}



include ('partials/option-settings.php');


}



public function return_user_link( $id ){

if (get_permalink($this->options[$this->page_id_field_name])){

return get_permalink($this->options[$this->page_id_field_name])."?user_id=".$id;

} else {

return false;

}

}



function modify_lh_profile_page_form( $html ) {

if ($permalink = get_permalink($this->options[ $this->page_id_field ])){

if ($_GET['user_id']){

$permalink = add_query_arg( 'user_id', $_GET['user_id'], $permalink );

}

return $html ."<br/><a href=\"".$permalink."\">Change Password</a>";

} else {

 return $html;

}
}

public function on_activate( $network){

global $wpdb;

  if ( is_multisite() && $network ) {
        // store the current blog id
        $current_blog = $wpdb->blogid;
        // Get all blogs in the network and activate plugin on each one
        $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach ( $blog_ids as $blog_id ) {

        }

    } else {

$this->create_page();

}

}

// add a settings link next to deactive / edit
public function add_settings_link( $links, $file ) {

	if( $file == $this->filename ){
		$links[] = '<a href="'. admin_url( 'options-general.php?page=' ).$this->filename.'">Settings</a>';
	}
	return $links;
}

public function the_content_filter( $content ) {

global $post;


if (!has_shortcode( $post->post_content, 'lh_password_changer_form' )  and is_singular() and $GLOBALS['lh_password_changer-form-result']){

$content = $this->handle_result($GLOBALS['lh_password_changer-form-result']).$content;


}

return $content;


}



public function __construct() {

$this->options = get_option($this->opt_name);
$this->filename = plugin_basename( __FILE__ );

add_action( 'init', array($this,"register_shortcodes"));
add_action( 'wp', array($this,"process_password_change"));
add_action('admin_menu', array($this,"plugin_menu"));
add_filter('plugin_action_links', array($this,"add_settings_link"), 10, 2);

//Filters the lh profile page output if enabled
add_filter( 'lh_profile_page_form_html', array($this,"modify_lh_profile_page_form"));


//add message to redirected request
add_filter( 'the_content', array($this,"the_content_filter"),100);


}


}



$lh_password_changer_instance = new LH_password_changer_plugin();
register_activation_hook(__FILE__, array($lh_password_changer_instance,'on_activate'), 10, 1);

?>