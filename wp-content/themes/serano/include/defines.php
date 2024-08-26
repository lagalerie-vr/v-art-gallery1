<?php

define('SERANO_THEME_ID', 'serano');
define('SERANO_THEME_OPTIONS', 'clapat_' . SERANO_THEME_ID . '_theme_options');

$serano_social_links = array('Fb' => esc_html__('Facebook', 'serano'),
							'Tw' => esc_html__('Twitter', 'serano'),
							'Be' => esc_html__('Behance', 'serano'),
							'Db' => esc_html__('Dribbble', 'serano'),
							'In' => esc_html__('Instagram', 'serano'),
							'Ld' => esc_html__('Linkedin', 'serano'),
							'Wa' => esc_html__('WhatsApp', 'serano'),
							'Da' => esc_html__('DeviantArt', 'serano'),
							'Dg' => esc_html__('Digg', 'serano'),
							'Fr' => esc_html__('Flickr', 'serano'),
							'Fq' => esc_html__('Foursquare', 'serano'),
							'Gi' => esc_html__('Git', 'serano'),
							'Pn' => esc_html__('Pinterest', 'serano'),
							'Rd' => esc_html__('Reddit', 'serano'),
							'Md' => esc_html__('Medium', 'serano'),
							'Sk' => esc_html__('Skype', 'serano'),
							'Sn' => esc_html__('Snapchat', 'serano'),
							'Sc' => esc_html__('Souncloud', 'serano'),
							'Su' => esc_html__('Stumbleupon', 'serano'),
							'Tk' => esc_html__('TikTok', 'serano'),
							'Tb' => esc_html__('Tumblr', 'serano'),
							'Ya' => esc_html__('Yahoo', 'serano'),
							'Ye' => esc_html__('Yelp', 'serano'),
							'Yt' => esc_html__('Youtube', 'serano'),
							'Vm' => esc_html__('Vimeo', 'serano'),
							'Xg' => esc_html__('Xing', 'serano') );
							
$serano_social_links_icons = array(	'Fb' => 'facebook-f',
									'Tw' => 'x-twitter',
									'Be' => 'behance',
									'Db' => 'dribbble',
									'In' => 'instagram',
									'Ld' => 'linkedin',
									'Wa' => 'whatsapp',
									'Da' => 'deviantart',
									'Dg' => 'digg',
									'Fr' => 'flickr',
									'Fq' => 'foursquare',
									'Gi' => 'git',
									'Pn' => 'pinterest',
									'Rd' => 'reddit',
									'Md' => 'medium',
									'Sk' => 'skype',
									'Sn' => 'snapchat',
									'Sc' => 'soundcloud',
									'Su' => 'stumbleupon',
									'Tk' => 'tiktok',									
									'Tb' => 'tumblr',
									'Ya' => 'yahoo',
									'Ye' => 'yelp',
									'Yt' => 'youtube',
									'Vm' => 'vimeo-square',
									'Xg' => 'xing' );
							
define ( 'SERANO_MAX_SOCIAL_LINKS', 5 );

$serano_slide_transitions = array( 'aqua-light' => get_template_directory_uri() . '/images/displacement/aqua-light.jpg',
								   'concrete-slab' => get_template_directory_uri() . '/images/displacement/concrete-slab.jpg',
								   'crystals' => get_template_directory_uri() . '/images/displacement/crystals.jpg',
								   'diagonal-stripes' => get_template_directory_uri() . '/images/displacement/diagonal-stripes.jpg',
								   'diamonds' => get_template_directory_uri() . '/images/displacement/diamonds.jpg',
								   'drops-grid' => get_template_directory_uri() . '/images/displacement/drops-grid.jpg',
								   'fire-flies' => get_template_directory_uri() . '/images/displacement/fire-flies.jpg',
								   'horizontal-stripes' => get_template_directory_uri() . '/images/displacement/horizontal-stripes.jpg',
								   'kaleidoscope' => get_template_directory_uri() . '/images/displacement/kaleidoscope.jpg',
								   'minecraft' => get_template_directory_uri() . '/images/displacement/minecraft.jpg',
								   'nebula' => get_template_directory_uri() . '/images/displacement/nebula.jpg',
								   'precious-stone.jpg' => get_template_directory_uri() . '/images/displacement/precious-stonejpg',
								   'printer-dots.jpg' => get_template_directory_uri() . '/images/displacement/printer-dots.jpg',
								   'textile-black-and-white.jpg' => get_template_directory_uri() . '/images/displacement/textile-black-and-white.jpg',
								   'white-noise.jpg' => get_template_directory_uri() . '/images/displacement/white-noise.jpg',
								   'zebra-stripes.jpg' => get_template_directory_uri() . '/images/displacement/zebra-stripes.jpg',
								   'zig-zag-stripes.jpg' => get_template_directory_uri() . '/images/displacement/zig-zag-stripes.jpg' );

$serano_slide_transitions_labels = array( 'aqua-light' =>  esc_html__('Aqua Light', 'serano'),
								   'concrete-slab' => esc_html__('Concrete Slab', 'serano'),
								   'crystals' => esc_html__('Crystals', 'serano'),
								   'diagonal-stripes' => esc_html__('Diagonal Stripes', 'serano'),
								   'diamonds' => esc_html__('Diamonds', 'serano'),
								   'drops-grid' => esc_html__('Drops Grid', 'serano'),
								   'fire-flies' => esc_html__('Fire Flies', 'serano'),
								   'horizontal-stripes' => esc_html__('Horizontal Stripes', 'serano'),
								   'kaleidoscope' => esc_html__('Kaleidoscope', 'serano'),
								   'minecraft' => esc_html__('Minecraft', 'serano'),
								   'nebula' => esc_html__('Nebula', 'serano'),
								   'precious-stone.jpg' => esc_html__('Precious Stone', 'serano'),
								   'printer-dots.jpg' => esc_html__('Printer Dots', 'serano'),
								   'textile-black-and-white.jpg' => esc_html__('Textile Black And White', 'serano'),
								   'white-noise.jpg' => esc_html__('White Noise', 'serano'),
								   'zebra-stripes.jpg' => esc_html__('Zebra Stripes', 'serano'),
								   'zig-zag-stripes.jpg' => esc_html__('Zig Zag Stripes', 'serano') );

?>