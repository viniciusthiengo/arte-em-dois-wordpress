<?php get_header(); ?>

<div id="post-area" <?php if( esc_attr( get_theme_mod( 'branches_sidebar_frontpage' ) ) == '') { ?>class="fullwidth"<?php } ?>>
	

<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'branches' ), '' . get_search_query() . '' ); ?></h1>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop' ); ?>
			<?php endwhile; ?>
<?php else : ?>
		<div id="single-post">
		<h1 class="page-title"><?php printf( esc_html__( 'Nothing Found', 'branches' ) ); ?></h1>
			<div class="entry">
			<p><?php printf( esc_html__( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'branches' ) ); ?></p>
			</div>
		</div>
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