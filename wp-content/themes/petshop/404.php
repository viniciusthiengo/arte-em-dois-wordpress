<?php
/*
 * 404 Template File
 */
get_header(); ?>
<section id="inner-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="innerpage-head">
                    <h2><?php _e('404 - Page Not Found', 'petshop'); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (have_posts()) :
    get_template_part('content');
else : ?>
    <section id="blogcontent">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="bloginner-content-part">
                            <p class="spage">
                            <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'petshop'); ?>.</p>
                            <?php get_search_form(); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; get_footer(); ?>