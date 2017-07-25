<?php get_header(); ?>
<main class="content-wrapper" role="main">
	<section class="content-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="box page-cover align-center error-page">
						<h1><?php _e('Page not found', 'breviter'); ?></h1>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/404.png" alt="404 error page">
						
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