<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-plugin-integrations.php'	// Plugin integrations
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

/////////////////////////////////////////////////
// Enqueue Scripts and Styles for Front-End //
/////////////////////////////////////////////////
function get_theme_assets() {
  /////////////
  // Lodash //
  ////////////
  wp_enqueue_script(
    'lodash'
    , get_stylesheet_directory_uri().'/bower_components/lodash/lodash.min.js'
  );

  /////////////
  // Fitvids //
  ////////////
  wp_enqueue_script(
    'fitvids'
    , get_stylesheet_directory_uri().'/bower_components/FitVids/jquery.fitvids.js'
  );

	////////////
	// DPKT //
	///////////
	wp_enqueue_script(
    'dpkt'
    , get_stylesheet_directory_uri().'/dpkt.js'
  );
}
add_action( 'wp_enqueue_scripts', 'get_theme_assets' );








/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
