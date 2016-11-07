<?php
// Template Name: Show

get_header( 'rtl' );
switch_to_blog( 1 );?>

<div class="section">
	<div class="show-banner">
		<img src="<?php the_field('banner_image'); ?>" class="img-responsive">
		<div class="show-banner-video-container hide">
			<span class="close-video">x</span>
			<iframe class="show-banner-video" id="showInnerVid" src="//player.vimeo.com/video/<?php the_field('vimeo_id'); ?>?badge=0&amp;byline=0&amp;portrait=0&amp;title=0" width="1060" height="400" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		</div>
		<?php $banner_text_alignment = get_field('banner_text_alignment') == 'right' ? "right-info" : "left-info";?>
		<div class="show-banner-description <?php echo $banner_text_alignment; ?>">
			<span class="date"><?php echo get_field('airing_schedule') ? date('F d, Y',get_field('airing_schedule')) : date('F d, Y');?></span>
			<span class="time">Live at <?php echo get_field('airing_schedule') ? date('g:i a',get_field('airing_schedule')) : date('g:i a');?> <small>(<?php echo get_field('airing_time_jkt') ? date('h:i a',get_field('airing_time_jkt')) : date('h:i a');?> JKT/BKK)</small></span>
			<a href="#" class="watch-video"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Watch Video</a>
		</div>
	</div>
	<div class="show-synopsis">
		<div class="row">
			<div class="col-sm-4"><img src="<?php the_field('image_title'); ?>" class="img-responsive"></div>
			<div class="col-sm-8">
				<p><?php echo the_content();?></p>
				<p><strong>Starring</strong> <?php echo get_field('cast',175); ?></p>
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