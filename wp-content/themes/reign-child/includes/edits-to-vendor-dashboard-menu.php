<?php

/**
 * Edits to Vendor Dashboard Menu
 */
/**
 * Renames an Settings title
 *
 * @param  array  $urls
 *
 * @return array
 */
function prefix_dokan_rename_seller_nav( $urls ) {

    $urls['settings']['title'] = 'Portfolio';
	$urls['settings']['pos'] = '10';
	$urls['booking']['pos'] = '1';
	$urls['booking']['title'] = 'Shindigs';
	// unset( $urls['products'] );
	// unset( $urls['orders'] );

    return $urls;
}

add_filter( 'dokan_get_dashboard_nav', 'prefix_dokan_rename_seller_nav' );
function prefix_dokan_rename_settings_nav( $urls ) {

	$urls['store']['title'] = 'Settings';
	$urls['store']['icon'] = '<i class="fa fa-info"></i>';

    return $urls;
}

add_filter( 'dokan_get_dashboard_settings_nav', 'prefix_dokan_rename_settings_nav' );

