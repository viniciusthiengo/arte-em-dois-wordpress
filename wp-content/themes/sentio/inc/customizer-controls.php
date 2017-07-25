<?php
/**
 * Custom controlls for customizer
 */

function social_options($selected) {
	$icons = array(
		'Facebook',
		'Twitter',
		'Google',
		'Linkedin',
		'YouTube',
		'GitHub',
		'Instagram',
		'Dribbble',
		'Skype'
		);

	foreach ($icons as $value) {
		
		($selected == $value) ? $active = 'selected' : $active = '';
		printf('<option value="%1$s" %3$s>%2$s</option>', $value, sentio_icons_hex($value), $active);
	}
}

function sentio_custom_controls($wp_customize) {
	/* Social Icons */
	if(!class_exists( 'WP_Customize_Social_Control' )) {
		class WP_Customize_Social_Control extends WP_Customize_Control {
			public $type = 'social';
			 
			public function render_content() {
				?>
				<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="text" class="social-input" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
				</label>
				<?php 
					$default = $this->value();
					$socials = !empty( $default ) ? json_decode($default) : '';
				?>
				<div class="social-picker">
					<ul>
						<?php if(!empty( $socials )): ?>
							<?php foreach ($socials as $key => $social): ?>
								<li>
									<div class="social-picker-item">
										<select  class="font-icon">
											<?php echo social_options( $social->icon ); ?>
										</select>
										<input type="url" placeholder="http://" 
											value="<?php echo !empty($social->url) ? $social->url : ''; ?>">
									</div>
									<span>
										<a href="#remove" class="remove-social button upload-button">&minus;</a>
										<a href="#add" class="add-social button upload-button">&#43;</a>
									</span>
								</li>
							<?php endforeach; ?>
						<?php else: ?>
							<li>
								<div class="social-picker-item">
									<select class="font-icon">
										<?php echo social_options(); ?>
									</select>
									<input type="url" placeholder="http://">
								</div>
								<span>
									<a href="#remove" class="remove-social button upload-button">&minus;</a>
									<a href="#add" class="add-social button upload-button">&#43;</a>
								</span>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php
			}
		}
	}
}
add_action( 'customize_register', 'sentio_custom_controls' );

function sentio_notice() {
	if( !class_exists( 'WP_Customize_Notice' ) ) {
		class WP_Customize_Notice extends WP_Customize_Control {
			public $type = 'notice';

			public function render_content() {
				?>
					<div class="sentio-notice"><?php echo $this->description; ?></div>
				<?php
			}


		}
	}
}
add_action( 'customize_register', 'sentio_notice' );