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
					<a href="<?php bloginfo( 'url' ) ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ) ?> Logo" class="logo" /></a>
					<div class="ad-container">
						<div class="ad">
						</div>
					</div>
				</div>
				<nav class="navbar">					
							<div class="navbar-header">
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
					</div><!--/.nav-collapse -->
				</nav>
			</div>
		</div>

		<div id="page" class="container">

