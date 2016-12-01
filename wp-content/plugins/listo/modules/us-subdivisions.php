<?php
/**
 * The list of subdivisions of the United States based on ISO 3166-2:US standard.
 *
 * Source: http://en.wikipedia.org/wiki/ISO_3166-2:US ISO 3166-2:US
 */
class Listo_US_Subdivisions implements Listo {

	private static $items = array(
		'ak' => "Alaska",
		'al' => "Alabama",
		'ar' => "Arkansas",
		'as' => "American Samoa",
		'az' => "Arizona",
		'ca' => "California",
		'co' => "Colorado",
		'ct' => "Connecticut",
		'dc' => "District of Columbia",
		'de' => "Delaware",
		'fl' => "Florida",
		'ga' => "Georgia",
		'gu' => "Guam",
		'hi' => "Hawaii",
		'ia' => "Iowa",
		'id' => "Idaho",
		'il' => "Illinois",
		'in' => "Indiana",
		'ks' => "Kansas",
		'ky' => "Kentucky",
		'la' => "Louisiana",
		'ma' => "Massachusetts",
		'md' => "Maryland",
		'me' => "Maine",
		'mi' => "Michigan",
		'mn' => "Minnesota",
		'mo' => "Missouri",
		'mp' => "Northern Mariana Islands",
		'ms' => "Mississippi",
		'mt' => "Montana",
		'nc' => "North Carolina",
		'nd' => "North Dakota",
		'ne' => "Nebraska",
		'nh' => "New Hampshire",
		'nj' => "New Jersey",
		'nm' => "New Mexico",
		'nv' => "Nevada",
		'ny' => "New York",
		'oh' => "Ohio",
		'ok' => "Oklahoma",
		'or' => "Oregon",
		'pa' => "Pennsylvania",
		'pr' => "Puerto Rico",
		'ri' => "Rhode Island",
		'sc' => "South Carolina",
		'sd' => "South Dakota",
		'tn' => "Tennessee",
		'tx' => "Texas",
		'um' => "United States Minor Outlying Islands",
		'ut' => "Utah",
		'va' => "Virginia",
		'vi' => "Virgin Islands, U.S.",
		'vt' => "Vermont",
		'wa' => "Washington",
		'wi' => "Wisconsin",
		'wv' => "West Virginia",
		'wy' => "Wyoming" );

	private static $groups = array(
		'states' => array( 'ak', 'al', 'ar', 'az', 'ca', 'co', 'ct', 'de',
			'fl', 'ga', 'hi', 'ia', 'id', 'il', 'in', 'ks', 'ky', 'la', 'ma',
			'md', 'me', 'mi', 'mn', 'mo', 'ms', 'mt', 'nc', 'nd', 'ne', 'nh',
			'nj', 'nm', 'nv', 'ny', 'oh', 'ok', 'or', 'pa', 'ri', 'sc', 'sd',
			'tn', 'tx', 'ut', 'va', 'vt', 'wa', 'wi', 'wv', 'wy' ),
		'districts' => array( 'dc' ),
		'outlying_areas' => array( 'as', 'gu', 'mp', 'pr', 'um', 'vi' ) );

	private function __construct() {}

	public static function items() {
		return self::$items;
	}

	public static function groups() {
		return self::$groups;
	}

}
