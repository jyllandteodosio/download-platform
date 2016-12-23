<?php
// Template Name: Show

get_template_part('channel-setter');

  $channel = $_SESSION['channel'];
  if ( $channel == 'entertainment'):
    get_header('rtl');
  elseif ( $channel == 'extreme'):
    get_header('rtl-blue');
  elseif($channel == 'none'):
    get_header('rtl');
  endif;

// Get next airing schedule of show
global $post;
$tmp = $post;

$args = tribe_get_events( array(
	'eventDisplay'	 => 'upcoming',
	'posts_per_page' => 1,
	'title'		 	 => get_the_title()
));
if(!$args) {
	$args = tribe_get_events( array(
		'eventDisplay'	 => 'past',
		'posts_per_page' => 1,
		'title'		 	 => get_the_title(),
		'order'			 => 'DESC'
	));
}

foreach($args as $post) {
	setup_postdata($post);
	// Get the airing date of the show (set to false to remove time)
	$airing_date = tribe_get_start_date($post,false,'F d, Y');
	// Get the time only
	$airing_time = tribe_get_start_date($post,false,'g:i a');
	// Get JKT/BKK time
	$airing_time_jkt = strtotime('-1 hour', strtotime($airing_time));
	$airing_time_jkt = date('g:i a', $airing_time_jkt);
}
wp_reset_postdata();

$post = null;
$post = $tmp; 
switch_to_blog( 1 );?>

<div class="section">
	<div class="show-banner">
		<img src="<?php the_field('banner_image'); ?>" class="img-responsive">
		<div class="show-banner-video-container hide">
			<span class="close-video">x</span>
			<iframe class="show-banner-video" id="showInnerVid" src="//player.vimeo.com/video/<?php the_field('vimeo_id'); ?>?badge=0&amp;byline=0&amp;portrait=0&amp;title=0" width="1060" height="400" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		</div>
		<div class="show-banner-description left-info">
			<span class="date"><?php echo $airing_date; ?></span>
			<span class="time"><?php echo "Live at " . $airing_time; ?><small><?php echo " (" . $airing_time_jkt . " JKT/BKK)"; ?></small></span>
			<a href="#" class="watch-video"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Watch Video</a>
		</div>
	</div>
	<div class="show-synopsis">
		<div class="row">
			<div class="col-sm-4"><img src="<?php the_field('image_title'); ?>" class="img-responsive"></div>
			<div class="col-sm-8">
				<p><?php echo get_post_field('post_content', get_the_ID())?></p>
				<p><strong>Starring</strong> <?php echo get_field('cast',get_the_ID()); ?></p>
			</div>
		</div>
	</div>
</div>
<?php 
$post_slug = $post->post_name;
$episode = pods( 'episode' );

$params = array(
    'where' => 'show.post_name = "'.$post_slug.'"',
    'orderby' => 'episode_number.meta_value DESC'
);
$episode->find( $params );

if($episode->total() != null && $episode->total() > 0): ?>
<div class="section">
	<h2 class="section-title">Latest Episodes</h2>
	<div class="other-slideshow-container">
		<div id="latest-episodes-slideshow" class="swiper-container">
			<div class="swiper-wrapper">
				<?php
					while( $episode->fetch() ):?>
						<div class="swiper-slide">
							<a href="<?php echo(get_site_url(2)."/".$post->post_name.'?ep='.$episode->field('post_name'))?>" class="show show-wide">
								<div class="show-thumbnail-container" style="background: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($episode->field('id')), 'full', true)[0]; ?>') no-repeat top center; background-size:cover; "></div>
								<div class="show-details">
									<div class="episode">Episode <?php echo $episode->field('episode_number');?></div>
									<div class="episode-title"><?php echo $episode->field('post_title');?></div>
									<p class="show-description"><?php echo strip_tags(mb_strimwidth($episode->field('post_content'),0,150,'...'));?></p>
								</div>
							</a>
						</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
	<div class="latest-episodes-nav swiper-button-prev swiper-button-default-white"></div>
	<div class="latest-episodes-nav swiper-button-next swiper-button-default-white "></div>
</div>
<?php endif; ?>
<?php restore_current_blog();?>
<?php get_template_part( 'partials/other-shows' ); ?>
<?php get_footer( 'rtl' ); ?>