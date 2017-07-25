<?php
/*
Widget Name: Hero widget
Description: A big hero image with a few settings to make it your own.
Author: Indigo Themes
Author URI: https://indigothemes.com
*/
if( !class_exists( 'SiteOrigin_Widget_Base_Slider' ) ) include_once plugin_dir_path(SOW_BUNDLE_BASE_FILE) . '/base/inc/widgets/base-slider.class.php';

class iCoachHeroWidget extends SiteOrigin_Widget_Base_Slider {
	protected $buttons = array();
	function __construct() {
		parent::__construct(
			'hero-widget',
			__('iCoach Hero', 'icoach'),
			array(
				'description' => __('A big hero image with a few settings to make it your own.', 'icoach'),
				'panels_icon' => 'dashicons iCoach-icon',
				'panels_groups' => array('iCoachGroup')
			),
			array( ),
			false,
			plugin_dir_path(__FILE__)
		);
	}
	function initialize(){
		// This widget requires the button widget
		if( !class_exists('iCoachWidgetButtonWidget') ) {
			SiteOrigin_Widgets_Bundle::single()->include_widget( 'button' );
		}
		add_filter( 'siteorigin_widgets_wrapper_classes_' . $this->id_base, array( $this, 'wrapper_class_filter' ), 10, 2 );
		// Let the slider base class do its initialization
		parent::initialize();
	}
	function get_widget_form(){
		return array(
			'frames' => array(
				'type' => 'repeater',
				'label' => __('Hero frames', 'icoach'),
				'item_name' => __('Frame', 'icoach'),
				'item_label' => array(
					'selector' => "[id*='frames-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),

				'fields' => array(

					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'icoach' ),
					),

					'buttons' => array(
						'type' => 'repeater',
						'label' => __('Buttons', 'icoach'),
						'item_name' => __('Button', 'icoach'),
						'description' => __('Add [buttons] shortcode to the content to insert these buttons.', 'icoach'),

						'item_label' => array(
							'selector' => "[id*='buttons-button-text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(
							'button' => array(
								'type' => 'widget',
								'class' => 'iCoachWidgetButtonWidget',
								'label' => __('Button', 'icoach'),
								'collapsible' => false,
							)
						)
					),

					'background' => array(
						'type' => 'section',
						'label' => __('Background', 'icoach'),
						'fields' => array(
							'image' => array(
								'type' => 'media',
								'label' => __( 'Background image', 'icoach' ),
								'library' => 'image',
								'fallback' => true,
							),

							'image_type' => array(
								'type' => 'select',
								'label' => __('Background image type', 'icoach'),
								'options' => array(
									'cover' => __('Cover', 'icoach'),
								),
								'default' => 'cover',
							),

							'opacity' => array(
								'label' => __( 'Background image opacity', 'icoach' ),
								'type' => 'slider',
								'min' => 0,
								'max' => 100,
								'default' => 100,
							),

							'color' => array(
								'type' => 'color',
								'label' => __( 'Background color', 'icoach' ),
								'default' => '#333333',
							),

							'url' => array(
								'type' => 'link',
								'label' => __( 'Destination URL', 'icoach' ),
							),

							'new_window' => array(
								'type' => 'checkbox',
								'label' => __( 'Open URL in a new window', 'icoach' ),
							),

							'videos' => array(
								'type' => 'repeater',
								'item_name' => __('Video', 'icoach'),
								'label' => __('Background videos', 'icoach'),
								'item_label' => array(
									'selector' => "[id*='frames-background_videos-url']",
									'update_event' => 'change',
									'value_method' => 'val'
								),
								'fields' => $this->video_form_fields(),
							),
						)
					),
				),
			),

			'controls' => array(
				'type' => 'section',
				'label' => __('Slider Controls', 'icoach'),
				'fields' => $this->control_form_fields()
			),

			'design' => array(
				'type' => 'section',
				'label' => __('Design and Layout', 'icoach'),
				'fields' => array(

					'height' => array(
						'type' => 'measurement',
						'label' => __( 'Height', 'icoach' ),
						'default' => 'default',
					),

					'padding' => array(
						'type' => 'measurement',
						'label' => __('Top and bottom padding', 'icoach'),
						'default' => '50px',
					),

					'extra_top_padding' => array(
						'type' => 'measurement',
						'label' => __('Extra top padding', 'icoach'),
						'description' => __('Additional padding added to the top of the slider', 'icoach'),
						'default' => '0px',
					),

					'padding_sides' => array(
						'type' => 'measurement',
						'label' => __('Side padding', 'icoach'),
						'default' => '20px',
					),

					'width' => array(
						'type' => 'measurement',
						'label' => __('Maximum container width', 'icoach'),
						'default' => '1280px',
					),

					'heading_font' => array(
						'type' => 'font',
						'label' => __('Heading font', 'icoach'),
						'default' => '',
					),

					'heading_color' => array(
						'type' => 'color',
						'label' => __('Heading color', 'icoach'),
						'default' => '#FFFFFF',
					),

					'heading_size' => array(
						'type' => 'measurement',
						'label' => __('Heading size', 'icoach'),
						'default' => '38px',
					),

					'fittext' => array(
						'type' => 'checkbox',
						'label' => __( 'Use FitText', 'icoach' ),
						'description' => __( 'Dynamically adjust your heading font size based on screen size.', 'icoach' ),
						'default' => true,
					),

					'heading_shadow' => array(
						'type' => 'slider',
						'label' => __('Heading shadow intensity', 'icoach'),
						'max' => 100,
						'min' => 0,
						'default' => 50,
					),

					'text_size' => array(
						'type' => 'measurement',
						'label' => __('Text size', 'icoach'),
						'default' => '16px',
					),

					'text_color' => array(
						'type' => 'color',
						'label' => __('Text color', 'icoach'),
						'default' => '#F6F6F6',
					),

				)
			),
		);
	}
	/**
	 * Get everything necessary for the background image.
	 *
	 * @param $i
	 * @param $frame
	 *
	 * @return array
	 */
	function get_frame_background( $i, $frame ){
		$background_image = siteorigin_widgets_get_attachment_image_src(
			$frame['background']['image'],
			'full',
			!empty( $frame['background']['image_fallback'] ) ? $frame['background']['image_fallback'] : ''
		);
		return array(
			'color' => !empty( $frame['background']['color'] ) ? $frame['background']['color'] : false,
			'image' => !empty( $background_image[0] ) ? $background_image[0] : false,
			'image-width' => !empty( $background_image[1] ) ? $background_image[1] : 0,
			'image-height' => !empty( $background_image[2] ) ? $background_image[2] : 0,
			'image-sizing' => $frame['background']['image_type'],
			'url' => !empty( $frame['background']['url'] ) ? $frame['background']['url'] : false,
			'new_window' => !empty( $frame['background']['new_window'] ),
			'videos' => $frame['background']['videos'],
			'video-sizing' => 'background',
			'opacity' => intval($frame['background']['opacity'])/100,
		);
	}
	/**
	 * Render the actual content of the frame
	 *
	 * @param $i
	 * @param $frame
	 */
	function render_frame_contents($i, $frame) {
		?>
		<div class="sow-slider-image-container">
			<div class="sow-slider-image-wrapper">
				<?php echo $this->process_content( $frame['content'], $frame ); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Process the content. Most importantly add the buttons by replacing [buttons] in the content
	 *
	 * @param $content
	 * @param $frame
	 *
	 * @return string
	 */
	function process_content( $content, $frame ) {
		ob_start();
		foreach( $frame['buttons'] as $button ) {
			$this->sub_widget('iCoachWidgetButtonWidget', array(), $button['button']);
		}
		$button_code = ob_get_clean();

		// Add in the button code
		$san_content = wp_kses_post($content);
		$content = preg_replace('/(?:<(?:p|h\d|em|strong|li|blockquote) *([^>]*)> *)?\[ *buttons *\](:? *<\/(?:p|h\d|em|strong|li|blockquote)>)?/i', '<div class="sow-hero-buttons" $1>' . $button_code . '</div>', $san_content );
		return $content;
	}

	/**
	 * The less variables to control the design of the slider
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance) {
		$less = array();

		// Slider navigation controls
		$less['nav_color_hex'] = $instance['controls']['nav_color_hex'];
		$less['nav_size'] = $instance['controls']['nav_size'];

		// Hero specific design
		// Measurement field type options
		$meas_options = array();
		$meas_options['slide_padding'] = $instance['design']['padding'];
		$meas_options['slide_padding_extra_top'] = $instance['design']['extra_top_padding'];
		$meas_options['slide_padding_sides'] = $instance['design']['padding_sides'];
		$meas_options['slide_width'] = $instance['design']['width'];
		$meas_options['slide_height'] = $instance['design']['height'];

		$meas_options['heading_size'] = $instance['design']['heading_size'];
		$meas_options['text_size'] = $instance['design']['text_size'];

		foreach ( $meas_options as $key => $val ) {
			$less[ $key ] = $this->add_default_measurement_unit( $val );
		}

		$less['heading_shadow'] = intval( $instance['design']['heading_shadow'] );

		$less['heading_color'] = $instance['design']['heading_color'];
		$less['text_color'] = $instance['design']['text_color'];

		$font = siteorigin_widget_get_font( $instance['design']['heading_font'] );
		$less['heading_font'] = $font['family'];
		if ( ! empty( $font['weight'] ) ) {
			$less['heading_font_weight'] = $font['weight'];
		}

		return $less;
	}

	function add_default_measurement_unit($val) {
		if (!empty($val)) {
			if (!preg_match('/\d+([a-zA-Z%]+)/', $val)) {
				$val .= 'px';
			}
		}
		return $val;
	}

	/**
	 * Less function for importing Google web fonts.
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return string
	 */
	function less_import_google_font($instance, $args) {
		if( empty( $instance ) ) return;

		$font_import = siteorigin_widget_get_font( $instance['design']['heading_font'] );
		if( !empty( $font_import['css_import'] ) ) {
			return  $font_import['css_import'];
		}
	}
	function wrapper_class_filter( $classes, $instance ){
		if( $instance['design']['fittext'] ) {
			$classes[] = 'so-widget-fittext-wrapper';
			wp_enqueue_script( 'sow-fittext' );
		}
		return $classes;
	}
}
siteorigin_widget_register('hero-widget', __FILE__, 'iCoachHeroWidget');
