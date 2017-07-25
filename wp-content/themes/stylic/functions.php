<?php
/*
 * Set up the content width value based on the theme's design.
 */
if (!function_exists('stylic_setup')) :
    function stylic_setup() {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 870;
        }
        // Make stylic theme available for translation.
        load_theme_textdomain('stylic', get_template_directory() . '/languages');

        // This theme styles the visual editor to resemble the theme style.
        add_editor_style(array('css/editor-style.css'));

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        // register menu 
        register_nav_menus(array(
            'primary' => __('Top Menu', 'stylic'),
            'footer' => __('Footer Menu', 'stylic'),
        ));

        // Featured image support
        add_theme_support('post-thumbnails');
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 510,
            'flex-height' => true,
            'header-text' => array( 'img-responsive', 'site-description' ), 
        ) );
        add_image_size('stylic_thumbnail_image', 780, 400, true);
        add_image_size('stylic_blog_thumbnail_image', 1540, 390, true);
        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5');
        add_theme_support( "custom-background",array('default-color' => '#ffffff',));
        // Add support for featured content.
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'stylic_get_featured_posts',
            'max_posts' => 6,
        ));
        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');
        /* slug setup */
        add_theme_support('title-tag');
    }
endif; // stylicSetup
add_action('after_setup_theme', 'stylic_setup');

function stylic_special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function stylic_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'stylic_excerpt_length', 999 );

//clearfix
function stylic_bootstrap_clearfix( $i, $args = array(), $element = 'div',  $grid = 12 ) {
    $performFor = array();
    $clearfix   = '';

    if ( isset( $args['xs'] ) && is_int( $args['xs'] ) ) {
        $performFor[] = 'xs';
    }
    if ( isset( $args['sm'] ) && is_int( $args['sm'] ) ) {
        $performFor[] = 'sm';
    }
    if ( isset( $args['md'] ) && is_int( $args['md'] ) ) {
        $performFor[] = 'md';
    }
    if ( isset( $args['lg'] ) && is_int( $args['lg'] ) ) {
        $performFor[] = 'lg';
    }

    foreach ( $performFor as $v ) {
        $modulus = $grid / $args[ $v ];
        $clearfix .= ( $i > 0 && $i % $modulus == 0 ? ' <'.$element.' class="clearfix visible-' . $v . '"></'.$element.'>' : '' );
    }
    return $clearfix;
}
//Documentation Menu Link
add_action('admin_menu', 'stylic_add_page');
function stylic_add_page() {
  add_theme_page(__('StylicPro Features', 'stylic'), __('StylicPro Features', 'stylic'), 'edit_theme_options', 'stylicpro-features','stylicpro_page');
}

function stylicpro_page(){ ?>
<div class="">
  <a href="<?php echo esc_url('https://indigothemes.com/products/stylic-pro-wordpress-theme/'); ?>" target="_blank">
    <img src ="<?php echo esc_url('https://indigothemes.com/wp-content/uploads/stylic/features.jpg') ?>" width="98%" height="auto" />
  </a>
</div>
<?php
}

// Declare WooCommerce Support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_filter( 'woocommerce_show_page_title' , 'stylic_hide_page_title' );
function stylic_hide_page_title() {
    return false;
}
add_action('do_meta_boxes', 'stylic_remove_thumbnail_box');
function stylic_remove_thumbnail_box() {
    remove_meta_box( 'postimagediv','page','side' );
}
/** * Enqueue css and js files **/
require get_template_directory() . '/functions/theme-default-setup.php';
require get_template_directory() . '/functions/enqueue-files.php';
require get_template_directory() . '/functions/theme-customization.php'; ?>