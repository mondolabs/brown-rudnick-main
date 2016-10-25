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
			<button type="button" class="right-menu-icon button menu-icon hamburger show-for-small-only float-right" data-toggle="offCanvas"></button>		
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
					<?php do_action( 'foundationpress_layout_start' ); ?>

				<header id="masthead" class="site-header" role="banner">
					<div class="menu__wrapper--desktop row sr">
						<div class="logo__wrapper columns large-3 medium-3 hide-for-small-only">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
							</a>
						</div>
						<div class="menu__inner-wrapper--desktop columns large-9 medium-9">
							<?php desktop_menu(); ?>
							<span class="subnav__color-block"></span>
						</div>
					</div>

				</header>

				<div class="menu__outer-wrapper--desktop-on-scroll">
					<header id="mastheadOnScroll" class="site-header" role="banner">
						<div class="menu__wrapper--desktop-on-scroll row">
							<div class="logo__wrapper columns large-3 medium-3">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
								</a>
							</div>
							
							<div class="menu__inner-wrapper--desktop columns large-9 medium-9">
								<ul class="desktop__menu--icons-list scrolled">
									<li>
										<img src="<?php bloginfo('stylesheet_directory');?>/assets/images/contact-icon.png">
									</li>
									<li>
										<img src="<?php bloginfo('stylesheet_directory');?>/assets/images/marker-icon.png">
									</li>
									<li>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/search-icon.png">
									</li>
								</ul>
								<?php desktop_menu(); ?>
								<span class="subnav__color-block"></span>
							</div>
						</div>	
			
					</header>
				</div>	

	<?php do_action( 'foundationpress_after_header' ); ?>



