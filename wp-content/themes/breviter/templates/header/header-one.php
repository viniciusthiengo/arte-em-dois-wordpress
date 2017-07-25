<header class="main-header sticky">
	<!-- Top Bar -->
	<div class="top-bar box">
		<div class="container">
			<!-- Mobile Nav Toggle -->
			<span class="mobile-nav-toggle"><i class="icon-menu2"></i></span>
			<!-- Main Nav -->
			<?php printf( '<nav class="main-nav">%s</nav>', balanceTags( $menu ) ); ?>
			<!-- Search Form Toggle -->
			<span class="search-form-toggle"><i class="icon-search"></i></span>
			<!-- Main Search Form  -->
			<?php get_search_form( true ); ?>
		</div>
	</div>

	<!-- Main Header Area -->
	<div class="header-area">
		<div class="container align-center">
			<!-- Site Tagline -->
			<?php if( ! empty( $meta ) ): ?>
				<div class="site-tagline">
					<span class="tagline-content"><?php echo $meta; ?></span>
				</div>
			<?php endif; ?>
			<!-- Site Logo -->
			<?php echo balanceTags( $logo ); ?>
		</div>
	</div>
</header>
<?php if( is_front_page() && get_header_image() ): ?>
	<?php 
		$header = get_custom_header();
		$help_class = $header->height > 550 ? 'center-header' : '';
		$enable_hero = get_theme_mod( 'header_textcolor' );
 	?>
 	
	<div class="main-hero <?php echo $help_class; ?>">
		<?php $hero_image = get_header_image(); ?>
		<?php if( !empty( $hero_image ) ): ?>
			<img src="<?php echo esc_url( $hero_image ); ?>" height="<?php echo esc_attr( $header->height ); ?>" width="<?php echo esc_attr( $header->width ); ?>" alt="breviter hero" />
		<?php endif; ?>	
	</div>
	
<?php endif; ?>