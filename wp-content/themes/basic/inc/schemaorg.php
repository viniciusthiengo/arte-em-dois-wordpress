<?php


/* ========================================================================== *
 * Schema.org COMMENT callback
 * ========================================================================== */
if ( ! function_exists( 'basic_schemaorg_html5_comment' ) ) :
	function basic_schemaorg_html5_comment( $comment, $args, $depth ) {

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> itemscope itemtype="http://schema.org/Comment">
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<footer class="comment-meta">
				<div class="comment-author">
					<?php if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					} ?>
					<b class="fn" itemprop="author"><?php comment_author_link(); ?></b>
				</div>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>" itemprop="datePublished">
							<?php printf( __( '%1$s at %2$s', 'basic' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'basic' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'basic' ); ?></p>
				<?php endif; ?>
			</footer>

			<div class="comment-content" itemprop="text">
				<?php comment_text(); ?>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					)
				) ); ?>
			</div>

		</div>

		<?php
	}
endif;
/* ========================================================================== */


/* ==========================================================================
 *  ECHO markup Schema.org
 * ========================================================================== */
if ( ! function_exists( 'basic_markup_schemaorg' ) ) :
	function basic_markup_schemaorg() {

		global $post;

		$markup   = ( is_single() && basic_get_theme_option( 'schema_mark' ) ) ? true : false;
		$logo     = ( $markup && basic_get_theme_option( 'markup_logo' ) ) ? basic_get_theme_option( 'markup_logo' ) : get_template_directory_uri() . '/img/logo.jpg';
		$adress   = ( $markup && basic_get_theme_option( 'markup_adress' ) ) ? basic_get_theme_option( 'markup_adress' ) : 'Russia';
		$phone    = ( $markup && basic_get_theme_option( 'markup_telephone' ) ) ? basic_get_theme_option( 'markup_telephone' ) : '+7 (000) 000-000-00';
		$img_attr = ( has_post_thumbnail( $post->ID ) )
			? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )
			: array( get_template_directory_uri() . '/img/default.jpg', 80, 80 );

		?><!-- Schema.org Article markup -->
		<div class="markup">

			<meta itemscope itemprop="mainEntityOfPage" content="<?php the_permalink() ?>" />

			<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<link itemprop="url" href="<?php echo $img_attr[0]; ?>">
				<link itemprop="contentUrl" href="<?php echo $img_attr[0]; ?>">
				<meta itemprop="width" content="<?php echo $img_attr[1]; ?>">
				<meta itemprop="height" content="<?php echo $img_attr[2]; ?>">
			</div>

			<meta itemprop="datePublished" content="<?php echo get_the_time( 'c' ) ?>">
			<meta itemprop="dateModified" content="<?php the_modified_time( 'c' ) ?>" />
			<meta itemprop="author" content="<?php the_author() ?>">

			<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				<meta itemprop="name" content="<?php bloginfo( 'blogname' ); ?>">
				<meta itemprop="address" content="<?php echo $adress; ?>">
				<meta itemprop="telephone" content="<?php echo $phone; ?>">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<link itemprop="url" href="<?php echo $logo; ?>">
					<link itemprop="contentUrl" href="<?php echo $logo; ?>">
				</div>
			</div>

		</div>
		<!-- END markup -->
		<?php

	}
endif;
/* ========================================================================== */