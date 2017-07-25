<?php 
/**
 * sidebar template file
**/
?>
<div class="col-md-3 col-sm-3 col-xs-12 sidebar-content">
    <?php if (is_active_sidebar('main-sidebar')) {
		dynamic_sidebar('main-sidebar');
    } ?>
</div>