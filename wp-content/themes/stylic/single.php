<?php
/*
* Single Post template file
*/
get_header(); ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php the_title(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container blog1-container-xs">
    <div class="row blog-content">
        <?php get_sidebar(); ?>
        <div class="col-md-9 col-sm-9 col-xs-12 blog-post">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="">
                    <div class="single-blog-content">
                        <div class="blog1-main-items">
                            <h2><?php the_title(); ?></h2>
                            <?php stylic_single_meta(); ?>
                        </div>
                        <?php if ( has_post_thumbnail() ) : ?>
                         <div class="blog1-imagesItems-content">
                            <?php the_post_thumbnail( 'stylic_blog_thumbnail_image', array('class' => 'img-responsive') ); ?>
                        </div>
                        <?php endif; ?>
                        <div class="blog1-subtext-content">
                           <?php the_content(); ?>
                       </div>
                    </div>
                </div>
                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'stylic' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'stylic' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) ); ?>
                 <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="single-blog-tag">
                            <?php stylic_tag_meta(); ?>
                        </div>
                    </div>
                </div>
                <?php comments_template('', true);
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'stylic' ),
                    'next_text'          => __( 'Next page', 'stylic' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'stylic' ) . ' </span>',
                ) ); 
                endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer();