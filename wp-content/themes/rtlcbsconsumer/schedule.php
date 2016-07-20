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
				<?php 
					if(function_exists('tribe_get_events')):
							
						$sunday_last_week = date( 'Y-m-d', strtotime( 'sunday last week' ) );
						$saturday_this_week = date( 'Y-m-d', strtotime( 'saturday this week' ) );

						$begin = new DateTime( $sunday_last_week );
						$end = new DateTime( $saturday_this_week );
						$end = $end->modify( '+1 day' ); 

						$interval = new DateInterval('P1D');
						$daterange = new DatePeriod($begin, $interval ,$end);

						foreach($daterange as $date):
							$events = tribe_get_events( array(
								'start_date'   => $date->format("Y-m-d").' 00:00',
			    				'end_date'     => $date->format("Y-m-d").' 23:59'
							) );?>
							<div class="swiper-slide">
								<div class="schedule-date-container">
									<h2>
										<span class="schedule-day"><?php echo $date->format("l");?></span>
										<span class="schedule-date"><?php echo $date->format("M d, Y");?></span>
									</h2>
								</div>	
								<div class="highlight-container">
									<span class="title">Highlight</span>
									<span class="icon"><i class="fa fa-star" aria-hidden="true"></i></span>
								</div>
								<?php
								if(count($events) > 0):
									foreach ($events as $event) :?>
										<div class="schedule-shows" title="<?php echo $event->post_title;?>">
											<?php
												switch_to_blog( 1 );
												$show_id = getPostIdByTitle($event->post_title);
												$background_image = "";
												if($show_id != ''):
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $show_id), 'single-post-thumbnail' );
													$background_image = $image[0] != "" ? "background: url('".$image[0]."') no-repeat top center;" : "";
												endif;
												restore_current_blog();?>
											<p class="today-show-thumb-container" style="<?php echo $background_image;?> background-size:cover;"></p>
											<div class="time">
												<span class="timeslot"><?php echo date('H:i',strtotime(tribe_get_start_date($event->ID, false, Tribe__Date_Utils::DBTIMEFORMAT)));?></span>
												<span class="timezone"><?php echo $event->post_content != '' ? "(".$event->post_content.' JKT/BKK)' : '';?></span>
												<h3><?php echo mb_strimwidth($event->post_title,0,20,"...") ?></h3>
											</div>
										</div>
									<?php
									endforeach;
								endif;?>
							</div>
						<?php endforeach;

					endif;
				?>
			<!-- <div id="schedule-slideshow" class="swiper-container">
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
				</div>	
			</div> -->
				</div>	
			</div>
			<div class="today-nav swiper-button-prev"></div>
	   		<div class="today-nav swiper-button-next"></div>	
		</div>
	</article>
	<?php //endwhile; endif; ?>
</div>

<?php get_footer( 'rtl' ); ?>