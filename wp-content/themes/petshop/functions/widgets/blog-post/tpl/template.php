<?php
$post_selector_pseudo_query = $instance['blogPost'];
// Process the post selector pseudo query.
$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
// Use the processed post selector query to find posts.
$query_result = new WP_Query( $processed_query ); ?>
<div class="our-news-list">
    <div class="owl-carousel">
        <?php if($query_result->have_posts()) :
            while($query_result->have_posts()) : $query_result->the_post();
                if(has_post_thumbnail()): ?>
                            <div class="item">
                                <div class="news-content">
                                    <div class="newsimg">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="news-img">
                                    </div>
                                    <!-- End productsimg -->
                                    <div class="news-info">
                                        <p><?php the_title(); ?></p>
                                        <span>admin 12-5-2016</span>
                                        <a href="<?php the_permalink(); ?>" class="btn-effect"><?php esc_html_e('READ ARTICLE','petshop'); ?></a>
                                    </div>
                                    <!-- End products-info -->
                                </div>
                                <!-- End -->
                            </div>
                <?php endif;
                wp_reset_query(); 
            endwhile;
        endif; ?>
    </div>
</div>