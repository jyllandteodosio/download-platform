<?php
// Template Name: Show

get_header( 'rtl' ); ?>
<div class="section">
	<div class="show-banner">
		<img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_1060x400.jpg" class="img-responsive">
		<div class="show-banner-video-container hide">
			<span class="close-video">x</span>
			<iframe class="show-banner-video" id="showInnerVid" src="//player.vimeo.com/video/121871277?badge=0&amp;byline=0&amp;portrait=0&amp;title=0" width="1060" height="400" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		</div>
		<div class="show-banner-description">
			<span class="date">Wednesdays</span>
			<span class="time">9:00pm <small>(8:00pm JKT/BKK)</small></span>
			<a href="#" class="watch-video"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Watch Video</a>
		</div>
	</div>
	<div class="show-synopsis">
		<div class="row">
			<div class="col-sm-4"><img src="<?php echo get_template_directory_uri(); ?>/images/placeholders/elementary_menu.png" class="img-responsive"></div>
			<div class="col-sm-8">
				<p>The new season of Elementary is brimming with uncertainty on how things will develop after the dynamic duo parted ways. Holmes returns to New York with a new apprentice and a renewed interest in working with the NYPD after being fired by London’s MI6. However, Captain Gregson won’t let him resume consulting for the department without permission from his former partner, Watson, the NYPD’s new go-to private investigator. New cases. New relationships. New twists will be in store. Will Holmes and Dr. Watson ever reunite?</p>
				<p><strong>Starring</strong> Jonny Lee Miller, Lucy Liu</p>
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