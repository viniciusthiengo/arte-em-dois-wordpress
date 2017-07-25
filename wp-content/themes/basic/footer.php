</div> 
<!-- #main -->

<?php do_action( 'basic_before_footer' ); ?>

<footer id="footer" class="<?php echo apply_filters( 'basic_footer_class', '' );?>">

	<?php do_action( 'basic_before_footer_menu' ); ?>

	<?php if (has_nav_menu('bottom')) : ?>
	<div class="<?php echo apply_filters( 'basic_footer_menu_class', 'footer-menu maxwidth' );?>">
		<?php 
		wp_nav_menu( array(
				'theme_location' => 'bottom',
				'menu_id' => 'footer-menu',
				'depth' => 1,
				'container' => false,
				'items_wrap' => '<ul class="footmenu clearfix">%3$s</ul>'
			)); 
		?>
	</div>
	<?php endif; ?>

	<?php do_action( 'basic_before_footer_copyrights' ); ?>

	<div class="<?php echo apply_filters( 'basic_footer_copyrights_class', 'copyrights maxwidth grid' );?>">
		<div class="<?php echo apply_filters( 'basic_footer_copytext_class', 'copytext col6' );?>">
			<p id="copy">
				<!--noindex--><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow"><?php bloginfo('name'); ?></a><!--/noindex--> &copy; <?php echo date("Y",time()); ?>
				<br/>
				<span class="copyright-text"><?php echo basic_get_theme_option('copyright_text'); ?></span>
			</p>
		</div>

		<div class="<?php echo apply_filters( 'basic_footer_themeby_class', 'themeby col6 tr' );?>">
			<p id="designedby">
				<?php _e('Theme by', 'basic'); ?>
				<!--noindex--><a href="<?php echo BASIC_THEME_URI; ?>" target="_blank" rel="external nofollow"><?php _e('WP Puzzle', 'basic'); ?></a><!--/noindex-->
			</p>
			<?php $counters = basic_get_theme_option('footer_counters'); ?>
			<div class="footer-counter"><?php echo wp_specialchars_decode( $counters, ENT_QUOTES ); ?></div>
		</div>
	</div>

	<?php do_action( 'basic_after_footer_copyrights' ); ?>

</footer>
<?php do_action( 'basic_after_footer' ); ?>


</div> 
<!-- .wrapper -->

<a id="toTop">&#10148;</a>

<?php wp_footer(); ?>

</body>
</html>