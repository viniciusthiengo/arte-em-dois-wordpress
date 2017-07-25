<?php get_header(); ?>
	<main class="content-wrapper" role="main">
		<?php if( is_front_page() && function_exists( 'dh_get_shortcode' ) && breviter_option( 'content', 'slider' ) ) : 
			dh_get_shortcode( 'slider', array( 'slider_id' => breviter_option( 'content', 'slider' ) ) );
			if( is_active_sidebar('sidebar-2') ): ?>
				<div class="category-boxes">
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</div>
					</div>
				</div>
			<?php endif;
		endif; ?>
		<section class="content-box">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php if( have_posts() ) : echo breviter_get_meta_title();
							print( '<div class="row">' );
							$i = 0;
							while ( have_posts() ) : the_post();
								printf( '<div class="%s">', apply_filters( 'breviter_posts_size', 'col-sm-12' ) );
								get_template_part( 'content', get_post_format() );
								echo '</div>';
								$i++;
							endwhile; ?>
							<?php if( ! is_singular() ): ?>
							<div class="col-sm-12"><ul class="clean-list navigation-block align-center">
								<?php echo get_previous_posts_link() != '' ?
									sprintf( '<li class="navigation-item prev">%s</li>'
										, get_previous_posts_link( esc_html__( 'Newer Posts', 'breviter') ) ) : ''; ?>
								<?php echo get_next_posts_link() != '' 
									? sprintf( '<li class="navigation-item next">%s</li>'
										, get_next_posts_link( esc_html( 'Older Posts', 'breviter' ) ) ) : ''; ?>
							</ul></div>
							<?php endif; ?>
						</div>
						<?php else : get_template_part( 'content', 'none' ); endif;?>
					</div>
					<div class="<?php echo apply_filters( 'breviter_sidebar_size', 'col-md-4' ); ?>">
						<?php if( is_active_sidebar('sidebar-1') ): ?>
							<aside class="main-sidebar">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</aside>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section> <!-- /.content-box -->
	</main> <!-- /.main-content -->
<?php get_footer(); ?>