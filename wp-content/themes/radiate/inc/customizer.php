<?php
/**
 * Radiate Theme Customizer
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function radiate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'radiate_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function radiate_customize_preview_js() {
	wp_enqueue_script( 'radiate_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'radiate_customize_preview_js' );

/*****************************************************************************************/

function radiate_register_theme_customizer( $wp_customize ) {
	// remove control
	$wp_customize->remove_control('blogdescription');

	// Theme important links
	class Radiate_Important_Links extends WP_Customize_Control {

		public $type = "radiate-important-links";

		public function render_content() {
			//Add Theme instruction, Support Forum, Demo Link, Rating Link
			$important_links = array(
			'view-pro' => array(
				'link' => esc_url('https://themegrill.com/themes/radiate/'),
				'text' => esc_html__('View Pro', 'radiate'),
			),
			'support' => array(
				'link' => esc_url('https://themegrill.com/support-forum/'),
				'text' => esc_html__('Support', 'radiate'),
			),
			'documentation' => array(
				'link' => esc_url('https://docs.themegrill.com/radiate/'),
				'text' => esc_html__('Documentation', 'radiate'),
			),
			'demo' => array(
				'link' => esc_url('https://demo.themegrill.com/radiate/'),
				'text' => esc_html__('View Demo', 'radiate'),
			),
			'rating' => array(
				'link' => esc_url('http://wordpress.org/support/view/theme-reviews/radiate?filter=5'),
				'text' => esc_html__('Rate this theme', 'radiate'),
			),
			);
			foreach ($important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
			}
		}
	}

	$wp_customize->add_section('radiate_important_links',
		array(
			'priority' => 1,
			'title'    => esc_html__('Radiate Important Links', 'radiate'),
		)
	);

	$wp_customize->add_setting('radiate_important_links',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'radiate_sanitize_important_links'
		)
	);

	$wp_customize->add_control(
		new radiate_Important_Links($wp_customize,
			'important_links',
			array(
				'label'    => esc_html__('Important Links', 'radiate'),
				'section'  => 'radiate_important_links',
				'settings' => 'radiate_important_links'
			)
		)
	);

	// rename existing section
	$wp_customize->add_section( 'title_tagline' , array(
		'title' => __('Site Title', 'radiate' ),
		'priority' => 20
	) );

	$wp_customize->add_setting(
		'radiate_color_scheme',
			array(
				'default'     	=> '#632E9B',
            'capability' => 'edit_theme_options',
				'sanitize_callback' => 'radiate_sanitize_hex_color',
				'sanitize_js_callback' => 'radiate_sanitize_escaping'
			)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme',
			array(
				'label'      	=> __( 'Primary Color', 'radiate' ),
				'section'    	=> 'colors',
				'settings'   	=> 'radiate_color_scheme'
			)
		)
	);

	if ( ! function_exists( 'wp_update_custom_css_post' ) ) {

		class RADIATE_ADDITIONAL_Control extends WP_Customize_Control {
			public $type = 'textarea';

			public function render_content() {
				?>
				<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
				<?php
			}
		}

		$wp_customize->add_section(
			'radiate_custom_css_section',
			array(
				'title'     => __( 'Custom CSS', 'radiate' ),
				'priority'  => 200
			)
		);

		$wp_customize->add_setting(
			'radiate_custom_css',
			array(
				'default'    =>  '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'sanitize_js_callback' => 'wp_filter_nohtml_kses'
			)
		);

		$wp_customize->add_control(
			new RADIATE_ADDITIONAL_Control (
				$wp_customize,
				'radiate_custom_css',
				array(
					'label'    	=> __( 'Add your custom css here and design live! (for advanced users)' , 'radiate' ),
					'section'   => 'radiate_custom_css_section',
					'settings'  => 'radiate_custom_css'
				)
			)
		);
	}

	$wp_customize->add_section(
		'radiate_featured_section',
		array(
			'title'     => __( 'Front Page Featured Section', 'radiate' ),
			'priority'  => 220
		)
	);

	$wp_customize->add_setting(
		'page-setting-one',
		array(
         'capability' => 'edit_theme_options',
			'sanitize_callback' => 'radiate_sanitize_integer'
		)
	);
	$wp_customize->add_setting(
		'page-setting-two',
		array(
         'capability' => 'edit_theme_options',
			'sanitize_callback' => 'radiate_sanitize_integer'
		)
	);
	$wp_customize->add_setting(
		'page-setting-three',
		array(
         'capability' => 'edit_theme_options',
			'sanitize_callback' => 'radiate_sanitize_integer'
		)
	);

	$wp_customize->add_control(
		'page-setting-one',
			array(
			'type' => 'dropdown-pages',
			'label' => __( 'First featured page', 'radiate' ),
			'section' => 'radiate_featured_section',
		)
	);
	$wp_customize->add_control(
		'page-setting-two',
			array(
			'type' => 'dropdown-pages',
			'label' => __( 'Second featured page', 'radiate' ),
			'section' => 'radiate_featured_section',
		)
	);
	$wp_customize->add_control(
		'page-setting-three',
			array(
			'type' => 'dropdown-pages',
			'label' => __( 'Third featured page', 'radiate' ),
			'section' => 'radiate_featured_section',
		)
	);

	// Author Bio
   $wp_customize->add_section(
      'radiate_author_bio',
      array(
         'title'     => __( 'Author Bio', 'radiate' ),
         'priority'  => 250
      )
   );

   $wp_customize->add_setting(
      'radiate_author_bio_show',
         array(
         'default' => 0,
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'radiate_checkbox_sanitize'
      )
   );

   $wp_customize->add_control(
      'radiate_author_bio_show',
         array(
         'type' => 'checkbox',
         'label' => __('Check to enable the Author Bio in the single post page.', 'radiate'),
         'section' => 'radiate_author_bio',
         'settings' => 'radiate_author_bio_show'
      )
   );

   // Hide Search Icon
   $wp_customize->add_section(
      'radiate_search_icon',
      array(
         'title'     => __( 'Header Search Icon', 'radiate' ),
         'priority'  => 270
      )
   );

   $wp_customize->add_setting(
      'radiate_header_search_hide',
        array(
         'default' => 0,
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'radiate_checkbox_sanitize'
      )
   );

   $wp_customize->add_control(
      'radiate_header_search_hide',
         array(
         'type' => 'checkbox',
         'label' => __('Check to hide Header Search Icon.', 'radiate'),
         'section' => 'radiate_search_icon',
         'settings' => 'radiate_header_search_hide'
      )
   );

   	// Responsive Menu Style
	$wp_customize->add_section(
		'radiate_menu_section',
		array(
			'title'     => esc_html__( 'Responsive Menu Style', 'radiate' ),
			'priority'  => 280
		)
	);

	$wp_customize->add_setting(
		'radiate_new_menu_enable',
		array(
			'default' 				=> 0,
			'capability' 			=> 'edit_theme_options',
			'sanitize_callback' 	=> 'radiate_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'radiate_new_menu_enable',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> esc_html__('Switch to full width menu style.', 'radiate'),
			'section' 		=> 'radiate_menu_section',
			'settings' 		=> 'radiate_new_menu_enable'
		)
	);

   $wp_customize->add_setting(
		'radiate_responsive_menu_style',
		array(
			'default'           => 0,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'radiate_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'radiate_responsive_menu_style',
		array(
			'type'      => 'checkbox',
			'label'     => esc_html__('Switch to new responsive menu style.', 'radiate'),
			'section'   => 'radiate_menu_section',
			'settings'  => 'radiate_responsive_menu_style'
		)
	);

	function radiate_sanitize_hex_color( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;

		return $color;
	}

	function radiate_sanitize_integer( $input ) {
    	if( is_numeric( $input ) ) {
        return intval( $input );
   	}
	}

	function radiate_sanitize_escaping( $input) {
		$input = esc_attr( $input);
		return $input;
	}

   function radiate_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }

   	// Fake sanitize function
	function radiate_sanitize_important_links() {
		return false;
	}

}
add_action( 'customize_register', 'radiate_register_theme_customizer' );

if ( ! function_exists( 'radiate_darkcolor' ) ) :
/**
 * Generate darker color
 * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
function radiate_darkcolor($hex, $steps) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max(-255, min(255, $steps));

	// Normalize into a six character long hex string
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}

	// Split into three parts: R, G and B
	$color_parts = str_split($hex, 2);
	$return = '#';

	foreach ($color_parts as $color) {
		$color   = hexdec($color); // Convert to decimal
		$color   = max(0,min(255,$color + $steps)); // Adjust color
		$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
	}

	return $return;
}
endif;


function radiate_customizer_css() {
	$primary_color 	=  get_theme_mod( 'radiate_color_scheme' );
	$primary_dark	= radiate_darkcolor($primary_color, -50);
	if( $primary_color && $primary_color != '#632e9b') {
		$customizer_css = ' blockquote{border-color:#EAEAEA #EAEAEA #EAEAEA '.$primary_color.'}.site-title a:hover,a{color:'.$primary_color.'}#masthead .search-form,.main-navigation a:hover,.main-navigation ul li ul li a:hover,.main-navigation ul li ul li:hover>a,.main-navigation ul li.current-menu-ancestor a,.main-navigation ul li.current-menu-item a,.main-navigation ul li.current-menu-item ul li a:hover,.main-navigation ul li.current_page_ancestor a,.main-navigation ul li.current_page_item a,.main-navigation ul li:hover>a{background-color:'.$primary_color.'}.header-search-icon:before{color:'.$primary_color.'}button,input[type=button],input[type=reset],input[type=submit]{background-color:'.$primary_color.'}#content .comments-area a.comment-edit-link:hover,#content .comments-area a.comment-permalink:hover,#content .comments-area article header cite a:hover,#content .entry-meta span a:hover,#content .entry-title a:hover,.comment .comment-reply-link:hover,.comments-area .comment-author-link a:hover,.entry-meta span:hover,.site-header .menu-toggle,.site-header .menu-toggle:hover{color:'.$primary_color.'}.main-small-navigation ul li ul li a:hover,.main-small-navigation ul li:hover,.main-small-navigation ul li a:hover,.main-small-navigation ul li ul li:hover>a,.main-small-navigation ul > .current_page_item, .main-small-navigation ul > .current-menu-item,.main-small-navigation ul li.current-menu-item ul li a:hover{background-color:'.$primary_color.'}#featured_pages a.more-link:hover{border-color:'.$primary_color.';color:'.$primary_color.'}a#back-top:before{background-color:'.$primary_color.'}a#scroll-up span{color:'.$primary_color.'}
			.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
			.wocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {background-color: '.$primary_color.'}
			.woocommerce .woocommerce-message::before { color: '.$primary_color.'; }
			.main-small-navigation ul li ul li.current-menu-item > a { background: '.$primary_color.'; }

			@media (max-width: 768px){.better-responsive-menu .sub-toggle{background:'.$primary_dark.'}}';
	?>
	<style type="text/css"><?php echo $customizer_css; ?></style>
	<?php
	}
// 	.main-small-navigation ul li ul li.current-menu-item > a {
//     background: #ce3785;
//     color: #fff;
// }
	$radiate_custom_css = get_theme_mod( 'radiate_custom_css' );
	if( $radiate_custom_css && ! function_exists( 'wp_update_custom_css_post' ) ) {
		echo '<!-- '.get_bloginfo('name').' Custom Styles -->';
		?><style type="text/css"><?php echo esc_html( $radiate_custom_css ); ?></style><?php
	}
}
add_action( 'wp_head', 'radiate_customizer_css' );

/*****************************************************************************************/

add_action( 'customize_controls_print_footer_scripts', 'radiate_customizer_custom_scripts' );

function radiate_customizer_custom_scripts() { ?>
<style>
	/* Theme Instructions Panel CSS */
	li#accordion-section-radiate_important_links h3.accordion-section-title, li#accordion-section-radiate_important_links h3.accordion-section-title:focus { background-color: #289DCC !important; color: #fff !important; }
	li#accordion-section-radiate_important_links h3.accordion-section-title:hover { background-color: #289DCC !important; color: #fff !important; }
	li#accordion-section-radiate_important_links h3.accordion-section-title:after { color: #fff !important; }
	/* Upsell button CSS */
	.customize-control-radiate-important-links a {
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#8fc800+0,8fc800+100;Green+Flat+%232 */
		background: #008EC2;
		color: #fff;
		display: block;
		margin: 15px 0 0;
		padding: 5px 0;
		text-align: center;
		font-weight: 600;
	}

	.customize-control-radiate-important-links a{
		padding: 8px 0;
	}

	.customize-control-radiate-important-links a:hover {
		color: #ffffff;
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#006e2e+0,006e2e+100;Green+Flat+%233 */
		background:#2380BA;
	}
</style>
<?php
}
