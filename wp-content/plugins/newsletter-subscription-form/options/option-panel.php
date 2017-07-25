<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Weblizar Admin Menu
 */
add_action('admin_menu', 'nls_admin_menu_pannel');  
function nls_admin_menu_pannel() {

	$page = add_menu_page(NLS_PLUGIN_NAME, __('Newsletter Subscription Form', NLS_TEXT_DOMAIN), 'manage_options','nls-weblizar', 'nls_option_panal_function', '
dashicons-backup',39);
 	add_action('admin_print_styles-'.$page, 'nls_admin_enqueue_script'); // add_action function for adding the js and css files
} 

function nls_limit_words($string, $word_limit, $replacement){
    $words = explode(" ",$string);
    $returns  = implode(" ",array_splice($words,0,$word_limit));
	return($returns . $replacement);
}

function nls_truncateString($str, $chars, $to_space, $replacement="..") {
   if($chars > strlen($str)) return $str;
   $str = substr($str, 0, $chars);
   $space_pos = strrpos($str, " ");
   if($to_space && $space_pos >= 0) {
       $str = substr($str, 0, strrpos($str, " "));
   }
   return($str . $replacement);
}


/**
 * Weblizar Admin Menu CSS
 */
function nls_admin_enqueue_script() {	// for Adding css and js files of plugin 	
	wp_enqueue_script('weblizar-tab-js', plugin_dir_url( __FILE__ ).'js/option-js.js',array('media-upload', 'jquery-ui-sortable'));	
	wp_enqueue_script('weblizar-bt-toggle', plugin_dir_url( __FILE__ ).'js/bt-toggle.js');	
	wp_enqueue_script('weblizar-bootjs', plugin_dir_url( __FILE__ ). 'js/bootstrap.min.js');
	wp_enqueue_script('jqColorPicker', plugin_dir_url( __FILE__ ). 'js/jqColorPicker.min.js');		
	wp_enqueue_script('dataTables', plugin_dir_url( __FILE__ ). 'js/jquery.dataTables.js');
	wp_enqueue_script('jQuery');
	wp_enqueue_style('weblizar-option-style', plugin_dir_url( __FILE__ ).'css/option-style.css');
	wp_enqueue_style('weblizar-boot', plugin_dir_url( __FILE__ ). 'css/bootstrap.min.css');	
	wp_enqueue_style('weblizar-fa', plugin_dir_url( __FILE__ ). 'css/font-awesome.min.css');
}
/**
 * Weblizar Plugin Option Form
 */
function nls_option_panal_function() { ?>
<div class="msg-overlay">
		<img id="loading-image" src="<?php echo plugin_dir_url( __FILE__ ) ?>images/loader.gif" alt="Weblizar" height="200" style="margin-top:-10px; margin-right:10px;" alt="Loading..."/>
		<div class="success-msg">
			<div class="alert alert-success">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('Data Save Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="reset-msg">
			<div class="alert alert-danger">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('Data Reset Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="restored-msg">
			<div class="alert alert-danger">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('All Data restored Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="theme-activation-msg">
			<div class="alert alert-success">
				<strong><?php _e('Activated!',NLS_TEXT_DOMAIN );?></strong> <?php _e('Theme Activate Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="remove-msg">
			<div class="alert alert-info">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('Selected Data Remove Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="deleted-msg">
			<div class="alert alert-info">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('All Data Removed Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
		<div class="send_mail-msg">
			<div class="alert alert-success">
				<strong><?php _e('Success!',NLS_TEXT_DOMAIN );?></strong> <?php _e('Mail sent Successfully.',NLS_TEXT_DOMAIN );?>
			</div>
		</div>
	</div>
  <header>
  <div id="get_pro-settings" class="container-fluid top get_pro-settings">		
	<div class="col-md-12 form-group cs-back">	
	
	<div class="col-md-12 ms-links">
	<div class="cs-top">	
	<h2><?php _e('Newsletter Subscription Form Pro',NLS_TEXT_DOMAIN );?></h2>
	<p><?php _e('Connect your visitors',NLS_TEXT_DOMAIN );?></p>
	</div>
		<div class="col-md-12">
		<ul class="cs-desc">
		<ul>
			<li><?php _e('More Then 5 Pro Template',NLS_TEXT_DOMAIN );?></li>			
			<li><?php _e('Easy Integration with More then 5 News Letter Subscriptions APIs services ',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Multiple form with different mail services( Mail API ) forms and color schemes',NLS_TEXT_DOMAIN );?></li>			
			<li><?php _e('More shortcodes and more options with widget',NLS_TEXT_DOMAIN );?></li>			
			<li><?php _e('Manage Subscriber with download .CSV file option',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Auto & Manual Notification To Subscribers',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Notify All and selected Subscriber',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Responsive dashboard, Form Templates design',NLS_TEXT_DOMAIN );?></li>			
			<li><?php _e('Easy to use, user friendly interface',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('User friendly Descriptive section design with message tool tips',NLS_TEXT_DOMAIN );?></li>			
			<li><?php _e('Multi Site Support',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Multilingual Translate Plugin In Any Language',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Unlimited Social Media Profile Links',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('500+ Google Fonts Family',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Unlimited Color Scheme',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Bootstrap Based Responsive Plugin Settings Panel',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Compatible With Most WordPress Theme',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Latest Font Awesome Icon',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Multilingual & Translation Ready',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Compatible With All Major Browsers',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Complete Plugin Documentation',NLS_TEXT_DOMAIN );?></li>
			<li><?php _e('Friendly and Professional Support Team',NLS_TEXT_DOMAIN );?></li>
		</ul>
	</div>
	<div class="col-md-12 row ">
		<div class="col-md-4 col-sm-4 ms-btn">
			<b><?php _e('Try Live Demo',NLS_TEXT_DOMAIN );?></b>
			<a class="btn" target="_new" href="http://demo.weblizar.com/newsletter-subscription-form-pro/" rel="nofollow"><?php _e('Click Here',NLS_TEXT_DOMAIN );?></a>
		</div>
		<div class="col-md-4 col-sm-4 ms-btn">
			<b><?php _e('Try Before Buy Using Admin Demo',NLS_TEXT_DOMAIN );?></b>
			<a class="btn" target="_new" href="http://demo.weblizar.com/newsletter-subscription-form-pro-admin-demo/" rel="nofollow"><?php _e('Click Here',NLS_TEXT_DOMAIN );?></a>
			</br><span><b>Username:</b> userdemo</span></br><span><b>Password:</b> userdemo</span>
		</div>
		<div class="col-md-4 col-sm-4 ms-btn">
			<h3><?php _e('Upgrade To Pro Version Only In $7',NLS_TEXT_DOMAIN );?></h3>
			<a class="btn btn-success pro-link" target="_new" href="https://weblizar.com/plugins/newsletter-subscription-form-pro/" rel="nofollow"><?php _e('Check Detail',NLS_TEXT_DOMAIN );?></a>
		</div>
	</div> </div></div>
		</div>
		<div class="container-fluid top">
			<div class="col-md-8 col-sm-8">
				<h2><img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/logo.png" alt="Weblizar" style="width: 150px;height: 100px;"  /> <span style="font-size:24px;font-weight:bold;top: 6px;position: relative;left: 20px;"><?php _e(NLS_PLUGIN_NAME,NLS_TEXT_DOMAIN);?></span></h2>
			</div>	  
			<div class="col-md-4 col-sm-4 search1" style="padding: 0px;">
				<a href="https://wordpress.org/support/plugin/newsletter-subscription-form" target="_blank"><span class="fa fa-comment-o"></span><?php _e(' Support Forum',NLS_TEXT_DOMAIN);?></a>
				<a href="https://weblizar.com/newsletter-subscription-form-plugin-documentation/" target="_blank"><span class="fa fa-pencil-square-o"></span> <?php _e(' View Documentation',NLS_TEXT_DOMAIN);?></a>
			</div>	
			<div class="weblizar-notice-content" style="text-align: center;float: right;">
				<div class="wporg-ratings rating-stars">
				<?php
				$weblizar_rate_url = 'https://wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=5#new-post';
				?>
				<?php _e( '%sDo you like this plugin?', NLS_TEXT_DOMAIN); ?></br>
				<?php _e( '%s Please take a few seconds to %srate it on WordPress.org%s!', NLS_TEXT_DOMAIN); ?></br>
				<strong>
				</strong>
				<a class="weblizar-rate-it" href="<?php _e($weblizar_rate_url, NLS_TEXT_DOMAIN); ?>"></a>
				
					<a href="//wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=1#new-post" data-rating="1" title="Poor"><span class="dashicons dashicons-star-filled" style="color:#ffb900 !important;"></span></a>
					<a href="//wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=2#new-post" data-rating="2" title="Works"><span class="dashicons dashicons-star-filled" style="color:#ffb900 !important;"></span></a>
					<a href="//wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=3#new-post" data-rating="3" title="Good"><span class="dashicons dashicons-star-filled" style="color:#ffb900 !important;"></span></a>
					<a href="//wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=4#new-post" data-rating="4" title="Great"><span class="dashicons dashicons-star-filled" style="color:#ffb900 !important;"></span></a>
					<a href="//wordpress.org/support/plugin/newsletter-subscription-form/reviews/?rate=5#new-post" data-rating="5" title="Fantastic!"><span class="dashicons dashicons-star-filled" style="color:#ffb900 !important;"></span></a>
				</div>
			</div>	
		</div> 
	  
  </header>	
  <div class="container-fluid support">
	<div class="row left-sidebar">
		<div class="col-md-12 menu">
		  <!-- tabs left -->
		<div id="options_tabs" class="ui-tabs col-xs-12 tabbable tabs-left">	
			<ul class="options_tabs ui-tabs col-xs-2 nav nav-tabs collapsible collapsible-accordion ui-tabs-nav" role="tablist" id="nav">
				  <li class=" user-details">
					<div class="profile-pic">
					<?php global $current_user;
						wp_get_current_user();
						$args= array('class' => 'img-responsive img-circle');
						echo get_avatar( $current_user->user_email, 80, 'monsterid', '', $args ); ?>
					</div>
				  </li>
				<?php $wl_nls_options = get_option('weblizar_nls_options'); // get option settings from saved database ?>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Templates Option',NLS_TEXT_DOMAIN );?>"><a href="#" id="templates-option" data-toggle="tab"><i class="fa fa-desktop icon"></i><?php _e('Templates Option',NLS_TEXT_DOMAIN );?></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Skin Layout',NLS_TEXT_DOMAIN );?>"><a href="#" id="skin-layout-settings" data-toggle="tab"><i class="fa fa-paint-brush icon"></i><?php _e('Skin Layout',NLS_TEXT_DOMAIN );?></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Social Media Options',NLS_TEXT_DOMAIN );?>"><a href="#" id="social-option" data-toggle="tab"><i class="fa fa-twitter icon"></i><?php _e('Social Media Options',NLS_TEXT_DOMAIN );?></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Subscriber Settings',NLS_TEXT_DOMAIN );?>"><a href="#" id="subscriber-settings" data-toggle="tab"><i class="fa fa-envelope-o icon"></i><?php _e('Subscriber Settings',NLS_TEXT_DOMAIN );?></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Subscriber Provider Option',NLS_TEXT_DOMAIN );?>"><a href="#" id="subscriber-provider-option" data-toggle="tab"><i class="fa fa-cog icon"></i><?php _e('Subscriber Provider Option',NLS_TEXT_DOMAIN );?></a></li>
				  <li data-toggle="tooltip" data-placement="right" title="<?php _e('Subscriber List Option',NLS_TEXT_DOMAIN );?>"><a href="#" id="subscriber-list-option" data-toggle="tab"><i class="fa fa-archive icon"></i><?php _e('Subscriber List Option',NLS_TEXT_DOMAIN );?></a></li>				 
				  <li class="get-pro" data-toggle="" data-placement="right" title="<?php _e('Get Premium Version',NLS_TEXT_DOMAIN);?>"><a href="#" id="get_pro_version" data-toggle="tab"><?php _e('Get Premium Version',NLS_TEXT_DOMAIN);?></a></li>
			</ul>
		
		<!-- Option Data saving  -->
		<?php require_once('option-data.php'); ?>	
		<!-- Option Settings form  -->
		<?php require_once('option-settings.php'); ?>					
		<a class="back-to-top back-top" href="#" style="display: inline;"><i class="fa fa-angle-up"></i></a>
		</div>
		</div>
	</div>
   </div>

<?php	
}
 	// Restore all defaults
	if(isset($_POST['restore_all_defaults'])) {
		$wl_nls_options = weblizar_nls_default_settings();	
		update_option('weblizar_nls_options', $wl_nls_options);
	}
		
	function nls_newsletter_func() {
		$wl_nls_options = weblizar_nls_get_options();
		$slected_template = $wl_nls_options['select_template'];
		if($slected_template!=""){
		include 'themes/'.$slected_template.'.php';
		}
	}
	add_shortcode( 'nls_form', 'nls_newsletter_func' );

// Video embed shortcodes
function nls_form_themes( $atts, $content = null, $tag ) {
    extract( shortcode_atts(  array(
        'id' => ''
    ), $atts ) );
    switch( $tag ) {
        case "nls_theme1":
            include 'themes/select_template1.php';			
            break;
        case "nls_theme2":
            include 'themes/select_template2.php';
            break;
    }
    return;
}
add_shortcode( 'nls_theme1', 'nls_form_themes' );
add_shortcode( 'nls_theme2', 'nls_form_themes' );

	
// Creating the widget 
class nls_form_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'nls_form_widget', 

// Widget name will appear in UI
__('Newsletter Form Widget', 'nls_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget For Newsletter Subscription Form', 'nls_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$select_template = apply_filters( 'widget_title', $instance['select_template'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
$wl_nls_options = weblizar_nls_get_options();
//$slected_template = $wl_nls_options['select_template'];
if($select_template!=""){
	echo '<div id="nls_form_widget_'.$select_template.'" class="nls_form_widget_'.$select_template.'">';
	include 'themes/'.$select_template.'.php';
	echo '</div>';
}

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
	$wl_nls_options = weblizar_nls_get_options();
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'nls_widget_domain' );
}
if ( isset( $instance[ 'select_template' ] ) ) {
$select_templates = $instance[ 'select_template' ];
}
else {
$select_templates = $wl_nls_options['select_template'];
}

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'select_template' ); ?>"><?php _e( 'Select Template:' ); ?></label> 
	<select id="<?php echo $this->get_field_id( 'select_template' ); ?>" name="<?php echo $this->get_field_name( 'select_template' ); ?>" class="form-control">
		<option value="select_template1" <?php echo selected($select_templates, 'select_template1' ); ?> ><?php _e('Template 1',NLS_TEXT_DOMAIN ); ?></option>
		<option value="select_template2" <?php echo selected($select_templates, 'select_template2' ); ?> ><?php _e('Template 2',NLS_TEXT_DOMAIN ); ?></option>
	</select>
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['select_template'] = ( ! empty( $new_instance['select_template'] ) ) ? strip_tags( $new_instance['select_template'] ) : '';
return $instance;
}
} // Class nls_form_widget ends here

// Register and load the widget
function nls_form_load_widget() {
	
	register_widget( 'nls_form_widget');
	
}
add_action( 'widgets_init', 'nls_form_load_widget' );
?>
