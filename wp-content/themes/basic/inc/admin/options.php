<?php

if ( ! defined( 'BASIC_APP_NAME' ) ) {
	$theme_name = sanitize_key( '' . wp_get_theme() );
	define( 'BASIC_APP_NAME', $theme_name );
}

if ( ! defined( 'BASIC_THEME_URI' ) ) {
	define( 'BASIC_THEME_URI', 'https://wp-puzzle.com/' );
}

define( 'BASIC_OPTION_NAME', 'basic_theme_options_' . BASIC_APP_NAME );


/* ==========================================================================
* 	customize get_option for theme options
* ========================================================================== */
if ( ! function_exists( 'basic_get_theme_option' ) ) :
	function basic_get_theme_option( $key, $default = false ) {

		$cache = wp_cache_get( BASIC_OPTION_NAME );
		if ( $cache ) {
			return ( isset( $cache[ $key ] ) ) ? $cache[ $key ] : $default;
		}

		$opt = get_option( BASIC_OPTION_NAME );

		wp_cache_add( BASIC_OPTION_NAME, $opt );

		return ( isset( $opt[ $key ] ) ) ? $opt[ $key ] : $default;
	}
endif;
/* ============================================================================= */


/* ==========================================================================
* 	customize get_option for theme options
* ========================================================================== */
function basic_backward_compatible_theme_option_name() {

	$old_option_name = 'theme_options_' . get_template();
	$old_option      = get_option( $old_option_name );

	if ( false == $old_option ) {
		return;
	}

	delete_option( BASIC_OPTION_NAME );
	update_option( BASIC_OPTION_NAME, $old_option );

	delete_option( $old_option_name );

}

add_action( 'init', 'basic_backward_compatible_theme_option_name' );
/* ============================================================================= */

