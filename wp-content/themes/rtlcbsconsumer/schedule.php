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
						$events_counter = 0;
						foreach($daterange as $date):
							$events_counter++;
							$is_hidden = $events_counter > 1 ? "visibility-hidden" : "";
							$events = getTribeEvents($date->format("Y-m-d").' 00:00',$date->format("Y-m-d").' 23:59');?>
							<div class="swiper-slide">
								<div class="schedule-date-container">
									<h2>
										<span class="schedule-day"><?php echo $date->format("l");?></span>
										<span class="schedule-date"><?php echo $date->format("F d, Y");?></span>
									</h2>
								</div>	
								<div class="highlight-container">
									<span class="title <?php echo $is_hidden;?>">Highlight</span>
									<span class="icon <?php echo $is_hidden;?>"><i class="fa fa-star" aria-hidden="true"></i></span>
								</div>
									
								<?php
								$show_counter = 0;
								// echo "<pre>";
								// print_r($events);
								// echo "</pre>";
								if(count($events) > 0):
									foreach ($events as $event) :
										$show_info = getShowInfoByTitle($event->post_title);
										
											$show_start_time = date('H:i',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));
											$next_skip = true;
											$show_info = getShowInfoByTitle($event->post_title);
											while($next_skip == true):
												if($time_list_rebased[$show_counter] == $show_start_time): 
													$is_no_preview = "no-preview";//$show_info['featured_show'] != 'featured' ? "no-preview" : "";
													$next_skip = false;?>
														<a href="<?php echo site_url($show_info['post_name']);?>">
															<div class="schedule-shows <?php echo $is_no_preview." ".$show_counter;?>" title="<?php echo $event->post_title;?>">
																<!-- <p class="today-show-thumb-container" style="<?php echo $show_info['background_image'];?>"></p> -->
																<div class="time">
																	<span class="timeslot"><?php echo date('H:i A',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));?></span>
																	<span class="timezone"><?php echo $event->post_content != '' ? "(".$event->post_content.' JKT/BKK)' : '';?></span>
																	<h3><?php echo mb_strimwidth($event->post_title,0,45,"...") ?></h3>
																</div>
															</div>
														</a>
										<?php   else: ?>
													<div class="schedule-shows no-preview <?php echo $show_counter;?>"></div>
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

<script>
	(function( $ ) {
		var show_counter = <?php echo $show_counter;?>;
		console.log(show_counter);
		for (var i = 0; i <= show_counter; i++) {
			$('.schedule-shows.'+i).matchHeight();
		};
	})( jQuery );
	
</script>