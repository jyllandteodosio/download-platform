<?php
/*
Plugin Name: LH Password Changer
Plugin URI: http://lhero.org/plugins/lh-password-changer/
Description: Front end change password form
Version: 1.40
Author: Peter Shaw
Author URI: http://shawfactor.com/
*/


class LH_password_changer_plugin {

var $opt_name = 'lh_password_changer-options';
var $page_id_field = 'lh_password_changer-page_id';

private function create_page() {

if (!$page = get_page($this->options[$this->page_id_field])){


$page['post_type']    = 'page';
$page['post_content'] = '[lh_password_changer_form]';
$page['post_status']  = 'publish';
$page['post_title']   = 'Change Password';

if ($pageid = wp_insert_post($page)){

$options = $this->options;

$options[$this->page_id_field] = $pageid;

if (update_option($this->opt_name, $options )){

$this->options = get_option($this->opt_name);

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


if ($password1 == $password2){

wp_set_password( $password1, $userobject->ID );

$current_user = wp_get_current_user();

if ($current_user->ID == $userobject->ID){

wp_set_auth_cookie( $userobject->ID, true);

}



} else {

$form_error = new WP_Error;

$form_error->add( 'unmatched_passwords', 'The passwords do not match' );


}

if (!is_wp_error( $form_error ) ) {


$GLOBALS['lh_password_changer-form-result'] = $userobject->ID;

return $user->ID;

} else {


$GLOBALS['lh_password_changer-form-result'] = $form_error;

return false;

}


}

}

}


}




function lh_password_changer_form_output(){

ob_start();

if ( $this->can_user_edit() ) {

$userobject = $this->get_referenced_user();


if ($GLOBALS['lh_password_changer-form-result']){


if ( is_wp_error( $GLOBALS['lh_passwordless_login-form-result'] ) ) {

echo "There was an error: ";
        foreach ( $GLOBALS['lh_passwordless_login-form-result']->get_error_messages() as $error ) {

            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';

}

} else {

$current_user = wp_get_current_user();

if ($current_user->ID != $userobject->ID){

echo "<p>The password for ".$userobject->user_login." has been changed.</p>";

} else {


echo "<p>Your password has been changed</p>";

}

}




} else {

$current_user = wp_get_current_user();

if ($current_user->ID != $userobject->ID){

echo "<p>You are changing the password for ".$userobject->user_login."</p>";

}

if ($page = get_page($this->options[$this->page_id_field])){

$action = get_permalink($this->options[ $this->page_id_field ]);



} else {

$action = "";


}





?>

<form name="lh_password_changer-form" id="lh_password_changer-form" action="<?php echo $action; ?>" method="post">

<p>
<label for="lh_password_changer-password1"><?php _e('New Password') ?></label>
<input type="password" name="lh_password_changer-password1" id="lh_password_changer-password1" placeholder="New Password"  class="input" value="" required="required" title="5 to 15 characters" />
<label for="lh_password_changer-password2"><?php _e('Confirm Password') ?></label>
<input type="password" name="lh_password_changer-password2" id="lh_password_changer-password2" placeholder="Confirm Password" class="input" value="" required="required" title="5 to 15 characters" />
<input type="submit" name="lh_password_changer-form-submit" id="lh_password_changer-form-submit" class="button-primary" value="<?php esc_attr_e('Submit'); ?>" />
</p>

 <span id="lh_password_changer-confirmMessage" class="confirmMessage"></span>

<input name="lh_password_changer-form-nonce" id="lh_password_changer-form-nonce" value="<?php echo wp_create_nonce( 'lh_password_changer-change_password'.$userobject->ID );  ?>" type="hidden" />

</form>

<?php


wp_enqueue_script('lh_password_changer-script', plugins_url( '/scripts/lh-password-changer.js' , __FILE__ ), array(), '0.13', true  );


}


} else {

echo "you are not logged in or cannot edit this user";

}

$output = ob_get_contents();
ob_end_clean();
return $output;

}


function register_shortcodes(){

add_shortcode('lh_password_changer_form', array($this,"lh_password_changer_form_output"));

}

public function plugin_menu() {
add_options_page('LH Password Changer Options', 'LH Password Changer', 'manage_options', $this->filename, array($this,"plugin_options")); 
}


function plugin_options() {

if (!current_user_can('manage_options')){

wp_die( __('You do not have sufficient permissions to access this page.') );

}


$lh_password_changer_hidden_field_name = 'lh_password_changer_submit_hidden';

if( isset($_POST[ $lh_password_changer_hidden_field_name ]) && $_POST[ $lh_password_changer_hidden_field_name ] == 'Y' ) {

if ($_POST[ $this->page_id_field ] != ""){
$options[ $this->page_id_field ] = $_POST[ $this->page_id_field ];
}



// Save the posted value in the database
update_option( $this->opt_name , $options );


// Put an settings updated message on the screen


?>
<div class="updated"><p><strong><?php _e('settings saved.', 'lh-password-changer' ); ?></strong></p></div>
<?php



} else {

$options  = get_option($this->opt_name);


}


echo "<h1>" . __( 'LH Password Changer Settings', 'lh-password-changer' ) . "</h1>";

?>


<form name="lh_password_changer-admin_form" id="lh_password_changer-admin_form" method="post" action="">
<input type="hidden" name="<?php echo $lh_password_changer_hidden_field_name; ?>" value="Y">
<p><label for="<?php echo $this->page_id_field; ?>"><?php _e("Password Change Page Id;", 'menu-test' ); ?></label> 
<input type="number" name="<?php echo $this->page_id_field; ?>" id="<?php echo $this->page_id_field; ?>" value="<?php echo $options[ $this->page_id_field ]; ?>" size="10" /><a href="<?php echo get_permalink($options[ $this->page_id_field ]); ?>">Link</a>
</p>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>


</form>

<?php


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
            switch_to_blog( $blog_id );
$this->create_page();
            restore_current_blog();
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



function __construct() {

$this->options = get_option($this->opt_name);
$this->filename = plugin_basename( __FILE__ );

add_action( 'init', array($this,"register_shortcodes"));
add_action( 'wp', array($this,"process_password_change"));
add_action('admin_menu', array($this,"plugin_menu"));
add_filter('plugin_action_links', array($this,"add_settings_link"), 10, 2);

//Filters the lh profile page output if enabled
add_filter( 'lh_profile_page_form_html', array($this,"modify_lh_profile_page_form"));


}


}



$lh_password_changer_instance = new LH_password_changer_plugin();
register_activation_hook(__FILE__, array($lh_password_changer_instance,'on_activate'), 10, 1);

?>