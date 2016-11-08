<?php
// Template Name: Schedule

$bannerUrl = get_field( 'banner_image' );
$style = ( $bannerUrl ) ? 'style="background-image: url(\'' . $bannerUrl . '\');"' : '';

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

<div class="content-area calendar-area">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="entry-content">
			<div id="schedule-slideshow">
				<div id="custom-slider-sticky" >
					<header class="entry-header" <?php echo $style; ?>>
						<h1 class="entry-title"><span class="text-capitalize">RTL CBS <?php echo $channel;?></span> Schedule</h1> <?php edit_post_link(); ?>
					</header>

					<div class="custom-slider-for">
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 01, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 02, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 03, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 04, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 05, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 06, 2016</span>
							</h2>
						</div>
						<div class="schedule-date-container">
							<h2>
								<span class="schedule-day">Friday</span>
								<span class="schedule-date">July 07, 2016</span>
							</h2>
						</div>
					</div>

					<div class="highlight-container">
						<span class="title ">Highlight</span>
						<span class="icon "><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>

					<div class="custom-slider-nav">
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						<div>
							<a href="">
								<div class="schedule-shows 0 show-highlights" title="The Insider" style="height: 70px;">
									<p class="today-show-thumb-container" style="background-image: url('http://localhost/rtlcbsasia/operator/wp-content/uploads/2016/03/Chrisley_family-e1467276229174.jpg')"></p>
									<div class="time">
										<span class="timeslot">00:45 AM</span>
										<span class="timezone">(11:45 PM JKT/BKK)</span>
										<h3>The Insider</h3>
									</div>
								</div>
							</a>
						</div>
						
					</div>
					
				</div>

				

				<div class="custom-slider-nav">
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 70px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
					<div>
						<a href="">
							<div class="schedule-shows no-preview 0" title="The Insider" style="height: 700px;">
								<p class="today-show-thumb-container" style=""></p>
								<div class="time">
									<span class="timeslot">00:45 AM</span>
									<span class="timezone">(11:45 PM JKT/BKK)</span>
									<h3>The Insider</h3>
								</div>
							</div>
						</a>
					</div>
				</div>

				
			</div>
			<div class="schedule-slideshow-button"></div>

		</div>
	</article>
</div>


<?php get_footer( 'rtl' ); ?>

<script>
	(function( $ ) {
		// var show_counter = <?php //echo $show_counter;?>;
		// console.log(show_counter);
		// for (var i = 0; i <= show_counter; i++) {
		// 	$('.schedule-shows.'+i).matchHeight();
		// };

		$("#custom-slider-sticky").stick_in_parent()
		  .on("sticky_kit:stick", function(e) {
		    console.log("has stuck!");
		    $('.schedule-slideshow-button').addClass('is_stuck');
		  })
		  .on("sticky_kit:unstick", function(e) {
		    console.log("has unstuck!");
		    $('.schedule-slideshow-button').removeClass('is_stuck');
		  });

		var responsive_options = [
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1
		      }
		    }
		  ];
		$('.custom-slider-for').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  swipeToSlide: true,
		  arrows: true,
		  // appendArrows: $('.schedule-slideshow-button'),
		  prevArrow: '<div class="today-nav swiper-button-prev"></div>',
		  nextArrow: '<div class="today-nav swiper-button-next"></div>',
		  fade: false,
		  asNavFor: '.custom-slider-nav',
		  adaptiveHeight: true,
		  infinite: false,
		  responsive: responsive_options
		});
		$('.custom-slider-nav').slick({
		  slidesToShow: 3,
		  slidesToScroll: 3,
		  asNavFor: '.custom-slider-for',
		  dots: false,
		  arrows: false,
		  centerMode: false,
		  focusOnSelect: true,
		  swipe: false,
		  adaptiveHeight: true,
		  infinite: false,
		  responsive: responsive_options
		});
		$('.custom-slider-nav').slick({
		  slidesToShow: 3,
		  slidesToScroll: 3,
		  asNavFor: '.custom-slider-for',
		  dots: false,
		  arrows: false,
		  centerMode: false,
		  focusOnSelect: true,
		  swipe: false,
		  adaptiveHeight: true,
		  infinite: false,
		  responsive: responsive_options
		});


	})( jQuery );
	
</script>