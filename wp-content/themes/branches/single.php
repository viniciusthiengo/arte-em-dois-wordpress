<?php get_header(); ?>

<?php if( esc_attr( get_theme_mod( 'branches_show_header_singlepost' ) ) == '') { } else { ?>
<div class="sticky-post-top">
	<article class="sticky">
		<?php the_post_thumbnail('branches_big-header-xxlarge'); ?>
	</article>
</div>
<?php } ?>

<div id="post-area" class="single-post-wrapper <?php if( esc_attr( get_theme_mod( 'branches_sidebar_singlepage' ) ) == '') { ?>fullwidth<?php } ?>">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	<div id="single-post" <?php if( esc_attr( get_theme_mod( 'branches_show_header_singlepost' ) ) == '') { } else { ?>style="margin-top: 40px;"<?php } ?>>
		
		<h1><?php the_title(); ?></h1>
		
		<div class="post-info">
			<?php echo esc_attr( get_the_date() ); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php _e('by','branches'); ?> <span class="bypostauthor"><?php echo esc_attr( get_the_author() ); ?></span>
			<?php edit_post_link(__( 'Edit Post', 'branches' ), '&nbsp;&nbsp;|&nbsp;&nbsp;', ''); ?>
		</div>
		
		<div class="entry">
			
			<?php the_content(); ?>
			
		</div>
		
		<?php wp_link_pages( array(
			'before'      => '<nav class="navigation pagination"><div class="nav-links">',
			'after'       => '</div></nav>',
			'link_before' => '<span class="page-numbers">',
			'link_after'  => '</span>',
			) );
		?>
		
		<div class="tag-list">
		<?php the_tags( 'Tags: ', ', ', '' ); ?> 
		</div>
		
		<?php comments_template( '', true ); ?>
		
	</div>
<?php endwhile; ?>
<?php endif; ?>
</div>

<?php if( esc_attr( get_theme_mod( 'branches_sidebar_singlepage' ) ) == '') { ?>

<?php } else { ?>
<div id="sidebar">
	<?php get_sidebar(); ?>
</div>
<?php } ?>

<div class="clear"></div>

<?php get_footer(); ?>