<?php
 get_header( 'rtl' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer( 'rtl' ); ?>