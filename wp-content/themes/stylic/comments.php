<?php
/**
 * The template for displaying Comments.
 **/
if ( post_password_required() ) return; ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <ul class="comment-area">
            <?php wp_list_comments(array('avatar_size' => 80,'status' => 'approve', 'style' => 'li', 'short_ping' => true)); ?>
        </ul>
        <?php the_comments_pagination(); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="comments-count">
            <h5> <?php comments_number(); ?></h5>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 leave_form">
        <?php comment_form( $args = array(), $post_id = null ); ?>
    </div>
</div>