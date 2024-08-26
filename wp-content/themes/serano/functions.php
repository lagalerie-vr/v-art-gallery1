<?php

require_once ( get_template_directory() . '/include/defines.php' );

// Returns an array with published pages
if( !function_exists('serano_list_published_pages') ){

	function serano_list_published_pages(){
		
		$serano_list_pages = array('' => esc_html__('None', 'serano') );
		$serano_wp_published_pages = get_pages();
		foreach( $serano_wp_published_pages as $wp_published_page ){
			
			$serano_list_pages[ $wp_published_page->ID ] = $wp_published_page->post_title;
		}
		
		return $serano_list_pages;
	}
}

// Returns the default values for the social links
if( !function_exists('serano_social_network_default') ) {

	function serano_social_network_default( $idx ){

		if( $idx == 5 ){
			
			return "In"; // Instagram
		}
		else if( $idx == 3 ){
			
			return "Be"; // Behance
		}
		else if( $idx == 2 ){
			
			return "Tw"; // Twitter
		}
		else if( $idx == 1 ){
			
			return "Db"; // Dribbble
		}
		else {
			
			return "Fb"; // Facebook
		}
	}
}

if( !function_exists('serano_social_network_url_default') ) {

	function serano_social_network_url_default( $idx ){

		if( $idx == 5 ){
			
			return "https://www.instagram.com/clapat.themes/"; // Instagram
		}
		else if( $idx == 4 ){
			
			return "https://www.facebook.com/clapat.ro"; // Facebook
		}
		else if( $idx == 3 ){
			
			return "https://www.behance.com/clapat/"; // Behance
		}
		else if( $idx == 2 ){
			
			return "https://twitter.com/clapatdesign/"; // Twitter
		}
		else if( $idx == 1 ){
			
			return "https://dribbble.com/clapat/"; // Dribbble
		}
		else {
			
			return "";
		}
	}
}

// Metaboxes
require_once ( get_template_directory() . '/include/metabox-config.php');

// Customizer options
require_once( get_template_directory() . '/include/admin-config.php' );

// Load the default options
require_once( get_template_directory() . '/include/default-theme-options.php' );

if( !function_exists('serano_get_theme_options') ){

	function serano_get_theme_options( $option_id ){

		global $serano_default_theme_options;

		$default_value = false;
		if ( isset( $serano_default_theme_options ) && isset( $serano_default_theme_options[$option_id] ) ){

			$default_value  = $serano_default_theme_options[$option_id];

		}

		return get_theme_mod( $option_id, $default_value );

	}
}

if( !function_exists('serano_get_post_meta') ){

	function serano_get_post_meta( $opt_name = "", $thePost = array(), $meta_key = "", $def_val = "" ) {

		if( class_exists('Serano\Core\Metaboxes\Meta_Boxes') ){

			return Serano\Core\Metaboxes\Meta_Boxes::get_metabox_value( $thePost, $meta_key );
		}

		return "";
	}
}

if( !function_exists('serano_get_current_query') ){

	function serano_get_current_query(){

		global $serano_posts_query;
		global $wp_query;
		if( $serano_posts_query == null ){
			return $wp_query;
		}
		else{
			return $serano_posts_query;
		}

	}
}

// Portfolio Next Project Image
if( !function_exists('serano_portfolio_next_project_image') ){

	function serano_portfolio_next_project_image( $portfolio_image_param = null ){

		global $serano_portfolio_image_param;
		if( isset( $portfolio_image_param ) && ( $portfolio_image_param != null ) ){

			$serano_portfolio_image_param = $portfolio_image_param;
		}

		return $serano_portfolio_image_param;
	}
}

// Portfolio Thumbs List
if( !function_exists('serano_portfolio_thumbs_list') ){

	function serano_portfolio_thumbs_list( $portfolio_thumbs_param = null ){

		global $serano_portfolio_thumbs_param;
		if( isset( $portfolio_thumbs_param ) && ( $portfolio_thumbs_param != null ) ){

			$serano_portfolio_thumbs_param = $portfolio_thumbs_param;
		}

		return $serano_portfolio_thumbs_param;
	}
}

// Display Back to Top Button
if( !function_exists('serano_display_back_to_top') ){

	function serano_display_back_to_top(){

		if( !is_page_template('portfolio-showcase-page.php') &&
			!is_page_template('portfolio-showcase-gallery-page.php') &&
			!is_page_template('portfolio-showcase-grid-page.php') &&
			!is_page_template('portfolio-reverse-columns-page.php') &&
			!is_page_template('portfolio-carousel-page.php') &&
			!is_page_template('portfolio-list-page.php') ){

			return true;
		} else {

			return false;
		}
	}
}

// Display Copyright
if( !function_exists('serano_display_copyright') ){

	function serano_display_copyright(){

		if( !is_page_template('portfolio-showcase-page.php') &&
			!is_page_template('portfolio-showcase-gallery-page.php') &&
			!is_page_template('portfolio-showcase-grid-page.php') &&
			!is_page_template('portfolio-reverse-columns-page.php') &&
			!is_page_template('portfolio-carousel-page.php') &&
			!is_page_template('portfolio-list-page.php') ){

			return true;
		} else {

			return false;
		}
	}
}

// Display Social Links
if( !function_exists('display_footer_social_links_section') ){

	function display_footer_social_links_section(){

		if( !is_page_template('portfolio-showcase-page.php') &&
			!is_page_template('portfolio-showcase-gallery-page.php') &&
			!is_page_template('portfolio-showcase-grid-page.php') &&
			!is_page_template('portfolio-reverse-columns-page.php') &&
			!is_page_template('portfolio-carousel-page.php') &&
			!is_page_template('portfolio-list-page.php') ){

			return true;
		} else {

			return false;
		}
	}
}

// Check if the current post/page is built using Elementor
if( !function_exists('serano_post_is_built_with_elementor') ){

	function serano_post_is_built_with_elementor( $post_id = null ) {

		if ( ! class_exists( '\Elementor\Plugin' ) ) {

			return false;
		}

		if ( $post_id == null ) {

			$post_id = get_the_ID();
		}

		if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $post_id )->is_built_with_elementor() ) {

			return true;
		}

		return false;
	}

}

// Hero properties
require_once ( get_template_directory() . '/include/hero-properties.php');

// Support for automatic plugin installation
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/required_plugins.php');

// Merlin setup wizzard
require_once( get_template_directory() . '/components/merlin/vendor/autoload.php' );
require_once( get_template_directory() . '/components/merlin/class-merlin.php' );
require_once( get_template_directory() . '/components/merlin/merlin-config.php' );
require_once( get_template_directory() . '/components/merlin/merlin-filters.php' );

// Widgets
require_once(  get_template_directory() . '/components/widgets/widgets.php');

// Util functions
require_once ( get_template_directory() . '/include/util_functions.php');

// Add theme support
require_once ( get_template_directory() . '/include/theme-support-config.php');

// Theme setup
require_once ( get_template_directory() . '/include/setup-config.php');

// Enqueue scripts
require_once ( get_template_directory() . '/include/scripts-config.php');

// Hooks
require_once ( get_template_directory() . '/include/hooks-config.php');

// Blog comments and pagination
require_once ( get_template_directory() . '/include/blog-config.php');

// Editor styles
add_editor_style( 'style-editor.css' );
?>
