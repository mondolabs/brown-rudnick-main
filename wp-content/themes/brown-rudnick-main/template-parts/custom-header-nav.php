<?php
/**
 * Template part for custom header nav
 *
 */
?>
<div class="custom-header-nav">
	<ul class="menu desktop-menu">
		<li class="menu-item menu-item-has-children js-menu-item"><a class="js-submenu-trigger">About <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('about') ?>
		</li>
		<li class="menu-item menu-item-has-children js-menu-item"><a class="js-submenu-trigger">Designation <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('designation') ?>
		</li>
		<li class="menu-item js-menu-item" ><a href="/knowledge-center">Knowledge Center <i class="fa fa-caret-down" aria-hidden="true" style="opacity:0; cursor:auto;"></i></a></li>
		<li class="menu-item menu-item-has-children js-menu-item"><a class="js-submenu-trigger">Patient &amp; Caregiver <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('patient-caregiver') ?>
		</li>
		<li class="menu-item menu-item-has-children js-menu-item"><a class="js-submenu-trigger">News &amp; Events <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('news-events') ?>
		</li>
		<li class="menu-item menu-item-has-children js-menu-item"><a class="js-submenu-trigger">Contact <i class="fa fa-caret-down icon--expand" aria-hidden="true"></i></a>
			<?php custom_header_nav('contact') ?>
		</li>
	</ul>
</div>