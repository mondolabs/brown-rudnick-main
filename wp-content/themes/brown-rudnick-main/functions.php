<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );


require_once( 'library/custom-functions.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
  $existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}

// registering custom filters for custom searches of people 
add_filter( 'query_vars', 'custom_insights_query_vars' );
function custom_insights_query_vars( $vars ) {
  $vars[] = 'geography_query';
  $vars[] = 'industry_query';
  $vars[] = 'practice_query';
  $vars[] = 'language_query';
  $vars[] = 'location_query';
  $vars[] = 'admission_query';
  $vars[] = 'education_query';
  $vars[] = 'date_query';
  $vars[] = 'type_query';
  $vars[] = 'keyword';
  $vars[] = 'previous-parent';
  $vars[] = 'previous-slug';
  $vars[] = 'tag';
  return $vars;
}

// register custom query vars for searches by jobs
add_filter( 'query_vars', 'custom_jobs_query_vars' );
function custom_jobs_query_vars( $vars ) {
  $vars[] = 'job_keyword';
  $vars[] = 'job_location_query';
  return $vars;
}

// Make all posts commentable
add_filter('comments_open', '__return_true');
  