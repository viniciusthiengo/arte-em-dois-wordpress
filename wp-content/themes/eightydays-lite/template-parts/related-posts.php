<?php
/**
 * Display related posts by categories.
 *
 * @package EightyDays
 */

$categories    = get_the_category();
$categories    = wp_list_pluck( $categories, 'term_id' );
$related_posts = new WP_Query( array(
	'post_type'              => 'post',
	'posts_per_page'         => 3,
	'category__in'           => $categories,
	'post__not_in'           => array( get_the_ID() ),
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
) );
if ( ! $related_posts->have_posts() ) {
	return;
}
?>
<div class="related-posts text-center clearfix row">
	<h4 class="section-title col-md-12"><span><?php esc_html_e( 'You might also like', 'eightydays-lite' ); ?></span></h4>
	<?php while ( $related_posts->have_posts() ) : ?>
		<?php $related_posts->the_post(); ?>
		<div class="related-post col-sm-4">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-media">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'eightydays-related' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="related-post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="related-post-date">
				<?php the_time( get_option( 'date_format' ) ); ?>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
</div>