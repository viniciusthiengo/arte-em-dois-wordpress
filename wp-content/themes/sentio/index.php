<?php get_header(); ?>
	<main class="main-content" role="main">
		<section class="content-box">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php if( have_posts() ) : echo sentio_get_meta_title();
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile; ?>
						<div class="post-pagination align-center">
							<?php
								global $wp_query;
								 echo paginate_links( array(
									'base'     => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'format'   => '?paged=%#%',
									'total'    => $wp_query->max_num_pages,
									'current'  => max( 1, get_query_var('paged') ),
									'mid_size' => 1,
									'prev_next' => false,
									'type'      => 'list',
								) );
							?>
						</div>

						<?php else : get_template_part( 'content', 'none' ); endif;?>
					</div>
					<div class="col-md-4">
						<?php if( is_active_sidebar('sidebar-1') ) {
							dynamic_sidebar('sidebar-1');
						} ?>
					</div>
				</div>
			</div>
		</section> <!-- /.content-box -->
	</main> <!-- /.main-content -->

<?php get_footer(); ?>