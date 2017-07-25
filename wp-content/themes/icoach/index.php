<?php
/**
 * The main template file
 **/
get_header(); ?>
<div class="heading-wrap blog-heading-wrap" >
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php _e('Blog ','icoach'); ?></h1>
        </div>
    </div>
</div>
<?php get_template_part('content'); get_footer(); ?>