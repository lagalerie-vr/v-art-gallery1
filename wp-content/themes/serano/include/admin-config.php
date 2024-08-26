<?php
/**
 * Serano Theme Config File
 */

if ( ! function_exists( 'serano_options_config' ) ) {

	function serano_options_config( $wp_customize ){

		$serano_before_default_section = 40; // Before Colors.
		
		/*** General Settings section ***/
		$wp_customize->add_section(
			'general_settings',
			array(
				'title'    => esc_html__( 'General Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 9),
			)
		);
	
		// Enable AJAX
		$wp_customize->add_setting(
			'clapat_serano_enable_ajax',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_ajax',
			array(
				'label'   		=> esc_html__( 'Load Pages With Ajax', 'serano' ),
				'description'  	=> esc_html__( 'When navigates to another page it loads the target content without reloading the current page.', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Smooth Scroll
		$wp_customize->add_setting(
			'clapat_serano_enable_smooth_scrolling',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_smooth_scrolling',
			array(
				'label'   		=> esc_html__( 'Enable Smooth Scrolling', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
				
		// Enable Magic Cursor
		$wp_customize->add_setting(
			'clapat_serano_enable_magic_cursor',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_magic_cursor',
			array(
				'label'   		=> esc_html__( 'Enable Magic Cursor', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Primary color for magic cursor
		$wp_customize->add_setting(
			'clapat_serano_primary_color',
			array(
				'default'           	=> '#f33a3a',
				'sanitize_callback' 	=> 'sanitize_hex_color',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'clapat_serano_primary_color', 
			array(
				'label'      => esc_html__( 'Magic Cursor Primary Color', 'serano' ),
				'description' => esc_html__('Set the primary color for magic cursor.', 'serano'),
				'section'    => 'general_settings'
			)
		));
		
		// Enable Uppercase Text
		$wp_customize->add_setting(
			'clapat_serano_uppercase_text',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_uppercase_text',
			array(
				'label'   		=> esc_html__( 'Enable Uppercase Text Effect', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Rounded borders
		$wp_customize->add_setting(
			'clapat_serano_rounded_borders',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_rounded_borders',
			array(
				'label'   		=> esc_html__( 'Enable rounded borders around common elements', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Global background page type
		$wp_customize->add_setting(
			'clapat_serano_default_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'serano_sanitize_default_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_default_page_bknd_type',
			array(
				'label'   		=> esc_html__('Default Background Type', 'serano'),
				'description'	=> esc_html__('Default background type for pages, posts and category pages. The background type set in page options will overwrite this option.', 'serano'),
				'section' 		=> 'general_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' => esc_html__('White', 'serano'),
										'light-content' => esc_html__('Black', 'serano') ),
			)
		);
		
		// Enable page title as hero caption
		$wp_customize->add_setting(
			'clapat_serano_enable_page_title_as_hero',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_page_title_as_hero',
			array(
				'label'   		=> esc_html__( 'Display Page Title When Hero Section Is Disabled', 'serano' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		/*** End General Settings section ***/
		
		/*** Preloader Settings section ***/
		$wp_customize->add_section(
			'preloader_settings',
			array(
				'title'    => esc_html__( 'Preloader Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 8),
			)
		);
		
		// Enable Preloader
		$wp_customize->add_setting(
			'clapat_serano_enable_preloader',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_preloader',
			array(
				'label'   		=> esc_html__( 'Enable Preloader', 'serano' ),
				'description'  	=> esc_html__( 'Enable preloader mask while the page is loading.', 'serano' ),
				'section' 		=> 'preloader_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Preloader Intro
		$wp_customize->add_setting(
			'clapat_serano_preloader_intro',
			array(
				'default'           	=> esc_html__( 'Loading', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_preloader_intro',
			array(
				'label'   		=> esc_html__( 'Preloader Intro Text', 'serano' ),
				'description'	=> esc_html__( 'Short caption animated by loading percentage displayed at the top while preloader runs.', 'serano'),
				'section' 		=> 'preloader_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_preloader_hover_first_line',
			array(
				'default'           	=> esc_html__( 'Stay', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_preloader_hover_first_line',
			array(
				'label'   		=> esc_html__( 'Preloader Hover Text - First Line', 'serano' ),
				'description'	=> esc_html__( 'First line of the view caption displayed on hover in preloader.', 'serano' ),
				'section' 		=> 'preloader_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_preloader_hover_second_line',
			array(
				'default'           	=> esc_html__( 'Relaxed', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_preloader_hover_second_line',
			array(
				'label'   		=> esc_html__( 'Preloader Hover Text - Second Line', 'serano' ),
				'description'	=> esc_html__( 'Second line of the view caption displayed on hover in preloader.', 'serano' ),
				'section' 		=> 'preloader_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_preloader_text',
			array(
				'default'           	=> esc_html__( 'Please wait, content is loading', 'serano' ),
				'sanitize_callback' 	=> 'wp_kses_post',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_preloader_text',
			array(
				'label'   		=> esc_html__( 'Preloader text', 'serano' ),
				'description'	=> esc_html__( 'More detailed text displayed while preloader is shown.', 'serano' ),
				'section' 		=> 'preloader_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Preloader Settings section ***/
		
		/*** Header Settings section ***/
		$wp_customize->add_section(
			'header_settings',
			array(
				'title'    => esc_html__( 'Header Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 7),
			)
		);
		
		// Logo (default)
		$wp_customize->add_setting(
			'clapat_serano_logo',
			array(
				'default'           	=> get_template_directory_uri() . '/images/logo.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_serano_logo', 
			array(
				'label'      => esc_html__( 'Header Logo', 'serano' ),
				'description' => esc_html__('Upload your logo to be displayed at the left side of the header menu.', 'serano'),
				'section'    => 'header_settings'
			)
		));
		
		// Logo (light version)
		$wp_customize->add_setting(
			'clapat_serano_logo_light',
			array(
				'default'           	=> get_template_directory_uri() . '/images/logo-white.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_serano_logo_light', 
			array(
				'label'      => esc_html__( 'Header Logo Light', 'serano' ),
				'description' => esc_html__('Light logo displayed on dark backgrounds.', 'serano'),
				'section'    => 'header_settings'
			)
		));
		
		// Enable Fullscreen Menu
		$wp_customize->add_setting(
			'clapat_serano_header_menu_type',
			array(
				'default'           	=> 'classic-burger-lines',
				'sanitize_callback' 	=> 'serano_sanitize_menu_header_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_header_menu_type',
			array(
				'label'   		=> esc_html__('Desktop Menu Type', 'serano'),
				'description'	=> esc_html__('The type of the header menu on desktop.', 'serano'),
				'section' 		=> 'header_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'classic-burger-dots' => esc_html__('Classic - Responsive Burger Menu Dots', 'serano'),
										'classic-burger-lines' => esc_html__('Classic - Responsive Burger Menu Lines', 'serano'),
										'fullscreen-burger-dots' => esc_html__('Fullscreen - Burger Menu Dots', 'serano'),
										'fullscreen-burger-lines' => esc_html__('Fullscreen - Burger Menu Lines', 'serano') ),
			)
		);
		
		// Menu button caption
		$wp_customize->add_setting(
			'clapat_serano_menu_btn_caption',
			array(
				'default'           	=> esc_html__( 'Menu', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_menu_btn_caption',
			array(
				'label'   		=> esc_html__( 'Menu button caption', 'serano' ),
				'description'	=> esc_html__( 'Text preceding the burger menu button.', 'serano' ),
				'section' 		=> 'header_settings',
				'type'    		=> 'text',
			)
		);
		
		// Menu background color
		$wp_customize->add_setting(
			'clapat_serano_menu_background_color',
			array(
				'default'           	=> '#0c0c0c',
				'sanitize_callback' 	=> 'sanitize_hex_color',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 
			'clapat_serano_menu_background_color', 
			array(
				'label'      => esc_html__( 'Menu Background Color', 'serano' ),
				'description' => esc_html__('Set the background color for fullscreen or classic responsive menu.', 'serano'),
				'section'    => 'header_settings'
			)
		));
		
		// Menu background color type
		$wp_customize->add_setting(
			'clapat_serano_menu_background_type',
			array(
				'default'           	=> 'invert-header',
				'sanitize_callback' 	=> 'serano_sanitize_menu_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_menu_background_type',
			array(
				'label'   		=> esc_html__('Menu Background Type', 'serano'),
				'description'	=> esc_html__('Set background type for for fullscreen or classic responsive menu.', 'serano'),
				'section' 		=> 'header_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'inherit-header' => esc_html__('Dark', 'serano'),
										'invert-header' => esc_html__('Light', 'serano') ),
			)
		);
		/*** End Header Settings section ***/
		
		
		/*** Footer Settings section ***/
		$wp_customize->add_section(
			'footer_settings',
			array(
				'title'    => esc_html__( 'Footer Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 6),
			)
		);
		
		// Enable Back To Top button
		$wp_customize->add_setting(
			'clapat_serano_enable_back_to_top',
			array(
				'default'          		=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_enable_back_to_top',
			array(
				'label'   		=> esc_html__( 'Enable Back To Top Button', 'serano' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_back_to_top_caption',
			array(
				'default'          		=> esc_html__( 'Back Top', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_back_to_top_caption',
			array(
				'label'   		=> esc_html__( 'Back To Top Caption', 'serano' ),
				'description'	=> esc_html__( 'Caption displayed next to the back to top button in the footer.', 'serano' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'text',
			)
		);
		
		// Copyright
		$wp_customize->add_setting(
			'clapat_serano_footer_copyright',
			array(
				'default'           	=> wp_kses( __('2023 © <a class="link" target="_blank" href="https://www.clapat-themes.com/">ClaPat</a>. All rights reserved.', 'serano'), 'serano_allowed_html' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_footer_copyright',
			array(
				'label'   		=> esc_html__( 'Copyright text', 'serano' ),
				'description'	=> esc_html__( 'This is the copyright text displayed in the footer.', 'serano' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Social links
		$wp_customize->add_setting(
			'clapat_serano_footer_social_links_prefix',
			array(
				'default'           	=> esc_html__( 'Follow Us', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_footer_social_links_prefix',
			array(
				'label'   		=> esc_html__( 'Social Links Prefix', 'serano' ),
				'description'	=> esc_html__('Text preceding the social links.', 'serano'),
				'section' 		=> 'footer_settings',
				'type'    		=> 'text',
			)
		);
		
		// Social Links Display
		$wp_customize->add_setting(
			'clapat_serano_social_links_icons',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_social_links_icons',
			array(
				'label'   		=> esc_html__( 'Display Social Links As Fontawesome Icons', 'serano' ),
				'description'  	=> esc_html__( 'If unchecked will display the social networks acronyms.', 'serano' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		global $serano_social_links;
		$social_network_ids = array_keys( $serano_social_links );
		for( $idx = 1; $idx <= SERANO_MAX_SOCIAL_LINKS; $idx++ ){

			$wp_customize->add_setting(
				'clapat_serano_footer_social_' . $idx,
				array(
					'default'           	=> serano_social_network_default( $idx ),
					'sanitize_callback' 	=> 'serano_sanitize_social_links',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_footer_social_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Network Name ', 'serano' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_social_links,
				)
			);
			
			$wp_customize->add_setting(
				'clapat_serano_footer_social_url_' . $idx,
				array(
					'default'           	=> serano_social_network_url_default( $idx ),
					'sanitize_callback' 	=> 'esc_url_raw',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_footer_social_url_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Link URL ', 'serano' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'url',
				)
			);
			
		}
		/*** End Footer Settings section ***/
		
		/*** Slider and Carousel Settings section ***/
		$wp_customize->add_section(
			'showcase_settings',
			array(
				'title'    => esc_html__( 'Slider And Carousel Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 5),
			)
		);
		
		// Scroll and drag caption
		$wp_customize->add_setting(
			'clapat_serano_showcase_scroll_drag_caption',
			array(
				'default'           	=> esc_html__( 'Scroll or Drag', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_showcase_scroll_drag_caption',
			array(
				'label'   		=> esc_html__( 'Carousel Scroll Caption', 'serano' ),
				'description'	=> esc_html__( 'Short text indicating the scroll action.', 'serano' ),
				'section' 		=> 'showcase_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next, Prev Slide caption
		$wp_customize->add_setting(
			'clapat_serano_showcase_next_slide_caption',
			array(
				'default'           	=> esc_html__( 'Next', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_showcase_next_slide_caption',
			array(
				'label'   		=> esc_html__( 'Next Slide Caption', 'serano' ),
				'description'	=> esc_html__( 'The caption of the next slide navigation button in showcase templates.', 'serano' ),
				'section' 		=> 'showcase_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_showcase_prev_slide_caption',
			array(
				'default'           	=> esc_html__( 'Prev', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_showcase_prev_slide_caption',
			array(
				'label'   		=> esc_html__( 'Prev Slide Caption', 'serano' ),
				'description'	=> esc_html__( 'The caption of the previous slide navigation button in showcase templates.', 'serano' ),
				'section' 		=> 'showcase_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Showcase Settings section ***/
		
		/*** Portfolio Settings section ***/
		$wp_customize->add_section(
			'portfolio_settings',
			array(
				'title'    => esc_html__( 'Portfolio Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 4),
			)
		);
		
		// Custom portfolio slug
		$wp_customize->add_setting(
			'clapat_core_portfolio_custom_slug',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'serano_sanitize_slug_field',
				'transport'         	=> 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			'clapat_core_portfolio_custom_slug',
			array(
				'label'   		=> esc_html__( 'Custom Slug', 'serano' ),
				'description'	=> esc_html__('If you want your portfolio post type to have a custom slug in the url, please enter it here. You will still have to refresh your permalinks after saving this! This is done by going to Settings > Permalinks and clicking save.', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Enable Portfolio Autotrigger
		$wp_customize->add_setting(
			'clapat_serano_portfolio_nav_autotrigger',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_nav_autotrigger',
			array(
				'label'   		=> esc_html__( 'Portfolio Auto Navigate On End Scroll', 'serano' ),
				'description'	=> esc_html__( 'When reaching the bottom of each portfolio page, automatically navigates to the next page.', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// View Project caption
		$wp_customize->add_setting(
			'clapat_serano_view_project_caption_first',
			array(
				'default'           	=> esc_html__( 'View', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_view_project_caption_first',
			array(
				'label'   		=> esc_html__( 'View Project Caption - First Line', 'serano' ),
				'description'	=> esc_html__( 'First line of the view caption displayed on hover in portfolio page templates.', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_view_project_caption_second',
			array(
				'default'           	=> esc_html__( 'Project', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_view_project_caption_second',
			array(
				'label'   		=> esc_html__( 'View Project Caption - Second Line', 'serano' ),
				'description'	=> esc_html__( 'Second line of the view caption displayed on hover in showcase or carousel templates.', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// 'All' portfolio category caption
		$wp_customize->add_setting(
			'clapat_serano_portfolio_filter_all_caption',
			array(
				'default'           	=> esc_html__('All', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_filter_all_caption',
			array(
				'label'   		=> esc_html__('All Category Caption', 'serano'),
				'description'	=> esc_html__('The caption the All category displaying all portfolio items in portfolio page templates.', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Show Filters caption
		$wp_customize->add_setting(
			'clapat_serano_portfolio_show_filters_caption',
			array(
				'default'           	=> esc_html__( 'Filters', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_show_filters_caption',
			array(
				'label'   		=> esc_html__( 'Portfolio Templates - Filters Caption', 'serano' ),
				'description'	=> esc_html__( 'Caption of the Show Filters button displayed in Portfolio layouts.', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next Project caption
		$wp_customize->add_setting(
			'clapat_serano_portfolio_next_caption_first_line',
			array(
				'default'           	=> esc_html__('Next', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_next_caption_first_line',
			array(
				'label'   		=> esc_html__( 'Next Project Caption - First Line', 'serano' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation displayed on hover - on two lines.', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_portfolio_next_caption_second_line',
			array(
				'default'           	=> esc_html__('Project', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_next_caption_second_line',
			array(
				'label'   		=> esc_html__( 'Next Project Caption - Second Line', 'serano' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation displayed on hover - on two lines.', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
			
		
		// View Case caption
		$wp_customize->add_setting(
			'clapat_serano_portfolio_viewcase_caption',
			array(
				'default'           	=> esc_html__( 'View Case', 'serano' ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_viewcase_caption',
			array(
				'label'   		=> esc_html__( 'View Case Caption', 'serano' ),
				'description'	=> esc_html__( 'The caption of the view case link in portfolio page templates.', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Share Social Networks caption
		$wp_customize->add_setting(
			'clapat_serano_portfolio_share_social_networks_caption',
			array(
				'default'           	=> esc_html__('Share Project:', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_share_social_networks_caption',
			array(
				'label'   		=> esc_html__( 'Share This Project Caption', 'serano' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Share Social Networks list
		$wp_customize->add_setting(
			'clapat_serano_portfolio_share_social_networks',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_share_social_networks',
			array(
				'label'   		=> esc_html__( 'Share This Project On', 'serano' ),
				'description'	=> esc_html__('This is a list of social networks you can share the project on, displayed at the bottom right of the hero image. Leave this field empty if you do not want to show it. Type in the social lower case social networks names, separated by comma (,). The list of available networks: twitter, facebook, googleplus, linkedin, pinterest, email, stumbleupon, whatsapp, telegram, line, viber, pocket, messenger, vkontakte, rss', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);	
			
		// Portfolio navigation order
		$wp_customize->add_setting(
			'clapat_serano_portfolio_navigation_order',
			array(
				'default'           	=> 'forward',
				'sanitize_callback' 	=> 'serano_sanitize_portfolio_navigation_order',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_portfolio_navigation_order',
			array(
				'label'   		=> esc_html__('Portfolio Items Navigation Order', 'serano'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'forward' => esc_html__('Forward in time (next item is newer or loops to the oldest if current item is the newest)', 'serano'),
											  'backward' => esc_html__('Backward in time (next item is older or loops to the newest if current item is the oldest)', 'serano') ),
			)
		);
		/*** End Portfolio Settings section ***/
		
		/*** Blog Settings section ***/
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 3),
			)
		);
		
		// Blog pages navigation type
		$wp_customize->add_setting(
			'clapat_serano_blog_navigation_type',
			array(
				'default'           	=> 'blog-nav-classic',
				'sanitize_callback' 	=> 'serano_sanitize_blog_navigation_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_navigation_type',
			array(
				'label'   		=> esc_html__('Blog Pages Navigation Type', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'blog-nav-classic' => esc_html__('Classic', 'serano'),
										'blog-nav-minimal' => esc_html__('Minimal', 'serano') )
			)
		);
		
		// Excerpt in blog pages
		$wp_customize->add_setting(
			'clapat_serano_blog_excerpt_type',
			array(
				'default'           	=> 'blog-excerpt-none',
				'sanitize_callback' 	=> 'serano_sanitize_blog_excerpt_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_excerpt_type',
			array(
				'label'   		=> esc_html__('Excerpt or Full Blog Content', 'serano'),
				'description'	=> esc_html__('Show excerpt or full blog content on archive / blog pages.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'blog-excerpt-none' => esc_html__('None', 'serano'),
										'blog-excerpt' => esc_html__('Excerpt', 'serano'),
										'blog-excerpt-full' => esc_html__('Full Content', 'serano') )
			)
		);
		
		// Excerpt length
		$wp_customize->add_setting(
			'clapat_serano_blog_excerpt_length',
			array(
				'default'           	=> 35,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_excerpt_length',
			array(
				'label'   		=> esc_html__( 'Excerpt length', 'serano' ),
				'description'  	=> esc_html__( 'The number of words in the blog post excerpt.', 'serano' ),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
							
		// Navigation caption
		$wp_customize->add_setting(
			'clapat_serano_blog_next_post_caption',
			array(
				'default'           	=> esc_html__('Next', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_next_post_caption',
			array(
				'label'   		=> esc_html__('Next Post Caption', 'serano'),
				'description'	=> esc_html__('Caption of the button linking to the next single blog post page.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_blog_prev_post_caption',
			array(
				'default'           	=> esc_html__('Prev', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_prev_post_caption',
			array(
				'label'   		=> esc_html__('Prev Post Caption', 'serano'),
				'description'	=> esc_html__('Caption of the button linking to the previous single blog post page.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_blog_no_posts_caption',
			array(
				'default'           	=> esc_html__('No more posts', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_no_posts_caption',
			array(
				'label'   		=> esc_html__('No Posts Page Caption', 'serano'),
				'description'	=> esc_html__('Caption displayed if there are no posts in the next or previous post from blog post page navigation.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_blog_read_more_caption',
			array(
				'default'           	=> esc_html__('Read More', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_read_more_caption',
			array(
				'label'   		=> esc_html__('Read More Caption', 'serano'),
				'description'	=> esc_html__('Caption of the button linking to the single blog post page from the blog index.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_blog_prev_posts_caption',
			array(
				'default'           	=> esc_html__('Prev', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_prev_posts_caption',
			array(
				'label'   		=> esc_html__('Previous Posts Page Caption', 'serano'),
				'description'	=> esc_html__('Caption of the button linking to the previous blog posts page.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_serano_blog_next_posts_caption',
			array(
				'default'           	=> esc_html__('Next', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_next_posts_caption',
			array(
				'label'   		=> esc_html__('Next Posts Page Caption', 'serano'),
				'description'	=> esc_html__('Caption of the button linking to the next blog posts page.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		// Blog pages default title
		$wp_customize->add_setting(
			'clapat_serano_blog_default_title',
			array(
				'default'           	=> esc_html__('Blog', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_blog_default_title',
			array(
				'label'   		=> esc_html__('Default Posts Page Title', 'serano'),
				'description'	=> esc_html__('Title of the default blog posts page. The default blog posts page is the page displaying blog posts when there is no front page set in Settings -> Reading.', 'serano'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Blog Settings section ***/
		
		/*** Map Settings section ***/
		$wp_customize->add_section(
			'map_settings',
			array(
				'title'    => esc_html__( 'Map Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 2),
			)
		);
		
		// Map address
		$wp_customize->add_setting(
			'clapat_serano_map_address',
			array(
				'default'           	=>  esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_address',
			array(
				'label'   		=> esc_html__('Google Map Address', 'serano'),
				'description'  	=> esc_html__('Example: 775 New York Ave, Brooklyn, Kings, New York 11203. Or you can enter latitude and longitude for greater precision. Example: 41.40338, 2.17403 (in decimal degrees - DDD)', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map marker image
		$wp_customize->add_setting(
			'clapat_serano_map_marker',
			array(
				'default'           	=> get_template_directory_uri() . '/images/marker.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_serano_map_marker', 
			array(
				'label'      => esc_html__( 'Map Marker', 'serano' ),
				'description' => esc_html__('Please choose an image file for the marker.', 'serano'),
				'section'    => 'map_settings'
			)
		));
		
		// Map zoom
		$wp_customize->add_setting(
			'clapat_serano_map_zoom',
			array(
				'default'           	=> 16,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_zoom',
			array(
				'label'   		=> esc_html__( 'Map Zoom Level', 'serano' ),
				'description'  	=> esc_html__('Higher number will be more zoomed in.', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'number',
				'input_attrs' 	=> array( 'min' => 0, 'max' => 30, 'step'  => 1 )
			)
		);
		
		// Pop-up marker title
		$wp_customize->add_setting(
			'clapat_serano_map_company_name',
			array(
				'default'           	=> esc_html__('serano', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_company_name',
			array(
				'label'   		=> esc_html__('Pop-up marker title', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Pop-up marker text
		$wp_customize->add_setting(
			'clapat_serano_map_company_info',
			array(
				'default'           	=> esc_html__('Here we are. Come to drink a coffee!', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_company_info',
			array(
				'label'   		=> esc_html__('Pop-up marker text', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map type
		$wp_customize->add_setting(
			'clapat_serano_map_type',
			array(
				'default'           	=> 'satellite',
				'sanitize_callback' 	=> 'serano_sanitize_map_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_type',
			array(
				'label'   		=> esc_html__('Map Type', 'serano'),
				'description'	=> esc_html__('Set the map type as road map or satellite.', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'satellite' => esc_html__('Satellite', 'serano'),
										'roadmap' => esc_html__('Roadmap', 'serano') ),
			)
		);
		
		// Google maps API key
		$wp_customize->add_setting(
			'clapat_serano_map_api_key',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_map_api_key',
			array(
				'label'   		=> esc_html__('Google Maps API Key', 'serano'),
				'description'	=> esc_html__('Without it, the map may not be displayed. If you have an api key paste it here. More information on how to obtain a google maps api key: https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'serano'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Map Settings section ***/
		
		/*** Error Page section ***/
		$wp_customize->add_section(
			'error_page_settings',
			array(
				'title'    => esc_html__( 'Error Page Settings', 'serano' ),
				'priority' => ($serano_before_default_section - 1),
			)
		);
		
		// Error page title
		$wp_customize->add_setting(
			'clapat_serano_error_title',
			array(
				'default'           	=> esc_html__('404', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_title',
			array(
				'label'   		=> esc_html__('Error Page Title', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error page info
		$wp_customize->add_setting(
			'clapat_serano_error_info',
			array(
				'default'           	=> esc_html__('The page you are looking for could not be found.', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_info',
			array(
				'label'   		=> esc_html__('Error Page Info Text', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button
		$wp_customize->add_setting(
			'clapat_serano_error_back_button',
			array(
				'default'           	=> esc_html__('Home Page', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_back_button',
			array(
				'label'   		=> esc_html__('Back Button Caption', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button - caption on hover
		$wp_customize->add_setting(
			'clapat_serano_error_back_button_hover_caption',
			array(
				'default'           	=> esc_html__('Go Back', 'serano'),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_back_button_hover_caption',
			array(
				'label'   		=> esc_html__('Back Button Caption On Hover', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button url
		$wp_customize->add_setting(
			'clapat_serano_error_back_button_url',
			array(
				'default'           	=> esc_url( get_home_url() ),
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_back_button_url',
			array(
				'label'   		=> esc_html__('Back Button URL', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// 404 page background type
		$wp_customize->add_setting(
			'clapat_serano_error_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'serano_sanitize_error_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_serano_error_page_bknd_type',
			array(
				'label'   		=> esc_html__('Background Type', 'serano'),
				'description'	=> esc_html__('Background type for the 404 error page.', 'serano'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' 	=> esc_html__('White', 'serano'),
										'light-content' => esc_html__('Black', 'serano') ),
			)
		);
		/*** End Error Page Settings section ***/
		
		/*** Typography section ***/
		$serano_typography_setting_desc = esc_html__( 'Select custom fonts for your site. You can create custom fonts variations in Appearance -> Custom Fonts.', 'serano' );
		if( !class_exists( 'Bsf_Custom_Fonts_Taxonomy' ) ){
			
			$serano_typography_setting_desc = wp_kses( __('To change default typography please install recommended plugins <a class="link" target="_blank" href="https://wordpress.org/plugins/custom-fonts/">Custom Fonts</a> and then create at least one font variation in Appearance -> Custom Fonts.', 'serano'), 'serano_allowed_html' );
		};
		
		$wp_customize->add_section(
			'typography_page_settings',
			array(
				'title'    		=> esc_html__( 'Typography', 'serano' ),
				'description' 	=> $serano_typography_setting_desc,
				'priority' 		=> ($serano_before_default_section - 1),
			)
		);
		
		$serano_custom_fonts = array( '' => esc_html__( 'Select custom font', 'serano' ) );
		$serano_custom_fonts = apply_filters('serano_custom_fonts_customizer', $serano_custom_fonts);
			
		// Typography portfolio title
		$wp_customize->add_setting(
			'clapat_serano_typography_main_title',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'serano_sanitize_text_field',
			)
		);
			
		$wp_customize->add_control(
			'clapat_serano_typography_main_title',
			array(
				'label'   		=> esc_html__('Main Title', 'serano'),
				'section' 		=> 'typography_page_settings',
				'type'    		=> 'select',
				'choices'   	=> $serano_custom_fonts
			)
		);
			
		if( class_exists( 'Bsf_Custom_Fonts_Taxonomy' ) ){
			
			// Typography portfolio subtitle
			$wp_customize->add_setting(
				'clapat_serano_typography_main_subtitle',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_main_subtitle',
				array(
					'label'   		=> esc_html__('Main Subtitle', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography headings
			$wp_customize->add_setting(
				'clapat_serano_typography_headings',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_headings',
				array(
					'label'   		=> esc_html__('Headings', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography paragraph
			$wp_customize->add_setting(
				'clapat_serano_typography_paragraph',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_paragraph',
				array(
					'label'   		=> esc_html__('Paragraph', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography body
			$wp_customize->add_setting(
				'clapat_serano_typography_body',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_body',
				array(
					'label'   		=> esc_html__('Body', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography inputs
			$wp_customize->add_setting(
				'clapat_serano_typography_inputs',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_inputs',
				array(
					'label'   		=> esc_html__('Inputs', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography fullscreen menu
			$wp_customize->add_setting(
				'clapat_serano_typography_fullscreen_menu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_fullscreen_menu',
				array(
					'label'   		=> esc_html__('Fullscreen Menu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography fullscreen submenu
			$wp_customize->add_setting(
				'clapat_serano_typography_fullscreen_submenu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_fullscreen_submenu',
				array(
					'label'   		=> esc_html__('Fullscreen Submenu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography fullscreen submenu
			$wp_customize->add_setting(
				'clapat_serano_typography_fullscreen_submenu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_fullscreen_submenu',
				array(
					'label'   		=> esc_html__('Fullscreen Submenu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography classic menu
			$wp_customize->add_setting(
				'clapat_serano_typography_classic_menu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_classic_menu',
				array(
					'label'   		=> esc_html__('Classic Menu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography classic submenu
			$wp_customize->add_setting(
				'clapat_serano_typography_classic_submenu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_classic_submenu',
				array(
					'label'   		=> esc_html__('Classic Submenu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography responsive menu
			$wp_customize->add_setting(
				'clapat_serano_typography_responsive_menu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_responsive_menu',
				array(
					'label'   		=> esc_html__('Responsive Menu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
			
			// Typography classic submenu
			$wp_customize->add_setting(
				'clapat_serano_typography_responsive_submenu',
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'serano_sanitize_text_field',
				)
			);
			
			$wp_customize->add_control(
				'clapat_serano_typography_responsive_submenu',
				array(
					'label'   		=> esc_html__('Responsive Submenu', 'serano'),
					'section' 		=> 'typography_page_settings',
					'type'    		=> 'select',
					'choices'   	=> $serano_custom_fonts
				)
			);
		}
		/*** Typography section ***/
	}

	add_action( 'customize_register', 'serano_options_config' );
}

/**
 * Sanitize a text or textarea field
 *
 * @param string $input - the text
 */
function serano_sanitize_text_field( $input ) {
	
	return wp_kses( $input, 'serano_allowed_html' );
}

/**
 * Sanitize a custom slug field
 *
 * @param string $input - the input slug
 */
function serano_sanitize_slug_field( $input ) {
	
	return sanitize_title( $input );
}


/**
 * Sanitize the social network options.
 *
 * @param string $input social network id.
 */
function serano_sanitize_social_links( $input ) {
	
	global $serano_social_links;
	$valid = array_keys( $serano_social_links );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'Fb';
}


/**
 * Sanitize the portfolio navigation order.
 *
 * @param string $input - portfolio navigation order
 */
function serano_sanitize_portfolio_navigation_order( $input ) {
	
	$valid = array( 'forward', 'backward' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the blog layout types.
 *
 * @param string $input - blog layout type
 */
function serano_sanitize_blog_pages_layout( $input ) {
	
	$valid = array( 'blog-classic', 'blog-minimal' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the blog navigation types.
 *
 * @param string $input - blog layout type
 */
function serano_sanitize_blog_navigation_type( $input ) {
	
	$valid = array( 'blog-nav-classic', 'blog-nav-minimal' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the blog excerpt types.
 *
 * @param string $input - blog excerpt type
 */
function serano_sanitize_blog_excerpt_type( $input ) {
	
	$valid = array( 'blog-excerpt-none', 'blog-excerpt', 'blog-excerpt-full' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'blog-excerpt-none';
}

/**
 * Sanitize the showcase transition pattern settings.
 *
 * @param string $input - showcase transition
 */
function serano_sanitize_showcase_transition_pattern_image( $input ) {
	
	global $serano_slide_transitions;
	$valid = array_keys( $serano_slide_transitions );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'first';
}

/**
 * Sanitize the map type
 *
 * @param string $input - map type
 */
function serano_sanitize_map_type( $input ) {
	
	$valid = array( 'satellite', 'roadmap' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'satellite';
}

/**
 * Sanitize the global page background type
 *
 * @param string $input - background type
 */
function serano_sanitize_default_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light-content';
}

/**
 * Sanitize the error page background type
 *
 * @param string $input - background type
 */
function serano_sanitize_error_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light-content';
}

/**
 * Sanitize the header menu type
 *
 * @param string $input - header menu type
 */
function serano_sanitize_menu_header_type( $input ) {
	
	$valid = array( 'classic-burger-dots', 'classic-burger-lines', 'fullscreen-burger-dots', 'fullscreen-burger-lines' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'classic-burger-dots';
}

/**
 * Sanitize the menu background type
 *
 * @param string $input - background type
 */
function serano_sanitize_menu_bknd_type( $input ) {
	
	$valid = array( 'invert-header', 'inherit-header' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'invert-header';
}