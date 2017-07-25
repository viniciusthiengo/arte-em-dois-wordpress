<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white dh-post'); ?>>
	<div class="post-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : 
			printf( __( '<p>Ready to publish your first post? <a href="%1$s">Get started here</a>.</p>', 'sentio' )
				, esc_url( admin_url( 'post-new.php' ) ) ); 
		elseif ( is_search() ) : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sentio' ); ?></p>
			<?php get_search_form();
		else : ?>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sentio' ); ?></p>
			<?php get_search_form(); 
		endif; ?>
	</div>
</article>