<?php
/*
 * Main Sidebar
 */
function PetShopWidgetsInit() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'petshop'),
        'id' => 'main-sidebar',
        'description' => __('Main sidebar that appears on the right.', 'petshop'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2><span class="right-side"></span>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1', 'petshop'),
        'id' => 'footer-1',
        'description' => __('Main sidebar that appears on the right.', 'petshop'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2', 'petshop'),
        'id' => 'footer-2',
        'description' => __('Main sidebar that appears on the right.', 'petshop'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 3', 'petshop'),
        'id' => 'footer-3',
        'description' => __('Main sidebar that appears on the right.', 'petshop'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 4', 'petshop'),
        'id' => 'footer-4',
        'description' => __('Main sidebar that appears on the right.', 'petshop'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'PetShopWidgetsInit');
/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function PetShopSideMeta() {
	$petShopAuthor= ucfirst(get_the_author());
	$petShopAuthorUrl= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$petShopDate = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y')));
?>
    	<a href="<?php echo $petShopAuthorUrl; ?>" rel="tag"><?php echo $petShopAuthor; ?></a>
    	<?php echo $petShopDate; ?>
<?php 	
}
function PetShopEntryMeta() {

	$petShopCategoriesList = get_the_category_list(', ','');
	$petShopAuthor= ucfirst(get_the_author());
	$petShopAuthorUrl= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$petShopComments = wp_count_comments(get_the_ID()); 	
	$petShopDate = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y')));
?>	
    <ul>
    	<li><a href="<?php echo $petShopAuthorUrl; ?>" rel="tag"><?php _e('By', 'petshop'); ?><?php echo ' '.$petShopAuthor; ?></a></li>
    	<li><?php echo $petShopDate; ?></li>
    	<?php if(isset($petShopComments) ) : ?>
    		<li><?php echo $petShopComments->total_comments.' '; ?><?php _e('COMMENT','petshop'); ?></li>
    	<?php endif; ?>
    </ul>
<?php 	
}
function PetShopSingleMeta() {

	$petShopCategoriesList = get_the_category_list(', ','');
	$petShopAuthor= ucfirst(get_the_author());
	$petShopAuthorUrl= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$petShopComments = wp_count_comments(get_the_ID()); 	
	$petShopDate = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d, Y')));
?>	
    <ul>
    	<li><?php _e('By :', 'petshop'); ?><a href="<?php echo $petShopAuthorUrl; ?>" rel="tag"><?php echo ' '.$petShopAuthor; ?></a></li>
    	<li><?php echo $petShopDate; ?></li>
    	<li><?php _e('Category :','petshop'); echo ' '.$petShopCategoriesList; ?></li>
    </ul>
<?php 	
}
/*
* Function For Tag Meta List
*/
function PetShopTagMeta() {

	$petShopTagList = get_the_tag_list('', ', #' );

	if(!empty($petShopTagList)) { ?>
	<div class=""><span ><?php _e('Tag :','petshop')?></span><?php echo '#'.$petShopTagList; ?></div>
	<?php }
}
/*
 * Comments placeholder function
 */
add_filter( 'comment_form_default_fields', 'PetShopCommentPlaceholders' );
function PetShopCommentPlaceholders( $fields )
{
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="'
		. _x(
		'Name *',
		'comment form placeholder',
		'petshop'
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
		'petshop'
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
		'petshop'
		)
		. '" required',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'PetShopTextareaInsert' );
function PetShopTextareaInsert( $fields )
{

	$fields['comment_field'] = str_replace(
		'<textarea',
		'<textarea id="comment" aria-required="true" rows="8" cols="45" name="comment" placeholder="'
		. _x(
		'Comment',
		'comment form placeholder',
		'petshop'
		)
	. '" ',
	$fields['comment_field']
	);
	return $fields;
} ?>