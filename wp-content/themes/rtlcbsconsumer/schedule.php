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

  // echo "header : ".$channel;
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
						<?php $daterange = getDateRange();
						foreach($daterange as $date):?>
							<div class="schedule-date-container">
								<h2>
									<span class="schedule-day"><?php echo $date->format("l");?></span>
									<span class="schedule-date"><?php echo $date->format("F d, Y");?></span>
								</h2>
							</div>
						<?php endforeach;?>
					</div>

					<div class="highlight-container">
						<span class="title ">Highlight</span>
						<span class="icon "><i class="fa fa-star" aria-hidden="true"></i></span>
					</div>

					<div class="custom-slider-nav">
						<?php 
						if(function_exists('tribe_get_events')):
							foreach($daterange as $date):
								$events = getTribeEvents($date->format("Y-m-d").' 00:00:00',$date->format("Y-m-d").' 23:59:59', $channel, 'featured' );?>
								<div>
									<?php
									if(count($events) > 0):
										foreach ($events as $event) :
											$show_info = getShowInfoByTitle($event->post_title);?>
											<a href="<?php echo site_url($show_info['post_name']);?>" title="<?php echo $event->post_title;?>">
												<div class="schedule-shows">
													<p class="today-show-thumb-container" style="<?php echo $show_info['background_image'];?>"></p>
													<div class="time">
														<span class="timeslot"><?php echo date('H:i A',strtotime($event->EventStartDate));?></span>
														<span class="timezone"><?php echo $event->post_content != '' ? "(".$event->post_content.' JKT/BKK)' : '';?></span>
														<h3><?php echo mb_strimwidth($event->post_title,0,45,"....") ?></h3>
													</div>
												</div>
											</a>
											<?php  
											break;
										endforeach;
									endif;?>
								</div>
							<?php endforeach;
						endif;
						?>
					</div>

				</div> <!-- End of #custom-slider-sticky -->

				<div id="schedule-stubs-container" class="custom-slider-nav" data-limit="10" data-offset="0" data-channel = '<?php echo $channel;?>' >
					<?php
					 if(function_exists('tribe_get_events')):
						$events_counter = 0;
						foreach($daterange as $date):?>
							<div id="stub-<?php echo $date->format("Y-m-d");?>" class="schedule-stubs" data-date='<?php echo $date->format("Y-m-d");?>'>
							</div>
						<?php endforeach;
					endif;
					?>
				</div> <!-- End of #custom-slider-nav -->
				<div class="loading-bar no-display"></div>

				
			</div>
			<div class="schedule-slideshow-button"></div>

		</div>
	</article>
</div>


<?php get_footer( 'rtl' ); ?>

<script>
	(function( $ ) {
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
		  slidesToShow: 4,
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
		  speed: 100,
		  responsive: responsive_options
		});
		$('.custom-slider-nav').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  asNavFor: '.custom-slider-for',
		  dots: false,
		  arrows: false,
		  centerMode: false,
		  focusOnSelect: true,
		  swipe: false,
		  adaptiveHeight: true,
		  infinite: false,
		  speed: 100,
		  responsive: responsive_options
		});
		$('.custom-slider-nav').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  asNavFor: '.custom-slider-for',
		  dots: false,
		  arrows: false,
		  centerMode: false,
		  focusOnSelect: true,
		  swipe: false,
		  adaptiveHeight: true,
		  infinite: false,
		  speed: 100,
		  responsive: responsive_options
		});


	})( jQuery );
	
</script>