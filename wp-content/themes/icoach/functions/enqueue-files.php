<?php
/*
 * icoach Enqueue css and js files
 */
function icoach_enqueue() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap'.$suffix.'.css', array());
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome'.$suffix.'.css', array());
	wp_enqueue_style('google-font-poppins', '//fonts.googleapis.com/css?family=Poppins:500,300,600,700', array());
	wp_enqueue_style('icoach-main-style', get_template_directory_uri() .'/assets/css/default.css', array());
	wp_enqueue_style('animation', get_template_directory_uri() .'/assets/css/animate.css', array());
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_style('icoach-style', get_stylesheet_uri(), array());

	if (is_singular())
	    wp_enqueue_script("comment-reply");
	wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap'.$suffix.'.js',false, array('jquery'));
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',false, array('jquery'));
    wp_enqueue_script('icoach-script', get_template_directory_uri() . '/assets/js/icoach-custom.js',false, array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'icoach_enqueue' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function icoach_enqueue_custom_admin_style() {
        wp_register_style( 'custom_admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0.0' );
        wp_enqueue_style('iCoachProMainIconsAdmin', get_template_directory_uri() .'/assets/css/icons.css', array());
        wp_enqueue_style( 'custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'icoach_enqueue_custom_admin_style' );