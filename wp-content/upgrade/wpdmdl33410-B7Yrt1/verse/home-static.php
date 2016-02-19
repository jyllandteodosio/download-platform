<?php

/*
Template Name: Homepage
*/

if (!defined('ABSPATH')) exit;

define('HIDE_PAGE_HEADER',1);

get_header();

?>

<div class="container-fluid">
    <div class="row">
        
        <!-- Home Post Slider Section -->
        <div class="col-md-12">
            <section class="features-menu" id="extensions">
                <?php get_template_part('homepage','top'); ?>
            </section>

        </div>

        <!-- Home Featured Pages Section -->
        <div class="col-md-12 home-f-p">

            <div class="container">
                <div class="row featured-pages">
                    <?php
                    for($i=1; $i<=4; $i++):

                        $page_id = WPEdenThemeEngine::GetOption("home_featured_page_".$i);
                        $page  = get_post($page_id);
                        $meta = get_post_meta($page_id, 'wpeden_post_meta', true);
                        $url = esc_url(get_permalink($page_id));
                        ?>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                               <div class="media wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="<?php echo ($i-1)/3; ?>s">

                                        <a href="<?php echo $url; ?>" class="pull-left page-icon">
                                            <span class="fa-stack fa-2x img-rounded fet-icon">
                                              <i class="<?php echo isset($meta['icon']) && $meta['icon']!='' ?esc_attr($meta['icon']):'tn-download'; ?> fa-inner"></i>
                                            </span>

                                        </a>
                                    <div class="media-body">

                                    <h2><a href="<?php echo $url; ?>" class="theme-color"><?php echo esc_attr($page->post_title); ?></a></h2>
                                    <div class="clear"></div>
                                    <p><?php wpeden_get_excerpt($page_id, 100, true, '.'); ?></p><br/>
                                    <a href="<?php echo $url; ?>" class="pull-right btn btn-primary btn-flat btn-sm"><i class="tn-arrow-right"></i></a>
                                    </div>
                                </div>


                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <!-- Home New Downloads Section -->
        <div class="col-md-12">

            <div class="container">
                <div class="row section-header">
                    <div class="col-md-8 col-md-offset-2 col-xs-offset-0 text-center ">
                        <h2 class="section-head wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">&mdash; <?php echo WPEdenThemeEngine::GetOption('newdl_section_title','New Items'); ?> &mdash; </h2>

                        <p class="lead wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="1s"><?php echo WPEdenThemeEngine::GetOption('newdl_section_desc','Cras vitae justo nec quam lacinia metus. Cras vitae justo nec quam lacinia metus. Cras vitae justo nec quam lacinia metus.'); ?></p>
                    </div>
                </div>

                <div class="row">
                    <?php
                    $q = new WP_Query(array(
                            'post_type' => 'wpdmpro',
                            'showposts' => 6,

                            'orderby' => 'publish_date',
                            'order' => 'DESC')
                    );
                    $z = 0;
                    while ($q->have_posts()) {
                        $q->the_post();
                        ?>

                        <div class="col-md-4  col-sm-4  col-xs-6">

                            <div class="thumbnail package-block home-ext wow zoomIn" data-wow-duration="1s" data-wow-delay="<?php echo $z / 3; ?>s" id="p-<?php echo get_the_ID(); ?>">
                                <div class="relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if(has_post_thumbnail())
                                            wpeden_post_thumb(array(400, 400));
                                        else {

                                            echo '<img src="'.get_template_directory_uri().'/images/thumbnail-ph.jpg">';
                                        }
                                        ?>
                                    </a>
                                    <div class="mask">
                                        <div class="maskin">
                                            <h3><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>

                                                 <i class="fa fa-money"></i> &nbsp; <?php echo wpdmpp_currency_sign().wpdmpp_effective_price(get_the_ID()); ?> <br/>
                                                 <i class="fa fa-arrow-circle-o-down"></i> &nbsp; <?php echo  (int)get_post_meta(get_the_ID(),'__wpdm_download_count', true); ?> downloads <br/>
                                                 <i class="fa fa-eye"></i> &nbsp; <?php echo  (int)get_post_meta(get_the_ID(),'__wpdm_view_count', true); ?> views<br/>
                                                 <i class="fa fa-user"></i> &nbsp; <?php the_author(); ?><br/>
                                            <?php echo wpdmpp_waytocart($post, 'btn-success btn-flat btn-lg'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>
        </div>



        <!-- Home Tabbed Section -->
        
        <div class="container home-tab-intro">
            <div class="row  section-header">
                <div class="col-md-8 col-md-offset-2 col-xs-offset-0 text-center">
                    <h2 class="section-head wow zoomIn" data-wow-duration="0.5s">
                        &mdash;  <?php echo WPEdenThemeEngine::GetOption('tabbed_section_title', 'From Categories'); ?> &mdash;
                    </h2>
                    <p class="lead animated wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <?php echo WPEdenThemeEngine::GetOption('tabbed_section_desc', 'Select three top post categories from Theme Option to show in tabbed section...'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-pills nav-justified dmenu">
                        <?php for ($i = 1; $i <= 3; $i++) {
                            $wpmpcat = get_term(WPEdenThemeEngine::GetOption('wpdm_category_' . $i, 1), 'wpdmcategory'); ?>
                            <li <?php echo $i == 1 ? 'class="active"' : ''; ?> >
                                <a href="#<?php echo $wpmpcat->slug; ?>" data-toggle="tab"><?php echo $wpmpcat->name; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="container tab-content home-tab-content">
            <?php for ($i = 1; $i <= 3; $i++) {
                $wpmpcat = get_term(WPEdenThemeEngine::GetOption('wpdm_category_' . $i, 1), 'wpdmcategory');
                if (!is_wp_error($wpmpcat)) { ?>
                    <div id="<?php echo $wpmpcat->slug; ?>" <?php echo $i == 1 ? 'class="tab-pane active fade in"' : 'class="tab-pane"'; ?>>
                        <div class="row">
                            <?php
                            $q = new WP_Query(array(
                                'post_type' => 'wpdmpro',
                                'showposts' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'wpdmcategory',
                                        'terms' => $wpmpcat->term_id,
                                        'field' => 'term_id',
                                        'include_children' => false
                                    )
                                ),
                                'orderby' => 'publish_date',
                                'order' => 'DESC')
                            );
                            $z = 0;
                            while ($q->have_posts()) {
                                $q->the_post();
                                ?>
                                
                                <div class="col-md-<?php echo WPEdenThemeEngine::GetOption('homepage_np_grids', 3); ?>  col-sm-4  col-xs-6">
                                    <div class="thumbnail package-block home-ext wow zoomIn" data-wow-duration="1s" data-wow-delay="<?php echo $z / 3; ?>s" id="p-<?php echo get_the_ID(); ?>">
                                        <div class="relative">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if(has_post_thumbnail())
                                                    wpeden_post_thumb(array(300, 300)); 
                                                else {
                                                   echo '<img src="'.get_template_directory_uri().'/images/thumbnail-ph.jpg">'; 
                                                }
                                                ?>
                                            </a>
                                            <div class="mask" style="cursor: pointer" onclick="location.href='<?php the_permalink(); ?>';">
                                                <div class="maskin">
                                                    <h3><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>

                                                    <i class="fa fa-money"></i> &nbsp; <?php echo wpdmpp_currency_sign().wpdmpp_effective_price(get_the_ID()); ?> <br/>
                                                    <i class="fa fa-arrow-circle-o-down"></i> &nbsp; <?php echo  (int)get_post_meta(get_the_ID(),'__wpdm_download_count', true); ?> downloads <br/>
                                                    <i class="fa fa-eye"></i> &nbsp; <?php echo  (int)get_post_meta(get_the_ID(),'__wpdm_view_count', true); ?> views<br/>
                                                    <i class="fa fa-user"></i> &nbsp; <?php the_author(); ?><br/>
                                                    <!-- a href="<?php the_permalink(); ?>" class="btn btn-flat btn-success btn-block"><i class="tn-download"></i> Download</a -->
                                                    <?php echo wpdmpp_waytocart($post, 'btn-success btn-flat'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <div class="col-md-<?php echo WPEdenThemeEngine::GetOption('homepage_np_grids', 3); ?>  col-sm-4  col-xs-6">
                                <div class="thumbnail package-block home-ext wow zoomIn" data-wow-duration="1s" data-wow-delay="<?php echo $z / 3; ?>s" id="p-<?php echo get_the_ID(); ?>">
                                    <div class="relative">
                                        <a title="View All" class="ttip1" href='<?php echo get_term_link($wpmpcat); ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/viewall.png"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>

        <div class="container home-tab-intro">
            <div class="row  section-header">
                <div class="col-md-8 col-md-offset-2 col-xs-offset-0 text-center">
                    <h2 class="section-head wow zoomIn" data-wow-duration="0.5s">
                        &mdash;  <?php echo WPEdenThemeEngine::GetOption('blog_section_title', 'News Updates'); ?> &mdash;
                    </h2>
                    <p class="lead animated wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <?php echo WPEdenThemeEngine::GetOption('blog_section_desc', 'Select three top post categories from Theme Option to show in tabbed section...'); ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <?php
                $q = new WP_Query(array(
                        'showposts' => 3,
                        'orderby' => 'publish_date',
                        'order' => 'DESC')
                );
                $z = 0;
                while ($q->have_posts()) {
                    $q->the_post();
                    ?>

                    <div class="col-md-4  col-sm-12  col-xs-6">

                        <div class="panel panel-default panel-blog wow zoomIn" data-wow-duration="1s" data-wow-delay="<?php echo $z / 3; ?>s" id="p-<?php echo get_the_ID(); ?>">
                            <div class="panel-body">
                                <h3><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
                                <?php wpeden_post_excerpt(120); ?>
                            </div>
                            <div class="panel-footer">
                                <i class="fa fa-user"></i> &nbsp; <?php the_author(); ?> &nbsp;
                                <i class="fa fa-calendar"></i> &nbsp; <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


    </div>

</div>

<?php get_footer(); 
