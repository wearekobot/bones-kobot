<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		
		<title><?php $wp_title = wp_title('', false); if (!empty($wp_title)) : ?><?php wp_title(''); ?><?php else : ?><?php bloginfo('description'); ?><?php endif; ?> | <?php bloginfo('name'); ?></title>
		
		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        
		<!-- So the site runs in fullscreen when launched from a devices homescreen -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		
		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-touch.png">
		<?php 
			$favicon = get_theme_mod('favicon'); 
			if ((isset($favicon) && !empty($favicon))){
				$favicon_url = $favicon;
			} else {
				$favicon_url = get_template_directory_uri().'/favicon.png';
			}
		?>
		<link rel="icon" href="<?php echo $favicon_url; ?>">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="container">
			<header id="header">
				<div class="wrap header--top">
					<p class="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
					<nav class="header--navigation">
						<?php bones_header_nav(); ?>
						<div class="navHamburger">&equiv;</div>
					</nav>
				</div>
			</header>
