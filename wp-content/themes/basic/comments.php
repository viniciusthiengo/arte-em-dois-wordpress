<?php
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>
	<h3 class="comments-title"><?php _e('Comments', 'basic'); ?> <span class="cnt"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%' );?></span></h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<div class="comment-navigation">
			<div class="nav-prev"><?php previous_comments_link( __('&larr; Older Comments', 'basic') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;', 'basic') ); ?></div>
		</div>
		<?php endif; ?>

		<?php do_action( 'basic_before_comment_list' ); ?>
		<ul class="comment-list">
			<?php 
				$comm_args = array( 
					'avatar_size' => '60',
					'callback' => 'basic_html5_comment' 
				);
				if ( basic_get_theme_option('schema_mark') ) {
					$comm_args['callback'] = 'basic_schemaorg_html5_comment';
				}
				wp_list_comments( $comm_args ); 
			?>
		</ul><!-- .comment-list -->
		<?php do_action( 'basic_after_comment_list' ); ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<div class="comment-navigation">
			<div class="nav-prev"><?php previous_comments_link( __('&larr; Older Comments', 'basic') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;', 'basic') ); ?></div>
		</div>
		<?php endif; ?>

<?php endif; // have_comments()

	do_action( 'basic_before_comment_form' );
	comment_form();
	do_action( 'basic_after_comment_form' ); ?>

</div><!-- #comments -->