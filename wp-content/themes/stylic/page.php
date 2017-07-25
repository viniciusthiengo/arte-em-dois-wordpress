<?php
/*
* Single Post template file
*/
get_header();
if(!is_front_page()): ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-7 news-blog-head">
                <div class="blog-breadcrumb">
                    <h5 class="blog-news"><?php the_title(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container">
    <div class="row">
		<div class="col-md-12">
        <?php while ( have_posts() ) : the_post();
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'stylic' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'stylic' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
					comments_template();
                }
            endwhile; ?>
		</div>
    </div>
</div>
<?php get_footer();