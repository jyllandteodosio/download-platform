<?php
/*
Plugin Name: Publish On Screen
Plugin URI: http://wordpress.org/plugins/publish-on-screen
Description: A WordPress plugin that alters the position and behavior of the Publish button, making it stick to the bottom of the page when scrolling down the page.
Version: 1.0
Author: Parsa Kafi
Author URI: http://parsa.ws
License: GPLv2 or later
*/

add_action( 'admin_enqueue_scripts', 'posp_enqueue_scripts', 20 );

function posp_enqueue_scripts() {
    global $pagenow;

    if ( is_admin() && ($pagenow == 'post.php' || $pagenow == 'post-new.php') ) {
        wp_register_script('publish-on-screen', plugin_dir_url( __FILE__ ) . 'publish-on-screen.js', array( 'jquery' ) );
        wp_register_style('publish-on-screen', plugin_dir_url( __FILE__ ) . 'publish-on-screen.css');
        wp_enqueue_script('publish-on-screen');
        wp_enqueue_style('publish-on-screen');
    }
}
