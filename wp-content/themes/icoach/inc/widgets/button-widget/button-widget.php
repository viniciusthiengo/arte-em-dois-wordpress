<?php
/*
Widget Name: Button
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: Indigo Themes
Author URI: http://indigothemes.com/
*/
class iCoachWidgetButtonWidget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'button-widget',
			__('iCoach Button', 'icoach'),
			array(
				'description' => __('A customizable button widget.', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			)
		);
	}
	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'icoach-button-base',
					get_template_directory_uri() . '/inc/widgets/button-widget/assets/css/style.css',
					array(),
				),
			)
		);
	}
	function initialize_form() {
		return array(
			'text' => array(
				'type' => 'text',
				'default' => 'Button',
				'label' => __('Button text', 'icoach'),
				'sanitize' => 'sanitize_text_field'
			),
			'url' => array(
				'type' => 'link',
				'label' => __('Destination URL', 'icoach'),
			),
			'newWindow' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in a new window', 'icoach'),
			),
			'design' => array(
				'type' => 'section',
				'label' => __('Design and layout', 'icoach'),
				'hide' => true,
				'fields' => array(
					'width' => array(
						'type' => 'measurement',
						'label' => __('Button Width', 'icoach'),
					),
					'align' => array(
						'type' => 'select',
						'label' => __('Align', 'icoach'),
						'default' => 'center',
						'options' => array(
							'left' => __('Left', 'icoach'),
							'right' => __('Right', 'icoach'),
							'center' => __('Center', 'icoach'),
							'justify' => __('Justify', 'icoach'),
						),
					),
					'theme' => array(
						'type' => 'select',
						'label' => __('Button theme', 'icoach'),
						'default' => 'style1',
						'options' => array(
							'style1' => __('Style 1', 'icoach'),
							'style2' => __('Style 2', 'icoach'),
						),
					),
					'buttonColorOption' => array(
				        'type' => 'select',
				        'label' => __( 'Select Color Option', 'icoach'),
				        'description' => __('if you select theme default colors option then customizer colors will be render.','icoach'),
				        'default' => '1',
				        'options' => array(
				            '1' => 'Theme Default Colors',
							'2' => 'Custom Colors',
				        ),
				        'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'themeColor' )
						),
				        'sanitize' => 'sanitize_text_field'
				    ),
					'buttonColor' => array(
						'type' => 'color',
						'label' => __('Button color', 'icoach'),
						'state_handler' => array(
							'themeColor[1]' => array( 'hide' ),
							'themeColor[2]' => array( 'show' ),
						),
					),
					'hoverColor' => array(
						'type' => 'color',
						'label' => __('Hover color', 'icoach'),
						'state_handler' => array(
							'themeColor[1]' => array( 'hide' ),
							'themeColor[2]' => array( 'show' ),
						),
					),
					'textColor' => array(
						'type' => 'color',
						'label' => __('Text color', 'icoach'),
						'state_handler' => array(
							'themeColor[1]' => array( 'hide' ),
							'themeColor[2]' => array( 'show' ),
						),
					),
					'hover' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __('Use hover effects', 'icoach'),
					),
					'fontSize' => array(
						'type' => 'measurement',
						'label' => __('Font size', 'icoach'),
					),
					'paddingTop' => array(
						'type' => 'measurement',
						'label' => __('Padding Top', 'icoach'),
					),
					'paddingRight' => array(
						'type' => 'measurement',
						'label' => __('Padding Right', 'icoach'),
					),
					'paddingBottom' => array(
						'type' => 'measurement',
						'label' => __('Padding Bottom', 'icoach'),
					),
					'paddingLeft' => array(
						'type' => 'measurement',
						'label' => __('Padding Left', 'icoach'),
					),
				),
			),
			'attributes' => array(
				'type' => 'section',
				'label' => __('Other attributes and SEO', 'icoach'),
				'hide' => true,
				'fields' => array(
					'id' => array(
						'type' => 'text',
						'label' => __('Button ID', 'icoach'),
						'description' => __('An ID attribute allows you to target this button in Javascript.', 'icoach'),
					),

					'title' => array(
						'type' => 'text',
						'label' => __('Title attribute', 'icoach'),
						'description' => __('Adds a title attribute to the button link.', 'icoach'),
					),

					'onclick' => array(
						'type' => 'text',
						'label' => __('Onclick', 'icoach'),
						'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'icoach'),
					),
				),
			),
		);
	}
	function get_template_name($instance) {
		return 'button-widget-template';
	}
	function get_style_name($instance) {
		if(empty($instance['design']['theme'])) return 'style1';
		return $instance['design']['theme'];
	}

	/**
	* Get the variables that we'll be injecting into the less stylesheet.
	*
	* @param $instance
	*
	* @return array
	*/
	function get_less_variables($instance){
		if( empty( $instance ) || empty( $instance['design'] ) ) return array();
		return array(
			'buttonWidth' => isset( $instance['design']['width'] ) ? $instance['design']['width'] : '',
			'hasButtonWidth' => empty( $instance['design']['width'] ) ? 'false' : 'true',
			'buttonColor' => $instance['design']['buttonColorOption'] === '1' ? get_theme_mod('secondaryColor','#000') : $instance['design']['buttonColor'],
			'hoverColor' => $instance['design']['buttonColorOption'] === '1' ? get_theme_mod('themeColor','#5164cf') : $instance['design']['hoverColor'],
			'textColor' => $instance['design']['buttonColorOption'] === '1' ? get_theme_mod('bodyOverlayColor','#fff') : $instance['design']['textColor'],
			'fontSize' => isset($instance['design']['fontSize']) ? $instance['design']['fontSize'] : '',
			'paddingLeft' => isset( $instance['design']['paddingLeft'] ) ? $instance['design']['paddingLeft'] : '40px',
			'paddingBottom' => isset( $instance['design']['paddingBottom'] ) ? $instance['design']['paddingBottom'] : '15px',
			'paddingRight' => isset( $instance['design']['paddingRight'] ) ? $instance['design']['paddingRight'] : '40px',
			'paddingTop' => isset( $instance['design']['paddingTop'] ) ? $instance['design']['paddingTop'] : '15px',
			'hasText' => empty( $instance['text'] ) ? 'false' : 'true',
		);
	}

	/**
	* Make sure the instance is the most up to date version.
	*
	* @param $instance
	*
	* @return mixed
	*/
	function modify_instance($instance){

		if( empty($instance['button_icon']) ) {
			$instance['button_icon'] = array();
			if(isset($instance['icon_selected'])) $instance['button_icon']['icon_selected'] = $instance['icon_selected'];
			if(isset($instance['icon_color'])) $instance['button_icon']['icon_color'] = $instance['icon_color'];
			if(isset($instance['icon'])) $instance['button_icon']['icon'] = $instance['icon'];
			unset($instance['icon_selected']);
			unset($instance['icon_color']);
			unset($instance['icon']);
		}

		if( empty($instance['design']) ) {
			$instance['design'] = array();
			if(isset($instance['align'])) $instance['design']['align'] = $instance['align'];
			if(isset($instance['theme'])) $instance['design']['theme'] = $instance['theme'];
			if(isset($instance['button_color'])) $instance['design']['button_color'] = $instance['button_color'];
			if(isset($instance['text_color'])) $instance['design']['text_color'] = $instance['text_color'];
			if(isset($instance['hover'])) $instance['design']['hover'] = $instance['hover'];
			if(isset($instance['font_size'])) $instance['design']['font_size'] = $instance['font_size'];
			if(isset($instance['rounding'])) $instance['design']['rounding'] = $instance['rounding'];
			if(isset($instance['padding'])) $instance['design']['padding'] = $instance['padding'];
			unset($instance['align']);
			unset($instance['theme']);
			unset($instance['button_color']);
			unset($instance['text_color']);
			unset($instance['hover']);
			unset($instance['font_size']);
			unset($instance['rounding']);
			unset($instance['padding']);
		}
		if( empty($instance['attributes']) ) {
			$instance['attributes'] = array();
			if(isset($instance['id'])) $instance['attributes']['id'] = $instance['id'];
			unset($instance['id']);
		}
		return $instance;
	}
}
siteorigin_widget_register('button-widget', __FILE__, 'iCoachWidgetButtonWidget');
