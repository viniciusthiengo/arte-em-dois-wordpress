<?php
/*
Widget Name: Image Showcase Widget
Description: This is widget to show latest post which combines with iCoach.
Author: Indigo Themes
Author URI: http://indigothemes.com/
*/
class iCoachProImageShowcaseWidget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'image-showcase-widget',
			__('iCoach Image Gallery', 'icoach'),
			array(
				'description' => __('A widget to create gallery for images.', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachProGroup')
			),
			array(

			),
			$form_options = array(
				'showcase' => array(
			        'type' => 'repeater',
			        'label' => __( 'Showcase Images' , 'icoach' ),
			        'item_name'  => __( 'Image', 'icoach' ),
			        'fields' => array(
			            'image' => array(
					        'type' => 'media',
					        'label' => __( 'Choose a media thing', 'icoach' ),
					        'choose' => __( 'Choose image', 'icoach' ),
					        'update' => __( 'Set image', 'icoach' ),
					        'library' => 'image',
					        'fallback' => false
					    ),
					    'button' => array(
					    	'type' => 'select',
					    	'default' => '1',
					    	'label' => __('Hide Button', 'icoach'),
					    	'options' => array(
					    		'hidden' => __('Hide','icoach'),
					    		'0' => __('Show','icoach'),
					    	),
					    	'state_emitter' => array(
								'callback' => 'select',
								'args'     => array( 'buttonHide' )
							),
					    ),
					    'buttonText' => array(
					    	'type' => 'text',
					        'label' => __('Button Text', 'icoach'),
					        'state_handler' => array(
								'buttonHide[0]' => array( 'show' ),
								'buttonHide[hidden]' => array( 'hide' ),
							),
					    ),
					    'buttonLink' => array(
					        'type' => 'link',
					        'label' => __('Select Blog Page', 'icoach'),
					        'state_handler' => array(
								'buttonHide[0]' => array( 'show' ),
								'buttonHide[hidden]' => array( 'hide' ),
							),
					    ),
					    'popup' => array(
					    	'type' => 'checkbox',
					    	'label' => __('Open in popup','icoach'),
					    ),
					    'buttonType' => array(
					    	'type' => 'select',
					    	'default' => 'btn-speechblue',
					        'label' => __('Button Text', 'icoach'),
					        'options' => array(
					        	'btn-blank' => __('Style 1','icoach'),
					        	'btn-speechblue' => __('Style 2','icoach'),
					        ),
					        'state_handler' => array(
								'buttonHide[0]' => array( 'show' ),
								'buttonHide[hidden]' => array( 'hide' ),
							),
					    ),
			        )
			    ),
			    'height' => array(
			    	'type' => 'number',
			        'label' => __( 'Enter Height', 'icoach' ),
			        'default' => 300,
			        'integer' => true
			    )
			),
			plugin_dir_path(__FILE__)
		);
	}
	function get_template_name($instance) {
		return 'image-showcase-widget-template';
	}

	function get_style_name($instance) {
		return 'image-showcase-widget-style';
	}
	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
			'blogPostText' => isset( $instance['blogPostText'] ) ? $instance['blogPostText'] : '',
		);
	}
}
siteorigin_widget_register('image-showcase-widget', __FILE__, 'iCoachProImageShowcaseWidget');