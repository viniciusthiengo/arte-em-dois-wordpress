<?php
/**
* Customization options
**/
function stylic_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
$wp_customize->add_section(
    'stylic_social_links',
    array(
        'title' => __('Social Accounts', 'stylic'),
        'description' => __('Enter the URL of your social accounts. Leave it empty to hide the icon.', 'stylic'),
    )
);
//Social One
$wp_customize->add_setting(
    'stylic_social_icon_one',
    array(
        'default' => 'fa-facebook',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'stylic_social_icon_one',
    array(
        'section' => 'stylic_social_links',
        'label'      =>   __( 'Social Icon 1', 'stylic' ),
        'type'       => 'text',
        'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'stylic' ),
    )
);
$wp_customize->add_setting(
    'stylic_social_link_one',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'stylic_social_link_one',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Link 1', 'stylic' ),
            'type'       => 'text',
    )
);

//Social Two
$wp_customize->add_setting(
    'stylic_social_icon_two',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'stylic_social_icon_two',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Icon 2', 'stylic' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'stylic' ),
    )
);
$wp_customize->add_setting(
    'stylic_social_link_two',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'stylic_social_link_two',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Link 2', 'stylic' ),
            'type'       => 'text',
    )
);

//Social Three
$wp_customize->add_setting(
    'stylic_social_icon_three',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'stylic_social_icon_three',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Icon 3', 'stylic' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'stylic' ),
    )
);
$wp_customize->add_setting(
    'stylic_social_link_three',
    array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'stylic_social_link_three',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Link 3', 'stylic' ),
            'type'       => 'text',
    )
);

//Social Four
$wp_customize->add_setting(
    'stylic_social_icon_four',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'stylic_social_icon_four',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Icon 4', 'stylic' ),
            'type'       => 'text',
            'description' => __( 'Please add Font Awesome class here, which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a>', 'stylic' ),
    )
);
$wp_customize->add_setting(
    'stylic_social_link_four',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'stylic_social_link_four',
    array(
            'section' => 'stylic_social_links',
            'label'      =>   __( 'Social Link 4', 'stylic' ),
            'type'       => 'text',
    )
);

//color section
$wp_customize->add_setting(
      'stylic_theme_color',
      array(
          'default' => '#FCA311',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'stylic_theme_color',
        array(
            'label'      => __('Theme Color ', 'stylic'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );
    $wp_customize->add_setting(
      'stylic_secondary_color',
      array(
          'default' => '#14213d',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'stylic_secondary_color',
        array(
            'label'      => __('Secondary Color ', 'stylic'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );
//Remove Background Image Section
}
add_action( 'customize_register', 'stylic_customize_register' );

function stylic_custom_css(){ ?>
    <style type="text/css">
    /*Blue*/
    .sub-header-fixed #cssmenu > ul > li > a,
    #cssmenu ul ul li a,
    h2, h3, h1, h4, h5, h6, blockquote,
    .page-numbers,
    .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span {
        color: <?php echo esc_attr(get_theme_mod('stylic_secondary_color','#14213d')); ?>;
    }
    .sub-header-fixed #cssmenu > ul > li.menu-item-has-children > a::after,
    .sub-header-fixed #cssmenu > ul > li.menu-item-has-children > a::before,
    #cssmenu ul ul li.menu-item-has-children > a::after,
    #archives-dropdown--1:hover,
    .postform:hover,
    .textwidget select:hover,
    #archives-dropdown--1:focus,
    .postform:focus,
    .textwidget select:focus,
    .tagcloud a,
    input[type="search"].search-field:focus, input[type="search"].search-field:hover,
    .page-numbers:hover,
    .current:hover,
    .comment-form textarea:focus,
    .comment-form #author:focus,
    .comment-form #email:focus,
    .comment-form #url:focus,
    .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
        border-color: <?php echo esc_attr(get_theme_mod('stylic_secondary_color','#14213d')); ?>;
    }
    .page-heading-blog,
    .search-submit:hover,
    a.page-numbers:hover,
    .current:hover,
    .current,
    .comment-form .submit:hover,
    .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
    .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
    .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover{
      background: <?php echo esc_attr(get_theme_mod('stylic_secondary_color','#14213d')); ?>;
    }

    /*Yellow*/
    .search-submit,
    #cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover,
    .comment-form .submit,
    .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
    .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
      background: <?php echo esc_attr(get_theme_mod('stylic_theme_color','#FCA311')); ?>;
    }
    <?php $hex = esc_attr(get_theme_mod('stylic_theme_color','#FCA311'));
          list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x"); ?>
    .no-padding:hover, .main-blog-hover:hover, .footer_bg {
        background: <?php echo 'rgba(' . esc_attr( $r ) . ', ' . esc_attr( $g ) . ', ' . esc_attr( $b ) . ', 0.1)'; ?>;
    }
    #cssmenu > ul > li:hover > a,
    #today,
    .slide-blog-title h3 a:hover,
    .slide-blog-date a:hover,
    .blog-nav-next a:hover,
    .blog-nav-previous a:hover,
    .slide-blog-more-button a:hover,
    a:focus, a:hover,
    .logged-in-as a:hover,
    .single-blog-tag a:hover,
    .single-blog-content ul li:before,
    .footer-social-icon a:hover,
    .footer-menu a:hover,
    .footer-copyright a:hover,
    .woocommerce-message::before,
    .woocommerce-info::before {
        color: <?php echo esc_attr(get_theme_mod('stylic_theme_color','#FCA311')); ?>;
    }
    .sub-header-fixed #cssmenu > ul > li.menu-item-has-children > a:hover::after,
    .sub-header-fixed #cssmenu > ul > li.menu-item-has-children > a:hover::before,
    .woocommerce-message,
    .woocommerce-info {
        border-color: <?php echo esc_attr(get_theme_mod('stylic_theme_color','#FCA311')); ?>;
    }
    .brandText {
        <?php if(get_theme_mod('header_text') == 1) : ?>
            position: relative;
        <?php else : ?>
            clip: rect(1px 1px 1px 1px);
            position: absolute;
        <?php endif; ?>
    }
    @media (max-width: 767px){
        #cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover{
            background: transparent;
        }
    }
    </style>
<?php }
add_action('wp_head','stylic_custom_css',900); ?>