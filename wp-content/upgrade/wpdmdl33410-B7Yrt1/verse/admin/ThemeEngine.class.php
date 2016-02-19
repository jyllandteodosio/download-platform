<?php

define("WPEDEN_THEME_DIR",dirname(dirname(__FILE__)));
define("WPEDEN_THEME_URL",get_stylesheet_directory_uri());
define("WPEDEN_TEMPLATE_URL",get_template_directory_uri());

global $wpeden_wf_data, $wpede_data_fetched;

require_once dirname(__FILE__).'/Util.class.php';
require_once dirname(__FILE__).'/OptionFields.class.php';
require_once(dirname(__FILE__).'/option-field-vars.php');

class WPEdenThemeEngine{


    function __construct(){
        $this->Actions();
        $this->Filters();

    }

    function Filters(){
        add_filter( 'body_class', array($this, 'BodyClass'), 10, 2 );
        add_filter( 'thenext_layout_type', array($this, 'PageLayout') );
    }

    function Actions(){
        add_action( 'admin_enqueue_scripts', array($this, 'AdminEnqueueScripts'));
        add_action( 'admin_menu', array($this, 'AdminMenu'));
        add_action( 'wp_before_admin_bar_render', array($this, 'ToolBarMenu'));
        add_action( 'template_redirect', array($this, 'CheckMaintenanceMode'));
        add_action('admin_init', array($this, 'SetupThemeOptions'));
        add_action('wp_head', array($this, 'WPHead'));
        add_action('wp_footer', array($this, 'WPFooter'));
        add_action('admin_head', array($this, 'AdminHead'));
        add_action( 'widgets_init', array($this, 'InitiateWidgets') );

    }

    function WPHead(){
        $this->CustomCSS();
        $this->FavIcon();
        $this->PageCSS();
        $this->CustomPageBG();
    }

    function WPFooter(){
       echo self::GetOption('footer_code');
    }


    function AdminHead(){
        ?>
        <script>var wpeden_theme_url='<?php echo WPEDEN_THEME_URL; ?>';</script>
        <?php
    }


    function PageCSS(){
        wp_reset_query();
        global $post;
        if(!is_404())
            $data = maybe_unserialize(get_post_meta($post->ID,'wpeden_post_meta', true));
        if(isset($data['page_css'])) {
            ?>
            <!-- custom page css -->
            <style>
                <?php echo $data['page_css']; ?>
            </style>
            <!-- // custom page css -->
        <?php
        }

    }

    /**
     * @usage Custom Page Background for specific pages
     */
    function CustomPageBG(){
        global $post;
        if(!is_404())
            $data = maybe_unserialize(get_post_meta($post->ID,'wpeden_post_meta', true));
        $css = "";
        if(isset($data['pagebg']['image']) && $data['pagebg']['image']!='') $css .= "background-image: url({$data['pagebg']['image']}) !important;";
        if(isset($data['pagebg']['color']) && $data['pagebg']['color']!='') $css .= "background-color: {$data['pagebg']['color']} !important;";
        if(isset($data['pagebg']['repeat']) && $data['pagebg']['repeat']!='') $css .= "background-repeat: {$data['pagebg']['repeat']} !important;";
        if(isset($data['pagebg']['attachment']) && $data['pagebg']['attachment']!='') $css .= "background-attachment: {$data['pagebg']['attachment']} !important;";
        if(isset($data['pagebg']['position_h']) && $data['pagebg']['position_h']!='') $css .= "background-position: {$data['pagebg']['position_h']} {$data['pagebg']['position_v']} !important;";
        if(is_page() && $post->ID!=''){
            ?>
            <!-- Custom page background -->
            <style>body.page-id-<?php echo $post->ID; ?>{ <?php echo $css; ?> }</style>
            <!-- / Custom page background -->
        <?php
        }
    }


    /**
     * @usage: Initiate Widgets
     */
    function InitiateWidgets(){

        register_sidebar(array(
            'name' => 'Footer Left',
            'id' => 'footer1',
            'description' => 'Footer Left',
            'before_widget' => '<div class="footer-widget  widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-heading">',
            'after_title' => '</div>'
        ));

        register_sidebar(array(
            'name' => 'Footer Middle',
            'id' => 'footer2',
            'description' => 'Footer Middle',
            'before_widget' => '<div class="footer-widget  widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-heading">',
            'after_title' => '</div>'
        ));

        register_sidebar(array(
            'name' => 'Footer Right',
            'id' => 'footer3',
            'description' => 'Footer Right',
            'before_widget' => '<div class="footer-widget  widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-heading">',
            'after_title' => '</div>'
        ));
        register_sidebar(array(
            'name' => 'Footer Last',
            'id' => 'footer4',
            'description' => 'Footer Last',
            'before_widget' => '<div class="footer-widget  widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-heading">',
            'after_title' => '</div>'
        ));

        $sidebar_styles = array(
            'default' =>array(
                'style_name' => 'Default',
                'before_widget' => '<div class="widget widget-default">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-heading widget-title">',
                'after_title' => '</h3>'
            )
        );
        $sidebar_styles = apply_filters("thenext_sidebar_styles", $sidebar_styles);

        $custom_sidebars = WPEdenThemeEngine::GetOption('custom_sidebars', array());

        foreach($custom_sidebars as $id => $custom_sidebar){
            $custom_sidebar['id'] = $id;
            $style = (isset($sidebar_styles[$custom_sidebar['style']]))?$custom_sidebar['style']:'default';
            $custom_sidebar = array_merge($custom_sidebar, $sidebar_styles[$style]);
            register_sidebar($custom_sidebar);

        }

    }


    function ResetThemeOpts(){
        if ( isset($_REQUEST['_wtodr_nonce'])&&wp_verify_nonce( $_REQUEST['_wtodr_nonce'], 'wpeden-reset-data' )) {
            global  $settings_sections;

            $settings_sections = apply_filters("thenext_settings_section",$settings_sections);


                foreach($settings_sections as $section_id => $section_name) {
                    delete_option($section_id);
                }


            header('location: '.$_SERVER['HTTP_REFERER']);
            die();
        }
    }


    function AdminEnqueueScripts($hook){
        if(!in_array($hook, array('appearance_page_wpeden-themeopts','post-new.php','post.php','profile.php','user-new.php'))) return;
        wp_enqueue_style('bootstrap-ui',WPEDEN_TEMPLATE_URL.'/admin/bootstrap/css/bootstrap.css');
        wp_enqueue_style('chosen-ui',WPEDEN_TEMPLATE_URL.'/admin/css/chosen.css');
        wp_enqueue_script('bootstrap-js',WPEDEN_TEMPLATE_URL.'/admin/bootstrap/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('chosen-js',WPEDEN_TEMPLATE_URL.'/admin/js/chosen.jquery.js',array('jquery'));
        wp_enqueue_script('blockui-js',WPEDEN_TEMPLATE_URL.'/admin/js/jquery.blockUI.js',array('jquery'));
        wp_enqueue_script('wpeden-js',WPEDEN_TEMPLATE_URL.'/admin/js/wpeden.js',array('jquery','chosen-js','blockui-js'));
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );

        if(!in_array($hook, array('appearance_page_wpeden-themeopts'))) return;

        wp_enqueue_script( 'jquery-form' );
        wp_enqueue_style('admincss',WPEDEN_TEMPLATE_URL.'/admin/css/base-admin-style.css');
        wp_enqueue_media();
        wp_enqueue_script('media-upload');
    }

    function ThemeOptions(){
        global $settings_sections, $section, $settings_icons;
        $settings_sections = apply_filters("thenext_settings_section",$settings_sections);
        require_once dirname(__FILE__).'/theme-option-page.php';
    }

    function AdminMenu(){                                                                                             /*Theme Option Menu*/
        add_theme_page( "WP Eden Theme Options", "Theme Options", 'edit_theme_options', 'wpeden-themeopts', array($this, 'ThemeOptions') );
    }

    function ToolBarMenu() {
        global $wp_admin_bar;

        if(!current_user_can('manage_options')) return;

        $args = array(
            'id'     => 'wpeden-themeopts',
            'title'  => '<i class="tn-paint-roller" style="font-family: linecons"></i> &nbsp;'.__( 'Theme Options', 'thenext' ),
            'href'   => admin_url('themes.php?page=wpeden-themeopts'),
        );
        $wp_admin_bar->add_menu( $args );

    }

    public static function Layout($default='wide'){
        echo apply_filters('thenext_layout_type',WPEdenThemeEngine::GetOption('layout_type',$default));
    }

    function BodyClass($classes, $class){
        if(is_user_logged_in())
            $classes[] = 'thenext-logged-in';
        else
            $classes[] = 'thenext-not-logged-in';
        return $classes;
    }

    function InitiateMaintenanceMode($mode){
        if($mode == 1) 
            update_option("__mmode_time",time());
        return $mode;
    }

    function CheckMaintenanceMode(){
        $s = get_option('__mmode_time');
        $e = time() - $s;
        $p = WPEdenThemeEngine::GetOption('maintenenance_time')*60;
        $r = $p - $e;
        if( $r < 0 ) return;
        
        if(WPEdenThemeEngine::GetOption('site_offline') == 1 && !current_user_can('manage_options')){

            global $post;
            $post = get_post(WPEdenThemeEngine::GetOption('offline_page'));
            setup_postdata($post);

            $protocol = "HTTP/1.0";
            if ("HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] )
                $protocol = "HTTP/1.1";
            header( "$protocol 503 Service Unavailable", true, 503 );
            header( "Retry-After: 3600" );
            include(WPEDEN_THEME_DIR."/page-maintenance-mode.php");
            exit();
        }
    }
    

    function NextCountdownTimer($params){

    $id = "countdown-".uniqid();
    $html = "
            <link rel='stylesheet' type='text/css' href='".get_template_directory_uri()."/css/flipclock.css' />
            <div id='{$id}'></div>
            <script type='text/javascript' src='".get_template_directory_uri()."/js/flipclock/libs/prefixfree.min.js'></script>
            <script type='text/javascript' src='".get_template_directory_uri()."/js/flipclock/flipclock.min.js'></script>
            <script>
            var clock = jQuery('#{$id}').FlipClock({});
                clock.setTime({$params['time']});
                clock.setCountdown(true);
            </script>
             ";

        return $html;
    }

    public static function FontCSS($oname){
        $font = WPEdenThemeEngine::GetOption($oname);
        if(!$font) return;
        $fonts = WPEdenOptionFields::GetFonts();
        extract($font);
        $italic = ($i == 1) ? 'font-style:italic;' : '';
        $underline = ($u == 1) ? 'text-decoration:underline;' : '';
        if($family != '')
            $font_family = $fonts[$family]['family']!=''?"font-family:{$fonts[$family]['family']} !important;":"";
        else
            $font_family = '';
        $font_size = $size!=''?"font-size:{$size}{$pxpt} !important;":"";
        $text_color = $color?"color:{$color} !important;":"";
        $font_weight = $weight?"font-weight:{$weight} !important;":"";
        $css = "{$font_family}{$font_size}{$text_color}{$font_weight}{$italic}{$underline}" ;
        return $css;
    }

    /**
     * @usage Generate custom css
     */
    function CustomCSS(){
        $data = WPEdenThemeEngine::GetOption('page_title_bg');
        $ptcolor = WPEdenThemeEngine::GetOption('page_title_clr');
        $btnbgcolor = WPEdenThemeEngine::GetOption('button_bg');
        $btntxtcolor = WPEdenThemeEngine::GetOption('button_txt');
        $nvbg = WPEdenThemeEngine::GetOption('menu_bg');
        $ftbg = WPEdenThemeEngine::GetOption('footer_bg');
        $nvclr = WPEdenThemeEngine::GetOption('menu_txt');
        $ftclr = WPEdenThemeEngine::GetOption('footer_txt');
        $headertxtcolor = WPEdenThemeEngine::GetOption('header_txt_color');

        $fonts = get_option('wpeden_typo_settings',array());
        foreach($fonts as $font){
            $family[] = $font['family'];
        }


        $family[] = "Montserrat:400,700";
        $family[] = "Source+Sans+Pro:200,400,700";
        $family[] = "Abel";

        $family = array_filter(array_unique($family));

        $cssimport = "@import url(http://fonts.googleapis.com/css?family=".implode("|",$family).");";

        $nvbg = $nvbg!=''?"background: $nvbg !important;":'';
        $ftbg = $nvbg!=''?"background-color: $ftbg !important;":'';
        $nvcolor = $nvclr!=''?"color: $nvclr !important;":'';

        $main_nav_bg = WPEdenThemeEngine::GetOption('main_nav_bg', '');
        if($main_nav_bg!='') $main_nav_bg = "background: $main_nav_bg;";
        
        $main_nav_color = WPEdenThemeEngine::GetOption('main_nav_color', '#333');
        //$main_nav_color = "color: $main_nav_color;";
        
        $ftcolor = $nvclr!=''?"color: $ftclr !important;":'';
        $bgcolor = $data['color']!=''?"background-color: $data[color];":'';
        $ptcolor = $ptcolor!=''?"color: $ptcolor !important;":'';
        $wpeden_custom_css_txt = WPEdenThemeEngine::GetOption('wpeden_custom_css_txt');
        $bgimage = $data['image']!=''?"background-image: url($data[image]); background-position: $data[position_h] $data[position_v]; background-repeat:  $data[repeat]; background-attachment: $data[attachment];":'';
        echo "<style>
            $cssimport
            $wpeden_custom_css_txt
            body,p{".self::FontCSS('typo_regular')."}
            .brand, h1, h1 a, .entry-content h1{".self::FontCSS('typo_h1')."}
            h2, h2 a, .entry-content h2{".self::FontCSS('typo_h2')."}
            h3, h3 a, .entry-content h3{".self::FontCSS('typo_h3')."}
            h4, h4 a, .entry-content h4{".self::FontCSS('typo_h4')."}

            .archive-top {  $bgcolor $bgimage }
            .archive-top h1.entry-title,.archive-top, .archive-top *{  $ptcolor }

            .footer {  $ftbg $ftcolor }
            .widget-footer h3,.footer *,.footer a{  $ftcolor }

            *.entry-title,*.entry-title a {".self::FontCSS('wpeden_post_title')."}
            .post-meta,.post-meta a {".self::FontCSS('typo_post_meta')."}
            .entry-content,.entry-content p {".self::FontCSS('wpeden_post_content')."}
            *.widget, *.widget li, *.widget p, *.widget a {".self::FontCSS('wpeden_widget_content')."; }
            *.widget .widget-title {".self::FontCSS('wpeden_widget_title')."; line-height:normal; }

            #mainframe.left-nav-layout{  $main_nav_bg }
            #mainmenu a{ color: $main_nav_color}    
            #mainframe.left-nav-layout .left-nav *{  $main_nav_color }

            #header-2 { background: $main_nav_bg }
            #header-2 .navbar-default{ $main_nav_bg }

            @media (min-width: 768px) {
            #mainmenu .dropdown-menu {  text-shadow:none !important; $nvbg $nvcolor }
            #mainmenu .dropdown-menu *, #topnav-area .dropdown-menu a { $nvcolor }
            #mainmenu>li>a {  $nvcolor }
            #navmenu > li > a, #mainmenu a {" . self::FontCSS('typo_top_menu') . "}
            #navmenu .dropdown-menu > li > a,  #mainmenu .dropdown-menu > li > a {" . self::FontCSS('typo_dropdown_menu') . "}
            #mainmenu .dropdown-menu > li.current-menu-item > a,
            #mainmenu .dropdown-menu > li:hover > a {color:#ffffff !important;}
            }
            </style>";
    }


    function SettingField($data) {
        
        $data['placeholder'] = isset($data['placeholder']) ? $data['placeholder'] : '';
        $data['description'] = isset($data['description']) ? $data['description'] : '';
        $data['class'] = isset($data['class']) ? $data['class'] : '';
        
        switch($data['type']):
            case 'text':
                echo "<input type='text' name='$data[name]' class='form-control {$data['class']}' value='$data[value]' placeholder='{$data['placeholder']}'  />";
                echo "<div class='note'>{$data['description']}</div>";
                break;
            case 'email':
                echo "<input type='email' name='$data[name]' class='form-control {$data['class']}' value='$data[value]' placeholder='{$data['placeholder']}'  />";
                echo "<div class='note'>{$data['description']}</div>";
                break;
            case 'number':
                $step = isset($data['step'])?"step='$data[step]'":"";
                $min = isset($data['min'])?"min='$data[min]'":"";
                $max = isset($data['max'])?"min='$data[max]'":"";
                echo "<input type='number' $min $max $step name='$data[name]' class='form-control {$data['class']}' value='$data[value]' placeholder='{$data['placeholder']}'  />";
                echo "<div class='note'>{$data['description']}</div>";
                break;
            case 'textarea':
                echo "<textarea name='$data[name]' class='form-control col-md-11' style='min-height: 100px'>$data[value]</textarea>";
                echo "<div class='note'>{$data['description']}</div>";
                break;
            case 'callback':
                echo call_user_func($data['dom_callback'], $data['dom_callback_params']);
                echo "<div class='note'>{$data['description']}</div>";
                break;
            case 'heading':
                echo "<h3>".$data['label']."</h3>";
                break;
            case 'panelstart':
                echo "<div class='panel panel-default' id='{$data['id']}'><div class='panel-heading'>".$data['label']."</div><div class='panel-body'>";
                break;

            case 'panelend':
                echo "</div></div>";
                break;
        endswitch;
    }

    public static function DoSettingsFields($page, $section) {
        global $wp_settings_fields;

        if ( ! isset( $wp_settings_fields[$page][$section] ) )
            return;

        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
            if(!in_array($field['args']['type'], array('panelstart','panelend'))) {
                echo '<div class="form-group" id="field-group-' . sanitize_title($field['title']) . '" >';
                if (!empty($field['args']['label_for']))
                    echo '<label for="' . esc_attr($field['args']['label_for']) . '">' . $field['title'] . '</label>';
                else
                    echo '<label>' . $field['title'] . '</label>';
            }
            call_user_func($field['callback'], $field['args']);
            if(!in_array($field['args']['type'], array('panelstart','panelend'))) {
                echo '</div>';
            }
        }
    }

    function ValidateData($data){
        global $settings_fields;

        $settings_fields = apply_filters("thenext_settings_fields",$settings_fields);

        $error = array();
        foreach($settings_fields as $id=>$field){
            if(!isset($data[$id])) continue;
            if(!isset($field['validate'])) $field['validate'] = 'str';
            switch($field['validate']){
                case 'int':
                    $data[$id] = intval($data[$id]);
                    break;
                case 'double':
                    $data[$id] = doubleval($data[$id]);
                    break;
                case 'str':
                    $data[$id] = esc_attr(strval($data[$id]));
                    break;
                case 'email':
                    $data[$id] = is_email($data[$id])?$data[$id]:'';
                    $error[$id] = __('Invalid Email Address','wpeden');
                    break;
                case 'array':
                    $data[$id] = $data[$id];
                    break;
                case "callback":
                    $data[$id] = call_user_func($field['validate_callback'],$data[$id]);
                    break;
            }
        }
        if($error) return $data['__error__'] = $error;
        //if($_POST) {print_r($data); echo $section_id; die();  }

        return $data;
    }

    function SetupThemeOptions(){

        $this->ResetThemeOpts();

        global $settings_fields, $settings_sections;

        $settings_sections = apply_filters("thenext_settings_section",$settings_sections);
        $settings_fields = apply_filters("thenext_settings_fields",$settings_fields);

            foreach($settings_sections as $section_id=>$section_name){
                register_setting($section_id,$section_id,array($this, 'ValidateData'));
            }

        foreach($settings_fields as $id=>$field){
            $field['label'] = isset($field['label'])?$field['label']:'';
            if($field['type']=='heading')
                add_settings_field($id, '', array($this, 'SettingField'), 'wpeden-themeopts', $field['section'], $field);
            else
                add_settings_field($id, $field['label'], array($this, 'SettingField'), 'wpeden-themeopts', $field['section'], $field);
        }

    }

    function FavIcon(){
        if(WPEdenThemeEngine::GetOption('favicon')=='') return;
        ?>
        <link rel="icon" type="image/png" href="<?php echo WPEdenThemeEngine::GetOption('favicon'); ?>" />
        <?php
    }

    public static function GetOption($index = null, $default = null){
        global $wpeden_wf_data, $settings_sections, $wpede_data_fetched;

        $settings_sections = apply_filters("thenext_settings_section",$settings_sections);
       
        $wpeden_wf_data = array();

        foreach ($settings_sections as $section_id => $section_name) {
            $sdata = get_option($section_id, array());
            if (!is_array($sdata))
                $sdata = array();
            $wpeden_wf_data = array_merge($wpeden_wf_data, $sdata);
        }

        if(!$index)
            return $wpeden_wf_data;
        else  {
            if(isset($wpeden_wf_data[$index]) && is_array($wpeden_wf_data[$index]))
                return $wpeden_wf_data[$index];
            
            return isset($wpeden_wf_data[$index])&&$wpeden_wf_data[$index]!=''?stripcslashes($wpeden_wf_data[$index]):$default;
        }
    }

    public static function SiteLogo(){
        $logourl = self::GetOption('site_logo');
        if($logourl) echo "<img src='{$logourl}' title='".get_bloginfo('sitename')."' alt='".get_bloginfo('sitename')."' />";
        else echo get_bloginfo('sitename');
    }


    function PageLayout($type){
        global $post;
        $data = maybe_unserialize(get_post_meta($post->ID,'wpeden_post_meta', true));
        if(is_page() && $post->ID != '' && isset($data['pagelayout']) && $data['pagelayout']!=''){
            $type = $data['pagelayout'];
        }
        return $type;
    }


    public static function HeaderStyle(){

        $style = '';
        if(is_page()||is_single()) {
            $wpeden_post_meta = get_post_meta(get_the_ID(),'wpeden_post_meta', true);
            $style =  isset($wpeden_post_meta['nav_header'])?$wpeden_post_meta['nav_header']:'';
        }

        if(!isset($style) || $style =='')
            $style = self::GetOption('nav_header','header-1');
        if(!locate_template("templates/headers/".$style.".php")) $style = 'header-1';
        load_template(locate_template("templates/headers/".$style.".php"));
        wp_reset_query();
    }

    public static function PageHeader(){
        $page_header_style = self::GetOption('page_header_style', 'style2');
        $data = get_post_meta(get_the_ID(), 'wpeden_post_meta', true);
        $page_specific_header = isset($data['page_header_style'])?$data['page_header_style']:'';
        $page_header_style = $page_specific_header?$page_specific_header:$page_header_style;

        get_template_part('page-headers/'.$page_header_style);
    }





}

new WPEdenThemeEngine();
 

