<?php


/* ==========================================================================
 *  customizer settings init
 * ========================================================================== */
/**
 * @param $wp_customize WP_Customize_Manager
 */
function basic_customizer_init( $wp_customize ) {

	$transport = 'postMessage';


	/* --------------  S I T E   T I T L E   ---------------- */

	// rename title setting
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site title', 'basic' );
	$wp_customize->remove_control( 'display_header_text' );


	// ----

	$wp_customize->add_setting( 'display_logo_and_title',
		array(
			'default'           => 'image',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'display_logo_and_title_control',
		array(
			'settings' => 'display_logo_and_title',
			'label'    => __( "Display logo image with site title", 'basic' ),
			'section'  => 'title_tagline',
			'type'     => 'select',
			'choices'  => array(
				'image'  => __( 'Only image, without text', 'basic' ),
				'top'    => __( 'Picture above the text', 'basic' ),
				'left'   => __( 'Picture to the left of text', 'basic' ),
				'right'  => __( 'Picture to the right of text', 'basic' ),
				'bottom' => __( 'Picture under the text', 'basic' ),
			)
		)
	);


	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_site_title]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key'
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_site_title', array(
			'label'    => __( 'Site title', 'basic' ),
			'section'  => 'title_tagline',
			'priority' => 10,
			'settings' => BASIC_OPTION_NAME . '[group_site_title]',
		) ) );
	}

	// change title setting transport
	$wp_customize->get_setting( 'blogname' )->transport = $transport;
	$wp_customize->get_control( 'blogname' )->priority  = 11;

	$wp_customize->get_setting( 'header_textcolor' )->transport = $transport;
	$wp_customize->get_control( 'header_textcolor' )->section   = 'title_tagline';
	$wp_customize->get_control( 'header_textcolor' )->priority  = 11;

	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_description_title]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key',
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_description_title', array(
			'label'    => __( 'Description', 'basic' ),
			'section'  => 'title_tagline',
			'priority' => 12,
			'settings' => BASIC_OPTION_NAME . '[group_description_title]',
		) ) );
	}

	$wp_customize->get_setting( 'blogdescription' )->transport = $transport;
	$wp_customize->get_control( 'blogdescription' )->section   = 'title_tagline';
	$wp_customize->get_control( 'blogdescription' )->priority  = 13;

	// ---

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[title_position]',
		array(
			'type'              => 'option',
			'default'           => 'left',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'title_position_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[title_position]',
			'label'    => __( "Title position", 'basic' ),
			'section'  => 'title_tagline',
			'type'     => 'select',
			'choices'  => array(
				'left'   => __( "Left", 'basic' ),
				'right'  => __( "Right", 'basic' ),
				'center' => __( "Center", 'basic' )
			),
			'priority' => 11,
		)
	);

	// ---

	// site descriptions
	$wp_customize->add_setting( BASIC_OPTION_NAME . '[showsitedesc]', array(
		'type'              => 'option',
		'default'           => '1',
		'sanitize_callback' => 'sanitize_key',
//		'sanitize_callback' => 'basic_sanitize_checkbox',
		'transport'         => $transport
	) );
	$wp_customize->add_control( 'showsitedesc_control',
		array(
			'label'    => __( 'Show site description', 'basic' ),
			'settings' => BASIC_OPTION_NAME . '[showsitedesc]',
			'section'  => 'title_tagline',
			'type'     => 'checkbox',
			'priority' => 21,
		)
	);

	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_other_title]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key',
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_other_title', array(
			'label'    => __( 'Other', 'basic' ),
			'section'  => 'title_tagline',
			'priority' => 22,
			'settings' => BASIC_OPTION_NAME . '[group_other_title]',
		) ) );
	}


	/*----------  H E A D E R    I M A G E   ----------*/

//	$wp_customize->get_section( 'header_image' )->title    = __( 'Header', 'basic' );
	$wp_customize->get_section( 'header_image' )->priority = 30;

	// ---

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[fix_header_height]',
		array(
			'type'              => 'option',
			'default'           => 0,
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'fix_header_height_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[fix_header_height]',
			'label'    => __( "Set header height as background image size", 'basic' ),
			'section'  => 'header_image',
			'type'     => 'checkbox',
		)
	);
	// ---

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[header_image_repeat]',
		array(
			'type'              => 'option',
			'default'           => 'no-repeat',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'header_image_repeat_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[header_image_repeat]',
			'label'    => __( "Image repeat", 'basic' ),
			'section'  => 'header_image',
			'type'     => 'radio',
			'choices'  => array(
				'no-repeat' => __( "No repeat", 'basic' ),
				'repeat-x'  => __( "Repeat", 'basic' ),
			),
		)
	);


	/*----------  C O L O R S   &&   B A C K G R O U N D  ----------*/

	$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'basic' );

	$wp_customize->get_control( 'background_color' )->priority = 30;
	$wp_customize->get_control( 'background_image' )->priority = 30;

	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->remove_section( 'colors' );


	/*----------  L A Y O U T   ----------*/

	// content custom section
	$wp_customize->add_section(
		'layout',
		array(
			'title'       => __( 'Design', 'basic' ),
			'priority'    => 80,
			'description' => __( 'Main theme options', 'basic' )
		)
	);

	// ----
	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[maincolor]',
		array(
			'type'              => 'option',
			'default'           => '#936',
			'priority'          => 10,
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		BASIC_OPTION_NAME . '[maincolor]',
		array(
			'label'       => __( "Main color", 'basic' ),
			'description' => __( "Choose main color", 'basic' ),
			'section'     => 'layout',
			'settings'    => BASIC_OPTION_NAME . '[maincolor]',
		)
	) );

	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_layout_title]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key',
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_layout_title', array(
			'label'       => __( 'Layout', 'basic' ),
			'description' => __( 'Set up layout for site pages', 'basic' ),
			'section'     => 'layout',
			'settings'    => BASIC_OPTION_NAME . '[group_layout_title]',
		) ) );
	}

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[show_sidebar]',
		array(
			'type'              => 'option',
			'default'           => 0,
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'show_sidebar_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[show_sidebar]',
			'label'    => __( "Show sidebar on mobile", 'basic' ),
			'section'  => 'layout',
			'type'     => 'checkbox',
		)
	);

	// ----

	$wp_customize->add_setting( 'show_mobile_thumb',
		array(
			'default'           => 0,
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'show_mobile_thumb_control',
		array(
			'settings' => 'show_mobile_thumb',
			'label'    => __( "Show featured images on mobile", 'basic' ),
			'section'  => 'layout',
			'type'     => 'checkbox',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[layout_home]',
		array(
			'type'              => 'option',
			'default'           => 'rightbar',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'layout_home_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[layout_home]',
			'label'    => __( "Layout on Home", 'basic' ),
			'section'  => 'layout',
//			'active_callback' => 'is_home',
			'type'     => 'select',
			'choices'  => array(
				'rightbar' => __( "Rightbar", 'basic' ),
				'leftbar'  => __( "Leftbar", 'basic' ),
				'full'     => __( "Fullwidth Content", 'basic' ),
				'center'   => __( "Centered Content", 'basic' )
			),
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[layout_post]',
		array(
			'type'              => 'option',
			'default'           => 'rightbar',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'layout_post_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[layout_post]',
			'label'    => __( "Layout on Post", 'basic' ),
			'section'  => 'layout',
			'type'     => 'select',
			'choices'  => array(
				'rightbar' => __( "Rightbar", 'basic' ),
				'leftbar'  => __( "Leftbar", 'basic' ),
				'full'     => __( "Fullwidth Content", 'basic' ),
				'center'   => __( "Centered Content", 'basic' )
			),
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[layout_page]',
		array(
			'type'              => 'option',
			'default'           => 'center',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'layout_page_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[layout_page]',
			'label'    => __( "Layout on Page", 'basic' ),
			'section'  => 'layout',
//			'active_callback' => 'basic_is_page',
			'type'     => 'select',
			'choices'  => array(
				'rightbar' => __( "Rightbar", 'basic' ),
				'leftbar'  => __( "Leftbar", 'basic' ),
				'full'     => __( "Fullwidth Content", 'basic' ),
				'center'   => __( "Centered Content", 'basic' )
			),
		)
	);


	// ----

	if ( function_exists('is_woocommerce') ){
//		echo '-------------------------------';
		$wp_customize->add_setting(
			'layout_shop',
			array(
				'type'              => 'option',
				'default'           => 'center',
				'sanitize_callback' => 'sanitize_key',
				'transport'         => $transport
			)
		);
		$wp_customize->add_control( 'layout_shop_control',
			array(
				'settings' => 'layout_shop',
				'label'    => __( "Layout on WooCommerce Shop page", 'basic' ),
				'section'  => 'layout',
				'type'     => 'select',
				'choices'  => array(
					'rightbar' => __( "Rightbar", 'basic' ),
					'leftbar'  => __( "Leftbar", 'basic' ),
					'full'     => __( "Fullwidth Content", 'basic' ),
					'center'   => __( "Centered Content", 'basic' )
				),
			)
		);
	}

	// ----

	$wp_customize->add_setting(
		'layout_search',
		array(
			'type'              => 'option',
			'default'           => 'center',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'layout_search_control',
		array(
			'settings' => 'layout_search',
			'label'    => __( "Layout on Search results page", 'basic' ),
			'section'  => 'layout',
			'type'     => 'select',
			'choices'  => array(
				'rightbar' => __( "Rightbar", 'basic' ),
				'leftbar'  => __( "Leftbar", 'basic' ),
				'full'     => __( "Fullwidth Content", 'basic' ),
				'center'   => __( "Centered Content", 'basic' )
			),
		)
	);
	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[layout_default]',
		array(
			'type'              => 'option',
			'default'           => 'rightbar',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'layout_default_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[layout_default]',
			'label'       => __( "Global layout", 'basic' ),
			'description' => __( "It is used when individual page layout is not set", 'basic' ),
			'section'     => 'layout',
			'type'        => 'select',
			'choices'     => array(
				'rightbar' => __( "Rightbar", 'basic' ),
				'leftbar'  => __( "Leftbar", 'basic' ),
				'full'     => __( "Fullwidth Content", 'basic' ),
				'center'   => __( "Centered Content", 'basic' )
			),
		)
	);


	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_other_layout]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key'
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_other_layout', array(
			'label'    => __( 'Other options', 'basic' ),
			'section'  => 'layout',
			'settings' => BASIC_OPTION_NAME . '[group_other_layout]',
		) ) );
	}

	// ----

	$wp_customize->add_setting( 'postmeta_list',
		array(
			'default'           => 'date_category_comments',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control(
		new Basic_Sortable_Checkboxes_WPCC(
			$wp_customize,
			'fx_share_services', /* control id */
			array(
				'settings'    => 'postmeta_list',
				'label'       => __( "Post meta", 'basic' ),
				'description' => __( "What meta information to display for posts", 'basic' ),
				'section'     => 'layout',
				'choices'     => array(
					'date'     => __( "Publication date", 'basic' ),
					'author'   => __( "Post author", 'basic' ),
					'category' => __( "Post categories", 'basic' ),
					'comments' => __( "Comments count", 'basic' ),
					'tags'     => __( "Post tags", 'basic' )
				),
			)
		)
	);

	// --------------------------------------------------------------------------------------

	/**
	 * @since 1.1.7 two sections (social and markup) moved to panel Single post options
	 *
	 */
	$wp_customize->add_panel( 'basic_single_options',
		array(
			'title'       => __( "Post", 'basic' ),
			'description' => __( "Set your custom options to displaying posts", 'basic' ),
			'priority'    => 81
		)
	);

	// -------  S O C I A L ------------------------------------------------------------------

	$wp_customize->add_section( 'social',
		array(
			'title'       => __( 'Social', 'basic' ),
			'description' => __( 'Social buttons', 'basic' ),
			'priority'    => 81,
			'panel'       => 'basic_single_options',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[add_social_meta]',
		array(
			'type'              => 'option',
			'default'           => '0',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'add_social_meta_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[add_social_meta]',
			'label'    => __( "Add Open Graph tags to &lt;head&gt;", 'basic' ),
			'section'  => 'social',
			'type'     => 'checkbox',
		)
	);


	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[social_share]',
		array(
			'type'              => 'option',
			'default'           => 'custom',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => 'refresh'//$transport
		)
	);
	$wp_customize->add_control( 'social_share_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[social_share]',
			'label'    => __( "Social share buttons after post", 'basic' ),
			'section'  => 'social',
			'type'     => 'select',
			'choices'  => array(
				'hide'   => __( "Hide", 'basic' ),
				'custom' => __( "Custom theme buttons", 'basic' ),
				'yandex' => __( "Yandex Buttons", 'basic' ),
			),
		)
	);


	// -----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[title_before_socshare]',
		array(
			'type'              => 'option',
			'default'           => '',
			'sanitize_callback' => 'basic_sanitize_text',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'title_before_socshare_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[title_before_socshare]',
			'label'    => __( "Custom text before share buttons", 'basic' ),
			'section'  => 'social',
			'type'     => 'text',
		)
	);


	// ----

	$wp_customize->add_setting( 'hide_socshare_on_pages',
		array(
//			'type'              => 'option',
			'default'           => 0,
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'hide_socshare_on_pages_control',
		array(
			'settings' => 'hide_socshare_on_pages',
			'label'    => __( "Hide share buttons on static pages", 'basic' ),
			'section'  => 'social',
			'type'     => 'checkbox',
		)
	);


	// --------  S T U C T U R E D   D A T A   --------------------------------------------------

	$wp_customize->add_section(
		'basic_structured_data',
		array(
			'title'    => __( 'Structured Data', 'basic' ),
			'priority' => 82,
			'panel'    => 'basic_single_options',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[schema_mark]',
		array(
			'type'              => 'option',
			'default'           => '1',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'schema_mark_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[schema_mark]',
			'label'    => __( "Enable Schema.org mark up according CreativeWork->Article and Comment", 'basic' ),
			'section'  => 'basic_structured_data',
			'type'     => 'checkbox',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[markup_telephone]',
		array(
			'type'              => 'option',
			'default'           => '(000) 000-000-00',
			'sanitize_callback' => 'basic_sanitize_text',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'markup_telephone_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[markup_telephone]',
			'label'       => __( "Phone", 'basic' ),
			'description' => __( "use in https://schema.org/Organization", 'basic' ),
			'section'     => 'basic_structured_data',
			'type'        => 'text',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[markup_adress]',
		array(
			'type'              => 'option',
			'default'           => __( 'Russia', 'basic' ),
			'sanitize_callback' => 'basic_sanitize_text',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'markup_adress_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[markup_adress]',
			'label'       => __( "Address", 'basic' ),
			'description' => __( "use in https://schema.org/Organization", 'basic' ),
			'section'     => 'basic_structured_data',
			'type'        => 'text',
		)
	);


	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[markup_logo]',
		array(
			'type'              => 'option',
			'default'           => get_template_directory_uri() . '/img/logo.jpg',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'markup_logo_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[markup_logo]',
			'label'       => __( 'Publisher logo', 'basic' ),
			'description' => __( "use in https://schema.org/Organization", 'basic' ),
			'section'     => 'basic_structured_data',
		)
	) );


	// --------  Advertisement   C O D E S  --------------------------------------------------

	$wp_customize->add_section( 'basic_advertisement',
		array(
			'title'       => __( 'Advertisement', 'basic' ),
			'description' => __( 'Setup advertisement before and after post content', 'basic' ),
			'panel'       => 'basic_single_options',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[before_content]',
		array(
			'type'              => 'option',
			'default'           => "<!-- " . __( "Code before single post content", "basic" ) . " -->",
			'sanitize_callback' => 'basic_sanitize_html',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'before_content_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[before_content]',
			'label'       => __( "Before content", 'basic' ),
			'description' => __( "Code before single post content", 'basic' ),
			'section'     => 'basic_advertisement',
			'type'        => 'textarea',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[after_content]',
		array(
			'type'              => 'option',
			'default'           => "<!-- " . __( "Code after single post content", "basic" ) . " -->",
			'sanitize_callback' => 'basic_sanitize_html',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'after_content_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[after_content]',
			'label'       => __( "After content", 'basic' ),
			'description' => __( "Code after single post content", 'basic' ),
			'section'     => 'basic_advertisement',
			'type'        => 'textarea',
		)
	);


	// --------  C U S T O M   C O D E S  --------------------------------------------------

	$wp_customize->add_section( 'basic_custom_code',
		array(
			'title'       => __( 'Custom codes', 'basic' ),
			'description' => __( 'It helps you to setup custom scripts and styles', 'basic' ),
			'priority'    => 91,
		)
	);


	// ----

	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_global_code]', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_key',
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_global_code', array(
			'label'    => __( 'Global settings', 'basic' ),
			'section'  => 'basic_custom_code',
			'settings' => BASIC_OPTION_NAME . '[group_global_code]',
		) ) );
	}

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[head_scripts]',
		array(
			'type'              => 'option',
			'default'           => '<!-- header html from theme option -->',
			'sanitize_callback' => 'basic_sanitize_html',
			'transport'         => 'refresh'//$transport
		)
	);
	$wp_customize->add_control( 'head_scripts_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[head_scripts]',
			'label'       => __( "Scripts in header", 'basic' ),
			'description' => __( "HTML code in &lt;head&gt; tag", 'basic' ),
			'section'     => 'basic_custom_code',
			'type'        => 'textarea',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[footer_scripts]',
		array(
			'type'              => 'option',
			'default'           => '<!-- footer html from theme option -->',
			'sanitize_callback' => 'basic_sanitize_html',
			'transport'         => 'refresh'//$transport
		)
	);
	$wp_customize->add_control( 'footer_scripts_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[footer_scripts]',
			'label'       => __( "Scripts in site footer", 'basic' ),
			'description' => __( "HTML code before &lt;/body&gt; tag", 'basic' ),
			'section'     => 'basic_custom_code',
			'type'        => 'textarea',
		)
	);


	if ( class_exists( 'Basic_Group_Title_Control' ) ) {
		$wp_customize->add_setting( BASIC_OPTION_NAME . '[group_custom_css_code]', array(
			'sanitize_callback' => 'sanitize_key',
		) );
		$wp_customize->add_control( new Basic_Group_Title_Control( $wp_customize, 'basic_group_custom_css_code', array(
			'label'    => __( 'Custom CSS', 'basic' ),
			'section'  => 'basic_custom_code',
			'settings' => BASIC_OPTION_NAME . '[group_custom_css_code]',
		) ) );
	}

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[custom_styles]',
		array(
			'type'              => 'option',
			'default'           => '',
			'sanitize_callback' => 'basic_sanitize_textarea',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'custom_styles_control',
		array(
			'settings'    => BASIC_OPTION_NAME . '[custom_styles]',
			'label'       => __( "Custom styles", 'basic' ),
			'description' => __( "Add your custom CSS styles", 'basic' ),
			'section'     => 'basic_custom_code',
			'type'        => 'textarea',
		)
	);


	// ----------  F O O T E R  ----------


	$wp_customize->add_section(
		'basic_footer_text',
		array(
			'title'       => __( 'Footer', 'basic' ),
			'description' => __( 'Customize footer', 'basic' ),
			'priority'    => 92,
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[copyright_text]',
		array(
			'type'              => 'option',
			'default'           => __( 'All rights reserved', 'basic' ),
			'sanitize_callback' => 'basic_sanitize_text',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'copyright_text_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[copyright_text]',
			'label'    => __( "Copyright text", 'basic' ),
			'section'  => 'basic_footer_text',
			'type'     => 'text',
		)
	);

	// ----

	$wp_customize->add_setting(
		BASIC_OPTION_NAME . '[footer_counters]',
		array(
			'type'              => 'option',
			'default'           => '',
			'sanitize_callback' => 'basic_sanitize_html',
			'transport'         => $transport
		)
	);
	$wp_customize->add_control( 'footer_counters_control',
		array(
			'settings' => BASIC_OPTION_NAME . '[footer_counters]',
			'label'    => __( "Counters code", 'basic' ),
			'section'  => 'basic_footer_text',
			'type'     => 'textarea',
		)
	);


	// ----------  A D D I T I O N A L   C U S T O M   D E S I G N  ----------


	$wp_customize->add_section(
		'basic_additional_design',
		array(
			'title'       => __( 'Design skins for theme BASIC', 'basic' ),
			'description' => __( 'Get child theme with additional design!', 'basic' ),
			'priority'    => 2,
		)
	);

	// ----

	//
	$wp_customize->add_setting( 'basicchild_callmetomato', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-callmetomato/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/callmetomato-mini.png" alt="callmetomato"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_magicsky',
		array( 'label' => 'CallMeTomato', 'section' => 'basic_additional_design', 'settings' => 'basicchild_magicsky', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_ukrainiansoul', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-ukrainiansoul/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/ukrainiansoul-mini.png" alt="ukrainiansoul"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_ukrainiansoul',
		array( 'label' => 'UkrainianSoul', 'section' => 'basic_additional_design', 'settings' => 'basicchild_ukrainiansoul', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_businesscity', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-businesscity/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/businesscity-mini.png" alt="businesscity"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_businesscity',
		array( 'label' => 'BusinessCity', 'section' => 'basic_additional_design', 'settings' => 'basicchild_businesscity', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_magicsky', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-magicsky/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/magicsky-mini.png" alt="magicsky"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_magicsky',
		array( 'label' => 'MagicSky', 'section' => 'basic_additional_design', 'settings' => 'basicchild_magicsky', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_repairservice', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-repairservice/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/repairservice-mini.png" alt="repairservice"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_repairservice',
		array( 'label' => 'RepairService', 'section' => 'basic_additional_design', 'settings' => 'basicchild_repairservice', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_theelegance', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-theelegance/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2017/01/theelegance-mini.png" alt="theelegance"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_theelegance',
		array( 'label' => 'TheElegance', 'section' => 'basic_additional_design', 'settings' => 'basicchild_theelegance', )
	) );


	// ----

	//
	$wp_customize->add_setting( 'basicchild_lobelia', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-lobelia/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/lobelia-mini.png" alt="lobelia"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_lobelia',
		array( 'label' => 'Lobelia', 'section' => 'basic_additional_design', 'settings' => 'basicchild_lobelia', )
	) );

	//
	$wp_customize->add_setting( 'basicchild_peachtheme', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-peachtheme/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/peachtheme-mini.png" alt="peachtheme"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_peachtheme',
		array( 'label' => 'PeachTheme', 'section' => 'basic_additional_design', 'settings' => 'basicchild_peachtheme', )
	) );

	//
	$wp_customize->add_setting( 'basicchild_westcoasts', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-westcoasts/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/westcoasts-mini.png" alt="westcoasts"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_westcoasts',
		array( 'label' => 'WestCoasts', 'section' => 'basic_additional_design', 'settings' => 'basicchild_westcoasts', )
	) );

	//
	$wp_customize->add_setting( 'basicchild_travelblog', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-travelblog/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/travelblog-mini.png" alt="travelblog"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_travelblog',
		array( 'label' => 'TravelBlog', 'section' => 'basic_additional_design', 'settings' => 'basicchild_travelblog', )
	) );

	//
	$wp_customize->add_setting( 'basicchild_yellowdreams', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-yellowdreams/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/yellowdreams-mini.png" alt="yellowdreams"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_yellowdreams',
		array(
			'label'    => 'YellowDreams',
			'section'  => 'basic_additional_design',
			'settings' => 'basicchild_yellowdreams',
		)
	) );

	//
	$wp_customize->add_setting( 'basicchild_luminous', array(
		'type'              => 'option',
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'basic-luminous/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/08/luminous-mini.png" alt="luminous"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basicchild_luminous',
		array( 'label' => 'Luminous', 'section' => 'basic_additional_design', 'settings' => 'basicchild_luminous', )
	) );


	// ----------  A D D I T I O N A L   C U S T O M   D E S I G N  ----------


	$wp_customize->add_section( 'basic_other_themes',
		array(
			'title'       => __( 'WP Puzzle Themes', 'basic' ),
			'description' => __( 'Choose great premium themes by WP Puzzle Shop!', 'basic' ),
			'priority'    => 1,
		)
	);

	//
	$wp_customize->add_setting( 'basic_other_simplepuzzle', array(
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'simple-puzzle/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/09/simplepuzzle-mini.png" alt="simplepuzzle"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basic_other_simplepuzzle',
		array( 'label' => 'SimplePuzzle', 'section' => 'basic_other_themes', 'settings' => 'basic_other_simplepuzzle', )
	) );

	//
	$wp_customize->add_setting( 'basic_other_fashionista', array(
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'fashionista/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/09/fashionista-mini.png" alt="fashionista"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basic_other_fashionista',
		array( 'label' => 'Fashionista', 'section' => 'basic_other_themes', 'settings' => 'basic_other_fashionista', )
	) );

	//
	$wp_customize->add_setting( 'basic_other_sunsetcafe', array(
		'sanitize_callback' => 'basic_sanitize_html',
		'default'           => '<a href="' . BASIC_THEME_URI . 'sunsetcafe/" target="_blank"><img src="' . BASIC_THEME_URI . 'wp-content/uploads/2016/09/sunsetcafe-mini.png" alt="sunsetcafe"></a>',
	) );
	$wp_customize->add_control( new Basic_Child_Design_WPCC( $wp_customize, 'basic_other_sunsetcafe',
		array( 'label' => 'SunsetCafe', 'section' => 'basic_other_themes', 'settings' => 'basic_other_sunsetcafe', )
	) );

}

add_action( 'customize_register', 'basic_customizer_init' );
