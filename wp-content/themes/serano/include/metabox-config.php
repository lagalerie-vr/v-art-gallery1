<?php

// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = 'clapat_' . SERANO_THEME_ID . '_theme_options';


if ( !function_exists( "serano_add_metaboxes" ) ){

    function serano_add_metaboxes( $metaboxes ) {

    $metaboxes = array();


    ////////////// Page Options //////////////
    $page_options = array();
    $page_options[] = array(
        'title'         => esc_html__('General', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning all page templates.', 'serano'),
        'fields'        => array(

			array(
                'id'        => 'serano-opt-page-bknd-color-code',
                'type'      => 'color-picker',
                'title'     => esc_html__('Background color', 'serano'),
				'desc'      => esc_html__('Background color for this page.', 'serano'),
                'default'   => '#0c0c0c',
            ),
			
			array(
                'id'        => 'serano-opt-page-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background Type', 'serano'),
				'desc'      => esc_html__('Background type for this page.', 'serano'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('Light', 'serano'),
                    'light-content' => esc_html__('Dark', 'serano')

                ),
				'default'   => 'light-content',
            )
			
        ),
    );

	$page_options[] = array(
        'title'         => esc_html__('Hero Section', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-website',
        'desc'          => esc_html__('Options concerning Hero top section in pages.', 'serano'),
        'fields'        => array(

			/**************************HERO SECTION OPTIONS**************************/
			array(
                'id'        => 'serano-opt-page-enable-hero',
                'type'      => 'switch',
                'title'     => esc_html__('Display Hero Section', 'serano'),
                'desc'      => esc_html__('Enable "hero" section displayed immediately below page header. Showcase and Carousel pages do not have a hero section.', 'serano'),
				'on'       => esc_html__('Yes', 'serano'),
				'off'      => esc_html__('No', 'serano'),
                'default'   => false
            ),

			array(
				'id'        => 'serano-opt-page-hero-img',
                'type'      => 'media',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
                'url'       => true,
                'title'     => esc_html__('Hero Image', 'serano'),
                'desc'      => esc_html__('Upload hero background image. The hero image is the fullscreen image in hero section. Hero section is the intro section displayed at the top of the page.', 'serano'),
                'default'   => array(),
            ),
			
			array(
				'id'        => 'serano-opt-page-video',
				'type'      => 'switch',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
				'title'     => esc_html__('Video Hero', 'serano'),
				'desc'   	=> esc_html__('Video displayed as hero section in project page. If you check this option set the Hero Image as the first frame image of the video to avoid flickering!', 'serano'),
				'on'       	=> esc_html__('Yes', 'serano'),
				'off'      	=> esc_html__('No', 'serano'),
				'default'   => false
			),

			array(
				'id'        => 'serano-opt-page-video-webm',
				'type'      => 'text',
				'title'     => esc_html__('Webm Video URL', 'serano'),
				'desc'   	=> esc_html__('URL of the hero section background webm video. Webm format is previewed in Chrome and Firefox.', 'serano'),
				'required'	=> array('serano-opt-page-video', '=', true),
			),

			array(
				'id'        => 'serano-opt-page-video-mp4',
				'type'      => 'text',
				'title'     => esc_html__('MP4 Video URL', 'serano'),
				'desc'   	=> esc_html__('URL of the hero section background MP4 video. MP4 format is previewed in IE, Safari and other browsers.', 'serano'),
				'required'	=> array('serano-opt-page-video', '=', true),
			),
			
			array(
                'id'        => 'serano-opt-page-hero-caption-title',
                'type'      => 'textarea',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Title', 'serano'),
                'desc'  	=> esc_html__('The title displayed over hero section. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
	        ),
			
			array(
                'id'        => 'serano-opt-page-hero-caption-subtitle',
                'type'      => 'textarea',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Subtitle', 'serano'),
                'desc'  	=> esc_html__('Subtitle displayed over hero section, underneath the title. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
			),
			
			array(
                'id'        => 'serano-opt-page-hero-scroll-caption',
                'type'      => 'text',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
				'title'     => esc_html__('Scroll Down Caption', 'serano'),
                'desc'  	=> esc_html__('Scroll down caption displayed to the bottom right of the hero image indicating scrolling down to reveal the content. Leave empty for no scroll down button.', 'serano'),
				'default'   => '',
	        ),
			
			array(
                'id'        => 'serano-opt-page-hero-caption-tagline',
                'type'      => 'text',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Tag Line', 'serano'),
                'desc'  	=> esc_html__('Tag line displayed to the right of the hero footer. Short punchline text.', 'serano'),
	        ),
			
			array(
                'id'        => 'serano-opt-page-hero-info-text',
                'type'      => 'text',
				'required'  => array( 'serano-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Info Text', 'serano'),
                'desc'  	=> esc_html__('Additional info regarding this page.', 'serano'),
	        ),
			
			array(
                'id'        => 'serano-opt-page-hero-parallax-caption',
                'type'      => 'select',
                'title'     => esc_html__('Enable Parallax Caption', 'serano'),
                'desc'      => esc_html__('Parallax scrolling effect on hero section title and subtitle. This only applies if there is no hero image assigned.', 'serano'),
				'options'   => array(
                    'parallax-scroll-caption'	=> esc_html__('Yes', 'serano'),
                    'normal-scroll-caption' => esc_html__('No', 'serano')
                ),
                'default'   => 'parallax-scroll-caption'
            ),
			
			array(
                'id'        => 'serano-opt-page-hero-caption-align',
                'type'      => 'select',
                'title'     => esc_html__('Caption Alignment', 'serano'),
                'desc'      => esc_html__('The alignment of the hero caption (title and subtitle).', 'serano'),
				'options'   => array(
                    'text-align-center'	=> esc_html__('Center', 'serano'),
                    'text-align-left' => esc_html__('Left', 'serano')
                ),
                'default'   => 'text-align-left'
            ),
			
			array(
                'id'        => 'serano-opt-page-hero-caption-width',
                'type'      => 'select',
                'title'     => esc_html__('Caption Width', 'serano'),
                'desc'      => esc_html__('The type of the hero caption width.', 'serano'),
				'options'   => array(
                    'content-full-width'	=> esc_html__('Full', 'serano'),
                    'content-max-width' => esc_html__('Boxed', 'serano')
                ),
                'default'   => 'content-full-width'
            ),
			/**************************END - HERO SECTION OPTIONS**************************/
		),
	);
	
	$page_options[] = array(
        'title'         => esc_html__('Page Navigation', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-caret-right',
        'desc'          => esc_html__('Options concerning bottom page next navigation section.', 'serano'),
        'fields'        => array(

			/**************************PAGE NAVIGATION SECTION**************************/
			array(
                'id'        => 'serano-page-navigation-caption-first-line',
                'type'      => 'text',
				'title'     => esc_html__('Navigation Caption - First Line', 'serano'),
                'desc'		=> esc_html__('First line of caption displayed when hovering over bottom navigation section.', 'serano'),
				'default'   => esc_html__('Next', 'serano'),
			),
			
			array(
                'id'        => 'serano-page-navigation-caption-second-line',
                'type'      => 'text',
				'title'     => esc_html__('Navigation Caption - Second Line', 'serano'),
                'desc'		=> esc_html__('Second line of caption displayed when hovering over bottom navigation section.', 'serano'),
				'default'   => esc_html__('Page', 'serano'),
			),
			
			array(
                'id'        => 'serano-opt-page-navigation-next-page',
                'type'      => 'select',
                'title'     => esc_html__('Next Page In Navigation', 'serano'),
				'desc'      => esc_html__('The next page navigation displayed at the bottom of the current page.', 'serano'),
                'options'   => serano_list_published_pages(),
				'default'   => '',
            ),
			
			array(
                'id'        => 'serano-opt-page-navigation-caption-title',
                'type'      => 'textarea',
                'title'     => esc_html__('Next Page Caption Title', 'serano'),
                'desc'  	=> esc_html__('Leave it empty to display the next page hero title. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
	        ),
			
			array(
                'id'        => 'serano-opt-page-navigation-caption-subtitle',
                'type'      => 'textarea',
                'title'     => esc_html__('Next Page Caption Subtitle', 'serano'),
                'desc'  	=> esc_html__('Leave it empty to display the next page hero subtitle. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
			),
			
			array(
                'id'        => 'serano-opt-page-navigation-caption-align',
                'type'      => 'select',
                'title'     => esc_html__('Next Page Caption Alignment', 'serano'),
                'desc'      => esc_html__('The alignment of the next page navigation caption.', 'serano'),
				'options'   => array(
                    'text-align-center'	=> esc_html__('Center', 'serano'),
                    'text-align-left' => esc_html__('Left', 'serano')
                ),
                'default'   => 'text-align-left'
            ),
			
			array(
                'id'        => 'serano-opt-page-navigation-caption-width',
                'type'      => 'select',
                'title'     => esc_html__('Next Page Caption Width', 'serano'),
                'desc'      => esc_html__('The next page navigation caption width.', 'serano'),
				'options'   => array(
                    'content-full-width'	=> esc_html__('Full', 'serano'),
                    'content-max-width' => esc_html__('Boxed', 'serano')
                ),
                'default'   => 'content-full-width'
            ),
			/**************************END - PAGE NAVIGATION SECTION**************************/
		),
	);
	
	$page_options[] = array(
        'title'         => esc_html__('Portfolio Templates', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Portfolio templates (Creative Grid, Showcase, Carousel, Reverse List).', 'serano'),
        'fields'        => array(

			array(
                'id'        	=> 'serano-opt-page-portfolio-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'serano'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the portfolio page templates separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'serano'),
				'default'  	=> '',
	        ),
						
			array(
				'id'        => 'serano-opt-page-portfolio-thumb-to-fullscreen',
				'type'      => 'select',
				'title'     => esc_html__('Thumbnail To Fullscreen Animation', 'serano'),
				'desc'      => esc_html__('Type of animation when navigating from a portfolio thumbnail to the portfolio hero section background image.', 'serano'),
				'options'   => array(
								'webgl-fitthumbs' 	=> esc_html__('WebGL Animation', 'serano'),
								'no-fitthumbs' => esc_html__('None', 'serano')
							),
				'default'   => 'webgl-fitthumbs',
			),
			
			array(
				'id'        => 'serano-opt-page-portfolio-thumb-to-fullscreen-webgl-type',
				'type'      => 'select',
				'title'     => esc_html__('WebGL Animation Type', 'serano'),
				'desc'      => esc_html__('Type of animation when WebGL thumbnail to fullscreen effect is selected.', 'serano'),
				'options'   => array(
								'fx-seven' 	=> esc_html__('No animation effect, only scale', 'serano'),
								'fx-one' 	=> esc_html__('FX one', 'serano'),
								'fx-two' 	=> esc_html__('FX two', 'serano'),
								'fx-three' 	=> esc_html__('FX three', 'serano'),
								'fx-four' 	=> esc_html__('FX four', 'serano'),
								'fx-five' 	=> esc_html__('FX five', 'serano'),
								'fx-six' 	=> esc_html__('FX six', 'serano')
							),
				'default'   => 'fx-seven',
			),
			
			array(
                'id'        => 'serano-opt-page-portfolio-enable-slider-autoplay',
                'type'      => 'switch',
                'title'     => esc_html__('Portfolio Slider Autoplay', 'serano'),
                'desc'      => esc_html__('Enable portfolio slider autoplay in Showcase and Carousel pages.', 'serano'),
				'on'       => esc_html__('Yes', 'serano'),
				'off'      => esc_html__('No', 'serano'),
                'default'   => false
            ),
			
			array(
                'id'        => 'serano-opt-page-portfolio-slider-autoplay-delay',
                'type'      => 'text',
				'required'  => array( 'serano-opt-page-portfolio-enable-slider-autoplay', '=', true ),
                'title'     => esc_html__('Portfolio Slider Autoplay Delay', 'serano'),
                'desc'      => esc_html__('Delay in miliseconds before the next autoplay transition.', 'serano'),
				'default'   => '5000'
            ),
			
		),
	);

	$metaboxes[] = array(
        'id'            => 'clapat_' . SERANO_THEME_ID . '_page_options',
        'title'         => esc_html__( 'Page Options', 'serano'),
        'post_types'    => array( 'page' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidsebar in the normal/advanced positions
        'sections'      => $page_options,
    );

    $blog_post_options = array();
    $blog_post_options[] = array(

        'title'         => esc_html__('General', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning blog post options.', 'serano'),
        'fields'        => array(

			array(
                'id'        => 'serano-opt-blog-bknd-color-code',
                'type'      => 'color-picker',
                'title'     => esc_html__('Background color', 'serano'),
				'desc'      => esc_html__('Background color for this blog post.', 'serano'),
                'default'   => '#0c0c0c',
            ),
			
			array(
                'id'        => 'serano-opt-blog-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background type', 'serano'),
				'desc'      => esc_html__('Background type for this blog post.', 'serano'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('Light', 'serano'),
                    'light-content' => esc_html__('Dark', 'serano')

                ),
				'default'   => 'light-content',
            ),

			array(
                 'id'       	=> 'serano-opt-blog-hero-caption-alignment',
                 'type'     	=> 'select',
                 'title'    	=> esc_html__( 'Header Caption Alignment', 'serano'),
                 'desc' 		=> esc_html__( 'The alignment of the blog post caption.', 'serano'),
                 'options'   => array(
                    'text-align-left' 	=> esc_html__('Left', 'serano'),
					'text-align-center'	=> esc_html__('Center', 'serano'),
                 ),
				 'default'	=> 'text-align-left',
            ),
          )
        );

	$blog_post_options[] = array(
		'title'         => esc_html__('', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
		'desc'          => '',
        'fields'        => array()
		);
		
    $metaboxes[] = array(
       'id'            => 'clapat_' . SERANO_THEME_ID . '_post_options',
       'title'         => esc_html__( 'Post Options', 'serano'),
       'post_types'    => array( 'post' ),
       'position'      => 'normal', // normal, advanced, side
       'priority'      => 'high', // high, core, default, low
       'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
       'sections'      => $blog_post_options,
    );


    $portfolio_options = array();
	$portfolio_options[] = array(
		'title'         => esc_html__('General', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning portfolio item options.', 'serano'),
        'fields'        => array(

			array(
                'id'        => 'serano-opt-portfolio-bknd-color-code',
                'type'      => 'color-picker',
                'title'     => esc_html__('Background color', 'serano'),
				'desc'      => esc_html__('Background color for this portfolio item page.', 'serano'),
                'default'   => '#0c0c0c',
            ),
			
			array(
                'id'        => 'serano-opt-portfolio-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background type', 'serano'),
				'desc'      => esc_html__('Background type for this portfolio item page.', 'serano'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('Light', 'serano'),
                    'light-content' => esc_html__('Dark', 'serano')

                ),
				'default'   => 'light-content',
            ),
			
			array(
                'id'        => 'serano-opt-portfolio-navigation-cursor-color',
                'type'      => 'color-picker',
                'title'     => esc_html__('Project navigation cursor color', 'serano'),
				'desc'      => esc_html__('Cursor color in portfolio and project Next navigation.', 'serano'),
                'default'   => '#f33a3a',
            ),
			
			array(
				'id'        => 'serano-opt-portfolio-project-year',
				'type'      => 'text',
				'title'     => esc_html__('Project Year', 'serano'),
				'desc'   	=> esc_html__('Year the portfolio project was implemented. Displayed in Parallax Panels, Showcase Grid and Archive List portfolio page templates.', 'serano'),
				'default'	=> date("Y")
			),
			
			array(
				'id'        => 'serano-opt-portfolio-view-project-url',
				'type'      => 'text',
				'title'     => esc_html__('Project URL', 'serano'),
				'desc'   	=> esc_html__('The external project URL, usually the live version of the project.', 'serano'),
				'default'	=> ""
			),
			
			array(
				'id'        => 'serano-opt-portfolio-view-project-caption',
				'type'      => 'text',
				'title'     => esc_html__('View Project', 'serano'),
				'desc'   	=> esc_html__('Caption of the link to the live version of this project.', 'serano'),
				'default'	=> esc_html__('View Project', 'serano')
			),
			
        ),
    );
	
	$portfolio_options[] = array(
        'title'         => esc_html__('Hero Section', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-website',
        'desc'          => esc_html__('Options concerning Hero top section in individual portfolio pages.', 'serano'),
        'fields'        => array(

			/**************************HERO SECTION OPTIONS**************************/
			array(
				'id'        => 'serano-opt-portfolio-hero-img',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__('Hero Image', 'serano'),
                'desc'      => esc_html__('Upload hero background image. The hero image is the fullscreen image in hero section. Hero section is the header section displayed at the top of the individual project page.', 'serano'),
                'default'   => array(),
            ),
			
			array(
				'id'        => 'serano-opt-portfolio-video',
				'type'      => 'switch',
				'title'     => esc_html__('Video Hero', 'serano'),
				'desc'   	=> esc_html__('Video displayed as hero section in project page. If you check this option set the Hero Image as the first frame image of the video to avoid flickering!', 'serano'),
				'on'       	=> esc_html__('Yes', 'serano'),
				'off'      	=> esc_html__('No', 'serano'),
				'default'   => false
			),

			array(
				'id'        => 'serano-opt-portfolio-video-webm',
				'type'      => 'text',
				'title'     => esc_html__('Webm Video URL', 'serano'),
				'desc'   	=> esc_html__('URL of the hero section background webm video. Webm format is previewed in Chrome and Firefox.', 'serano'),
				'required'	=> array('serano-opt-portfolio-video', '=', true),
			),

			array(
				'id'        => 'serano-opt-portfolio-video-mp4',
				'type'      => 'text',
				'title'     => esc_html__('MP4 Video URL', 'serano'),
				'desc'   	=> esc_html__('URL of the hero section background MP4 video. MP4 format is previewed in IE, Safari and other browsers.', 'serano'),
				'required'	=> array('serano-opt-portfolio-video', '=', true),
			),

			array(
				'id'        => 'serano-opt-portfolio-hero-caption-title',
				'type'      => 'textarea',
				'title'     => esc_html__('Hero Caption Title', 'serano'),
				'desc'  	=> esc_html__('Title displayed over hero section. The hero background image is set in the hero image set in preceding option. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
			),
			
			array(
                'id'        => 'serano-opt-portfolio-hero-caption-subtitle',
                'type'      => 'textarea',
                'title'     => esc_html__('Hero Caption Subtitle', 'serano'),
                'desc'  	=> esc_html__('Subtitle displayed over hero section, underneath the title. Words or phrases separated with Enter will be automatically wrapped in a span element.', 'serano'),
			),
			
			array(
                'id'        => 'serano-opt-portfolio-hero-info-text',
                'type'      => 'textarea',
                'title'     => esc_html__('Hero Info Text', 'serano'),
                'desc'  	=> esc_html__('Additional information about the project displayed underneath title and subtitle.', 'serano'),
			),
									
			array(
                'id'        => 'serano-opt-portfolio-hero-parallax-caption',
                'type'      => 'select',
                'title'     => esc_html__('Enable Parallax Caption', 'serano'),
                'desc'      => esc_html__('Parallax scrolling effect on hero section title and subtitle. This only applies if there is no hero image assigned.', 'serano'),
				'options'   => array(
                    'parallax-scroll-caption'	=> esc_html__('Yes', 'serano'),
                    'normal-scroll-caption' => esc_html__('No', 'serano')
                ),
                'default'   => 'parallax-scroll-caption'
            ),
			/**************************END - HERO SECTION OPTIONS**************************/

		),
	);
	
	$portfolio_options[] = array(
        'title'         => esc_html__('Showcase Grid', 'serano'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-puzzle',
        'desc'          => esc_html__('Options concerning portfolio item thumbnails in showcase grid page template.', 'serano'),
        'fields'        => array(

			array(
				'id'        => 'serano-opt-portfolio-thumb-size',
				'type'      => 'select',
				'title'     => esc_html__('Thumbnail Size', 'serano'),
				'desc'      => esc_html__('Size of the portfolio thumbnail in portfolio showcase grid templates.', 'serano'),
				'options'   => array(
									'small-size' => esc_html__('Small', 'serano'),
									'medium-size' => esc_html__('Medium', 'serano'),
									'large-size' => esc_html__('Large', 'serano')
								),
				'default'   => 'large-size',
			),
			
			array(
				'id'        => 'serano-opt-portfolio-thumb-alignment',
				'type'      => 'select',
				'title'     => esc_html__('Thumbnail Alignment', 'serano'),
				'desc'      => esc_html__('Alignment of the portfolio thumbnail in portfolio showcase grid templates.', 'serano'),
				'options'   => array(
									'align-none' => esc_html__('None', 'serano'),
									'align-top' => esc_html__('Top', 'serano'),
									'align-bottom' 	=> esc_html__('Bottom', 'serano')
								),
				'default'   => 'align-none',
			),

		),
	);

    $metaboxes[] = array(
        'id'            => 'clapat_' . SERANO_THEME_ID . '_portfolio_options',
        'title'         => esc_html__( 'Portfolio Item Options', 'serano'),
        'post_types'    => array( 'serano_portfolio' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
        'sections'      => $portfolio_options,
    );

	return $metaboxes;
  }

}

if( class_exists('Serano\Core\Metaboxes\Meta_Boxes') ){

	$metabox_definitions = array();
	$metabox_definitions = serano_add_metaboxes( $metabox_definitions );
	do_action( 'serano/core/add_metaboxes', $metabox_definitions );
}
