<?php
/**
 * Template part for custom header nav for homepage
 *
 */

?>

<div class="custom-header-nav">
	<ul class="menu desktop-menu">
		<li class="menu-item menu-item-has-children js-submenu-trigger"><a>About <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('about') ?>
		</li>
		<li class="menu-item menu-item-has-children js-submenu-trigger"><a>People <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('designation') ?>
		</li>
		<li class="menu-item" ><a href="/knowledge-center"> Experience  <i class="fa fa-caret-down" aria-hidden="true" style="opacity:0; cursor:auto;"></i></a></li>
		<li class="menu-item menu-item-has-children js-submenu-trigger"><a> Insights <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('patient-family') ?>
		</li>
		<li class="menu-item menu-item-has-children js-submenu-trigger"><a> Careers <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('news-events') ?>
		</li>
		<li class="menu-item menu-item-has-children js-submenu-trigger"><a>Contact <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('contact') ?>
		</li>
	</ul>
</div>