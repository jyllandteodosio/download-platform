<div class="section">
	<h2 class="section-title">Other Shows</h2>
	<div class="other-slideshow-container">
		<div id="other-shows-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<?php
					switch_to_blog( 1 );
					$channel = 'entertainment';
					$query_shows = getAllShows($channel);
					if($query_shows->have_posts()):
			            while($query_shows->have_posts()) : $query_shows->the_post();
			            	$publish_date = get_post_meta(get_the_ID(), '__wpdm_publish_date', true);
			                $expire_date = get_post_meta(get_the_ID(), '__wpdm_expire_date', true);
			                if(checkPackageDownloadAvailabilityDate($publish_date, $expire_date)):?>
			                	<div class="swiper-slide">
									<div class="show">
										<div class="show-thumbnail-container">
											<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true)[0]; ?>" class="show-thumbnail" />
										</div>
										<div class="show-details">
											<span class="show-title"><?php the_title(); ?></span>
											<p class="show-description"><?php echo mb_strimwidth(get_the_excerpt(),0,180, '...');?></p>
											<a href="<?php echo(get_site_url(2)."/".$post->post_name)?>" class="view-more link-button">View More</a>
										</div>
									</div>
								</div>
			                <?php endif;
			            endwhile;
			        endif;
			        restore_current_blog();
				?>
			</div>
		</div>
	</div>
	<div class="other-shows-nav swiper-button-prev swiper-button-default-white"></div>
	<div class="other-shows-nav swiper-button-next swiper-button-default-white "></div>
</div>