<?php
/**
 *
 * @package stylic
 */

get_header(); ?>
<div class="page-heading-blog">
    <div class="container">
        <div class="row">
        	<div class="col-md-9 col-xs-7 news-blog-head">
                <div class="blog-breadcrumb">
                	<h5 class="blog-news"><?php woocommerce_page_title(); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row blog-content">
		<div class="col-md-12 col-sm-12">
    	<?php woocommerce_content(); ?>
		</div>
    </div>
</div>
<?php get_footer();