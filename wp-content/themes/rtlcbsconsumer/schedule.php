<?php
// Template Name: Schedule

$bannerUrl = get_field( 'banner_image' );
$style = ( $bannerUrl ) ? 'style="background-image: url(\'' . $bannerUrl . '\');"' : '';

get_header( 'rtl' ); ?>

<div class="content-area calendar-area">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header" <?php echo $style; ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>
		<div class="entry-content">
			<div id="schedule-slideshow" class="swiper-container">
				<div class="swiper-wrapper">
				<?php 
					if(function_exists('tribe_get_events')):
						$daterange = getDateRange();
						$time_list_rebased = getTribeEventsUniqueStartTime($daterange);

						foreach($daterange as $date):
							$events = getTribeEvents($date->format("Y-m-d").' 00:00',$date->format("Y-m-d").' 23:59');?>
							<div class="swiper-slide">
								<div class="schedule-date-container">
									<h2>
										<span class="schedule-day"><?php echo $date->format("l");?></span>
										<span class="schedule-date"><?php echo $date->format("F d, Y");?></span>
									</h2>
								</div>	
								<div class="highlight-container">
									<span class="title">Highlight</span>
									<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
								</div>
									
								<?php
								$show_counter = 0;
								if(count($events) > 0):
									foreach ($events as $event) :
										$show_start_time = date('H:i',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));
										$next_skip = true;

										while($next_skip == true):
											if($time_list_rebased[$show_counter] == $show_start_time): 
												$next_skip = false;
												$background_image = getFeaturedImageByTitle($event->post_title);?>
												<div class="schedule-shows" title="<?php echo $event->post_title;?>">
													<p class="today-show-thumb-container" style="<?php echo $background_image;?>"></p>
													<div class="time">
														<span class="timeslot"><?php echo date('H:i',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));?></span>
														<span class="timezone"><?php echo $event->post_content != '' ? "(".$event->post_content.' JKT/BKK)' : '';?></span>
														<h3><?php echo mb_strimwidth($event->post_title,0,20,"...") ?></h3>
													</div>
												</div>
									<?php   else: ?>
												<div class="schedule-shows"></div>
									<?php   endif;
											$show_counter++;
										endwhile;
									endforeach;
								endif;?>
							</div>
						<?php endforeach;
					endif;?>
				</div>	
			</div>
			<div class="schedule-slideshow-button">
				<div class="today-nav swiper-button-prev"></div>
		   		<div class="today-nav swiper-button-next"></div>	
	   		</div>
		</div>
	</article>
</div>

<?php get_footer( 'rtl' ); ?>