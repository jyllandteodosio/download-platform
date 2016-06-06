<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php if (isset($_SERVER['HTTP_USER_AGENT'])&&(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ header('X-UA-Compatible: IE=edge,chrome=1'); } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<?php wp_head(); ?>
		
	</head>
	<body <?php body_class(); ?>>
		<div id="header" class="">
			<div class="container">
				<div id="masthead">
					<div class="ad-container">
						<div class="ad">
						</div>
					</div>
					<a href="<?php bloginfo( 'url' ) ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ) ?> Logo" class="logo hidden-xs" /></a>
				</div>
				<nav class="navbar navbar-inverse">
					<div class="container hidden-xs">					
						<div class="navbar-header">
							<a href="<?php bloginfo( 'url' ) ?>" class="navbar-brand visible-xs"><img src="<?php header_image(); ?>" alt="RTL CBS Asia" /></a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="navbar" class="collapse navbar-collapse">
							<?php wp_nav_menu( array(
								'menu' => 'Primary Menu',
								'menu_class' => 'nav navbar-nav',
								'menu_id' => 'main-menu',
								'container' => '',
								'theme_location' => 'primary',
							) ); ?>
							<!-- <ul class="nav navbar-nav">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul> -->
							<div class="social-header visible-md visible-lg">
							    <span>Follow us on:</span>
                                <a href="http://www.facebook.com/RTLCBSEntertainment" title="Facebook" class="facebook">Facebook</a>
                                <a href="http://www.twitter.com" title="Twitter" class="twitter">Twitter</a>
                                <span><?php echo date("l, F j, Y");  ?></span>
                            </div>
						</div><!--/.nav-collapse -->
						
						
						
						<?php wp_nav_menu( array(
								'menu' => 'Featured Shows Menu',
								'menu_class' => 'nav navbar-nav hide hidden-xs hidden-sm',
								'menu_id' => 'featured-menu',
								'container' => '',
								'theme_location' => 'featured-shows',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
							) ); ?>
					</div>
					
					<div class="maxed-width navbar-mobile-wrap mobile-menu visible-xs">
                            <div class="xs-menu-icon">
                                   <a href="<?php bloginfo( 'url' ) ?>" class="navbar-brand visible-xs"><img src="<?php header_image(); ?>" alt="RTL CBS Asia" /></a>
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menu-mobile">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                            </div>
                            <div class="navbar-collapse collapse container-fluid navbar-menu-mobile max-width">
                                <ul class="category-menu to-uppercase">
                                    <?php wp_nav_menu( array('menu'=>'Primary Menu', 'menu_id'=>'main-menu', 'container'=>'', 'container_class' => 'xs-menu', 'theme_location' => 'primary', 'items_wrap'=>'%3$s'));  ?>
                                </ul>
                            </div><!--/.navbar-collapse -->
                    </div><!-- category-menu -->
				</nav>
			</div>
		</div>

		<main id="main" class="container clearfix">

