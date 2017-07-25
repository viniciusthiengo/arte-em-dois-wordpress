<?php
/**
* Customization options
**/
function PetShopCustomizeRegister( $wp_customize ) {
//All our sections, settings, and controls will be added here
$wp_customize->add_setting(
    'petShopFooterLogo',
    array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'petShopFooterLogo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Upload Logo for Footer' ,'petshop'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'priority'    => 10,
    'default-image' => '',
) ) );
$wp_customize->add_panel(
    'petShopFooterSection',
    array(
        'title' => __( 'Footer Section', 'petshop' ),
        'description' => __('styling options','petshop'),
        'priority' => 110, 
    )
);

$wp_customize->add_section( 'petShopRightSide' , array(
    'title'       => __( 'Right Side Links', 'petshop' ),
    'capability'     => 'edit_theme_options',
    'panel' => 'petShopFooterSection'
) );
$wp_customize->add_section( 'petShopLeftSide' , array(
    'title'       => __( 'Left Side Links', 'petshop' ),
    'capability'     => 'edit_theme_options',
    'panel' => 'petShopFooterSection'
) );

$wp_customize->add_section(
    'petshopSocialLinks',
    array(
            'title' => __('Social Accounts', 'petshop'),
            'description' => __('Enter the URL of your social accounts. Leave it empty to hide the icon.', 'petshop'),
    )
);
//Social 1
$wp_customize->add_setting(
    'petShopRightIcon1',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopRightIcon1',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Icon 1', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopRightLink1',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopRightLink1',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Link 1', 'petshop' ),
            'type'       => 'text',
    )
);

//Social 2
$wp_customize->add_setting(
    'petShopRightIcon2',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopRightIcon2',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Icon 2', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopRightLink2',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopRightLink2',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Link 2', 'petshop' ),
            'type'       => 'text',
    )
);

//Social 3
$wp_customize->add_setting(
    'petShopRightIcon3',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopRightIcon3',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Icon 3', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopRightLink3',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopRightLink3',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Link 3', 'petshop' ),
            'type'       => 'text',
    )
);

//Social 4
$wp_customize->add_setting(
    'petShopRightIcon4',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopRightIcon4',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Icon 4', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopRightLink4',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopRightLink4',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Link 4', 'petshop' ),
            'type'       => 'text',
    )
);
//Social 5
$wp_customize->add_setting(
    'petShopRightIcon5',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopRightIcon5',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Icon 5', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopRightLink5',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopRightLink5',
    array(
            'section' => 'petShopRightSide',
            'label'      =>   __( 'Social Link 5', 'petshop' ),
            'type'       => 'text',
    )
);

//Social 1
$wp_customize->add_setting(
    'petShopLeftIcon1',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopLeftIcon1',
    array(
            'section' => 'petShopLeftSide',
            'label'      =>   __( 'Social Icon 1', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopLeftLink1',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopLeftLink1',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Link 1', 'petshop' ),
        'type'       => 'text',
    )
);
//Social 2
$wp_customize->add_setting(
    'petShopLeftIcon2',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopLeftIcon2',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Icon 2', 'petshop' ),
        'type'       => 'text',
        'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopLeftLink2',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopLeftLink2',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Link 2', 'petshop' ),
        'type'       => 'text',
    )
);
//Social 3
$wp_customize->add_setting(
    'petShopLeftIcon3',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopLeftIcon3',
    array(
            'section' => 'petShopLeftSide',
            'label'      =>   __( 'Social Icon 3', 'petshop' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopLeftLink3',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopLeftLink3',
    array(
        'section' => 'petShopLeftSide',
        'label'   =>   __( 'Social Link 3', 'petshop' ),
        'type'    => 'text',
    )
);
//Social 4
$wp_customize->add_setting(
    'petShopLeftIcon4',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopLeftIcon4',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Icon 4', 'petshop' ),
        'type'       => 'text',
        'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopLeftLink4',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopLeftLink4',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Link 4', 'petshop' ),
        'type'       => 'text',
    )
);
//Social 5
$wp_customize->add_setting(
    'petShopLeftIcon5',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'petShopLeftIcon5',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Icon 5', 'petshop' ),
        'type'       => 'text',
        'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'petshop' ),
    )
);
$wp_customize->add_setting(
    'petShopLeftLink5',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'petShopLeftLink5',
    array(
        'section' => 'petShopLeftSide',
        'label'      =>   __( 'Social Link 5', 'petshop' ),
        'type'       => 'text',
    )
);

//color section
$wp_customize->add_setting(
      'theme_color',
      array(
          'default' => '#c62827',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'theme_color',
        array(
            'label'      => __('Theme Color ', 'petshop'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );

$wp_customize->add_setting(
      'petShopGradientColor1',
      array(
          'default' => '#C62827',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'petShopGradientColor1',
        array(
            'label'      => __('Gradient Color 1', 'petshop'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );
    $wp_customize->add_setting(
      'petShopGradientColor2',
      array(
          'default' => '#AE1558',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'petShopGradientColor2',
        array(
            'label'      => __('Gradient Color 2', 'petshop'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );
}
add_action( 'customize_register', 'PetShopCustomizeRegister' );

function PetShopCustomCss(){ ?>
    <style type="text/css">
    #cssmenu > ul > li:hover > a, #cssmenu ul li.active a,
    .bloginner-content-part h2:hover,
    .blog-sidebar ul li a:hover,
    .blog-sidebar h2,
    .blog-info ul li a:hover,
    .blog-info h3:hover,
    a:focus, a:hover,
    .bloginner-content-part ul li a:hover {color: <?php echo get_theme_mod('theme_color','#c62827'); ?>;}
    #cssmenu ul ul li:hover,
    .blog-img:after,
    .leave_form p.form-submit::before,
    .leave_form p.form-submit::after,
    .footer-contact .tagcloud a::before,
    .footer-contact .tagcloud a::after,
    .nav-links .current,
    .nav-links a:after,button.search-submit {
        background: -webkit-linear-gradient(right, <?php echo esc_attr(get_theme_mod('petShopGradientColor1','#c62827')).','.esc_attr(get_theme_mod('petShopGradientColor2','#AE1558')); ?>);
        background: -o-linear-gradient(right, <?php echo esc_attr(get_theme_mod('petShopGradientColor1','#c62827')) .','.esc_attr(get_theme_mod('petShopGradientColor2','#AE1558')); ?>);
        background: -moz-linear-gradient(right, <?php echo esc_attr(get_theme_mod('petShopGradientColor1','#c62827')).','.esc_attr(get_theme_mod('petShopGradientColor2','#AE1558')); ?>);
        background: linear-gradient(to right, <?php echo esc_attr(get_theme_mod('petShopGradientColor1','#c62827')) .','.esc_attr(get_theme_mod('petShopGradientColor2','#AE1558')); ?>);
    }
    <?php $petShopColor1 = esc_attr(get_theme_mod('petShopGradientColor1','#c62827'));
            $petShopColor2 = esc_attr(get_theme_mod('petShopGradientColor2','#AE1558'));
            list($petShopr1, $petShopg1, $petShopb1) = sscanf($petShopColor1, "#%02x%02x%02x");
            list($petShopr2, $petShopg2, $petShopb2) = sscanf($petShopColor2, "#%02x%02x%02x"); ?>
    #inner-page-banner:after{
        background: linear-gradient(to right, rgba(<?php echo $petShopr1.', '.$petShopg1.', '.$petShopb1.', 0.5'; ?>), rgba(<?php echo $petShopr2.', '.$petShopg2.', '.$petShopb2.', 0.5'; ?>));
    }
    .brandText {
        color: #<?php header_textcolor(); ?>;
        <?php if(display_header_text() == 1) : ?>
            clip: auto;
            position: relative;
        <?php else : ?>
            clip: rect(1px 1px 1px 1px);
            position: absolute;
        <?php endif; ?>
    }
    <?php if(get_header_image() != '') : ?>
        #inner-page-banner{
            background-image: url(<?php header_image(); ?>);
        }
    <?php endif; ?>
    </style>
<?php }
add_action('wp_head','PetShopCustomCss',900);
