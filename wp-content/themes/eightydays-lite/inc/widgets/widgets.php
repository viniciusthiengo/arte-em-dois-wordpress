<?php
require get_template_directory() . '/inc/widgets/recent-posts.php';
require get_template_directory() . '/inc/widgets/about.php';

add_action( 'widgets_init', 'eightydays_register_widgets' );

/**
 * Register widgets.
 */
function eightydays_register_widgets() {
	register_widget( 'EightyDays_Widget_Recent_Posts' );
	register_widget( 'EightyDays_Widget_About' );
}

add_filter( 'wp_list_categories', 'eightydays_widget_archive_count' );
add_filter( 'get_archives_link', 'eightydays_widget_archive_count' );

/**
 * Change markup of archive and category widget to include .count for post count
 *
 * @param string $output
 *
 * @return string
 */
function eightydays_widget_archive_count( $output ) {
	$output = preg_replace( '|\((\d+)\)|', '<span class="count">\\1</span>', $output );

	return $output;
}
