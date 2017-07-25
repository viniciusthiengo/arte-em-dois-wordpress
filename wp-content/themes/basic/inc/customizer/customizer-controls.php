<?php

//require_once ABSPATH.WPINC.'/class-wp-customize-control.php';


/** ========================================================================
 * Register Scripts for custom control
 *
 * @since 1.1.6
 *
 * ======================================================================== */
function basic_customize_register_scripts() {

	/* CSS */
	wp_register_style(
		'basic-customizer-sortable-checkboxes-css',
		get_template_directory_uri() . '/inc/customizer/assets/sortable-checkboxes.css'
	);
	wp_register_style(
		'basic-customizer-child-design-css',
		get_template_directory_uri() . '/inc/customizer/assets/child-design.css'
	);

	/* JS */
	wp_register_script(
		'basic-customizer-sortable-checkboxes-js',
		get_template_directory_uri() . '/inc/customizer/assets/sortable-checkboxes.js',
		array( 'jquery', 'jquery-ui-sortable', 'customize-controls' )
	);

}

add_action( 'customize_controls_enqueue_scripts', 'basic_customize_register_scripts', 0 );
/* ======================================================================== */


/** ========================================================================
 *
 * Custom Customizer Control: Sortable Checkboxes
 *
 * @since 1.1.6
 *
 * ======================================================================== */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Basic_Sortable_Checkboxes_WPCC extends WP_Customize_Control {

		/**
		 * Scripts for this control
		 */
		public function enqueue() {
			wp_enqueue_style( 'basic-customizer-sortable-checkboxes-css' );
			wp_enqueue_script( 'basic-customizer-sortable-checkboxes-js' );
		}


		/**
		 * HTML
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;

			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif;

			$multi_values = ! is_array( $this->value() ) ? explode( '_', $this->value() ) : $this->value();

			$ordered = array();
			foreach ( $multi_values as $k ) {
				$ordered[ $k ] = $this->choices[ $k ];
			}
			$ordered = array_merge( $ordered, array_diff( $this->choices, $ordered ) );


			?>
			<ul class="basic-sortable-checkboxes">
				<?php foreach ( $ordered as $value => $label ) : ?>

					<li>
						<i class="dashicons dashicons-menu"></i>
						<label>
							<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
							<?php echo esc_html( $label ); ?>
						</label>
					</li>

				<?php endforeach; ?>

				<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />

			</ul>
			<?php
		}
	}
}
/* ======================================================================== */



/** ========================================================================
 *
 * Custom Customizer Control: Sortable Checkboxes
 *
 * @since 1.1.6
 *
 * ======================================================================== */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Basic_Child_Design_WPCC extends WP_Customize_Control {

		public function enqueue() {
			wp_enqueue_style( 'basic-customizer-child-design-css' );
		}

		/**
		 * HTML
		 */
		public function render_content() {

			if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;

			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif;


			?>
			<div class="basic-child-design" <?php $this->link(); ?>>
				<?php echo esc_html( $this->value() ); ?>
			</div>
			<?php
		}
	}
}
/* ======================================================================== */