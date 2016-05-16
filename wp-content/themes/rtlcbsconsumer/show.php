<?php
// Template Name: Show

get_header( 'rtl' );
switch_to_blog( 1 );?>

<div class="section">
	<div class="show-banner">
		<img src="<?php the_field('banner_image'); ?>" class="img-responsive">
		<div class="show-banner-video-container hide">
			<span class="close-video">x</span>
			<iframe class="show-banner-video" id="showInnerVid" src="//player.vimeo.com/video/<?php the_field('vimeo_id'); ?>?badge=0&amp;byline=0&amp;portrait=0&amp;title=0" width="1060" height="400" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		</div>
		<div class="show-banner-description">
			<span class="date"><?php echo date('l',get_field('airing_schedule'));?></span>
			<span class="time"><?php echo date('h:ia',get_field('airing_schedule'));?> <small>(<?php echo date('h:ia',get_field('airing_time_jkt'));?> JKT/BKK)</small></span>
			<a href="#" class="watch-video"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Watch Video</a>
		</div>
	</div>
	<div class="show-synopsis">
		<div class="row">
			<div class="col-sm-4"><img src="<?php the_field('image_title'); ?>" class="img-responsive"></div>
			<div class="col-sm-8">
				<p><?php echo the_content();?></p>
				<p><strong>Starring</strong> <?php echo get_field('cast',175); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<h2 class="section-title">Latest Episodes</h2>
	<div class="other-slideshow-container">
		<div id="latest-episodes-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo site_url(); ?>/episode-24" class="show show-wide">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_235x199.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<div class="episode">Episode 24</div>
							<div class="episode-title">A Controlled Descent</div>
							<p class="show-description">When Holmes’ former recovery sponsor and friend, Alfredo, disappears, Holmes and Watson retrace his steps as Captain Gregson and Detective Bell lend NYPD’s...</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="latest-episodes-nav swiper-button-prev swiper-button-default-white"></div>
	<div class="latest-episodes-nav swiper-button-next swiper-button-default-white "></div>
</div>
<?php get_template_part( 'partials/other-shows' ); ?>
<?php get_footer( 'rtl' ); ?>