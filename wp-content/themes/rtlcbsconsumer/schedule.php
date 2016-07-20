<?php
// Template Name: Schedule

$bannerUrl = get_field( 'banner_image' );
$style = ( $bannerUrl ) ? 'style="background-image: url(\'' . $bannerUrl . '\');"' : '';

get_header( 'rtl' ); ?>

<div class="content-area calendar-area">
	<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header" <?php echo $style; ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>
		<div class="entry-content">
		<div id="schedule-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="schedule-date-container">
						<h2>
							<span class="schedule-day">Sunday</span>
							<span class="schedule-date">June 29, 2014</span>
						</h2>
					</div>	
					<div class="highlight-container">
						<span class="title">Highlight</span>
						<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>
					<div class="schedule-shows">
						<p class="today-show-thumb-container" style="background: url('http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg') no-repeat top center; background-size:cover;"></p>
						<div class="time">
							<span class="timeslot">21:00</span>
							<span class="timezone">(20:00 JKT/BKK)</span>
							<h3>America's Got talent</h3>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="schedule-date-container">
						<h2>
							<span class="schedule-day">Sunday</span>
							<span class="schedule-date">June 29, 2014</span>
						</h2>
					</div>	
					<div class="highlight-container">
						<span class="title">Highlight</span>
						<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>
					<div class="schedule-shows">
						<p class="today-show-thumb-container" style="background: url('http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg') no-repeat top center; background-size:cover;"></p>
						<div class="time">
							<span class="timeslot">21:00</span>
							<span class="timezone">(20:00 JKT/BKK)</span>
							<h3>America's Got talent</h3>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="schedule-date-container">
						<h2>
							<span class="schedule-day">Sunday</span>
							<span class="schedule-date">June 29, 2014</span>
						</h2>
					</div>	
					<div class="highlight-container">
						<span class="title">Highlight</span>
						<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>
					<div class="schedule-shows">
						<p class="today-show-thumb-container" style="background: url('http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg') no-repeat top center; background-size:cover;"></p>
						<div class="time">
							<span class="timeslot">21:00</span>
							<span class="timezone">(20:00 JKT/BKK)</span>
							<h3>America's Got talent</h3>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="schedule-date-container">
						<h2>
							<span class="schedule-day">Sunday</span>
							<span class="schedule-date">June 29, 2014</span>
						</h2>
					</div>	
					<div class="highlight-container">
						<span class="title">Highlight</span>
						<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>
					<div class="schedule-shows">
						<p class="today-show-thumb-container" style="background: url('http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg') no-repeat top center; background-size:cover;"></p>
						<div class="time">
							<span class="timeslot">21:00</span>
							<span class="timezone">(20:00 JKT/BKK)</span>
							<h3>America's Got talent</h3>
						</div>
					</div>
				</div>



			</div>	
		</div>
		<div class="today-nav swiper-button-prev"></div>
   		<div class="today-nav swiper-button-next"></div>	
		</div>
	</article>
	<?php //endwhile; endif; ?>
</div>

<?php get_footer( 'rtl' ); ?>