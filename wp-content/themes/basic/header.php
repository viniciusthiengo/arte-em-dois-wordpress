<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge" /><![endif]-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="wrapper cleafix">

	<?php do_action( 'basic_before_header' ); ?>
	<!-- BEGIN header -->
	<header id="header" class="<?php echo apply_filters( 'basic_header_class', 'clearfix' ); ?>">

		<?php do_action( 'basic_before_sitetitle' ); ?>
		<div class="<?php echo apply_filters( 'basic_header_sitetitle_class', 'sitetitle maxwidth grid ' . basic_get_theme_option( 'title_position' ) ); ?>">

			<div class="<?php echo apply_filters( 'basic_logo_class', 'logo' ); ?>">

				<?php do_action( 'basic_before_sitelogo' );
				if ( is_home() ) { ?>
                    <h1 id="logo">
                <?php } else { ?>
                    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="blog-name">
                <?php }

                    do_action( 'basic_before_blogname_in_logo' );
					bloginfo( 'name' );
					do_action( 'basic_after_blogname_in_logo' );

                if ( is_home() ) { ?>
                    </h1>
				<?php } else { ?>
                    </a>
				<?php } ?>

				<?php do_action( 'basic_after_sitelogo' ); ?>

				<?php $description = basic_get_theme_option( 'showsitedesc' );
				$show_description  = ( false === $description || ! empty( $description ) || is_customize_preview() );
				if ( $show_description ) { ?>
					<p class="sitedescription"><?php bloginfo( 'description' ); ?></p>
				<?php }
				do_action( 'basic_after_sitedescription' ); ?>

			</div>
			<?php do_action( 'basic_after_sitetitle' ); ?>

		</div>

		<?php do_action( 'basic_before_topnav' ); ?>
		<div class="<?php echo apply_filters( 'basic_header_topnav_class', 'topnav grid' ); ?>">

			<div id="mobile-menu" class="mm-active"><?php _e( 'Menu', 'basic' ); ?></div>

			<nav>
				<?php if ( has_nav_menu( 'top' ) ) :
					wp_nav_menu( array(
						'theme_location' => 'top',
						'menu_id'        => 'navpages',
						'container'      => false,
						'items_wrap'     => '<ul class="top-menu maxwidth clearfix">%3$s</ul>'
					) );
				else : ?>
					<ul class="top-menu maxwidth clearfix">
						<?php if ( is_front_page() ) { ?>
							<li class="page_item current_page_item"><span><?php _e( 'Home', 'basic' ); ?></span></li>
						<?php } else { ?>
							<li class="page_item">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'basic' ); ?></a>
							</li>
						<?php }
						wp_list_pages( 'title_li=&depth=2' ); ?>
					</ul>
				<?php endif; ?>
			</nav>

		</div>
		<?php do_action( 'basic_after_topnav' ); ?>

	</header>
	<!-- END header -->

	<?php do_action( 'basic_after_header' ); ?>


	<div id="main" class="maxwidth clearfix">

		<!-- BEGIN content -->
	
