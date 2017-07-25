<?php
/**
 * Functions related to post excerpt.
 * @package EightyDays
 */

add_filter( 'excerpt_more', 'eightydays_excerpt_more' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function eightydays_excerpt_more() {
	return '&hellip;';
}

add_filter( 'excerpt_length', 'eightydays_excerpt_length' );

/**
 * Change excerpt length
 * @return int
 */
function eightydays_excerpt_length() {
	return 25;
}