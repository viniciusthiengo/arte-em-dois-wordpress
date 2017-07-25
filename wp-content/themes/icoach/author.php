<?php
/**
 * Author Page template file
 * */
get_header(); ?>
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h1>
            	<?php _e('Published by : ', 'icoach');
                  echo get_the_author(); ?>
              </h1>
        </div>
    </div>
</div>
<?php get_template_part('content'); get_footer(); ?>