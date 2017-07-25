<header id="page-header" class="main-header bg-white header-four" role="banner">
	<section class="header-nav">
		<div class="container">
			<div class="row make-vertical">
				<div class="col-md-4 col-sm-3">
					<figure class="brand-identity">
						<?php echo $logo; ?>						
					</figure>
				</div>
				<div class="col-md-6 col-sm-3">
					<nav class="primary-navigation text-uppercase">
						<a href="#" class="nav-devices font-2x"><i data-icon="&#xf394;"></i></a>
						<?php echo $menu; ?>
					</nav>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="header-social align-right">
						<?php echo $social; ?>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.header-nav -->
</header> <!-- /.main-container -->

<?php if( is_front_page() && get_header_image() ): ?>
	<?php 
		$header = get_custom_header();
		$help_class = $header->height > 550 ? 'center-header' : '';
		$enable_hero = get_theme_mod('header_textcolor');
 	?>
 	
	<div class="main-hero <?php echo $help_class; ?>">
		<?php if ($enable_hero !== 'blank'): ?>
			<div class="hero-message text-white">
				<h1 class="text-white font-alpha"><span><?php bloginfo('name'); ?></span></h1>
				<h2 class="text-uppercase text-white"><?php bloginfo('description'); ?></h2>
			</div>
		<?php endif ?>
		<?php $hero_image = get_header_image(); ?>
		<?php if( !empty($hero_image) ): ?>
			<img src="<?php echo esc_url( $hero_image ); ?>" height="<?php echo esc_attr( $header->height ); ?>" width="<?php echo esc_attr( $header->width ); ?>" alt="sentio hero" />
		<?php endif; ?>	
	</div>
	
<?php endif; ?>