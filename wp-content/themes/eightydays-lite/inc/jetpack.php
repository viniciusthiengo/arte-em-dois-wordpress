<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package EightyDays
 */

/**
 * Jetpack setup function.
 */
function eightydays_jetpack_setup() {
	// Social menu
	add_theme_support( 'jetpack-social-menu' );

	// Responsive videos
	add_theme_support( 'jetpack-responsive-videos' );

	// Featured content
	add_theme_support( 'featured-content', array(
		'filter'    => 'eightydays_get_featured_posts',
		'max_posts' => 3,
	) );
}
add_action( 'after_setup_theme', 'eightydays_jetpack_setup' );
