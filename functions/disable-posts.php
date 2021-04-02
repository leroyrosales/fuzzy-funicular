<?php

/**
 *  
 * Disable Posts
 *
 */

// TODO: Disable posts related feeds and pings?


// Remove posts page in menu
add_action( 'admin_menu', function() {
	remove_menu_page('edit.php');
} );

// TODO: See if it's worth holding onto this as it disables Gutenberg
// Remove 'post' type from the REST API
// add_action( 'init', 'disable_rest_api_posts', 25, 1 );
// function disable_rest_api_posts() {
// 	global $wp_post_types;
// 	// If the API calls 'post', return false
// 	if ( isset( $wp_post_types['post'] ) ) {
// 			$wp_post_types['post']->show_in_rest = FALSE;
// 			return TRUE;
// 	}
// 	return FALSE;
// }

// Redirect any user trying to access posts page
add_action( 'admin_init', 'disable_site_posts_admin_menu_redirect' );
function disable_site_posts_admin_menu_redirect() {
	global $pagenow;
	// Prevent users from adding new posts
	if ( $pagenow === 'post-new.php' && $_SERVER['REQUEST_METHOD'] == 'GET' && ( ! isset( $_GET['post_type'] ) || isset( $_GET['post_type'] ) && $_GET['post_type'] == 'post' ) ) {
		wp_safe_redirect( admin_url(), 301 );
		exit;
	}
	// If user is admin will show edit.php 
	if( ! current_user_can( 'administrator' ) ) {
		if ( $pagenow === 'edit.php' ) {
			wp_safe_redirect( admin_url(), 301 );
			exit;
		}
	}
}

// Remove posts from toolbar
add_action( 'wp_before_admin_bar_render', 'remove_posts_toolbar_node', 999 );
function remove_posts_toolbar_node( $wp_admin_bar ) {
	
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_menu('new-post');
	
}
