<?php
/**
 * RTL CBS Consumer's functions and definitions
 */
if( ! function_exists( 'rtlcbsconsumer_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function rtlcbsconsumer_setup() {

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for custom logo.
	add_theme_support( 'custom-header', array(
		'default-image' => get_template_directory_uri() . '/images/header.png',
		'height'      => 152,
		'width'       => 543,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() .
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rtlcbsconsumer' ),
		'footer'  => __( 'Footer Menu', 'rtlcbsconsumer' ),
		'about'  => __( 'Footer About Menu', 'rtlcbsconsumer' ),
		'extra'  => __( 'Footer Extra Menu', 'rtlcbsconsumer' ),
		'social'  => __( 'Social Links Menu', 'rtlcbsconsumer' ),
		'featured-shows'  => __( 'Featured Shows Menu', 'rtlcbsconsumer' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // rtlcbsconsumer setup
add_action( 'after_setup_theme', 'rtlcbsconsumer_setup' );

// Enqueue styles and scripts
function rtlcbsconsumer_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.6', 'all' );
	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/css/swiper.min.css', false, '3.3.1', 'all' );
	wp_enqueue_style( 'mCustomScrollBar-style', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css', false, '3.1.3', 'all' );
	wp_enqueue_style( 'simplebar-style', get_template_directory_uri() . '/css/simplebar.css', false, '1.1.9', 'all' );
	wp_enqueue_style( 'rtlcbsconsumer-style', get_stylesheet_uri(), false, '1.0', 'all' );

	//wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/vendor/jquery.min.js', false, 1.12, true);
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array ( 'jquery' ), 3.3, true);
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', false, 1.0, true);
	wp_enqueue_script( 'froogaloop', '//f.vimeocdn.com/js/froogaloop2.min.js', false, 1.0, true);
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', false, 1.0, true);
}
add_action( 'wp_enqueue_scripts', 'rtlcbsconsumer_scripts' );

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'What\'s on RTL CBS Entertainment HD', 'rtlcbsconsumer' ),
		'id'            => 'rtlcbs-home-sidebar',
		'description'   => __( 'Add widgets here to appear in your homesidebar.', 'rtlcbsconsumer' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );


function theme_slug_filter_wp_title( $title ) {
	switch_to_blog( 1 );
    if ( is_404() && isset($_GET['ep']) ) {
    	$post_id = getPostIdBySlug($_GET['ep']);
        $title = get_the_title($post_id);
    }else if ( is_404() ){
    	$post_id = getPostIdBySlug(get_query_var('pagename'));
        $title = get_the_title($post_id);
    }
    restore_current_blog();
    return $title;
}
add_filter( 'wp_title', 'theme_slug_filter_wp_title' );