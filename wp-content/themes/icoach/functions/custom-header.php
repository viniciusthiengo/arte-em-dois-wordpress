<?php
function icoach_custom_header_setup() {
	$icoach_args = array(
		'default-text-color'     => '#5164cf',
		'wp-head-callback'       => 'icoach_header_style',
	);
	add_theme_support( 'custom-header', $icoach_args );
}
add_action( 'after_setup_theme', 'icoach_custom_header_setup', 15 );
function icoach_header_style() {
	$icoach_header_image = get_header_image();
	$icoach_text_color   = get_header_textcolor();
	$icoach_background_color   = get_background_color();
	// If no custom options for text are set, let's bail.
	if ( empty( $icoach_header_image ) && $icoach_text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;
	// If we get this far, we have custom styles.
	?>
    <style type="text/css" id="icoach-header-css">
         <?php if (get_header_image()) : ?>
        .blog-heading-wrap {
            background-image: url(<?php header_image(); ?>);
        }
        @media (max-width: 767px) {
            .site-header {
                background-size: 768px auto;
            }
        }
        @media (max-width: 359px) {
            .site-header {
                background-size: 360px auto;
            }
        }
        <?php endif;
        if ( $icoach_text_color !=get_theme_support( 'custom-header', 'default-text-color')): ?>
        .footer-wrap .copyright a:hover {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-blank:hover:before, .btn-blank:focus:before, .btn-blank:active:before{box-shadow: inset 10px 0 0 0px #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-blank {box-shadow: inset 0 0 0 1px #<?php echo esc_attr($icoach_text_color); ?>;}
        #menu-line{background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-speechblue:before {background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-speechblue:hover:before, .btn-speechblue:focus:before, .btn-speechblue:active:before {background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .title h2,.menu-left h2 {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        .contact-me input:focus, .contact-me textarea:focus {border-color: #<?php echo esc_attr($icoach_text_color); ?>;box-shadow: inset 0 0 0 1px #<?php echo esc_attr($icoach_text_color); ?>;}
        input[type=submit] {box-shadow: inset 10px 0 0 0px #<?php echo esc_attr($icoach_text_color); ?>;}
        input[type=submit]:hover,.menu-left li:hover:before {background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .blog-carousel .blog-carousel-title h2 {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-nav:focus, .btn-nav:hover {background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .icoach-slider .slider-control:hover {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-light:focus, .btn-light:hover {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        a:hover, a:focus,.sow-slide-nav a:hover .sow-sld-icon-themeDefault-left, .sow-slide-nav a:hover .sow-sld-icon-themeDefault-right,
        .blog-carousel .blog-carousel-title h4 {color: #<?php echo esc_attr($icoach_text_color); ?>;}
        .btn-speechblue{box-shadow: inset 10px 0 0 0px #<?php echo esc_attr($icoach_text_color); ?>;}
        .knowledge-box:hover {background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .comment-form p.form-submit{box-shadow: inset 10px 0 0 0px #<?php echo esc_attr($icoach_text_color); ?>;}
        .comment-form .form-submit:hover::before{background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .comment-form p.form-submit:before{background: #<?php echo esc_attr($icoach_text_color); ?>;}
        .title-data h2 a{color: #<?php echo esc_attr($icoach_text_color); ?>;}
        #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a, #cssmenu > ul > li.current-menu-parent > a,
        #cssmenu > ul li a.active{
            border-color: #<?php echo esc_attr($icoach_text_color); ?>;
        }
        .search-submit:hover, .search-submit:focus{
            background: #<?php echo esc_attr($icoach_text_color); ?>;
        }
        .brandText {
            <?php if(display_header_text() == 1) : ?>
                clip: auto;
                position: absolute;
            <?php else : ?>
                clip: rect(1px 1px 1px 1px);
                position: absolute;
            <?php endif; ?>
        }
        @media only screen and (max-width:1024px) {
            #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a, #cssmenu > ul > li.current-menu-parent > a{
                border-color: rgba(0, 0, 0, 0.1);
                color: #5164ce;
            }
        }
        <?php endif;
        ?>
    </style>
    <?php 
} ?>