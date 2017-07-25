<?php get_header(); ?>
	<main class="content-wrapper" role="main">
		<section class="content-box">
			<div class="container">
				<?php if( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );
					endwhile;
				else : get_template_part( 'content', 'none' ); endif;?>
			</div>
		</section> <!-- /.content-box -->
	</main> <!-- /.main-content -->
<?php get_footer(); ?>