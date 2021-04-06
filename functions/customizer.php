<?php

/**
 *
 * Adds Customizer settings
 *
 */

function wpb_customize_register($wp_customize){

  // Site logo
  $wp_customize->add_setting(
    'site_logo',
    array(
      'default' => '',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options'
    )
  );

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
    'label'   => __('Site Logo'),
    'section' => 'title_tagline',
    'settings' => 'site_logo',
    'priority'  => 1
  )));

  // Brand Colors Section
  $wp_customize->add_section('site_brand_colors', array(
    'title'   => __( 'Site Colors' ),
    'description' => sprintf(__( 'Options for site colors' )),
    'priority'    => 60
  ));

  // Header color
  $wp_customize->add_setting('site_brand_colors_header', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    'header_area_color',
    array(
        'label'      => __( 'Header Color' ),
        'section'    => 'site_brand_colors',
        'settings'   => 'site_brand_colors_header',
        'priority'  => 1
    ) ) );

  // Primary Brand color
  $wp_customize->add_setting('site_brand_colors_primary', array(
    'default' => '#003d7d',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    'primary_brand_color',
    array(
        'label'      => __( 'Primary brand Color' ),
        'section'    => 'site_brand_colors',
        'settings'   => 'site_brand_colors_primary',
        'priority'  => 2
    ) ) );

  // Secondary Brand color
  $wp_customize->add_setting('site_brand_colors_secondary', array(
    'default' => '#00a7e1',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_brand_color',
    array(
        'label'      => __( 'Secondary brand Color' ),
        'section'    => 'site_brand_colors',
        'settings'   => 'site_brand_colors_secondary',
        'priority'  => 3
    ) ) );

  // Tertiary Brand color
  $wp_customize->add_setting('site_brand_colors_tertiary', array(
    'default' => '#99dcf3',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    'tertiary_brand_color',
    array(
        'label'      => __( 'Tertiary brand Color' ),
        'section'    => 'site_brand_colors',
        'settings'   => 'site_brand_colors_tertiary',
        'priority'  => 4
    ) ) );

  // Content Wrap color
  $wp_customize->add_setting('site_brand_content_wrap_color', array(
    'default' => '#eff3f5',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize,
    'content_wrap_color',
    array(
        'label'      => __( 'Content Wrap Color' ),
        'section'    => 'site_brand_colors',
        'settings'   => 'site_brand_content_wrap_color',
        'priority'  => 5
    ) ) );

    // Footer color
    $wp_customize->add_setting('site_brand_colors_footer', array(
      'default' => '#e5ebee',
      'sanitize_callback' => 'sanitize_hex_color',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
      $wp_customize,
      'foote_area_color',
      array(
          'label'      => __( 'Footer Color' ),
          'section'    => 'site_brand_colors',
          'settings'   => 'site_brand_colors_footer',
          'priority'  => 6
    ) ) );

}

add_action('customize_register', 'wpb_customize_register');


/**
 *
 * Adds Customizer settings to Timber Context
 *
 */

add_filter( 'timber/context', function( $context ) {

  $site_logo = get_theme_mod(
    'site_logo',
    ''
  );

  $context['site_logo'] = $site_logo;

  $site_brand_colors_header = get_theme_mod(
    'site_brand_colors_header',
    '#ffffff'
  );

  $context['site_brand_colors_header'] = $site_brand_colors_header;

  $site_brand_colors_primary = get_theme_mod(
    'site_brand_colors_primary',
    '#003d7d'
  );

  $context['site_brand_colors_primary'] = $site_brand_colors_primary;

  $site_brand_colors_secondary = get_theme_mod(
    'site_brand_colors_secondary',
    '#00a7e1'
  );

  $context['site_brand_colors_secondary'] = $site_brand_colors_secondary;

  $site_brand_colors_tertiary = get_theme_mod(
    'site_brand_colors_tertiary',
    '#99dcf3'
  );

  $context['site_brand_colors_tertiary'] = $site_brand_colors_tertiary;

  $site_brand_content_wrap_color = get_theme_mod(
    'site_brand_content_wrap_color',
    '#eff3f5'
  );

  $context['site_brand_content_wrap_color'] = $site_brand_content_wrap_color;

  $site_brand_colors_footer = get_theme_mod(
    'site_brand_colors_footer',
    '#e5ebee'
  );

  $context['site_brand_colors_footer'] = $site_brand_colors_footer;

  return $context;

} );
