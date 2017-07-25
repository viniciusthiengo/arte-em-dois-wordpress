<?php
/*
 * Search Template File
 */
get_header(); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php
                _e('Search results for: ', 'icoach');
                echo esc_html(get_search_query(false));
            ?></h1>
        </div>
    </div>
</div>
<?php if (have_posts()) :
    get_template_part('content');
else : ?>
    <div class="icoach-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="blog-content-area fadeIn animated">
                        <div class="search-area">
                            <p class="spage">
                                <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'icoach'); ?>.</p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; get_footer(); ?>