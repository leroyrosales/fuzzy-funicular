<?php

// Theme enqueues and dequeues

// Dequeue core jquery
add_action( 'wp_enqueue_scripts', function(){
  if (is_admin()) return; // don't dequeue on the backend
  wp_dequeue_script( 'jquery' );
  wp_deregister_script( 'jquery' );
});

// Add theme styles to section buttons
add_action('admin_head', function() {

  $bg_primary = get_theme_mod('site_brand_colors_primary','#003d7d');
  $bg_secondary = get_theme_mod('site_brand_colors_secondary','#00a7e1');
  $bg_tertiary = get_theme_mod('site_brand_colors_tertiary','#99dcf3');
  $bg_light = get_theme_mod('site_brand_content_wrap_color','#eff3f5');

  echo '<style>
    input[value="bg-light"] {
      background-color: ' . $bg_light . '
    }
    input[value="bg-primary"] {
      background-color: ' . $bg_primary . '
    }
    input[value="bg-secondary"] {
      background-color: ' . $bg_secondary . '
    }
    input[value="bg-tertiary"] {
      background-color: ' . $bg_tertiary . '
    }
  </style>';
});

// Swiper Enqueues
add_action( 'wp_enqueue_scripts', 'swiper_slider_scripts');

function swiper_slider_scripts(){
  if(is_front_page()){
    wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
    wp_enqueue_script( 'swiper-bundle', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), false, true );
    wp_enqueue_script( 'emerus-slider', get_template_directory_uri() . '/assets/js/slider.js', array('swiper-bundle'), false, true );
    wp_localize_script('emerus-slider', 'swiper_settings', array(
      'time' => get_theme_mod( 'slider_timer_settings', '5000' )
    ));
  }
}
