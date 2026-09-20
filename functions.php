<?php

/**
 * Unstruction CP functions and definitions.
 *
 * @package Unstruction CP
 */

add_theme_support('title-tag');

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function unstruction_cp_enqueue_styles_scripts()
{
	wp_enqueue_style(
		'shoelace-style',
		get_parent_theme_file_uri('assets/shoelace/shoelace.min.css'),
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_style(
		'unstruction-cp-style',
		get_stylesheet_uri(),
		array('shoelace-style'),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'shoelace-script',
		get_theme_file_uri('assets/shoelace/shoelace.js'),
		[],
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'unstruction-cp-script',
		get_theme_file_uri('assets/js/script.js'),
		[],
		wp_get_theme()->get('Version'),
		true
	);

	$date_time = get_theme_mod('unstruction_cp_date_time', '2100-01-01T00:00');

	$data = array(
		'dateTime' => esc_html($date_time),
	);
	wp_add_inline_script('unstruction-cp-script', 'const dateTimeData = ' . wp_json_encode($data) . ';', 'before');
}

add_action('wp_enqueue_scripts', 'unstruction_cp_enqueue_styles_scripts');

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';
