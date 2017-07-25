<?php
/*
Widget Name: iCoach Key Feature widget
Description: Key Feature widget allows you to create fully customized key feature box for iCoach theme.
Author: Indigo Themes
Author URI: http://www.indigothemes.com/
*/
class iCoachProKeyFeaturesWidget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'key-features-widget',
			__('iCoach Key Feature', 'icoach'),
			array(
				'description' => __('Fully customized key feature box', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			),
			array(

			),
			$form_options = array(
    			'keyFeatureTitle' => array(
	        		'type' => 'text',
	        		'label' => __('Title', 'icoach'),
	        		'default'=> __('This is Title','icoach'),
	        		'sanitize' => 'sanitize_text_field'
	        		
			    ),
			    'keyFeatureIcon' => array(
			        'type' => 'icon',
			        'label' => __('Select an icon', 'icoach'),
			    ),
			    'keyFeatureDescription' => array(
	        		'type' => 'textarea',
	        		'label' => __('Description', 'icoach'),
	        		'default'=> __('This area used for description.','icoach'),
	        		'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureLinktext' => array(
	        		'type' => 'text',
	        		'label' => __('Button Text', 'icoach'),
	        		'default'=> __('Button','icoach'),
	        		'help' => __('Leave blank to hide button','icoach'),
	        		'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureLink' => array(
	        		'type' => 'link',
	        		'label' => __('Button Link', 'icoach'),
	        		'default'=> '#',
	        		'help' => __('Leave blank to hide button','icoach'),
	        		'sanitize' => 'esc_url_raw'
			    ),
			    'keyFeatureTextAlignment' => array(
			        'type' => 'select',
			        'label' => __( 'Text Align', 'icoach'),
			        'default' => 'center',
			        'options' => array(
			            'center' => __( 'Center', 'icoach' ),
			            'left' => __( 'Left', 'icoach' ),
			            'right' => __( 'Right', 'icoach' ),
			        ),
			        'sanitize' => 'sanitize_text_field'
			    ),
			    'keyFeatureColorOption' => array(
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
			    'keyFeatureTitleSection' => array(
			        'type' => 'section',
			        'label' => __( 'Title' , 'icoach' ),
			        'hide' => true,
			        'fields' => array(
			            'keyFeatureTitleColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Title Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureTitleHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Title Hover Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureTitleFontFamily' => array(
					        'type' => 'font',
					        'label' => __('Select a font', 'icoach'),
					    ),
						'keyFeatureTitleFontSize' => array(
							'type' => 'measurement',
							'label' => __( 'Font Size', 'icoach' ),
						),
						'keyFeatureTitleMargin' => array(
							'type' => 'measurement',
							'label' => __( 'Top and Bottom Margin', 'icoach' ),
							'description' => __('This Margin will added before and after title.','icoach'),
							'default' => 10
						),
			        )
			    ),
			    'keyFeatureDescriptionSection' => array(
			        'type' => 'section',
			        'label' => __( 'Descriptions' , 'icoach' ),
			        'hide' => true,
			        'fields' => array(
			            'keyFeatureDescriptionColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Text Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureDescriptionHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Description Hover Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureDescriptionFontFamily' => array(
					        'type' => 'font',
					        'label' => __('Select a font', 'icoach'),
					    ),
						'keyFeatureDescriptionFontSize' => array(
							'type' => 'measurement',
							'label' => __( 'Font Size', 'icoach' ),
						),
						'keyFeatureDescriptionMargin' => array(
							'type' => 'measurement',
							'label' => __( 'Top and Bottom Margin', 'icoach' ),
							'description' => __('This Margin will added before and after description.','icoach'),
							'default' => 10
						),
			        )
			    ),
			    'keyFeatureBoxSection' => array(
			        'type' => 'section',
			        'label' => __( 'Box Styling' , 'icoach' ),
			        'hide' => true,
			        'fields' => array(
						'keyFeatureBackgroundColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Background Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureBackgroundHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Background Hover Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureBorderWidth' => array(
			            	'type' => 'measurement',
							'label' => __( 'Border Width', 'icoach' ),
			            ),
			            'keyFeatureBorderRadius' => array(
			                'type' => 'measurement',
			                'label' => __( 'Border Radius', 'icoach' ),
			            ),
			            'keyFeatureHorizontalSpace' => array(
			                'type' => 'measurement',
			                'label' => __( 'Top-Bottom Padding', 'icoach' ),
			                'default' => '30px',
			            ),
			            'keyFeatureVerticalSpace' => array(
			                'type' => 'measurement',
			                'label' => __( 'Right-Left Padding', 'icoach' ),
			                'default' => '30px',
			            ),
			            'keyFeatureBorderColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose Box Border Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			        )
			    ),
			    'keyFeatureIconSection' => array(
			        'type' => 'section',
			        'label' => __( 'Icon' , 'icoach' ),
			        'hide' => true,
			        'fields' => array(
					    'keyFeatureIconAlignment' => array(
					        'type' => 'select',
					        'label' => __( 'Icon Alignment', 'icoach'),
					        'default' => 'Select',
					        'options' => array(
					            'center' => __( 'Center', 'icoach' ),
					            'left' => __( 'Left', 'icoach' ),
					            'right' => __( 'Right', 'icoach' ),
					        ),
					        'sanitize' => 'sanitize_text_field'
					    ),
			            'keyFeatureIconColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Icon Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
			            'keyFeatureIconHoverColor' => array(
			                'type' => 'color',
			                'label' => __( 'Choose a Icon Hover Color', 'icoach' ),
			                'state_handler' => array(
								'themeColor[1]' => array( 'hide' ),
								'themeColor[2]' => array( 'show' ),
							),
			            ),
						'keyFeatureIconSize' => array(
							'type' => 'measurement',
							'label' => __( 'Icon Size', 'icoach' ),
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
		return 'key-feature-widget-template';
	}

	function get_style_name($instance) {
		return 'key-feature-widget-style';
	}
}

siteorigin_widget_register('key-features-widget', __FILE__, 'iCoachProKeyFeaturesWidget');