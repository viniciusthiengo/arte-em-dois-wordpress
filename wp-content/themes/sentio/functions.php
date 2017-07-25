<?php
/**
 * Sentio theme functions and definitions
 *
 */

/* Set content width */
if ( ! isset( $content_width ) ) {
	$content_width = 645;
}

if( !function_exists( 'sentio_theme_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sentio_theme_setup() {
	/* Allow theme for translations */
	load_theme_textdomain( 'sentio', get_template_directory() . '/languages' );

	/* Add posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Automatic <title> tag in the head */
	add_theme_support( 'title-tag' );

	/* Enable post thumbnails */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 745, 400, true );

	/* Enable custom header */
	$args = array(
		'default-image'          => '',
		'random-default'         => true,
		'flex-height'            => true,
		'flex-width'             => true,
		'height'            	 => 650,
		'width'             	 => 1980,
		'default-text-color'     => '#ffffff',
		'header-text'            => true,
		'uploads'                => true,
	);
	add_theme_support( "custom-header", $args );

	/* Enable custom backgrounds */
	$args = array(
		'default-color'          => '#eeefef',
	);
	add_theme_support( 'custom-background', $args );

	/* Register menu locations */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sentio' )
	) );

	/* Allow HTML5 support in forms */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/* Enable post formats */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}
endif; // sentio_theme_setup
add_action( 'after_setup_theme', 'sentio_theme_setup' );

if( !function_exists( 'sentio_editor_styles' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sentio_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
endif;
add_action( 'admin_init', 'sentio_editor_styles' );

if ( ! function_exists( 'sentio_fonts_url' ) ) :
/**
 * Register Google Fonts
 */
function sentio_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Quattrocento, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Quattrocento font: on or off', 'sentio' ) ) {
		$fonts[] = 'Quattrocento:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Quattrocento Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Quattrocento Sans font: on or off', 'sentio' ) ) {
		$fonts[] = 'Quattrocento Sans:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

function sentio_scripts() {
	/* Load Google fonts */
	wp_enqueue_style( 'sentio-fonts', sentio_fonts_url(), array(), null );

	/* Load main styles*/
	wp_enqueue_style( 'sentio-style', get_stylesheet_uri(), '', array(), null );

	/* Load main JS file */
	wp_enqueue_script( 'sentio-js', get_template_directory_uri() . '/js/sentio.js', array( 'jquery' ), rand(0, 100), true );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Send data to js */
	wp_localize_script( 'sentio-js', 'dhData',
            array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	/* CUstom CSS */
	$custom_css = get_theme_mod('header_textcolor') !== 'blank' ? '.hero-message * { color: #' . 
		get_theme_mod('header_textcolor') . ' !important;}' : '';
	wp_add_inline_style('sentio-style', $custom_css);
}
add_action( 'wp_enqueue_scripts', 'sentio_scripts' );

function sentio_sidebars() {
	register_sidebar(array(
		'name'          => __( 'Widget Area', 'sentio' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'sentio' ),
		'before_widget' => '<div id="%1$s" class="dh-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title text-delta">',
		'after_title'   => '</h4>',
	));

}
add_action( 'widgets_init', 'sentio_sidebars' );


function sentio_customizer_scripts( $hook ) {  // TO DO : Iclude customizer stuff only on cuztomize.php
	/* Load custom customizer styles*/
	wp_enqueue_style( 'sentio-customizer-style', get_template_directory_uri() . '/css/admin/customizer.css' );

	/* Load custom customizer script*/
	wp_enqueue_script( 'sentio-customizer-js',  get_template_directory_uri() . '/js/admin/customizer.js', array(), false, true );		
}
add_action( 'customize_controls_enqueue_scripts', 'sentio_customizer_scripts' );

/**
 *	Helper functions
 */

/* Pass data into a template */
function sentio_template( $name = null, array $params = array(), $folder = false ) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    $templates = array();
    if( isset($name )) {
        $template_container = isset( $folder ) ? 'templates/'.$folder : 'templates';
        $templates[] = $template_container."/{$name}.php";
    }

    $_template_file = locate_template( $templates, false, false );

    if(!empty( $_template_file )) {
	    if( is_array( $wp_query->query_vars ) ) {
	        extract( $wp_query->query_vars, EXTR_SKIP );
	    }
	    extract( $params, EXTR_SKIP );

	    require( $_template_file );
    }
}

function sentio_get_template( $name = null, array $params = array(), $folder = false ) {
	ob_start();
		sentio_template( $name, $params, $folder );
	return ob_get_clean();
}

function sentio_icons_hex( $index ) {
	$icons = array(
		'Facebook' => '&#xf231;',
		'Twitter' => '&#xf243;',
		'Google' => '&#xf235;',
		'Linkedin' => '&#xf239;',
		'YouTube' => '&#xf24d;',
		'GitHub' => '&#xf233;',
		'Instagram' => '&#xf350;',
		'Dribbble' => '&#xf22c;',
		'Skype' => '&#xf23f;'
	);

	return array_key_exists( $index, $icons ) ? $icons[$index] : '';
}

function sentio_social( $array ) {
	if( is_array( $array ) ) {
		$items = '';

		foreach ($array as $key => $value) {
			$items .= sprintf( '<li><a href="%s"><i data-icon="%s"></i></a></li>', 
				!empty(  $value->url ) ? esc_url( $value->url ) : '', 
				!empty( $value->icon ) ? esc_attr( sentio_icons_hex( $value->icon ) ) : '' );
		}

		return sprintf( '<ul class="inline-list">%s</ul>', $items );
	}
}

if( !function_exists( 'sentio_menu_callback' ) ):
/**
 *	Menu callback
 */
function sentio_menu_callback( $class = '' ) {
    $defaults = array(
                'authors'      => '',
                'child_of'     => 0,
                'date_format'  => get_option('date_format'),
                'depth'        => 0,
                'echo'         => 0,
                'exclude'      => '',
                'include'      => '',
                'link_after'   => '',
                'link_before'  => '',
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'show_date'    => '',
                'sort_column'  => 'menu_order, post_title',
                'title_li'     => '', 
                'walker'       => '' 
        );

    return sprintf('<ul class="%1$s">%2$s</ul>', esc_attr( $class['menu_class'] ), wp_list_pages($defaults));
}
endif;

if( !function_exists( 'sentio_header' ) ):
/**
 *	Init action for custom header
 */
function sentio_header() {
	do_action( 'sentio_header' );
}
endif;

if( !function_exists( 'sentio_footer' ) ):
/**
 *	Init action for custom footer
 */
function sentio_footer() {
	do_action( 'sentio_footer' );
}
endif;

if( !function_exists( 'sentio_build_header' ) ):
/**
 *	Generate Header
 */	
function sentio_build_header() {
	$options = get_theme_mod('sentio_header_layout');
	$layout = !empty( $options['layout'] ) ? $options['layout'] : 'one';

	$logo_pat = !empty( $options['logo'] ) ? '<a href="%s" rel="home"><img src="%s" alt="%s"></a>' :
		'<h2><a class="text-alpha" href="%s" rel="home">%s</a></h2>';
	$logo = !empty( $options['logo'] ) ? esc_url( $options['logo'] ) : 
		(!empty( $options['logo_text'] ) ? $options['logo_text'] : get_bloginfo('name') );
	$logo_moto = get_bloginfo('description') ? sprintf( '<h4 class="text-delta">%s</h4>', get_bloginfo('description') ) : '';

	$menu_settings =array(
		'theme_location'	=> 'primary',
		'container'			=> false,
		'fallback_cb'		=> 'sentio_menu_callback',
		'menu_class'		=> 'inline-list',
		'echo'				=> false,
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'				=> 0
	);

	$meta = !empty( $options['meta'] ) ? $options['meta'] : '';
	$social = !empty( $options['social'] ) ? json_decode($options['social']) : '';

	$data = array(
		'logo' => sprintf( $logo_pat, esc_url( home_url( '/' ) ), $logo, esc_attr( get_bloginfo( 'name' ) ) ) . $logo_moto,
		'menu' => wp_nav_menu($menu_settings),
		'meta' => $meta,
		'social' => sentio_social( $social )
	);
	sentio_template( 'header-' . $layout, $data, 'header' );
}

endif;
add_action( 'sentio_header', 'sentio_build_header' );

if( !function_exists( 'sentio_build_footer' ) ):
/**
 *	Generate Fooetr
 */	
function sentio_build_footer() {
	$options = get_theme_mod('sentio_footer_layout');
	$layout = !empty( $options['layout'] ) ? $options['layout'] : 'one';

	$logo_pat = '<a href="%s" rel="home"><img src="%s" alt="%s"></a>';
	$logo = !empty( $options['logo'] ) ? $options['logo'] : '';


	$data = array(
		'logo' => !empty( $logo ) ? sprintf( $logo_pat, esc_url( home_url( '/' ) ), esc_url( $logo ), get_bloginfo( 'name' ) ) : '',
		'info' => !empty( $options['info'] ) ? $options['info'] : ''
	);

	sentio_template( 'footer-' . $layout, $data, 'footer' );
}

endif;
add_action( 'sentio_footer', 'sentio_build_footer' );

function sentio_search_form( $html ) {
	return sprintf( '<form role="search" method="get" class="search-form" action="%s">
		<input type="search" class="search-field" placeholder="%s" value="%s" name="s" title="%s">
				<button class="search-submit">&#xf4a4;</button></form>', esc_url( home_url( '/' ) ),
				__( 'Search', 'sentio' ), get_search_query(), __( 'Search for:', 'sentio' ) );
}
add_filter( 'get_search_form', 'sentio_search_form' );

if( !function_exists( 'custom_excerpt_more' ) ):
/**
 *	Create custom excerpt read more button
 */	

function custom_excerpt_more( $more ) {
	return $more . ' <a class="more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' .
		 __( 'Keep reading', 'sentio' ) . '</a>';
}

endif;
add_filter( 'the_excerpt', 'custom_excerpt_more' );

if( !function_exists( 'sentio_get_meta_title' ) ):
/**
 *	Create custom excerpt read more button
 */	

function sentio_get_meta_title() {
	$patt = '<div class="bg-white text-center text-uppercase meta-title"><h2 class="text-gamma">%s</h2></div>';

	if( is_archive() ) {
		return sprintf( $patt, get_the_archive_title() );
	} else if( is_search() ) {
		return sprintf( $patt, get_search_query() );
	}	
}
endif;

/**
 *	Include Customizer options
 */

require get_template_directory() . '/inc/customizer-controls.php';
require get_template_directory() . '/inc/customizer.php';