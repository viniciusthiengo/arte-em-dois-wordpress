<?php
/*
 * The Header template for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?php echo '#'.get_header_textcolor(); ?>" />
    <meta name="msapplication-navbutton-color" content="<?php echo '#'.get_header_textcolor(); ?>">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="<?php echo '#'.get_header_textcolor(); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <div class="preloader">
        <span class="preloader-gif">
            <svg width='70px' height='70px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring">
                <circle id="loader" cx="50" cy="50" r="40" stroke-dasharray="163.36281798666926 87.9645943005142" stroke="<?php echo '#'.get_header_textcolor(); ?>" fill="none" stroke-width="5"></circle>
            </svg>
        </span>
    </div>
    <header>
        <div id="icoach_navigation" class="navbar navbar-fixed-top">
            <div class="container">
                <!-- Logo start -->
                <div class="main-logo">
                    <?php
                        $logo_image = '';
                        $icoach_dark_logo=get_theme_mod('icoach_dark_logo');
                        $icoach_dark_logo=wp_get_attachment_url($icoach_dark_logo);
                        if (function_exists('get_custom_logo')) {
                            $logo_image = has_custom_logo(); 
                            $logo = get_custom_logo();
                        }
                        if($logo != ''){
                            echo $logo;
                        }else{
                            echo '<div class="logo-light brandText"><a href="'.home_url('/').'" rel="home"><h5 class="custom-logo">'.get_bloginfo('name').'</h4></a><h6 class="custom-logo">'.get_bloginfo('description').'</h6></div>';
                        }
                        if($icoach_dark_logo != '' && $logo != ''){ ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                <img class="img-responsive logo-dark" src="<?php echo esc_url($icoach_dark_logo); ?>" alt="<?php esc_attr_e('Logo','icoach'); ?>">
                            </a>
                        <?php }
                            elseif($logo != ''){ ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                <img class="img-responsive logo-dark" src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod( 'custom_logo' ))); ?>" alt="<?php esc_attr_e('Logo','icoach'); ?>">
                            </a>
                        <?php } else{
                            echo '<div class="logo-dark brandText"><a href="'.home_url('/').'" rel="home"><h4 class="logo-dark">'.get_bloginfo('name').'</h5></a><h6 class="logo-dark">'.get_bloginfo('description').'</h6></div>';
                        } ?>
                </div>
                <!-- Logo start -->
                <!-- Menu start -->
                <div id="cssmenu">                    
                        <?php
                            if (has_nav_menu('primary')) {
                                $icoach_defaults = array(
                                'theme_location' => 'primary',
                                'container' => 'none',
                                'items_wrap' => '<ul class="offside">%3$s</ul>',
                            );
                                wp_nav_menu($icoach_defaults);                                        
                            }
                        ?>            
                    </ul>
                </div>
                <!-- Menu end -->
            </div>
        </div>
    </header>