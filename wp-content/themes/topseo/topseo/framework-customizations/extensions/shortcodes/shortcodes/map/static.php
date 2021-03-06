<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');

{
	$query_params = array(
		'v' => '3.23',
		'language' => substr( get_locale(), 0, 2 ),
		'libraries' => 'places',
	);

	/*
	 * Check if Map option type has the `api_key` method, as user may have a older Unyson version.
	 * TODO: Remove in next versions and provide a better solution
	 */
	if (method_exists('FW_Option_Type_Map', 'api_key')) {
		$query_params['key'] = FW_Option_Type_Map::api_key();
	}

	wp_enqueue_script(
		'google-maps-api-v3',
		'https://maps.googleapis.com/maps/api/js?'. http_build_query($query_params),
		array(),
		$query_params['v'],
		true
	);
}
wp_enqueue_script(
	'google-maps-api-v3',
	'https://maps.googleapis.com/maps/api/js?v=3.15&sensor=false&libraries=places&language=' . $query_params['language'],
	array(),
	'3.15',
	true
);
wp_enqueue_script(
	'fw-shortcode-map-script',
	get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/map/static/js/scripts.js',
	array('jquery', 'underscore', 'google-maps-api-v3'),
	fw()->manifest->get_version(),
	true
);