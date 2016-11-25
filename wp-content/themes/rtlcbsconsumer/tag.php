<?php get_header(); ?>
<h1 class="entry-title"><?php _e( 'Tag Archives: ', 'boilerplate' ); ?><span><?php single_tag_title(); ?></span></h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content();?>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>