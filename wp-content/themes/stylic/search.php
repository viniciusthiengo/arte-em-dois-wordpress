<?php
/*
 * Search Template File
 */
get_header(); ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php echo esc_html__( 'Search results for : ', 'stylic' ) . get_search_query(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (have_posts()) :
    get_template_part('content');
else : ?>
    <div class="blog-content">
        <div class="container">
            <div class="row">
                <?php get_sidebar(); ?>
                <div class="col-md-9">
                    <div class="blog-content-area fadeIn animated">
                        <div class="search-area">
                            <p class="spage">
                            <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'stylic' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; 
get_footer();