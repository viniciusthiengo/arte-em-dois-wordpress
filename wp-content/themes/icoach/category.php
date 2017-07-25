<?php
/*
 * Category Template File.
 */
get_header(); ?>
<!--category posts start-->
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1><?php  _e('Category : ','icoach') ; echo single_cat_title('', false); ?></h1>
        </div>
    </div>
</div>
<?php get_template_part('content'); get_footer(); ?>