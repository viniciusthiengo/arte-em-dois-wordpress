<?php

$markup_opt = basic_get_theme_option( 'schema_mark' ); // false or 0
$markup = ( is_single() && ( $markup_opt || false === $markup_opt ) ) ? true : false;

?>

<?php do_action( 'basic_before_post_article' ); ?>
<article <?php post_class(); ?><?php echo ( $markup ) ? ' itemscope itemtype="http://schema.org/Article"' : ''; ?>><?php

	do_action( 'basic_before_post_title' );
	if ( is_single() ) :

		do_action( 'basic_single_before_title' ); ?>
		<h1<?php echo ( $markup ) ? ' itemprop="headline"' : ''; ?>><?php the_title(); ?></h1>
		<?php do_action( 'basic_single_after_title' );

	else:

		do_action( 'basic_postexcerpt_before_title' ); ?>
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php do_action( 'basic_postexcerpt_after_title' );

	endif;
	do_action( 'basic_after_post_title' );

	/**
	 * @hooked basic_get_postmeta() - 10
	 */
	do_action( 'basic_before_content' ); ?>
	<div class="entry-box clearfix" <?php if ( $markup ) { echo "itemprop='articleBody'"; } ?>>

		<?php
		if ( ! is_single() ) {

			$thumbnail_size = apply_filters( 'basic_singular_thumbnail_size', 'medium' );
			$attributes     = apply_filters( 'basic_singular_thumbnail_attr', array('class'=>'thumbnail') );

			if ( has_post_thumbnail() ) {
				$show_thumb = ( get_theme_mod('show_mobile_thumb') ) ? ' show' : '';
				do_action( 'basic_before_post_thumbnail' ); ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="anons-thumbnail<?php echo $show_thumb; ?>">
					<?php the_post_thumbnail( $thumbnail_size, $attributes ); ?>
				</a>
				<?php do_action( 'basic_after_post_thumbnail' );
			}

			do_action( 'basic_before_post_excerpt' );
			the_excerpt();
			do_action( 'basic_after_post_excerpt' );

			/* @since 1.1.7 more link html code located in /inc/html-blocks.php and @hooked to `basic_after_post_excerpt` */

		} else {

			do_action( 'basic_before_single_content' );
			the_content( '' );
			do_action( 'basic_after_single_content' );

		} ?>

	</div> <?php
	do_action( 'basic_after_content' );


	if ( is_single() ) { ?>
		<aside class="meta"><?php the_tags(); ?></aside>
	<?php }

	if ( $markup ) {
		basic_markup_schemaorg();
	} ?>

	<?php do_action( 'basic_before_close_post_article' ); ?>
</article>
<?php do_action( 'basic_after_post_article' ); ?>

