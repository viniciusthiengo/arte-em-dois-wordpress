<?php
/*
Widget Name: Petshop Key Feature widget
Description: Key Feature widget allows you to create fully customized key feature box for Petshop theme.
Author: Indigo Themes
Author URI: http://www.indigothemes.com/
*/
class petshop_key_features_widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'key-features',
			__('Petshop Key Feature', 'petshop'),
			array(
				'description' => __('Fully customized key feature box', 'petshop'),
				'panels_icon' => 'dashicons petshop-icon',
				'panels_groups' => array('petshop_group')
			),
			array(

			),
			$form_options = array(
    			'keyFeatureTitle' => array(
	        		'type' => 'text',
	        		'label' => __('Title', 'petshop'),
	        		'default'=> __('This is Title','petshop'),
	        		'sanitize' => 'sanitize_text_field'
	        		
			    ),
			    'keyFeatureIcon' => array(
			        'type' => 'icon',
			        'label' => __('Select an icon', 'petshop'),
			    ),
			    'keyFeatureDescription' => array(
	        		'type' => 'textarea',
	        		'label' => __('Description', 'petshop'),
	        		'default'=> __('This area used for description.','petshop'),
	        		'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureLinktext' => array(
	        		'type' => 'text',
	        		'label' => __('Button Text', 'petshop'),
	        		'default'=> __('Button','petshop'),
	        		'help' => __('Leave blank to hide button','petshop'),
	        		'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureLink' => array(
	        		'type' => 'link',
	        		'label' => __('Button Link', 'petshop'),
	        		'default'=> '#',
	        		'help' => __('Leave blank to hide button','petshop'),
	        		'sanitize' => 'esc_url_raw'
			    ),
			    'keyFeatureTextAlignment' => array(
			        'type' => 'select',
			        'label' => __( 'Text Align', 'petshop'),
			        'default' => 'center',
			        'options' => array(
			            'center' => __( 'Center', 'petshop' ),
			            'left' => __( 'Left', 'petshop' ),
			            'right' => __( 'Right', 'petshop' ),
			        ),
			        'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureColorOption' => array(
			        'type' => 'select',
			        'label' => __( 'Select Color Option', 'petshop'),
			        'description' => __('if you select theme default colors option then customizer colors will be render.','petshop'),
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
			    'keyFeatureTitleSection' => array(
			        'type' => 'section',
			        'label' => __( 'Title' , 'petshop' ),
			        'hide' => true,
			        'fields' => array(
			            'keyFeatureTitleColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Title Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureTitleHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Title Hover Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureTitleFontFamily' => array(
					        'type' => 'font',
					        'label' => __('Select a font', 'petshop'),
					    ),
						'keyFeatureTitleFontSize' => array(
							'type' => 'measurement',
							'label' => __( 'Font Size', 'petshop' ),
						),
						'keyFeatureTitleMargin' => array(
							'type' => 'measurement',
							'label' => __( 'Top and Bottom Margin', 'petshop' ),
							'description' => __('This Margin will added before and after title.','petshop'),
							'default' => 10
						),
			        )
			    ),
			    'keyFeatureDescriptionSection' => array(
			        'type' => 'section',
			        'label' => __( 'Descriptions' , 'petshop' ),
			        'hide' => true,
			        'fields' => array(
			            'keyFeatureDescriptionColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Text Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureDescriptionHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Description Hover Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureDescriptionFontFamily' => array(
					        'type' => 'font',
					        'label' => __('Select a font', 'petshop'),
					    ),
						'keyFeatureDescriptionFontSize' => array(
							'type' => 'measurement',
							'label' => __( 'Font Size', 'petshop' ),
						),
						'keyFeatureDescriptionMargin' => array(
							'type' => 'measurement',
							'label' => __( 'Top and Bottom Margin', 'petshop' ),
							'description' => __('This Margin will added before and after description.','petshop'),
							'default' => 10
						),
			        )
			    ),
			    'keyFeatureBoxSection' => array(
			        'type' => 'section',
			        'label' => __( 'Box Styling' , 'petshop' ),
			        'hide' => true,
			        'fields' => array(
						'keyFeatureBackgroundColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Background Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureBackgroundHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Background Hover Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureBorderWidth' => array(
			            	'type' => 'measurement',
							'label' => __( 'Border Width', 'petshop' ),
			            ),
			            'keyFeatureBorderRadius' => array(
			                'type' => 'measurement',
			                'label' => __( 'Border Radius', 'petshop' ),
			            ),
			            'keyFeatureHorizontalSpace' => array(
			                'type' => 'measurement',
			                'label' => __( 'Top-Bottom Padding', 'petshop' ),
			                'default' => '30px',
			            ),
			            'keyFeatureVerticalSpace' => array(
			                'type' => 'measurement',
			                'label' => __( 'Right-Left Padding', 'petshop' ),
			                'default' => '30px',
			            ),
			            'keyFeatureBorderColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Border Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			        )
			    ),
			    'keyFeatureIconSection' => array(
			        'type' => 'section',
			        'label' => __( 'Icon' , 'petshop' ),
			        'hide' => true,
			        'fields' => array(
					    'keyFeatureIconAlignment' => array(
					        'type' => 'select',
					        'label' => __( 'Icon Alignment', 'petshop'),
					        'default' => 'Select',
					        'options' => array(
					            'center' => __( 'Center', 'petshop' ),
					            'left' => __( 'Left', 'petshop' ),
					            'right' => __( 'Right', 'petshop' ),
					        ),
					        'sanitize' => 'sanitize_text_field'
					    ),
			            'keyFeatureIconColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Icon Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureIconHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Icon Hover Color', 'petshop' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
						'keyFeatureIconSize' => array(
							'type' => 'measurement',
							'label' => __( 'Icon Size', 'petshop' ),
							'default' => 30
						),
			        )
			    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
			'keyFeatureTitleColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyHeadingColor','#282828') : $instance['keyFeatureTitleSection']['keyFeatureTitleColor'],
			'keyFeatureTitleHoverColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyBackgroundColor','#ffffff') : $instance['keyFeatureTitleSection']['keyFeatureTitleHoverColor'],
			'keyFeatureDescriptionColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyTextColor','#424242') : $instance['keyFeatureDescriptionSection']['keyFeatureDescriptionColor'],
			'keyFeatureDescriptionHoverColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyBackgroundColor','#ffffff') : $instance['keyFeatureDescriptionSection']['keyFeatureDescriptionHoverColor'],
			'keyFeatureBackgroundColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyBackgroundColor','#ffffff') : $instance['keyFeatureBoxSection']['keyFeatureBackgroundColor'],
			'keyFeatureBackgroundHoverColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('themeColor','#5164cf') : $instance['keyFeatureBoxSection']['keyFeatureBackgroundHoverColor'],
			'keyFeatureBorderWidth' => isset($instance['keyFeatureBoxSection']['keyFeatureBorderWidth']) ? $instance['keyFeatureBoxSection']['keyFeatureBorderWidth'] : '',
			'keyFeatureBorderRadius' => isset($instance['keyFeatureBoxSection']['keyFeatureBorderRadius']) ? $instance['keyFeatureBoxSection']['keyFeatureBorderRadius'] : '',
			'keyFeatureBorderColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('themeColor','#5164cf') : $instance['keyFeatureBoxSection']['keyFeatureBorderColor'],
			'keyFeatureIconColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyHeadingColor','#282828') : $instance['keyFeatureIconSection']['keyFeatureIconColor'],
			'keyFeatureIconHoverColor' => $instance['keyFeatureColorOption'] === '1' ? get_theme_mod('bodyBackgroundColor','#ffffff') : $instance['keyFeatureIconSection']['keyFeatureIconHoverColor'],
			'keyFeatureIconAlignment' => isset($instance['keyFeatureIconSection']['keyFeatureIconAlignment']) ? $instance['keyFeatureIconSection']['keyFeatureIconAlignment'] : 'center',
			'keyFeatureTextAlignment' => isset($instance['keyFeatureTextAlignment']) ? $instance['keyFeatureTextAlignment'] : 'center',
			'keyFeatureTitleFontSize' => isset($instance['keyFeatureTitleSection']['keyFeatureTitleFontSize']) ? $instance['keyFeatureTitleSection']['keyFeatureTitleFontSize'] : get_theme_mod('H6FontSize','16').'px',
			'keyFeatureTitleFontFamily'=> isset($instance['keyFeatureTitleSection']['keyFeatureTitleFontFamily']) ? $instance['keyFeatureTitleSection']['keyFeatureTitleFontFamily'] : '',
			'keyFeatureDescriptionFontSize' => isset($instance['keyFeatureDescriptionSection']['keyFeatureDescriptionFontSize']) ? $instance['keyFeatureDescriptionSection']['keyFeatureDescriptionFontSize'] : '',
			'keyFeatureDescriptionFontFamily' => isset($instance['keyFeatureDescriptionSection']['keyFeatureDescriptionFontFamily']) ? $instance['keyFeatureDescriptionSection']['keyFeatureDescriptionFontFamily'] : '',
			'keyFeatureDescriptionMargin' => isset($instance['keyFeatureDescriptionSection']['keyFeatureDescriptionMargin']) ? $instance['keyFeatureDescriptionSection']['keyFeatureDescriptionMargin'] : '',
			'keyFeatureTitleMargin' => isset($instance['keyFeatureTitleSection']['keyFeatureTitleMargin']) ? $instance['keyFeatureTitleSection']['keyFeatureTitleMargin'] : '',
			'keyFeatureHorizontalSpace' => isset($instance['keyFeatureBoxSection']['keyFeatureHorizontalSpace']) ? $instance['keyFeatureBoxSection']['keyFeatureHorizontalSpace'] : '30px',
			'keyFeatureVerticalSpace' => isset($instance['keyFeatureBoxSection']['keyFeatureVerticalSpace']) ? $instance['keyFeatureBoxSection']['keyFeatureVerticalSpace'] : '25%',
			'keyFeatureButtonColor' => get_theme_mod('secondaryColor','#000000')
		);
	}	
	function get_template_name($instance) {
		return 'template';
	}

	function get_style_name($instance) {
		return 'style';
	}
}

siteorigin_widget_register('key-features', __FILE__, 'petshop_key_features_widget');