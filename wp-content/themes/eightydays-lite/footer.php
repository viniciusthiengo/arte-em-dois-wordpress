</main>
</div><!-- .container -->

<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="site-info clearfix">
		<div class="container">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			<div class="credit">
				<?php
				echo wp_kses_post( sprintf(
					__( 'Copyright &copy; %s %s. All rights reserved.<br>Proudly powered by %s. Theme %s by GretaThemes.', 'eightydays-lite' ),
					date_i18n( __( 'Y', 'eightydays-lite' ) ),
					'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a>',
					'<a href="https://wordpress.org">WordPress</a>',
					'<a href="http://gretathemes.com/wordpress-themes/eightydays">EightyDays Lite</a>'
				) );
				?>
			</div>
			<?php if ( function_exists( 'jetpack_social_menu' ) ) jetpack_social_menu(); ?>
		</div>
	</div><!-- .site-info -->
</footer>
</div><!-- #page -->

<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'jetpack-social-menu' ) ) : ?>
	<aside class="mobile-sidebar">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav class="mobile-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => '',
					'menu_id'        => 'primary-menu-mobile',
					'menu_class'     => 'primary-menu-mobile',
				) );
				?>
			</nav>
		<?php endif; ?>
		<?php if ( function_exists( 'jetpack_social_menu' ) ) jetpack_social_menu(); ?>
	</aside>
<?php endif; ?>

<?php if ( eightydays_is_genericons_enqueued() ) : ?>
	<a href="#" id="scroll-to-top"><span class="genericon genericon-collapse"></span></a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
