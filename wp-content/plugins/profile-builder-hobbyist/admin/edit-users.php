<?php
/**
 * Function that creates the "Add User" submenu page
 *
 * @since v.2.0
 *
 * @return void
 */
function wppb_edit_new_user_submenu_page() {
	add_submenu_page( 'profile-builder', __( 'Edit User', 'profile-builder' ), __( 'Edit User', 'profile-builder' ), 'manage_options', 'profile-builder-edit-user', 'wppb_edit_user_content' );
}
add_action( 'admin_menu', 'wppb_edit_new_user_submenu_page',  1);

/**
 * Function that adds content to the "Basic Information" submenu page
 *
 * @since v.2.0
 *
 * @return string
 */
function wppb_edit_user_content() {
	
	// $version = 'Free';
	// $version = ( ( PROFILE_BUILDER == 'Profile Builder Pro' ) ? 'Pro' : $version );
	// $version = ( ( PROFILE_BUILDER == 'Profile Builder Hobbyist' ) ? 'Hobbyist' : $version );
	
	require_once WPPB_PLUGIN_DIR . 'admin/form/edit-user.php';

}