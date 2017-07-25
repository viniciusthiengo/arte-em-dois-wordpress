<?php
class Breviter_Comment_Walker extends Walker_Comment {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'div':
				break;
			case 'ol':
				$output .= '<ol class="children clean-list comments-list">' . "\n";
				break;
			case 'ul':
			default:
				$output .= '<ul class="children clean-list comments-list">' . "\n";
				break;
		}
	}

	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;

		if ( !empty( $args['callback'] ) ) {
			ob_start();
			call_user_func( $args['callback'], $comment, $args, $depth );
			$output .= ob_get_clean();
			return;
		}

		if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
			ob_start();
			$this->ping( $comment, $depth, $args );
			$output .= ob_get_clean();
		} elseif ( 'html5' === $args['format'] ) {
			ob_start();
			$this->html5_comment_new( $comment, $depth, $args );
			$output .= ob_get_clean();
		} else {
			ob_start();
			$this->comment( $comment, $depth, $args );
			$output .= ob_get_clean();
		}
	}

	private function comment_human_time( $comment ) {
		$diff = (int) abs( get_comment_date( 'U', $comment ) - current_time('timestamp') );
		if( $diff <= DAY_IN_SECONDS ) {
			return human_time_diff( get_comment_date( 'U', $comment ) , current_time('timestamp') ) . ' ' . __( 'Ago', 'breviter' );			
		} else {
			return get_comment_date( '', $comment );
		}
	}

	protected function html5_comment_new( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		printf( '<%s id="comment-%s" %s>'
			, $tag
			, get_comment_ID()
			, comment_class( $this->has_children ? 'parent' : '', $comment, null, false ) );

		printf( '<div id="div-comment-%s" class="comment-box box">', get_comment_ID() );

		comment_reply_link( array_merge( $args, array(
			'add_below'		=> 'div-comment',
			'depth'			=> $depth,
			'max_depth'		=> $args['max_depth'],
			'before'		=> '',
			'after'			=> ''
		) ) );

		printf( '<div class="comment-author">%s'
			,  ( 0 != $args['avatar_size'] ? get_avatar( $comment, $args['avatar_size'] ) : '' )
				. sprintf( '<h5 class="author-name">%s</h5>', get_comment_author_link( $comment ) )
				. sprintf( '<time datetime="%s" class="date">%s</time>'
					, get_comment_time( 'c' )
					, $this->comment_human_time( $comment ) ) );

		edit_comment_link( __( 'Edit', 'breviter' ), '<div class="edit-link">', '</div>' );	

		printf( '</div>%s<p class="comment-text">%s</p></div>'
			, '0' == $comment->comment_approved 
				? sprintf( '<div class="comment-in-review">%s</div>'
					, __( 'Your comment is awaiting moderation.', 'breviter' ) ) : ''
			, get_comment_text() );
	}

}