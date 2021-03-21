<?php

/**
 *  
 * Limit Nav Items for some menus
 *
 */


add_filter( 'wp_nav_menu_objects', function($items, $args) {
  // want our MAINMENU to have MAX of 7 items
  if ( $args->theme_location == 'header_cta_menu' ) {
    $toplinks = 0;
    foreach ( $items as $k => $v ) {
      if ( $v->menu_item_parent == 0 ) {
      // count how many top-level links we have so far...
      $toplinks++;
    }
    // if we've passed our max # ...
    if ( $toplinks > 3 ) {
      unset($items[$k]);
      }
    }
  }
  return $items;
  },
  10, 
  2 
);

add_filter( 'wp_nav_menu_objects', function($items, $args) {
  // want our MAINMENU to have MAX of 7 items
  if ( $args->theme_location == 'second_header_menu' ) {
    $toplinks = 0;
    foreach ( $items as $k => $v ) {
      if ( $v->menu_item_parent == 0 ) {
      // count how many top-level links we have so far...
      $toplinks++;
    }
    // if we've passed our max # ...
    if ( $toplinks > 3 ) {
      unset($items[$k]);
      }
    }
  }
  return $items;
  },
  10, 
  2 
);
