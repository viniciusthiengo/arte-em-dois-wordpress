<?php
/**
 * The template part for displaying an Author biography
 *
 * @package EightyDays
 */

$author_id = get_the_author_meta( 'ID' );
?>
<div class="author-info">
	<div class="author-avatar pull-left">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
	</div>

	<div class="author-description">
		<?php
		$social_links = '';
		if ( $account = get_user_meta( $author_id, 'facebook', true ) ) {
			$social_links .= '<li><a href="' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Facebook', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $account = get_user_meta( $author_id, 'googleplus', true ) ) {
			$social_links .= '<li><a href="' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Google+', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $account = get_user_meta( $author_id, 'twitter', true ) ) {
			$social_links .= '<li><a href="http://twitter.com/' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Twitter', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $account = get_user_meta( $author_id, 'linkedin', true ) ) {
			$social_links .= '<li><a href="' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Linkedin', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $account = get_user_meta( $author_id, 'instagram', true ) ) {
			$social_links .= '<li><a href="' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Instagram', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $account = get_user_meta( $author_id, 'dribbble', true ) ) {
			$social_links .= '<li><a href="' . esc_url( $account ) . '"><span class="screen-reader-text">' . esc_html__( 'Dribbble', 'eightydays-lite' ) . '</span></a></li>';
		}
		if ( $social_links && eightydays_is_genericons_enqueued() ) {
			echo '<ul class="jetpack-social-navigation">', $social_links, '</ul>';
		}
		?>
		<div class="author-title">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" rel="author"><?php the_author(); ?></a>
		</div>
		<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
	</div>
</div>
