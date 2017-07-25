<?php

// Theme setup
function branches_setup() {
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	// Automatic feed
	add_theme_support( 'automatic-feed-links' );
	
	// Add nav menu
	register_nav_menu( 'primary', __('Primary Menu','branches') );
	register_nav_menu( 'footer', __('Footer Menu','branches') );
	
	
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'branches_big-header-xxlarge', 2320, 980, true );
	add_image_size( 'branches_big-header-xlarge', 1740, 735, true );
	add_image_size( 'branches_big-header-large', 1160, 490, true );
	add_image_size( 'branches_big-header-medium', 766, 323, true );
	add_image_size( 'branches_big-header-small', 580, 245, true );

	add_image_size( 'branches_post-thumbnail-medium', 720, 460, true );
	add_image_size( 'branches_post-thumbnail-small', 360, 230, true );	
	
	
	add_editor_style( array( 'branches-editor-styles.css', branches_fonts_url() ) );
	

	// Make the theme translation ready
	load_theme_textdomain('branches', get_template_directory() . '/languages');
	
	  
	// Set content-width
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 882;
}
add_action( 'after_setup_theme', 'branches_setup' );

// Add Custom Logo support
function branches_custom_logo_setup() {
    $defaults = array(
		'width'			=> 600,
		'height'		=> 400,
		'flex-height'	=> true,
		'flex-width'	=> true
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'branches_custom_logo_setup' );




if ( ! function_exists( 'branches_fonts_url' ) ) :
function branches_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'branches' ) ) {
		$fonts[] = 'Open Sans:400,600,800';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'branches' ) ) {
		$fonts[] = 'Noto Serif:400,700';
	}
	
	/* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'branches' ) ) {
		$fonts[] = 'Source Sans Pro:400,600,800';
	}

	/* translators: If there are characters in your language that are not supported by Cabin, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cabin font: on or off', 'branches' ) ) {
		$fonts[] = 'Cabin:400,600,800';
	}
	
	/* translators: If there are characters in your language that are not supported by Vollkorn, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Vollkorn font: on or off', 'branches' ) ) {
		$fonts[] = 'Vollkorn:400,700';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;



// Register and enqueue styles
function branches_load_style() {
	if ( !is_admin() ) {
		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'branches-fonts', branches_fonts_url(), array(), null );
	    wp_enqueue_style( 'branches_style', get_stylesheet_uri() );
	}
}
add_action('wp_enqueue_scripts', 'branches_load_style');


// Add sidebar widget area
function branches_widgets_init() {
	
	register_sidebar(array(
	  'name' => __( 'Sidebar', 'branches' ),
	  'id' => 'sidebar',
	  'description' => __( 'Widgets in this area will be shown in the sidebar.', 'branches' ),
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	  'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
	  'after_widget' => '</div><div class="clear"></div></div>'
	));

	register_sidebar(array(
	  'name' => __( 'Header', 'branches' ),
	  'id' => 'header',
	  'description' => __( 'Widgets in this area will be shown on the right Side of the Header.', 'branches' ),
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	  'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
	  'after_widget' => '</div><div class="clear"></div></div>'
	));
		
}
add_action( 'widgets_init', 'branches_widgets_init' ); 



// Enqueue scripts and styles.
function branches_scripts() {

	wp_enqueue_script( 'branches-scripts', get_template_directory_uri() . '/js/branches-scripts.js', array( 'jquery' ), '', true);


	if ( comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'branches_scripts' );


function branches_sanitize_int( $input, $setting ) {
$input = absint( $input );
// If the input is an absolute integer, return it.
// otherwise, return the default.
return ( $input ? $input : $setting->default );
}

function branches_sanitize_string( $input ) {
return $input;
}

// Branches theme options
class branches_Customize {

	public static function branches_register ( $wp_customize ) {
   
      
		
		
		// Add Setting for Accent Color
		$wp_customize->add_setting( 'accent_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
		 array(
		    'default' => '#dd3333', //Default setting/value to save
		    'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
		    'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
		    'sanitize_callback' => 'sanitize_hex_color'            
		 ) 
		);
		
		// Add Control for Accent Color
		$wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
		 $wp_customize, //Pass the $wp_customize object (required)
		 'branches_accent_color', //Set a unique ID for the control
		 array(
		    'label' => __( 'Accent Color', 'branches' ), //Admin-visible name of the control
		    'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
		    'settings' => 'accent_color', //Which setting to load and manipulate (serialized is okay)
		    'priority' => 10, //Determines the order this control appears in for the specified section
		 ) 
		) );
		
		$wp_customize->add_section('branches_fonts',
		    array(
		        'title' => 'Fonts',
		        'description' => __( 'Choose between different Fonts.', 'branches' ),
		        'priority' => 60
		    )
		);
	      
	      
	
		$wp_customize->add_section('branches_sidebar',
		    array(
		        'title' => 'Sidebar',
		        'description' => __( 'Define where to show the Sidebar.', 'branches' ),
		        'priority' => 65,
		    )
		);
	
		$wp_customize->add_setting(
		    'branches_sidebar_frontpage',
		    array(
		        'default' => false,
		        'sanitize_callback' => 'branches_sanitize_int'
		    )
		);
		
		$wp_customize->add_setting(
		    'branches_sidebar_singlepage',
		    array(
		        'default' => false,
		        'sanitize_callback' => 'branches_sanitize_int'
		    )
		);
		
		$wp_customize->add_control(
		    'branches_sidebar_frontpage',
		    array(
		        'label' => __( 'Show Sidebar on front page and on archive/category pages', 'branches' ),
		        'section' => 'branches_sidebar',
		        'type' => 'checkbox',
		    )
		);  
		
		$wp_customize->add_control(
		    'branches_sidebar_singlepage',
		    array(
		        'label' => __( 'Show Sidebar on single post and page template', 'branches' ),
		        'section' => 'branches_sidebar',
		        'type' => 'checkbox',
		    )
		);  
		
		
		$wp_customize->add_section('branches_posts_pages',
		    array(
		        'title' => 'Posts/Pages',
		        'description' => __( 'Some options for the single post and the page template.', 'branches' ),
		        'priority' => 75,
		    )
		);
		
		$wp_customize->add_setting(
		    'branches_show_header_singlepost',
		    array(
		        'default' => false,
		        'sanitize_callback' => 'branches_sanitize_int'
		    )
		);
		
		$wp_customize->add_control(
		    'branches_show_header_singlepost',
		    array(
		        'label' => __( 'Show Featured Image on single post template', 'branches' ),
		        'section' => 'branches_posts_pages',
		        'type' => 'checkbox',
		    )
		);  
		
		// Add Font Switcher
		
		$wp_customize->add_setting(
		    'branches_main_font',
		    array(
		        'default' => 'Open Sans, sans-serif',
		        'sanitize_callback' => 'branches_sanitize_string'
		    )
		);
		
		$wp_customize->add_control(
		    'branches_main_font',
		    array(
		        'label' => __( 'Main Font (Headlines)', 'branches' ),
		        'section' => 'branches_fonts',
		        'type' => 'select',
				'choices'  => array(
					'Open Sans, sans-serif'  => 'Open Sans',
					'Noto Serif, serif'  => 'Noto Serif',
					'Source Sans Pro, sans-serif'  => 'Source Sans Pro',
					'Cabin, sans-serif'  => 'Cabin',
					'Vollkorn, serif'  => 'Vollkorn'
				)
		    )
		);  
		
		
		$wp_customize->add_setting(
		    'branches_second_font',
		    array(
		        'default' => 'Noto Serif, serif',
		        'sanitize_callback' => 'branches_sanitize_string'
		    )
		);
		
		$wp_customize->add_control(
		    'branches_second_font',
		    array(
		        'label' => __( 'Second Font (Text, Teasertext)', 'branches' ),
		        'section' => 'branches_fonts',
		        'type' => 'select',
				'choices'  => array(
					'Open Sans, sans-serif'  => 'Open Sans',
					'Noto Serif, serif'  => 'Noto Serif',
					'Source Sans Pro, sans-serif'  => 'Source Sans Pro',
					'Cabin, sans-serif'  => 'Cabin',
					'Vollkorn, serif'  => 'Vollkorn'
				)
		    )
		); 
	
	}

   public static function branches_header_output() {
      ?>
      
	      <!-- Customizer CSS --> 
	      
	      <style type="text/css">
	           <?php 
		           
			       esc_html( self::branches_generate_css('body, footer .theme-linklove, footer .theme-copyright, #post-area article .teaser-content h2, .read-more, .tag-list, .widget-title, .widget_search #searchform input[type=text], .widget_search #searchform input#searchsubmit, .comment-meta, #commentform label, #commentform input, #commentform textarea, .commentlist .reply, .commentlist cite', 'font-family', 'branches_main_font') ); 
			       
			       esc_html( self::branches_generate_css('#post-area article .teaser-content, .entry, .widget-content, .commentlist .comment-body', 'font-family', 'branches_second_font') ); 
		           
		           esc_html( self::branches_generate_css('.read-more, nav ul li a:hover, nav ul li.current-menu-item > a, nav ul li.current-post-ancestor > a, nav ul li.current-menu-parent > a, nav ul li.current-post-parent > a, nav ul li.current_page_ancestor > a, nav ul li.current-menu-ancestor > a, footer a:hover, #sidebar a:hover, .pagination .page-numbers:hover', 'color', 'accent_color') ); 
		           
		           
		        ?>
	      </style> 
	      
	      <!--/Customizer CSS-->
	      
      <?php
   }
   
   
   public static function branches_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = esc_attr( get_theme_mod($mod_name) );
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'branches_Customize' , 'branches_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'branches_Customize' , 'branches_header_output' ) );


// Change the length of excerpts
function branches_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 42;
}
add_filter( 'excerpt_length', 'branches_custom_excerpt_length', 999 );


// Change the excerpt ellipsis
function branches_new_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' ...';
}
add_filter( 'excerpt_more', 'branches_new_excerpt_more' );

function branches_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'branches_move_comment_field_to_bottom' );

