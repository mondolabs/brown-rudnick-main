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
	<body <?php body_class(); ?>>
		<?php do_action( 'foundationpress_after_body' ); ?>

		<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
			<div class="off-canvas-wrapper">
				<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
					<!-- get mobile menu  under here // need to write the template-->
					<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
				</div>
			</div>	
		<?php endif; ?>
		<?php do_action( 'foundationpress_layout_start' ); ?>
				

		<header id="masthead" class="site-header" role="banner">
			<?php desktop_menu(); ?>
			
			<div class="mobile-menu">
				<button class="hamburger-icon" type="button" data-toggle="mobile-menu">
					<span></span>
				</button>
			</div>

			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-Logo.png"></a>
			</div>


			<?php	
				$args = array('child_of'=>5, 'post_type'=>'page', 'sort_column'=>'menu_order');
				$child_pages = get_pages($args);
			?>

		</header>

	<?php do_action( 'foundationpress_after_header' ); ?>
	</body>
</html>	

