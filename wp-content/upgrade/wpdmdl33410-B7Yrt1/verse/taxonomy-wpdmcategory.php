<?php

if ( !defined('ABSPATH')) exit;

get_header();

?>

<div class="container home-content taxonomy-wpdmcategory">

    <div class="row">
        <?php
        $count = 0;
        while(have_posts()): the_post();
            $_wpdm_hide_all = get_option('_wpdm_hide_all', 0);
            ?>
            <div class="col-md-3 recent_item">
                <div class="product-block">


                    <a href="<?php the_permalink();?>"><?php wpeden_post_thumb(array(300,300), true, array('class'=>'no-radius thumbnail')); ?></a>

                    <div class="product-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                            <?php if(function_exists('wpdmpp_product_price')){ ?>
                                <h4 class="price"><?php echo wpdmpp_product_price(get_the_ID())>0?wpdmpp_currency_sign().wpdmpp_product_price(get_the_ID()):'Free'; ?></h4>
                                <?php echo wpdmpp_product_price(get_the_ID())>0?str_replace("btn-info","btn-flat flat-info no-radius",wpdmpp_waytocart($post)):"<a class='btn btn-flat btn-block no-radius flat-inverse' href='".get_permalink(get_the_ID())."'>Download</a>"; ?>

                            <?php } else { ?>

                                      <a class="btn btn-flat btn-block flat-info no-radius" href="<?php the_permalink(); ?>"><?php _e('read more','thenext'); ?> <i class="fa fa-angle-right"></i></a>

                            <?php } ?>

                    </div>

                </div>
            </div>

        <?php
        if(++$count%4==0) echo "<div class='clear'></div>";
        endwhile; ?>
    </div>
    <?php
    global $wp_query;
    if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="clear"></div>
        <div id="nav-below" class="navigation post box arc">
            <?php get_template_part('pagination'); ?>
        </div><!-- #nav-below -->
    <?php endif; ?>





</div>







<?php get_footer(); ?>
