<?php get_header(); ?>
<main class="main-content" role="main">
	<section class="content-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bg-white text-center error-box">
						<h1><?php _e( 'Page not found', 'sentio' ); ?></h1>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/404.png" alt="<?php esc_html_e( '404 error page', 'sentio' ); ?>">	
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<?php echo get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.content-box -->
</main> <!-- /.main-content -->
<?php get_footer(); ?>