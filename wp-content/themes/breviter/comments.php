<?php
global $wp_query;

if ( post_password_required() ) {
    return;
}

if ( have_comments() ) {
	require_once get_template_directory() . '/inc/comment-walker.php';

    echo '<div class="comments-area">';

    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<h3 class="comments-popup-link text-center">';
        comments_popup_link(  '0 '. __('Comments', 'breviter'),
                              '1 '. __('Comment', 'breviter'),
                              '% '. __('Comments', 'breviter'));

        echo '</h3>';
}

$args = array(
    'walker'            => new Breviter_Comment_Walker(),
    'max_depth'         => '',
    'style'             => 'ul',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => '<i class="icon-pencil"></i>',
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 75,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5', //or html5 @since 3.6
    'short_ping'        => true // @since 3.6
);

echo '<' . $args['style'].' id="comments" class="clean-list comments-list">';
    wp_list_comments($args);
echo '</' . $args['style'] . '>';

printf('<div class="comments-pagination align-right">%s</div>'
	, paginate_comments_links( array('prev_next' => false, 'echo' => false) ) );

echo '</div>';
}

$commenter = wp_get_current_commenter();
$req      = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$html_req = ( $req ? " required='required'" : '' );
$fields = array(
	'author' => sprintf( '<div class="row row-fit-20"><div class="col-md-4 col-sm-6">
		<input id="author" name="author" type="text" class="form-input check-value" value="%s" placeholder="%s" %s></div>'
			, esc_attr( $commenter['comment_author'] )
			, __( 'Your name *', 'breviter' )
			, $aria_req . $html_req ),
	'email' => sprintf( '<div class="col-md-4 col-sm-6">
		<input id="email" name="email" type="email" class="form-input check-value" value="%s" placeholder="%s" aria-describedby="email-notes" %s></div>'
			, esc_attr( $commenter['comment_author_email'] )
			, __( 'Your email *', 'breviter' )
			, $aria_req . $html_req ),
	'url' => sprintf( '<div class="col-md-4 col-sm-6">
		<input id="url" name="url" type="url" class="form-input check-value" value="%s" placeholder="%s" %s></div></div>'
			, esc_attr( $commenter['comment_author_url'] )
			, __( 'Your URL', 'breviter' )
			, $aria_req . $html_req )
);

$args = array(
	'fields'			 => $fields,
	'id_form'			 => 'commentform',
	'class_form'		 => 'comment-form',
	'id_submit'			 => 'comment-submit',
	'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after'  => '</h4>',
	'title_reply'		 => __( 'Leave a comment', 'breviter' ),
	'title_reply_to'	 => __( 'Leave a comment to %s', 'breviter' ),
	'cancel_reply_link'	 => __( 'Cancel reply', 'breviter' ),
	'label_submit'		 => __( 'Leave a comment', 'breviter' ),
	'class_submit'		 => 'btn submit-btn',
	'submit_button'      => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
	'submit_field'       => '<div class="form-submit">%1$s %2$s</div>',
	'comment_field'		 =>	sprintf( '<div class="row row-fit-20"><div class="col-xs-12">
		<textarea id="comment" class="form-input check-value" name="comment" cols="45" rows="8" placeholder="%s" aria-required="true" required="required">
		</textarea></div></div>', __( 'Your comment', 'breviter' ) ),
	'format'			 => 'html5'
);
ob_start();
comment_form($args); 
echo str_replace( '"comment-respond"', '"comment-respond respond-area box"', ob_get_clean() );