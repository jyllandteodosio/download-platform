<?php
/**
 * Default template for pages
 */

get_template_part('channel-setter');

  $channel = $_SESSION['channel'];
  if ( $channel == 'entertainment'):
    get_header('rtl');
  elseif ( $channel == 'extreme'):
    get_header('rtl-blue');
  elseif($channel == 'none'):
    get_header('rtl');
  endif;
?>

<div class="content-area">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
			<div class="entry-links"><?php wp_link_pages(); ?></div>
		</div>
	</article>
	<?php if ( ! post_password_required() ) comments_template('', true); ?>
	<?php endwhile; endif; ?>
</div>
<?php get_footer( 'rtl' ); ?>