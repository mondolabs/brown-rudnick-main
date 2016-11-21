<?php
/*
Plugin Name: Listo
Plugin URI: http://contactform7.com/listo
Description: Listo supplies other plugins and themes with commonly used lists.
Author: Takayuki Miyoshi
Author URI: http://ideasilo.wordpress.com/
Text Domain: listo
Domain Path: /languages/
Version: 1.1
*/

define( 'LISTO_VERSION', '1.1' );
define( 'LISTO_MODULES_DIR', path_join( dirname( __FILE__ ), 'modules' ) );
define( 'LISTO_LANGUAGES_DIR', path_join( dirname( __FILE__ ), 'languages' ) );

interface Listo {
	public static function items();
	public static function groups();
}

function listo( $type, $args = '' ) {
	$args = wp_parse_args( $args, array(
		'group' => null,
		'locale' => null ) );

	$list_types = array(
		'countries' => 'Listo_Countries',
		'us_subdivisions' => 'Listo_US_Subdivisions',
		'currencies' => 'Listo_Currencies',
		'time_zones' => 'Listo_Time_Zones' );

	$list_types = apply_filters( 'listo_list_types', $list_types );

	if ( ! isset( $list_types[$type] ) ) {
		return false;
	}

	$class = $list_types[$type];

	if ( ! class_exists( $class ) ) {
		$mod = sanitize_file_name( str_replace( '_', '-', $type ) . '.php' );
		$mod = path_join( LISTO_MODULES_DIR, $mod );

		if ( file_exists( $mod ) ) {
			require_once $mod;
		}
	}

	if ( ! is_callable( array( $class, 'items' ) ) ) {
		return false;
	}

	$items = call_user_func( array( $class, 'items' ) );

	if ( $args['locale'] ) {
		$mofile = 'listo-' . $args['locale'] . '.mo';
		$mofile = path_join( LISTO_LANGUAGES_DIR, $mofile );

		if ( load_textdomain( 'listo', $mofile ) ) {
			$translated = array();

			foreach ( $items as $key => $val ) {
				$translated[$key] = _x( $val, $type, 'listo' );
			}

			$items = $translated;
		}
	}

	$group = $args['group'];

	if ( ! $group ) {
		return $items;
	} elseif ( ! is_callable( array( $class, 'groups' ) ) ) {
		return false;
	}

	$groups = call_user_func( array( $class, 'groups' ) );

	if ( isset( $groups[$group] ) ) {
		return array_intersect_key( $items, array_fill_keys( $groups[$group], '' ) );
	}

	return $items;
}
