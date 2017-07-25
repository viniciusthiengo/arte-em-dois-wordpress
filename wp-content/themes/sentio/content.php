<?php $sticky_helper = is_sticky( get_the_ID() ) && !is_singular() ? ' post-sticky' : ''; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white dh-post' .  $sticky_helper ); ?>>
	<?php if( has_post_thumbnail() ): ?>
		<div class="post-thumb" <?php echo is_sticky() 
			&& !is_singular() ? 'style="background-image: url('
				. wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) .')"' : ''; ?>>
			<?php if( is_singular() ): the_post_thumbnail();
			else: if( !is_sticky() ): ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			<?php endif; endif; ?>
		</div>
	<?php endif; ?>
	
	<div class="post-content">
		<?php
			if ( is_single() || is_page() ) :
				the_title( '<h3 class="post-title text-center">', '</h3>' );
			else:
				the_title( sprintf( '<h3 class="post-title text-center"><a href="%s" class="text-alpha" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			endif;
		?>
		<h5 class="post-categories text-center text-beta font-alpha text-uppercase"><?php echo get_the_category_list('<b></b>'); ?></h5>
		<div class="post-body-content">
			<?php if( !is_single() && has_excerpt() ): the_excerpt(); 
			else: the_content( __( 'Keep reading', 'sentio' ) ); endif; ?>
		</div>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="post-links align-center">' . __( 'Post sections:', 'sentio' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
		<?php if( !is_page() ): ?>
		<footer class="post-meta">
			<div class="row">
				<div class="col-md-6">
					<?php printf('<time class="post-date">%s</time>', get_the_date());
					echo get_the_tag_list('<ul class="inline-list post-tags"><li>', '</li><li>', '</li></ul>'); ?>
				</div>
				<div class="col-md-6">
					<div class="align-right">
						<?php if( function_exists( 'sentio_share' ) ): ?>
							<?php sentio_share( true, get_the_permalink(), get_the_title() ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>
		<?php endif; ?>
	</div>
</article>

<?php if( is_single() && get_the_author_meta( 'description' ) ): ?>
<div class="author-info bg-white text-center">
	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" role="author">
	<?php
		$author_bio_avatar_size = apply_filters( 'sentio_author_bio_avatar_size', 100 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
	?>
	</a>
	<h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" role="author"><?php echo get_the_author(); ?></a></h4>
	<div class="author-description">
		<?php the_author_meta( 'description' ); ?>
	</div>
</div>
<?php endif; ?>

<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post()
?>

<?php if( is_single() && (!empty( $prev_post ) || !empty( $next_post )) ): ?>
	<div class="post-extralink">
		<div class="row">
			<div class="col-sm-6">
				<?php if( !empty( $prev_post ) ): ?>
					<div class="post-prev bg-white">
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<em style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($prev_post->ID), 'full' ); ?>);"></em>
					</a>
					<span><?php  _e('Previous', 'sentio'); ?></span>
					<h5><?php echo  get_the_title($prev_post->ID) ?></h5>
				 	</div>
				<?php endif; ?>
			</div>
				
			<div class="col-sm-6">
				<?php if( !empty( $next_post ) ): ?>
					<div class="post-next bg-white">
						<a href="<?php echo get_permalink( $next_post->ID ); ?>">
							<em style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($next_post->ID), 'full' ); ?>);"></em>
						</a>
						<span><?php  _e('Next', 'sentio'); ?></span>
						<h5><?php echo get_the_title($next_post->ID) ?></h5>
				 	</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif;
comments_template(); ?>