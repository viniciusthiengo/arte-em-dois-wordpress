<?php
/*
Widget Name: Contact widget
Description: This is widget to show latest post which combines with icoach.
Author: Indigo Themes
Author URI: http://indigothemes.com/
*/
class iCoachProContactWidget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'contact-widget',
			__('iCoach Contact', 'icoach'),
			array(
				'description' => __('A widget for simple contact form for your user to get hold of you(exclusive for contact form 7).', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			),
			array(

			),
			$form_options = array(
				'contactForm' => array(
			        'type' => 'text',
			        'label' => __( 'Enter Shortcode', 'icoach'),
				),
				'contactFormStyle' => array(
			        'type' => 'select',
			        'label' => __( 'Select Style', 'icoach'),
			        'default' => 'Select',
			        'options' => array(
			        	'darkForm' => 'Light',
			        	'lightForm' => 'Dark',
			        )
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	function get_template_name($instance) {
		return 'contact-widget-template';
	}

	function get_style_name($instance) {
	}
	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
			'blogPostText' => isset( $instance['blogPostText'] ) ? $instance['blogPostText'] : '',
		);
	}
}
siteorigin_widget_register('contact-widget', __FILE__, 'iCoachProContactWidget');