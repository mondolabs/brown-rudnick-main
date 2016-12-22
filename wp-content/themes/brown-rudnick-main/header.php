<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		  <!-- start:favicon image -->
		  
   
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		 <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/192x192.png">
    <!-- end:favicon image -->

    <!-- start:favicon touch image -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/images/favicons/180x180.png">
    <!-- end:favicon touch image -->

    <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




		
		<!--[if lt IE]>
			<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/assets/stylesheets/ie.css" type="text/css" media="screen"/>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<?php do_action( 'foundationpress_after_body' ); ?>

		<div id="cookies-notification">
			<h1 class="title__text">Cookie Notification</h1>
			<p class="body__text">We use cookies on our website. Please click the 'Read More' link below to view our Cookie Policy, how we use them on our site and how to change your cookie settings. By continuing to use this site you consent to our use of cookies in accordance with our Cookie Policy. You may delete and block all cookies from this site, but parts of the site will not work. To find out more about cookies on this website, see our <a href='/cookie-notification/'>Read more ...</a></p>
			<p><input type="checkbox" id="set-cookies">Accept cookie</p>
		</div>

		<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>		
		<div class="mobile__menu__wrapper">	
			<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
		</div>
		<?php endif; ?>
		
		<?php do_action( 'foundationpress_layout_start' ); ?>
		
		<header id="masthead" class="site-header show-for-large" role="banner">
			<div class="menu__wrapper--desktop row sr">
				<div class="logo__wrapper columns large-4 medium-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
					</a>
				</div>
					<?php get_template_part('template-parts/desktop-icons')?>
				<div class="menu__inner-wrapper--desktop columns large-8 medium-9 desktop__menu__wrapper">
					<?php desktop_menu(); ?>
				</div>
			</div>
		</header>

		<div class="menu__outer-wrapper--desktop-on-scroll show-for-large">	
			<header id="mastheadOnScroll" class="site-header" role="banner">
				<div class="menu__wrapper--desktop-on-scroll row">
					<div class="logo__wrapper columns large-2 medium-3">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-Scroll-Logo.png">
						</a>
					</div>
					<div class="menu__inner-wrapper--desktop columns large-10 medium-9">
						<?php get_template_part('template-parts/desktop-icons-scroll')?>
						<?php desktop_menu(); ?>
					</div>
				</div>		
			</header>
		</div>	



	<?php do_action( 'foundationpress_after_header' ); ?>



