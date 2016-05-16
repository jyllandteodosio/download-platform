<?php
/**
 * Front page template
 */
get_header( 'rtl' ); ?>
<div class="section">
	<div id="featured-slideshow" class="swiper-container">
	<?php
	switch_to_blog( 1 );

	$channel = 'entertainment';
	$query_shows = getFeaturedBanners($channel,5);
	?>
	
		<div class="swiper-wrapper">
			<?php
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
					<div class="swiper-slide">
						<img src="<?php the_field('banner_image'); ?>" class="swiper-photo" title="<?php the_title();?>" />
						<div class="swiper-description">
							<span class="day"><?php echo date('F d, l',get_field('airing_schedule'));?></span>
							<div class="time">
								<span class="timeslot">Live at <?php echo date('h:i a',get_field('airing_schedule'));?></span>
								<span class="timezone">(<?php echo date('h:i a',get_field('airing_time_jkt'));?> JKT/BKK)</span>
							</div>
							<span class="title"><?php the_title(); ?></span>
							<p class="description"><?php echo the_excerpt();?></p>
							<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>" class="view-more">View More</a>
						</div>	
					</div>
	                <?php endif;endwhile;
	            endif;
			?>
		</div>
		<?php //restore_current_blog(); ?>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div id="showsToday" class="panel panel-default section">
	<div class="panel-heading">
		<h2 class="panel-title">Today on <span class="text-uppercase">RTL CBS Entertainment HD</span></h2>
	</div>
	<div class="panel-body">
		<div id="today-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<?php
					if($query_shows->have_posts()):
		                while($query_shows->have_posts()) : $query_shows->the_post();
		            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
		                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
		                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>

		                    <div class="swiper-slide">
								<div class="time">
									<span class="timeslot"><?php echo date('h:i a',get_field('airing_schedule'));?></span>
									<span class="timezone">(<?php echo date('h:i a',get_field('airing_time_jkt'));?> JKT/BKK)</span>
								</div>
								<div class="swiper-description">
									<span class="title"><?php the_title(); ?></span>
									<p class="details"></p>
								</div>
							</div>
		                <?php endif;endwhile;
		            endif;
				?>
			</div>	
		</div>	
		<div class="today-nav swiper-button-prev"></div>
   	<div class="today-nav swiper-button-next"></div>	
		<div class="text-center"><a href="<?php echo get_site_url(2); ?>/featured-shows" class="today-link">View Featured Shows<span class="glyphicon glyphicon-play"></span></a></div>
	</div>
</div>
<div class="section row">
	<div class="col-xs-12 col-lg-6">
		<h2 class="section-title">Spotlight</h2>
		<div class="row">
			<?php
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
	                		<div class="spotlight-show-container col-xs-12 col-sm-6 col-md-3 col-lg-12">
								<div class="spotlight-show">
									<div class="spotlight-photo" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>');"></div>
									<div class="spotlight-details">
										<h3 class="spotlight-title"><?php the_title(); ?></h3>
										<p class="spotlight-excerpt"><?php echo mb_strimwidth(get_the_excerpt(),0,150, '...');?></p>
										<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>">View More</a>
									</div>
								</div>
							</div>
	                <?php endif;endwhile;
	            endif;
			?>
		</div>
	</div>
	<div id="widget-home-sidebar" class="col-xs-12 col-lg-6">
		<h2 class="section-t itle">What's on RTL CBS Entertainment HD</h2>
		<div id="home-video-player" class="video-player-container">
			<div class="video-player">
				<iframe id="vimeoplayer" width="700" height="300" src="http://player.vimeo.com/video/127580017?api=1&player_id=vimeoplayer" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</div>
			<div class="video-playlist-container">
				<div id="video-playlist" class="video-playlist swiper-container">
					<div class="video-show-container swiper-wrapper">
						<?php
							if($query_shows->have_posts()):
				                while($query_shows->have_posts()) : $query_shows->the_post();
				            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
				                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
				                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
				                    	<div class="video-show swiper-slide active" data-vimeo-id="<?php the_field('vimeo_id'); ?>">
											<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>" class="video-thumbnail">
											<span class="video-title"><?php the_title(); ?></span>
										</div>
				                <?php endif;endwhile;
				            endif;
						restore_current_blog();
						?>
					</div>
				</div>
				<div class="video-player-nav swiper-button-prev gradient-red"></div>
	    		<div class="video-player-nav swiper-button-next gradient-red"></div>
			</div>
		</div>
		<?php if ( is_active_sidebar( 'rtlcbs-home-sidebar' ) ) : ?>
			<div id="home-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'rtlcbs-home-sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>
</div>
<?php get_footer( 'rtl' ); ?>