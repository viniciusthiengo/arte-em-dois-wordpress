<?php
/*
* Single Post template file
*/
get_header(); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<div class="single-blog-wrapper">
    <div class="icoach-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="single-blog-content-area fadeIn animated">
                            <div class="single-blog-content">
                                <div class="title-data fadeIn animated">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php icoach_entry_meta(); ?>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                 <div class="single-blog-images">
                                    <?php the_post_thumbnail('',array( 'alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                </div>
                                <?php endif;
                                    the_content(); ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-blog-tag">
                                        <?php icoach_tag_meta(); ?>
                                    </div>
                                </div>
                            </div>
                           <?php // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                } ?>
                        </div>
                        <?php wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'icoach' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'icoach' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) ); ?>
                <?php endwhile; ?>
                </div>
                <div class="">
                   <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>