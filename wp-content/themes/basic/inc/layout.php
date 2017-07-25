<?php


/* set custom body classes
 * ========================================================================== */
if ( ! function_exists( 'basic_set_body_class' ) ) :
	function basic_set_body_class( $classes ) {

		// page layout
		$classes[] = 'layout-' . basic_get_layout();

		return $classes;
	}
endif;
add_filter( 'body_class', 'basic_set_body_class' );
/* ========================================================================== */


/* set page layout
 * ========================================================================== */
if ( ! function_exists( 'basic_get_layout' ) ) :
	function basic_get_layout() {
		global $post;

		$layout = 'rightbar';

		$layout_def  = basic_get_theme_option( 'layout_default' );
		$layout_home = basic_get_theme_option( 'layout_home' );
		$layout_post = basic_get_theme_option( 'layout_post' );
		$layout_page = basic_get_theme_option( 'layout_page' );
		$layout_page = ( ! empty( $layout_page ) ) ? $layout_page : 'center';

		// get custom page layout
		if ( is_singular() ) {
			$custom = get_post_meta( $post->ID, 'basic_page_layout', true );
			if ( '' == $custom || 'default' == $custom ) {
				unset( $custom );
			}
		}

		// get settings for 'post' layout
		if ( is_single() && isset( $layout_post ) ) {
			$layout = ( isset( $custom ) )
				? $custom
				: $layout_post;
		}

		// get settings for 'page' layout
		elseif ( is_page() && isset( $layout_page ) ) {
			// other static pages
			$layout = ( isset( $custom ) )
				? $custom
				: $layout_page;
		}

		// get home layout settings
		elseif ( is_home() && $layout_home ) {
			$layout = $layout_home;
		}

		// woocommerce shop
		elseif ( function_exists( 'is_shop' ) && is_shop() ) {
			$layout = get_theme_mod( 'layout_shop', 'center' );
		}

		// get default layout settings
		elseif ( $layout_def ) {
			$layout = $layout_def;
			if ( is_search() ) {
				$layout = get_theme_mod( 'layout_search', 'center' );
			}
		}

		return $layout;
	}
endif;
/* ========================================================================== */


/* set custom posts classes
 * ========================================================================== */
if ( ! function_exists( 'basic_set_post_class' ) ) :
	function basic_set_post_class( $classes ) {
//		global $post;

//		$classes[] = 'post post-' . $post->ID;

		if ( ! is_singular() && 'post' == get_post_type() ) {
			$classes[] = 'anons';
		}

		if ( is_search() ) {
			$classes[] = 'serp';
		}

//		if ( in_array( 'sticky', $default_classes ) ) {
//			$classes[] = 'sticky';
//		}

//		return $default_classes;
		return $classes;
	}
endif;
add_filter( 'post_class', 'basic_set_post_class' );
/* ========================================================================== */


/* clear nav menu classes
 * ========================================================================== */
/*
 * if ( ! function_exists( 'basic_set_nav_menu_class' ) ) :
	function basic_set_nav_menu_class( $classes ) {

		$custom_classes = array();

		foreach ( $classes as $class ) {
			if ( $class == 'menu-item' || 'current-menu-item' == $class ) {
				$custom_classes[] = $class;
			}
			if ( 'menu-item-has-children' == $class ) {
				$custom_classes[] = $class;
			}
		}

		return $custom_classes;
	}
endif;
add_filter( 'nav_menu_css_class', 'basic_set_nav_menu_class' );
*/
/* ========================================================================== */


/* exclude link to current page IN CATEGORIES list
 * ========================================================================== */
function basic_no_link_current_category( $output ) {
	return preg_replace( '%((current-cat)[^<]+)[^>]+>([^<]+)</a>%', '$1<span>$3</span>', $output, 1 );
}

add_filter( 'wp_list_categories', 'basic_no_link_current_category' );


/* exclude link to current page IN MENU
 * ========================================================================== */
function basic_no_link_current_page( $output ) {
	return preg_replace( '%((current_page_item|current-menu-item)[^<]+)[^>]+>([^<]+)</a>%', '$1<span>$3</span>', $output, 1 );
}

add_filter( 'wp_nav_menu', 'basic_no_link_current_page' );
/* ========================================================================== */


/* set default setting for galleries
 * ========================================================================== */
if ( ! function_exists( 'basic_set_gallery_defaults' ) ) :
	function basic_set_gallery_defaults( $attr ) {

		$attr['itemtag']    = 'div';
		$attr['icontag']    = 'div';
		$attr['captiontag'] = 'p';

		return $attr;
	}
endif;
add_filter( 'shortcode_atts_gallery', 'basic_set_gallery_defaults' );
/* ========================================================================== */
