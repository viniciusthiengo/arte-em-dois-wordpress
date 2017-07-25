<?php $stylic_bs_clearfix = 0; ?>
<div class="container blog1-container-xs">
    <div id="post-<?php the_ID(); ?>" <?php post_class( 'row blog-content' ); ?>>
            <?php get_sidebar(); ?>
        <div class="col-md-9 col-sm-9 col-xs-12 blog-post">
				<div class="row">
                <?php while ( have_posts() ) : the_post();
                $stylic_clearfix = stylic_bootstrap_clearfix( $stylic_bs_clearfix,  array( 'xs' => 12, 'sm' => 6, 'md' => 4, 'lg' => 4 ) );
                echo $stylic_clearfix;
                $stylic_bs_clearfix ++; ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="main-blog-hover">
                            <div class="zoom-effect">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'stylic_thumbnail_image', array( 'class' => 'img-responsive image-zoom') ); ?></a>
                            </div>
                            <div class="slide-text-bog">
                                <div class="slide-blog-date">
                                    <?php stylic_entry_meta(); ?>
                                </div>
                                <div class="slide-blog-title">
                                    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                </div>
                                <div class="slide-blog-subtitle">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="slide-blog-more-button">
                                    <a href="<?php the_permalink(); ?>" class="btn-light"><?php esc_html_e( 'READ MORE', 'stylic' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                the_posts_pagination( array(
                    'Previous' => __( 'Back', 'stylic' ),
                    'Next' => __( 'Onward', 'stylic' ),
                ) ); ?>
			</div>
        </div>
    </div>
</div>
</div>