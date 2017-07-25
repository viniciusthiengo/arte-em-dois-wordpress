<?php 
get_header();
if(!is_front_page()) : ?>
<section id="inner-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="innerpage-head">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="pageinner-content-part">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>