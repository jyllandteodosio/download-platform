<?php 
get_template_part('channel-setter');

  $channel = $_SESSION['channel'];
  if ( $channel == 'entertainment'):
    get_header('rtl');
  elseif ( $channel == 'extreme'):
    get_header('rtl-blue');
  elseif($channel == 'none'):
    get_header('rtl');
  endif;
  
switch_to_blog( 1);
$pagename = get_query_var('pagename'); 
// echo "string-".$pagename;
// echo "404--".get_query_var('episode');
$search_post = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_name FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND post_status = %s", $pagename, 'wpdmpro', 'publish' ));

if ( is_array($search_post) && sizeof($search_post) > 0 ) :
	$post = get_post($search_post[0]->ID);
	restore_current_blog();
	setup_postdata($post);    
	if(isset($_GET['ep']) && $_GET['ep']!= ''){	
	    include 'episode.php'; 
    }else{
	    include 'show.php'; 
    }
else :
	restore_current_blog();?>
	<div class="section">
		<img src="<?php echo get_template_directory_uri(); ?>/images/404.png" class="img-responsive img-404" />
		<a href="<?php echo site_url(); ?>" class="link-button">Back to Homepage</a>
	</div>
<?php endif;

 ?>

<?php get_footer( 'rtl' ); ?>