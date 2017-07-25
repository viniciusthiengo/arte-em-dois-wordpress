<?php
/*
 * The Header template for theme
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <nav class="header-top">
            <div class="container">
                <!-- Logo -->
                <div class="ourlogo">
                    <?php $petShopLogoImage = '';
                        if (function_exists('get_custom_logo')) {
                            $petShopLogoImage = has_custom_logo(); 
                            $petShopOutputLogo = get_custom_logo();
                        } 
                        if(empty($petShopLogoImage)){
                                echo '<span class="brandText">'.get_bloginfo('name').'<small><br>'.get_bloginfo('description').'</small></span>';
                         }else{ echo $petShopOutputLogo; } ?>
                </div>
                <!-- Logo End -->
                <!-- Menu -->
                    <!-- Responsive Menu -->
                    <div id='cssmenu'>
                        <div id="head-mobile"></div>
                        <div class="button"></div>
                        <?php if (has_nav_menu('primary')) {
                                $petShopDefaults = array(
                                    'theme_location' => 'primary',
                                    'container' => 'none',
                                    'items_wrap' => '<ul class="MobileMenu">%3$s</ul>',
                                );
                                wp_nav_menu($petShopDefaults);                                        
                            } ?>
                    </div>
                    <!-- Responsive Menu End -->
                <!-- Menu End -->
            </div>
        </nav>