<?php
/**
 * DesignHooks Customizer functionality
 *
 */
function sentio_customize_register( $wp_customize ) {

	// Add panels
	$wp_customize->add_panel( 'sentio_general_panel', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'General settings', 'sentio' ),
	    'description' 		=> __( 'Panel for global settings', 'sentio' ),
	) );

	$wp_customize->add_panel( 'sentio_header_panel', array(
	    'priority' 			=> 2,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Header', 'sentio' ),
	    'description' 		=> __( 'Panel to manage header', 'sentio' ),
	) );

	$wp_customize->add_panel( 'sentio_footer_panel', array(
	    'priority'			=> 4,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Footer', 'sentio' ),
	    'description' 		=> __( 'Panel to manage footer', 'sentio' ),
	) );
 	
 	// Add general panel sections

 	// Add header panel sections
	$wp_customize->add_section( 'sentio_header_layout', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Header Layout & Content', 'sentio' ),
	    'description' 		=> __( '', 'sentio' ),
	    'panel' 			=> 'sentio_header_panel',
	) );

	$wp_customize->add_section( 'sentio_header_style', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title'				=> __( 'Header appearnace', 'sentio' ),
	    'description' 		=> __( 'Set header appearnace', 'sentio' ),
	    'panel' 			=> 'sentio_header_panel',
	) );

	// Add content panel sections
	$wp_customize->add_section( 'sentio_content_frontpage', array(
	    'priority' 			=> 3,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Content', 'sentio' ),
	    'description' 		=> __( 'Panel to manage page content', 'sentio' )
	) );

 	// Add footer panel sections
 	$wp_customize->add_section( 'sentio_footer_layout', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title'				=> __( 'Footer layout and content', 'sentio' ),
	    'description' 		=> __( 'Set footer layout and provide the content', 'sentio' ),
	    'panel' 			=> 'sentio_footer_panel',
	) );

 	// Add general sections settings and controls

 	// Add header sections settings and controls
 	$wp_customize->add_setting( 'sentio_header_layout[layout]', array(
		'default' 			=> 'four',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sentio_header_layout[layout]', array(
	    'type' 			=> 'select',
	    'priority' 		=> 1,
	    'section' 		=> 'sentio_header_layout',
	    'label' 		=> __( 'Select Header Layout', 'sentio' ),
	    'description' 	=> 'Select header template',
	    'choices'       => array(
                'one'   	=> __( 'Header layout one', 'sentio' ),
                'two'  		=> __( 'Header layout two', 'sentio' ),
                'three'  	=> __( 'Header layout three', 'sentio' ),
                'four'  	=> __( 'Header layout four', 'sentio' )
            )
	) );

	$wp_customize->add_setting( 'sentio_header_layout[logo]', array(
		'default' 			=> '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sentio_header_layout[logo]',
			array(
				'label'      => __( 'Upload Logo', 'sentio' ),
				'section'    => 'sentio_header_layout',
				'settings'   => 'sentio_header_layout[logo]',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_setting( 'sentio_header_layout[meta]', array(
		'default' 			=> '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sentio_header_layout[meta]', array(
	    'type' 			=> 'textarea',
	    'priority' 		=> 3,
	    'section' 		=> 'sentio_header_layout',
	    'label' 		=> __( 'Header Information', 'sentio' ),
	    'description' 	=> 'Provide additonal header information'
	) );

	$wp_customize->add_setting( 'sentio_header_layout[social]', array(
		'default' 			=> '',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control(
		new WP_Customize_Social_Control(
			$wp_customize,
			'sentio_header_layout[social]',
			array(
				'label'      => __( 'Header Social Networks', 'sentio' ),
				'section'    => 'sentio_header_layout',
				'settings'   => 'sentio_header_layout[social]',
				'priority'	 => 4
			)
		)
	);

 	// Add footer sections settings and controls

	$wp_customize->add_setting( 'sentio_footer_layout[layout]', array(
		'default' 			=> 'one',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sentio_footer_layout[layout]', array(
	    'type' 			=> 'select',
	    'priority' 		=> 1,
	    'section' 		=> 'sentio_footer_layout',
	    'label' 		=> __( 'Select Footer Layout', 'sentio' ),
	    'description' 	=> __('Select footer template', 'sentio'),
	    'choices'       => array(
                'one'   	=> __( 'Footer layout one', 'sentio' ),
                'two'  		=> __( 'Footer layout two', 'sentio' )
            )
	) );

	$wp_customize->add_setting( 'sentio_footer_layout[logo]', array(
		'default' 			=>  get_template_directory_uri() . '/assets/sentio-footer.png',
		'type' 				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'transport' 		=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sentio_footer_layout[logo]',
			array(
				'label'      => __( 'Upload Logo', 'sentio' ),
				'section'    => 'sentio_footer_layout',
				'settings'   => 'sentio_footer_layout[logo]',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_setting( 'sentio_footer_layout[info]', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_textarea',
	) );
 
	$wp_customize->add_control( 'sentio_footer_layout[info]', array(
		'type' => 'textarea',
		'priority' => 3,
		'section' => 'sentio_footer_layout',
		'label' => __( 'Footer info', 'sentio' ),
		'description' => '',
	) );

	/* Site Identity */

	$wp_customize->add_section( 'title_tagline', array(
		'title'		=> __( 'Site Identity', 'sentio' ),
		'priority'	=> 1,
		'panel' 	=> 'sentio_general_panel'
	) );

	$wp_customize->add_section( 'background_image', array(
		'title'				=> __( 'Background Image', 'sentio' ),
		'theme_supports'	=> 'custom-background',
		'priority'			=> 2,
		'panel'				=> 'sentio_general_panel'
	) );

	if ( get_pages() ) {
		$wp_customize->add_section( 'static_front_page', array(
			'title'				=> __( 'Static Front Page', 'sentio' ),
			//'theme_supports'	=> 'static-front-page',
			'priority'			=> 3,
			'description'		=> __( 'Your theme supports a static front page.', 'sentio' ),
			'panel'				=> 'sentio_general_panel'
	 	) );
	}

	$wp_customize->add_section( 'colors', array(
		'title'		=> __( 'Colors', 'sentio' ),
		'priority'	=> 4,
		'panel'		=> 'sentio_general_panel'
	) );

	$wp_customize->add_setting( 'sentio_upgrade2', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Notice( $wp_customize, 'sentio_upgrade2', array(
		'section' => 'colors',
		'description'   => __( 'Get <a href="http://designhooks.com/themes/sentio-pro/" target="_blank">PRO version</a> to unlock all features', 'sentio'),
	) ) );

	$wp_customize->add_section( 'header_image', array(
		'title'				=> __( 'Header Image', 'sentio' ),
		'theme_supports'	=> 'custom-header',
		'priority'			=> 5,
		'panel'				=> 'sentio_general_panel'
	) );

	$wp_customize->add_setting( 'sentio_upgrade', array(
		'default'        => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Notice( $wp_customize, 'sentio_upgrade', array(
		'section' => 'sentio_content_frontpage',
		'description'   => __( 'Get <a href="http://designhooks.com/themes/sentio-pro/" target="_blank">PRO version</a> to unlock all features', 'sentio'),
	) ) );
}
add_action( 'customize_register', 'sentio_customize_register', 11 );