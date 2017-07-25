<?php
/*
Widget Name: iCoach Headline
Description: A headline to headline all headlines.
Author: Indigo Themes
Author URI: https://indigothemes.com
*/
class iCoachHeadlineWidget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'headline-widget',
			__( 'iCoach Headline', 'icoach' ),
			array(
				'description' => __( 'A headline widget.', 'icoach' ),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}
	function initialize(){
		add_filter( 'siteorigin_widgets_wrapper_classes_' . $this->id_base, array( $this, 'wrapper_class_filter' ), 10, 2 );
	}
	function get_widget_form(){
		return array(
			'headline' => array(
				'type' => 'section',
				'label'  => __( 'Headline', 'icoach' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Text', 'icoach' ),
					),
					'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'icoach' ),
						'default' => 'h6',
						'options' => array(
							'h1' => __( 'H1', 'icoach' ),
							'h2' => __( 'H2', 'icoach' ),
							'h3' => __( 'H3', 'icoach' ),
							'h4' => __( 'H4', 'icoach' ),
							'h5' => __( 'H5', 'icoach' ),
							'h6' => __( 'H6', 'icoach' ),
							'p' => __( 'Paragraph', 'icoach' ),
						)
					),
					'headingColorOption' => array(
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
							'args'     => array( 'titleThemeColor' )
						),
				        'sanitize' => 'sanitize_text_field'
				    ),
					'color' => array(
						'type' => 'color',
						'label' => __('Color', 'icoach'),
						'state_handler' => array(
							'titleThemeColor[1]' => array( 'hide' ),
							'titleThemeColor[2]' => array( 'show' ),
						),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'icoach' ),
						'default' => 'default'
					),
					'fontSize' => array(
						'type' => 'measurement',
						'label' => __('Font Size', 'icoach')
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'icoach' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'icoach' ),
							'left' => __( 'Left', 'icoach' ),
							'right' => __( 'Right', 'icoach' ),
							'justify' => __( 'Justify', 'icoach' )
						)
					),
					'lineHeight' => array(
						'type' => 'measurement',
						'label' => __('Line Height', 'icoach')
					),
					'margin' => array(
						'type' => 'measurement',
						'label' => __('Top and Bottom Margin', 'icoach'),
						'default' => '',
					),
				)
			),
			'subHeadline' => array(
				'type' => 'section',
				'label'  => __( 'Sub headline', 'icoach' ),
				'hide'   => true,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __('Text', 'icoach')
					),
					'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'icoach' ),
						'default' => 'h4',
						'options' => array(
							'h1' => __( 'H1', 'icoach' ),
							'h2' => __( 'H2', 'icoach' ),
							'h3' => __( 'H3', 'icoach' ),
							'h4' => __( 'H4', 'icoach' ),
							'h5' => __( 'H5', 'icoach' ),
							'h6' => __( 'H6', 'icoach' ),
							'p' => __( 'Paragraph', 'icoach' ),
						)
					),
					'headingColorOption' => array(
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
							'args'     => array( 'subThemeColor' )
						),
				        'sanitize' => 'sanitize_text_field'
				    ),
					'color' => array(
						'type' => 'color',
						'label' => __('Color', 'icoach'),
						'state_handler' => array(
							'subThemeColor[1]' => array( 'hide' ),
							'subThemeColor[2]' => array( 'show' ),
						),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'icoach' ),
						'default' => 'default'
					),
					'fontSize' => array(
						'type' => 'measurement',
						'label' => __('Font Size', 'icoach')
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'icoach' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'icoach' ),
							'left' => __( 'Left', 'icoach' ),
							'right' => __( 'Right', 'icoach' ),
							'justify' => __( 'Justify', 'icoach' )
						)
					),
					'lineHeight' => array(
						'type' => 'measurement',
						'label' => __('Line Height', 'icoach')
					),
					'margin' => array(
						'type' => 'measurement',
						'label' => __('Top and Bottom Margin', 'icoach'),
						'default' => '',
					),
				)
			),
			'divider' => array(
				'type' => 'section',
				'label' => __( 'Divider', 'icoach' ),
				'hide' => true,
				'fields' => array(
					'style' => array(
						'type' => 'select',
						'label' => __( 'Style', 'icoach' ),
						'default' => 'solid',
						'options' => array(
							'none' => __('None', 'icoach'),
							'solid' => __('Solid', 'icoach'),
							'dotted' => __('Dotted', 'icoach'),
							'dashed' => __('Dashed', 'icoach'),
							'double' => __('Double', 'icoach'),
							'groove' => __('Groove', 'icoach'),
							'ridge' => __('Ridge', 'icoach'),
							'inset' => __('Inset', 'icoach'),
							'outset' => __('Outset', 'icoach'),
						)
					),
					'headingColorOption' => array(
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
							'args'     => array( 'dividerThemeColor' )
						),
				        'sanitize' => 'sanitize_text_field'
				    ),
					'color' => array(
						'type' => 'color',
						'label' => __('Color', 'icoach'),
						'default' => '#EEEEEE',
						'state_handler' => array(
							'dividerThemeColor[1]' => array( 'hide' ),
							'dividerThemeColor[2]' => array( 'show' ),
						),
					),
					'thickness' => array(
						'type' => 'slider',
						'label' => __( 'Thickness', 'icoach' ),
						'min' => 0,
						'max' => 20,
						'default' => 3
					),
					'align' => array(
						'type' => 'select',
						'label' => __('Alignment', 'icoach'),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'icoach' ),
							'left' => __( 'Left', 'icoach' ),
							'right' => __( 'Right', 'icoach' ),
						),
					),
					'width' => array(
						'type' => 'measurement',
						'label' => __('Divider Width', 'icoach'),
						'default' => '30px',
					),
					'margin' => array(
						'type' => 'measurement',
						'label' => __('Top and Bottom Margin', 'icoach'),
						'default' => '',
					),
				)
			),
			'order' => array(
				'type' => 'order',
				'label' => __( 'Element Order', 'icoach' ),
				'options' => array(
					'headline' => __( 'Headline', 'icoach' ),
					'divider' => __( 'Divider', 'icoach' ),
					'sub_headline' => __( 'Sub Headline', 'icoach' ),
				),
				'default' => array( 'headline', 'sub_headline',	'divider' ),
			),
			'fittext' => array(
				'type' => 'checkbox',
				'label' => __( 'Use FitText', 'icoach' ),
				'description' => __( 'Dynamically adjust your heading font size based on screen size.', 'icoach' ),
				'default' => false,
			)
		);
	}
	function get_less_variables( $instance ) {
		$less_vars = array();
		// All the headline attributes
		$less_vars['headlineTag'] = isset( $instance['headline']['tag'] ) ? $instance['headline']['tag'] : false;
		$less_vars['headlineAlign'] = isset( $instance['headline']['align'] ) ? $instance['headline']['align'] : false;
		$less_vars['headlineColor'] =  $instance['headline']['headingColorOption'] === '1' ? get_theme_mod('themeColor','#5164cf') : $instance['headline']['color'];
		$less_vars['headlineFontSize'] = isset( $instance['headline']['fontSize'] ) ? $instance['headline']['fontSize'] : false;
		$less_vars['headlineLineHeight'] = isset( $instance['headline']['lineHeight'] ) ? $instance['headline']['lineHeight'] : false;
		$less_vars['headlineMargin'] = isset( $instance['headline']['margin'] ) ? $instance['headline']['margin'] : false;
		// Headline font family and weight
		if ( ! empty( $instance['headline']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['headline']['font'] );
			$less_vars['headlineFont'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['headlineFontWeight'] = $font['weight'];
			}
		}
		// Set the sub headline attributes
		$less_vars['subHeadlineAlign'] = isset( $instance['subHeadline']['align'] ) ? $instance['subHeadline']['align'] : false;
		$less_vars['subHeadlineTag'] = isset( $instance['subHeadline']['tag'] ) ? $instance['subHeadline']['tag'] : false;
		$less_vars['subHeadlineColor'] = $instance['subHeadline']['headingColorOption'] === '1' ? get_theme_mod('secondaryColor','#000') : $instance['subHeadline']['color'];
		$less_vars['subHeadlineFontSize'] = isset( $instance['subHeadline']['fontSize'] ) ? $instance['subHeadline']['fontSize'] : false;
		$less_vars['subHeadlineLineHeight'] = isset( $instance['subHeadline']['lineHeight'] ) ? $instance['subHeadline']['lineHeight'] : false;
		$less_vars['subHeadlineMargin'] = isset( $instance['subHeadline']['margin'] ) ? $instance['subHeadline']['margin'] : false;
		// Sub headline font family and weight
		if ( ! empty( $instance['subHeadline']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['subHeadline']['font'] );
			$less_vars['subHeadlineFont'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['subHeadlineFontWeight'] = $font['weight'];
			}
		}
		$less_vars['dividerStyle'] = isset( $instance['divider']['style'] ) ? $instance['divider']['style'] : false;
		$less_vars['dividerWidth'] = isset( $instance['divider']['width'] ) ? $instance['divider']['width'] : false;
		$less_vars['dividerThickness'] = isset( $instance['divider']['thickness'] ) ? intval( $instance['divider']['thickness'] ) . 'px' : false;
		$less_vars['dividerAlign'] = isset( $instance['divider']['align'] ) ? $instance['divider']['align'] : false;
		$less_vars['dividerColor'] = $instance['divider']['headingColorOption'] === '1' ? get_theme_mod('secondaryColor','#000') : $instance['divider']['color'];
		$less_vars['dividerMargin'] = isset( $instance['divider']['margin'] ) ? $instance['divider']['margin'] : false;

		return $less_vars;
	}
	function get_google_font_fields( $instance ) {
		return array(
			$instance['headline']['font'],
			$instance['subHeadline']['font'],
		);
	}
	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		return array(
			'headline' => $instance['headline']['text'],
			'headlineTag' => $instance['headline']['tag'],
			'subHeadline' => $instance['subHeadline']['text'],
			'subHeadlineTag' => $instance['subHeadline']['tag'],
			'order' => $instance['order'],
			'hasDivider' => ! empty( $instance['divider'] ) && $instance['divider']['style'] != 'none'
		);
	}
	function wrapper_class_filter( $classes, $instance ){
		if( $instance[ 'fittext' ] ) {
			$classes[] = 'so-widget-fittext-wrapper';
			wp_enqueue_script( 'sow-fittext' );
		}
		return $classes;
	}
	function modify_instance( $instance ) {
		// Change the old divider weight into a divider thickness
		if( isset( $instance['divider']['weight'] ) && ! isset( $instance['divider']['thickness'] ) ) {
			switch( $instance['divider']['weight'] ) {
				case 'medium':
					$instance['divider']['thickness'] = 3;
					break;
				case 'thick':
					$instance['divider']['thickness'] = 5;
					break;
				case 'thin' :
				default :
					$instance['divider']['thickness'] = 1;
					break;
			}
			unset( $instance['divider']['weight'] );
		}
		// Change the old divider side margin into overall width
		if( isset( $instance['divider']['side_margin'] ) && ! isset( $instance['divider']['width'] ) ) {
			global $content_width;
			$value = floatval( $instance['divider']['side_margin'] );

			switch( $instance['divider']['side_margin_unit'] ) {
				case 'px' :
					$instance['divider']['width'] = ( ( !empty( $content_width ) ? $content_width : 960 ) - ( 2 * $value ) ) . 'px';
					$instance['divider']['width_unit'] = 'px';
					break;

				case '%' :
					$instance['divider']['width'] = ( 100 - (2 * $value) ) . '%';
					$instance['divider']['width_unit'] = '%';
					break;

				default :
					$instance['divider']['width'] = '80%';
					$instance['divider']['width_unit'] = '%';
					break;
			}
			unset( $instance['divider']['side_margin'] );
			unset( $instance['divider']['side_margin_unit'] );
		}
		// Copy top margin over to bottom margin
		if( isset( $instance['divider']['topMargin'] ) && ! isset( $instance['divider']['bottomMargin'] ) ) {
			$instance['divider']['bottomMargin'] = $instance['divider']['topMargin'];
			$instance['divider']['bottomMarginUnit'] = $instance['divider']['topMarginUnit'];
		}
		return $instance;
	}
}
siteorigin_widget_register('headline-widget', __FILE__, 'iCoachHeadlineWidget');
