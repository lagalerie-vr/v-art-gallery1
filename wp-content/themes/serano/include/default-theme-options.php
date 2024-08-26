<?php

if( !isset( $serano_default_theme_options ) ){

	$serano_default_theme_options = array();

	// General Settings
	$serano_default_theme_options['clapat_serano_enable_ajax'] = 0;
	$serano_default_theme_options['clapat_serano_enable_smooth_scrolling'] = 0;
	$serano_default_theme_options['clapat_serano_enable_magic_cursor'] = 0;
	$serano_default_theme_options['clapat_serano_primary_color'] ='#f33a3a';
	$serano_default_theme_options['clapat_serano_enable_preloader'] = 1;
	$serano_default_theme_options['clapat_serano_preloader_intro'] = esc_html__( 'Loading', 'serano' );
	$serano_default_theme_options['clapat_serano_preloader_hover_first_line'] = esc_html__( 'Stay', 'serano' );
	$serano_default_theme_options['clapat_serano_preloader_hover_second_line'] = esc_html__( 'Relaxed', 'serano' );
	$serano_default_theme_options['clapat_serano_preloader_text'] = esc_html__( 'Please wait, content is loading', 'serano' );
	$serano_default_theme_options['clapat_serano_uppercase_text'] = 1;
	$serano_default_theme_options['clapat_serano_rounded_borders'] = 1;
	$serano_default_theme_options['clapat_serano_default_page_bknd_type'] = 'light-content';
	$serano_default_theme_options['clapat_serano_enable_page_title_as_hero'] = 1;
	
	// Header Settings
	$serano_default_theme_options['clapat_serano_logo'] = esc_url( get_template_directory_uri() . '/images/logo.png' );
	$serano_default_theme_options['clapat_serano_logo_light'] = esc_url( get_template_directory_uri() . '/images/logo-white.png' );
	$serano_default_theme_options['clapat_serano_enable_fullscreen_menu'] = 0;
	$serano_default_theme_options['clapat_serano_header_menu_type'] = 'classic-burger-lines';
	$serano_default_theme_options['clapat_serano_menu_btn_caption'] = esc_html__( 'Menu', 'serano' );
	$serano_default_theme_options['clapat_serano_menu_background_color'] = '#0c0c0c';
	$serano_default_theme_options['clapat_serano_menu_background_type'] = 'invert-header';
	
	// Footer Settings
	$serano_default_theme_options['clapat_serano_enable_back_to_top'] = 1;
	$serano_default_theme_options['clapat_serano_back_to_top_caption'] = esc_html__( 'Back Top', 'serano' );
	$serano_default_theme_options['clapat_serano_footer_copyright'] = wp_kses( __('2023 © <a class="link" target="_blank" href="https://www.clapat-themes.com/">ClaPat</a>. All rights reserved.', 'serano'), 'serano_allowed_html' );
	$serano_default_theme_options['clapat_serano_footer_social_links_prefix'] = esc_html__( 'Follow Us', 'serano' );
	$serano_default_theme_options['clapat_serano_social_links_icons'] = 0;
	global $serano_social_links;
	$social_network_ids = array_keys( $serano_social_links );
	for( $idx = 1; $idx <= SERANO_MAX_SOCIAL_LINKS; $idx++ ){

		$serano_default_theme_options['clapat_serano_footer_social_' . $idx] = serano_social_network_default( $idx );
		$serano_default_theme_options['clapat_serano_footer_social_url_' . $idx] = serano_social_network_url_default( $idx );
	}
	
	// Showcase Settings
	$serano_default_theme_options['clapat_serano_showcase_scroll_drag_caption'] = esc_html__('Scroll or Drag', 'serano');
	$serano_default_theme_options['clapat_serano_showcase_next_slide_caption'] = esc_html__('Next', 'serano');
	$serano_default_theme_options['clapat_serano_showcase_prev_slide_caption'] = esc_html__('Prev', 'serano');
	
	// Portfolio Settings
	$serano_default_theme_options['clapat_core_portfolio_custom_slug'] = '';
	$serano_default_theme_options['clapat_serano_portfolio_nav_autotrigger'] = 1;
	$serano_default_theme_options['clapat_serano_view_project_caption_first'] = esc_html__('View', 'serano');
	$serano_default_theme_options['clapat_serano_view_project_caption_second'] = esc_html__('Project', 'serano');
	$serano_default_theme_options['clapat_serano_portfolio_filter_all_caption'] = esc_html__('All', 'serano');
	$serano_default_theme_options['clapat_serano_portfolio_show_filters_caption'] = esc_html__( 'Filters', 'serano' );
	$serano_default_theme_options['clapat_serano_portfolio_next_caption_first_line'] = esc_html__('Next', 'serano');
	$serano_default_theme_options['clapat_serano_portfolio_next_caption_second_line'] = esc_html__('Project', 'serano');
	$serano_default_theme_options['clapat_serano_portfolio_viewcase_caption'] = esc_html__( 'View Case', 'serano' );
	$serano_default_theme_options['clapat_serano_portfolio_share_social_networks_caption'] = esc_html__('Share Project:', 'serano');
	$serano_default_theme_options['clapat_serano_portfolio_share_social_networks'] = '';
	$serano_default_theme_options['clapat_serano_portfolio_navigation_order'] = 'forward';
	
	// Blog Settings
	$serano_default_theme_options['clapat_serano_blog_navigation_type'] = 'blog-nav-classic';
	$serano_default_theme_options['clapat_serano_blog_excerpt_type'] = 'blog-excerpt-none';
	$serano_default_theme_options['clapat_serano_blog_excerpt_length'] = 35;
	$serano_default_theme_options['clapat_serano_blog_next_post_caption'] = esc_html__('Next', 'serano');
	$serano_default_theme_options['clapat_serano_blog_prev_post_caption'] = esc_html__('Prev', 'serano');
	$serano_default_theme_options['clapat_serano_blog_read_more_caption'] = esc_html__('Read More', 'serano');
	$serano_default_theme_options['clapat_serano_blog_no_posts_caption'] = esc_html__('No more posts', 'serano');
	$serano_default_theme_options['clapat_serano_blog_prev_posts_caption'] = esc_html__('Prev', 'serano');
	$serano_default_theme_options['clapat_serano_blog_next_posts_caption'] = esc_html__('Next', 'serano');
	$serano_default_theme_options['clapat_serano_blog_default_title'] = esc_html__('Blog', 'serano');
	
	// Map Settings
	$serano_default_theme_options['clapat_serano_map_address'] = esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'serano');
	$serano_default_theme_options['clapat_serano_map_marker'] = esc_url( get_template_directory_uri() . '/images/marker.png');
	$serano_default_theme_options['clapat_serano_map_zoom'] = 16;
	$serano_default_theme_options['clapat_serano_map_company_name'] = esc_html__('serano', 'serano');
	$serano_default_theme_options['clapat_serano_map_company_info'] = esc_html__('Here we are. Come to drink a coffee!', 'serano');
	$serano_default_theme_options['clapat_serano_map_type'] = 'satellite';
	$serano_default_theme_options['clapat_serano_map_api_key'] = '';
	
	// Error Page
	$serano_default_theme_options['clapat_serano_error_title'] = esc_html__('404', 'serano');
	$serano_default_theme_options['clapat_serano_error_info'] = esc_html__('The page you are looking for could not be found.', 'serano');
	$serano_default_theme_options['clapat_serano_error_back_button'] = esc_html__('Home Page', 'serano');
	$serano_default_theme_options['clapat_serano_error_back_button_hover_caption'] = esc_html__('Go Back', 'serano');
	$serano_default_theme_options['clapat_serano_error_back_button_url'] = esc_url( get_home_url() );
	$serano_default_theme_options['clapat_serano_error_page_bknd_type'] = 'light-content';
}

if( !class_exists('Clapat\Serano\Metaboxes\Meta_Boxes') ){

	$serano_default_meta_options = array (
									"serano-opt-page-bknd-color-code" => "#0c0c0c",
									"serano-opt-page-bknd-color" => "light-content",
									"serano-opt-page-enable-hero" => "",
									"serano-opt-page-hero-img" => "",
									"serano-opt-page-video" => false,
									"serano-opt-page-video-webm" => "",
									"serano-opt-page-video-mp4" => "",
									"serano-opt-page-hero-caption-title" => "",
									"serano-opt-page-hero-caption-subtitle" => "",
									"serano-opt-page-hero-info-text" => "",
									"serano-opt-page-hero-scroll-caption" => esc_html__('Scroll to navigate', 'serano'),
									"serano-opt-page-hero-caption-tagline" => "",
									"serano-opt-page-hero-parallax-caption" => "parallax-scroll-caption",
									"serano-opt-page-hero-caption-align" => "text-align-left",
									"serano-opt-page-hero-caption-width" => "content-full-width",
									"serano-opt-page-navigation-caption-first-line" => esc_html__('Next', 'serano'),
									"serano-opt-page-navigation-caption-second-line" => esc_html__('Page', 'serano'),
									"serano-opt-page-navigation-caption-title" => "",
									"serano-opt-page-navigation-caption-subtitle" => "",
									"serano-opt-page-navigation-next-page" => "", 
									"serano-opt-page-portfolio-filter-category" => "",
									"serano-opt-page-portfolio-grid-layout" => "parallax-grid",
									"serano-opt-page-portfolio-thumb-to-fullscreen" => "webgl-fitthumbs",
									"serano-opt-page-portfolio-thumb-to-fullscreen-webgl-type" => "fx-seven",
									"serano-opt-page-panels-parallax" => "1",
									"serano-opt-blog-bknd-color-code" => "#0c0c0c",
									"serano-opt-blog-bknd-color" => "light-content",
									"serano-opt-blog-caption-alignment" => "text-align-left",
									"serano-opt-portfolio-bknd-color-code" => "#0c0c0c",
									"serano-opt-portfolio-bknd-color" => "light-content",
									"serano-opt-portfolio-navigation-cursor-color" => "#f33a3a",
									"serano-opt-portfolio-thumb-size" => "normal",
									"serano-opt-portfolio-project-year" => date("Y"),
									"serano-opt-portfolio-view-project-url" => "",
									"serano-opt-portfolio-view-project-caption" => esc_html__('View Project', 'serano'),
									"serano-opt-portfolio-hero-img" => "",
									"serano-opt-portfolio-video" => false,
									"serano-opt-portfolio-video-webm" => "",
									"serano-opt-portfolio-video-mp4" => "",
									"serano-opt-portfolio-hero-caption-title" => "",
									"serano-opt-portfolio-hero-parallax-caption" => "parallax-scroll-caption",
									"serano-opt-portfolio-hero-scroll-caption" => ""
								);
}

?>
