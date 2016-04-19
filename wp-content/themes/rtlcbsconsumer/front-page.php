<?php
/**
 * Front page template
 */
get_header( 'rtl' ); ?>
<div class="featured-slideshow">
	<div id="home-slideshow" class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">	
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard.jpg" class="swiper-photo" />
				<div class="swiper-description">
					<span class="day">May 18, Monday</span>
					<div class="time">
						<span class="showtime">Live at 8:00am</span>
						<span class="timezone">(7am JKT/BKK)</span>
					</div>
					<span class="title">Billboard Music Awards 2015</span>
					<p class="description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social interactions on popular online destinations for music.</p>
					<a href="#" class="view-more">View More</a>
				</div>	
			</div>
			<!-- <div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/bgt.png" />			
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/criticschoice.jpg" />		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards.png" />		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary.jpg" />		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/theoddcouple.png" />		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/marryme.jpg" />		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/chrisleyknowsbest.png" />		
			</div> -->
		</div>
	</div>
</div>
<?php get_footer( 'rtl' ); ?>