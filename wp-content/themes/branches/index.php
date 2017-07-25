<?php get_header(); ?>

<?php if(is_front_page()){
if ( !is_paged() ) {
$sticky = get_option( 'sticky_posts' );
$args = array(
	'posts_per_page' => 1,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1
);
$query = new WP_Query( $args );
if ( isset($sticky[0]) ) {
?>
	<div class="sticky-post-top">
	<article class="sticky">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_post_thumbnail('branches_big-header-xxlarge'); ?>
		<a href="<?php the_permalink(); ?>" class="post-info-left-top"><?php echo esc_attr( get_the_date() ); ?></a>
		<a href="<?php the_permalink(); ?>" class="post-info-right-top"><?php comments_number( '0 '. __( 'Comments', 'branches' ) .'', '1 '. __( 'Comment', 'branches' ) .'', '%  '. __( 'Comments', 'branches' ) .'' ); ?></a>
		<span class="post-info-left-bottom"><?php the_category( ', ' ); ?></span>
		<?php edit_post_link(__( 'Edit Post', 'branches' ), '<span class="post-info-right-bottom">', '</span>'); ?>
	</article>
	</div>
<?php
}
}
} ?>

<div id="post-area" <?php if( esc_attr( get_theme_mod( 'branches_sidebar_frontpage' ) ) == '') { ?>class="fullwidth"<?php } ?>>

	<?php 
	if(!empty($paged)) {
	    $paged = $paged;
	}elseif(get_query_var( 'paged')) {
	    $paged = get_query_var('paged');
	}elseif(get_query_var( 'page')) {
	    $paged = get_query_var('page');
	}else {
	    $paged = 1;
	}
	$args = array(
	    'ignore_sticky_posts' => 1,
	    'paged' => $paged
	);
	$wp_query = new WP_Query( $args );
	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	
		<?php get_template_part( 'loop' ); ?>
	
	<?php endwhile; ?>
	
		<?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'branches' ),
				'next_text'          => __( 'Next page', 'branches' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'branches' ) . ' </span>',
			) );
		?>
			
	<?php wp_reset_postdata(); ?>

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