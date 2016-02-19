<?php

class TheNextFramework{

    /**
     * @usage Prints Page Heading in Single Page/Post
     */
    public static function PageHeadingMain(){

        $PgaeHeadingMain = '';

        if ( is_day() ) :
            $PgaeHeadingMain = get_the_date();

        elseif ( is_month() ) :
            $PgaeHeadingMain = "Monthly Archives: ". get_the_date( 'F Y' );

        elseif ( is_404() ) :
            $PgaeHeadingMain = "404";

        elseif ( is_year() ) :
            $PgaeHeadingMain = get_the_date( 'Y' );

        elseif(is_category()) :
            $PgaeHeadingMain = single_cat_title( '', false );

        elseif(is_tag()) :
            $PgaeHeadingMain = single_tag_title();

        elseif(is_page()) :
            $PgaeHeadingMain = get_the_title();

        elseif(is_single()) :
            $PgaeHeadingMain = get_the_title();

        elseif(is_singular('wpdmpro')) :
            $PgaeHeadingMain = get_the_title();

        elseif(is_search()):
            $PgaeHeadingMain = "Search Result For:  ".esc_attr(get_query_var('s'));

        elseif(is_tax()):
            $PgaeHeadingMain = single_term_title('', false);

        elseif(is_home()):
            $pageid = get_query_var('page_id');
            $page = get_post($pageid);
            $PgaeHeadingMain = esc_attr($page->post_title);
        endif;
        rewind_posts();

        echo apply_filters("thenext_page_heading_main", $PgaeHeadingMain);

    }

    /**
     * @usage Prints Page Heading (Sub) in Single Page/Post
     */
    public static function PageHeadingSub(){

        $sub_heading = isset($m['sub_heading'])?$m['sub_heading']:'';
        if(is_404()) $sub_heading = 'Page Not Found!';

        if(is_tax()){
            $sub_heading ='<div class="page-intro wow fadeInUp">'.term_description().'</div>';
        }
        if(is_category()){
            $sub_heading = '<div class="page-intro wow fadeInUp">'.category_description().'</div>';
        }

        if(is_single()):
            //$postid = get_query_var('p');
            $postid = get_the_ID();
            $meta = get_post_meta($postid, 'wpeden_post_meta', true);
            if(isset($meta['sub_heading']))
                $sub_heading = '<div class="page-intro wow fadeInUp">'.esc_attr($meta['sub_heading']).'</div>';
            else
                $sub_heading = '';
        endif;

        if(is_home() || is_page()):
            //$pageid = get_query_var('page_id');
            $pageid = get_the_ID();
            $meta = get_post_meta($pageid, 'wpeden_post_meta', true);
            if(isset($meta['sub_heading']))
                $sub_heading = '<div class="page-intro wow fadeInUp">'.esc_attr($meta['sub_heading']).'</div>';
            else
                $sub_heading = '';
        endif;

        echo apply_filters("thenext_page_heading_sub", $sub_heading);
    }


    public static function PageIcon($id = null){
        $id = $id == null ? get_the_ID():$id;
        $meta = get_post_meta($id, 'wpeden_post_meta', true);
        $icon = isset($meta['icon']) && $meta['icon'] != '' ? $meta['icon'] : 'tn-mouse';
        $icon = apply_filters("thenext_page_icon", $icon);
        echo "<i class='{$icon}'></i>";
    }


    public static function PageHeaderBottom(){
        ?>

        <div class="page-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 bcrumb">
                        <?php do_action('thenext_page_header_bottom_left_content') ?>
                    </div>
                    <div class="col-md-3">
                        <form action="<?php echo home_url('/'); ?>">
                            <div class="input-group search-inputs">
                                <input type="hidden" name="post_type" value="post" />
                                <input type="text" name="s" placeholder="<?php _e('Search...','thenext'); ?>" value="" class="form-control input-sm search">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm"><i class="tn-search"></i></button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    /**
     * @usage Render Dynamic Sidebars
     */
    public static function DynamicSidebars($pos){
        global $post;

        $sidebar_layout = "right-sidebar-1";
        $left_sidebar_style = "default";
        $right_sidebar_style = "default";
        $defaults = array('sidebar_layout' => 'right-sidebar-1', 'left_sidebar'=>'', 'right_sidebar'=>'', 'left_sidebar_width' => 0, 'right_sidebar_width' => 3);

        if(is_home() || is_front_page()){
            $page_layout = WPEdenThemeEngine::GetOption('frontpage_layout');
            $page_layout = wp_parse_args( $page_layout, $defaults );
            $sidebar_layout = $page_layout['sidebar_layout'];
            $left_sidebar = $page_layout['left_sidebar'];
            $left_sidebar_width = $page_layout['left_sidebar_width'];
            $right_sidebar = $page_layout['right_sidebar'];
            $right_sidebar_width = $page_layout['right_sidebar_width'];
        }
        else if(is_single() || is_page()){
            $meta = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));
            if(is_page())
                $page_layout = WPEdenThemeEngine::GetOption('page_layout');
            else
                $page_layout = WPEdenThemeEngine::GetOption('post_layout');
            
            $page_layout = wp_parse_args( $page_layout, $defaults );
            $sidebar_layout = isset($meta['sidebar_layout']) && $meta['sidebar_layout'] != '' ?$meta['sidebar_layout']:$page_layout['sidebar_layout'];
            $left_sidebar = isset($meta['left_sidebar']) && $meta['left_sidebar'] != '' ?$meta['left_sidebar']:$page_layout['left_sidebar'];
            $left_sidebar_width = isset($meta['left_sidebar_width']) && $meta['left_sidebar_width'] != '' ?$meta['left_sidebar_width']:$page_layout['left_sidebar_width'];
            $right_sidebar = isset($meta['right_sidebar']) && $meta['right_sidebar'] != '' ?$meta['right_sidebar']:$page_layout['right_sidebar'];
            $right_sidebar_width = isset($meta['right_sidebar_width']) && $meta['right_sidebar_width'] != '' ?$meta['right_sidebar_width']:$page_layout['right_sidebar_width'];
        }
        else if(is_archive()){
            $page_layout = WPEdenThemeEngine::GetOption('archive_layout');
            $page_layout = wp_parse_args( $page_layout, $defaults );
            $sidebar_layout = $page_layout['sidebar_layout'];
            $left_sidebar = $page_layout['left_sidebar'];
            $left_sidebar_width = $page_layout['left_sidebar_width'];
            $right_sidebar = $page_layout['right_sidebar'];
            $right_sidebar_width = $page_layout['right_sidebar_width'];

        }
        if($pos == 'left') {
            if ($left_sidebar != '' && in_array($sidebar_layout, array('left-sidebar-1', 'left-sidebar-2', 'sidebar-2'))) self::Sidebar($left_sidebar, $left_sidebar_width, $left_sidebar_style, "left");
            if ($right_sidebar != '' && $sidebar_layout == 'left-sidebar-2') self::Sidebar($right_sidebar, $right_sidebar_width, $right_sidebar_style, "right");
        }

        if($pos == 'right') {
            if ($left_sidebar != '' && $sidebar_layout == 'right-sidebar-2') self::Sidebar($left_sidebar, $left_sidebar_width, $left_sidebar_style, "left");
            if ($right_sidebar != '' && in_array($sidebar_layout, array('right-sidebar-1', 'right-sidebar-2', 'sidebar-2'))) self::Sidebar($right_sidebar, $right_sidebar_width, $right_sidebar_style, "right");
        }

    }

    /**
     * @usage Render Sidebar
     * @param $id
     * @param $width
     * @param $style
     * @param $pos
     */
    public static function Sidebar($id, $width, $style, $pos){

    ?>
        <div class="col-md-<?php echo $width; ?>">
            <div class="sidebar <?php echo $style; ?>">
                <?php do_action("thenext_before_sidebar_{$style}"); ?>

                <?php do_action("thenext_before_{$pos}_sidebar"); ?>

                <?php dynamic_sidebar($id); ?>

                <?php do_action("thenext_after_{$pos}_sidebar"); ?>

                <?php do_action("thenext_after_sidebar_{$style}"); ?>
            </div>
        </div>
    <?php
    }


    /**
     * @usage Calculate Content Area Width
     */
    public static function ContentAreaWidth(){
        global $post;
        $sidebar_layout = "right-sidebar-1";
        $content_width = 12;
        $right_sidebar_width = 3;
        $defaults = array('sidebar_layout' => 'right-sidebar-1', 'left_sidebar_width' => 0, 'right_sidebar_width' => 3);

        if(is_home() || is_front_page()){
            $page_layout = WPEdenThemeEngine::GetOption('frontpage_layout');
            $page_layout = wp_parse_args( $page_layout, $defaults );
            $sidebar_layout = $page_layout['sidebar_layout'];
            $left_sidebar_width = $page_layout['left_sidebar_width'];
            $right_sidebar_width = $page_layout['right_sidebar_width'];
        }
        else if(is_single() || is_page()){
            $meta = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));
            if(is_page())
            $page_layout = WPEdenThemeEngine::GetOption('page_layout');
            else
            $page_layout = WPEdenThemeEngine::GetOption('post_layout');
            $page_layout = wp_parse_args( $page_layout, $defaults );

            $sidebar_layout = isset($meta['sidebar_layout']) && $meta['sidebar_layout'] != '' ?$meta['sidebar_layout']:$page_layout['sidebar_layout'];
            $left_sidebar_width = isset($meta['left_sidebar_width']) && $meta['left_sidebar_width'] != '' ?$meta['left_sidebar_width']:$page_layout['left_sidebar_width'];
            $right_sidebar_width = isset($meta['right_sidebar_width']) && $meta['right_sidebar_width'] != '' ?$meta['right_sidebar_width']:$page_layout['right_sidebar_width'];


        }
        else if(is_archive()){
            $page_layout = WPEdenThemeEngine::GetOption('archive_layout');
            $page_layout = wp_parse_args( $page_layout, $defaults );
            $sidebar_layout = $page_layout['sidebar_layout'];
            $left_sidebar_width = $page_layout['left_sidebar_width'];
            $right_sidebar_width = $page_layout['right_sidebar_width'];

        }

        if($sidebar_layout=="no-sidebar")  $content_width = 12;
        else if($sidebar_layout=="right-sidebar-1")  $content_width = 12 - $right_sidebar_width;
        else if($sidebar_layout=="left-sidebar-1")  $content_width = 12 - $left_sidebar_width;
        else  $content_width = 12 - $left_sidebar_width - $right_sidebar_width;

        echo apply_filters("thenext_content_area_width", "$sidebar_layout col-md-".$content_width);

    }


}