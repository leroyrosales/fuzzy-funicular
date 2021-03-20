<?php

/**
 * Registers Site Menus
 * - CUSTOM ROLE
 * WordPress documentation: https://wordpress.org/support/article/roles-and-capabilities/
 */

if ( ! function_exists( 'emerus_register_nav_menus' ) ) {
 
  function emerus_register_nav_menus(){
      register_nav_menus( array(
          'primary_menu' => __( 'Primary Menu', 'border_beagle' ),
          'footer_menu'  => __( 'Footer Menu', 'border_beagle' ),
          'second_footer_menu'  => __( 'Second Footer Menu', 'border_beagle' ),
      ) );
  }
  add_action( 'after_setup_theme', 'emerus_register_nav_menus', 0 );
}
