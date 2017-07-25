<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EightyDays
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		<div class="entry-meta">
			<div class="categories"><?php the_category( ', ' ); ?></div>
		</div>
		<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 22 ); ?>
				<span class="by"><?php esc_html_e( 'by', 'eightydays-lite' ); ?></span>
				<?php the_author(); ?>
			</a>
			<span class="separator">/</span>
			<?php eightydays_posted_on(); ?>
		</div>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-media">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content clearfix">
		<?php if ( eightydays_is_genericons_enqueued() ) : ?>
			<aside class="share-box">
				<h6><?php esc_html_e( 'Share on ', 'eightydays-lite' ); ?></h6>
				<?php
				require_once get_template_directory() . '/inc/social-buttons.php';
				$social_buttons = new EightyDays_Social_Buttons();
				$social_buttons->render();
				?>
			</aside>
		<?php endif; ?>

		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eightydays-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php eightydays_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
