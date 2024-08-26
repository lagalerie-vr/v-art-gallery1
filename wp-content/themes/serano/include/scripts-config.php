<?php
/**
 * Created by Clapat.
 * Date: 01/08/23
 * Time: 7:26 AM
 */

if ( ! function_exists( 'serano_load_scripts' ) ){

	function serano_load_scripts() {

		// Force load Elementor styles on non-Elementor pages if AJAX page transitions are turned on
		if ( class_exists( '\Elementor\Frontend' ) && !serano_post_is_built_with_elementor() && serano_get_theme_options( "clapat_serano_enable_ajax" ) ) {

			\Elementor\Frontend::instance()->enqueue_styles();
		}

		// Enqueue css files
		wp_enqueue_style( 'serano-content', get_template_directory_uri() . '/css/content.css' );

		wp_enqueue_style( 'serano-showcase', get_template_directory_uri() . '/css/showcase.css' );

		wp_enqueue_style( 'serano-portfolio', get_template_directory_uri() . '/css/portfolio.css' );

		wp_enqueue_style( 'serano-blog', get_template_directory_uri() . '/css/blog.css' );

		wp_enqueue_style( 'serano-shortcodes', get_template_directory_uri() . '/css/shortcodes.css' );

		wp_enqueue_style( 'serano-assets', get_template_directory_uri() . '/css/assets.css' );
		
		wp_enqueue_style( 'serano-style-wp', get_template_directory_uri() . '/css/style-wp.css' );
		
		wp_enqueue_style( 'serano-page-builders', get_template_directory_uri() . '/css/page-builders.css' );

		wp_enqueue_style( 'serano-theme', get_stylesheet_uri(), array('serano-content', 'serano-showcase', 'serano-portfolio', 'serano-blog', 'serano-shortcodes', 'serano-assets', 'serano-style-wp', 'serano-page-builders') );

		$serano_typography_css = serano_typography_css();
		if( empty( !$serano_typography_css ) ){
			
			wp_add_inline_style( 'serano-theme', $serano_typography_css );
		}
		
		if ( class_exists( '\Elementor\Plugin' ) ) {

			wp_enqueue_style( 'elementor-icons-fa-brands' ); // FontAwesome 5 Brands from Elementor
			wp_enqueue_style( 'elementor-icons-fa-solid' ); // FontAwesome 5 Solid from Elementor
		}

		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/all.min.css' );

		// enqueue standard font style
		$serano_main_font_url  = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'serano') ) {
			$serano_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,500,600,700' ), "//fonts.googleapis.com/css" );
			$serano_secondary_font_url = add_query_arg( array( 'family' => urlencode( 'Six Caps' ),
																'display' => 'swap' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'serano-main-font', $serano_main_font_url, array(), '1.0.0' );
		wp_enqueue_style( 'serano-secondary-font', $serano_secondary_font_url, array(), '1.0.0' );

		// Force load Elementor scripts on non-Elementor pages if AJAX page transitions are turned on
		if ( class_exists( '\Elementor\Frontend' ) && !serano_post_is_built_with_elementor() && serano_get_theme_options( "clapat_serano_enable_ajax" ) ) {

			\Elementor\Frontend::instance()->enqueue_scripts();
		}

		// enqueue scripts
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

			// Register scripts
			wp_enqueue_script(
            'modernizr',
            get_template_directory_uri() . '/core/js/modernizr.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
            'jquery-flexnav',
            get_template_directory_uri() . '/core/js/jquery.flexnav.min.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
            'jquery-waitforimages',
            get_template_directory_uri() . '/core/js/jquery.waitforimages.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
            'jquery-justifiedgallery',
            get_template_directory_uri() . '/core/js/jquery.justifiedGallery.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script( 'imagesloaded' );

		wp_enqueue_script(
            'three',
            get_template_directory_uri() . '/core/js/three.min.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
            'clapatwebgl',
            get_template_directory_uri() . '/core/js/clapatwebgl.js',
            array('jquery'),
            false,
            true
		);
		
		wp_enqueue_script(
            'clapatslider',
            get_template_directory_uri() . '/core/js/clapatslider.min.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
			'gsap',
			get_template_directory_uri() . '/core/js/gsap.min.js',
			array('jquery'),
			false,
			true
		);
		
		wp_enqueue_script(
            'scroll-trigger',
            get_template_directory_uri() . '/core/js/scrolltrigger.min.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_script(
			'gsap-flip',
			get_template_directory_uri() . '/core/js/flip.min.js',
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'js-socials',
			get_template_directory_uri() . '/core/js/jssocials.min.js',
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'grid-to-fullscreen',
			get_template_directory_uri() . '/core/js/gridtofullscreen.min.js',
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'smooth-scrollbar',
			get_template_directory_uri() . '/core/js/smooth-scrollbar.min.js',
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'serano-common',
			get_template_directory_uri() . '/core/js/common.js',
			array('jquery'),
			false,
			true
		);
		
		wp_enqueue_script(
			'serano-contact',
			get_template_directory_uri() . '/core/js/contact.js',
			array('jquery'),
			false,
			true
		);
		
		wp_enqueue_script(
			'serano-scripts',
			get_template_directory_uri() . '/js/scripts.js',
			array('jquery'),
			false,
			true
		);

		wp_localize_script( 'serano-common',
						'ClapatThemeOptions',
						array( 	"share_social_network_list" => serano_get_theme_options('clapat_serano_portfolio_share_social_networks') )
						);
					
		wp_localize_script( 'serano-scripts',
                    'ClapatSeranoThemeOptions',
                    array( 	"enable_preloader" 	=> serano_get_theme_options('clapat_serano_enable_preloader') )
					);

		wp_localize_script( 'serano-contact',
							'ClapatMapOptions',
							array(  "map_marker_image"	=> esc_js( esc_url ( serano_get_theme_options("clapat_serano_map_marker") ) ),
									"map_address"		=> serano_get_theme_options('clapat_serano_map_address'),
									"map_zoom"			=> serano_get_theme_options('clapat_serano_map_zoom'),
									"marker_title"		=> serano_get_theme_options('clapat_serano_map_company_name'),
									"marker_text"		=> serano_get_theme_options('clapat_serano_map_company_info'),
									"map_type" 			=> serano_get_theme_options('clapat_serano_map_type'),
									"map_api_key"		=> serano_get_theme_options('clapat_serano_map_api_key') ) );

	}

}

add_action('wp_enqueue_scripts', 'serano_load_scripts');

if ( ! function_exists( 'serano_admin_load_scripts' ) ){

    function serano_admin_load_scripts() {

		// enqueue standard font style
		$serano_main_font_url  = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'serano') ) {
			$serano_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,600,700' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'serano-main-font', $serano_main_font_url, array(), '1.0.0' );
	}
}
add_action('admin_enqueue_scripts', 'serano_admin_load_scripts');

if ( ! function_exists( 'serano_typography_css' ) ){

	function serano_typography_css() {
		
		$serano_typography_css = '';
		
		// If custom fonts plugin is installed
		if ( class_exists( 'Bsf_Custom_Fonts_Render' ) ){
			
			$arr_custom_fonts = array();
			
			// if custom fonts plugin is installed
			$bsf_instance = Bsf_Custom_Fonts_Render::get_instance();
			
			if( method_exists( $bsf_instance, 'get_existing_font_posts' ) ){

				$all_fonts = $bsf_instance->get_existing_font_posts();

				if ( empty( $all_fonts ) || ! is_array( $all_fonts ) ) {
					
					return;
				}
				
				foreach ( $all_fonts as $font => $id ) {
					
					$font_family    = get_the_title( $id );
					$font_data      = get_post_meta( $id, 'fonts-data', true );

					if ( ! empty( $font_data['variations'] ) ) {
						
						foreach ( $font_data['variations'] as $variation ) {
							
							$font_label = $font_family;
							
							$font_weight = "";
							if( !empty( $variation['font_weight'] ) ){
								
								$font_weight = $variation['font_weight'];
							}
							
							$font_style = "";
							if( !empty( $variation['font_style'] ) ){
								
								$font_style = $variation['font_style'];
							}
							
							$arr_custom_fonts[ $id.$variation['id'] ] = array( 'name' => $font_family, 'weight' => $font_weight,  'style' => $font_style );
						}
					}
					else{
						
						$arr_custom_fonts[ $id ] = array( 'name' => $font_family );
					}
				}
			}
			else {
				
				// Get the custom fonts installed
				$font_terms = get_terms(
								Bsf_Custom_Fonts_Taxonomy::$register_taxonomy_slug,
								array(
									'hide_empty' => false,
								)
							);
							
				if ( ! empty( $font_terms ) ) {
					
					foreach ( $font_terms as $term ) {
						
						$font_props = Bsf_Custom_Fonts_Taxonomy::get_font_links( $term->term_id );
						foreach ( $font_props as $font_prop_id => $font_prop_value  ) {
							
							if ( strpos( $font_prop_id , 'weight' ) !== false ) {
															
								$arr_custom_fonts[ $term->term_id.$font_prop_id ] = array( 'name' => $term->name, 'weight' => $font_prop_value );
							}
						}
					}
				}
			}
			
			// Portfolio title
			if( serano_get_theme_options( 'clapat_serano_typography_main_title' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_main_title' ) ){
						
						$serano_typography_css .= ' .slide-title, .hero-title, .next-hero-title, article .post-title, .blog-numbers, .page-numbers, .post-prev-caption, .post-next-caption, .team-member, .slide-hero-title, .preloader-intro {';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Portfolio subtitle
			if( serano_get_theme_options( 'clapat_serano_typography_main_subtitle' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_main_subtitle' ) ){
						
						$serano_typography_css .= ' .hero-subtitle, .next-hero-subtitle, .slide-subtitle, .slide-hero-subtitle, .slide-cat, .slide-date, .percentage, .percentage-intro { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Headings
			if( serano_get_theme_options( 'clapat_serano_typography_headings' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_headings' ) ){
						
						$serano_typography_css .= ' h1, h2, h3, h4, h5, h6 { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Paragraph
			if( serano_get_theme_options( 'clapat_serano_typography_paragraph' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_paragraph' ) ){
						
						$serano_typography_css .= ' p,  #ball p, .accordion .accordion-content, .hero-text, #filters li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Body
			if( serano_get_theme_options( 'clapat_serano_typography_body' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_body' ) ){
						
						$serano_typography_css .= ' html, body { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Inputs
			if( serano_get_theme_options( 'clapat_serano_typography_inputs' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_inputs' ) ){
						
						$serano_typography_css .= ' input, textarea, input[type="submit"] { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Fullscreen Menu
			if( serano_get_theme_options( 'clapat_serano_typography_fullscreen_menu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_fullscreen_menu' ) ){
						
						$serano_typography_css .= ' @media all and (min-width: 1025px) { .fullscreen-menu .flexnav li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Fullscreen Submenu
			if( serano_get_theme_options( 'clapat_serano_typography_fullscreen_submenu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_fullscreen_submenu' ) ){
						
						$serano_typography_css .= ' @media all and (min-width: 1025px) { .fullscreen-menu .flexnav li ul li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Classic Menu
			if( serano_get_theme_options( 'clapat_serano_typography_classic_menu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_classic_menu' ) ){
						
						$serano_typography_css .= ' @media all and (min-width: 1025px) { .classic-menu .flexnav li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Classic Submenu
			if( serano_get_theme_options( 'clapat_serano_typography_classic_submenu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_classic_submenu' ) ){
						
						$serano_typography_css .= ' @media all and (min-width: 1025px) { .classic-menu .flexnav li ul li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Responsive Menu
			if( serano_get_theme_options( 'clapat_serano_typography_responsive_menu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_responsive_menu' ) ){
						
						$serano_typography_css .= ' @media all and (max-width: 1024px) { .flexnav li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
			
			// Responsive Submenu
			if( serano_get_theme_options( 'clapat_serano_typography_responsive_submenu' ) ){
				
				// Find the font
				foreach( $arr_custom_fonts as $custom_font_id => $custom_font_props ){
					
					if( $custom_font_id == serano_get_theme_options( 'clapat_serano_typography_responsive_submenu' ) ){
						
						$serano_typography_css .= ' @media all and (max-width: 1024px) { .flexnav li ul li a { ';
						$serano_typography_css .= 'font-family: "' . $custom_font_props['name'] . '"; ';
						if( !empty( $custom_font_props['weight'] ) ){
							
							$serano_typography_css .= 'font-weight: ' . $custom_font_props['weight'] . '; ';
						}
						if( !empty( $custom_font_props['style'] ) ){
							
							$serano_typography_css .= 'font-style: ' . $custom_font_props['style'] . '; ';
						}
						$serano_typography_css .= '} ';
						$serano_typography_css .= '}';
						break;
					}
				}
			}
		}
		
		return $serano_typography_css;
	}
}