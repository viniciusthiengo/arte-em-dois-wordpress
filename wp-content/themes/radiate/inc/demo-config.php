<?php
/**
 * Functions for configuring demo importer.
 *
 * @author   ThemeGrill
 * @category Admin
 * @package  Importer/Functions
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup demo importer packages.
 *
 * @param  array $packages
 * @return array
 */
function radiate_demo_importer_packages( $packages ) {
	$new_packages = array(
		'radiate-free' => array(
			'name'    => esc_html__( 'Radiate', 'radiate' ),
			'preview' => 'https://demo.themegrill.com/radiate/',
		),
	);

	return array_merge( $new_packages, $packages );
}
add_filter( 'themegrill_demo_importer_packages', 'radiate_demo_importer_packages' );
