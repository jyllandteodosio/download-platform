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
					<div class="video-show swiper-slide active" data-vimeo-id="127580017">
						<span class="video-title">Billboard Music Awards 2015</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard_500x280.png" class="video-thumbnail">
					</div>
					<div class="video-show swiper-slide" data-vimeo-id="127580018">
						<span class="video-title">Britain's Got Talent 9</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/bgt_500x280.png" class="video-thumbnail">
					</div>
					<div class="video-show swiper-slide" data-vimeo-id="121871277">
						<span class="video-title">Elementary 3</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_500x280.png" class="video-thumbnail">
					</div>
					<div class="video-show swiper-slide" data-vimeo-id="127580022">
						<span class="video-title">House of Cards 3</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_500x280.png" class="video-thumbnail">
					</div>
					<div class="video-show swiper-slide" data-vimeo-id="127600510">
						<span class="video-title">Later Show with Letterman</span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/letterman_500x280.png" class="video-thumbnail">
					</div>
				</div>
			</div>
			<div class="video-player-nav swiper-button-prev gradient-red hidden-md hidden-lg"></div>
    		<div class="video-player-nav swiper-button-next gradient-red hidden-md hidden-lg"></div>
		</div>
	</div>
</div>

<?php get_footer( 'rtl' ); ?>