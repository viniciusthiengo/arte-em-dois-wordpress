<?php 
/**
 * The right sidebar template file
**/
?>
<div class="col-md-3 col-sm-12 col-xs-12 blog-menu-area">
    <?php if (is_active_sidebar('sidebar-1')) {
		dynamic_sidebar('sidebar-1');
    } ?>
</div>