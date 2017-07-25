<?php
/**
 * Custom controlls for customizer
 */
function breviter_pro_version( $wp_customize ) {
	if( !class_exists( 'Breviter_Pro_Section' ) ) {
		class Breviter_Pro_Section extends WP_Customize_Section {
			public $type = 'breviter_pro';
			public $pro_text = '';
			public $pro_url = '';

			public function json() {
				$json = parent::json();
				$json['pro_text'] = $this->pro_text;
				$json['pro_url'] = esc_url( $this->pro_url );

				return $json;
			}

			protected function render_template() { ?>
				<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
					<h3 class="accordion-section-title">
						{{ data.title }}

						<# if ( data.pro_text && data.pro_url ) { #>
							<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
						<# } #>
					</h3>
				</li>
			<?php }
		}

		$wp_customize->register_section_type( 'Breviter_Pro_Section' );
	}
}
add_action( 'customize_register', 'breviter_pro_version' );