</div>
<!-- /wrapper -->

</div>
<!-- /outer-wrapper -->

<footer>
	<div class="footer-inner">
		
		<?php if ( !has_nav_menu( 'footer' ) ) { ?>
		<div class="theme-copyright">
			<?php printf( esc_html('%1$s %2$s', 'branches' ), bloginfo( 'name' ), date_i18n(__('Y','branches')) ); ?>
		</div>
		<?php } ?>
		
		<?php if ( has_nav_menu( 'footer' ) ) { ?>
		
		<div class="footer-navi">
			<ul>	
			<?php											
			wp_nav_menu( array( 
			
				'container' => '', 
				'items_wrap' => '%3$s',
				'theme_location' => 'footer'
											
			) ); 
			?>
			</ul>
		</div>
		<?php } ?>
		
		<div class="theme-linklove">
			<?php if ( has_nav_menu( 'footer' ) ) { ?>
			<?php printf( esc_html('%1$s %2$s', 'branches' ), bloginfo( 'name' ), date_i18n(__('Y','branches')) ); ?><br />
			<?php } ?>
			<a href="<?php echo esc_url('http://www.flohauck.de'); ?>" target="_blank"><?php printf( __( 'Theme by %s', 'branches' ), 'Flo Hauck' ); ?></a>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>