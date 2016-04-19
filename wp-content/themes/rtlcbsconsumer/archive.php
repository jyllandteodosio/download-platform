<?php get_header( 'rtl' ); ?>
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'boilerplate' ), get_the_time(get_option('date_format') ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'boilerplate' ), get_the_time('F Y') ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'boilerplate' ), get_the_time('Y') ); }
else { _e( 'Archives', 'boilerplate' ); }
?></h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_title(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer( 'rtl' ); ?>