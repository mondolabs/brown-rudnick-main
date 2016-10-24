<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<nav class="off-canvas position-left" id="offCanvas" data-off-canvas data-position="left" role="navigation">


	<div class="logo__wrapper columns large-3 medium-3 show-for-small-only">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
		</a>
	</div>
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
