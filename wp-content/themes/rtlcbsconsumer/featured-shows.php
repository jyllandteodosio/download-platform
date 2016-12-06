<?php
/**
 * Template Name: Featured Shows
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
		<?php
		switch_to_blog( 1 );
		$query_shows = getFeaturedShows($channel); ?>
			<div class="swiper-wrapper">
				<?php
					if($query_shows->have_posts()):
		                while($query_shows->have_posts()) : $query_shows->the_post();
		            		$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
		                    $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
		                    if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
								<div class="swiper-slide">
									<img src="<?php the_field('featured_banner_image'); ?>" class="swiper-photo" title="<?php the_title();?>" />
									<?php $banner_text_alignment = get_field('banner_text_alignment') == 'right' ? "right-info" : "left-info";?>
									<div class="swiper-description <?php echo $banner_text_alignment; ?>">
										<span class="day"><?php echo get_field('airing_schedule') ? date('F d, Y',get_field('airing_schedule')) : date('F d, Y');?></span>
										<div class="time">
											<span class="timeslot">Live at <?php echo get_field('airing_schedule') ? date('h:i a',get_field('airing_schedule')) : date('h:i a');?></span>
											<span class="timezone">(<?php echo get_field('airing_time_jkt') ? date('h:i a',get_field('airing_time_jkt')) : date('h:i a');?> JKT/BKK)</span>
										</div>
										<span class="title"><?php the_title(); ?></span>
										<p class="description"><?php echo mb_strimwidth(get_the_excerpt(),0,300,"...");?></p>
										<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>" class="view-more">View More</a>
									</div>	
								</div>
		                <?php endif;endwhile;
		            endif;
				?>
			</div>
			<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section">
	<h2 class="section-title">Highlights</h2>
	<div class="row">
		<?php
			if($query_shows->have_posts()):
	            while($query_shows->have_posts()) : $query_shows->the_post();
	            	$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
	                $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
	                if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
						<div class="spotlight-show-container col-xs-12 col-sm-6">
							<div class="spotlight-show">
								<div class="spotlight-details">
									<h3 class="spotlight-title"><?php the_title(); ?></h3>
									<p class="spotlight-excerpt"><?php echo strip_tags(mb_strimwidth(get_the_excerpt(),0,150, '...'));?></p>
									<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>" class="link-button">View More</a>
								</div>
								<div class="spotlight-photo" style="background: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true)[0]; ?>') no-repeat center center; background-size:cover; "></div>
							</div>
						</div>
	                <?php endif;
	            endwhile;
	        endif;
		?>
	</div>
</div>
<div class="section">
	<div class="video-player-container video-player-side-container clearfix">
		<div class="video-player">
			<?php
				$query_show = getAllShows($channel,1,true);
				if($query_show->have_posts()):
				    while($query_show->have_posts()) : $query_show->the_post();
				        $publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
				        $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
				        if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
							<iframe id="vimeoplayer" width="700" height="400" src="http://player.vimeo.com/video/<?php echo get_field('vimeo_id')?>?api=1&player_id=vimeoplayer" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				    <?php endif;endwhile;
				endif;
			?>
		</div>
		<div class="video-playlist-container video-playlist-side-container">
			<div id="video-playlist" class="video-playlist video-playlist-side swiper-container">
				<div class="video-show-container swiper-wrapper">
					<?php
						$query_shows_2 = getAllShows($channel, null, true);
						if($query_shows_2->have_posts()):
							$counter = 1;
				            while($query_shows_2->have_posts()) : $query_shows_2->the_post();
				            	$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
				                $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
				                if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
				                    <div class="video-show swiper-slide <?php echo $counter++ == 1 ? 'active':'';?>" data-vimeo-id="<?php the_field('vimeo_id'); ?>">
										<span class="video-title"><?php the_title(); ?></span>
										<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>" class="video-thumbnail">
									</div>
				                <?php endif;
				            endwhile;
				        endif;
				        restore_current_blog();
					?>
				</div>
			</div>
			<div class="video-player-nav swiper-button-prev gradient-red hidden-md hidden-lg"></div>
    		<div class="video-player-nav swiper-button-next gradient-red hidden-md hidden-lg"></div>
		</div>
	</div>
</div>
<?php get_template_part( 'partials/other-shows' ); ?>
<?php get_footer( 'rtl' ); ?>