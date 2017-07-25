<?php
/*
Widget Name: Blog post widget
Description: This is widget to show latest post which combines with icoach.
Author: Indigo Themes
Author URI: http://indigothemes.com/
*/
class iCoachProBlogPostWidget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'blog-post-widget',
			__('iCoach Blog Post', 'icoach'),
			array(
				'description' => __('A blog section with slider.', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			),
			array(

			),
			$form_options = array(
			    'blogPost' => array(
			        'type' => 'posts',
			        'label' => __('Select posts query', 'icoach'),
			    ),
			    'blogPostLink' => array(
			        'type' => 'link',
			        'label' => __('Select Blog Page', 'icoach'),
			    ),
			),
			plugin_dir_path(__FILE__)
		);
	}
	function get_template_name($instance) {
		return 'blog-post-widget-template';
	}
	function get_style_name($instance) {
		return 'blog-post-widget-style';
	}
	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
			'blogPostText' => isset( $instance['blogPostText'] ) ? $instance['blogPostText'] : '',
		);
	}
}
siteorigin_widget_register('blog-post-widget', __FILE__, 'iCoachProBlogPostWidget');