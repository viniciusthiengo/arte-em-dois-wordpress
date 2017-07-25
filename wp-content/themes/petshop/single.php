<?php
/*
* Single Post template file
*/
get_header(); ?>
<section id="inner-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="innerpage-head">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="bloginner-content-part">
                    <div class="blog-info">
                        <?php PetShopSingleMeta(); ?>
                    </div>
                    <?php if(has_post_thumbnail()) : ?>
                        <div class="blog-img">
                            <?php the_post_thumbnail( 'petShopBlogThumbnailImage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
                        </div>
                    <?php endif;
                        the_content(); ?>
                    <div class="comment-part"><?php comments_template('', true); ?></div>
                    <!-- comment-part End -->
                </div>
                <?php wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'petshop' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'petshop' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'petshop' ),
                            'next_text'          => __( 'Next page', 'petshop' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'petshop' ) . ' </span>',
                        ) ); 
                        endwhile; ?>
            </div>
            <div><?php get_sidebar(); ?></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>