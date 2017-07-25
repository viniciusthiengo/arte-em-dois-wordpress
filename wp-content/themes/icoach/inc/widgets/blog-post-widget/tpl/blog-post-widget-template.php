<?php
$postSelectorPseudoQuery = $instance['blogPost'];
// Process the post selector pseudo query.
$processedQuery = siteorigin_widget_post_selector_process_query( $postSelectorPseudoQuery );

// Use the processed post selector query to find posts.
$queryResult = new WP_Query( $processedQuery ); ?>
<div class="icoach-section">
    <div class="blog-wrap">
        <div class="container">
            <div class="blog-carousel owl-carousel">
                <?php if($queryResult->have_posts()) :
                      while($queryResult->have_posts()) : $queryResult->the_post(); ?>
                <div class="item pulse animated">
                    <div class="blog-carousel-title">
                        <a href="<?php the_permalink(); ?>" class=""><h4><?php the_title(); ?></h4></a>
                        <?php icoach_entry_meta(); ?>
                    </div>
                    <div class="blog-carousel-content">
                        <a href="<?php the_permalink(); ?>" class="btn-light">READ ARTICLE</a>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="blog-carousel-image">
                             <a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail('icoachBlogThumbnailImage',array( 'alt' => esc_attr(get_the_title()), 'class' => 'img-responsive')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <a href='<?php echo sow_esc_url($instance[blogPostLink]); ?>' class='btn-iprimary btn-speechblue'>show more</a>
        </div>
    </div>
</div>
