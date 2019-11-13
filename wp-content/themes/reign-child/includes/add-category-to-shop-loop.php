<?php

/**
 * Add Category to Shop Loop
 */
add_action( 'woocommerce_after_shop_loop_item', 'shop_loop_item_title', 6 );
function shop_loop_item_title() {
	global $post;
	
	$id = get_the_ID();
	$cuisine = wc_get_product_category_list( get_the_id() );
	// check
if( $cuisine ){ 
	echo '<span class="cuisine-loop">'.$cuisine.'</span>';
    }
    // get current buffer content and clean buffer
	

}
