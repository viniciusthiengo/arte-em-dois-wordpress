<?php
/**
 * Breviter theme functions and definitions
 *
 */

/* Set content width */
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

if( ! function_exists( 'breviter_theme_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function breviter_theme_setup() {
	/* Allow theme for translations */
	load_theme_textdomain( 'breviter', get_template_directory() . '/languages' );

	/* Add posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Automatic <title> tag in the head */
	add_theme_support( 'title-tag' );

	/* Enable post thumbnails */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 400, true );

	/* Enable custom backgrounds */
	$args = array(
		'default-image'			=> get_template_directory_uri() . '/assets/pattern.jpg'	,
		'default-attachment'	=> 'fixed',
	);
	add_theme_support( 'custom-background', $args );

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

	/* Register menu locations */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'breviter' )
	) );

	/* Allow HTML5 support in forms */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/* Enable post formats */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'quote', 'gallery', 'audio'
	) );

	/* Enable post formats */
	add_theme_support( 'custom-logo' );
}
endif; // breviter_theme_setup
add_action( 'after_setup_theme', 'breviter_theme_setup' );

if( ! function_exists( 'berviter_editor_styles' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function breviter_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
endif;
add_action( 'admin_init', 'breviter_editor_styles' );

if ( ! function_exists( 'breviter_fonts_url' ) ) :
/**
 * Register Google Fonts
 */
function breviter_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Montserrat, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'breviter' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Droid Serif font: on or off', 'breviter' ) ) {
		$fonts[] = 'Droid Serif:400,700';
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

function breviter_enqueue() {
	/* Load Google fonts */
	wp_enqueue_style( 'breviter-fonts', breviter_fonts_url(), array(), null );

	/* Load main styles*/
	wp_register_style( 'breviter-icons', get_template_directory_uri() . '/css/icomoon.css', '', array(), null );
	wp_enqueue_style( 'breviter-style', get_stylesheet_uri(), array( 'breviter-icons' ), array(), null );

	/* Load main JS file */
	$breviter_vendors = array(
		'breviter-modernizr'	 => '/js/vendors/modernizr.js',
		'breviter-instagram'	 => '/js/vendors/instagram.js',
		'breviter-slick' 		 =>	'/js/vendors/slick.js',
		'breviter-theia' 	 	 => '/js/vendors/theia.js'
	);
	foreach( $breviter_vendors as $script_key => $script_path ) {
		wp_register_script( $script_key, get_template_directory_uri() . $script_path, '', array(), true );
	}
	$breviter_vendors_keys = array_keys( $breviter_vendors );
	array_push( $breviter_vendors_keys, 'jquery' );
	wp_enqueue_script( 'breviter-js', get_template_directory_uri() . '/js/breviter.js'
		, $breviter_vendors_keys, array(), true );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Send data to js */
	wp_localize_script( 'breviter-js', 'dhData',
            array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	/* Custom CSS */
	$custom_css = get_theme_mod('header_textcolor') !== 'blank' 
		? '.header-area h2 a { color: #' . 
			get_theme_mod('header_textcolor') . ' !important;}' : '';
	wp_add_inline_style( 'breviter-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'breviter_enqueue' );

function breviter_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'breviter' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'breviter' ),
		'before_widget' => '<div id="%1$s" class="widget box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title"><span class="text-wrapper">',
		'after_title'   => '</span></h5>',
	));
}
add_action( 'widgets_init', 'breviter_sidebars' );


function breviter_customizer_scripts( $hook ) {  // TO DO : Iclude customizer stuff only on cuztomize.php
	/* Load custom customizer styles*/
	wp_enqueue_style( 'breviter-customizer-icons', get_template_directory_uri() . '/css/icomoon.css' );
	wp_enqueue_style( 'breviter-customizer-style', get_template_directory_uri() . '/css/admin/customizer.css' );

	/* Load custom customizer script*/
	wp_enqueue_script( 'breviter-customizer-js',  get_template_directory_uri() . '/js/admin/customizer.js', array(), false, true );		
}
add_action( 'customize_controls_enqueue_scripts', 'breviter_customizer_scripts' );

/**
 *	Helper functions
 */

/* Pass data into a template */
function breviter_template( $name = null, array $params = array(), $folder = false ) {
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

function breviter_get_template( $name = null, array $params = array(), $folder = false ) {
	ob_start();
		breviter_template( $name, $params, $folder );
	return ob_get_clean();
}

if( ! function_exists( 'breviter_menu_callback' ) ):
/**
 *	Menu callback
 */
function breviter_menu_callback( $class = '' ) {
    $settings = array(
		'echo'			=> 0,
		'include'		=> '',
		'post_type'		=> 'page',
		'post_status'	=> 'publish',
		'title_li'		=> ''
	);

    return sprintf( '<ul class="%s">%s</ul>', esc_attr( $class['menu_class'] ), wp_list_pages( $settings ) );
}
endif;

if( ! function_exists( 'breviter_build_header' ) ):
/**
 *	Generate Header
 */	
function breviter_build_header() {
	$options = get_theme_mod( 'breviter_header_layout' );
	$layout = ! empty( $options['layout'] ) ? $options['layout'] : 'one';
	
	$logo = function_exists( 'get_custom_logo' ) && has_custom_logo()
		? get_custom_logo()
		: sprintf( '<h2><a class="text-alpha" href="%s" rel="home">%s</a></h2>'
			, esc_url( home_url( '/' ) )
			, esc_attr( get_bloginfo( 'name' ) ) );

	$logo .= get_theme_mod('header_textcolor') !== 'blank' 
		? sprintf( '<h3 class="site-description">%s</h3>', esc_attr( get_bloginfo( 'description' ) ) )
		: '';

	$menu_settings =array(
		'theme_location' => 'primary',
		'fallback_cb'	 => 'breviter_menu_callback',
		'menu_class'	 => 'clean-list',
		'items_wrap'	 => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'container'		 => false,
		'echo'			 => false
	);

	$data = array(
		'logo'	 => $logo,
		'menu'	 => wp_nav_menu( $menu_settings ),
		'meta'	 => ! empty( $options['meta'] ) ? $options['meta'] : '',
		'social' => ! empty( $options['social'] ) ? (array) json_decode( $options['social'] ) : ''
	);

	breviter_template( 'header-one', $data, 'header' );
}
endif;
add_action( 'breviter_header', 'breviter_build_header' );

if( ! function_exists( 'breviter_build_footer' ) ):
/**
 *	Generate Fooetr
 */	
function breviter_build_footer() {
	$options = get_theme_mod( 'breviter_footer_layout' );
	$layout = ! empty( $options['layout'] ) ? $options['layout'] : 'one';
	$logo_pat = '<a href="%s" rel="home"><img src="%s" alt="%s"></a>';
	$logo = ! empty( $options['logo'] ) ? $options['logo'] : '';

	$data = array(
		'logo' => ! empty( $logo ) ? sprintf( $logo_pat, esc_url( home_url( '/' ) ), esc_url( $logo ), get_bloginfo( 'name' ) ) : '',
		'info' => ! empty( $options['info'] ) ? $options['info'] : '',
		'instagram_title' => ! empty( $options['instagram_title'] ) ? $options['instagram_title'] : '',
		'instagram_id' => ! empty( $options['instagram_id'] ) ? $options['instagram_id'] : ''
	);

	breviter_template( 'footer-one', $data, 'footer' );
}

endif;
add_action( 'breviter_footer', 'breviter_build_footer' );

function breviter_search_form( $html ) {
	return sprintf( '<form role="search" method="get" class="main-search-form" action="%s">
		<input type="search" class="search-input check-value" placeholder="%s" value="%s" name="s" title="%s">
				<button class="search-submit"><i class="icon-search"></i></button></form>', esc_url( home_url( '/' ) ),
				__( 'Search', 'breviter' ), get_search_query(), __( 'Search for:', 'breviter' ) );
}
add_filter( 'get_search_form', 'breviter_search_form' );

if( !function_exists( 'breviter_excerpt_more' ) ):
/**
 *	Create custom excerpt read more button
 */	

function breviter_excerpt_more( $excerpt ) {
	return $excerpt; 
}

endif;
add_filter( 'the_excerpt', 'breviter_excerpt_more' );

if( !function_exists( 'breviter_more_link' ) ):
/**
 * Create custom read more button for posts
 */

function breviter_more_link( $link ) {
	return;
}
endif;
add_filter( 'the_content_more_link', 'breviter_more_link' );

if( !function_exists( 'breviter_get_meta_title' ) ):
/**
 *	Create custom excerpt read more button
 */	

function breviter_get_meta_title() {
	$patt = '<div class="box archive-box"><p>%s</p></div>';

	if( is_archive() ) {
		return sprintf( $patt, str_replace( ':', ': <span>', get_the_archive_title() ) . '</span>' );
	} else if( is_search() ) {
		return sprintf( $patt, esc_html__( 'You looking for: ', 'breviter' ) . '<span>' . get_search_query() . '</span>' );
	}
}
endif;

/**
 * Helper function get option from customizer
 * @param  [string] $panel [panel name]
 * @param  [string] $field [field name]
 * @return [mixed]        [return option from customizer]
 */
function breviter_option( $panel = null, $field = null ) {
	switch ($panel) {
		case 'content':
			$panel = 'breviter_content_frontpage';
		break;

		case 'general':
			$panel = 'breviter_general_loader';
		break;
		
		default:
			return;
		break;
	}
	$option = get_theme_mod( $panel, null );

	return !empty( $option[ $field ] ) ? $option[ $field ] : null;
}

function breviter_get_post( $post_type ) {
	$posts = get_posts( array(
		'post_per_page' => -1,
		'post_type' 	=> $post_type,
		'post_status'	=> 'publish'
	) );
	$sliders = array();
	$sliders[] = __( '--Select item--', 'breviter' );
	if( !empty( $posts ) ) {
		foreach ($posts as $key => $post) {
			$sliders[ $post->ID ] = get_the_title( $post->ID );
		}
	}
	return $sliders;
}

function breviter_content_size_filter( $content_size ) {
	$content_arr = array($content_size);
	if( breviter_option( 'content', 'sidebar_position' ) ) {
		array_push(  $content_arr, 'col-md-push-4' );
	}

	return implode( ' ', $content_arr );
}
add_filter( 'breviter_content_size', 'breviter_content_size_filter' );

function breviter_loader() {
	if( breviter_option( 'general', 'loader' ) ) {
		printf( '<div class="main-site-preloader" id="site-preloader">
			<div class="preloader-content"><img src="%s" alt="%s"><div class="loading-box">
               <span class="progress-bar"></span></div></div></div>'
               , breviter_option( 'general', 'loader' ), esc_html__( 'Breviter preloader image', 'breviter' ) );
	}

}
add_action( 'wp_footer', 'breviter_loader' );
/**
 *	Include Customizer options
 */
require get_template_directory() . '/inc/customizer-controls.php';
require get_template_directory() . '/inc/customizer.php';