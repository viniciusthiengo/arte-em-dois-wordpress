<?php
/**
 * EightyDays functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EightyDays
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eightydays_setup() {
	load_theme_textdomain( 'eightydays-lite', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'eightydays-related', 270, 168, true );
	add_image_size( 'eightydays-widget-thumb', 67, 67, true );
	add_image_size( 'eightydays-featured-big', 760, 474, true );
	add_image_size( 'eightydays-featured-small', 370, 232, true );
	set_post_thumbnail_size( 409, 255, true );

	// Enable support for meta title tag.
	add_theme_support( 'title-tag' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' );

	// Editor style.
	add_editor_style( array(
		eightydays_fonts_url(),
		get_template_directory_uri() . '/css/bootstrap.css',
		'css/editor-style.css',
	) );

	register_nav_menus( array(
		'primary'      => esc_html__( 'Primary Menu', 'eightydays-lite' ),
		'top_bar_left' => esc_html__( 'Top Bar Menu', 'eightydays-lite' ),
	) );
}
add_action( 'after_setup_theme', 'eightydays_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eightydays_content_width() {
	$GLOBALS['content_width'] = 870;
}
add_action( 'after_setup_theme', 'eightydays_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eightydays_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eightydays-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'eightydays-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div class="col-md-3 col-sm-6 widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'eightydays_widgets_init' );

/**
 * Custom functions for excerpt.
 */
require get_template_directory() . '/inc/excerpt.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom theme widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Custom media functions.
 */
require get_template_directory() . '/inc/media.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/dashboard.php';
$dashboard = new EightyDays_Dashboard;

/**
 * Load required plugins.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/plugins.php';
