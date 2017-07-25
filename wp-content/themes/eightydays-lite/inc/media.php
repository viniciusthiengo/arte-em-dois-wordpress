<?php
add_action( 'wp_enqueue_scripts', 'eightydays_enqueue_scripts' );

/**
 * Enqueue scripts and styles
 */
function eightydays_enqueue_scripts() {
	// Stylesheets
	wp_enqueue_style( 'eightydays-fonts', eightydays_fonts_url() );

	// Customized bootstrap for the theme.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '3.3.5' );

	// Theme style
	wp_enqueue_style( 'eightydays-lite', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'eightydays-lite', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );

	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Get Google fonts URL for the theme.
 * @return string Google fonts URL for the theme.
 */
function eightydays_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'eightydays-lite' ) ) {
		$fonts[] = 'Lato:400,700,400italic,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'eightydays-lite' ) ) {
		$fonts[] = 'Poppins:300,600';
	}

	$fonts_url = add_query_arg( array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return esc_url( $fonts_url );
}

add_filter( 'post_class', 'eightydays_post_class' );

/**
 * Add class for posts with no thumbnails
 *
 * @param array $class
 *
 * @return array
 */
function eightydays_post_class( $class ) {
	if ( ! is_singular() && 'post' == get_post_type() ) {
		$class[] = 'col-sm-6';
	}

	return $class;
}