<?php
/*
 * Archive Template File.
 */
get_header(); ?>
<!--archive posts start-->
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1> <?php _e('Archive ','icoach'); the_archive_title(); ?> </h1>
        </div>
    </div>
</div>
<?php  get_template_part('content'); get_footer(); ?>