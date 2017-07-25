<?php get_header(); ?>

<div id="post-area" <?php if( esc_attr( get_theme_mod( 'branches_sidebar_frontpage' ) ) == '') { ?>class="fullwidth"<?php } ?>>
	
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'loop' ); ?>
	
	<?php endwhile; ?>
	
		<?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'branches' ),
				'next_text'          => __( 'Next page', 'branches' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'branches' ) . ' </span>',
			) );
		?>
			
 	<?php endif; ?>

	<div class="clear"></div>
</div>

<?php if( esc_attr( get_theme_mod( 'branches_sidebar_frontpage' ) ) == '') { ?>

<?php } else { ?>
<div id="sidebar">
	<?php get_sidebar(); ?>
</div>
<?php } ?>

<div class="clear"></div>
        
<?php get_footer(); ?>