<?php
/*
 * 404 Template File
 */
get_header(); ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php esc_html_e('404 - Page Not Found', 'stylic'); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (have_posts()) : ?>
    <?php get_template_part('content'); ?>
<?php else : ?>
    <div class="blog-content">
        <div class="container">
            <div class="row">
                <?php get_sidebar(); ?>
                <div class="col-md-9">
                    <div class="blog-content-area fadeIn animated">
                        <div class="search-area">
                            <h3><?php esc_html_e('Oops! That page can\'t be found.','stylic') ?></h3>
                            <p class="spage">
                            <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'stylic' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;
get_footer();