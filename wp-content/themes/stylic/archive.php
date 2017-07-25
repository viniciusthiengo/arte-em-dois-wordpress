<?php
/*
 * Archive Template File.
 */
get_header(); ?>
<!--archive posts start-->
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php esc_html_e( 'Archive ', 'stylic' ) . the_archive_title(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  get_template_part('content'); 
get_footer();