<?php
/*
 * Tag Template File.
 */
get_header(); ?>
<!--tag posts start-->
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php _e('Tag : ', 'icoach'); echo single_tag_title('', false); ?></h1>
        </div>
    </div>
</div>
<?php get_template_part('content'); get_sidebar(); get_footer(); ?>