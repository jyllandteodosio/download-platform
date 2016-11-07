<?php
// Template Name: Contact

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

<div class="content-area">
	<div class="video-player-container video-player-side-container clearfix">
	   <div class="login-wrap">
                   <h1 class="panel-title"><?php the_title();?></h1>
                   <div id="wppb-login-wrap" class="wppb-user-forms">
                    <?php if(have_posts()){while(have_posts()){the_post();
	                    the_content();                                          
	                }} ?>
	                </div>
        </div>
	</div>
</div>

<?php get_footer( 'rtl' ); ?>