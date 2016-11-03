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
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<?php do_action( 'foundationpress_after_body' ); ?>


			<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
			<div id="mobile__logo__container" class="show-for-small-only">
				<a href="/">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
				</a>
			</div>
			<div id="search__icon__mobile" class="desktop__menu__icon__single show-for-small-only">
				<a href="/search">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.21 46.21"><defs><style>.cls-1,.cls-2{fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:6px;}.cls-2{stroke-linecap:round;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="icons"><circle class="cls-1" cx="19" cy="19" r="16"/><line class="cls-2" x1="30.35" y1="30.27" x2="43.21" y2="43.21"/></g></g></svg>
				</a>
			</div>



			<div class="mobile__button__container">
				<button type="button" id="open-mobile-menu" class="mobile-active right-menu-icon show-for-small-only" ></button>
			</div>		
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			
			<?php do_action( 'foundationpress_layout_start' ); ?>

				<header id="masthead" class="site-header" role="banner">
					<div class="menu__wrapper--desktop row sr">
						<div class="logo__wrapper columns large-4 medium-3 hide-for-small-only">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
							</a>
						</div>
							
						<div class="menu__inner-wrapper--desktop columns large-7 medium-9">
							<?php get_template_part('template-parts/desktop-icons')?>
							<?php desktop_menu(); ?>
							<span class="subnav__color-block"></span>
						</div>
						<div class="test___nav">
						</div>

					</div>

				</header>

				<div class="menu__outer-wrapper--desktop-on-scroll hide-for-small-only">	
					<header id="mastheadOnScroll" class="site-header" role="banner">
						<div class="menu__wrapper--desktop-on-scroll row">
							<div class="logo__wrapper columns large-4 medium-3">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
								</a>
							</div>
							<?php get_template_part('template-parts/desktop-icons')?>
							<div class="menu__inner-wrapper--desktop columns large-7 medium-10">								
								<?php desktop_menu(); ?>
								<span class="subnav__color-block"></span>
							</div>
						</div>	
			
					</header>
				</div>	

	<?php do_action( 'foundationpress_after_header' ); ?>



