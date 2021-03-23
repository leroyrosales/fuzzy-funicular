<?php

/**
 *  
 * Adds Customizer settings
 *
 */

  function wpb_customize_register($wp_customize){

    // Brand Colors Section
    $wp_customize->add_section('brand_colors', array(
      'title'   => __( 'Brand Colors' ),
      'description' => sprintf(__( 'Options for brand colors' )),
      'priority'    => 60
    ));

    // Primary color
    $wp_customize->add_setting('brand_colors_primary', array(
      'default' => '#fffff',
      'sanitize_callback' => 'sanitize_hex_color',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control( 
      new WP_Customize_Color_Control( 
      $wp_customize, 
      'primary_color', 
      array(
          'label'      => __( 'Primary Color' ),
          'section'    => 'brand_colors',
          'settings'   => 'brand_colors_primary',
          'priority'  => 1
      ) ) );

      // Secondary color
      $wp_customize->add_setting('brand_colors_secondary', array(
        'default' => '#12f12f',
        'sanitize_callback' => 'sanitize_hex_color',
        'type'      => 'theme_mod'
      ));
  
      $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_color', 
        array(
            'label'      => __( 'Secondary Color' ),
            'section'    => 'brand_colors',
            'settings'   => 'brand_colors_secondary',
            'priority'  => 2
      ) ) );  

  }

  add_action('customize_register', 'wpb_customize_register');
