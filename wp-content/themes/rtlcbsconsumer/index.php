<?php get_header( 'rtl' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_title(); ?><br/>
<?php the_content();?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer( 'rtl' ); ?>