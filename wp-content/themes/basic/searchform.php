<?php $s = get_search_query(); ?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
    <input type="text" value="" placeholder="<?php _e("Search", 'basic'); ?>" name="s" class="s" />
    <input type="submit" class="submit search_submit" value="&raquo;" />
</form>
