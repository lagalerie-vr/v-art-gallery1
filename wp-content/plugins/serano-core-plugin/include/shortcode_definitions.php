<?php

$content_type = array( 'dark', 'light' );					
$text_align = array('text-align-left', 'text-align-center', 'text-align-right' );


$clapat_shortcodes = array(

	//columns
    'one_half' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'one_third' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'one_fourth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'one_fifth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'one_sixth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'two_third' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'two_fifth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'three_fourth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'three_fifth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'four_fifth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),

    'five_sixth' => array(
        'name' => __('Column', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'serano_core_plugin_text_domain')
    ),
    // end columns
     
	// typo elements
	'title' => array(
        'name' => __('Title', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            'size' => array( 'title' => __('Title Size', 'serano_core_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            ),
            'underline' => array( 'title' => __('Has Underline?', 'serano_core_plugin_text_domain'),
                'desc' => __('If the title is underlined or not', 'serano_core_plugin_text_domain'),
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
			'big' => array( 'title' => __('Big Title?', 'serano_core_plugin_text_domain'),
                'desc' => __('This parameter applies only for H1 headings. If the title is normal or bigger title font size', 'serano_core_plugin_text_domain'),
                'type' => 'select',
                'values' => array('no', 'yes')
            )
        ),
        'has_content' => true,
        'default_content' => __('Title', 'serano_core_plugin_text_domain')
    ),
    
    'button' => array(
        'name' => __('Button', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            "link" => array(    "title" => __("Button Link", 'serano_core_plugin_text_domain'),
                "desc"  => __("URL for the button", 'serano_core_plugin_text_domain'),
                "type"  => "text",
                "default" => "http://"
            ),
			"hover_caption" => array(    "title" => __("Hover Caption", 'serano_core_plugin_text_domain'),
                "desc"  => __("Caption displayed when hovering over", 'serano_core_plugin_text_domain'),
                "type"  => "text",
                "default" =>__("Hover Title", 'serano_core_plugin_text_domain')
            ),
            "target" => array(  "title" => __("Target Window", 'serano_core_plugin_text_domain'),
                "desc" => __("Button link opens in a new or current window", 'serano_core_plugin_text_domain'),
                "type" => "select",
                "values" => array("_blank", "_self")
            ),
            "type" => array( "title" => __("Button type", 'serano_core_plugin_text_domain'),
                "desc" => "",
                "type" => "select",
                "values" => array("normal", "outline")
            ),
			 "rounded" => array( "title" => __("Rounded border", 'serano_core_plugin_text_domain'),
                "desc" => "",
                "type" => "select",
                "values" => array("yes", "no")
            )
        ),
        'has_content' => true,
		'default_content' => __('Button Caption', 'serano_core_plugin_text_domain')
    ),
	
	'text_link' => array(
        'name' => __('Text Link', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            "caption" => array(    "title" => __("Caption", 'serano_core_plugin_text_domain'),
                "desc"  => __("Caption displayed over the link", 'serano_core_plugin_text_domain'),
                "type"  => "text",
                "default" =>__("Read More", 'serano_core_plugin_text_domain')
            ),
			 "link" => array(    "title" => __("Button Link", 'serano_core_plugin_text_domain'),
                "desc"  => __("URL for the button", 'serano_core_plugin_text_domain'),
                "type"  => "text",
                "default" => "http://"
            ),
            "target" => array(  "title" => __("Target Window", 'serano_core_plugin_text_domain'),
                "desc" => __("Button link opens in a new or current window", 'serano_core_plugin_text_domain'),
                "type" => "select",
                "values" => array("_blank", "_self")
            )
        ),
        'has_content' => false
    ),
	
	'marquee_content' => array(
        'name' => __('Marquee Content', 'serano_core_plugin_text_domain'),
        'has_content' => true
    ),
	// end typo elements
    
	'accordion' => array(
        'name' => __('Accordion', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'accordion_item' => array(  'name' => __('Accordion Item', 'serano_core_plugin_text_domain'),
                'attributes' => array(
                    'title' => array( 'title' => __('Title', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => __('Accordion Title', 'serano_core_plugin_text_domain')
                    )
                ),
                'has_content' => true,
                'default_content' => __('Accordion Content Here', 'serano_core_plugin_text_domain')
            )
        ),
        'has_content' => false
    ),
	
    'icon_box' => array(
        'name' => __('Icon Box', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            "icon" => array(  "title" => __("Icon", 'serano_core_plugin_text_domain'),
                "desc" => __("Icon displayed within contact box", 'serano_core_plugin_text_domain'),
                "type" => "icon",
                "default" => ""
            ),
            "title" => array(  "title" => __("Title", 'serano_core_plugin_text_domain'),
                "desc" => __("Title of the contact box", 'serano_core_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            )
        ),
        'require_icon' => true,
        'has_content' => true,
        'default_content' => __('Box content', 'serano_core_plugin_text_domain')
    ),
	
	'clapat_collage' => array(
        'name' => __('Image Collage', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'clapat_collage_image' => array(  'name' => __('Collage Image', 'serano_core_plugin_text_domain'),
                'attributes' => array(
					'thumb_img_url' => array( 'title' => __('Thumbnail Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => __('Image thumbnail included in carousel', 'serano_core_plugin_text_domain'),
                        'type' => 'text',
                        'default' => ''
                    ),
                    'img_url' => array( 'title' => __('Collage Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
					'info' => array( 'title' => __('Collage Image Caption', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	
	'clapat_video' => array(
        'name' => __('Video hosted', 'serano_core_plugin_text_domain'),
        'attributes' => array(
            "cover_img_url" => array(  "title" => __("Cover Image", 'serano_core_plugin_text_domain'),
                "desc" => __("Cover image of the still video", 'serano_core_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            ),
            "webm_url" => array(  "title" => __("Webm URL", 'serano_core_plugin_text_domain'),
                "desc" => __("Url of the video in webm format", 'serano_core_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            ),
			"mp4_url" => array(  "title" => __("Mp4 URL", 'serano_core_plugin_text_domain'),
                "desc" => __("Url of the video in mp4 format", 'serano_core_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            )
        ),
        'require_icon' => false,
        'has_content' => false
    ),
	
	// end elements
    	
    //sliders
    'general_slider' => array(
        'name' => __('Normal Image Slider', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'general_slide' => array(  'name' => __('Slide', 'serano_core_plugin_text_domain'),
                'attributes' => array(
                    'img_url' => array( 'title' => __('Slider Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	
	'carousel_slider' => array(
        'name' => __('Carousel Image Slider', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'carousel_slide' => array(  'name' => __('Slide', 'serano_core_plugin_text_domain'),
                'attributes' => array(
					'img_url' => array( 'title' => __('Slider Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	//end sliders

	'clapat_popup_image' => array(
        'name' => __('Popup Image', 'serano_core_plugin_text_domain'),
        'attributes' => array(
			'thumb_url' => array( 'title' => __('Thumbnail Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
            'img_url' => array( 'title' => __('Zoom Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
        ),
        'has_content' => false
    ),
	
	'clapat_captioned_image' => array(
        'name' => __('Captioned Image', 'serano_core_plugin_text_domain'),
		'attributes' => array(
			'img_url' => array( 'title' => __('Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
			'alt' => array( 'title' => __('ALT attribute', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
			'caption' => array( 'title' => __('Image Caption', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
        ),
        'has_content' => false
    ),
	
	// team members
	'team_members' => array(
        'name' => __('Team Members List', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'team_member' => array(  'name' => __('Team Member', 'serano_core_plugin_text_domain'),
                'attributes' => array(
					'img_url' => array( 'title' => __('Team Member Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'name' => array( 'title' => __('Team Member Name', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
					'position' => array( 'title' => __('Team Member Position', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => true,
                'require_icon' => false
            )
        ),
        'has_content' => false,
    ),
	// end testimonials
	
	// Clients
	'clients' => array(
        'name' => __('Clients List', 'serano_core_plugin_text_domain'),
        'sub_items' => array(
            'client_item' => array(  'name' => __('Client', 'serano_core_plugin_text_domain'),
                'attributes' => array(
                    'img_url' => array( 'title' => __('Client Logo Image URL', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
					'name' => array( 'title' => __('Client Name', 'serano_core_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => true,
                'require_icon' => false
            )
        ),
        'has_content' => false,
    ),
	// end clients
	
);

?>