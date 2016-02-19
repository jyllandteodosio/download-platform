<?php

require_once( get_template_directory() . "/admin/ThemeEngine.class.php" );

require_once( get_template_directory() . "/libs/Framework.class.php" );
require_once( get_template_directory() . "/libs/TheNext.class.php" );
require_once( get_template_directory() . "/libs/NavMenu.class.php" );
require_once( get_template_directory() . "/libs/menu-item-icon.php" );
require_once( get_template_directory() . "/libs/MetaBoxes.class.php" );
require_once( get_template_directory() . "/libs/StructuredData.class.php" );
require_once( get_template_directory() . "/libs/post-functions.php" );
require_once( get_template_directory() . "/libs/util-functions.php" );

require_once( get_template_directory() . "/modules/colorbox/colorbox.php" );
require_once( get_template_directory() . "/modules/preloader/preloader.php" );

new TheNext();

class TheNextBase{

    function __construct(){

        $this->Actions();
        $this->Filters();

    }

    function Actions(){
        add_action('thenext_page_header_bottom_left_content', array($this, 'PageHeaderBottomLeft'));
    }

    function Filters(){
        add_filter('page_header_bottom_left_content', array($this, 'SearchPageHeaderBottomLeft'));
        add_filter('thenext_sidebar_styles', array($this, 'SidebarStyles'));
        add_filter('thenext_settings_section', array($this, 'CustomHomepageSettingsSection'));
        add_filter('thenext_settings_fields', array($this, 'CustomHomepageSettingsFields'));
    }


    function SidebarStyles($styles){
        $styles['boxed-panel'] = array(
            'style_name' => 'Boxed Panel',
            'before_widget' => '<div class="widget-boxed-panel">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-boxed-panel-heading widget-title">',
            'after_title' => '</h3>'
        );
        return $styles;
    }

    function PageHeaderBottomLeft(){
        $header_bottom_left_cont = "";
        if (function_exists('yoast_breadcrumb'))
            $header_bottom_left_cont =  yoast_breadcrumb('<a>', '</a>', false);
        echo apply_filters('page_header_bottom_left_content',$header_bottom_left_cont);
    }

    function SearchPageHeaderBottomLeft($header_bottom_left_cont = null){

        if(!is_search()) return $header_bottom_left_cont;

        ob_start();

        $all_post_types = get_post_types('','objects');
        $search_post_types = WPEdenThemeEngine::GetOption('search_post_types', array());
        $current_post_type = isset($_GET['post_type']) && post_type_exists($_GET['post_type'])?$_GET['post_type']:'post';

        ?>
        <ul class="nav nav-pills pills-post-type">

            <?php foreach($search_post_types as $post_type){
                if(isset($all_post_types[$post_type])){
                ?>

                <li class='<?php echo $post_type == esc_attr(get_query_var('post_type')) || ( $current_post_type =='' && $post_type == 'post' )?'active':''; ?>' ><a href="<?php echo home_url("/?post_type={$post_type}&s=".get_query_var('s')); ?>"><?php echo $all_post_types[$post_type]->labels->name; ?></a></li>

            <?php }} ?>

        </ul>
        <?php
        $cont = ob_get_clean();
        return $cont;
    }

    /*
     * Add new section/s tab/s in Theme Option using 'thenext_settings_section' fiter
     **********************************************************************************/
    function CustomHomepageSettingsSection($sections){
        $sections['wpeden_homepage_settings'] = 'Homepage';
        return $sections;
    }
    
    /*
     * Add new settings fields in Theme Option using 'thenext_settings_fields' fiter
     **********************************************************************************/
    function CustomHomepageSettingsFields($vars){
        $home = array(
            'home_sldr_panelstart' => array('id' => 'home-slider-section',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Homepage Sliders',
                'type' => 'panelstart'
            ),
            'home_slider_category' => array('id' => 'home_slider_category',
                'section'=>'wpeden_homepage_settings',
                'label'=>'Slider Category',
                'name' => 'wpeden_homepage_settings[home_slider_category]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback'=> 'WPEdenOptionFields::TaxonomiesDropdown',
                'dom_callback_params' => array('echo'=>0, 'taxonomy' => 'wpdmcategory','name'=>'wpeden_homepage_settings[home_slider_category]','id'=>'category_4','selected'=>WPEdenThemeEngine::GetOption('home_slider_category'))
            ),

            'home_slide_count' => array('id' => 'home_slide_count',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Number of Posts',
                'name' => 'wpeden_homepage_settings[home_slide_count]',
                'type' => 'number',
                'min' => 3,
                'max' => 7,
                'value' => WPEdenThemeEngine::GetOption('home_slide_count'),
                'validate' => 'int'
            ),

            'home_sldr_panelend' => array(
                'section' => 'wpeden_homepage_settings',
                'type' => 'panelend'
            ),
            'home_slider_panelstart' => array('id' => 'home_slider_panelstart',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Top Featured Pages',
                'type' => 'panelstart'
            ),
            'home_featured_page_1' => array('id' => 'home_featured_page_1',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Featured Page 1',
                'name' => 'wpeden_homepage_settings[home_featured_page_1]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'wp_dropdown_pages',
                'dom_callback_params' => 'echo=0&name=wpeden_homepage_settings[home_featured_page_1]&id=home_featured_page_1&selected=' . WPEdenThemeEngine::GetOption('home_featured_page_1')
            ),
            'home_featured_page_2' => array('id' => 'home_featured_page_2',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Featured Page 2',
                'name' => 'wpeden_homepage_settings[home_featured_page_2]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'wp_dropdown_pages',
                'dom_callback_params' => 'echo=0&name=wpeden_homepage_settings[home_featured_page_2]&id=home_featured_page_2&selected=' . WPEdenThemeEngine::GetOption('home_featured_page_2')
            ),
            'home_featured_page_3' => array('id' => 'home_featured_page_3',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Featured Page 3',
                'name' => 'wpeden_homepage_settings[home_featured_page_3]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'wp_dropdown_pages',
                'dom_callback_params' => 'echo=0&name=wpeden_homepage_settings[home_featured_page_3]&id=home_featured_page_3&selected=' . WPEdenThemeEngine::GetOption('home_featured_page_3')
            ),
            'home_featured_page_4' => array('id' => 'home_featured_page_4',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Featured Page 4',
                'name' => 'wpeden_homepage_settings[home_featured_page_4]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'wp_dropdown_pages',
                'dom_callback_params' => 'echo=0&name=wpeden_homepage_settings[home_featured_page_4]&id=home_featured_page_4&selected=' . WPEdenThemeEngine::GetOption('home_featured_page_4')
            ),

            'home_slider_panelend' => array(
                'section' => 'wpeden_homepage_settings',
                'type' => 'panelend'
            ),

            'home_ftr_panelstart' => array('id' => 'home-features-section',
                'section' => 'wpeden_homepage_settings',
                'label' => 'New Downloads Section',
                'type' => 'panelstart'
            ),

            'newdl_section_title' => array('id' => 'newdl_section_title',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Headline',
                'name' => 'wpeden_homepage_settings[newdl_section_title]',
                'type' => 'text',
                'value' => WPEdenThemeEngine::GetOption('newdl_section_title'),
                'validate' => 'str'
            ),

            'newdl_section_desc' => array('id' => 'newdl_section_desc',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Description',
                'name' => 'wpeden_homepage_settings[newdl_section_desc]',
                'type' => 'textarea',
                'value' => WPEdenThemeEngine::GetOption('newdl_section_desc'),
                'validate' => 'str'
            ),

            'home_ftr_panelsend' => array(
                'section' => 'wpeden_homepage_settings',
                'type' => 'panelend'
            ),


            'home_slider_heading4' => array('id' => 'home-tabbed-section',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Tabbed Section',
                'name' => 'home_slider_heading',
                'type' => 'panelstart'
            ),
            'tabbed_section_title' => array('id' => 'tabbed_section_title',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Headline',
                'name' => 'wpeden_homepage_settings[tabbed_section_title]',
                'type' => 'text',
                'value' => WPEdenThemeEngine::GetOption('tabbed_section_title'),
                'validate' => 'str'
            ),

            'tabbed_section_desc' => array('id' => 'tabbed_section_desc',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Description',
                'name' => 'wpeden_homepage_settings[tabbed_section_desc]',
                'type' => 'textarea',
                'value' => WPEdenThemeEngine::GetOption('tabbed_section_desc'),
                'validate' => 'str'
            ),
            'wpdm_category_1' => array('id' => 'wpdm_category_1',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Tab Category 1',
                'name' => 'wpeden_homepage_settings[wpdm_category_1]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'WPEdenOptionFields::TaxonomiesDropdown',
                'dom_callback_params' => array('taxonomy' => 'wpdmcategory', 'name' => 'wpeden_homepage_settings[wpdm_category_1]', 'id' => 'wpdm_category_1', 'selected' => WPEdenThemeEngine::GetOption('wpdm_category_1'))
            ),
            'wpdm_category_2' => array('id' => 'wpdm_category_2',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Tab Category 2',
                'name' => 'wpeden_homepage_settings[wpdm_category_2]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'WPEdenOptionFields::TaxonomiesDropdown',
                'dom_callback_params' => array('taxonomy' => 'wpdmcategory', 'name' => 'wpeden_homepage_settings[wpdm_category_2]', 'id' => 'wpdm_category_2', 'selected' => WPEdenThemeEngine::GetOption('wpdm_category_2'))
            ),
            'wpdm_category_3' => array('id' => 'wpdm_category_3',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Tab Category 3',
                'name' => 'wpeden_homepage_settings[wpdm_category_3]',
                'type' => 'callback',
                'validate' => 'int',
                'dom_callback' => 'WPEdenOptionFields::TaxonomiesDropdown',
                'dom_callback_params' => array('taxonomy' => 'wpdmcategory', 'name' => 'wpeden_homepage_settings[wpdm_category_3]', 'id' => 'wpdm_category_3', 'selected' => WPEdenThemeEngine::GetOption('wpdm_category_3'))
            ),

            'home_tbd_panelsend' => array(
                'section' => 'wpeden_homepage_settings',
                'type' => 'panelend'
            ),
            'blog_panelstart' => array('id' => 'blog-section',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Blog Section',
                'type' => 'panelstart'
            ),

            'blog_section_title' => array('id' => 'blog_section_title',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Headline',
                'name' => 'wpeden_homepage_settings[blog_section_title]',
                'type' => 'text',
                'value' => WPEdenThemeEngine::GetOption('blog_section_title'),
                'validate' => 'str'
            ),

            'blog_section_desc' => array('id' => 'blog_section_desc',
                'section' => 'wpeden_homepage_settings',
                'label' => 'Description',
                'name' => 'wpeden_homepage_settings[blog_section_desc]',
                'type' => 'textarea',
                'value' => WPEdenThemeEngine::GetOption('blog_section_desc'),
                'validate' => 'str'
            ),

            'blog_ftr_panelsend' => array(
                'section' => 'wpeden_homepage_settings',
                'type' => 'panelend'
            ),

        );

        return array_merge($vars, $home);
    }
}


new TheNextBase();




