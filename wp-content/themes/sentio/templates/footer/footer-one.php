<footer class="main-footer" role="contentinfo">
	<section class="footer-info bg-alpha">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="footer-about text-center text-beta">
						<?php echo $logo; ?>
						<p><?php echo $info; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.footer-info -->

	<section class="copyright-stuff bg-white text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><?php esc_html_e( 'Designed by ', 'sentio' ); ?>
						<?php printf( '<a href="%s">%s</a>'
							, esc_attr__( 'http://designhooks.com/', 'sentio' )
							, esc_html__( 'DesignHooks', 'sentio' )
						); ?>
					</p>
				</div>
			</div>
		</div>
	</section> <!-- /.copyright-stuff -->
</footer> <!-- /.main-footer -->