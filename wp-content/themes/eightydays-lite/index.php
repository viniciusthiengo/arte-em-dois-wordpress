<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EightyDays
 */
get_header(); ?>

<?php
// Display featured posts on the homepage.
if ( is_front_page() ) {
	get_template_part( 'template-parts/featured-content' );
}
?>

	<div class="row">
		<div class="col-md-9">

			<?php if ( ! is_front_page() ) : ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>

				<div class="row" id="content">

					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					?>

				</div>

				<?php
				the_posts_navigation( array(
					'prev_text' => '&larr; ' . esc_html__( 'Older posts', 'eightydays-lite' ),
					'next_text' => esc_html__( 'Newer posts', 'eightydays-lite' ) . ' &rarr;',
				) );
				?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
