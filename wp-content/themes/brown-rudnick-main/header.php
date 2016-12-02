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
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!--[if lt IE]>
			<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/assets/stylesheets/ie.css" type="text/css" media="screen"/>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<?php do_action( 'foundationpress_after_body' ); ?>
		<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>	
		<div class="mobile__menu__wrapper">	
			<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
		</div>
		<?php endif; ?>
		
		<?php do_action( 'foundationpress_layout_start' ); ?>

		<header id="masthead" class="site-header show-for-large" role="banner">
			<div class="menu__wrapper--desktop row sr">
				<div class="logo__wrapper columns large-4 medium-3 ">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
					</a>
				</div>
					<?php get_template_part('template-parts/desktop-icons')?>
				<div class="menu__inner-wrapper--desktop columns large-7 medium-9 desktop__menu__wrapper">
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



