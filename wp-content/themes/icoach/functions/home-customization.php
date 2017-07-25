<?php 
function icoach_customizer_register( $wp_customize ) {
/* Adding panel for home page and its seetings */
// Slider Section 
$wp_customize->add_section( 'icoach_slider_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Slider Section', 'icoach' ),
    'panel' => 'icoach_home_panel',
) );

// Slider one
$wp_customize->add_setting( 'icoach_slider_image_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'icoach_slider_image_one', array(
    'priority' => 10,
    'flex_width'  => false,
    'flex_height' => false,
    'width'       => 1920,
    'height'      => 960,
    'section' => 'icoach_slider_section',
    'label' => __( 'Select Image (Size 1920*960 px)', 'icoach' ),
    'description' => '',
) ) );

$wp_customize->add_setting( 'icoach_slider_text_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_text_one', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Slider', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_button_text_one', array(
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_button_text_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Button', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_url_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_slider_url_one', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'URL for Button', 'icoach' ),
    'description' => '',
) ) ;

// Slider two
$wp_customize->add_setting( 'icoach_slider_image_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'icoach_slider_image_two', array(
    'priority' => 10,
    'flex_width'  => false,
    'flex_height' => false,
    'width'       => 1920,
    'height'      => 960,
    'section' => 'icoach_slider_section',
    'label' => __( 'Select Image (Size 1920*960 px)', 'icoach' ),
    'description' => '',
) ) );
$wp_customize->add_setting( 'icoach_slider_text_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_text_two', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Slider', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_button_text_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_button_text_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Button', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_url_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_slider_url_two', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'URL for Button', 'icoach' ),
    'description' => '',
) ) ;
// Slider three
$wp_customize->add_setting( 'icoach_slider_image_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'icoach_slider_image_three', array(
    'priority' => 10,
    'flex_width'  => false,
    'flex_height' => false,
    'width'       => 1920,
    'height'      => 960,
    'section' => 'icoach_slider_section',
    'label' => __( 'Select Image (Size 1920*960 px)', 'icoach' ),
    'description' => '',
) ) );
$wp_customize->add_setting( 'icoach_slider_text_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_text_three', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Slider', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_button_text_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_slider_button_text_three', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'Text for Button', 'icoach' ),
    'description' => '',
) ) ;
$wp_customize->add_setting( 'icoach_slider_url_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_slider_url_three', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_slider_section',
    'label' => __( 'URL for Button', 'icoach' ),
    'description' => '',
) );
// About Section
$wp_customize->add_section( 'icoach_about_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'About Section', 'icoach' ),
    'panel' => 'icoach_home_panel',
) );
// id for section
$wp_customize->add_setting( 'icoach_about_id', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_id', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'ID for section', 'icoach' ),
    'description' => __('This id will use in menu link for one page website. eg. about','icoach'),
) );
// Title one
$wp_customize->add_setting( 'icoach_about_title_one', array(
    'default' => __('About Me','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_title_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Title 1', 'icoach' ),
    'description' => '',
) );
// Title two
$wp_customize->add_setting( 'icoach_about_title_two', array(
    'default' => __('Who I am','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_title_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Title 2', 'icoach' ),
    'description' => '',
) );
// About description
$wp_customize->add_setting( 'icoach_about_description', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_description', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'About Description', 'icoach' ),
    'description' => '',
) );

// About Link
$wp_customize->add_setting( 'icoach_about_link', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_about_link', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'About Link', 'icoach' ),
    'description' => '',
) );

// About Image one
$wp_customize->add_setting( 'icoach_about_image_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize,'icoach_about_image_one', array(
    'priority' => 10,
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 1000,
    'height'      => 720,
    'section' => 'icoach_about_section',
    'label' => __( 'Select Image (Size 1000*720 px)', 'icoach' ),
    'description' => '',
) ) );
$wp_customize->add_setting( 'icoach_about_image_link_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_about_image_link_one', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Link', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_about_image_button_text_one', array(
    'default' => __('Personal','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_image_button_text_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Text', 'icoach' ),
    'description' => '',
) );
// About Image two
$wp_customize->add_setting( 'icoach_about_image_two', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize,'icoach_about_image_two', array(
    'priority' => 10,
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 1000,
    'height'      => 720,
    'section' => 'icoach_about_section',
    'label' => __( 'Select Image (Size 1000*720 px)', 'icoach' ),
    'description' => '',
) ) );
$wp_customize->add_setting( 'icoach_about_image_link_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_about_image_link_two', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Link', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_about_image_button_text_two', array(
    'default' => __('Business','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_image_button_text_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Text', 'icoach' ),
    'description' => '',
) );
// About Image three
$wp_customize->add_setting( 'icoach_about_image_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize,'icoach_about_image_three', array(
    'priority' => 10,
    'width'       => 1000,
    'height'      => 720,
    'section' => 'icoach_about_section',
    'label' => __( 'Select Image (Size 1000*720 px)', 'icoach' ),
    'description' => '',
) ) );
$wp_customize->add_setting( 'icoach_about_image_link_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_about_image_link_three', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Link', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_about_image_button_text_three', array(
    'default' => __('Fun','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_about_image_button_text_three', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_about_section',
    'label' => __( 'Button Text', 'icoach' ),
    'description' => '',
) );
// Knowledge Section
$wp_customize->add_section( 'icoach_knowledge_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Knowledge Section', 'icoach' ),
    'panel' => 'icoach_home_panel',
) );
// id for section
$wp_customize->add_setting( 'icoach_knowledge_id', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_id', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'ID for section', 'icoach' ),
    'description' => __('This id will use in menu link for one page website. eg. knowledge','icoach'),
) );
// Title one
$wp_customize->add_setting( 'icoach_knowledge_title_one', array(
    'default' => __('Knowledge','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_title_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Title 1', 'icoach' ),
    'description' => '',
) );
// Title two
$wp_customize->add_setting( 'icoach_knowledge_title_two', array(
    'default' => __('What I know','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_title_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Title 2', 'icoach' ),
    'description' => '',
) );
// Knowledge section One
$wp_customize->add_setting( 'icoach_knowledge_icon_one', array(
    'default' => __('icon-clock','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_icon_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Icon', 'icoach' ),
    'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'icoach' ),
) );
$wp_customize->add_setting( 'icoach_knowledge_sub_title_one', array(
    'default' => __('Years of Experience','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_sub_title_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Title', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_knowledge_description_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_description_one', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Description', 'icoach' ),
    'description' => '',
) );
// Knowledge section two
$wp_customize->add_setting( 'icoach_knowledge_icon_two', array(
    'default' => __('icon-idea','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_icon_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Icon', 'icoach' ),
    'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>.', 'icoach' ),
) );
$wp_customize->add_setting( 'icoach_knowledge_sub_title_two', array(
    'default' => __('Years of Experience','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_sub_title_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Title', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_knowledge_description_two', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_description_two', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Description', 'icoach' ),
    'description' => '',
) );
// Knowledge section three
$wp_customize->add_setting( 'icoach_knowledge_icon_three', array(
    'default' => __('icon-man','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_icon_three', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Icon', 'icoach' ),
    'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>.', 'icoach' ),
) );
$wp_customize->add_setting( 'icoach_knowledge_sub_title_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_sub_title_three', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Title', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_knowledge_description_three', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_description_three', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Description', 'icoach' ),
    'description' => '',
) );
// Knowledge section four
$wp_customize->add_setting( 'icoach_knowledge_icon_four', array(
    'default' => __('icon-thumb','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_icon_four', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Icon', 'icoach' ),
    'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>.', 'icoach' ),
) );
$wp_customize->add_setting( 'icoach_knowledge_sub_title_four', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_sub_title_four', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Title', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_knowledge_description_four', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_knowledge_description_four', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_knowledge_section',
    'label' => __( 'Knowledge Description', 'icoach' ),
    'description' => '',
) );
// Contact Section
$wp_customize->add_section( 'icoach_contact_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Contact Section', 'icoach' ),
    'panel' => 'icoach_home_panel',
) );
// id for section
$wp_customize->add_setting( 'icoach_contact_id', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_contact_id', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_contact_section',
    'label' => __( 'ID for section', 'icoach' ),
    'description' => __('This id will use in menu link for one page website. eg. contact','icoach'),
) );
// Title one
$wp_customize->add_setting( 'icoach_contact_title_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_contact_title_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_contact_section',
    'label' => __( 'Title', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_contact_description', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_contact_description', array(
    'type'=>'textarea',
    'priority' => 10,
    'section' => 'icoach_contact_section',
    'label' => __( 'Description', 'icoach' ),
    'description' => '',
) );
// Short code
$wp_customize->add_setting( 'icoach_contact_short_code', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_contact_short_code', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_contact_section',
    'label' => __( 'Contact Form Shortcode ID', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_contact_image_background', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize,'icoach_contact_image_background', array(
    'priority' => 10,
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 1920,
    'height'      => 960,
    'section' => 'icoach_contact_section',
    'label' => __( 'Select Background Image (Size 1920*960 px)', 'icoach' ),
    'description' => '',
) ) );
//Blog section
$wp_customize->add_section( 'icoach_blog_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Blog Section', 'icoach' ),
    'panel' => 'icoach_home_panel',
) );
// id for section
$wp_customize->add_setting( 'icoach_blog_id', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_blog_id', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'ID for section', 'icoach' ),
    'description' => __('This id will use in menu link for one page website. eg. blog','icoach'),
) );
$wp_customize->add_setting( 'icoach_blog_enable', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_blog_enable', array(
    'type'=>'select',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Blog', 'icoach' ),
    'description' => '',
    'choices'=> array(
        '1' => 'Enable',
        '0' => 'Disable',
        )
) );
$wp_customize->add_setting( 'icoach_blog_title_one', array(
    'default' => __('blog','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_blog_title_one', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Title One', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_blog_title_two', array(
    'default' => __('blog','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_blog_title_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Title Two', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_blog_title_two', array(
    'default' => __('blog','icoach'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('blog_title_two', array(
    'type'=>'text',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Title Two', 'icoach' ),
    'description' => '',
) );
$wp_customize->add_setting( 'icoach_blog_category', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control('icoach_blog_category', array(
    'type'=>'select',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Blog Category', 'icoach' ),
    'description' => '',
    'choices' => icoach_get_category_list_options(),
) );
// Blog Show more Link
$wp_customize->add_setting( 'icoach_blog_link', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control('icoach_blog_link', array(
    'type'=>'url',
    'priority' => 10,
    'section' => 'icoach_blog_section',
    'label' => __( 'Blog Link', 'icoach' ),
) );
}
add_action( 'customize_register', 'icoach_customizer_register' );