<?php
/**
 * Front page template
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
<div class="section">
	<div id="featured-slideshow" class="swiper-container">
	<?php switch_to_blog( 1 ); ?>
		<div class="swiper-wrapper">
			<?php
				$query_shows = getFeaturedShows($channel);
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
					 <div class="swiper-slide" style="background-image:url('<?php the_field('featured_banner_image'); ?>');" >
						<!-- <img src="<?php //the_field('featured_banner_image'); ?>" class="swiper-photo" title="<?php //the_title();?>" /> -->
						<?php $banner_text_alignment = get_field('banner_text_alignment') == 'right' ? "right-info" : "left-info";?>
						<div class="swiper-description <?php echo $banner_text_alignment; ?>">
							<span class="day">
								<?php
									echo (get_field('airing_schedule_format')=="date") ? 
	                                      (get_field('airing_schedule') ? date('F d, Y',strtotime(get_field('airing_schedule'))) : ""  ) 
	                                      : get_field('airing_day');
	                            ?>
							</span>
							<div class="time">
								<span class="timeslot"><?php 
									echo (get_field('airing_schedule_format')=="date") ? date('l',strtotime(get_field('airing_schedule')))." " : "";
									echo get_field('airing_time') ? date('g:i a',get_field('airing_time')) : "";
								?></span>
								<span class="timezone"><?php echo get_field('airing_time_jkt') ? "(".date('g:i a',get_field('airing_time_jkt'))." JKT/BKK)" : "";?></span>
							</div>
							<span class="title"><?php the_title(); ?></span>
							<p class="description"><?php echo mb_strimwidth(get_the_excerpt(),0,180,"...");?></p>
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
		<h2 class="panel-title">Today on <span class="text-capitalize">RTL CBS <?php echo $channel;?></span></h2>
	</div>
	<div class="panel-body">
		<div id="today-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
		<?php   if(function_exists('tribe_get_events')):
					// $events = getTribeEvents( date('2016-12-08').' 00:00:00', current_time('Y-m-d').' 23:59:59', $channel );
					$events = getTribeEvents(current_time('Y-m-d').' 00:00:00', current_time('Y-m-d').' 23:59:59', $channel);
                    
					if(count($events) > 0):
        				$events_counter = 0;
						while ($event = current($events) ):
							$next_show = next($events);

							if( checkEventCategoryByTitle($channel, $event->post_title) > 0 ):
								$events_counter++;
							    $show_info = getShowInfoByTitle($event->post_title);?>
							   
							    <div class="swiper-slide" title="<?php echo $event->post_title;?>">
									<div class="time">
										<?php
										$current_time = current_time('H:i:s');
										$current_show_time = tribe_get_start_date($event->ID, false, 'H:i:s');
										$next_show_time = tribe_get_start_date($next_show->ID, false, 'H:i:s');
										if( $current_time >= $current_show_time && $current_time < $next_show_time):?>
											<span class="nowplaying"><div class="arrow-right"></div> Now Playing...</span>
										<?php endif;
										// Get timeslot of show
										$airing_time = tribe_get_start_date($event->ID, false,'H:i'); ?>
										<span class="timeslot"><?php echo $airing_time; ?></span>

										<?php // Calculate JKT/BKK time
										$airing_time_jkt = strtotime('-1 hour', strtotime($airing_time));
										$airing_time_jkt = date('H:i', $airing_time_jkt); ?>
										<span class="timezone"><?php echo "(". $airing_time_jkt .' JKT/BKK)' ?></span>
									</div>
									<a href="<?php echo site_url($show_info['post_name']);?>"><p class="today-show-thumb-container" style="<?php echo $show_info['background_image'];?>"></p></a>
									<div class="swiper-description">
										<span class="title"><?php echo mb_strimwidth($event->post_title,0,24,"...") ?></span>
									</div>
									
								</div>
								<?php
							endif;
						endwhile;
			        	
			   		endif; 
				endif; ?>

			<?php if ($events_counter == 0 || count($events) == 0): ?>
				<span class="shows-message">No scheduled show today.</span>
			<?php endif;?>
			
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
				$query_shows = getFeaturedShows($channel,4);
				if($query_shows->have_posts()):
	                while($query_shows->have_posts()) : $query_shows->the_post();
	            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
	                		<div class="spotlight-show-container col-xs-12 col-sm-4 col-md-3 col-lg-12">
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
		<h2 class="section-title">What's on <span class="text-capitalize">RTL CBS <?php echo $channel;?></span></h2>
		<div id="home-video-player" class="video-player-container col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<?php $query_show = getAllShows($channel,1,true); ?>
			<div class="video-player">
				<?php if($query_show->have_posts()):
			        while($query_show->have_posts()) : $query_show->the_post();
			            $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
			            $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
			            if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
							<iframe id="vimeoplayer" width="700" height="300" src="http://player.vimeo.com/video/<?php echo get_field('vimeo_id')?>?api=1&player_id=vimeoplayer" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			        <?php endif;endwhile; ?>
			</div>
			<?php endif; ?>
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
				                    		<div class="video-thumbnail" style="background-image:url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>');">
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
		<div id="home-sidebar" class="primary-sidebar widget-area col-lg-12 col-md-6 col-sm-6 col-xs-12" role="complementary">
		<?php if ( $channel == 'entertainment' && is_active_sidebar( 'rtlcbs-home-sidebar-entertainment' ) ) :
				dynamic_sidebar( 'rtlcbs-home-sidebar-entertainment' ); 
			elseif ( $channel == 'extreme' && is_active_sidebar( 'rtlcbs-home-sidebar-extreme' ) ) :
				dynamic_sidebar( 'rtlcbs-home-sidebar-extreme' ); 
		endif; ?>
		</div><!-- #primary-sidebar -->
	</div>
</div>
<?php get_footer( 'rtl' ); ?>