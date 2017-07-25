<?php
/**
 * WooCommerce Hooks
 *
 * @since 1.2.3
 *
 */



function basic_woo_custom_cart_button_text() {

	return __( 'Add to Cart', 'basic' );

}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'basic_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'basic_woo_custom_cart_button_text' );



add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );