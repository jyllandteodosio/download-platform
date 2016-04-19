<?php get_header( 'rtl' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer( 'rtl' ); ?>