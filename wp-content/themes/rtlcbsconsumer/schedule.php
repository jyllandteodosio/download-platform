<?php
// Template Name: Schedule

$bannerUrl = get_field( 'banner_image' );
$style = ( $bannerUrl ) ? 'style="background-image: url(\'' . $bannerUrl . '\');"' : '';

get_header( 'rtl' ); ?>

<div class="content-area">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header" <?php echo $style; ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
			<div class="entry-links"><?php wp_link_pages(); ?></div>
		</div>
	</article>
	<?php endwhile; endif; ?>
</div>

<?php get_footer( 'rtl' ); ?>