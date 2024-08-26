<?php
/*
Plugin Name: Serano Core Plugin
Plugin URI: https://clapat.com/
Description: Shortcodes and Custom Post Types for Serano WordPress Theme
Version: 1.0
Author: ClaPat
Author URI: https://clapat.com/
*/

if( !defined('SERANO_SHORTCODES_DIR_URL') ) define('SERANO_SHORTCODES_DIR_URL', plugin_dir_url(__FILE__));
if( !defined('SERANO_SHORTCODES_DIR') ) define('SERANO_SHORTCODES_DIR', plugin_dir_path(__FILE__));

// metaboxes
require_once( SERANO_SHORTCODES_DIR . '/metaboxes/init.php' );

// load plugin's text domain
add_action( 'plugins_loaded', 'serano_shortcodes_load_textdomain' );
function serano_shortcodes_load_textdomain() {
	load_plugin_textdomain( 'serano_core_plugin_text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/include/langs' );
}

// custom post types
require_once( SERANO_SHORTCODES_DIR . '/include/custom-post-types-config.php' );

// Serano shortcodes
require_once( SERANO_SHORTCODES_DIR . '/include/shortcodes.php' );

?>
