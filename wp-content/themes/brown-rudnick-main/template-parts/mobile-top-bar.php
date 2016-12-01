<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="mobile__logo__container" class="hide-for-large">
  <a href="/">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/BR-logo-for-nav.png">
  </a>
</div>

<div id="search__icon__mobile" class="desktop__menu__icon__single hide-for-large">
  <a href="/search">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.21 46.21"><defs><style>.cls-1,.cls-2{fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:6px;}.cls-2{stroke-linecap:round;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="icons"><circle class="cls-1" cx="19" cy="19" r="16"/><line class="cls-2" x1="30.35" y1="30.27" x2="43.21" y2="43.21"/></g></g></svg>
  </a>
</div>



<div class="mobile__button__container hide-for-large">
  <button type="button" id="open-mobile-menu" class="mobile-active right-menu-icon hide-for-large" ></button>
</div>

<nav class="vertical menu" id="mobile-menu" role="navigation">
  <?php foundationpress_mobile_nav(); ?>
  <div class="mobile__menu__bottom">
  	<div class="one__half left padding__wrapper padding-top-40 padding-bottom-40">
      <a href="/contact-us">
  		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.37 39.53"><defs><style>.cls-5{fill:none;stroke:#b91628;stroke-linejoin:round;stroke-width:2px;}</style></defs><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-5" d="M39.87,17.75C39.87,26.17,31.51,33,21.19,33a22.43,22.43,0,0,1-6.55-1L3.9,37l4.21-8.39A14,14,0,0,1,2.5,17.75C2.5,9.33,10.87,2.5,21.19,2.5S39.87,9.33,39.87,17.75Z"/></g></g></svg>
  		<p>Contact us</p>
      </a>
  	</div>
  	<div class="one__half padding__wrapper padding-top-40  padding-bottom-40">
      <a href="/all-locations">
    		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.75 55.13"><defs><style>.cls-6{fill:none;stroke:#b91628 !important; stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}.cls-7{fill: none; stroke:#b91628 ; stroke-width: 2px;}</style></defs><title>Asset 2</title><g ><g id="icons"><path class="cls-6" d="M36.25,19.19c0,8.67-16.37,32.43-16.37,32.43S3.5,27.86,3.5,19.19,10.83,3.5,19.88,3.5,36.25,10.53,36.25,19.19Z"/><circle class="cls-7" cx="20.09" cy="18.72" r="5.91"/></g></g></svg>
  		<p>Locations</p>
      </a>
  	</div>
  </div>
</nav>
