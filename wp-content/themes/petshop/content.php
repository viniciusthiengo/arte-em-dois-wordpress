<section id="blogcontent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="bloginner-content-part">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <div class="blog-img">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'petpetshophopThumbnailImage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>"><h2 class="title-data"><?php the_title(); ?></h2></a>
                        <?php PetShopEntryMeta();
                            the_excerpt(); ?>
                    </div>
                <?php endwhile;
                    the_posts_pagination( array(
                        'Previous' => __( 'Back', 'petshop' ),
                        'Next' => __( 'Onward', 'petshop' ),
                    ) ); ?>
            </div>
            <div class="">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>