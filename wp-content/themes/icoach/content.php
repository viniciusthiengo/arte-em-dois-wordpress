<div class="blog-wrapper">
    <div class="icoach-section">
        <div class="container">
            <div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                <div class="col-md-9 col-sm-12 col-xs-12  pull-right">
                    <div class="blog-content-area fadeIn animated">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-content">
                                <div class="title-data fadeIn animated">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                    <?php icoach_entry_meta(); ?>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                <div class="blog-images">
                                    <?php the_post_thumbnail('',array( 'alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                </div>
                            <?php endif; ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink();?>" class="btn-light"><?php _e('READ MORE','icoach'); ?></a>
                            </div>
                        <?php endwhile;  ?> 
                        <?php the_posts_pagination( array(
                            'Previous' => __( 'Back', 'icoach' ),
                            'Next' => __( 'Onward', 'icoach' ),
                        ) ); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>