<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() ) : ?>

	<div class="comments-container">
	
		<div class="comments-inner">
		
			<a name="comments"></a>
			
			<div class="comments-title-container">
			
				<h2 class="comments-title">
					<?php comments_number( '0 '. __( 'Comments', 'branches' ) .'', '1 '. __( 'Comment', 'branches' ) .'', '%  '. __( 'Comments', 'branches' ) .'' ); ?>
				</h2>
				
				<div class="clear"></div>
			
			</div>
		
			<div class="comments">
		
				<ol class="commentlist">
				    <?php wp_list_comments( array( 'type' => 'comment') ); ?>
				</ol>
						
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					
					<div class="comments-nav" role="navigation">
					
						<div class="fleft">
											
							<?php previous_comments_link( '&larr; ' . __( 'Previous', 'branches' ) ); ?>
						
						</div>
						
						<div class="fright">
						
							<?php next_comments_link( __( 'Next', 'branches' ) . ' &rarr;' ); ?>
						
						</div>
						
						<div class="clear"></div>
						
					</div> <!-- /comment-nav-below -->
					
				<?php endif; ?>
				
			</div> <!-- /comments -->
			
		</div> <!-- /comments-inner -->
		
	</div> <!-- /comments-container -->
	
<?php endif; ?>


<?php $comments_args = array(

	'comment_notes_before' => 
		'',
		
	'comment_notes_after' =>
		'',

	'comment_field' => 
		'<p class="comment-form-comment">
			<label for="comment">' . __('Comment','branches') . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
			<textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
		</p>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' =>
			'<p class="comment-form-author">
				<label for="author">' . __('Name','branches') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
				<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
			</p>',
		
		'email' =>
			'<p class="comment-form-email">
				<label for="email">' . __('Email','branches') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
				<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />
			</p>',
		
		'url' =>
			'<p class="comment-form-url">
				<label for="url">' . __('Website','branches') . '</label>
				<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</p>')
	),
);

if ( comments_open() ) { echo '<div class="respond-container">'; }

comment_form($comments_args);

if ( comments_open() ) { echo '</div> <!-- /respond-container -->'; }

?>