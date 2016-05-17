<?php
// Template Name: Videos

get_header( 'rtl' ); ?>

<div class="content-area">
	<div class="video-player-container video-player-side-container clearfix">
		<div class="video-player">
			<iframe id="vimeoplayer" width="700" height="400" src="http://player.vimeo.com/video/127580017?api=1&player_id=vimeoplayer" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<div class="video-playlist-container video-playlist-side-container">
			<div id="video-playlist" class="video-playlist video-playlist-side swiper-container">
				<div class="video-show-container swiper-wrapper">
					<?php
						switch_to_blog( 1 );
						$channel = 'entertainment';
						$query_shows = getAllShows($channel);
						if($query_shows->have_posts()):
							$counter = 1;
				            while($query_shows->have_posts()) : $query_shows->the_post();
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
					<!-- <div class="video-show swiper-slide active" data-vimeo-id="127580017">
						<span class="video-title">Billboard Music Awards 2015</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard_500x280.png" class="video-thumbnail">
					</div> -->
				</div>
			</div>
			<div class="video-player-nav swiper-button-prev gradient-red hidden-md hidden-lg"></div>
    		<div class="video-player-nav swiper-button-next gradient-red hidden-md hidden-lg"></div>
		</div>
	</div>
</div>

<?php get_footer( 'rtl' ); ?>