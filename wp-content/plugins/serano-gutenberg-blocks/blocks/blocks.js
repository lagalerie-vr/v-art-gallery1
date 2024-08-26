/**
 * Serano Shortcodes Gutenberg Blocks
 *
 */
( function( blocks, blockEditor, i18n, element, components ) {
	var el = element.createElement;
	var __ = i18n.__;
	var RichText = blockEditor.RichText;
	var PlainText = blockEditor.PlainText;
	var MediaPlaceHolder = blockEditor.MediaPlaceHolder;
	var TextControl = components.TextControl;
	var TextareaControl = components.TextareaControl;
	var RangeControl = components.RangeControl;
	var ColorPaletteControl = components.ColorPalette;
	var ColorPickerControl = components.ColorPicker;
	var SelectControl = components.SelectControl;
	var InspectorControls = blockEditor.InspectorControls;
	var MediaUpload = blockEditor.MediaUpload;
	var InnerBlocks = blockEditor.InnerBlocks;
	var AlignmentToolbar = blockEditor.AlignmentToolbar;
	var BlockControls = blockEditor.BlockControls;
 	
	/** Utils **/
	function normalizeUndef( x ){
		
		if (typeof x === 'undefined'){
			
			 return '';
		}
		else{
			
			return x;
		}
	}
	
	/** Button **/
	blocks.registerBlockType( 'serano-gutenberg/button', {
		title: __( 'Serano: Button Box', 'serano-gutenberg' ),
		icon: 'editor-removeformatting',
		category: 'serano-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Caption', 'serano-gutenberg' )
			},
			background_color: {
				type: 'string',
				default: ''
			},
			text_color: {
				type: 'string',
				default: ''
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			},
			type: {
				type: 'string',
				default: 'normal'
			},
			rounded: {
				type: 'string',
				default: 'yes'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'button', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colorsBackground = [ 
				{ name: 'Default', color: '#ffffff' }
			];
			
			const colorsText = [ 
				{ name: 'Default', color: '#000000' }
			];
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-button-box is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-editor-removeformatting' } ),
									),
									__('Serano Button Box', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( 'strong', {}, __('Select Background Color:',  'serano-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colorsBackground,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? '' : value } ); 
											},
										} )
									),
									
								el( 'strong', {}, __('Select Text Color:',  'serano-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colorsText,
											value: props.attributes.text_color,
											onChange: ( value ) => { 
												props.setAttributes( { text_color: value === undefined ? '' : value } ); 
											},
										} )
									),
									
								el( SelectControl, {
									label: __('Type', 'serano-gutenberg'),
									value: props.attributes.type,
									options : [
										{ label: __('Normal', 'serano-gutenberg'), value: 'normal' },
										{ label: __('Outline',  'serano-gutenberg'), value: 'outline' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
								el( SelectControl, {
									label: __('Rounded', 'serano-gutenberg'),
									value: props.attributes.rounded,
									options : [
										{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
										{ label: __('No',  'serano-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { rounded: value } ); },
								} ),
								el( SelectControl, {
									label: __('Link Target', 'serano-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
								el( SelectControl, {
									label: __('Has animation', 'serano-gutenberg'),
									value: props.attributes.has_animation,
									options : [
										{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
										{ label: __('No',  'serano-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
								} ),
								el( 'div', { className : 'clapat-range-control' }, 
									el( RangeControl, {
										label: __('Animation delay',  'serano-gutenberg'),
										value: props.attributes.animation_delay,
										onChange: ( value ) => { 
											if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
							),
						),
					)
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[button link="' + props.attributes.link + '" target="' + props.attributes.target + '" type="' + props.attributes.type + '" rounded="' + props.attributes.rounded + '" background_color="' + props.attributes.background_color + '" text_color="' + props.attributes.text_color + '" animation="' + props.attributes.has_animation + '" animation_delay="' + props.attributes.animation_delay + '" extra_class_name="' + addClassName + '"]' + props.attributes.caption + '[/button]'; 
		},
	} );
	
	/** Text Link **/
	blocks.registerBlockType( 'serano-gutenberg/button-link', {
		title: __( 'Serano: Button Link', 'serano-gutenberg' ),
		icon: 'admin-links',
		category: 'serano-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Read More', 'serano-gutenberg' )
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			},
			position: {
				type: 'string',
				default: 'left'
			},
			type: {
				type: 'string',
				default: 'arrow'
			},
			size: {
				type: 'string',
				default: 'small-btn'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'button', 'serano-gutenberg' ), __( 'link', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-button-link is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-admin-links' } ),
									),
									__('Serano Button Link', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Link Target', 'serano-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
								el( SelectControl, {
									label: __('Position', 'serano-gutenberg'),
									value: props.attributes.position,
									options: [
										{ label: 'Left', value: 'left' },
										{ label: 'Right', value: 'right' },
									],
									onChange: ( value ) => { props.setAttributes( { position: value } ); },
								} ),
								el( SelectControl, {
									label: __('Type', 'serano-gutenberg'),
									value: props.attributes.type,
									options: [
										{ label: 'Arrow', value: 'arrow' },
										{ label: 'Bullet', value: 'bullet' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
								el( SelectControl, {
									label: __('Size', 'serano-gutenberg'),
									value: props.attributes.size,
									options: [
										{ label: 'Small', value: 'small-btn' },
										{ label: 'Large', value: 'large-btn' },
									],
									onChange: ( value ) => { props.setAttributes( { size: value } ); },
								} ),
								el( SelectControl, {
									label: __('Has animation', 'serano-gutenberg'),
									value: props.attributes.has_animation,
									options : [
										{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
										{ label: __('No',  'serano-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
								} ),
								el( 'div', { className : 'clapat-range-control' }, 
									el( RangeControl, {
										label: __('Animation delay',  'serano-gutenberg'),
										value: props.attributes.animation_delay,
										onChange: ( value ) => { 
											if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
							),
							
						),
					)
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[button_link link="' + props.attributes.link + '" target="' + props.attributes.target + '" caption="' + props.attributes.caption + '" position="' + props.attributes.position + '" type="' + props.attributes.type + '" size="' + props.attributes.size + '" animation="' + props.attributes.has_animation + '" animation_delay="' + props.attributes.animation_delay + '" extra_class_name="' + addClassName + '"][/button_link]'; 
		},
	} );
	
	/** Marquee Content **/
	blocks.registerBlockType( 'serano-gutenberg/marquee-content', {
		title: __( 'Serano: Marquee Content', 'serano-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'serano-block-category',
		attributes: {
			direction: {
				type: 'string',
				default: 'fw'
			},
			caption: {
				type: 'string',
				default: 'Marquee text'
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'marquee text', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
					el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-marquee-text is-large'},
						el( 'div', { className: 'components-placeholder__label' }, 
							el( 'span', { className: 'block-editor-block-icon has-colors' },
								el( 'span', { className: 'dashicon dashicons dashicons-editor-textcolor' } ),
								),
								__('Serano Marquee Content', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Direction', 'serano-gutenberg'),
									value: props.attributes.direction,
									options : [
										{ label: __('Forward', 'serano-gutenberg'), value: 'fw' },
										{ label: __('Backward',  'serano-gutenberg'), value: 'bw' },
									],
									onChange: ( value ) => { props.setAttributes( { direction: value } ); },
								} ),
							),
						),
					
					)
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[marquee_content direction="' + props.attributes.direction + '" extra_class_name="' + addClassName + '"]' + props.attributes.caption + '[/marquee_content]'; 
		},			
			
	} );
	
	/** Moving Title **/
	blocks.registerBlockType( 'serano-gutenberg/moving-title', {
		title: __( 'Serano: Moving Title', 'serano-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'serano-block-category',
		attributes: {
			direction: {
				type: 'string',
				default: 'title-moving-forward'
			},
			caption: {
				type: 'string',
				default: 'Moving text'
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'moving title', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
					el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-moving-title is-large'},
						el( 'div', { className: 'components-placeholder__label' }, 
							el( 'span', { className: 'block-editor-block-icon has-colors' },
								el( 'span', { className: 'dashicon dashicons dashicons-editor-textcolor' } ),
								),
								__('Serano Moving Title', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Direction', 'serano-gutenberg'),
									value: props.attributes.direction,
									options : [
										{ label: __('Forward', 'serano-gutenberg'), value: 'title-moving-forward' },
										{ label: __('Backward',  'serano-gutenberg'), value: 'title-moving-backward' },
									],
									onChange: ( value ) => { props.setAttributes( { direction: value } ); },
								} ),
							),
						),
					)
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[moving_title direction="' + props.attributes.direction + '" extra_class_name="' + addClassName + '"]' + props.attributes.caption + '[/moving_title]'; 
		},			
			
	} );

	/** Moving Gallery **/
	const template_clapat_moving_gallery = [
	  [ 'serano-gutenberg/moving-gallery-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/moving-gallery', {
		title: __( 'Serano: Moving Gallery', 'serano-gutenberg' ),
		icon: 'images-alt2',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/moving-gallery-image'],
		attributes: {
			direction: {
				type: 'string',
				default: 'fw-gallery'
			},
			randomize: {
				type: 'string',
				default: 'no'
			}
		}, 
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'moving gallery', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-moving-gallery is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-images-alt2' } ),
									),
									__('Serano Moving Gallery', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/moving-gallery-image'], template: template_clapat_moving_gallery} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Direction', 'serano-gutenberg'),
										value: props.attributes.direction,
										options : [
											{ label: __('Forward', 'serano-gutenberg'), value: 'fw-gallery' },
											{ label: __('Backward', 'serano-gutenberg'), value: 'bw-gallery' },
										],
										onChange: ( value ) => { props.setAttributes( { direction: value } ); },
									} ),
									el( SelectControl, {
										label: __('Randomize gallery images size?', 'serano-gutenberg'),
										value: props.attributes.randomize,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { randomize: value } ); },
									} )
								),
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'moving-gallery';
			blockClasses += ' ' + props.attributes.direction;
			if( props.attributes.randomize !== 'no' ) { blockClasses += ' random-sizes'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, 
						el( 'ul', { className: 'wrapper-gallery' }, InnerBlocks.Content() )
					);
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/moving-gallery-image', {
		title: __( 'Serano: Moving Gallery Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/moving-gallery' ],

		attributes: {
			gallery_image: {
				type: 'string',
				default: ''
			},
			gallery_image_id: {
				type: 'number',
			}
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					gallery_image: media.url,
					gallery_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.gallery_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.gallery_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.gallery_image_id ? i18n.__( 'Upload Gallery Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.gallery_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Gallery Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				)
				
			];
		},

		save: function( props ) {
			
			return '[clapat_moving_gallery_image img_url="' + props.attributes.gallery_image + '" img_id="' + props.attributes.gallery_image_id + '"][/clapat_moving_gallery_image]'; 

		},
	} );
	
	/** Horizontal Scrolling Panels **/
	const template_clapat_scrolling_panels = [
	  [ 'serano-gutenberg/scrolling-panels-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/scrolling-panels', {
		title: __( 'Serano: Horizontal Scrolling Panels', 'serano-gutenberg' ),
		icon: 'slides',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/scrolling-panels-image'],
		attributes: {
			
			aspect_ratio: {
				type: 'number',
				default: 0.4
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'horizontal', 'serano-gutenberg' ), __( 'scrolling panels', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-scrolling-panels is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-slides' } ),
									),
									__('Serano Horizontal Scrolling Panels', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/scrolling-panels-image'], template: template_clapat_scrolling_panels} ),
							
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Aspect Ratio',  'serano-gutenberg'),
											value: props.attributes.aspect_ratio,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { aspect_ratio: value } ); 
											},
											type: 'number',
											step: 0.1,
											min: 0.4,
											max: 1
										} ) ),
								),
								
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'panels';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses, 'data-widthratio': props.attributes.aspect_ratio }, 
						el( 'div', { className: 'panels-container' }, InnerBlocks.Content() )
					);
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/scrolling-panels-image', {
		title: __( 'Serano: Horizontal Scrolling Panels Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/scrolling-panels' ],

		attributes: {
			panel_image: {
				type: 'string',
				default: ''
			},
			panel_image_id: {
				type: 'number',
			}
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					panel_image: media.url,
					panel_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.panel_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.panel_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.panel_image_id ? i18n.__( 'Upload Panel Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.panel_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Panel Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				)
				
			];
		},

		save: function( props ) {
			
			return '[clapat_scrolling_panels_image img_url="' + props.attributes.panel_image + '" img_id="' + props.attributes.panel_image_id + '"][/clapat_scrolling_panels_image]';

		},
	} );
	
	/** Zoom Gallery **/
	const template_clapat_zoom_gallery = [
	  [ 'serano-gutenberg/zoom-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/zoom-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/zoom-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/zoom-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/zoom-gallery-image', {} ] // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/zoom-gallery', {
		title: __( 'Serano: Zoom Gallery', 'serano-gutenberg' ),
		icon: 'welcome-view-site',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/zoom-gallery-image'],
		attributes: {
			
			aspect_ratio: {
				type: 'number',
				default: 0.4
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'zoom', 'serano-gutenberg' ), __( 'gallery', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-zoom-gallery is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-welcome-view-site' } ),
									),
									__('Serano Zoom Gallery', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/zoom-gallery-image'], template: template_clapat_zoom_gallery} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Aspect Ratio',  'serano-gutenberg'),
											value: props.attributes.aspect_ratio,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { aspect_ratio: value } ); 
											},
											type: 'number',
											step: 0.1,
											min: 0.4,
											max: 1
										} ) ),
								),
								
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'zoom-gallery';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			let thumb_el = el( 'div', { className: 'zoom-wrapper-thumb' } );
			return el( 'div', { className: blockClasses }, 
						el( 'ul', { className: 'zoom-wrapper-gallery', 'data-heightratio': props.attributes.aspect_ratio }, InnerBlocks.Content() ),
						thumb_el
					);
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/zoom-gallery-image', {
		title: __( 'Serano: Zoom Gallery Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/zoom-gallery' ],

		attributes: {
			gallery_image: {
				type: 'string',
				default: ''
			},
			gallery_image_id: {
				type: 'number',
			},
			zoom: {
				type: 'string',
				default: 'no'
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					gallery_image: media.url,
					gallery_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.gallery_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.gallery_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.gallery_image_id ? i18n.__( 'Upload Gallery Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.gallery_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Gallery Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					el( SelectControl,
					{
						value: props.attributes.zoom,
						className: 'clapat-inline-content',
						label: __('Zoom to fullscreen',  'serano-gutenberg'),
						options : [
									{ label: __('No', 'serano-gutenberg'), value: 'no' },
									{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
								],
						onChange: ( value ) => { props.setAttributes( { zoom: value } ); },
					}),

				)
				
			];
		},

		save: function( props ) {
			
			return '[clapat_zoom_gallery_image zoom="' + props.attributes.zoom + '" img_url="' + props.attributes.gallery_image + '" img_id="' + props.attributes.gallery_image_id + '"][/clapat_zoom_gallery_image]';

		},
	} );
	
	/** Pinned Gallery **/
	const template_clapat_pinned_gallery = [
	  [ 'serano-gutenberg/pinned-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/pinned-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/pinned-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/pinned-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/pinned-gallery-image', {} ] // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/pinned-gallery', {
		title: __( 'Serano: Pinned Gallery', 'serano-gutenberg' ),
		icon: 'images-alt',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/pinned-gallery-image'],
		attributes: {
			randomize: {
				type: 'string',
				default: 'no'
			}
		}, 
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'pinned', 'serano-gutenberg' ), __( 'gallery', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-pinned-gallery is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-images-alt' } ),
									),
									__('Serano Pinned Gallery', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/pinned-gallery-image'], template: template_clapat_pinned_gallery} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Randomize gallery image rotation?', 'serano-gutenberg'),
										value: props.attributes.randomize,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { randomize: value } ); },
									} )
								),
							),
							
						);

		},

		save: function( props ) {
			
			let blockClasses = 'pinned-gallery';
			if( props.attributes.randomize !== 'no' ) { blockClasses += ' random-img-ratation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/pinned-gallery-image', {
		title: __( 'Serano: Pinned Gallery Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/pinned-gallery' ],

		attributes: {
			gallery_image: {
				type: 'string',
				default: ''
			},
			gallery_image_id: {
				type: 'number',
			}
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					gallery_image: media.url,
					gallery_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.gallery_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.gallery_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.gallery_image_id ? i18n.__( 'Upload Gallery Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.gallery_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Gallery Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				)
				
			];
		},

		save: function( props ) {
			
			return '[clapat_pinned_gallery_image img_url="' + props.attributes.gallery_image + '" img_id="' + props.attributes.gallery_image_id + '"][/clapat_pinned_gallery_image]';

		},
	} );
	
	/** Reveal Gallery **/
	blocks.registerBlockType( 'serano-gutenberg/reveal-gallery', {
		title: __( 'Serano: Reveal Gallery', 'serano-gutenberg' ),
		icon: 'tickets-alt',
		category: 'serano-block-category',
		
		attributes: {
			left_image: {
				type: 'string',
				default: ''
			},
			left_image_id: {
				type: 'number',
			},
			center_image: {
				type: 'string',
				default: ''
			},
			center_image_id: {
				type: 'number',
			},
			right_image: {
				type: 'string',
				default: ''
			},
			right_image_id: {
				type: 'number',
			},
		},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'reveal', 'serano-gutenberg' ), __( 'gallery', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectLeftImage = function( media ) {
				return props.setAttributes( {
					left_image: media.url,
					left_image_id: media.id,
				} );
			};
			var onSelectCenterImage = function( media ) {
				return props.setAttributes( {
					center_image: media.url,
					center_image_id: media.id,
				} );
			};
			var onSelectRightImage = function( media ) {
				return props.setAttributes( {
					right_image: media.url,
					right_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-reveal-gallery is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-tickets-alt' } ),
						),
						__('Serano Reveal Gallery', 'serano-gutenberg' ) ),
				
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectLeftImage,
							type: 'image',
							value: props.attributes.left_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.left_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.left_image_id ? i18n.__( 'Upload Left Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.left_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Left Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectCenterImage,
							type: 'image',
							value: props.attributes.center_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.center_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.center_image_id ? i18n.__( 'Upload Center Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.center_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Center (Fixed) Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectRightImage,
							type: 'image',
							value: props.attributes.right_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.right_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.right_image_id ? i18n.__( 'Upload Right Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.right_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Right Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					/*
					 * InspectorControls lets you add controls to the Block sidebar.
					 */
					el( InspectorControls, {},
					
						el( 'div', { className: 'components-panel__body is-opened' }, 
							el( SelectControl, {
								label: __('Animation Type', 'serano-gutenberg'),
								value: props.attributes.animation_type,
								options: [
									{ label: 'None', value: 'none' },
									{ label: 'Cover', value: 'cover' },
									{ label: 'Fade', value: 'fade' }
								],
								onChange: ( value ) => { props.setAttributes( { animation_type: value } ); },
							} ),
						
							el( 'div', { className : 'clapat-range-control' }, 
								el( RangeControl, {
									label: __('Animation delay',  'serano-gutenberg'),
									value: props.attributes.animation_delay,
									onChange: ( value ) => { 
										if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
							
							el( SelectControl, {
								label: __('Has Parallax', 'serano-gutenberg'),
								value: props.attributes.parallax,
								options: [
									{ label: 'Yes', value: 'yes' },
									{ label: 'No', value: 'no' }
								],
								onChange: ( value ) => { props.setAttributes( { parallax: value } ); },
							} ),
							
							el( TextControl, {
								label: __('Start Parallax. A value between 0 and 1 representing the top parallax translation.', 'serano-gutenberg'),
								type: "text",
								value: props.attributes.parallax_start,
								onChange: ( value ) => { props.setAttributes( { parallax_start: value } ); },
							} ),
							
							el( TextControl, {
								label: __('End Parallax. A value between 0 and 1 representing the bottom parallax translation.', 'serano-gutenberg'),
								type: "text",
								value: props.attributes.parallax_end,
								onChange: ( value ) => { props.setAttributes( { parallax_end: value } ); },
							} ),
							
						),
						
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_reveal_gallery left_img_url="' + props.attributes.left_image + '" left_img_id="' + props.attributes.left_image_id + '" center_img_url="' + props.attributes.center_image + '" center_img_id="' + props.attributes.center_image_id + '" right_img_url="' + props.attributes.right_image + '" right_img_id="' + props.attributes.right_image_id + '" extra_class_name="' + addClassName + '"][/clapat_reveal_gallery]'; 

		},
	} );
	
	/** Slowed Text Pin **/
	const template_clapat_slowed_text_pin_gallery = [
	  [ 'serano-gutenberg/slowed-text-pin-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/slowed-text-pin-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/slowed-text-pin-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/slowed-text-pin-gallery-image', {} ], // [ blockName, attributes ]
	  [ 'serano-gutenberg/slowed-text-pin-gallery-image', {} ] // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/slowed-text-pin-gallery', {
		title: __( 'Serano: Slowed Text Pin Gallery', 'serano-gutenberg' ),
		icon: 'welcome-widgets-menus',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/slowed-text-pin-gallery-image'],
		
		attributes: {
			pre_title_text: {
				type: 'string',
				default: ''
			},
			title_text: {
				type: 'string',
				default: ''
			},
			subtitle_text: {
				type: 'string',
				default: ''
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'slowed text pin', 'serano-gutenberg' ), __( 'gallery', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slowed-text-pin-gallery is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-welcome-widgets-menus' } ),
									),
									__('Serano Slowed Text Pin Gallery', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/slowed-text-pin-gallery-image'], template: template_clapat_slowed_text_pin_gallery} ),
							
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' },
								
									el( TextareaControl, {
										label: __('Pre Title', 'serano-gutenberg'),
										value: props.attributes.pre_title_text,
										onChange: ( value ) => { props.setAttributes( { pre_title_text: value } ); },
									} ),
									
									el( TextareaControl, {
										label: __('Title', 'serano-gutenberg'),
										value: props.attributes.title_text,
										onChange: ( value ) => { props.setAttributes( { title_text: value } ); },
									} ),
									
									el( TextareaControl, {
										label: __('Sub Title', 'serano-gutenberg'),
										value: props.attributes.subtitle_text,
										onChange: ( value ) => { props.setAttributes( { subtitle_text: value } ); },
									} ),
									
								),
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'slowed-pin';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, 
						el( 'div', { className: 'slowed-text' },
							el( 'h5', {}, props.attributes.pre_title_text ),
							el( 'h1', { className: 'big-title' }, props.attributes.title_text ),
							el( 'hr' ),
							el( 'h5', {}, props.attributes.subtitle_text ),
						),
						el( 'div', { className: 'slowed-images' }, InnerBlocks.Content() )
					);
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/slowed-text-pin-gallery-image', {
		title: __( 'Serano: Slowed Text Pin Gallery Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/slowed-text-pin-gallery' ],

		attributes: {
			gallery_image: {
				type: 'string',
				default: ''
			},
			gallery_image_id: {
				type: 'number',
			}
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					gallery_image: media.url,
					gallery_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.gallery_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.gallery_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.gallery_image_id ? i18n.__( 'Upload Gallery Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.gallery_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Gallery Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				)
				
			];
		},

		save: function( props ) {
			
			return '[clapat_slowed_text_pin_image img_url="' + props.attributes.gallery_image + '" img_id="' + props.attributes.gallery_image_id + '"][/clapat_slowed_text_pin_image]';

		},
	} );
	
	/** Accordion **/
	const template_clapat_accordion = [
	  [ 'serano-gutenberg/accordion-item', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/accordion', {
		title: __( 'Serano: Accordion', 'serano-gutenberg' ),
		icon: 'editor-justify',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/accordion-item'],
		attributes: {
			type: {
				type: 'string',
				default: 'small-acc'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			}
		}, 

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'accordion', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-accordion is-large'},
							el( 'div', { className: 'components-placeholder__label' }, 
								el( 'span', { className: 'block-editor-block-icon has-colors' },
									el( 'span', { className: 'dashicon dashicons dashicons-editor-justify' } ),
								),
								__('Serano Accordion', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/accordion-item'], template: template_clapat_accordion} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Type', 'serano-gutenberg'),
										value: props.attributes.type,
										options : [
											{ label: __('Small Accordion', 'serano-gutenberg'), value: 'small-acc' },
											{ label: __('Big Accordion',  'serano-gutenberg'), value: 'bigger-acc' },
										],
										onChange: ( value ) => { props.setAttributes( { type: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has animation', 'serano-gutenberg'),
										value: props.attributes.has_animation,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
									} ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Animation delay',  'serano-gutenberg'),
											value: props.attributes.animation_delay,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { animation_delay: value } ); 
											},
											type: 'number',
											step: 50,
											min: 0,
											max: 1000
										} ) ),
								),
							),
						)	

		},

		save: function( props ) {
			
			let blockClasses = 'accordion';
			blockClasses += ' ' + props.attributes.type;
			if( props.attributes.has_animation !== 'no' ) { blockClasses += ' has-animation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'dl', { className: blockClasses, 'data-delay': props.attributes.animation_delay }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/accordion-item', {
		title: __( 'Serano: Accordion Item', 'serano-gutenberg' ),
		icon: 'editor-justify',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/accordion' ],

		attributes: {
			title: {
				type: 'string',
				default: __( 'Accordion Title. Click to edit it.', 'serano-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'serano-gutenberg')
			}
		},

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
				),
				
			];
		},

		save: function( props ) {
			
			return '[accordion_item title="' + props.attributes.title + '"]' + props.attributes.content + '[/accordion_item]'; 

		},
	} );
	
	/** Icon Box **/
	blocks.registerBlockType( 'serano-gutenberg/icon-box', {
		title: __( 'Serano: Icon Box', 'serano-gutenberg' ),
		icon: 'admin-generic',
		category: 'serano-block-category',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-envelope', 'serano-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Icon Box Title. Click to edit it.', 'serano-gutenberg')
			},
			type: {
				type: 'string',
				default: 'inline-boxes'
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'serano-gutenberg')
			},
			
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ),  __( 'icon box', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-icon-box is-large'},
						el( 'div', { className: 'components-placeholder__label' }, 
							el( 'span', { className: 'block-editor-block-icon has-colors' },
								el( 'span', { className: 'dashicon dashicons dashicons-admin-generic' } ),
								),
								__('Serano Icon Box', 'serano-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Type', 'serano-gutenberg'),
									value: props.attributes.type,
									options : [
										{ label: __('Inline', 'serano-gutenberg'), value: 'inline-boxes' },
										{ label: __('Block',  'serano-gutenberg'), value: 'block-boxes' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
							),
						),
					
				),
				 
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[icon_box icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" type="' + props.attributes.type + '" extra_class_name="' + addClassName + '"]' + props.attributes.content + '[/icon_box]';
		},
	} );
	
	/** Image Collage **/
	const template_clapat_collage = [
	  [ 'serano-gutenberg/collage-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/collage', {
		title: __( 'Serano: Collage', 'serano-gutenberg' ),
		icon: 'layout',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/collage-image'],
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'collage', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-collage is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-slides' } ),
									),
									__('Serano Collage', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/collage-image'], template: template_clapat_collage} )
						);

		},

		save: function( props ) {
			
			let blockClasses = 'justified-grid';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/collage-image', {
		title: __( 'Serano: Collage Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/collage' ],

		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
			info: {
				type: 'string',
				default: __( 'Caption Text', 'serano-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Thumbnail Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Thumbnail Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Popup Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Full Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'serano-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
						
						el( TextControl, {
							label: __( 'Collage Image Info', 'serano-gutenberg' ),
							value: props.attributes.info,
							onChange: ( value ) => { props.setAttributes( { info: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[clapat_collage_image thumb_img_url="' + props.attributes.thumb_image + '" img_url="' + props.attributes.full_image + '" alt="' + props.attributes.alt + '" info="' + props.attributes.info + '"][/clapat_collage_image]'; 

		},
	} );
	
	/** Image Carousel **/
	const template_clapat_image_carousel = [
	  [ 'serano-gutenberg/carousel-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/carousel', {
		title: __( 'Serano: Image Carousel', 'serano-gutenberg' ),
		icon: 'slides',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/carousel-image'],
		attributes: {
			size: {
				type: 'string',
				default: 'looped-carousel'
			},
			cursor_type: {
				type: 'string',
				default: 'light-cursor'
			},
			autocenter: {
				type: 'string',
				default: 'yes'
			},
			enable_dots_nav: {
				type: 'string',
				default: 'yes'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'carousel', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	[
							el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slider is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-slides' } ),
									),
									__('Serano Carousel', 'serano-gutenberg' ) ),
								el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/carousel-image'], template: template_clapat_image_carousel} )
							),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Size', 'serano-gutenberg'),
										value: props.attributes.size,
										options : [
											{ label: __('Big', 'serano-gutenberg'), value: 'looped-carousel' },
											{ label: __('Small',  'serano-gutenberg'), value: 'small-looped-carousel' },
										],
										onChange: ( value ) => { props.setAttributes( { size: value } ); },
									} ),
									el( SelectControl, {
										label: __('Cursor Type', 'serano-gutenberg'),
										value: props.attributes.cursor_type,
										options : [
											{ label: __('Light', 'serano-gutenberg'), value: 'light-cursor' },
											{ label: __('Dark',  'serano-gutenberg'), value: 'dark-cursor' },
										],
										onChange: ( value ) => { props.setAttributes( { cursor_type: value } ); },
									} ),
									el( SelectControl, {
										label: __('Autocenter', 'serano-gutenberg'),
										value: props.attributes.autocenter,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { autocenter: value } ); },
									} ),
									el( SelectControl, {
										label: __('Enable Dots Nav', 'serano-gutenberg'),
										value: props.attributes.enable_dots_nav,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { enable_dots_nav: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has animation', 'serano-gutenberg'),
										value: props.attributes.has_animation,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
									} ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Animation delay',  'serano-gutenberg'),
											value: props.attributes.animation_delay,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { animation_delay: value } ); 
											},
											type: 'number',
											step: 50,
											min: 0,
											max: 1000
										} ) ),
								),
							),
						];
		},

		save: function( props ) {
			
			let blockClasses = 'clapat-slider-wrapper content-slider';
			blockClasses += ' ' + props.attributes.cursor_type;
			blockClasses += ' ' + props.attributes.size;
			if( props.attributes.autocenter !== 'no' ) { blockClasses += ' autocenter'; }
			if( props.attributes.enable_dots_nav !== 'yes' ) { blockClasses += ' disabled-slider-dots'; }
			if( props.attributes.has_animation !== 'no' ) { blockClasses += ' has-animation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			let viewport_el = el( 'div', { className: 'clapat-slider-viewport' }, InnerBlocks.Content() );
			let inner_el = el( 'div', { className: 'clapat-slider' }, viewport_el );
			
			let button_next_el =  el( 'div', { className: 'clapat-button-next slider-button-next' } );
			let button_prev_el =  el( 'div', { className: 'clapat-button-prev slider-button-prev' } );
			let dots_nav =  el( 'div', { className: 'clapat-pagination' } );
			let slider_controls =  el( 'div', { className: 'clapat-controls' }, button_next_el, button_prev_el, dots_nav );
			
			return el( 'div', { 
								className: blockClasses,
								'data-delay': props.attributes.animation_delay
							}, inner_el, slider_controls );
			
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/carousel-image', {
		title: __( 'Serano: Carousel Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/carousel' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Carousel Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Carousel Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'serano-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[carousel_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/carousel_slide]'; 

		},
	} );
	
	/** Image Slider **/
	const template_clapat_image_slider = [
	  [ 'serano-gutenberg/slider-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'serano-gutenberg/slider', {
		title: __( 'Serano: Image Slider', 'serano-gutenberg' ),
		icon: 'images-alt2',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/slider-image'],
		
		attributes: {
			cursor_type: {
				type: 'string',
				default: 'light-cursor'
			},
			autocenter: {
				type: 'string',
				default: 'yes'
			},
			enable_dots_nav: {
				type: 'string',
				default: 'yes'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'slider', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slider is-large'},
							el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-images-alt2' } ),
									),
									__('Serano Slider', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/slider-image'], template: template_clapat_image_slider} ),
							
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Cursor Type', 'serano-gutenberg'),
										value: props.attributes.cursor_type,
										options : [
											{ label: __('Light', 'serano-gutenberg'), value: 'light-cursor' },
											{ label: __('Dark',  'serano-gutenberg'), value: 'dark-cursor' },
										],
										onChange: ( value ) => { props.setAttributes( { cursor_type: value } ); },
									} ),
									el( SelectControl, {
										label: __('Autocenter', 'serano-gutenberg'),
										value: props.attributes.autocenter,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { autocenter: value } ); },
									} ),
									el( SelectControl, {
										label: __('Enable Dots Nav', 'serano-gutenberg'),
										value: props.attributes.enable_dots_nav,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { enable_dots_nav: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has animation', 'serano-gutenberg'),
										value: props.attributes.has_animation,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
									} ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Animation delay',  'serano-gutenberg'),
											value: props.attributes.animation_delay,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { animation_delay: value } ); 
											},
											type: 'number',
											step: 50,
											min: 0,
											max: 1000
										} ) ),
									
								),
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'clapat-slider-wrapper content-slider';
			blockClasses += ' ' + props.attributes.cursor_type;
			if( props.attributes.autocenter !== 'no' ) { blockClasses += ' autocenter'; }
			if( props.attributes.enable_dots_nav !== 'yes' ) { blockClasses += ' disabled-slider-dots'; }
			if( props.attributes.has_animation !== 'no' ) { blockClasses += ' has-animation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			let viewport_el = el( 'div', { className: 'clapat-slider-viewport' }, InnerBlocks.Content() );
			let inner_el = el( 'div', { className: 'clapat-slider' }, viewport_el );
			
			let button_next_el =  el( 'div', { className: 'clapat-button-next slider-button-next' } );
			let button_prev_el =  el( 'div', { className: 'clapat-button-prev slider-button-prev' } );
			let dots_nav =  el( 'div', { className: 'clapat-pagination' } );
			let slider_controls =  el( 'div', { className: 'clapat-controls' }, button_next_el, button_prev_el, dots_nav );
			
			return el( 'div', { 
								className: blockClasses,
								'data-delay': props.attributes.animation_delay
							}, inner_el, slider_controls );
				
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/slider-image', {
		title: __( 'Serano: Slider Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/slider' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Slider Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Slider Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'serano-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[general_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/general_slide]'; 

		},
	} );
	
	/** Counter **/
	blocks.registerBlockType( 'serano-gutenberg/counter', {
		title: __( 'Serano: Counter', 'serano-gutenberg' ),
		icon: 'performance',
		category: 'serano-block-category',
		
		attributes: {
			data_start: {
				type: 'string',
				default: '1000'
			},
			data_target: {
				type: 'string',
				default: '3000'
			},
			text_size: {
				type: 'string',
				default: 'h1'
			},
			animation_type: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'counter', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-counter is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-performance' } ),
						),
						__('Serano Counter', 'serano-gutenberg' ) ),
					
					el ( props.attributes.text_size, { className: 'clapat-inline-value' }, props.attributes.data_start ),
					
					/*
					 * InspectorControls lets you add controls to the Block sidebar.
					 */
					el( InspectorControls, {},
						el( 'div', { className: 'components-panel__body is-opened' },
						
							el( TextControl, {
								label: __('Start Value', 'serano-gutenberg'),
								type: "number",
								value: props.attributes.data_start,
								onChange: ( value ) => { props.setAttributes( { data_start: value } ); },
							} ),
							
							el( TextControl, {
								label: __('Target Value', 'serano-gutenberg'),
								type: "number",
								value: props.attributes.data_target,
								onChange: ( value ) => { props.setAttributes( { data_target: value } ); },
							} ),
							
							el( SelectControl, {
								label: __('Text Size', 'serano-gutenberg'),
								value: props.attributes.text_size,
								options: [
									{ label: 'H1', value: 'h1' },
									{ label: 'H2', value: 'h2' },
									{ label: 'H3', value: 'h3' },
									{ label: 'H4', value: 'h4' },
									{ label: 'H5', value: 'h5' },
									{ label: 'H6', value: 'h6' },
								],
								onChange: ( value ) => { props.setAttributes( { text_size: value } ); },
							} ),
							
							el( SelectControl, {
								label: __('Has Animation', 'serano-gutenberg'),
								value: props.attributes.animation_type,
								options: [
									{ label: 'Yes', value: 'yes' },
									{ label: 'No', value: 'no' }
								],
								onChange: ( value ) => { props.setAttributes( { animation_type: value } ); },
							} ),
						
							el( 'div', { className : 'clapat-range-control' }, 
								el( RangeControl, {
									label: __('Animation delay',  'serano-gutenberg'),
									value: props.attributes.animation_delay,
									onChange: ( value ) => { 
										if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
						),
					),

				),
				
			];
		},

		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_counter data_start="' + props.attributes.data_start + '" data_target="' + props.attributes.data_target + '" text_size="' + props.attributes.text_size + '" animation="' + props.attributes.animation_type + '" animation_delay="' + props.attributes.animation_delay + '" extra_class_name="' + addClassName + '"][/clapat_counter]';

		},
	} );
	
	/** Parallax Image **/
	blocks.registerBlockType( 'serano-gutenberg/parallax-image', {
		title: __( 'Serano: Parallax Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		
		attributes: {
			parallax_image: {
				type: 'string',
				default: ''
			},
			parallax_image_id: {
				type: 'number',
			},
			parallax_text: {
				type: 'string',
				default: ''
			},
			parallax_text_size: {
				type: 'string',
				default: 'h1'
			},
			caption_alignment: {
				type: 'string',
				default: 'text-align-center'
			},
			animation_type: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'parallax', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					parallax_image: media.url,
					parallax_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-parallax-image is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-format-image' } ),
						),
						__('Serano Parallax Image', 'serano-gutenberg' ) ),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.parallax_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.parallax_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.parallax_image_id ? i18n.__( 'Upload Parallax Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.parallax_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Parallax Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					/*
					 * InspectorControls lets you add controls to the Block sidebar.
					 */
					el( InspectorControls, {},
						el( 'div', { className: 'components-panel__body is-opened' },
						
							el( TextareaControl, {
								label: __('Overlay Caption', 'serano-gutenberg'),
								value: props.attributes.parallax_text,
								onChange: ( value ) => { props.setAttributes( { parallax_text: value } ); },
							} ),
							
							el( SelectControl, {
								label: __('Caption Size', 'serano-gutenberg'),
								value: props.attributes.parallax_text_size,
								options: [
									{ label: 'H1', value: 'h1' },
									{ label: 'H2', value: 'h2' },
									{ label: 'H3', value: 'h3' },
									{ label: 'H4', value: 'h4' },
									{ label: 'H5', value: 'h5' },
									{ label: 'H6', value: 'h6' },
								],
								onChange: ( value ) => { props.setAttributes( { parallax_text_size: value } ); },
							} ),
							
							el( SelectControl, {
								label: __('Caption Alignment', 'serano-gutenberg'),
								value: props.attributes.caption_alignment,
								options: [
									{ label: 'Center', value: 'text-align-center' },
									{ label: 'Left', value: 'text-align-left' },
								],
								onChange: ( value ) => { props.setAttributes( { caption_alignment: value } ); },
							} ),
							
							el( SelectControl, {
								label: __('Has Animation', 'serano-gutenberg'),
								value: props.attributes.animation_type,
								options: [
									{ label: 'Yes', value: 'yes' },
									{ label: 'No', value: 'no' }
								],
								onChange: ( value ) => { props.setAttributes( { animation_type: value } ); },
							} ),
						
							el( 'div', { className : 'clapat-range-control' }, 
								el( RangeControl, {
									label: __('Animation delay',  'serano-gutenberg'),
									value: props.attributes.animation_delay,
									onChange: ( value ) => { 
										if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
						),
					),

				),
				
			];
		},

		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_parallax_image img_url="' + props.attributes.parallax_image + '" img_id="' + props.attributes.parallax_image_id + '" text_size="' + props.attributes.parallax_text_size + '" caption_alignment="' + props.attributes.caption_alignment + '" animation="' + props.attributes.animation_type + '" animation_delay="' + props.attributes.animation_delay + '" extra_class_name="' + addClassName + '"]' +  props.attributes.parallax_text + '[/clapat_parallax_image]';

		},
	} );
	
	/** Popup Image **/
	blocks.registerBlockType( 'serano-gutenberg/popup-image', {
		title: __( 'Serano: Popup Image', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		
		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			animation_type: {
				type: 'string',
				default: 'none'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
			parallax: {
				type: 'string',
				default: 'no'
			},
			parallax_start: {
				type: 'string',
				default: '0.0'
			},
			parallax_end: {
				type: 'string',
				default: '0.0'
			},
		},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'popup', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-popup-image is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-format-image' } ),
						),
						__('Serano Popup Image', 'serano-gutenberg' ) ),
				
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Popup Thumbnail Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Thumbnail Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Popup Full Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Full Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					/*
					 * InspectorControls lets you add controls to the Block sidebar.
					 */
					el( InspectorControls, {},
					
						el( 'div', { className: 'components-panel__body is-opened' }, 
							el( SelectControl, {
								label: __('Animation Type', 'serano-gutenberg'),
								value: props.attributes.animation_type,
								options: [
									{ label: 'None', value: 'none' },
									{ label: 'Cover', value: 'cover' },
									{ label: 'Fade', value: 'fade' }
								],
								onChange: ( value ) => { props.setAttributes( { animation_type: value } ); },
							} ),
						
							el( 'div', { className : 'clapat-range-control' }, 
								el( RangeControl, {
									label: __('Animation delay',  'serano-gutenberg'),
									value: props.attributes.animation_delay,
									onChange: ( value ) => { 
										if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
									} ) ),
							
							el( SelectControl, {
								label: __('Has Parallax', 'serano-gutenberg'),
								value: props.attributes.parallax,
								options: [
									{ label: 'Yes', value: 'yes' },
									{ label: 'No', value: 'no' }
								],
								onChange: ( value ) => { props.setAttributes( { parallax: value } ); },
							} ),
							
							el( TextControl, {
								label: __('Start Parallax. A value between 0 and 1 representing the top parallax translation.', 'serano-gutenberg'),
								type: "text",
								value: props.attributes.parallax_start,
								onChange: ( value ) => { props.setAttributes( { parallax_start: value } ); },
							} ),
							
							el( TextControl, {
								label: __('End Parallax. A value between 0 and 1 representing the bottom parallax translation.', 'serano-gutenberg'),
								type: "text",
								value: props.attributes.parallax_end,
								onChange: ( value ) => { props.setAttributes( { parallax_end: value } ); },
							} ),
							
						),
						
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_popup_image img_url="' + props.attributes.full_image + '" img_id="' + props.attributes.full_image_id + '" thumb_url="' + props.attributes.thumb_image + '" thumb_id="' + props.attributes.thumb_image_id + '" animation="' + props.attributes.animation_type + '" animation_delay="' + props.attributes.animation_delay + '" parallax="' + props.attributes.parallax + '" start_parallax="' + props.attributes.parallax_start + '" end_parallax="' + props.attributes.parallax_end + '" extra_class_name="' + addClassName + '"][/clapat_popup_image]'; 

		},
	} );
	
	/** Popup Video **/
	blocks.registerBlockType( 'serano-gutenberg/popup-video', {
		title: __( 'Serano: Popup Video', 'serano-gutenberg' ),
		icon: 'format-video',
		category: 'serano-block-category',
		
		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			video_url: {
				type: 'string',
				default: ''
			},
			animation_type: {
				type: 'string',
				default: 'none'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'popup', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-popup-video is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-format-image' } ),
						),
						__('Serano Popup Video', 'serano-gutenberg' ) ),
				
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Video Thumbnail Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Thumbnail Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					/*
					 * InspectorControls lets you add controls to the Block sidebar.
					 */
					el( InspectorControls, {},
					
						el( 'div', { className: 'components-panel__body is-opened' }, 
							el( TextControl, {
								label: __('Video URL (Youtube or Vimeo)', 'serano-gutenberg'),
								value: props.attributes.video_url,
								onChange: ( value ) => { props.setAttributes( { video_url: value } ); },
							} ),
						
							el( SelectControl, {
								label: __('Animation Type', 'serano-gutenberg'),
								value: props.attributes.animation_type,
								options: [
									{ label: 'None', value: 'none' },
									{ label: 'Cover', value: 'cover' },
									{ label: 'Fade', value: 'fade' }
								],
								onChange: ( value ) => { props.setAttributes( { animation_type: value } ); },
							} ),
							
							el( 'div', { className : 'clapat-range-control' }, 
								el( RangeControl, {
									label: __('Animation delay',  'serano-gutenberg'),
									value: props.attributes.animation_delay,
									onChange: ( value ) => { 
										if (typeof value === "undefined") return;
											props.setAttributes( { animation_delay: value } ); 
										},
										type: 'number',
										step: 50,
										min: 0,
										max: 1000
							} ) ),
						),
						
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_popup_video video_url="' + props.attributes.video_url + '" thumb_url="' + props.attributes.thumb_image + '" thumb_id="' + props.attributes.thumb_image_id + '" animation="' + props.attributes.animation_type + '" animation_delay="' + props.attributes.animation_delay + '" extra_class_name="' + addClassName + '"][/clapat_popup_video]'; 

		},
	} );
	
	/** Team Members **/
	const template_clapat_team_members = [
	  [ 'serano-gutenberg/team-member', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'serano-gutenberg/team-members', {
		title: __( 'Serano: Team Members', 'serano-gutenberg' ),
		icon: 'businessman',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/team-member'],
	
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'team member', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-team-members is-large'},
							el( 'div', { className: 'components-placeholder__label' }, 
								el( 'span', { className: 'block-editor-block-icon has-colors' },
									el( 'span', { className: 'dashicon dashicons dashicons-businessman' } ),
								),
								__('Serano Team Members', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/team-member'], template: template_clapat_team_members } )
						);

		},

		save: function( props ) {
			
			let blockClasses = 'team-members-list';
			
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'ul', { className: blockClasses, 'data-fx': '1' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/team-member', {
		title: __( 'Serano: Team Member', 'serano-gutenberg' ),
		icon: 'editor-quote',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/team-members' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			name: {
				type: 'string',
				default: ''
			},
			position: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Team Member Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Team Member Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					el ('div', { className: 'components-placeholder__instructions' }, __( 'Team Member Name:', 'serano-gutenberg' ) ),
						
					el( PlainText,
					{
						value: props.attributes.name,
						className: 'clapat-inline-content',
						onChange: ( value ) => { props.setAttributes( { name: value } ); },
					}),
					
					el ('div', { className: 'components-placeholder__instructions' }, __( 'Team Member Position:', 'serano-gutenberg' ) ),
						
					el( PlainText,
					{
						value: props.attributes.position,
						className: 'clapat-inline-content',
						onChange: ( value ) => { props.setAttributes( { position: value } ); },
					}),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[team_member img_url="' + props.attributes.img_url + '" name="' + props.attributes.name + '" position="' + props.attributes.position + '"][/team_member]'; 

		},
	} );
	
	/** Clients **/
	const template_clapat_clients = [
	  [ 'serano-gutenberg/client', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'serano-gutenberg/clients', {
		title: __( 'Serano: Clients', 'serano-gutenberg' ),
		icon: 'businessman',
		category: 'serano-block-category',
		allowedBlocks: ['serano-gutenberg/client'],
		attributes: {
			has_borders: {
				type: 'string',
				default: 'yes'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			animation_delay: {
				type: 'number',
				default: 0
			},
		},
	
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'client', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-clients is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-businessman' } ),
									),
									__('Serano Clients', 'serano-gutenberg' ) ),
							el( InnerBlocks, {allowedBlocks: ['serano-gutenberg/client'], template: template_clapat_clients } ),
							
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Table has borders', 'serano-gutenberg'),
										value: props.attributes.has_borders,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_borders: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has animation', 'serano-gutenberg'),
										value: props.attributes.has_animation,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
									} ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Animation delay',  'serano-gutenberg'),
											value: props.attributes.animation_delay,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { animation_delay: value } ); 
											},
											type: 'number',
											step: 50,
											min: 0,
											max: 1000
										} ) ),
								),
							),
						);

		},

		save: function( props ) {
			
			let blockClasses = 'clients-table';
			
			if( props.attributes.has_borders !== 'yes' ) { blockClasses += ' no-borders'; }
			if( props.attributes.has_animation !== 'no' ) { blockClasses += ' has-animation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'ul', 
							{ 
								className: blockClasses,
								'data-delay': props.attributes.animation_delay,
							}, InnerBlocks.Content() );
		},
	} );
	
	blocks.registerBlockType( 'serano-gutenberg/client', {
		title: __( 'Serano: Client', 'serano-gutenberg' ),
		icon: 'editor-quote',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/clients' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			client_url: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Client Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('div', { className: 'components-placeholder__instructions' }, __( 'Client Image', 'serano-gutenberg' ) )
								);
							}
						} )
					),
					
					el ('div', { className: 'components-placeholder__instructions' }, __( 'Client URL', 'serano-gutenberg' ) ),
						
					el( PlainText,
					{
						value: props.attributes.client_url,
						className: 'clapat-inline-content',
						onChange: ( value ) => { props.setAttributes( { client_url: value } ); },
					}),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[client_item img_url="' + props.attributes.img_url + '" client_url="' + props.attributes.client_url + '"][/client_item]'; 

		},
	} );
	
	/** Pinned Section **/
	const PINNED_SECTION_ALLOWED_BLOCKS = [ 'serano-gutenberg/scrolling-element', 'serano-gutenberg/pinned-element' ]
	
	const RIGHT_PINNED_SECTION_TEMPLATE = [
				[ 'serano-gutenberg/scrolling-element', { className:'left' } ],
				[ 'serano-gutenberg/pinned-element', { className:'right' } ]
			];

	blocks.registerBlockType( 'serano-gutenberg/right-pinned-section', {
		title: __( 'Serano: Right Pinned Section', 'serano-gutenberg' ),
		icon: 'image-rotate-right',
		category: 'serano-block-category',
		
		attributes: {},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'right pinned text', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-right-pinned-section is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-image-rotate-right' } ),
						),
						__('Serano Right Pinned Section', 'serano-gutenberg' ) ),
					
					el( InnerBlocks,
						{
							template: RIGHT_PINNED_SECTION_TEMPLATE,
							templateLock: 'all',
							allowedBlocks: PINNED_SECTION_ALLOWED_BLOCKS,
							orientation: 'horizontal'
						} ),
				),
				
			];
		},

		save: function( props ) {
			
			let blockClasses = 'pinned-section';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses	}, InnerBlocks.Content() );

		},
		
	} );
	
	const LEFT_PINNED_SECTION_TEMPLATE = [
				[ 'serano-gutenberg/pinned-element', { className:'left' } ],
				[ 'serano-gutenberg/scrolling-element', { className:'right' } ]
			];

	blocks.registerBlockType( 'serano-gutenberg/left-pinned-section', {
		title: __( 'Serano: Left Pinned Section', 'serano-gutenberg' ),
		icon: 'image-rotate-left',
		category: 'serano-block-category',
		
		attributes: {},

		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'left pinned text', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-left-pinned-section is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-image-rotate-right' } ),
						),
						__('Serano Left Pinned Section', 'serano-gutenberg' ) ),
					
					el( InnerBlocks,
						{
							template: LEFT_PINNED_SECTION_TEMPLATE,
							templateLock: 'all',
							allowedBlocks: PINNED_SECTION_ALLOWED_BLOCKS,
							orientation: 'horizontal'
						} ),
					
				),
				
			];
		},

		save: function( props ) {
			
			let blockClasses = 'pinned-section';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', {	className: blockClasses	}, InnerBlocks.Content() );

		},
		
	} );
	
	const PINNED_ELEMENT_TEMPLATE = [
				[ 'core/html', {} ],
			];
	blocks.registerBlockType( 'serano-gutenberg/pinned-element', {
		title: __( 'Serano: Pinned Element', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/right-pinned-section', 'serano-gutenberg/left-pinned-section' ],

		attributes: { },

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-pinned-content is-large'},
							el( 'div', { className: 'components-placeholder__instructions' }, __('Pinned Content', 'serano-gutenberg' ) ),
							el( InnerBlocks, {
								template: PINNED_ELEMENT_TEMPLATE,
								templateLock: "all",
							} ),
				
				),
				
			];
		},

		save: function( props ) {
			let blockClasses = 'pinned-element';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, InnerBlocks.Content() );
	
		},
	} );
	
	const SCROLLING_ELEMENT_TEMPLATE = [
				[ 'core/html', {} ],
			];
	blocks.registerBlockType( 'serano-gutenberg/scrolling-element', {
		title: __( 'Serano: Scrolling Element', 'serano-gutenberg' ),
		icon: 'format-image',
		category: 'serano-block-category',
		parent: [ 'serano-gutenberg/right-pinned-section', 'serano-gutenberg/left-pinned-section' ],

		attributes: { },

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-pinned-content is-large'},
							el( 'div', { className: 'components-placeholder__instructions' }, __('Scrolling Content', 'serano-gutenberg' ) ),
							el( InnerBlocks, {
								template: SCROLLING_ELEMENT_TEMPLATE,
								templateLock: "all",
							} ),
				
				),
				
			];
		},

		save: function( props ) {
			let blockClasses = 'scrolling-element';
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', { className: blockClasses }, InnerBlocks.Content() );
	
		},
	} );
		
	/** Hosted Video **/
	blocks.registerBlockType( 'serano-gutenberg/video-hosted', {
		title: __( 'Serano: Hosted Video', 'serano-gutenberg' ),
		icon: 'video-alt',
		category: 'serano-block-category',
		attributes: {
			cover_image: {
				type: 'string',
				default: ''
			},
			cover_image_id: {
				type: 'number',
			},
			webm_url: {
				type: 'string',
				default: 'http://'
			},
			mp4_url: {
				type: 'string',
				default: 'http://'
			},
			
		},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'video', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					cover_image: media.url,
					cover_image_id: media.id,
				} );
			};
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-hosted-video is-large'},
				
					el( 'div', { className: 'components-placeholder__label' }, 
						el( 'span', { className: 'block-editor-block-icon has-colors' },
							el( 'span', { className: 'dashicon dashicons dashicons-format-image' } ),
						),
						__('Serano Hosted Video', 'serano-gutenberg' ) ),
						
						el( 'div', { className: 'clapat-editor-image' },
							el( MediaUpload, {
								onSelect: onSelectImage,
								type: 'image',
								value: props.attributes.cover_image_id,
								render: function( obj ) {
									return el( components.Button, {
											className: props.attributes.cover_image_id ? 'clapat-image-added' : 'button button-large',
											onClick: obj.open
										},
										! props.attributes.cover_image_id ? i18n.__( 'Upload Video Cover Image', 'serano-gutenberg' ) : el( 'img', { src: props.attributes.cover_image } ),
										el ('div', { className: 'components-placeholder__instructions' }, __( 'Cover Image', 'serano-gutenberg' ) )
									);
								}
							} ),
						),
						
						el ('div', { className: 'components-placeholder__instructions' }, __( 'MP4 video url:', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.mp4_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { mp4_url: value } ); },
						}),
						
						el ('div', { className: 'components-placeholder__instructions' }, __( 'Webm video url:', 'serano-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.webm_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { webm_url: value } ); },
						}),
					)
			]
		},
		save: function( props ) {
			
			let addClassName = '';
			if( (typeof props.attributes.className !== 'undefined') && (props.attributes.className != null) ){
				
				addClassName = props.attributes.className;
			}
			return '[clapat_video cover_img_url="' + props.attributes.cover_image + '" mp4_url="' + props.attributes.mp4_url + '" webm_url="' + props.attributes.webm_url + '" extra_class_name="' + addClassName + '"][/clapat_video]';
		},
	} );
	

	/** Google Map **/
	blocks.registerBlockType( 'serano-gutenberg/google-map', {
		title: __( 'Serano: Google Map', 'serano-gutenberg' ),
		icon: 'admin-site',
		category: 'serano-block-category',
		attributes: {	},
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ),  __( 'map', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-google-map is-large'},
								el( 'div', { className: 'components-placeholder__label' }, 
									el( 'span', { className: 'block-editor-block-icon has-colors' },
										el( 'span', { className: 'dashicon dashicons dashicons-admin-site' } ),
									),
									__('Serano Google Map', 'serano-gutenberg' ) ),
								el( 'span', { className: 'clapat-inline-caption' }, __( 'Set google map properties in customizer - map settings.', 'serano-gutenberg' ) ),
				)
						
			]
		},
		save: function( props ) {
			
			return '[clapat_map][/clapat_map]'; 
		},
	} );
	
	/** Container **/
	blocks.registerBlockType( 'serano-gutenberg/container', {
		title: __( 'Serano: Container', 'serano-gutenberg' ),
		icon: 'analytics',
		category: 'serano-block-category',
		attributes: {
			background_color: {
				type: 'string',
				default: '#ffffff'
			},
			type: {
				type: 'string',
				default: 'light-section'
			},
			width: {
				type: 'string',
				default: 'normal'
			},
			padding_top: {
				type: 'string',
				default: 'no'
			},
			padding_bottom: {
				type: 'string',
				default: 'no'
			},
			padding_left: {
				type: 'string',
				default: 'no'
			},
			padding_right: {
				type: 'string',
				default: 'no'
			},
			change_header_color: {
				type: 'string',
				default: 'no'
			},
			has_animation: {
				type: 'string',
				default: 'no'
			},
			alignment: {
				type: 'string',
				default: 'left'
			},
		}, 
		
		keywords: [ __( 'clapat', 'serano-gutenberg'), __( 'shortcode', 'serano-gutenberg' ), __( 'container', 'serano-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colors = [ 
				{ name: 'Default', color: '#ffffff' }, 
				{ name: 'Light Grey', color: '#eeeeee' }, 
				{ name: 'Dark Grey', color: '#171717' }, 
				{ name: 'Black', color: '#000000' },
			];
			
			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
			}
			
			return	[ el( BlockControls,
							{ key: 'controls' },
							el(
								AlignmentToolbar,
								{
									value: props.attributes.alignment,
									onChange: onChangeAlignment,
								}
							)
						),
						el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-container is-large'},
							el( 'div', { className: 'components-placeholder__label' }, 
								el( 'span', { className: 'block-editor-block-icon has-colors' },
									el( 'span', { className: 'dashicon dashicons dashicons-analytics' } ),
								),
								__('Serano Container', 'serano-gutenberg' ) ),
							el( InnerBlocks, {} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'strong', {}, __('Select Background Color:',  'serano-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colors,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? 'transparent' : value } ); 
											},
										} )
									),
									el( SelectControl, {
										label: __('Type', 'serano-gutenberg'),
										value: props.attributes.type,
										options : [
											{ label: __('Light', 'serano-gutenberg'), value: 'light-section' },
											{ label: __('Dark',  'serano-gutenberg'), value: 'dark-section' },
										],
										onChange: ( value ) => { props.setAttributes( { type: value } ); },
									} ),
									el( SelectControl, {
										label: __('Invert header color', 'serano-gutenberg'),
										desc: __('Inverts header color depending on Type: light or dark', 'serano-gutenberg'),
										value: props.attributes.change_header_color,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { change_header_color: value } ); },
									} ),
									el( SelectControl, {
										label: __('Width', 'serano-gutenberg'),
										value: props.attributes.width,
										options : [
											{ label: __('Normal', 'serano-gutenberg'), value: 'normal' },
											{ label: __('Small',  'serano-gutenberg'), value: 'small' },
											{ label: __('Full',  'serano-gutenberg'), value: 'full' },
										],
										onChange: ( value ) => { props.setAttributes( { width: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has top padding', 'serano-gutenberg'),
										value: props.attributes.padding_top,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { padding_top: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has bottom padding', 'serano-gutenberg'),
										value: props.attributes.padding_bottom,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { padding_bottom: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has left padding', 'serano-gutenberg'),
										value: props.attributes.padding_left,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { padding_left: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has right padding', 'serano-gutenberg'),
										value: props.attributes.padding_right,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { padding_right: value } ); },
									} ),
									el( SelectControl, {
										label: __('Has animation', 'serano-gutenberg'),
										value: props.attributes.has_animation,
										options : [
											{ label: __('Yes', 'serano-gutenberg'), value: 'yes' },
											{ label: __('No',  'serano-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { has_animation: value } ); },
									} ),
								),
							),
						)	
					];
		},

		save: function( props ) {
			let blockClasses = 'content-row';
			blockClasses += ' ' + props.attributes.type;
			blockClasses += ' ' + props.attributes.width;
			if( props.attributes.padding_top !== 'no' ) { blockClasses += ' row_padding_top'; }
			if( props.attributes.padding_bottom !== 'no' ) { blockClasses += ' row_padding_bottom'; }
			if( props.attributes.padding_left !== 'no' ) { blockClasses += ' row_padding_left'; }
			if( props.attributes.padding_right !== 'no' ) { blockClasses += ' row_padding_right'; }
			if( props.attributes.change_header_color !== 'no' ) { blockClasses += ' change-header-color'; }
			if( props.attributes.has_animation !== 'no' ) { blockClasses += ' has-animation'; }
			if( props.className != null ) { blockClasses += ' ' + props.className; }
			
			return el( 'div', 
							{ 
								className: blockClasses,
								'data-bgcolor': props.attributes.background_color,
								style : {
									'text-align': props.attributes.alignment
								}
							}, InnerBlocks.Content() );
	
		},
	} );
	
}(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components
) );
