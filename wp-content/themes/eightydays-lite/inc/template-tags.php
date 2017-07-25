<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EightyDays
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function eightydays_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
	}
	printf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function eightydays_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		the_tags( '<div class="post-tags">', '', '</div>' );
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'eightydays-lite' ), esc_html__( '1 Comment', 'eightydays-lite' ), esc_html__( '% Comments', 'eightydays-lite' ) );
		echo '</span>';
	}
}

add_filter( 'get_the_archive_title', 'eightydays_archive_title' );

/**
 * Change title of category page
 *
 * @param string $title
 *
 * @return string
 */
function eightydays_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_home() && ! is_front_page() ) {
		$title = get_the_title( get_option( 'page_for_posts' ) );
	} elseif ( is_search() ) {
		$title = esc_html__( 'Search results', 'eightydays-lite' );
	}

	return $title;
}

/**
 * Getter function for Featured Content.
 *
 * @return array An array of WP_Post objects.
 */
function eightydays_get_featured_posts() {
	return apply_filters( 'eightydays_get_featured_posts', array() );
}

/**
 * Check if genericons is enqueued or not.
 * @return bool
 */
function eightydays_is_genericons_enqueued() {
	return wp_style_is( 'jetpack-social-menu' ) || wp_style_is( 'jetpack_css' );
}
