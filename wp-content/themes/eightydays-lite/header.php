<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package EightyDays
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eightydays-lite' ); ?></a>

	<div class="top-bar">
		<div class="container">
			<div class="top-bar-left pull-left">
				<?php if ( has_nav_menu( 'top_bar_left' ) ) : ?>
					<nav id="top-bar-left-navigation" class="top-bar-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'top_bar_left',
							'container'      => '',
							'menu_class'     => 'top-bar-menu',
							'menu_id'        => 'top-bar-left-menu',
							'fallback_cb'    => '',
						) );
						?>
						<div id="sidebar-toggle" class="sidebar-toggle">
							<span></span>
						</div>
					</nav>
				<?php endif; ?>
			</div>

			<div class="top-bar-right pull-right text-right">
				<?php if ( function_exists( 'jetpack_social_menu' ) ) {
					jetpack_social_menu();
				} ?>
			</div>
		</div>
	</div><!-- .top-bar -->

	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="site-branding text-center">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<?php if ( is_front_page() ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php else : ?>
					<div class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
			<?php endif; ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container_class' => 'container',
					'menu_id'         => 'primary-menu',
					'menu_class'      => 'primary-menu text-center',
				) );
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->

	<div class="container">
		<main id="main" class="site-main">