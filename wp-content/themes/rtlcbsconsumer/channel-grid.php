<?php
// Template Name: Channel Grid

get_header( 'rtl' ); ?>
<div class="content-area">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="channel-grid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 grid-show-left">
					<a href="<?php the_field('top_left_show_link'); ?>" class="grid-show">
						<img src="<?php the_field('top_left_show_image'); ?>">
						<div class="grid-title"><?php the_field( 'top_left_show_title' ); ?></div>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 grid-show-right">		
					<a href="<?php the_field('top_right_show_link'); ?>" class="grid-show">
						<img src="<?php the_field('top_right_show_image'); ?>">
						<div class="grid-title"><?php the_field( 'top_right_show_title' ); ?></div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 grid-show-full">
					<a href="<?php the_field('center_show_link'); ?>" class="grid-show">
						<img src="<?php the_field('center_show_image'); ?>">
						<div class="grid-title"><?php the_field( 'center_show_title' ); ?></div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 grid-show-left">
					<a href="<?php the_field('bottom_left_show_link'); ?>" class="grid-show">
						<img src="<?php the_field('bottom_left_show_image'); ?>">
						<div class="grid-title"><?php the_field( 'bottom_left_show_title' ); ?></div>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 grid-show-right">
					<a href="<?php the_field('bottom_right_show_link'); ?>" class="grid-show">
						<img src="<?php the_field('bottom_right_show_image'); ?>">
						<div class="grid-title"><?php the_field( 'bottom_right_show_title' ); ?></div>
					</a>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-xs-12 col-sm-6 grid-show-left">
					<a href="#" class="grid-show">
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_460x158.jpg">
						<div class="grid-title">Elementary</div>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 grid-show-right">		
					<a href="#" class="grid-show">
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/theoddcouple_460x158.png">
						<div class="grid-title">The Odd Couple</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 grid-show-full">
					<a href="#" class="grid-show">
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/bgt_925x272.png">
						<div class="grid-title">Britain's Got Talent</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 grid-show-left">
					<a href="#" class="grid-show">
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_460x158.jpg">
						<div class="grid-title">House of Cards</div>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 grid-show-right">
					<a href="#" class="grid-show">
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/marryme_460x158.png">
						<div class="grid-title">Marry Me</div>
					</a>
				</div>
			</div> -->
		</div>
	</article>
	<?php if ( ! post_password_required() ) comments_template('', true); ?>
	<?php endwhile; endif; ?>
</div>
<?php get_footer( 'rtl' ); ?>