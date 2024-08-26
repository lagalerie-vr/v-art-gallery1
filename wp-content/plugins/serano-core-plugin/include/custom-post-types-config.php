<?php
/**
 * Created by ClaPat
 * Date: 25/08/22
 */

// Register custom post types
if ( ! function_exists( 'serano_core_custom_types' ) ){

    function serano_core_custom_types() {

        $custom_slug = null;
		$clapat_custom_slug_option = get_theme_mod( 'clapat_core_portfolio_custom_slug', '' );
		if( !empty( $clapat_custom_slug_option ) ){
				
			$custom_slug = $clapat_custom_slug_option;
		}
				
        register_post_type(
            'serano_portfolio',
            array(
                'labels' => array(
                    'name' => __('Portfolio', 'serano_core_plugin_text_domain'),
                    'singular_name' => __('Portfolio', 'serano_core_plugin_text_domain'),
                    'all_items' => __('Portfolio Items', 'serano_core_plugin_text_domain'),
                    'add_new' => __( 'Add New', 'serano_core_plugin_text_domain' ),
                    'add_new_item' => __( 'Add New Portfolio Item', 'serano_core_plugin_text_domain' ),
                    'edit_item' => __( 'Edit Portfolio Item', 'serano_core_plugin_text_domain' ),
                    'new_item' => __( 'New Portfolio Item', 'serano_core_plugin_text_domain' ),
                    'view_item' => __( 'View Portfolio Item', 'serano_core_plugin_text_domain' ),
                    'search_items' => __( 'Search Portfolio Items', 'serano_core_plugin_text_domain' ),
                    'not_found' => __( 'No portfolio items found', 'serano_core_plugin_text_domain' ),
                    'not_found_in_trash' => __( 'No portfolio items found in Trash', 'serano_core_plugin_text_domain' ),
                    'menu_name' => __( 'Portfolio', 'serano_core_plugin_text_domain' ),
                ),
                'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
                'description' => 'Add your Portfolio',
                'menu_icon' =>  'dashicons-portfolio',
                'public' => true,
				'show_in_rest' => true,
                'supports' => array('title', 'editor'),
            )
        );

		register_taxonomy( 	'portfolio_category', 
							'serano_portfolio', 
							array(
								'hierarchical' => true, 
								'label' => __('Categories', 'serano_core_plugin_text_domain'), 
								'query_var' => true, 
								'show_in_rest' => true,
								'rewrite' => true )
						);
    }

}
add_action('init', 'serano_core_custom_types');


// refresh rewrite rules for custom portfolio slugs
if ( ! function_exists( 'serano_core_activation_hook' ) ){

    function serano_core_activation_hook() {

		serano_core_custom_types();
		
        flush_rewrite_rules();
    }
}
register_activation_hook( __FILE__, 'serano_core_activation_hook' );


?>
