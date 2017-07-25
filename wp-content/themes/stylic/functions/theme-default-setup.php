<?php
/*
 * Main Sidebar
 */
function stylic_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'stylic'),
        'id' => 'main-sidebar',
        'description' => __('Main sidebar that appears on the right.', 'stylic'),
        'before_widget' => '<aside id="%1$s" class="menu-left widget widget_recent_entries %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'stylic_widgets_init');
/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function stylic_entry_meta() {

    $stylic_categories_list = get_the_category_list(', ','');
    $stylic_author= ucfirst(get_the_author());
    $stylic_author_url= get_author_posts_url( get_the_author_meta( 'ID' ) );
    $stylic_comments = wp_count_comments(get_the_ID());
    $stylic_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('M d , Y')));
    echo wp_kses_post( $stylic_date );
 esc_html_e( ' / By : ', 'stylic' ); ?>
<a href="<?php echo esc_url( $stylic_author_url ); ?>" rel="tag"><?php echo esc_html( $stylic_author ); ?></a>

<?php }
function stylic_single_meta() {

    $stylic_categories_list = get_the_category_list(', ','');
    $stylic_author= ucfirst(get_the_author());
    $stylic_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
    $stylic_comments = wp_count_comments(get_the_ID());     
    $stylic_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('M d, Y')));
?>  
    <p>
        <?php echo wp_kses_post($stylic_date); ?> / 
        <?php esc_html_e('By :', 'stylic'); ?>
        <a href="<?php echo esc_url($stylic_author_url); ?>" rel="tag"><?php echo ' '.esc_html($stylic_author); ?></a> / <?php _e('Category :','stylic'); echo ' '.wp_kses_post($stylic_categories_list); ?></p>
<?php   
}
/*
* Function For Tag Meta List
*/
function stylic_tag_meta() {

    $stylic_tag_list = get_the_tag_list('', ', #' );

    if(!empty($stylic_tag_list)) { ?>
    <div class=""><span ><?php esc_html_e('Tag :','stylic')?></span><?php echo '#'.wp_kses_post($stylic_tag_list); ?></div>
    <?php }
}
/*
 * Comments placeholder function
 */
add_filter( 'comment_form_default_fields', 'stylic_comment_placeholders' );
function stylic_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
        . esc_attr_x(
        'Name *',
        'comment form placeholder',
        'stylic'
        )
        . '" required',
    $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input id="email" name="email" type="text" placeholder="'
        . esc_attr_x(
        'Email Id *',
        'comment form placeholder',
        'stylic'
        )
        . '" ',
    $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input id="url" name="url" type="text" placeholder="'
        . esc_attr_x(
        'Website URL',
        'comment form placeholder',
        'stylic'
        )
        . '" required',
    $fields['url']
    );
    return $fields;
}
add_filter( 'comment_form_defaults', 'stylic_textarea_insert' );
function stylic_textarea_insert( $fields )
{

    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea id="comment" aria-required="true" rows="8" cols="45" name="comment" placeholder="'
        . esc_attr_x(
        'Comment',
        'comment form placeholder',
        'stylic'
        )
    . '" ',
    $fields['comment_field']
    );
    return $fields;
}
require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'stylic_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function stylic_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'      => __('Page Builder by SiteOrigin','stylic'),
            'slug'      => 'siteorigin-panels',
            'required'  => false,
        ),
        array(
            'name'      => __('SiteOrigin Widgets Bundle','stylic'),
            'slug'      => 'so-widgets-bundle',
            'required'  => false,
        ),
        array(
            'name'      => __('Contact Form 7','stylic'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => __('WooCommerce excelling eCommerce','stylic'),
            'slug'      => 'woocommerce',
            'required'  => false,
        ),

    );
    $config = array(
        'id'           => 'stylic',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}