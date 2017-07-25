<?php
/**
* icoach Customization options
**/
//get categories
function icoach_get_category_list_options(){
    $iCouach_cat = get_terms( array(
        'taxonomy' => 'category',
    ) );
    foreach($iCouach_cat as $iCouach_category){
        $iCouach_category_list[$iCouach_category->name] = $iCouach_category->name;
    }
    return $iCouach_category_list;
}
function icoach_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
$wp_customize->add_section(
    'icoach_social_links',
    array(
            'title' => __('Social Accounts', 'icoach'),
            'priority' => 120,
            'description' => __('Enter the URL of your social accounts. Leave it empty to hide the icon.', 'icoach'),
    )
);
//Social One
$wp_customize->add_setting(
    'icoach_social_icon_one',
    array(
        'default' => __('icon-facebook','icoach'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_icon_one',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Icon 1', 'icoach' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'icoach' ),
    )
);
$wp_customize->add_setting(
    'icoach_social_link_one',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_link_one',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Link 1', 'icoach' ),
            'type'       => 'text',
    )
);
//Social Two
$wp_customize->add_setting(
    'icoach_social_icon_two',
    array(
        'default' => __('icon-g-plus','icoach'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_icon_two',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Icon 2', 'icoach' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'icoach' ),
    )
);
$wp_customize->add_setting(
    'icoach_social_link_two',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_link_two',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Link 2', 'icoach' ),
            'type'       => 'text',
    )
);
//Social three
$wp_customize->add_setting(
    'icoach_social_icon_three',
    array(
        'default' => __('icon-pin','icoach'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_icon_three',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Icon 3', 'icoach' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'icoach' ),
    )
);
$wp_customize->add_setting(
    'icoach_social_link_three',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_link_three',
    array(
            'section' => 'icoach_social_links',
            'label'      =>   __( 'Social Link 3', 'icoach' ),
            'type'       => 'text',
    )
);
//Social four
$wp_customize->add_setting(
    'icoach_social_icon_four',
    array(
        'default' => __('icon-twitter','icoach'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_icon_four',
    array(
        'section' => 'icoach_social_links',
        'label'      =>   __( 'Social Icon 4', 'icoach' ),
        'type'       => 'text',
        'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'icoach' ),
    )
);
$wp_customize->add_setting(
    'icoach_social_link_four',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'icoach_social_link_four',
    array(
        'section' => 'icoach_social_links',
        'label'      =>   __( 'Social Link 4', 'icoach' ),
        'type'       => 'text',
    )
);
/*
*Multiple logo upload code
*/
$wp_customize->add_setting(
    'icoach_dark_logo',
    array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'icoach_dark_logo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Upload Dark Logo' ,'icoach'),
    'description' => __('Recommended size 113 × 31','icoach'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 113,
    'height'      => 31,
    'priority'    => 10,
    'default-image' => '',
) ) );
$wp_customize->get_control( 'header_textcolor' )->label = __('Theme Color','icoach');
$wp_customize->get_control( 'custom_logo' )->description = __('Recommended size 113 × 31','icoach');

//Remove Background Image Section
$wp_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'icoach_customize_register' );