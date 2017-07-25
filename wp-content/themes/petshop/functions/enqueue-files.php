<?php
/*
 * Enqueue css and js files
 */
function PetShopEnqueue() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array());
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array());
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array());
	wp_enqueue_style('petShopFontPoppins', '//family=Raleway:400,400i,500,500i,600,600i,700,700i', array());
	wp_enqueue_style('petShopDefault', get_template_directory_uri() .'/assets/css/default.css', array());
	wp_enqueue_style('petShopStyle', get_stylesheet_uri(), array());

	if (is_singular())
	    wp_enqueue_script("comment-reply");
	    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',false, array('jquery'));
	    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js',false, array('jquery'));
	    wp_enqueue_script('petShopScript', get_template_directory_uri() . '/assets/js/script.js',false, array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'PetShopEnqueue' );