<?php
/*
 * Set up the content width value based on the theme's design.
 */
if (!function_exists('icoach_setup')) :
    function icoach_setup() {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 870;
        }
        // Make icoach theme available for translation.
        load_theme_textdomain('icoach', get_template_directory() . '/languages');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        // register menu 
        register_nav_menus(array(
            'primary' => __('Top Header Menu', 'icoach'),
            'footer' => __('Footer Menu', 'icoach'),
        ));

        // Featured image support
        add_theme_support('post-thumbnails');
        add_theme_support( 'custom-logo', array(
            'height'      => 31,
            'width'       => 113,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'img-responsive', 'site-description' ), 
        ) );
        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5', array(
            'comment-list',
        ));
        add_theme_support('custom-background', array(
            'default-color' => 'f5f5f5',
        ));
        // Add support for featured content.
        add_theme_support('featured-content');
        /* slug setup */
        add_theme_support('title-tag');

        function iCoachActiveWidgets($active){
        //Custom Widgets
        $active['blog-post-widget'] = true;
        $active['contact-widget'] = true;
        $active['headline-widget'] = true;
        $active['hero-widget'] = true;
        $active['image-showcase-widget'] = true;
        $active['key-feature-widget'] = true;
        $active['button-widget'] = true;

        //Bundled Widgets
        $active['video'] = true;
        $active['testimonial'] = true;
        $active['taxonomy'] = true;
        $active['social-media-buttons'] = true;
        $active['simple-masonry'] = true;
        $active['slider'] = true;
        $active['cta'] = true;
        $active['contact'] = true;
        $active['features'] = true;
        $active['headline'] = true;
        $active['hero'] = true;
        $active['icon'] = true;
        $active['image-grid'] = true;
        $active['price-table'] = true;
        $active['layout-slider'] = true;

        return $active;
        }
        add_filter('siteorigin_widgets_active_widgets', 'iCoachActiveWidgets');
    }
endif; // icoach_setup
add_action('after_setup_theme', 'icoach_setup');
/*
 * Register OpenSans Google font for niche.
 */
function icoach_font_url() {
    $icoach_font_url = '';
    
    if ('off' !== _x('on', 'OpenSans font: on or off', 'icoach')) {
        $icoach_font_url = add_query_arg('family', urlencode('OpenSans:300,400,700,900,300italic,400italic,700italic'), "//fonts.googleapis.com/css?family=Open+Sans");
    }
    return $icoach_font_url;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'basic_header_image_width', 1920 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'basic_header_image_height', 1435 ) );

function icoach_owl_carousel_initialization(){?>
<script type="text/javascript">
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
    jQuery(document).ready(function() {    
        setTimeout(function(){
            jQuery('body').addClass('loaded');
        }, 3000);
        
    });
</script>
<?php }
add_action( 'wp_footer', 'icoach_owl_carousel_initialization' );
/** * Enqueue css and js files **/
require get_template_directory() . '/functions/theme-default-setup.php';
require get_template_directory() . '/functions/enqueue-files.php';
require get_template_directory() . '/functions/custom-header.php';
require get_template_directory() . '/functions/theme-customization.php';
require get_template_directory() . '/functions/home-customization.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'iCoachActionTgmPluginActiveRegisterRequiredPlugins' );
function iCoachActionTgmPluginActiveRegisterRequiredPlugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','icoach'),
           'slug'      => 'siteorigin-panels',
           'required'  => true,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','icoach'),
           'slug'      => 'so-widgets-bundle',
           'required'  => true,
        ),
        array(
           'name'      => __('Contact Form 7','icoach'),
           'slug'      => 'contact-form-7',
           'required'  => true,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'icoach-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'icoach' ),
           'menu_title'                      => __( 'Install Plugins', 'icoach' ),
           'installing'                      => __( 'Installing Plugin: %s', 'icoach' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'icoach' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','icoach' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','icoach' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','icoach' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','icoach' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','icoach' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','icoach' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','icoach' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','icoach' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','icoach' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','icoach' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'icoach' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'icoach' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'icoach' ), 
           'nag_type'                        => 'updated'
        )
      );
      iCoach( $plugins, $config );
    }
}
//Pro Feature Menu
function iCoachMenuSettings() {
    $iCoachMenu = array(
        'page_title' => __('iCoach Pro Features', 'icoach'),
        'menu_title' => __('iCoach Pro Features', 'icoach'),
        'capability' => 'edit_theme_options',
        'menu_slug' => 'icoach',
        'callback' => 'iCoachProPage'
    );
    return apply_filters('icoachProMenu', $iCoachMenu);
}

add_action('admin_menu', 'iCoachOptionsAddPage');

function iCoachOptionsAddPage() {
  $iCoachMenu = iCoachMenuSettings();
  add_theme_page($iCoachMenu['page_title'], $iCoachMenu['menu_title'], $iCoachMenu['capability'], $iCoachMenu['menu_slug'], $iCoachMenu['callback']);
  add_theme_page( 'iCoach Documentation', 'iCoach Documentation', 'manage_options', 'iCoach-documentation', 'iCoachDocumentation', 400 );
}

function iCoachProPage(){?>
<div class="iCoachProVersion">
  <a href="<?php echo esc_url('https://indigothemes.com/products/icoach-pro-wordpress-theme/'); ?>" target="_blank">
    <img src ="<?php echo esc_url('https://indigothemes.com/wp-content/uploads/iCoach/pro-features.jpg') ?>" width="100%" height="auto" />
  </a>
</div>

<?php
}
function iCoachDocumentation(){ ?>
  <script>
    window.location = "https://indigothemes.com/documentation/icoach/";
  </script>
<?php }

function iCoachProAddWidgetFolders( $folders ){
    $folders[] = get_template_directory() . '/inc/widgets/';
    return $folders;
}
add_action('siteorigin_widgets_widget_folders', 'iCoachProAddWidgetFolders');

function mytheme_prebuilt_layouts($layouts){
//slider section
$icoach_slider_image_one = get_theme_mod('icoach_slider_image_one');
$icoach_slider_text_one = get_theme_mod('icoach_slider_text_one');
$icoach_slider_image_two = get_theme_mod('icoach_slider_image_two');
$icoach_slider_image_three = get_theme_mod('icoach_slider_image_three');
$icoach_slider_button_text_one = get_theme_mod('icoach_slider_button_text_one');
$icoach_slider_url_one = get_theme_mod('icoach_slider_url_one');
$icoach_slider_text_two = get_theme_mod('icoach_slider_text_two');
$icoach_slider_button_text_two = get_theme_mod('icoach_slider_button_text_two');
$icoach_slider_url_two = get_theme_mod('icoach_slider_url_two');
$icoach_slider_text_three = get_theme_mod('icoach_slider_text_three');
$icoach_slider_button_text_three = get_theme_mod('icoach_slider_button_text_three');
$icoach_slider_url_three = get_theme_mod('icoach_slider_url_three');

//ABOUT ME
$icoach_about_id = get_theme_mod('icoach_about_id');
$icoach_about_title_one = get_theme_mod('icoach_about_title_one');
$icoach_about_title_two = get_theme_mod('icoach_about_title_two');
$icoach_about_description = get_theme_mod('icoach_about_description');
$icoach_about_image_one = get_theme_mod('icoach_about_image_one');
$icoach_about_image_link_one = get_theme_mod('icoach_about_image_link_one');
$icoach_about_image_button_text_one = get_theme_mod('icoach_about_image_button_text_one');
$icoach_about_image_two = get_theme_mod('icoach_about_image_two');
$icoach_about_image_link_two = get_theme_mod('icoach_about_image_link_two');
$icoach_about_image_button_text_two = get_theme_mod('icoach_about_image_button_text_two');
$icoach_about_image_three = get_theme_mod('icoach_about_image_three');
$icoach_about_image_link_three = get_theme_mod('icoach_about_image_link_three');
$icoach_about_image_button_text_three = get_theme_mod('icoach_about_image_button_text_three');
$icoach_about_link = get_theme_mod('icoach_about_link');

//EXPERTISE
$icoach_knowledge_id = get_theme_mod('icoach_knowledge_id');
$icoach_knowledge_icon_one = get_theme_mod('icoach_knowledge_icon_one');
$icoach_knowledge_sub_title_one = get_theme_mod('icoach_knowledge_sub_title_one');
$icoach_knowledge_description_one = get_theme_mod('icoach_knowledge_description_one');
$icoach_knowledge_description_two = get_theme_mod('icoach_knowledge_description_two');
$icoach_knowledge_icon_three = get_theme_mod('icoach_knowledge_icon_three');
$icoach_knowledge_sub_title_three = get_theme_mod('icoach_knowledge_sub_title_three');
$icoach_knowledge_description_three = get_theme_mod('icoach_knowledge_description_three');
$icoach_knowledge_icon_four = get_theme_mod('icoach_knowledge_icon_four');
$icoach_knowledge_sub_title_four = get_theme_mod('icoach_knowledge_sub_title_four');
$icoach_knowledge_description_four = get_theme_mod('icoach_knowledge_description_four');
$icoach_knowledge_icon_two = get_theme_mod('icoach_knowledge_icon_two');
$icoach_knowledge_sub_title_two = get_theme_mod('icoach_knowledge_sub_title_two');
$icoach_knowledge_title_one = get_theme_mod('icoach_knowledge_title_one');
$icoach_knowledge_title_two = get_theme_mod('icoach_knowledge_title_two');

//Contact
$icoach_contact_id = get_theme_mod('icoach_contact_id');
$icoach_contact_title_one = get_theme_mod('icoach_contact_title_one');
$icoach_contact_description = get_theme_mod('icoach_contact_description');
$icoach_contact_image_background = get_theme_mod('icoach_contact_image_background');
$icoach_contact_short_code = get_theme_mod('icoach_contact_short_code');

//BLOG
$icoach_blog_id = get_theme_mod('icoach_blog_id');
$icoach_blog_category = get_theme_mod('icoach_blog_category');
$icoach_blog_title_one = get_theme_mod('icoach_blog_title_one');
$icoach_blog_title_two = get_theme_mod('icoach_blog_title_two');
$icoach_blog_enable = get_theme_mod('icoach_blog_enable');
$icoach_blog_link = get_theme_mod('icoach_blog_link');

$header_textcolor = get_theme_mod('header_textcolor');
    $layouts['home-page'] = array(
        // We'll add a title field
        'name' => __('Home Page', 'icoach'),
        'description' => __('You can easily migrate existing settings to page builder in just a few clicks.Thanks !', 'icoach'),    // Optional
        'screenshot' => get_template_directory_uri() . '/screenshot.jpg',    // Optional
        'widgets' =>   array (
    0 => 
    array (
      'frames' => 
      array (
        0 => 
        array (
          'content' => '<h4 class="animated fadeInLeft" style="text-align: left;">'.$icoach_slider_text_one.'</h4><p>[buttons]</p>',
          'content_selected_editor' => 'tinymce',
          'buttons' => 
          array (
            0 => 
            array (
              'button' => 
              array (
                'text' => $icoach_slider_button_text_one,
                'url' => $icoach_slider_url_one,
                'design' => 
                array (
                  'width' => false,
                  'width_unit' => 'px',
                  'align' => 'left',
                  'theme' => 'style1',
                  'buttonColorOption' => '1',
                  'buttonColor' => false,
                  'hoverColor' => false,
                  'textColor' => false,
                  'hover' => true,
                  'fontSize' => false,
                  'fontSize_unit' => 'px',
                  'paddingTop' => false,
                  'paddingTop_unit' => 'px',
                  'paddingRight' => false,
                  'paddingRight_unit' => 'px',
                  'paddingBottom' => false,
                  'paddingBottom_unit' => 'px',
                  'paddingLeft' => false,
                  'paddingLeft_unit' => 'px',
                  'so_field_container_state' => 'open',
                ),
                'attributes' => 
                array (
                  'id' => '',
                  'title' => '',
                  'onclick' => '',
                  'so_field_container_state' => 'closed',
                ),
                'newWindow' => false,
              ),
            ),
          ),
          'background' => 
          array (
            'image' => 0,
            'image_fallback' => $icoach_slider_image_one,
            'image_type' => 'cover',
            'opacity' => 69,
            'color' => '#0a0a0a',
            'url' => '',
            'so_field_container_state' => 'open',
            'new_window' => false,
            'videos' => 
            array (
            ),
          ),
        ),
        1 => 
        array (
          'content' => '<h4 class="animated fadeInLeft" style="text-align: left;">'.$icoach_slider_text_two.'</h4><p>[buttons]</p>',
          'content_selected_editor' => 'tinymce',
          'buttons' => 
          array (
            0 => 
            array (
              'button' => 
              array (
                'text' => $icoach_slider_button_text_two,
                'url' => $icoach_slider_url_two,
                'design' => 
                array (
                  'width' => false,
                  'width_unit' => 'px',
                  'align' => 'left',
                  'theme' => 'style1',
                  'buttonColorOption' => '1',
                  'buttonColor' => false,
                  'hoverColor' => false,
                  'textColor' => false,
                  'hover' => true,
                  'fontSize' => false,
                  'fontSize_unit' => 'px',
                  'paddingTop' => false,
                  'paddingTop_unit' => 'px',
                  'paddingRight' => false,
                  'paddingRight_unit' => 'px',
                  'paddingBottom' => false,
                  'paddingBottom_unit' => 'px',
                  'paddingLeft' => false,
                  'paddingLeft_unit' => 'px',
                  'so_field_container_state' => 'open',
                ),
                'attributes' => 
                array (
                  'id' => '',
                  'title' => '',
                  'onclick' => '',
                  'so_field_container_state' => 'closed',
                ),
                'newWindow' => false,
              ),
            ),
          ),
          'background' => 
          array (
            'image' => 0,
            'image_fallback' => $icoach_slider_image_two,
            'image_type' => 'cover',
            'opacity' => 80,
            'color' => '#0a0a0a',
            'url' => '',
            'so_field_container_state' => 'open',
            'new_window' => false,
            'videos' => 
            array (
            ),
          ),
        ),
        2 => 
        array (
          'content' => '<h4 class="animated fadeInLeft" style="text-align: left;">'.$icoach_slider_text_three.'</h4><p>[buttons]</p>',
          'content_selected_editor' => 'tinymce',
          'buttons' => 
          array (
            0 => 
            array (
              'button' => 
              array (
                'text' => $icoach_slider_button_text_three,
                'url' => $icoach_slider_url_three,
                'design' => 
                array (
                  'width' => false,
                  'width_unit' => 'px',
                  'align' => 'left',
                  'theme' => 'style1',
                  'buttonColorOption' => '1',
                  'buttonColor' => false,
                  'hoverColor' => false,
                  'textColor' => false,
                  'hover' => true,
                  'fontSize' => false,
                  'fontSize_unit' => 'px',
                  'paddingTop' => false,
                  'paddingTop_unit' => 'px',
                  'paddingRight' => false,
                  'paddingRight_unit' => 'px',
                  'paddingBottom' => false,
                  'paddingBottom_unit' => 'px',
                  'paddingLeft' => false,
                  'paddingLeft_unit' => 'px',
                  'so_field_container_state' => 'open',
                ),
                'attributes' => 
                array (
                  'id' => '',
                  'title' => '',
                  'onclick' => '',
                  'so_field_container_state' => 'closed',
                ),
                'newWindow' => false,
              ),
            ),
          ),
          'background' => 
          array (
            'image' => 0,
            'image_fallback' => $icoach_slider_image_three,
            'image_type' => 'cover',
            'opacity' => 69,
            'color' => '#0a0a0a',
            'url' => '',
            'so_field_container_state' => 'open',
            'new_window' => false,
            'videos' => 
            array (
            ),
          ),
        ),
      ),
      'controls' => 
      array (
        'speed' => 800,
        'timeout' => 8000,
        'nav_color_hex' => '#FFFFFF',
        'nav_style' => 'themeDefault',
        'nav_size' => 24,
        'swipe' => true,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'height' => '100vh',
        'height_unit' => 'vh',
        'padding' => '40vh',
        'padding_unit' => 'vh',
        'extra_top_padding' => '0px',
        'extra_top_padding_unit' => 'px',
        'padding_sides' => '20px',
        'padding_sides_unit' => 'px',
        'width' => '1170px',
        'width_unit' => 'px',
        'heading_font' => '',
        'heading_color' => '#FFFFFF',
        'heading_size' => '38px',
        'heading_size_unit' => 'px',
        'fittext' => true,
        'heading_shadow' => 0,
        'text_size' => '16px',
        'text_size_unit' => 'px',
        'text_color' => '#F6F6F6',
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '581d68c20dcde',
      'panels_info' => 
      array (
        'class' => 'iCoachHeroWidget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => '0ba4b920-573f-4c72-b3b4-506180546598',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'headline' => 
      array (
        'text' => $icoach_about_title_one,
        'tag' => 'h6',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'subHeadline' => 
      array (
        'text' => $icoach_about_title_two,
        'tag' => 'h4',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'divider' => 
      array (
        'style' => 'solid',
        'headingColorOption' => '1',
        'color' => '#EEEEEE',
        'thickness' => 3,
        'align' => 'center',
        'width' => '30px',
        'width_unit' => 'px',
        'margin' => '10px',
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'order' => 
      array (
        0 => 'headline',
        1 => 'sub_headline',
        2 => 'divider',
      ),
      '_sow_form_id' => '581d7047003d1',
      'fittext' => false,
      'panels_info' => 
      array (
        'class' => 'iCoachHeadlineWidget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 1,
        'widget_id' => '61462570-3f40-4122-bef9-19a46f813885',
        'style' => 
        array (
          'widget_css' => 'font-weight: 100;',
          'padding' => '0px 0px 10px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">'.$icoach_about_description.'</p><p style="text-align: center;">&nbsp;</p><p style="text-align: center;"><strong><a class="btn-light" href="'.$icoach_about_link.'">KNOW MORE</a></strong></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '581d71064bf97',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 2,
        'widget_id' => 'ef48419c-8d89-4930-a675-d8c2940c79d5',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'showcase' => 
      array (
        0 => 
        array (
          'image' => $icoach_about_image_one,
          'button' => '0',
          'buttonText' => $icoach_about_image_button_text_one,
          'buttonLink' => $icoach_about_image_link_one,
          'buttonType' => 'btn-speechblue',
          'popup' => false,
        ),
      ),
      'height' => 500,
      '_sow_form_id' => '581d720807037',
      'panels_info' => 
      array (
        'class' => 'iCoachProImageShowcaseWidget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 3,
        'widget_id' => '0f8e65fd-2d8b-450b-8682-64a75c6925ee',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'showcase' => 
      array (
        0 => 
        array (
          'image' => $icoach_about_image_two,
          'button' => '0',
          'buttonText' => $icoach_about_image_button_text_two,
          'buttonLink' => $icoach_about_image_link_two,
          'buttonType' => 'btn-speechblue',
          'popup' => false,
        ),
        1 => 
        array (
          'image' => $icoach_about_image_three,
          'button' => '0',
          'buttonText' => $icoach_about_image_button_text_three,
          'buttonLink' => $icoach_about_image_link_three,
          'buttonType' => 'btn-speechblue',
          'popup' => false,
        ),
      ),
      'height' => 500,
      '_sow_form_id' => '581d7209b1648',
      'panels_info' => 
      array (
        'class' => 'iCoachProImageShowcaseWidget',
        'raw' => false,
        'grid' => 2,
        'cell' => 1,
        'id' => 4,
        'widget_id' => '7fd6bdb0-f5e6-4c36-a54d-e8cec89ea875',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'headline' => 
      array (
        'text' => $icoach_knowledge_title_one,
        'tag' => 'h6',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'subHeadline' => 
      array (
        'text' => $icoach_knowledge_title_two,
        'tag' => 'h4',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'divider' => 
      array (
        'style' => 'solid',
        'headingColorOption' => '1',
        'color' => '#EEEEEE',
        'thickness' => 3,
        'align' => 'center',
        'width' => '30px',
        'width_unit' => 'px',
        'margin' => '10px',
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'order' => 
      array (
        0 => 'headline',
        1 => 'sub_headline',
        2 => 'divider',
      ),
      '_sow_form_id' => '581d74029d9e7',
      'fittext' => false,
      'panels_info' => 
      array (
        'class' => 'iCoachHeadlineWidget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 5,
        'widget_id' => '61462570-3f40-4122-bef9-19a46f813885',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'keyFeatureTitle' => $icoach_knowledge_sub_title_one,
      'keyFeatureIcon' => 'iCoachIcons-iCoach-clock',
      'keyFeatureDescription' => $icoach_knowledge_description_one,
      'keyFeatureLinktext' => '',
      'keyFeatureLink' => '',
      'keyFeatureTextAlignment' => 'center',
      'keyFeatureColorOption' => '1',
      'keyFeatureTitleSection' => 
      array (
        'keyFeatureTitleColor' => false,
        'keyFeatureTitleHoverColor' => false,
        'keyFeatureTitleFontFamily' => 'default',
        'keyFeatureTitleFontSize' => '16px',
        'keyFeatureTitleFontSize_unit' => 'px',
        'keyFeatureTitleMargin' => '15px',
        'keyFeatureTitleMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureDescriptionSection' => 
      array (
        'keyFeatureDescriptionColor' => false,
        'keyFeatureDescriptionHoverColor' => false,
        'keyFeatureDescriptionFontFamily' => 'default',
        'keyFeatureDescriptionFontSize' => '14px',
        'keyFeatureDescriptionFontSize_unit' => 'px',
        'keyFeatureDescriptionMargin' => '10px',
        'keyFeatureDescriptionMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureBoxSection' => 
      array (
        'keyFeatureBackgroundColor' => false,
        'keyFeatureBackgroundHoverColor' => false,
        'keyFeatureBorderWidth' => false,
        'keyFeatureBorderWidth_unit' => 'px',
        'keyFeatureBorderRadius' => false,
        'keyFeatureBorderRadius_unit' => 'px',
        'keyFeatureHorizontalSpace' => '30px',
        'keyFeatureHorizontalSpace_unit' => 'px',
        'keyFeatureVerticalSpace' => '20%',
        'keyFeatureVerticalSpace_unit' => '%',
        'keyFeatureBorderColor' => false,
        'so_field_container_state' => 'open',
      ),
      'keyFeatureIconSection' => 
      array (
        'keyFeatureIconAlignment' => 'center',
        'keyFeatureIconColor' => false,
        'keyFeatureIconHoverColor' => false,
        'keyFeatureIconSize' => '30px',
        'keyFeatureIconSize_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '581d743083d3f',
      'panels_info' => 
      array (
        'class' => 'iCoachProKeyFeaturesWidget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 6,
        'widget_id' => '79b2fd6c-0917-4326-a708-27ec84edd0ec',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'keyFeatureTitle' => $icoach_knowledge_sub_title_two,
      'keyFeatureIcon' => 'iCoachIcons-iCoach-idea',
      'keyFeatureDescription' => $icoach_knowledge_description_two,
      'keyFeatureLinktext' => '',
      'keyFeatureLink' => '',
      'keyFeatureTextAlignment' => 'center',
      'keyFeatureColorOption' => '1',
      'keyFeatureTitleSection' => 
      array (
        'keyFeatureTitleColor' => false,
        'keyFeatureTitleHoverColor' => false,
        'keyFeatureTitleFontFamily' => 'default',
        'keyFeatureTitleFontSize' => '16px',
        'keyFeatureTitleFontSize_unit' => 'px',
        'keyFeatureTitleMargin' => '15px',
        'keyFeatureTitleMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureDescriptionSection' => 
      array (
        'keyFeatureDescriptionColor' => false,
        'keyFeatureDescriptionHoverColor' => false,
        'keyFeatureDescriptionFontFamily' => 'default',
        'keyFeatureDescriptionFontSize' => '14px',
        'keyFeatureDescriptionFontSize_unit' => 'px',
        'keyFeatureDescriptionMargin' => '10px',
        'keyFeatureDescriptionMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureBoxSection' => 
      array (
        'keyFeatureBackgroundColor' => false,
        'keyFeatureBackgroundHoverColor' => false,
        'keyFeatureBorderWidth' => false,
        'keyFeatureBorderWidth_unit' => 'px',
        'keyFeatureBorderRadius' => false,
        'keyFeatureBorderRadius_unit' => 'px',
        'keyFeatureHorizontalSpace' => '30px',
        'keyFeatureHorizontalSpace_unit' => 'px',
        'keyFeatureVerticalSpace' => '20%',
        'keyFeatureVerticalSpace_unit' => '%',
        'keyFeatureBorderColor' => false,
        'so_field_container_state' => 'open',
      ),
      'keyFeatureIconSection' => 
      array (
        'keyFeatureIconAlignment' => 'center',
        'keyFeatureIconColor' => false,
        'keyFeatureIconHoverColor' => false,
        'keyFeatureIconSize' => '30px',
        'keyFeatureIconSize_unit' => 'px',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '581d74686d3bd',
      'panels_info' => 
      array (
        'class' => 'iCoachProKeyFeaturesWidget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 7,
        'widget_id' => '79b2fd6c-0917-4326-a708-27ec84edd0ec',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'keyFeatureTitle' => $icoach_knowledge_sub_title_three,
      'keyFeatureIcon' => 'iCoachIcons-iCoach-man',
      'keyFeatureDescription' => $icoach_knowledge_description_three,
      'keyFeatureLinktext' => '',
      'keyFeatureLink' => '',
      'keyFeatureTextAlignment' => 'center',
      'keyFeatureColorOption' => '1',
      'keyFeatureTitleSection' => 
      array (
        'keyFeatureTitleColor' => false,
        'keyFeatureTitleHoverColor' => false,
        'keyFeatureTitleFontFamily' => 'default',
        'keyFeatureTitleFontSize' => '16px',
        'keyFeatureTitleFontSize_unit' => 'px',
        'keyFeatureTitleMargin' => '15px',
        'keyFeatureTitleMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureDescriptionSection' => 
      array (
        'keyFeatureDescriptionColor' => false,
        'keyFeatureDescriptionHoverColor' => false,
        'keyFeatureDescriptionFontFamily' => 'default',
        'keyFeatureDescriptionFontSize' => '14px',
        'keyFeatureDescriptionFontSize_unit' => 'px',
        'keyFeatureDescriptionMargin' => '10px',
        'keyFeatureDescriptionMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureBoxSection' => 
      array (
        'keyFeatureBackgroundColor' => false,
        'keyFeatureBackgroundHoverColor' => false,
        'keyFeatureBorderWidth' => false,
        'keyFeatureBorderWidth_unit' => 'px',
        'keyFeatureBorderRadius' => false,
        'keyFeatureBorderRadius_unit' => 'px',
        'keyFeatureHorizontalSpace' => '30px',
        'keyFeatureHorizontalSpace_unit' => 'px',
        'keyFeatureVerticalSpace' => '20%',
        'keyFeatureVerticalSpace_unit' => '%',
        'keyFeatureBorderColor' => false,
        'so_field_container_state' => 'open',
      ),
      'keyFeatureIconSection' => 
      array (
        'keyFeatureIconAlignment' => 'center',
        'keyFeatureIconColor' => false,
        'keyFeatureIconHoverColor' => false,
        'keyFeatureIconSize' => '30px',
        'keyFeatureIconSize_unit' => 'px',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '581d7479efa9d',
      'panels_info' => 
      array (
        'class' => 'iCoachProKeyFeaturesWidget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 8,
        'widget_id' => '79b2fd6c-0917-4326-a708-27ec84edd0ec',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'keyFeatureTitle' => $icoach_knowledge_sub_title_four,
      'keyFeatureIcon' => 'iCoachIcons-iCoach-thumb',
      'keyFeatureDescription' => $icoach_knowledge_description_four,
      'keyFeatureLinktext' => '',
      'keyFeatureLink' => '',
      'keyFeatureTextAlignment' => 'center',
      'keyFeatureColorOption' => '1',
      'keyFeatureTitleSection' => 
      array (
        'keyFeatureTitleColor' => false,
        'keyFeatureTitleHoverColor' => false,
        'keyFeatureTitleFontFamily' => 'default',
        'keyFeatureTitleFontSize' => '16px',
        'keyFeatureTitleFontSize_unit' => 'px',
        'keyFeatureTitleMargin' => '15px',
        'keyFeatureTitleMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureDescriptionSection' => 
      array (
        'keyFeatureDescriptionColor' => false,
        'keyFeatureDescriptionHoverColor' => false,
        'keyFeatureDescriptionFontFamily' => 'default',
        'keyFeatureDescriptionFontSize' => '14px',
        'keyFeatureDescriptionFontSize_unit' => 'px',
        'keyFeatureDescriptionMargin' => '10px',
        'keyFeatureDescriptionMargin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'keyFeatureBoxSection' => 
      array (
        'keyFeatureBackgroundColor' => false,
        'keyFeatureBackgroundHoverColor' => false,
        'keyFeatureBorderWidth' => false,
        'keyFeatureBorderWidth_unit' => 'px',
        'keyFeatureBorderRadius' => false,
        'keyFeatureBorderRadius_unit' => 'px',
        'keyFeatureHorizontalSpace' => '30px',
        'keyFeatureHorizontalSpace_unit' => 'px',
        'keyFeatureVerticalSpace' => '20%',
        'keyFeatureVerticalSpace_unit' => '%',
        'keyFeatureBorderColor' => false,
        'so_field_container_state' => 'open',
      ),
      'keyFeatureIconSection' => 
      array (
        'keyFeatureIconAlignment' => 'center',
        'keyFeatureIconColor' => false,
        'keyFeatureIconHoverColor' => false,
        'keyFeatureIconSize' => '30px',
        'keyFeatureIconSize_unit' => 'px',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '581d748ccb983',
      'panels_info' => 
      array (
        'class' => 'iCoachProKeyFeaturesWidget',
        'raw' => false,
        'grid' => 5,
        'cell' => 1,
        'id' => 9,
        'widget_id' => '79b2fd6c-0917-4326-a708-27ec84edd0ec',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'headline' => 
      array (
        'text' => $icoach_contact_title_one,
        'tag' => 'h4',
        'headingColorOption' => '2',
        'color' => '#ffffff',
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'left',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => '10px',
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'subHeadline' => 
      array (
        'text' => $icoach_contact_description,
        'tag' => 'p',
        'headingColorOption' => '2',
        'color' => '#ffffff',
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'left',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'divider' => 
      array (
        'style' => 'none',
        'headingColorOption' => '1',
        'color' => '#EEEEEE',
        'thickness' => 3,
        'align' => 'center',
        'width' => '30px',
        'width_unit' => 'px',
        'margin' => '10px',
        'margin_unit' => 'px',
        'so_field_container_state' => 'closed',
      ),
      'order' => 
      array (
        0 => 'headline',
        1 => 'sub_headline',
        2 => 'divider',
      ),
      '_sow_form_id' => '581d76d0f0790',
      'fittext' => false,
      'panels_info' => 
      array (
        'class' => 'iCoachHeadlineWidget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 10,
        'widget_id' => '61462570-3f40-4122-bef9-19a46f813885',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'contactForm' => '[contact-form-7 id="'.$icoach_contact_short_code.'" title="Contact form 1"]',
      'contactFormStyle' => 'darkForm',
      '_sow_form_id' => '581d7587d652a',
      'panels_info' => 
      array (
        'class' => 'iCoachProContactWidget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 11,
        'widget_id' => 'f66f9ed1-ba91-4387-8d67-82509e04c41f',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'headline' => 
      array (
        'text' => $icoach_blog_title_one,
        'tag' => 'h6',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'subHeadline' => 
      array (
        'text' => $icoach_blog_title_two,
        'tag' => 'h4',
        'headingColorOption' => '1',
        'color' => false,
        'font' => 'default',
        'fontSize' => false,
        'fontSize_unit' => 'px',
        'align' => 'center',
        'lineHeight' => false,
        'lineHeight_unit' => 'px',
        'margin' => false,
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'divider' => 
      array (
        'style' => 'solid',
        'headingColorOption' => '1',
        'color' => '#EEEEEE',
        'thickness' => 3,
        'align' => 'center',
        'width' => '30px',
        'width_unit' => 'px',
        'margin' => '10px',
        'margin_unit' => 'px',
        'so_field_container_state' => 'open',
      ),
      'order' => 
      array (
        0 => 'headline',
        1 => 'sub_headline',
        2 => 'divider',
      ),
      '_sow_form_id' => '581d82c44b835',
      'fittext' => false,
      'panels_info' => 
      array (
        'class' => 'iCoachHeadlineWidget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 12,
        'widget_id' => '61462570-3f40-4122-bef9-19a46f813885',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'blogPost' => 'post_type=post&date_query={"after":"","before":""}&orderby=null&order=DESC&posts_per_page=5&sticky=&additional=',
      'blogPostLink' => $icoach_blog_link,
      '_sow_form_id' => '581d84fce1da4',
      'panels_info' => 
      array (
        'class' => 'iCoachProBlogPostWidget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 13,
        'widget_id' => '1a4f4e69-06a4-47ad-88af-9b08e3869615',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
        'grids' =>   array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '90px',
        'row_stretch' => 'full-stretched',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'id' => $icoach_about_id,
        'bottom_margin' => '90px',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '90px',
        'gutter' => '0px',
        'row_stretch' => 'full-stretched',
        'background_display' => 'tile',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'id' => $icoach_knowledge_id,
        'bottom_margin' => '90px',
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'gutter' => '0px',
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'gutter' => '0px',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'id' => $icoach_contact_id,
        'bottom_margin' => '90px',
        'padding' => '90px 0px 60px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => $icoach_contact_image_background,
        'background_display' => 'cover',
      ),
    ),
    7 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'id' => $icoach_blog_id,
        'bottom_margin' => '90px',
        'background_display' => 'tile',
      ),
    ),
    8 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '90px',
        'background_display' => 'tile',
      ),
    ),
  ),
        'grid_cells' =>   array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.14999999999999999,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.69999999999999996,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.14999999999999999,
    ),
    4 => 
    array (
      'grid' => 2,
      'weight' => 0.5,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 0.5,
    ),
    6 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    8 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    9 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
    10 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
    11 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    12 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    13 => 
    array (
      'grid' => 7,
      'weight' => 1,
    ),
    14 => 
    array (
      'grid' => 8,
      'weight' => 1,
    ),
  ),
    );
    return $layouts;

}
add_filter('siteorigin_panels_prebuilt_layouts','mytheme_prebuilt_layouts');
//Add Tabs
function iCoachAddWidgetTabs($tabs) {
    $tabs[] = array(
        'title' => __('iCoach Widgets', 'icoach'),
        'filter' => array(
            'groups' => array('iCoachGroup')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'iCoachAddWidgetTabs', 10);

/*
* Extending Layout Silder widget 
*/
function iCaochExtendLayoutSliderForm( $formOptions, $widget ){
    // Lets add a new theme option
    if( !empty($formOptions['controls']['fields']['nav_style']['options']) ) {
      $formOptions['controls']['fields']['nav_style']['options']['themeDefault'] = __('Theme Default', 'icoach');
    }

    return $formOptions;
}
add_filter('siteorigin_widgets_form_options_hero-widget', 'iCaochExtendLayoutSliderForm', 10, 3);
add_filter('siteorigin_widgets_form_options_sow-hero', 'iCaochExtendLayoutSliderForm', 10, 3);
add_filter('siteorigin_widgets_form_options_sow-layout-slider', 'iCaochExtendLayoutSliderForm', 10, 3);

/*
* Layout Silder less 
*/
add_filter( 'siteorigin_widgets_less_file_sow-layout-slider', 'iCoachLayoutSliderLessFile', 10, 3 );
add_filter( 'siteorigin_widgets_less_file_hero-widget', 'iCoachLayoutSliderLessFile', 10, 3 );
add_filter( 'siteorigin_widgets_less_file_sow-hero', 'iCoachLayoutSliderLessFile', 10, 3 );
function iCoachLayoutSliderLessFile( $fileName, $instance, $widget ){
    if( !empty($instance['controls']['nav_style']) && $instance['controls']['nav_style'] == 'themeDefault' ) {
        // And this one for themes
        $fileName = get_stylesheet_directory() . '/inc/widgets/hero/default.less';
    }
    return $fileName;
}
function iCoachProIconFamiliesFilter( $icon_families ) {
  $icon_families['iCoachIcons'] = array(
    'name' => __( 'iCoach Icons', 'icoach' ),
    'style_uri' => '/wp-content/themes/icoach/assets/css/icons.css',
    'icons' => array(
      'iCoach-arrows-down' => '&#xe900;',
      'iCoach-arrows-left' => '&#xe901;',
      'iCoach-arrows-right' => '&#xe902;',
      'iCoach-services-1' => '&#xe903;',
      'iCoach-services-2' => '&#xe904;',
      'iCoach-services-3' => '&#xe906;',
      'iCoach-services-4' => '&#xe908;',
      'iCoach-services-5' => '&#xe909;',
      'iCoach-services-6' => '&#xe911;',
      'iCoach-clock' => '&#xe905;',
      'iCoach-thumb' => '&#xe907;',
      'iCoach-idea' => '&#xe90a;',
      'iCoach-man' => '&#xe90b;',
      'iCoach-search' => '&#xe90c;',
      'iCoach-facebook' => '&#xe90d;',
      'iCoach-twitter' => '&#xe90e;',
      'iCoach-g-plus' => '&#xe90f;',
      'iCoach-pin' => '&#xe910;',
      'my-rad-search-icon' => '&#xe900;',
      'my-rad-close-icon' => '&#xe904;',
    ),
  );
  return $icon_families;
}
add_filter( 'siteorigin_widgets_icon_families', 'iCoachProIconFamiliesFilter' );
/*
* Extending button widget 
*/
function iCoachExtendButton( $formOptions, $widget ){
    // Lets add a new theme option
    if( !empty($formOptions['design']['fields']['theme']['options']) ) {
      $formOptions['design']['fields']['theme']['options']['iCoach1'] = __('Theme Style 1', 'icoach');
      $formOptions['design']['fields']['theme']['options']['iCoach2'] = __('Theme Style 2', 'icoach');
    }
    return $formOptions;
}
add_filter('siteorigin_widgets_form_options_sow-button', 'iCoachExtendButton', 10, 2);
/*
* Button less 
*/
add_filter( 'siteorigin_widgets_less_file_sow-button', 'iCoachButtonLessFile', 10, 3 );
function iCoachButtonLessFile( $fileName, $instance, $widget ){
    if( !empty($instance['design']['theme']) && $instance['design']['theme'] == 'iCoach1' ) {
        // And this one for themes
        $fileName = get_stylesheet_directory() . '/inc/widgets/button/style1.less';
    }
    if( !empty($instance['design']['theme']) && $instance['design']['theme'] == 'iCoach2' ) {
        // And this one for themes
        $fileName = get_stylesheet_directory() . '/inc/widgets/button/style2.less';
    }
    return $fileName;
}