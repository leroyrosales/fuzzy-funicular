<?php

/**
 *
 * Adds Customizer settings
 *
 */

function wpb_customize_register($wp_customize){

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
        'priority'  => 1
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
          'priority'  => 2
    ) ) );

}

add_action('customize_register', 'wpb_customize_register');


/**
 *
 * Adds Customizer settings to Timber Context
 *
 */

add_filter( 'timber/context', function( $context ) {

	$site_brand_colors_header = get_theme_mod(
			'site_brand_colors_header',
			'#ffffff'
	);

	$context['site_brand_colors_header'] = $site_brand_colors_header;

	$site_brand_colors_primary = get_theme_mod(
			'site_brand_colors_primary',
			'#ffffff'
	);

	$context['site_brand_colors_primary'] = $site_brand_colors_primary;

	$site_brand_colors_footer = get_theme_mod(
			'site_brand_colors_footer',
			'#e5ebee'
	);

	$context['site_brand_colors_footer'] = $site_brand_colors_footer;

	return $context;

} );
