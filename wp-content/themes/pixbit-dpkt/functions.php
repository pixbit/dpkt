<?php

add_filter('show_admin_bar', '__return_false');

/////////////////////////////////////////////////
// Enqueue Scripts and Styles for Front-End //
/////////////////////////////////////////////////
function get_theme_assets() {
  /////////////////////////////////
  // Load jQuery from Google CDN //
  /////////////////////////////////
  wp_deregister_script( 'jquery' ); // Deregister the included library
  wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, false );
  wp_enqueue_script('jquery');

  //////////////////////////
  // Vimeo Froogaloop API //
  //////////////////////////
  wp_enqueue_script(
    'vimeo-froogaloop'
    , '//a.vimeocdn.com/js/froogaloop2.min.js'
    , array('jquery')
  );

  wp_enqueue_script(
    'pixbit-apple'
    , get_stylesheet_directory_uri().'/build/js/pixbit-dpkt.min.js'
    , array('jquery')
  );
}
add_action( 'wp_enqueue_scripts', 'get_theme_assets' );

/**
 * Register Navigation Menus
 */

if ( ! function_exists( 'apple_menus' ) ) :
function apple_menus() {
  register_nav_menus(
    array(
      'main-menu' => 'Main Menu'
      ,'footer-menu' => 'Footer Menu'
    )
  );
}
add_action( 'init', 'apple_menus' );
endif;
