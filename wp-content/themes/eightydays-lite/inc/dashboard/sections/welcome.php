<?php
/**
 * Welcome section.
 *
 * @package EightyDays Lite
 */

?>
<h1>
	<?php
	// Translators: %1$s - Theme name, %2$s - Theme version.
	echo esc_html( sprintf( __( 'Welcome to %1$s - Version %2$s', 'eightydays-lite' ), $this->theme->name, $this->theme->version ) );
	?>
</h1>
<div class="about-text"><?php echo esc_html( $this->theme->description ); ?></div>
<a target="_blank" href="<?php echo esc_url( "https://gretathemes.com/?utm_source=theme_dashboard&utm_medium=badge_link&utm_campaign={$this->slug}_dashboard" ); ?>" class="wp-badge">GretaThemes</a>
