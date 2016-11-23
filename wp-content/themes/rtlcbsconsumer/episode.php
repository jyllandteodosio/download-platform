<?php
// Template Name: Episode

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
<a href="<?php echo site_url().'/'.$post->post_name; ?>" class="back-to-previous">Back to the Show Page</a>
<div class="section">
	<div class="show-episode">
		<div class="row">
			<?php
				switch_to_blog( 1 );
				$post_slug = $_GET['ep'];
				$episode = pods( 'episode' );

				$params = array('where' => 't.post_name = "'.$post_slug.'"');

				$episode->find( $params );

				while( $episode->fetch() ):?>
					<div class="col-md-6">
						<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($episode->field('id')), 'thumbnail-size', true)[0];?>" class="img-responsive" />
					</div>
					<div class="col-md-6">
						<div class="episode-details">
							<span class="episode-number">Episode <?php echo $episode->field('episode_number');?></span>
							<h2 class="episode-title"><?php echo $episode->field('post_title');?></h2>
							<p class="episode-summary"><?php echo $episode->field('post_content');?></p>
						</div>
					</div>
		<?php   endwhile;
			restore_current_blog();
		 ?>
		</div>
	</div>
</div>
<?php get_footer( 'rtl' ); ?>