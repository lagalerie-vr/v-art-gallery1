<?php
/**
 * Created by Clapat.
 * Date: 04/02/19
 * Time: 6:21 AM
 */

// register navigation menus
if ( ! function_exists( 'serano_register_nav_menus' ) ){
	
	function serano_register_nav_menus() {
		
	  register_nav_menus(
		array(
		  'primary-menu' => esc_html__( 'Primary Menu', 'serano')
		)
	  );
	}
}
add_action( 'init', 'serano_register_nav_menus' );
 
// theme setup
if ( ! function_exists( 'serano_theme_setup' ) ){

	function serano_theme_setup() {

		// Set content width
		if ( ! isset( $content_width ) ) $content_width = 1180;

		// add support for multiple languages
		load_theme_textdomain( 'serano', get_template_directory() . '/languages' );
			
	}

} // serano_theme_setup

/**
 * Tell WordPress to run serano_theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'serano_theme_setup' );