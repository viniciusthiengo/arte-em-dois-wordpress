<?php
/**
 * The template for displaying all single posts.
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package EightyDays
 */
get_header(); ?>
	<div class="row">
		<div class="col-md-9" id="content">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation( array(
					'prev_text' => '&larr; %title',
					'next_text' => '%title &rarr;',
				) );

				if ( get_the_author_meta( 'description' ) ) {
					get_template_part( 'template-parts/biography' );
				}

				get_template_part( 'template-parts/related-posts' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</div>

		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
