<?php
/**
 * The about widget
 */
class EightyDays_Widget_About extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->defaults = array(
			'title'           => '',
			'image'           => '',
			'intro'           => '',
			'signature'       => '',
			'signature_image' => '',
		);

		parent::__construct(
			'eightydays-about-widget',
			esc_html__( 'EightyDays: About', 'eightydays-lite' ),
			array(
				'classname' => 'eightydays-about-widget',
			)
		);
		add_action( 'sidebar_admin_setup', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Enqueue script for image upload in widgets.
	 */
	public function admin_scripts() {
		wp_enqueue_style( 'eightydays-widget-image', get_template_directory_uri() . '/css/widget-image.css' );

		wp_enqueue_media();
		wp_enqueue_script( 'eightydays-widget-image', get_template_directory_uri() . '/js/widget-image.js', array(
			'jquery',
			'media-upload',
			'media-views'
		), '', true );
		wp_localize_script( 'eightydays-widget-image', 'EightyDaysWidgetImage', array(
			'title'  => esc_html__( 'Select an image', 'eightydays-lite' ),
			'button' => esc_html__( 'Insert into widget', 'eightydays-lite' ),
		) );
	}

	/**
	 * Display widget
	 *
	 * @param array $args Sidebar configuration
	 * @param array $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		echo $args['before_widget'];
		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
		if ( $instance['image'] ) {
			echo '<img class="eightydays-about-image" src="', esc_url( $instance['image'] ), '" alt="">';
		}
		if ( $instance['intro'] ) {
			echo '<div class="eightydays-about-intro">', wp_kses_post( $instance['intro'] ), '</div>';
		}

		if ( function_exists( 'jetpack_social_menu' ) ) {
			jetpack_social_menu();
		}

		if ( $instance['signature_image'] ) {
			echo '<img class="eightydays-about-signature" src="', esc_url( $instance['signature_image'] ), '" alt="">';
		} elseif ( $instance['signature'] ) {
			echo '<div class="eightydays-about-signature">', esc_html( $instance['signature'] ), '</div>';
		}

		echo $args['after_widget'];
	}

	/**
	 * Update widget
	 *
	 * @param array $new_instance New widget settings
	 * @param array $old_instance Old widget settings
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                    = $old_instance;
		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['image']           = esc_url_raw( $new_instance['image'] );
		$instance['intro']           = sanitize_text_field( $new_instance['intro'] );
		$instance['signature_image'] = esc_url_raw( $new_instance['signature_image'] );
		$instance['signature']       = sanitize_text_field( $new_instance['signature'] );

		return $instance;
	}

	/**
	 * Display widget settings
	 *
	 * @param array $instance Widget settings
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'eightydays-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php esc_html_e( 'Image', 'eightydays-lite' ); ?></label>
			<span class="eightydays-widget-image">
				<input id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text" class="eightydays-widget-image__input" value="<?php echo esc_attr( $instance['image'] ); ?>">
				<button class="button eightydays-widget-image__select"><?php esc_html_e( 'Select', 'eightydays-lite' ); ?></button>
				<img src="<?php echo esc_url( $instance['image'] ); ?>" class="eightydays-widget-image__image<?php echo $instance['image'] ? '' : ' hidden'; ?>">
			</span>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>"><?php esc_html_e( 'Intro', 'eightydays-lite' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'intro' ) ); ?>" class="widefat"><?php echo esc_textarea( $instance['intro'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'signature' ) ); ?>"><?php esc_html_e( 'Signature', 'eightydays-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'signature' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'signature' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['signature'] ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'signature_image' ) ); ?>"><?php esc_html_e( 'Signature Image', 'eightydays-lite' ); ?></label>
			<span class="eightydays-widget-image">
				<input id="<?php echo esc_attr( $this->get_field_id( 'signature_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'signature_image' ) ); ?>" type="text" class="eightydays-widget-image__input" value="<?php echo esc_attr( $instance['signature_image'] ); ?>">
				<button class="button eightydays-widget-image__select"><?php esc_html_e( 'Select', 'eightydays-lite' ); ?></button>
				<img src="<?php echo esc_url( $instance['signature_image'] ); ?>" class="eightydays-widget-image__image<?php echo $instance['signature_image'] ? '' : ' hidden'; ?>">
			</span>
			<span class="description"><?php esc_html_e( 'This option overrides signature text above.', 'eightydays-lite' ); ?></span>
		</p>
		<?php
	}
}
