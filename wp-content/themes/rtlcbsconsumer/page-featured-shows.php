<?php
/**
 * Template Name: Featured Shows
 */
get_header( 'rtl' ); ?>

<div class="section">
	<div id="featured-slideshow" class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">	
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard.jpg" class="swiper-photo" />
				<div class="swiper-description">
					<span class="day">May 18, Monday</span>
					<div class="time">
						<span class="timeslot">Live at 8:00am</span>
						<span class="timezone">(7am JKT/BKK)</span>
					</div>
					<span class="title">Billboard Music Awards 2015</span>
					<p class="description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social interactions on popular online destinations for music.</p>
					<a href="#" class="view-more">View More</a>
				</div>	
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/bgt.png" class="swiper-photo" />
				<div class="swiper-description">
					<span class="day">Sundays</span>
					<div class="time">
						<span class="timeslot">Live at 10:30am</span>
						<span class="timezone">(9:30am JKT/BKK)</span>
					</div>
					<span class="title">Britain's Got Talent 9</span>
					<p class="description">Anyone, any age, any talent. Join judges Simon Cowell, Amanda Holden, Alesha Dixon and David Walliams to find the next winner of Britain's Got Talent! Expect the craziest, funniest, most stunning and entertaining acts - all in a bid to win the grand prize of £250,000.</p>
					<a href="#" class="view-more">View More</a>
				</div>			
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/criticschoice.jpg" class="swiper-photo"/>
				<div class="swiper-description">
					<span class="day">June 1, Monday</span>
					<div class="time">
						<span class="timeslot">LIVE at 8:00am</span>
						<span class="timezone">(7:00am JKT/BKK)</span>
					</div>
					<span class="title">Critics' Choice Television Awards</span>
					<p class="description">The 5th annual Critics' Choice Television Awards honors the best in programs and performances on television.</p>
					<a href="#" class="view-more">View More</a>
				</div>		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards.png" class="swiper-photo"/>
				<div class="swiper-description">
					<span class="day">Wednesdays</span>
					<div class="time">
						<span class="timeslot">9:55pm</span>
						<span class="timezone">(8:55pm JKT/BKK)</span>
					</div>
					<span class="title">House Of Cards 3</span>
					<p class="description">Frank Underwood has ascended to the presidency of the United States without a single vote cast to his name. As he now holds the most powerful position in the world, how is he going to keep himself at the top or will he lose at the game he so expertly plays?</p>
					<a href="#" class="view-more">View More</a>
				</div>		
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary.jpg" class="swiper-photo"/>		
				<div class="swiper-description">
					<span class="day">Wednesdays</span>
					<div class="time">
						<span class="timeslot">9:00pm</span>
						<span class="timezone">(8:00pm JKT/BKK)</span>
					</div>
					<span class="title">Elementary 3</span>
					<p class="description">Elementary stars Jonny Lee Miller as detective Sherlock Holmes and Lucy Liu as Dr. Joan Watson in a modern-day drama about a crime-solving duo that cracks the NYPD's most impossible cases.</p>
					<a href="#" class="view-more">View More</a>
				</div>
			</div>
			<div class="swiper-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/theoddcouple.png" class="swiper-photo"/>
				<div class="swiper-description">
					<span class="day">Fridays</span>
					<div class="time">
						<span class="timeslot">9:55pm</span>
						<span class="timezone">(8:55pm JKT/BKK)</span>
					</div>
					<span class="title">The Odd Couple 3</span>
					<p class="description">Former college buddies Oscar and Felix become unlikely roommates after the demise of their marriages. The only thing is - they are complete opposites! Oscar is an endearing slob while Felix is an uptight neat freak. How will these mismatched friends make their crazy living arrangement work?</p>
					<a href="#" class="link-button">View More</a>
				</div>		
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section">
	<h2 class="section-title">Highlights</h2>
	<div class="row">
		<div class="spotlight-show-container col-xs-12 col-sm-6">
			<div class="spotlight-show">
				<div class="spotlight-details">
					<h3 class="spotlight-title">Billboard Music Awards 2015</h3>
					<p class="spotlight-excerpt">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring...</p>
					<a href="#">View More</a>
				</div>
				<div class="spotlight-photo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard_306x200.jpg');"></div>
			</div>
		</div>
		<div class="spotlight-show-container col-xs-12 col-sm-6">
			<div class="spotlight-show">
				<div class="spotlight-details">
					<h3 class="spotlight-title">House of Cards 3</h3>
					<p class="spotlight-excerpt">Frank Underwood has ascended to the presidency of the United States without a single vote cast to his name. As he now holds the most powerful position in the world, how...</p>
					<a href="#">View More</a>
				</div>
				<div class="spotlight-photo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_306x200.jpg');"></div>
			</div>
		</div>
	</div>
</div>
<div class="section">
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
			<div class="swiper-button-prev gradient-red hidden-md hidden-lg"></div>
    		<div class="swiper-button-next gradient-red hidden-md hidden-lg"></div>
		</div>
	</div>
</div>
<div class="section">
	<h2 class="section-title">Other Shows</h2>
	<div class="other-slideshow-container">
		<div id="other-shows-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/billboard_331x300.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide">		
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/bgt_331x300.jpg" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide">		
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_331x300.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide">		
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_331x300.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide">		
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_331x300.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide">		
					<div class="show">
						<div class="show-thumbnail-container">
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/houseofcards_331x300.png" class="show-thumbnail" />
						</div>
						<div class="show-details">
							<span class="show-title">Billboard Music Awards 2015</span>
							<p class="show-description">The Billboard Music Awards honors some of the hottest names in music today. The finalists are based on key fan interactions, including album sales, radio airplay, touring, streaming and social...</p>
							<a href="#" class="view-more link-button">View More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="swiper-button-prev swiper-button-default-white"></div>
	<div class="swiper-button-next swiper-button-default-white "></div>
</div>
<?php get_footer( 'rtl' ); ?>