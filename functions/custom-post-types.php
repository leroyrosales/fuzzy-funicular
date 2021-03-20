<?php

/**
 * Register Post Types
 * - Slides
 * - CUSTOM POST TYPE
 * WordPress documentation: https://developer.wordpress.org/plugins/post-types/
 */
// add_action( 'init', function () {

	// Slides
	register_post_type( 'slide',
		array(
			'labels' => array(
				'name' => 'Slides',
				'singular_name' => 'Slide',
				'add_new_item' => 'Add New Slide',
				'all_items' => 'All Slides',
				'edit_item' => 'Edit Slide',
				'new_item' => 'New Slide',
				'view_item' => 'View Slide',
				'search_items' => 'Search Slides',
				'not_found' => 'No Slides found',
				'not_found_in_trash' => 'No Slides found in Trash',
			),
			'rewrite' => false,
      'public' => true,
      'publicly_queryable' => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-sticky',
			'show_in_nav_menus' => false,
			'supports' => array(
				'title',
				'editor'
			)
		)
	);


// add_action( 'init', function () {

// 	// CUSTOM POST TYPE
// 	register_post_type( 'custom-post-type',
// 		array(
// 			'labels' => array(
// 				'name' => 'CUSTOM POST TYPE',
// 				'singular_name' => 'CUSTOM POST TYPE',
// 				'add_new_item' => 'Add New CUSTOM POST TYPE',
// 				'all_items' => 'All CUSTOM POST TYPE',
// 				'edit_item' => 'Edit CUSTOM POST TYPE',
// 				'new_item' => 'New CUSTOM POST TYPE',
// 				'view_item' => 'View CUSTOM POST TYPE',
// 				'search_items' => 'Search CUSTOM POST TYPE',
// 				'not_found' => 'No CUSTOM POST TYPE found',
// 				'not_found_in_trash' => 'No CUSTOM POST TYPE found in Trash',
// 			),
// 			'rewrite' => false,
// 			'hierarchical' => false,
// 			'public' => false,
// 			'publicly_queryable' => true,
// 			'show_ui' => true,
// 			'menu_position' => 5,
// 			'menu_icon' => 'dashicons-format-chat',  // https://developer.wordpress.org/resource/dashicons
// 			'capability_type' => 'custom-post-type',
// 			'taxonomies' => ['post_tag'],
// 			'show_in_nav_menus' => false,
// 			'supports' => array(
// 				'title',
// 				'editor'
// 			)
// 		)
// 	);

// } );

