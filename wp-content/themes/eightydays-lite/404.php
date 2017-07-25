<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EightyDays
 */
get_header(); ?>

	<h1 class="not-found-title"><?php esc_html_e( '404', 'eightydays-lite' ); ?></h1>
	<h2 class="not-found-message"><?php esc_html_e( 'Oops! Looks like that page isn\'t here.', 'eightydays-lite' ); ?></h2>
	<a class="not-found-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'eightydays-lite' ); ?></a>

<?php
get_footer();
