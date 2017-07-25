<?php
/**
 * Author Page template file
 * */
get_header(); ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php echo esc_html__( 'Published by : ', 'stylic' ) . get_the_author(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('content'); 
get_footer();