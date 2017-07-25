<?php
/*
 * icoach Main Sidebar
 */
function icoach_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'icoach'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'icoach'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'icoach_widgets_init');
/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function icoach_entry_meta() {

	$icoach_categories_list = get_the_category_list(', ','');
	$icoach_tag_list = get_the_tag_list('', ', ' );
	$icoach_author= ucfirst(get_the_author());
	$icoach_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$icoach_comments = wp_count_comments(get_the_ID()); 	
	$icoach_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y')));
?>	
    <p><?php _e('By : ', 'icoach'); ?><a href="<?php echo $icoach_author_url; ?>" rel="tag"><?php echo $icoach_author; ?></a> - <?php echo $icoach_date; ?></p>
<?php 	
}
/*
* Function For Tag Meta List
*/
function icoach_tag_meta() {

	$icoach_tag_list = get_the_tag_list('', ', #' );

	if(!empty($icoach_tag_list)) { ?>
	<div class=""><span ><?php _e('Tag :','icoach')?></span><?php echo '#'.$icoach_tag_list; ?></div>
	<?php }
}
/*
 * Comments placeholder function
 */
add_filter( 'comment_form_default_fields', 'icoach_comment_placeholders' );
function icoach_comment_placeholders( $fields )
{
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="'
		. _x(
		'Name *',
		'comment form placeholder',
		'icoach'
		)
		. '" required',
	$fields['author']
	);
	$fields['email'] = str_replace(
		'<input',
		'<input id="email" name="email" type="text" placeholder="'
		. _x(
		'Email Id *',
		'comment form placeholder',
		'icoach'
		)
		. '" ',
	$fields['email']
	);
	$fields['url'] = str_replace(
		'<input',
		'<input id="url" name="url" type="text" placeholder="'
		. _x(
		'Website URL',
		'comment form placeholder',
		'icoach'
		)
		. '" required',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'icoach_textarea_insert' );
function icoach_textarea_insert( $fields )
{

	$fields['comment_field'] = str_replace(
		'<textarea',
		'<textarea id="comment" aria-required="true" rows="8" cols="45" name="comment" placeholder="'
		. _x(
		'Comment',
		'comment form placeholder',
		'icoach'
		)
	. '" ',
	$fields['comment_field']
	);
	return $fields;
}