=== wp_nav_menu Extended! ===
Contributors: junaidbhura
Tags: wp_nav_menu, menu
Requires at least: 3.0
Tested up to: 4.5
Stable tag: 1.0.2
License: GPL2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Adds missing functionality to the native wp_nav_menu() function

== Description ==
Add missing functionality to the native wp_nav_menu() function!

With this plugin you can now use the following options in addition to the default options of [wp_nav_menu](http://codex.wordpress.org/Function_Reference/wp_nav_menu):

**level** : (integer) (required for this plugin to work) The level of the navigation menu to show. If no child_of parameter is passed, it shows all the items of this level

**child_of** : (string|integer) (optional) Either the title or menu item ID of the parent in the menu whose direct children are to be shown

= Sample Usage =

$defaults = array(
	'theme_location'  => 'main_menu',
	'level'  => 2,
	'child_of'  => 'About Us',
);

wp_nav_menu( $defaults );

== Installation ==

1. Upload the wp-nav-menu-extended folder to the /wp-content/plugins/ directory
2. Activate the wp_nav_menu Extended! plugin through the 'Plugins' menu in WordPress
3. You can now use the new options in your code!
