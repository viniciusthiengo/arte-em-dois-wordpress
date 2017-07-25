<?php
/*
Plugin Name: RAD Text Highlighter
Plugin URI: http://www.radmediaco.com/free-plugins/rad-text-highlighter/
Description: Easy to use & customize shortcode for highlighting text in any post, page, or sidebar widget!
Author: RAD Media Company
Version: 1.0.0
Author URI: http://www.radmediaco.com
*/

/* Begin Page & Database Settings */
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'rad_highlighter_install');
function rad_highlighter_install() {
add_option('rad_highlighter_text', '#000000', '', 'yes');
add_option('rad_highlighter_bg', '#FFF700', '', 'yes');
add_option('rad_highlighter_padding', '3px', '', 'yes');
add_option('rad_highlighter_bold', 'Normal', '', 'yes');
add_option('rad_highlighter_italic', 'Normal', '', 'yes');
}

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'rad_highlighter_remove' );
function rad_highlighter_remove() {
delete_option('rad_highlighter_text');
delete_option('rad_highlighter_bg');
delete_option('rad_highlighter_padding');
delete_option('rad_highlighter_bold');
delete_option('rad_highlighter_italic');
}

/* Admin Pages Configuration */
add_action('admin_menu', 'rad_highlighter_add_pages');
function rad_highlighter_add_pages() {
add_options_page('Text Highlighter', 'Text Highlighter', 8, 'rad-text-highlighter', 'rad_highlighter_top_page', '');
}
/* End Page & Database Settings */

/* Begin Uploader Page */
function rad_highlighter_top_page() { ?>

<div class="wrap">
<?php include('inc/header.php'); ?>
<div id="poststuff" class="metabox-holder has-right-sidebar">
<!-- BEGIN SIDEBAR -->
<div id="side-info-column" class="inner-sidebar">
<?php
include('inc/sidebar.php'); ?>
</div>
<!-- END SIDEBAR -->

<!-- BEGIN CONTENT AREA -->
<div id="post-body" class="has-sidebar">
<div id="post-body-content" class="has-sidebar-content">
<?php
include('pages/settings.php');
include('inc/footer.php');
include('inc/copyright.php');
?>

</div>
</div>
<!-- END CONTENT AREA -->

</div>
</div>

<?php  }

/* BEGIN SHORTCODE */
function rad_highlighter_shortcode( $atts, $content = null ) {
$text = get_option('rad_highlighter_text');
$background = get_option('rad_highlighter_bg'); 
$padding = get_option('rad_highlighter_padding'); 
$bold = get_option('rad_highlighter_bold'); 
$italic = get_option('rad_highlighter_italic'); 
return '<span style="color:' . $text . '; background:' . $background . '; padding:' . $padding . '; font-weight:' . $bold . '; font-style:' . $italic . ';">' . $content . '</span>';
} add_shortcode( 'rad-hl', 'rad_highlighter_shortcode' ); ?>