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
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-media">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="entry-text">

		<header class="entry-header">
			<div class="entry-meta">
				<div class="categories"><?php the_category( ', ' ); ?></div>
			</div>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<div class="entry-meta">
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 22 ); ?>
					<span class="by"><?php esc_html_e( 'by', 'eightydays-lite' ); ?></span>
					<?php the_author(); ?>
				</a>
				<span class="separator">/</span>
				<?php eightydays_posted_on(); ?>
			</div>
		</header>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

		<footer class="share">
			<?php
			require_once get_template_directory() . '/inc/social-buttons.php';
			$social_buttons = new EightyDays_Social_Buttons();
			$social_buttons->render();
			?>
		</footer>
	</div>
</article>
