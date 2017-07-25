<?php
/**
 * Main Page template file
 **/
get_header();
if(!is_front_page()) : ?>
<!--Page template start from here-->
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="blog-wrapper">
    <div class="icoach-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12  pull-right">
                    <div class="blog-content-area fadeIn animated">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-content">
                                <div class="title-data fadeIn animated">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                <div class="blog-images">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('',array( 'alt' => get_the_title(), 'class' => 'img-responsive')); ?></a>
                                </div>
                            <?php endif;
                                the_content();
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                } ?>
                            </div>
                        <?php endwhile; ?> 
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>