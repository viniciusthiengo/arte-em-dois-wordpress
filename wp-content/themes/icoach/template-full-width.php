<?php
/**
 * Template Name: Full Width
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
<div class="container">
    <div class="row">
        <?php while ( have_posts() ) : the_post();
                the_content();
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;  ?> 
    </div>
</div>
<?php get_footer(); ?>