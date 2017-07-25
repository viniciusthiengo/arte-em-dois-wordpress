<?php


/** =============================================================================
 * CUSTOM STYLES
 * ============================================================================= */
function basic_customizer_css() {

	$style = '';


// ---- header -----
	$bgimg     = get_header_image();
	$bg_repeat = basic_get_theme_option( 'header_image_repeat' );

	if ( ! empty( $bgimg ) ) {
		$style .= "#header{background-image:url('$bgimg')}";
		$style .= "#header{background-repeat:$bg_repeat}";
	}

	$header_h   = get_custom_header()->height;
	$fit_height = basic_get_theme_option( 'fix_header_height' );
	if ( ! empty( $fit_height ) && ! empty( $header_h ) ) {
		$style .= "@media screen and (min-width:1024px){.sitetitle{height:{$header_h}px}}";
	}


	$header_textcolor = get_theme_mod( 'header_textcolor', false );
	if ( ! empty( $header_textcolor ) ) {
		$style .= apply_filters( 'basic_customizer_header_textcolor_css', "#logo{color:#$header_textcolor}" );
	}

	$main_color = basic_get_theme_option( 'maincolor' );
	if ( ! empty( $main_color ) && '#936' != $main_color && '#993366' != $main_color ) {

		$main_color_css = "a:hover,#logo,.bx-controls a:hover .fa{color:$main_color}";
		$main_color_css .= "a:hover{color:$main_color}";
		$main_color_css .= "blockquote,q,input:focus,textarea:focus,select:focus{border-color:$main_color}";
		$main_color_css .= "input[type=submit],input[type=button],button,.submit,.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,#mobile-menu,.top-menu,.top-menu .sub-menu,.top-menu .children,.more-link,.nav-links a:hover,.nav-links .current,#footer{background-color:$main_color}";

		$style .= apply_filters( 'basic_customizer_main_color_css', $main_color_css );
	}

	$style = apply_filters( 'basic_customizer_css', $style );

	if ( is_customize_preview() && empty($style) ){
		$style = 'body{}';
	}

	echo ( $style )
		? "<!-- BEGIN Customizer CSS -->\n<style type='text/css' id='basic-customizer-css'>$style</style>\n<!-- END Customizer CSS -->\n"
		: "";

}

add_action( 'wp_head', 'basic_customizer_css' );
/* ======================================================================== */


/* ======================================================================== *
 * Customizer functions
 * ======================================================================== */

// ------------------------
//function basic_sanitize_checkbox( $value ) {
//	$value = sanitize_key( $value );
//	if ( $value == 1 ) {
//		$value = 1;
//	} else {
//		$value = 0;
//	}
//	return sanitize_text_field( $value );
//}

// ------------------------
function basic_sanitize_text( $value ) {
	return sanitize_text_field( $value );
}


// ------------------------
function basic_sanitize_html( $value ) {
	return esc_html( $value );
}


// ------------------------
function basic_sanitize_textarea( $value ) {
	return esc_textarea( $value );
}


// ------------------------
function basic_is_single() {
	return is_single();
}

// ------------------------
function basic_is_page() {
	return is_page();
}

// ------------------------
function basic_is_singular() {
	return is_singular();
}

// ------------------------
function basic_is_default_layout() {
	return ! is_singular() && ! is_page() && ! is_home();
}


// ------------------------
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Basic_Group_Title_Control extends WP_Customize_Control {
		public function render_content() {
			echo ( ! empty( $this->label ) ) ? '<h2 style="margin:20px 0 3px">' . esc_html( $this->label ) . '</h2>' : '';
			echo ( ! empty( $this->description ) ) ? '<p class="description">' . esc_html( $this->description ) . '</p>' : '';
			echo '<hr />';
		}
	}
}
/* ======================================================================== */


/* ========================================================================
 *            script & styles for CUSTOMIZER 
 * ======================================================================== */
if ( ! function_exists( 'basic_customizer_live' ) ):
	function basic_customizer_live() {

		wp_enqueue_script(
			'basic-customizer-js',
			get_template_directory_uri() . '/inc/customizer/assets/customizer-preview.js', // URL
			array( 'jquery', 'customize-preview' ), null, true
		);
		wp_localize_script( 'basic-customizer-js', 'optname', BASIC_OPTION_NAME );

	}
endif;
add_action( 'customize_preview_init', 'basic_customizer_live' );
/* ======================================================================== */


