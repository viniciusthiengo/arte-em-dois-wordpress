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
    <header>
        <nav class="navbar sub-header-fixed">
            <div class="container">
                <div class="row">
					<div class="col-md-12 menu-main-list">
                    <!-- Logo start -->
                    <div class="logo-main">
                         <?php if ( has_custom_logo() ) {
                                the_custom_logo();
                            } else {
                                echo '<a href="'. esc_url(home_url()).'"><span class="brandText">' . '<h2>' . esc_html( get_bloginfo( 'name' ) ). '</h2>' . '<small>' . esc_html( get_bloginfo( 'description' ) ) . '</small></span></a>';
                            } ?>
                    </div>
                    <!-- Logo start -->
                    <!-- Menu start -->
                    <div class="mob_nav header-list-item">
                        <div id="cssmenu">
                            <?php $stylic_defaults = array(
                                    'theme_location' => 'primary',
                                    'container' => 'ul',
                                    'items_wrap' => '<ul class="mobilemenu">%3$s</ul>',
                                );
                                wp_nav_menu($stylic_defaults); ?>
                        </div>
                    </div>
                    <!-- Menu end -->
					</div>
				</div>
            </div>
        </nav>
    </header>