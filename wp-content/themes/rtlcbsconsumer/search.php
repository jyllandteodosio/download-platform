<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'boilerplate' ), get_search_query() ); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>
<?php endwhile; ?>
<?php else : ?>
<h2 class="entry-title"><?php _e( 'Nothing Found', 'boilerplate' ); ?></h2>
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'boilerplate' ); ?></p>
<?php get_search_form(); ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>