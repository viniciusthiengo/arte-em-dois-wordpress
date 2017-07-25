<?php $sticky_helper = is_sticky(get_the_ID()) && !is_singular() ? ' post-sticky' : ''; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post large box' .  $sticky_helper ); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<figure class="blog-post-cover">
			<?php is_single()	
				? the_post_thumbnail()
				: printf( '<a href="%s">%s</a>', get_the_permalink(), get_the_post_thumbnail() ); ?>
		</figure>
	<?php endif; ?>

	<div class="blog-post-body">
		<?php 
			printf( '<ul class="clean-list post-categories align-center"><li>%s</li></ul>'
				, get_the_category_list( '</li><li>' ) );

			printf( '<h2 class="post-title align-center">%s</h2>'
				, is_single() ? get_the_title() 
					: sprintf( '<a href="%s">%s</a>', get_the_permalink(), get_the_title() ) );?>

		<div class="post-content-box <?php has_excerpt() ? 'align-center' : ''; ?> ">
			<?php 
				if( ! is_single() && has_excerpt() ) {
					the_excerpt();
				} else {
					the_content();
				} 

				wp_link_pages( array(
					'before'      => '<div class="post-links align-center">' . __( 'Post sections:', 'breviter' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

				if( is_single() ) {
					echo get_the_tag_list('<ul class="inline-list post-tags"><li>', '</li><li>', '</li></ul>');
				} ?>
		</div>
	</div>

	<footer class="blog-post-footer">
		<?php printf('<span class="post-date">%s</span>', get_the_date()); ?>
		<?php 
			if( has_post_thumbnail() ):
				$image_to_share = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			endif;
			$image_to_share = !empty( $image_to_share[0] ) ? $image_to_share[0] : '';
		?>
		<?php if( !is_singular() ): ?>
		<?php printf( '<a href="%s" class="post-link">%s</a>', get_the_permalink(), esc_html__( 'Read more', 'breviter' ) ); ?>
		<?php endif; ?>
	</footer>
</article>

<?php if( is_single() && get_the_author_meta( 'description' ) ): ?>
	<div class="author-bio box">
		<div class="author-block">
			<div class="image">
				<?php printf( '<a href="%s" role="author">%s</a>'
					, esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
					, get_avatar( get_the_author_meta( 'user_email' )
						, apply_filters( 'breviter_author_bio_thumb', 105 )  ) ); ?>
			</div>
			<?php printf( '<h5 class="author-name"><a href="%s" role="author">%s</a></h5>'
				, esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
				, get_the_author() );

				printf( '<p class="author-info">%s</p>', get_the_author_meta( 'description' ) ); ?>
		</div>
	</div>
<?php endif; ?>
<?php if( is_single() ): 
	$tags = wp_get_post_tags( get_the_ID() );
	$tags_id = array();

	foreach ($tags as $tag) {
		$tags_id[] = $tag->term_id;
	}

	if( ! empty( $tags_id ) ): ?>
		<div class="related-posts">
			<div class="row row-fit-20">
				<?php $posts = wp_get_recent_posts( array(
					'tag__in' => $tags_id,
					'post__not_in' => array(get_the_ID()),
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1,
					'orderby' => 'rand',
					'post_status' => 'publish'
				) );

				foreach( $posts as $post ): ?>
					<div class="col-xs-4">
						<div class="related-post">
							<?php printf( '<a href="%s"><h5 class="post-title">%s</h5>%s</a>'
								, get_the_permalink( $post['ID'] )
								, get_the_title( $post['ID'] )
								, has_post_thumbnail( $post['ID'] )
									? get_the_post_thumbnail( $post['ID'], 'full' ) : '<span></span>' ); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php wp_reset_postdata(); endif; ?>

<?php endif; ?>

<?php comments_template(); ?>