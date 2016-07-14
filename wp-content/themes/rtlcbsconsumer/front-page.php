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
	?>
		<div class="swiper-wrapper">
			<?php
				$query_shows = getFeaturedBanners($channel,5);
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
					 <div class="swiper-slide">
						<img src="<?php the_field('featured_banner_image'); ?>" class="swiper-photo" title="<?php the_title();?>" />
						<?php $banner_text_alignment = get_field('banner_text_alignment') == 'right' ? "right-info" : "left-info";?>
						<div class="swiper-description <?php echo $banner_text_alignment; ?>">
							<span class="day">
								<?php
									echo (get_field('airing_schedule_format')=="date") ? 
	                                      (get_field('airing_schedule') ? 
	                                        date('F d, Y',strtotime(get_field('airing_schedule'))) 
	                                        : ""  ) 
	                                      : get_field('airing_day');
	                            ?>
							</span>
							<div class="time">
								<span class="timeslot"><?php 
									echo (get_field('airing_schedule_format')=="date") ? date('l',strtotime(get_field('airing_schedule')))." " : "";
									echo get_field('airing_time') ? 
											date('g:i a',get_field('airing_time')) 
											: "";
								?></span>
								<span class="timezone"><?php echo get_field('airing_time_jkt') ? "(".date('g:i a',get_field('airing_time_jkt'))." JKT/BKK)" : "";?></span>
							</div>
							<span class="title"><?php the_title(); ?></span>
							<p class="description"><?php echo mb_strimwidth(get_the_excerpt(),0,300,"...");?></p>
							<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>" class="view-more">View More</a>
						</div>	
					</div> 
	                <?php endif;endwhile;
	            endif;
	            restore_current_blog();
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
				<?php if(function_exists('tribe_get_events')){
					$events = tribe_get_events( array(
					    'start_date'   => current_time('Y-m-d').' 00:00',
    					'end_date'     => current_time('Y-m-d').' 23:59'
					) );
                    
					if(count($events) > 0):
						foreach ( $events as $event ):?>

			                <div class="swiper-slide">
								<div class="time">
									<span class="timeslot"><?php echo tribe_get_start_date($event->ID, false, Tribe__Date_Utils::TIMEFORMAT);//echo get_field('airing_schedule') ? date('h:i a',get_field('airing_schedule')) : date('h:i a');?></span>
									<span class="timezone"><?php echo $event->post_content != '' ? "(".$event->post_content.' JKT/BKK)' : '';?></span>
								</div>
								<div class="swiper-description">
									<span class="title"><?php echo $event->post_title; ?></span>
									<p class="details"></p>
								</div>
								<?php
								switch_to_blog( 1 );
								$show_id = getPostIdByTitle($event->post_title);
								if($show_id != ''):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $show_id), 'single-post-thumbnail' );?>
									<p class="today-show-thumb-container" style="background: url('<?php echo $image[0];?>') no-repeat top center; background-size:cover;"></p>

								<?php endif;
								restore_current_blog();?>
							</div>
			            <?php endforeach;
			        else:?>
			        	<span class="shows-message">No scheduled show today.</span>
			        <?php endif; }
				?>
			</div>	
		</div>	
		<div class="today-nav swiper-button-prev"></div>
   	<div class="today-nav swiper-button-next"></div>	
		
	</div>
</div>
<div class="section row">
	<div class="col-xs-12 col-lg-6">
		<h2 class="section-title">Spotlight</h2>
		<div class="text-center pull-right more-featured-link"><a href="<?php echo get_site_url(2); ?>/featured-shows" class="today-link">View Featured Shows<span class="glyphicon glyphicon-play"></span></a></div>
		<div class="row">
			<?php
				switch_to_blog( 1 );
				$query_shows = getAllShows($channel, 4);
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
	                		<div class="spotlight-show-container col-xs-12 col-sm-6 col-md-3 col-lg-12">
								<div class="spotlight-show">
									<div class="spotlight-photo" style="background: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>') no-repeat top center; background-size:cover;">
									   
									</div>
									<div class="spotlight-details">
										<h3 class="spotlight-title"><?php the_title(); ?></h3>
										<p class="spotlight-excerpt"><?php echo strip_tags(mb_strimwidth(get_the_excerpt(),0,150, '...'));?></p>
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
		<h2 class="section-title">What's on RTL CBS Entertainment HD</h2>
		<div id="home-video-player" class="video-player-container">
			<div class="video-player">
				<?php
					$query_show = getAllShows($channel,1,true);
					if($query_show->have_posts()):
				        while($query_show->have_posts()) : $query_show->the_post();
				            $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
				            $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
				            if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
								<iframe id="vimeoplayer" width="700" height="300" src="http://player.vimeo.com/video/<?php echo get_field('vimeo_id')?>?api=1&player_id=vimeoplayer" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				        <?php endif;endwhile;
				    endif;
				?>
			</div>
			<div class="video-playlist-container">
				<div id="video-playlist" class="video-playlist swiper-container">
					<div class="video-show-container swiper-wrapper">
						<?php
							$query_shows = getAllShows($channel, null, true);
							if($query_shows->have_posts()):
				                while($query_shows->have_posts()) : $query_shows->the_post();
				            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
				                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
				                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
				                    	<div class="video-show swiper-slide active" data-vimeo-id="<?php the_field('vimeo_id'); ?>">
				                    		<div class="thumbnail-container">
												<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>" class="video-thumbnail">
											</div>
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