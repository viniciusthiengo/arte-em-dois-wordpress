<?php
/*
Widget Name: Blog post
Description: This is widget to show latest post which combines with PetShop.
Author: Indigo Themes
Author URI: http://indigothemes.com/
*/
class petshop_blog_post extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'blog-post',
			__('PetShop Blog Post', 'petshop'),
			array(
				'description' => __('A blog section which shows latest three posts.', 'petshop'),
				'panels_icon' => 'dashicons widget-icon',
				'panels_groups' => array('petshop_group')
			),
			array(

			),
			$form_options = array(
			),
			plugin_dir_path(__FILE__)
		);
	}
	function get_template_name($instance) {
		return 'template';
	}
	function get_style_name($instance) {
		return 'style';
	}
	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
		);
	}
}
siteorigin_widget_register('blog-post', __FILE__, 'petshop_blog_post');