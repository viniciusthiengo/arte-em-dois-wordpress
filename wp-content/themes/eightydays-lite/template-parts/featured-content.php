<?php
/**
 * Display featured content on the homepage.
 */

$featured_posts = eightydays_get_featured_posts();
if ( empty( $featured_posts ) ) {
	return;
}
?>
	<div class="clearfix featured-posts featured-posts-tiled">
		<?php
		$post = array_shift( $featured_posts );
		setup_postdata( $post );
		?>
		<article class="featured-posts-tiled-big">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'eightydays-featured-big' ); ?>
				<div class="featured-posts-tiled-text">
					<?php
					$category = get_the_category();
					$category = reset( $category );
					?>
					<div class="entry-meta">
						<div class="categories"><?php echo esc_html( $category->name ); ?></div>
					</div>
					<h3 class="entry-title"><?php the_title(); ?></h3>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</a>
		</article>
		<?php foreach ( $featured_posts as $post ): setup_postdata( $post ); ?>
			<article class="featured-posts-tiled-small">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'eightydays-featured-small' ); ?>
					<div class="featured-posts-tiled-text">
						<?php
						$category = get_the_category();
						$category = reset( $category );
						?>
						<div class="entry-meta">
							<div class="categories"><?php echo esc_html( $category->name ); ?></div>
						</div>
						<h3 class="entry-title"><?php the_title(); ?></h3>
					</div>
				</a>
			</article>
		<?php endforeach; ?>
	</div>
<?php
wp_reset_postdata();
