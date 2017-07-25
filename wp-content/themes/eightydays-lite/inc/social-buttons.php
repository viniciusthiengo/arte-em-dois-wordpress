<?php

/**
 * Social buttons class.
 * @package EightyDays
 */
class EightyDays_Social_Buttons {
	/**
	 * Render social buttons
	 */
	public function render() {
		if ( ! eightydays_is_genericons_enqueued() ) {
			return;
		}
		echo '<ul class="jetpack-social-navigation">';
		$link     = get_permalink();
		$text     = get_the_title();
		$img_link = get_the_post_thumbnail_url();
		$this->facebook( $link );
		$this->twitter( $link, $text );
		$this->googleplus( $link );
		if ( $img_link ) {
			$this->pinterest( $link, $text, $img_link );
		}
		$this->linkedin( $link, $text );
		echo '</ul>';
	}

	/**
	 * Generate HTML for a single Share Button
	 *
	 * @param string $link
	 */
	public function facebook( $link ) {
		printf(
			'<li><a target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Share this on Facebook', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'u' => rawurlencode( $link ),
			), 'https://www.facebook.com/sharer/sharer.php' ) ) ),
			esc_html__( 'Facebook', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Twitter Button
	 *
	 * @param string $link
	 * @param string $text
	 */
	public function twitter( $link, $text ) {
		printf(
			'<li><a class="twitter" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Tweet on Twitter', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'url'  => rawurlencode( $link ),
				'text' => rawurlencode( $text ),
			), 'https://twitter.com/intent/tweet' ) ) ),
			esc_html__( 'Twitter', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Google+ Button
	 *
	 * @param string $link
	 */
	public function googleplus( $link ) {
		printf(
			'<li><a class="googleplus" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Share on Google+', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'url' => rawurlencode( $link ),
			), 'https://plus.google.com/share' ) ) ),
			esc_html__( 'Google+', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Linkedin Button
	 *
	 * @param string $link
	 * @param string $text
	 */
	public static function linkedin( $link, $text ) {
		printf(
			'<li><a class="linkedin" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Share on LinkedIn', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'mini'  => 'true',
				'url'   => rawurlencode( $link ),
				'title' => rawurlencode( $text ),
			), 'http://www.linkedin.com/shareArticle' ) ) ),
			esc_html__( 'Linkedin', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Pinterest Button
	 *
	 * @param string $link
	 * @param string $text
	 * @param string $img_link
	 */
	public static function pinterest( $link, $text, $img_link ) {
		printf(
			'<li><a class="pinterest" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Pin it on Pinterest', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'url'         => rawurlencode( $link ),
				'media'       => rawurlencode( $img_link ),
				'description' => rawurlencode( $text ),
			), 'http://pinterest.com/pin/create/button' ) ) ),
			esc_html__( 'Pinterest', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Reddit Button
	 *
	 * @param string $link
	 * @param string $text
	 */
	public static function reddit( $link, $text ) {
		printf(
			'<li><a class="reddit" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Submit to Reddit', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'url'   => rawurlencode( $link ),
				'title' => rawurlencode( $text ),
			), '//www.reddit.com/submit' ) ) ),
			esc_html__( 'Reddit', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single StumbleUpon Button
	 *
	 * @param string $link
	 * @param string $text
	 */
	public static function stumbleupon( $link, $text ) {
		printf(
			'<li><a class="stumbleupon" target="_blank" title="%s" href="%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Submit to StumbleUpon', 'eightydays-lite' ),
			esc_url( htmlentities( add_query_arg( array(
				'url'   => rawurlencode( $link ),
				'title' => rawurlencode( $text ),
			), 'http://www.stumbleupon.com/submit' ) ) ),
			esc_html__( 'StumbleUpon', 'eightydays-lite' )
		);
	}

	/**
	 * Generate HTML for a single Email Button
	 *
	 * @param string $link
	 * @param string $text
	 */
	public static function email( $link, $text ) {
		printf(
			'<li><a class="email" target="_blank" title="%s" href="mailto:?subject=%s&amp;body=%s"><span class="screen-reader-text">%s</span></a></li>',
			esc_attr__( 'Send via email', 'eightydays-lite' ),
			rawurlencode( $text ),
			rawurlencode( $link ),
			esc_html__( 'Email', 'eightydays-lite' )
		);
	}
}
