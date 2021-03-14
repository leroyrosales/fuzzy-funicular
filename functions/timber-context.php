<?php

/**
 * Filter Timber Context
 *
 * @param  array $context
 * @return array $context
 */
add_filter( 'timber_context', function ( $context ) {

	// Alert Banner fields
	$context['enable_alert_banner'] = get_field( 'enable_alert_banner', 'option' );
	$context['banner_icon'] = get_field( 'alert_icon', 'option' );
	$context['banner_message'] = get_field( 'alert_message', 'option' );
	$context['banner_buttons'] = get_field( 'alert_message_buttons', 'option' );

	// Alert Banner fields
	$context['enable_announcement_button'] = get_field( 'enable_announcement_button', 'option' );
	$context['announcement_button'] = get_field( 'announcement_button', 'option' );

	// Before Footer Area
	$context['bf_cta'] = get_field( 'before_footer_cta', 'option' );

	// Enable Breadcrumbs field
	$context['enable_breadcrumbs'] = get_field( 'enable_breadcrumbs', 'option' );

	// Social Accounts
	$context['social_accounts'] = get_field( 'social_accounts', 'option' );

	// Is search query
	$context['is_search'] = is_search();

	// Is front page of site
	$context['is_front_page'] = is_front_page();
	
	return $context;


} );
