<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EightyDays
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area clearfix">
	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title section-title">
			<span><?php comments_number( esc_html__( 'No Comments', 'eightydays-lite' ), esc_html__( '1 Comment', 'eightydays-lite' ), esc_html__( '% Comments', 'eightydays-lite' ) ); ?></span>
		</h4>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 48,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation( array(
			'prev_text' => '&larr; ' . esc_html__( 'Older comments', 'eightydays-lite' ),
			'next_text' => esc_html__( 'Newer comments', 'eightydays-lite' ) . ' &rarr;',
		) );
		?>
	<?php endif; ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'eightydays-lite' ); ?></p>
		<?php
	endif;

	comment_form();
	?>
</div><!-- #comments -->
