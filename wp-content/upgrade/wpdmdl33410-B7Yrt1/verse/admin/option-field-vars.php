<?php
$section = isset($_GET['section']) ? $_GET['section'] : 'wpeden_general_settings';


$settings_icons = array(
    'wpeden_general_settings' => 'tn-settings',
    'wpeden_homepage_settings' => 'tn-home',
    'wpeden_sidebar_settings' => 'tn-layout-sidebar-right',
    'wpeden_layout_settings' => 'tn-layout',
    'wpeden_typo_settings' => 'tn-text',
    'wpeden_search_settings' => 'tn-search',
    'wpeden_custom_css' => 'tn-css3',
    'wpeden_custom_js' => 'tn-wand',
    'wpeden_social_settings' => 'tn-share',
    'wpeden_contact_settings' => 'tn-email',
    'wpeden_mmode_settings' => 'tn-timer'

);

$settings_sections = array(
    'wpeden_general_settings' => 'General',
    //'wpeden_homepage_settings' => 'Homepage',
    'wpeden_sidebar_settings' => 'Sidebars',
    'wpeden_layout_settings' => 'Layouts',
    'wpeden_typo_settings' => 'Typography',  //will available from next update
    'wpeden_search_settings' => 'Search Page',
    'wpeden_custom_css' => 'Custom CSS',
    'wpeden_custom_js' => 'Footer Codes',
    'wpeden_social_settings' => 'Social Networks',
    'wpeden_contact_settings' => 'Contact Info',
    'wpeden_mmode_settings' => 'Maintenance Mode'
);

$settings_fields = array(

    /***  General Settings *******************/

    'site_logo' => array('id' => 'site_logo',
        'section' => 'wpeden_general_settings',
        'label' => 'Logo',
        'name' => 'wpeden_general_settings[site_logo]',
        'type' => 'callback',
        'value' => WPEdenThemeEngine::GetOption('site_logo'),
        'validate' => 'str',
        'dom_callback' => 'WPEdenOptionFields::MediaPicker',
        'dom_callback_params' => array('name' => 'wpeden_general_settings[site_logo]', 'id' => 'site_logo', 'selected' => WPEdenThemeEngine::GetOption('site_logo'))
    ),

    'site_logo_footer' => array('id' => 'site_logo_footer',
        'section' => 'wpeden_general_settings',
        'label' => 'Logo for Footer',
        'name' => 'wpeden_general_settings[site_logo_footer]',
        'type' => 'callback',
        'value' => WPEdenThemeEngine::GetOption('site_logo_footer'),
        'validate' => 'str',
        'dom_callback' => 'WPEdenOptionFields::MediaPicker',
        'dom_callback_params' => array('name' => 'wpeden_general_settings[site_logo_footer]', 'id' => 'site_logo_footer', 'selected' => WPEdenThemeEngine::GetOption('site_logo_footer'))
    ),

    'favicon' => array('id' => 'favicon',
        'section' => 'wpeden_general_settings',
        'label' => 'Fav Icon',
        'name' => 'wpeden_general_settings[favicon]',
        'type' => 'callback',
        'value' => WPEdenThemeEngine::GetOption('favicon'),
        'validate' => 'str',
        'dom_callback' => 'WPEdenOptionFields::MediaPicker',
        'dom_callback_params' => array('name' => 'wpeden_general_settings[favicon]', 'id' => 'favicon', 'selected' => WPEdenThemeEngine::GetOption('favicon'))
    ),

    'layout_type' => array('id' => 'layout_type',
        'section' => 'wpeden_general_settings',
        'label' => 'Layout Type',
        'name' => 'wpeden_general_settings[layout_type]',
        'type' => 'callback',
        'class' => 'col-md-4',
        'value' => WPEdenThemeEngine::GetOption('layout_type'),
        'validate' => 'str',
        'dom_callback' => 'WPEdenOptionFields::LayoutType',
        'dom_callback_params' => array('name' => 'wpeden_general_settings[layout_type]', 'id' => 'favicon', 'selected' => WPEdenThemeEngine::GetOption('layout_type'))
    ),

    'nav_header' => array('id' => 'nav_header',
        'section'=>'wpeden_general_settings',
        'label'=>'Nav Header Style',
        'name' => 'wpeden_general_settings[nav_header]',
        'type' => 'callback',
        'value' => WPEdenThemeEngine::GetOption('nav_header'),
        'validate' => 'str',
        'dom_callback'=> 'WPEdenOptionFields::HeaderStyles',
        'dom_callback_params' => array('name'=>'wpeden_general_settings[nav_header]','id'=>'nav_header','selected'=>WPEdenThemeEngine::GetOption('nav_header'))
    ),

    'page_header_style' => array('id' => 'page_header_style',
            'section' => 'wpeden_general_settings',
            'label' => 'Page Header Style',
            'name' => 'wpeden_general_settings[page_header_style]',
            'type' => 'callback',
            'value' => WPEdenThemeEngine::GetOption('page_header_style'),
            'validate' => 'str',
            'dom_callback' => 'WPEdenOptionFields::PageHeaderStyles',
            'dom_callback_params' => array('name' => 'wpeden_general_settings[page_header_style]', 'id' => 'page_header_style', 'selected' => WPEdenThemeEngine::GetOption('page_header_style'))
        ),

    'color_scheme' => array('id' => 'color_scheme',
        'section' => 'wpeden_general_settings',
        'label' => 'Color Scheme',
        'name' => 'wpeden_general_settings[color_scheme]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('color_scheme'),
        'validate' => 'str'
    ),

    'main_nav_bg' => array('id' => 'main_nav_bg',
        'section' => 'wpeden_general_settings',
        'label' => 'Main Nav Background',
        'name' => 'wpeden_general_settings[main_nav_bg]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('main_nav_bg'),
        'validate' => 'str'
    ),
    
    'main_nav_color' => array('id' => 'main_nav_color',
        'section' => 'wpeden_general_settings',
        'label' => 'Main Nav Color',
        'name' => 'wpeden_general_settings[main_nav_color]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('main_nav_color'),
        'validate' => 'str'
    ),

    'a_color' => array('id' => 'a_color',
        'section' => 'wpeden_general_settings',
        'label' => 'Link Color (a)',
        'name' => 'wpeden_general_settings[a_color]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('a_color'),
        'validate' => 'str'
    ),
    'ah_color' => array('id' => 'ah_color',
        'section' => 'wpeden_general_settings',
        'label' => 'Link Hover Color (a:hover)',
        'name' => 'wpeden_general_settings[ah_color]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('ah_color'),
        'validate' => 'str'
    ),
    'menuh_color' => array('id' => 'menuh_color',
        'section' => 'wpeden_general_settings',
        'label' => 'Menu Hover Color',
        'name' => 'wpeden_general_settings[menuh_color]',
        'type' => 'text',
        'class' => 'colorpicker span2',
        'value' => WPEdenThemeEngine::GetOption('menuh_color'),
        'validate' => 'str'
    ),
    
    'customizer' => array('id' => 'customizer',
        'section'=>'wpeden_general_settings',
        'label'=>'Frotnend Style Changer',
        'name' => 'wpeden_general_settings[customizer]',
        'type' => 'callback',
        'value' => WPEdenThemeEngine::GetOption('customizer'),
        'validate' => 'str',
        'dom_callback'=> 'WPEdenOptionFields::NextCustomizer',
        'dom_callback_params' => array('name'=>'wpeden_general_settings[customizer]','id'=>'customizer','selected'=>WPEdenThemeEngine::GetOption('customizer'))
    ),

    'custom_sidebars' => array('id' => 'custom_sidebars',
        'section' => 'wpeden_sidebar_settings',
        'label' => '',
        'name' => 'wpeden_sidebar_settings[custom_sidebars]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::DynamicSidebars',
        'dom_callback_params' => array('name' => 'wpeden_sidebar_settings[custom_sidebars]', 'id' => 'custom_sidebars', 'value' => WPEdenThemeEngine::GetOption('custom_sidebars', array()))
    ),


    'frontpage_layout_panelstart' => array('id' => 'frontpage-layout-panel',
        'section' => 'wpeden_layout_settings',
        'label' => 'Front-Page Layout',
        'type' => 'panelstart'
    ),
    'frontpage_layout' => array('id' => 'frontpage_layout',
        'section' => 'wpeden_layout_settings',
        'label' => '',
        'name' => 'wpeden_layout_settings[frontpage_layout]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::LayoutSettings',
        'dom_callback_params' => array('name' => 'wpeden_layout_settings[frontpage_layout]', 'id' => 'frontpage_layout', 'selected' => WPEdenThemeEngine::GetOption('frontpage_layout'))
    ),
    'frontpage_layout_panelend' => array(
        'section' => 'wpeden_layout_settings',
        'type' => 'panelend'
    ),

    'post_layout_panelstart' => array('id' => 'post-layout-panel',
        'section' => 'wpeden_layout_settings',
        'label' => 'Default Post Layout',
        'type' => 'panelstart'
    ),
    'post_layout' => array('id' => 'post_layout',
        'section' => 'wpeden_layout_settings',
        'label' => '',
        'name' => 'wpeden_layout_settings[post_layout]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::LayoutSettings',
        'dom_callback_params' => array('name' => 'wpeden_layout_settings[post_layout]', 'id' => 'post_layout', 'selected' => WPEdenThemeEngine::GetOption('post_layout'))
    ),
    'post_layout_panelend' => array(
        'section' => 'wpeden_layout_settings',
        'type' => 'panelend'
    ),


    'page_layout_panelstart' => array('id' => 'page-layout-panel',
        'section' => 'wpeden_layout_settings',
        'label' => 'Default Page Layout',
        'type' => 'panelstart'
    ),
    'page_layout' => array('id' => 'page_layout',
        'section' => 'wpeden_layout_settings',
        'label' => '',
        'name' => 'wpeden_layout_settings[page_layout]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::LayoutSettings',
        'dom_callback_params' => array('name' => 'wpeden_layout_settings[page_layout]', 'id' => 'page_layout', 'selected' => WPEdenThemeEngine::GetOption('page_layout'))
    ),
    'page_layout_panelend' => array(
        'section' => 'wpeden_layout_settings',
        'type' => 'panelend'
    ),

    'archive_layout_panelstart' => array('id' => 'archive-layout-panel',
        'section' => 'wpeden_layout_settings',
        'label' => 'Default Archive Page Layout',
        'type' => 'panelstart'
    ),
    'archive_layout' => array('id' => 'archive_layout',
        'section' => 'wpeden_layout_settings',
        'label' => '',
        'name' => 'wpeden_layout_settings[archive_layout]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::LayoutSettings',
        'dom_callback_params' => array('name' => 'wpeden_layout_settings[archive_layout]', 'id' => 'archive_layout', 'selected' => WPEdenThemeEngine::GetOption('archive_layout'))
    ),
    'archive_layout_panelend' => array(
        'section' => 'wpeden_layout_settings',
        'type' => 'panelend'
    ),



    /** portfolio page settings */
    'portfolio_style' => array('id' => 'portfolio_style',
        'section' => 'wpeden_portfolio_settings',
        'label' => 'Portfolio Page Style',
        'name' => 'wpeden_portfolio_settings[portfolio_style]',
        'type' => 'callback',
        'validate' => 'int',
        'dom_callback' => 'WPEdenOptionFields::PortfolioStyle',
        'dom_callback_params' => array('name' => 'wpeden_portfolio_settings[portfolio_style]', 'id' => 'portfolio_style', 'selected' => WPEdenThemeEngine::GetOption('portfolio_style', 3))
    ),
    'portfolio_cols' => array('id' => 'portfolio_cols',
        'section' => 'wpeden_portfolio_settings',
        'label' => 'Portfolio Page Cols',
        'name' => 'wpeden_portfolio_settings[portfolio_cols]',
        'type' => 'callback',
        'validate' => 'int',
        'dom_callback' => 'WPEdenOptionFields::PortfolioCols',
        'dom_callback_params' => array('name' => 'wpeden_portfolio_settings[portfolio_cols]', 'id' => 'portfolio_cols', 'selected' => WPEdenThemeEngine::GetOption('portfolio_cols', 4))
    ),

    /***  Module Settings *******************/
    'map_address' => array('id' => 'map_address',
        'section' => 'wpeden_contact_settings',
        'label' => 'Google Map Address',
        'name' => 'wpeden_contact_settings[map_address]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('map_address')
    ),
    'contact_address' => array('id' => 'contact_address',
        'section' => 'wpeden_contact_settings',
        'label' => 'Contact Address',
        'name' => 'wpeden_contact_settings[contact_address]',
        'type' => 'textarea',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('contact_address')
    ),
    'contact_phone' => array('id' => 'contact_phone',
        'section' => 'wpeden_contact_settings',
        'label' => 'Phone',
        'name' => 'wpeden_contact_settings[contact_phone]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('contact_phone')
    ),
    'contact_email' => array('id' => 'contact_email',
        'section' => 'wpeden_contact_settings',
        'label' => 'Email',
        'name' => 'wpeden_contact_settings[contact_email]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('contact_email')
    ),
    'contact_thanks_msg' => array('id' => 'contact_thanks_msg',
        'section' => 'wpeden_contact_settings',
        'label' => 'Thank you message',
        'description' => 'Thank you message',
        'name' => 'wpeden_contact_settings[contact_thanks_msg]',
        'type' => 'textarea',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('contact_thanks_msg')
    ),


    /***  Custom CSS Settings *******************/

    'wpeden_custom_css_txt' => array('id' => 'wpeden_custom_css_opt',
        'section' => 'wpeden_custom_css',
        'label' => '',
        'name' => 'wpeden_custom_css[wpeden_custom_css_txt]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::CustomCSS',
        'dom_callback_params' => array('name' => 'wpeden_custom_css[wpeden_custom_css_txt]', 'id' => 'wpeden_custom_css_opt', 'value' => WPEdenThemeEngine::GetOption('wpeden_custom_css_txt'))
    ),

    /***  Custom JS Settings *******************/

    'custom_js_txt' => array('id' => 'wpeden_custom_js_opt',
        'section' => 'wpeden_custom_js',
        'label' => '',
        'description' => 'You can add custom tracking codes or any other codes to enqueue in footer',
        'name' => 'wpeden_custom_js[footer_code]',
        'type' => 'textarea',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('footer_code')
    ),


    /***  Typography Settings *******************/

    'typo_generic' => array('id' => 'typo_generic',
        'section' => 'wpeden_typo_settings',
        'label' => 'Generic Fonts',
        'name' => 'typo_generic',
        'type' => 'panelstart'
    ),
    'typo_h1' => array('id' => 'typo_h1',
        'section' => 'wpeden_typo_settings',
        'label' => 'H1 Font',
        'name' => 'wpeden_typo_settings[typo_h1]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_h1]', 'id' => 'typo_h1', 'sel' => WPEdenThemeEngine::GetOption('typo_h1'))
    ),

    'typo_h2' => array('id' => 'typo_h2',
        'section' => 'wpeden_typo_settings',
        'label' => 'H2 Font',
        'name' => 'wpeden_typo_settings[typo_h2]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_h2]', 'id' => 'typo_h2', 'sel' => WPEdenThemeEngine::GetOption('typo_h2'))
    ),

    'typo_h3' => array('id' => 'typo_h3',
        'section' => 'wpeden_typo_settings',
        'label' => 'H3 Font',
        'name' => 'wpeden_typo_settings[typo_h3]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_h3]', 'id' => 'typo_h3', 'sel' => WPEdenThemeEngine::GetOption('typo_h3'))
    ),

    'typo_h4' => array('id' => 'typo_h4',
        'section' => 'wpeden_typo_settings',
        'label' => 'H4 Font',
        'name' => 'wpeden_typo_settings[typo_h4]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_h4]', 'id' => 'typo_h4', 'sel' => WPEdenThemeEngine::GetOption('typo_h4'))
    ),

    'typo_regular' => array('id' => 'typo_regular',
        'section' => 'wpeden_typo_settings',
        'label' => 'Regular Text Font',
        'name' => 'wpeden_typo_settings[typo_regular]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_regular]', 'id' => 'typo_regular', 'sel' => WPEdenThemeEngine::GetOption('typo_regular'))
    ),

    'typo-generic-panelsend' => array(
        'section' => 'wpeden_typo_settings',
        'type' => 'panelend'
    ),

    'type_post' => array('id' => 'type_post',
        'section' => 'wpeden_typo_settings',
        'label' => 'Post Fonts',
        'name' => 'wpeden_typo_settings',
        'type' => 'panelstart'
    ),

    'typo_post_title' => array('id' => 'typo_post_title',
        'section' => 'wpeden_typo_settings',
        'label' => 'Post Title',
        'name' => 'wpeden_typo_settings[wpeden_post_title]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[wpeden_post_title]', 'id' => 'typo_post_title', 'sel' => WPEdenThemeEngine::GetOption('wpeden_post_title'))
    ),
    'typo_post_content' => array('id' => 'typo_post_content',
        'section' => 'wpeden_typo_settings',
        'label' => 'Post Content',
        'name' => 'wpeden_typo_settings[wpeden_post_content]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[wpeden_post_content]', 'id' => 'wpeden_post_content', 'sel' => WPEdenThemeEngine::GetOption('wpeden_post_content'))
    ),

    'typo_post_meta' => array('id' => 'typo_post_meta',
        'section' => 'wpeden_typo_settings',
        'label' => 'Post Meta',
        'name' => 'wpeden_typo_settings[typo_post_meta]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_post_meta]', 'id' => 'typo_post_meta', 'sel' => WPEdenThemeEngine::GetOption('typo_post_meta'))
    ),

    'typo-post-panelsend' => array(
        'section' => 'wpeden_typo_settings',
        'type' => 'panelend'
    ),


    'type_widget' => array('id' => 'type_widget',
        'section' => 'wpeden_typo_settings',
        'label' => 'Widget Fonts',
        'name' => 'wpeden_typo_settings',
        'type' => 'panelstart'
    ),


    'typo_widget_title' => array('id' => 'typo_widget_title',
        'section' => 'wpeden_typo_settings',
        'label' => 'Widget Title',
        'name' => 'wpeden_typo_settings[wpeden_widget_title]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[wpeden_widget_title]', 'id' => 'wpeden_widget_title', 'sel' => WPEdenThemeEngine::GetOption('wpeden_widget_title'))
    ),
    'typo_widget_content' => array('id' => 'typo_widget_content',
        'section' => 'wpeden_typo_settings',
        'label' => 'Widget Content',
        'name' => 'wpeden_typo_settings[wpeden_widget_content]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[wpeden_widget_content]', 'id' => 'wpeden_widget_content', 'sel' => WPEdenThemeEngine::GetOption('wpeden_widget_content'))
    ),

    'typo-widget-panelsend' => array(
        'section' => 'wpeden_typo_settings',
        'type' => 'panelend'
    ),

    'type_menu' => array('id' => 'type_menu',
        'section' => 'wpeden_typo_settings',
        'label' => 'Menu Fonts',
        'name' => 'wpeden_typo_settings',
        'type' => 'panelstart'
    ),

    'typo_top_menu' => array('id' => 'typo_top_menu',
        'section' => 'wpeden_typo_settings',
        'label' => 'Top Level Menu',
        'name' => 'wpeden_typo_settings[typo_top_menu]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_top_menu]', 'id' => 'typo_top_menu', 'sel' => WPEdenThemeEngine::GetOption('typo_top_menu'))
    ),

    'typo_dropdown_menu' => array('id' => 'typo_dropdown_menu',
        'section' => 'wpeden_typo_settings',
        'label' => 'DropDown Menu',
        'name' => 'wpeden_typo_settings[typo_dropdown_menu]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::FontDropdown',
        'dom_callback_params' => array('name' => 'wpeden_typo_settings[typo_dropdown_menu]', 'id' => 'typo_dropdown_menu', 'sel' => WPEdenThemeEngine::GetOption('typo_dropdown_menu'))
    ),

    'typo-menu-panelsend' => array(
        'section' => 'wpeden_typo_settings',
        'type' => 'panelend'
    ),

    'search_post_types' => array('id' => 'search_post_types',
        'section' => 'wpeden_search_settings',
        'label' => 'Search Post Types',
        'name' => 'wpeden_search_settings[search_post_types]',
        'type' => 'callback',
        'validate' => 'array',
        'dom_callback' => 'WPEdenOptionFields::PostTypeCheckboxes',
        'dom_callback_params' => array('name' => 'wpeden_search_settings[search_post_types]', 'id' => 'search_post_types', 'selected' => WPEdenThemeEngine::GetOption('search_post_types', array()))
    ),

    /***  Social Settings *****************/

    'facebook_profile_url' => array('id' => 'facebook_profile_url',
        'section' => 'wpeden_social_settings',
        'label' => 'FaceBook Profile URL',
        'name' => 'wpeden_social_settings[facebook_profile_url]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('facebook_profile_url')
    ),

    'twitter_profile_url' => array('id' => 'twitter_profile_url',
        'section' => 'wpeden_social_settings',
        'label' => 'Twitter Profile URL',
        'name' => 'wpeden_social_settings[twitter_profile_url]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('twitter_profile_url')
    ),

    'googleplus_profile_url' => array('id' => 'googleplus_profile_url',
        'section' => 'wpeden_social_settings',
        'label' => 'Google+ Profile URL',
        'name' => 'wpeden_social_settings[googleplus_profile_url]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('googleplus_profile_url')
    ),

    'pinterest_profile_url' => array('id' => 'pinterest_profile_url',
        'section' => 'wpeden_social_settings',
        'label' => 'Pinterest Profile URL',
        'name' => 'wpeden_social_settings[pinterest_profile_url]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('pinterest_profile_url')
    ),

    'linkedin_profile_url' => array('id' => 'linkedin_profile_url',
        'section' => 'wpeden_social_settings',
        'label' => 'LinkedIn Profile URL',
        'name' => 'wpeden_social_settings[linkedin_profile_url]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('linkedin_profile_url')
    ),

    /*
            'post_sharing' => array('id' => 'post_sharing',
                                'section'=>'wpeden_social_settings',
                                'label'=>'Post Sharing',
                                'name' => 'wpeden_social_settings[post_sharing]',
                                'type' => 'callback',
                                'validate' => 'array',
                                'value'=> WPEdenThemeEngine::GetOption('post_sharing'),
                                'dom_callback' => 'wpeden_post_sharing',
                                'dom_callback_params' => array('name'=>'wpeden_social_settings[post_sharing]','id'=>'post_sharing','selected'=>WPEdenThemeEngine::GetOption('post_sharing'))

            ),
    */
    'site_offline' => array('id' => 'site_offline',
        'section' => 'wpeden_mmode_settings',
        'label' => 'Maintenance Mode',
        'name' => 'wpeden_mmode_settings[site_offline]',
        'type' => 'callback',
        'validate' => 'callback',
        'validate_callback' => 'WPEdenThemeEngine::InitiateMaintenanceMode',
        'value' => WPEdenThemeEngine::GetOption('site_offline'),
        'dom_callback' => 'WPEdenOptionFields::Dropdown',
        'dom_callback_params' => array('options' => array('0' => 'Inactive', '1' => 'Active'), 'name' => 'wpeden_mmode_settings[site_offline]', 'id' => 'site_offline', 'selected' => WPEdenThemeEngine::GetOption('site_offline'))

    ),
    'offline_page' => array('id' => 'offline_page',
        'section' => 'wpeden_mmode_settings',
        'label' => 'Offline Page',
        'name' => 'wpeden_mmode_settings[offline_page]',
        'type' => 'callback',
        'validate' => 'int',
        'dom_callback' => 'wp_dropdown_pages',
        'dom_callback_params' => 'echo=0&name=wpeden_mmode_settings[offline_page]&id=offline_page&selected=' . WPEdenThemeEngine::GetOption('offline_page')
    ),

    'maintenenance_time' => array('id' => 'maintenenance_time',
        'section' => 'wpeden_mmode_settings',
        'label' => 'Maintenance Time',
        'placeholder' => 'in minutes',
        'class' => 'input-small',
        'description' => 'minutes',
        'name' => 'wpeden_mmode_settings[maintenenance_time]',
        'type' => 'text',
        'validate' => 'str',
        'value' => WPEdenThemeEngine::GetOption('maintenenance_time')
    ),


);
