<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function radiate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'radiate_page_menu_args' );

/**
 * Removing the default style of wordpress gallery
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Setting the comment section for pages and custom post type as off by default
 */
function radiate_default_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'radiate_default_comments_off' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function radiate_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// New Menu Design
	if ( get_theme_mod( 'radiate_new_menu_enable', '0' ) == 1) {
		$classes[] = 'full-width-menu';
	}

	// Better Responsive Menu Design
	if ( get_theme_mod( 'radiate_responsive_menu_style', '0' ) == 1) {
		$classes[] = 'better-responsive-menu';
	}

	return $classes;
}
add_filter( 'body_class', 'radiate_body_classes' );

add_action('wp_head', 'radiate_internal_css');
/**
 * Hooks the Custom Internal CSS to head section
 */
function radiate_internal_css() {
	if ( get_header_image() ) :
		$header_image_height = get_custom_header()->height;
		if ( is_user_logged_in() ) { $height = $header_image_height - 32; }
		else { $height = $header_image_height; }
		$heightsmall = $height - 68;

		$header = get_header_image();

		$header_image = "background-image: url('$header');";
		$header_repeat = " background-repeat: repeat-x;";
		$header_position = " background-position: center top;";
		$header_attachment = " background-attachment: scroll;";
		$header_image_style = $header_image . $header_repeat . $header_position . $header_attachment;
		?>
		<style type="text/css" id="custom-header-css">
		#parallax-bg { <?php echo trim( $header_image_style ); ?> } #masthead { margin-bottom: <?php echo $height; ?>px; }
		@media only screen and (max-width: 600px) { #masthead { margin-bottom: <?php echo $heightsmall; ?>px; }  }
		</style>
		<?php
	endif;

	if ( get_background_image() || get_background_color() ) :
		$image = get_background_image();
		$color = get_background_color();

		$style = $color ? "background-color: #$color;" : '#EAEAEA';

			if ( $image ) {
				$image = " background-image: url('$image');";

				$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
				if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
					$repeat = 'repeat';
				$repeat = " background-repeat: $repeat;";

				$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
				if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
					$position = 'left';
				$position = " background-position: top $position;";

				$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
				if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
					$attachment = 'scroll';
				$attachment = " background-attachment: $attachment;";

				$style .= $image . $repeat . $position . $attachment;
			}
		?>
		<style type="text/css" id="custom-background-css">
		body.custom-background { background: none !important; } #content { <?php echo trim( $style ); ?> }
		</style>
		<?php
	endif;
}

/**
 * Making the theme Woocommrece compatible
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_filter( 'woocommerce_show_page_title', '__return_false' );

add_action('woocommerce_before_main_content', 'radiate_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'radiate_wrapper_end', 10);

function radiate_wrapper_start() {
  echo '<div id="primary">';
}

function radiate_wrapper_end() {
  echo '</div>';
}

/**
 * Migrate any existing theme CSS codes added in Customize Options to the core option added in WordPress 4.7
 */
function radiate_custom_css_migrate() {

	if ( function_exists( 'wp_update_custom_css_post' ) ) {
		$custom_css = get_theme_mod( 'radiate_custom_css' );
		if ( $custom_css ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return = wp_update_custom_css_post( $core_css . $custom_css );
			if ( ! is_wp_error( $return ) ) {
				// Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
				remove_theme_mod( 'radiate_custom_css' );
			}
		}
	}

}
add_action( 'after_setup_theme', 'radiate_custom_css_migrate' );
