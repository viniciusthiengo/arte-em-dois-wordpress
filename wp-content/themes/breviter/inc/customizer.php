<?php
/**
 * DesignHooks Customizer functionality
 *
 */
function breviter_customize_register( $wp_customize ) {

	// Add panels
	$wp_customize->add_panel( 'breviter_general_panel', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'General settings', 'breviter' ),
	    'description' 		=> __( 'Panel for global settings', 'breviter' ),
	) );

	$wp_customize->add_panel( 'breviter_header_panel', array(
	    'priority' 			=> 2,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Header', 'breviter' ),
	    'description' 		=> __( 'Panel to manage header', 'breviter' ),
	) );

	$wp_customize->add_panel( 'breviter_footer_panel', array(
	    'priority'			=> 4,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Footer', 'breviter' ),
	    'description' 		=> __( 'Panel to manage footer', 'breviter' ),
	) );
 	
 	// Add general panel sections

 	// Add header panel sections
 	$wp_customize->add_section( 'breviter_general_loader', array(
	    'priority' 			=> 5,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Page Preloader', 'breviter' ),
	    'description' 		=> __( 'If the image is set the page preloader will be applied', 'breviter' ),
	    'panel' 			=> 'breviter_general_panel'
	) );

	$wp_customize->add_section( 'breviter_header_layout', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Header Layout & Content', 'breviter' ),
	    'description' 		=> __( '', 'breviter' ),
	    'panel' 			=> 'breviter_header_panel',
	) );

	$wp_customize->add_section( 'breviter_header_style', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title'				=> __( 'Header appearnace', 'breviter' ),
	    'description' 		=> __( 'Set header appearnace', 'breviter' ),
	    'panel' 			=> 'breviter_header_panel',
	) );

	// Add content panel sections
	$wp_customize->add_section( 'breviter_content_frontpage', array(
	    'priority' 			=> 3,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Content', 'breviter' ),
	    'description' 		=> __( 'Panel to manage page content', 'breviter' )
	) );

 	// Add footer panel sections
 	$wp_customize->add_section( 'breviter_footer_layout', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title'				=> __( 'Footer layout and content', 'breviter' ),
	    'description' 		=> __( 'Set footer layout and provide the content', 'breviter' ),
	    'panel' 			=> 'breviter_footer_panel',
	) );

 	// Add general sections settings and controls

 	// Add header sections settings and controls
 	$wp_customize->add_setting( 'breviter_header_layout[layout]', array(
		'default' 			=> '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'breviter_header_layout[layout]', array(
	    'type' 			=> 'select',
	    'priority' 		=> 1,
	    'section' 		=> 'breviter_header_layout',
	    'label' 		=> __( 'Select Header Layout', 'breviter' ),
	    'description' 	=> '',
	    'choices'       => array(
                'one'   	=> __( 'Header layout one', 'breviter' ),
            )
	) );

	$wp_customize->add_setting( 'breviter_header_layout[logo]', array(
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'default'	 		=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'breviter_header_layout[logo]',
			array(
				'label'      => __( 'Upload Logo', 'breviter' ),
				'section'    => 'breviter_header_layout',
				'settings'   => 'breviter_header_layout[logo]',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_setting( 'breviter_header_layout[meta]', array(
		'default' 			=> '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'breviter_header_layout[meta]', array(
	    'type' 			=> 'textarea',
	    'priority' 		=> 4,
	    'section' 		=> 'breviter_header_layout',
	    'label' 		=> __( 'Header Information', 'breviter' ),
	    'description' 	=> __( 'Provide additonal header information', 'breviter' )
	) );

	// Add content sections settings and controls
	$wp_customize->add_setting( 'breviter_content_frontpage[post_layout]', array(
		'default' 			=> 'mixed',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'breviter_content_frontpage[post_layout]', array(
	    'type' 			=> 'select',
	    'priority' 		=> 2,
	    'section' 		=> 'breviter_content_frontpage',
	    'label' 		=> __( 'Posts layout', 'breviter' ),
	    'description' 	=> '',
	    'choices'       => array(
	    	'mixed'  => esc_html__( 'List layout', 'breviter' )
	    ) 
	) );
	
 	// Add footer sections settings and controls

	$wp_customize->add_setting( 'breviter_footer_layout[layout]', array(
		'default' 			=> 'one',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'breviter_footer_layout[layout]', array(
	    'type' 			=> 'select',
	    'priority' 		=> 1,
	    'section' 		=> 'breviter_footer_layout',
	    'label' 		=> __( 'Select Footer Layout', 'breviter' ),
	    'description' 	=> '',
	    'choices'       => array(
                'one'   	=> __( 'Footer layout one', 'breviter' )
            )
	) );

	$wp_customize->add_setting( 'breviter_footer_layout[logo]', array(
		'default' 			=>  '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'breviter_footer_layout[logo]',
			array(
				'label'      => __( 'Upload Logo', 'breviter' ),
				'section'    => 'breviter_footer_layout',
				'settings'   => 'breviter_footer_layout[logo]',
				'priority'	 => 2
			)
		)
	);

	/* Site Identity */

	$wp_customize->add_section( 'title_tagline', array(
		'title'		=> __( 'Site Identity', 'breviter' ),
		'priority'	=> 1,
		'panel' 	=> 'breviter_general_panel'
	) );

	$wp_customize->add_section( 'background_image', array(
		'title'				=> __( 'Background Image', 'breviter' ),
		'theme_supports'	=> 'custom-background',
		'priority'			=> 2,
		'panel'				=> 'breviter_general_panel'
	) );

	if ( get_pages() ) {
		$wp_customize->add_section( 'static_front_page', array(
			'title'				=> __( 'Static Front Page', 'breviter' ),
			//'theme_supports'	=> 'static-front-page',
			'priority'			=> 3,
			'description'		=> __( 'Your theme supports a static front page.', 'breviter' ),
			'panel'				=> 'breviter_general_panel'
	 	) );
	}

	$wp_customize->add_section( 'colors', array(
		'title'		=> __( 'Colors', 'breviter' ),
		'priority'	=> 4,
		'panel'		=> 'breviter_general_panel'
	) );

	$wp_customize->add_section( 'header_image', array(
		'title'				=> __( 'Header Image', 'breviter' ),
		'theme_supports'	=> 'custom-header',
		'priority'			=> 5,
		'panel'				=> 'breviter_general_panel'
	) );

	$wp_customize->add_section( new Breviter_Pro_Section( 
		$wp_customize,
		'breviter_pro',
		array(
			'title'		=> esc_html__( 'Breviter Pro', 'breviter' ),
			'pro_text' => esc_html__( 'Go Pro', 'breviter' ),
			'pro_url' => 'http://designhooks.com/themes/breviter-pro/'
		)
	) );
}
add_action( 'customize_register', 'breviter_customize_register', 11 );