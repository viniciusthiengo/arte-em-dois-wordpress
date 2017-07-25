<?php
/*
 * Enqueue css and js files
 */
function stylic_enqueue() {
	$stylic_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap'.$stylic_suffix.'.css', array());
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome'.$stylic_suffix.'.css', array());
	wp_enqueue_style('font-poppins', '//fonts.googleapis.com/css?family=Work+Sans:400,500,600,300', array());
	wp_enqueue_style('stylic-default', get_template_directory_uri() .'/assets/css/default.css', array());
	wp_enqueue_style('stylic-theme', get_template_directory_uri() .'/assets/css/theme.css', array());
	wp_enqueue_style('animate', get_template_directory_uri() .'/assets/css/animate.css', array());
	wp_enqueue_style('stylic-style', get_stylesheet_uri(), array());

	if (is_singular())
	    wp_enqueue_script("comment-reply");
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap'.$stylic_suffix.'.js',array('jquery'),false);
    wp_enqueue_script('stylic-script', get_template_directory_uri() . '/assets/js/script.js',array('jquery'),false);
}
add_action( 'wp_enqueue_scripts', 'stylic_enqueue' );