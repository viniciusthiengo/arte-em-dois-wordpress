<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EightyDays
 */
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<aside class="col-md-3 widget-area" id="secondary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>

<?php endif; ?>