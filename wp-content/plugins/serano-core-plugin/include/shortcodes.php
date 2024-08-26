<?php
// Serano shortcodes definitions


function clapat_core_get_image_url( $image_id, $image_url ){
	
	if( !empty( $image_id ) ){
		
		$image_info = wp_get_attachment_image_src( $image_id, 'full' );
		if( !empty( $image_info[0] ) ){
			
			return $image_info[0];
		} 
	}
	
	return $image_url;
}

/* Typo Elements */

//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button', 'shortcode_button');
function shortcode_button($atts, $content = null) {

	$atts = shortcode_atts(array(
				'link'      		=> '',
				'target'    		=> '_blank',
				'type'      		=> 'normal',
				'rounded'      		=> 'yes',
				'background_color'	=> '',
				'text_color'		=> '',
				'animation' 		=> false,
				'animation_delay' 	=> '0',
				'extra_class_name' 	=> ''
			), $atts );

	$css_classes = '';
	$link_css_classes = '';
	$transition = '';
	if( $atts['type'] == 'outline' ){
		$css_classes .= ' outline';
	}
	if( $atts['rounded'] == 'yes' ){
		$css_classes .= ' rounded';
	}
	if( $atts['target'] == '_self' ){
		$link_css_classes .= ' ajax-link animation-link';
		$transition = ' data-type="page-transition"';
	}
	if( !empty( $atts['extra_class_name'] ) ){
		$css_classes .= '  ' . $atts['extra_class_name'];
	}
	
	$clapat_attributes = "";
	if( !empty( $atts['background_color'] ) ){
		
		$clapat_attributes .= ' data-btncolor="' . esc_attr( $atts['background_color'] ) . '"';
	}
	if( !empty( $atts['text_color'] ) ){
		
		$clapat_attributes .= ' data-btntextcolor="' . esc_attr( $atts['text_color'] ) . '"';
	}
	
	$out  = '<div class="button-box';
	
	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	
	$out  .= '<div class="clapat-button-wrap parallax-wrap hide-ball">';
	$out  .= '<div class="clapat-button parallax-element">';
	$out  .= '<div class="button-border parallax-element-second' . $css_classes . '"' . $clapat_attributes . '>';
	$out  .= '<a class="'  . $link_css_classes . '" href="' . $atts['link'] . '"' . $transition . ' target="' . $atts['target'] . '">';
	$out  .= '<span data-hover="' . esc_attr( $content ) . '">' . do_shortcode($content) . '</span>';
	$out  .= '</a>';
	$out  .= '</div>';
	$out  .= '</div>';
	$out  .= '</div>';
	$out  .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Text Link shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button_link', 'shortcode_button_link');
function shortcode_button_link($atts, $content = null) {

	$atts = shortcode_atts(array(
				'link'      		=> '',
				'target'    		=> '_blank',
				'caption'			=> '',
				'position'			=> 'left',
				'type'				=> 'arrow',
				'size'				=> 'small-btn',
				'animation' 		=> false,
				'animation_delay' 	=> '0',
				'extra_class_name' 	=> ''
			), $atts );

	$out  = '<div class="button-wrap ' . $atts['size'] . ' ' . $atts['position'];
	if( $atts['type'] == 'bullet' ){
		
		$out .= ' button-link';
	}
	
	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	
	
	$out  .= '<div class="icon-wrap parallax-wrap">';
	$out  .= '<div class="button-icon parallax-element">';
	if( $atts['type'] == 'arrow' ){
		$out  .= '<i class="arrow-icon-down"></i>';
	}
	else {
		$out  .= '<i class="fa-solid fa-arrow-right"></i>';
	}
	$out  .= '</div>';
	$out  .= '</div>';
	$out  .= '<a target="' . esc_attr( $atts['target'] ) . '" href="' . esc_attr( $atts['link'] ) . '">';
	$out  .= '<div class="button-text sticky ' . $atts['position'] . '"><span data-hover="' . esc_attr( $atts['caption'] ) . '">' . wp_kses_post( $atts['caption'] ) . '</span></div>';
	$out  .= '</a>';
	$out  .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Marquee Content
//////////////////////////////////////////////////////////////////
add_shortcode('marquee_content', 'shortcode_marquee_content');
function shortcode_marquee_content($atts, $content = null) {

	$atts = shortcode_atts(array(
		'direction' => 'fw',
		'extra_class_name' => ''
	), $atts );
	
	$out = '<div class="marquee-text-wrapper ' . sanitize_html_class( $atts['extra_class_name'] ) . '">';
	$out .= '<h1 class="marquee-text big-title ' . sanitize_html_class( $atts['direction'] ) . '">' . wp_kses_post( $content ) . '</h1>';
	$out .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Moving Title
//////////////////////////////////////////////////////////////////
add_shortcode('moving_title', 'shortcode_moving_title');
function shortcode_moving_title($atts, $content = null) {

	$atts = shortcode_atts(array(
		'direction' => 'title-moving-forward',
		'extra_class_name' => ''
	), $atts );
	
	$out = '<div class="title-moving-outer ' . sanitize_html_class( $atts['extra_class_name'] ) . '">';
	$out .= '<h1 class="' . esc_attr( $atts['direction'] ) . '">' . wp_kses_post( $content ) . '</h1>';
	$out .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Moving Gallery
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_moving_gallery', 'shortcode_clapat_moving_gallery');
function shortcode_clapat_moving_gallery($atts, $content = null) {

	$atts = shortcode_atts( array(
								'direction' => 'fw-gallery',
								'randomize' => 'no',
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="moving-gallery ' . $atts['direction'];
	if( $atts['randomize'] == 'yes' ){
		
		$str .= ' random-sizes';
	}
	$str .= ' ' . $atts['extra_class_name'] . '">';
	$str .= '<ul class="wrapper-gallery">';
	$str .= do_shortcode( $content );
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_moving_gallery_image', 'shortcode_clapat_moving_gallery_image');
function shortcode_clapat_moving_gallery_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		
		$alt_text = "Moving gallery image";
	}
	else{
		
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$str = '<li>';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$str .= '</li>';

	return $str;

}

//////////////////////////////////////////////////////////////////
// Horizontal Scrolling Panels
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_scrolling_panels', 'shortcode_clapat_scrolling_panels');
function shortcode_clapat_scrolling_panels($atts, $content = null) {

	$atts = shortcode_atts( array(
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="panels';
	if( !empty( $atts['extra_class_name'] ) ){
		
		$str .= ' ' . $atts['extra_class_name'];
	}
	$str .= '">';
	$str .= '<div class="panels-container">';
	$str .= do_shortcode( $content );
	$str .= '</div>';
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_scrolling_panels_image', 'shortcode_clapat_scrolling_panels_image');
function shortcode_clapat_scrolling_panels_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		
		$alt_text = "Scrolling panels image";
	}
	else{
		
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$str = '<div class="panel">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$str .= '</div>';

	return $str;

}

//////////////////////////////////////////////////////////////////
// Zoom Gallery
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_zoom_gallery', 'shortcode_clapat_zoom_gallery');
function shortcode_clapat_zoom_gallery($atts, $content = null) {

	$atts = shortcode_atts( array(
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="zoom-gallery';
	if( !empty( $atts['extra_class_name'] ) ){
		
		$str .= ' ' . $atts['extra_class_name'];
	}
	$str .= '">';
	$str .= '<ul class="zoom-wrapper-gallery">';
	$str .= do_shortcode( $content );
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_zoom_gallery_image', 'shortcode_clapat_zoom_gallery_image');
function shortcode_clapat_zoom_gallery_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'	=> '',
		'zoom'	=> 'no'
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		
		$alt_text = "Zoom gallery image";
	}
	else{
		
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	if( $atts['zoom'] == 'yes' ){
	
		$str = '<li class="zoom-center">';
	}
	else {
		
		$str = '<li>';
	}
	$str .= '<div class="zoom-img-wrapper">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$str .= '</div>';
	$str .= '</li>';

	return $str;

}

//////////////////////////////////////////////////////////////////
// Slowed Text Pin
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_slowed_text_pin', 'shortcode_clapat_slowed_text_pin');
function shortcode_clapat_slowed_text_pin( $atts, $content = null ) {

	$atts = shortcode_atts( array(
								'extra_class_name' => '',
								'pre_title_text' => '',
								'title_text' => '',
								'subtitle_text' => ''
							), $atts );

	$str = '<div class="slowed-pin';
	if( !empty( $atts['extra_class_name'] ) ){
		
		$str .= ' ' . $atts['extra_class_name'];
	}
	$str .= '">';
	$str .= '<div class="slowed-text">';
	$str .= '<h5>' . wp_kses_post( $atts[ pre_title_text ] ) . '</h5>';
	$str .= '<h1 class="big-title">' . wp_kses_post( $atts[ title_text ] ) . '</h1>';
	$str .= '<hr>';
	$str .= '<h5>' . wp_kses_post( $atts[ subtitle_text ] ) . '</h5>';
	$str .= '</div>';
	$str .= '<div class="slowed-images">';
	$str .= do_shortcode( $content );
	$str .= '</div>';
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_slowed_text_pin_image', 'shortcode_clapat_slowed_text_pin_image');
function shortcode_clapat_slowed_text_pin_image( $atts, $content = null ) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'	=> ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		
		$alt_text = "Slowed text pin gallery image";
	}
	else{
		
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$str = '<div class="slowed-image">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$str .= '</div>';
	
	return $str;

}

//////////////////////////////////////////////////////////////////
// Pinned Gallery
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_pinned_gallery', 'shortcode_clapat_pinned_gallery');
function shortcode_clapat_pinned_gallery($atts, $content = null) {

	$atts = shortcode_atts( array(
								'randomize' => 'no',
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="pinned-gallery';
	if( $atts['randomize'] == 'yes' ){
		
		$str .= ' random-img-ratation';
	}
	if( !empty( $atts['extra_class_name'] ) ){
		
		$str .= ' ' . $atts['extra_class_name'];
	}
	$str .= '">';
	$str .= do_shortcode( $content );
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_pinned_gallery_image', 'shortcode_clapat_pinned_gallery_image');
function shortcode_clapat_pinned_gallery_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'	=> ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		
		$alt_text = "Pinned gallery image";
	}
	else{
		
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$str = "";
	$str .= '<div class="pinned-image">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$str .= '</div>';
	
	return $str;

}

//////////////////////////////////////////////////////////////////
// Reveal Gallery
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_reveal_gallery', 'shortcode_clapat_reveal_gallery');
function shortcode_clapat_reveal_gallery($atts, $content = null) {

	$atts = shortcode_atts(array(
		'left_img_url'		=> '',
		'left_img_id'  		=> '',
		'center_img_url'	=> '',
		'center_img_id'    	=> '',
		'right_img_url'		=> '',
		'right_img_id'  	=> '',
		'extra_class_name'	=> ''
	), $atts );

	$out = "";
	
	$left_img_url = clapat_core_get_image_url($atts['left_img_id'], $atts['left_img_url']);
	$center_img_url = clapat_core_get_image_url($atts['center_img_id'], $atts['center_img_url']);
	$right_img_url = clapat_core_get_image_url($atts['right_img_id'], $atts['right_img_url']);
	
	if( empty( $atts['left_img_id'] ) ){
		$left_alt_text = "Reveal gallery image";
	}
	else{
		$left_alt_text = trim( strip_tags( get_post_meta( $atts['left_img_id'], '_wp_attachment_image_alt', true ) ) );
	}
	
	if( empty( $atts['center_img_id'] ) ){
		$center_alt_text = "Reveal gallery image";
	}
	else{
		$center_alt_text = trim( strip_tags( get_post_meta( $atts['center_img_id'], '_wp_attachment_image_alt', true ) ) );
	}
	
	if( empty( $atts['right_img_id'] ) ){
		$right_alt_text = "Reveal gallery image";
	}
	else{
		$right_alt_text = trim( strip_tags( get_post_meta( $atts['right_img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$out = '<div class="reveal-gallery';
	if( !empty( $atts['extra_class_name'] ) ){
		
		$out .= ' ' . $atts['extra_class_name'];
	}
	$out .= '">';
	
	// Left image
	$out .= '<div class="reveal-img">';
	$out .= '<img src="' . esc_url ( $left_img_url ) . '" alt="' . esc_attr( $left_alt_text ) . '" />';
	$out .= '</div>';
	// Center image
	$out .= '<div class="reveal-img-fixed">';
	$out .= '<img src="' . esc_url ( $center_img_url ) . '" alt="' . esc_attr( $center_alt_text ) . '" />';
	$out .= '</div>';
	// Right image
	$out .= '<div class="reveal-img">';
	$out .= '<img src="' . esc_url ( $right_img_url ) . '" alt="' . esc_attr( $right_alt_text ) . '" />';
	$out .= '</div>';
	
	$out .= '</div>';
	
	return $out;
}
/* End Typo Elements */


/* Elements */

//////////////////////////////////////////////////////////////////
// Accordion
//////////////////////////////////////////////////////////////////
add_shortcode('accordion', 'shortcode_accordion');
function shortcode_accordion($atts, $content = null) {
	
	$atts = shortcode_atts( array(
							'type' => 'small-acc',
							'animation' => false,
							'animation_delay' => '0',
							'extra_class_name' => ''
							), $atts );

	$str = '<dl class="accordion ' . $atts['type'];
	
	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	if( $clapat_animation ){
		
		$str .= ' has-animation';
	}
	$str .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$str .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$str .= '>';
	
	$str .= do_shortcode( $content );
	$str .= '</dl>';

	return $str;
}

add_shortcode('accordion_item', 'shortcode_accordion_item');
function shortcode_accordion_item($atts, $content = null) {

	$atts = shortcode_atts(
					array(
					'title' => ''
					), $atts );

	$str = '<dt>';
	$str .= '<span class="link">' . $atts['title'] . '</span>';
	$str .= '<div class="acc-icon-wrap parallax-wrap">';
	$str .= '<div class="acc-button-icon parallax-element">';
	$str .= '<i class="fa fa-arrow-right"></i>';
	$str .= '</div>';
	$str .= '</div>';
	$str .= '</dt>';
	$str .= '<dd class="accordion-content">' . do_shortcode( $content ) . '</dd>';

	return $str;
}

//////////////////////////////////////////////////////////////////
// Collage
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_collage', 'shortcode_clapat_collage');
function shortcode_clapat_collage($atts, $content = null) {

	$atts = shortcode_atts( array(
								'extra_class_name' => ''
							), $atts );
							
	$str = '<div class="justified-grid ' . $atts['extra_class_name'] . '">';
	$str .= do_shortcode( $content );
	$str .= '</div>';

	return $str;
}

add_shortcode('clapat_collage_image', 'shortcode_clapat_collage_image');
function shortcode_clapat_collage_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'thumb_img_url'	=> '',
		'thumb_img_id'	=> '',
		'img_url'	=> '',
		'img_id'	=> '',
		'alt'		=> '',
		'info' => ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	$thumb_img_url = clapat_core_get_image_url($atts['thumb_img_id'], $atts['thumb_img_url']);

	$str = '<div class="collage-thumb">';
	$str .= '<a class="image-link" href="' . esc_url( $img_url ) . '">';
	$str .= '<img src="' . esc_url( $thumb_img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
	$str .= '<div class="thumb-info">' . wp_kses_post( $atts['info'] ) . '</div>';
	$str .= '</a>';
	$str .= '</div>';

	return $str;

}

//////////////////////////////////////////////////////////////////
// Self Hosted Video
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_video', 'shortcode_clapat_video');
function shortcode_clapat_video($atts, $content = null) {

	$atts = shortcode_atts(array(
		'cover_img_url'	=> '',
		'cover_img_id'	=> '',
		'webm_url'    => '',
		'mp4_url'	=> '',
		'extra_class_name' => ''
	), $atts );

	$cover_img_url = clapat_core_get_image_url($atts['cover_img_id'], $atts['cover_img_url']);
	
	$str = '<!-- Video Player -->';
	$str .= '<div class="video-wrapper ' . $atts['extra_class_name'] . '">';
	$str .= '<div class="video-cover" data-src="' . esc_url( $cover_img_url ) . '"></div>';
	$str .= '<video class="bgvid" controls preload="auto" >';
	if( !empty( $atts['webm_url'] ) ){
	$str .= '<source src="' . esc_url( $atts['webm_url'] ) . '" />';
	}
	if( !empty( $atts['mp4_url'] ) ){
	$str .= '<source src="' . esc_url( $atts['mp4_url'] ) . '" />';
	}
	$str .= '</video>';

	$str .= '<div class="control">';
	$str .= '<div class="btmControl">';
	$str .= '<div class="progress-bar">';
	$str .= '<div class="progress">';
	$str .= '<span class="bufferBar"></span>';
	$str .= '<span class="timeBar"></span>';
	$str .= '</div>';
	$str .= '</div>';
	$str .= '<div class="video-btns">';
	$str .= '<div class="sound sound2 btn" title="Mute/Unmute sound">';
	$str .= '<i class="fa fa-volume-up" aria-hidden="true"></i>';
	$str .= '<i class="fa fa-volume-off" aria-hidden="true"></i>';
	$str .= '</div>';
	$str .= '<div class="btnFS btn" title="Switch to full screen">';
	$str .= '<i class="fa fa-expand" aria-hidden="true"></i>';
	$str .= '</div>';
	$str .= '</div>';
	$str .= '</div>';
	$str .= '</div>';

	$str .= '</div>';                    
	$str .= '<!--/Video Player -->';

	return $str;

}

/* End Elements */


/* Sliders */

//////////////////////////////////////////////////////////////////
// General Slider
//////////////////////////////////////////////////////////////////
add_shortcode('general_slider', 'shortcode_general_slider');
function shortcode_general_slider($atts, $content = null) {

	$atts = shortcode_atts( array(
								'slider_dots' => 'yes',
								'autocenter' => 'yes',
								'cursor' => 'light-cursor',
								'animation' => false,
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="clapat-slider-wrapper content-slider'; 
	if( $atts['animation'] ){
		
		$str .= 'has-animation'; 
	}
	if( $atts['slider_dots'] == 'no' ){
		
		$str .= ' disabled-slider-dots';
	}
	if( $atts['autocenter'] == 'no' ){
		
		$str .= ' autocenter';
	}
	$str .= ' ' . $atts['cursor'];
	$str .= '<div class="clapat-slider">';
	$str .= '<div class="clapat-slider-viewport">';
	$str .= do_shortcode( $content ); 
	$str .= '</div>';
	$str .= '</div>';
                                    
	$str .= '<div class="clapat-controls">';
	$str .= '<div class="clapat-button-next slider-button-next"></div>';
	$str .= '<div class="clapat-button-prev slider-button-prev"></div>';
	$str .= '<div class="clapat-pagination"></div>';
	$str .= '</div>';
	$str .= '</div>';
	
	return $str;
}

add_shortcode('general_slide', 'shortcode_general_slide');
function shortcode_general_slide($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => '',
		'alt'       => '',
	), $atts );

	$str = "";
	
	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	if( empty( $img_url ) ){
		
		return $str;
	}
	$str = '<div class="clapat-slide">';
	$str .= '<div class="slide-img">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
	$str .= '</div>';
	$str .= '</div>';

	return $str;
}

//////////////////////////////////////////////////////////////////
// Carousel Slider
//////////////////////////////////////////////////////////////////
add_shortcode('carousel_slider', 'shortcode_carousel_slider');
function shortcode_carousel_slider($atts, $content = null) {

	$atts = shortcode_atts( array(
								'slider_dots' => 'yes',
								'size' => 'looped-carousel',
								'autocenter' => 'yes',
								'cursor' => 'light-cursor',
								'animation' => false,
								'extra_class_name' => ''
							), $atts );

	$str = '<div class="clapat-slider-wrapper content-slider'; 
	$str .= ' ' . $atts['size'];
	if( $atts['animation'] ){
		
		$str .= ' has-animation'; 
	}
	if( $atts['slider_dots'] == 'no' ){
		
		$str .= ' disabled-slider-dots';
	}
	if( $atts['autocenter'] == 'no' ){
		
		$str .= ' autocenter';
	}
	$str .= ' ' . $atts['cursor'];
	$str .= '<div class="clapat-slider">';
	$str .= '<div class="clapat-slider-viewport">';
	$str .= do_shortcode( $content ); 
	$str .= '</div>';
	$str .= '</div>';
                                    
	$str .= '<div class="clapat-controls">';
	$str .= '<div class="clapat-button-next slider-button-next"></div>';
	$str .= '<div class="clapat-button-prev slider-button-prev"></div>';
	$str .= '<div class="clapat-pagination"></div>';
	$str .= '</div>';
	$str .= '</div>';
	
	return $str;
}

add_shortcode('carousel_slide', 'shortcode_carousel_slide');
function shortcode_carousel_slide($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => '',
		'alt'       => '',
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	$str = "";
	if( empty( $img_url ) ){
		
		return $str;
	}
	$str = '<div class="clapat-slide">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
	$str .= '</div>';

	return $str;
}
/* End Sliders */

/* Google Map */
add_shortcode('clapat_map', 'shortcode_clapat_map');
function shortcode_clapat_map($atts, $content = null) {

	$str = '<!-- Map -->';
	$str .= '<div id="map_canvas"></div>';
	$str .= '<!--/Map -->';

	return $str;
}
/* End Google Map */


//////////////////////////////////////////////////////////////////
// Icon Box
//////////////////////////////////////////////////////////////////
add_shortcode('icon_box', 'shortcode_icon_box');
function shortcode_icon_box($atts, $content = null) {

	$atts = shortcode_atts( array(
								'title' => '',
								'icon' => '',
								'type' => 'inline-boxes',
								'extra_class_name' => ''
							), $atts );

	$out = '';

	$out .= '<div class="box-icon-wrapper ' . sanitize_html_class( $atts['type'] ) . ' ' . esc_attr( $atts['extra_class_name'] ) . '">';
	$out .= '<div class="box-icon">';
	$out .= '<i class="' . wp_kses_post( $atts['icon'] ) . ' fa-2x" aria-hidden="true"></i>';
	$out .= '</div>';
	$out .= '<div class="box-icon-content">';
	$out .= '<h5 class="no-margins">' . do_shortcode( $content ) . '</h5>';
	$out .= '<p>' . wp_kses_post( $atts['title'] ) . '</p>';
	$out .= '</div>';
	$out .= '</div>';
	
	return $out;
	
}

//////////////////////////////////////////////////////////////////
// Counter
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_counter', 'shortcode_clapat_counter');
function shortcode_clapat_counter($atts, $content = null) {

	$atts = shortcode_atts(array(
		'data_start'		=> '1000',
		'data_target'		=> '3000',
		'text_size'			=> 'h1',
		'animation' 		=> false,
		'animation_delay' 	=> '0',
		'extra_class_name' 	=> ''
	), $atts );

	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	$out = '<div class="number-counter-wrap';
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	
	$out .= '<' . esc_attr( $atts['text_size'] ) . ' class="number-counter" data-target="' . esc_attr( $atts['data_target'] ) . '">' . esc_attr( $atts['data_start'] ) . '</' . esc_attr( $atts['text_size'] ) . '>';
	
	$out .= '</div>';
	
	return $out;
}

//////////////////////////////////////////////////////////////////
// Parallax Image
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_parallax_image', 'shortcode_clapat_parallax_image');
function shortcode_clapat_parallax_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'			=> '',
		'img_id'			=> '',
		'text_size'			=> 'h1',
		'caption_alignment' => 'text-align-center',
		'animation' 		=> false,
		'animation_delay' 	=> '0',
		'extra_class_name' 	=> ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		$alt_text = "parallax image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	$out = '<figure class="has-parallax has-parallax-content';
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	
	$out .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '">';
	$out .= '<div class="parallax-image-content content-max-width ' . esc_attr( $atts['caption_alignment'] ) . '">';
	$out .= '<div class="outer">';
	$out .= '<div class="inner">';
	$out .= '<' . $atts['text_size'] . ' class="has-mask">';
	$out .= do_shortcode( $content );
	$out .= '</' . $atts['text_size'] . '>';
	$out .= '</div>';
	$out .= '</div>';
	$out .= '</div>';
	$out .= '</figure>';
	
	return $out;
}

//////////////////////////////////////////////////////////////////
// Pinned Section
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_pinned_section', 'shortcode_clapat_pinned_section');
function shortcode_clapat_pinned_section($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'			=> '',
		'img_id'			=> '',
		'img_alignment' 	=> 'right',
		'animation' 		=> false,
		'animation_delay' 	=> '0',
		'extra_class_name' 	=> ''
	), $atts );

	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['img_id'] ) ){
		$alt_text = "Pinned section image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	$out = '<div class="pinned-section';
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	
	$pinned_element_class = "pinned-element";
	$scrolling_element_class = "scrolling-element";
	$html_scrolling_image = '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '">';
	
	// Left panel
	$out .= '<div class="left ';
	if( $atts['img_alignment'] == 'left' ) {
		
		$out .= $scrolling_element_class;
		$out .= '">';
		$out .= $html_scrolling_image;
	}
	else {

		$out .= $pinned_element_class;
		$out .= '">';
		$out .= do_shortcode( $content );
	}
	$out .= '</div>';
	
	// Right panel
	$out .= '<div class="right ';
	if( $atts['img_alignment'] == 'right' ) {

		$out .= $scrolling_element_class;
		$out .= '">';
		$out .= $html_scrolling_image;
	}
	else {
		
		$out .= $pinned_element_class;
		$out .= '">';
		$out .= do_shortcode( $content );
	}
	$out .= '</div>';
	
	return $out;
}

//////////////////////////////////////////////////////////////////
// Popup Image & Video
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_popup_image', 'shortcode_clapat_popup_image');
function shortcode_clapat_popup_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'thumb_url'		=> '',
		'thumb_id'  	=> '',
		'img_url'		=> '',
		'img_id'    	=> '',
		'animation' 	=> 'none',
		'animation_delay' => '0',
		'parallax'		=> 'no',
		'start_parallax' => '0.0',
		'end_parallax'	=> '0.0',
		'extra_class_name' => ''
	), $atts );

	$out = "";
	
	if( $atts['parallax'] == 'yes' ){
		
		$out .= '<div class="vertical-parallax" data-startparallax="' . esc_attr( $atts['start_parallax'] ) . '" data-endparallax="' . esc_attr( $atts['end_parallax'] ) . '">';
	}
	
	$thumb_url = clapat_core_get_image_url($atts['thumb_id'], $atts['thumb_url']);
	$img_url = clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['thumb_id'] ) ){
		$alt_text = "popup image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['thumb_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$clapat_image_caption = wp_get_attachment_caption( $atts['thumb_id'] );

	$clapat_animation = $atts['animation'];
	$clapat_animation_delay = $atts['animation_delay'];
	
	$out .= '<figure class="';
	if( $clapat_animation == "fade" ){
		
		$out .= 'has-animation';
	}
	else if( $clapat_animation == "cover" ){
		
		$out .= 'has-animation has-cover';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation != "none" ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	$out .= '<a class="image-link" href="' . esc_url( $img_url ) . '">';
	$out .= '<img src="' . esc_url ( $thumb_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$out .= '</a>';
	$out .= '<figcaption>' . wp_kses_post( $clapat_image_caption ) . '</figcaption>';
	$out .= '</figure>';

	if( $atts['parallax'] == 'yes' ){
		
		$out .= '</div>';
	}
	
	return $out;
}

add_shortcode('clapat_popup_video', 'shortcode_clapat_popup_video');
function shortcode_clapat_popup_video($atts, $content = null) {

	$atts = shortcode_atts(array(
		'thumb_url'		=> '',
		'thumb_id'  	=> '',
		'video_url'		=> '',
		'animation' 	=> 'none',
		'animation_delay' => '0',
		'extra_class_name' => ''
	), $atts );

	$thumb_url = clapat_core_get_image_url($atts['thumb_id'], $atts['thumb_url']);
	
	if( empty( $atts['thumb_id'] ) ){
		$alt_text = "popup video thumbnail image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['thumb_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$clapat_image_caption = wp_get_attachment_caption( $atts['thumb_id'] );

	$clapat_animation = $atts['animation'];
	$clapat_animation_delay = $atts['animation_delay'];
	
	$out = '<figure class="';
	if( $clapat_animation == "fade" ){
		
		$out .= 'has-animation';
	}
	else if( $clapat_animation == "cover" ){
		
		$out .= 'has-animation has-cover';
	}
	$out .= ' ' . $atts['extra_class_name'] . '"';
	if( $clapat_animation != "none" ){
		
		$out .= ' data-delay="'. $atts['animation_delay'] . '"';
	}
	$out .= '>';
	$out .= '<a class="video-link" href="' . esc_url( $atts['video_url'] ) . '">';
	$out .= '<img src="' . esc_url( $thumb_url ) . '" alt="' . esc_attr( $alt_text ) . '" />';
	$out .= '</a>';
	$out .= '</figure>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Captioned Image
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_captioned_image', 'shortcode_clapat_captioned_image');
function shortcode_clapat_captioned_image($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'		=> '',
		'alt'			=> '',
		'caption'	=> '',
		'extra_class_name' => ''
	), $atts );

	$img_url 	= clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
						
	$out = '';
	$out .= '<figure class="wp-block-image ' . esc_attr( $atts['extra_class_name'] ) . '">';
	$out .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
	$out .= '<figcaption>' . wp_kses_post( $atts['caption'] ) . '</figcaption>';
	$out .= '</figure>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Team Members
//////////////////////////////////////////////////////////////////
add_shortcode('team_members', 'shortcode_team_members');
function shortcode_team_members($atts, $content = null) {

	$atts = shortcode_atts(array(
		'extra_class_name' => ''
	), $atts );
	
	$out = '<ul class="team-members-list ' . esc_attr( $atts['extra_class_name'] ) . '" data-fx="1">';
	$out .= do_shortcode( $content );
	$out .= '</ul>';

	return $out;
}

add_shortcode('team_member', 'shortcode_team_member');
function shortcode_team_member($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => '',
		'name' => '',
		'position' => ''
	), $atts );

	$img_url = clapat_core_get_image_url( $atts['img_id'], $atts['img_url'] );

	$out = '';

	$out .= '<li class="hide-ball has-hover-image" data-img="' . esc_url( $img_url ) . '">';
	$out .= '<div class="team-member has-animation"><div>' . wp_kses_post( $atts['name'] ) . '</div><span>' . wp_kses_post( $atts['position'] ) . '</span></div>';
	$out .= '</li>';
		
	return $out;
}
// end team members


//////////////////////////////////////////////////////////////////
// Team Members Carousel
//////////////////////////////////////////////////////////////////
add_shortcode('team_members_carousel', 'shortcode_team_members_carousel');
function shortcode_team_members_carousel($atts, $content = null) {

	$atts = shortcode_atts(array(
		'cursor_type' 		=> 'light-cursor',
		'animation' 		=> 'none',
		'animation_delay' 	=> '0',
		'extra_class_name' 	=> ''
	), $atts );
	
	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
		
	$out = '<div class="swiper-container team-looped-carousel autocenter';
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . esc_attr( $atts['cursor_type'] );
	$out .= ' ' . esc_attr( $atts['extra_class_name'] ) . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	$out = '<div class="swiper-wrapper">';
	
	$out .= do_shortcode( $content );

	$out .= '</div>';
	$out .= '</div>';
	
	return $out;
}

add_shortcode('team_member_carousel', 'shortcode_team_member_carousel');
function shortcode_team_member_carousel($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => '',
		'name' => '',
		'position' => ''
		), $atts );

	$img_url = clapat_core_get_image_url( $atts['img_id'], $atts['img_url'] );
	
	if( empty( $atts['img_id'] ) ){
		$alt_text = "Team Member Image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$out = '';
	$out .= '<div class="swiper-slide">';
	$out .= '<div class="slide-img">';
	$out .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '">';
	$out .= '</div>';
	$out .= '<div class="team-caption">';
	$out .= '<h5>' . wp_kses_post( $atts['name'] ) . '</h5>';
	$out .= '<p>' . wp_kses_post( $atts['position'] ) . '</p>';
	$out .= '</div>';
	$out .= '</div>';

	return $out;
}
// end team members

//////////////////////////////////////////////////////////////////
// Team Members Scrolling Panels
//////////////////////////////////////////////////////////////////
add_shortcode('team_members_scrolling_panels', 'shortcode_team_members_scrolling_panels');
function shortcode_team_members_scrolling_panels($atts, $content = null) {

	$atts = shortcode_atts(array(
		'extra_class_name' 	=> ''
	), $atts );
	
	$out = '<div id="team-panels" class="panels';
	
	$out .= ' ' . esc_attr( $atts['extra_class_name'] ) . '"';
	$out .= '>';
	$out = '<div class="panels-container">';
	
	$out .= do_shortcode( $content );

	$out .= '</div>';
	$out .= '</div>';
	
	return $out;
}

add_shortcode('team_member_scrolling_panel', 'shortcode_team_scrolling_panel');
function shortcode_team_scrolling_panel($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'	=> '',
		'img_id'    => '',
		'name' => '',
		'position' => ''
		), $atts );

	$img_url = clapat_core_get_image_url( $atts['img_id'], $atts['img_url'] );
	
	if( empty( $atts['img_id'] ) ){
		$alt_text = "Team Member Image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['img_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$out = '<div class="panel">';
	$out .= '<div class="panel-content-wrapper">';
	$out .= '<div class="panel-image">';
	$out .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $alt_text ) . '">';
	$out .= '</div>';
	$out .= '<div class="panel-content">';
	$out .= '<div class="team-name-panel">' . wp_kses_post( $atts['name'] ) . '</div>';
	$out .= '<div class="team-cat-panel">' . wp_kses_post( $atts['position'] ) . '</div>';
	$out .= '</div>';
	$out .= '</div>';
	$out .= '</div>';

	return $out;
}
// end team members scrolling panels

//////////////////////////////////////////////////////////////////
// Clients
//////////////////////////////////////////////////////////////////
add_shortcode('clients', 'shortcode_clients');
function shortcode_clients($atts, $content = null) {

	$atts = shortcode_atts(array(
		'has_borders'   => 'yes',
		'animation' 	=> 'none',
		'animation_delay' => '0',
		'extra_class_name' => ''
	), $atts );
	
	$clapat_animation = $atts['animation'];
	if( $clapat_animation == 'no'){
		
		$clapat_animation = false;
	}
	
	$clapat_has_borders = $atts['has_borders'];
	if( $clapat_has_borders == 'no'){
		
		$clapat_has_borders = false;
	}
	
	$out = '<ul class="clients-table';
	if( $clapat_has_borders ){
		
		$out .= ' has-borders';
	}
	if( $clapat_animation ){
		
		$out .= ' has-animation';
	}
	$out .= ' ' . esc_attr( $atts['extra_class_name'] ) . '"';
	if( $clapat_animation ){
		
		$out .= ' data-delay="'. esc_attr( $atts['animation_delay'] ) . '"';
	}
	$out .= '>';
	$out .= do_shortcode( $content );
	$out .= '</ul>';

	return $out;
}

add_shortcode('client_item', 'shortcode_client_item');
function shortcode_client_item($atts, $content = null) {

	$atts = shortcode_atts(array(
		'img_url'		=> '',
		'img_id'    	=> '',
		'client_url'	=> ''
	), $atts );

	$img_url 	= clapat_core_get_image_url($atts['img_id'], $atts['img_url']);
	
	$client_url = $atts['client_url'];
	
	$out = '';
	$out .= '<li class="link">';
	if( !empty( $client_url ) ){
	
		$out .= '<a target="_blank" href="' . esc_url( $client_url ) . '">';
	}
	$out .= '<img src="' . esc_url( $img_url ) . '" alt="client image" />';
	if( !empty( $client_url ) ){
		
		$out .= '</a>';
	}
	$out .= '</li>';

	return $out;
	
}
// end testimonials

//////////////////////////////////////////////////////////////////
// News List
//////////////////////////////////////////////////////////////////
add_shortcode('serano_news', 'shortcode_serano_news');
function shortcode_serano_news($atts, $content = null) {

	$atts = shortcode_atts(array(
		'items_no'			=> '3',
		'filter_category'   => ''
	), $atts );

	$serano_max_items		= $atts['items_no'];
	if( empty($serano_max_items) ){

		$serano_max_items = 1000;
	}

	$serano_blog_tax_query = null;
	$serano_blog_category_filter	= $atts['filter_category'];
	
	$serano_portfolio_tax_query = null;

	$serano_enable_ajax = false;
	if( function_exists( 'serano_get_theme_options' ) ){
		
		$serano_enable_ajax = serano_get_theme_options( 'clapat_serano_enable_ajax' );
	}
	
	$serano_array_terms = null;
	if( !empty( $serano_blog_category_filter ) ){

		$serano_array_terms = explode( ",", $serano_blog_category_filter );
		$serano_portfolio_tax_query = array(
											array(
												'taxonomy' 	=> 'category',
												'field'		=> 'slug',
												'terms'		=> $serano_array_terms,
												),
										);
	}

	$out = '';
	
	$serano_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$serano_args = array(
									'post_type' => 'post',
									'paged' => $serano_paged,
									'tax_query' => $serano_portfolio_tax_query,
									'posts_per_page' => $serano_max_items,
									 );

	$serano_portfolio = new WP_Query( $serano_args );

	$serano_current_item_count = 1;
	while( $serano_portfolio->have_posts() ){

		$serano_portfolio->the_post();
		
		$post_classes = get_post_class( 'post', get_the_ID() );
		
		$out .= '<article id="post-'. get_the_ID() . '" class="' . esc_attr( implode( ' ', $post_classes ) ) . '">';
		
		// article wrap
		$out .= '<div class="article-wrap">';
		
		// post image
		$serano_post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		if( $serano_post_image ){
			
			$out .= '<div class="hover-reveal">';
			$out .= '<div class="hover-reveal__inner">';
			$out .= '<div class="hover-reveal__img">';
			$alt_text = trim( strip_tags( get_post_meta( get_post_thumbnail_id( get_the_ID() ), '_wp_attachment_image_alt', true ) ) );
			$out .= '<img src="' . esc_url( $serano_post_image[0] ) .'" alt="' . $alt_text . '">';
			$out .= '</div>';
			$out .= '</div>';
			$out .= '</div>';
		}
		
		// post link
		if( $serano_enable_ajax ){
			$out .= '<a class="post-title ajax-link has-mask-fill" href="' . get_the_permalink() . '" data-type="page-transition" data-color="#000">' . get_the_title() . '</a>';
		}
		else {
			$out .= '<a class="post-title has-mask-fill" href="' . get_the_permalink() . '" data-color="#000">' . get_the_title() . '</a>';
		}
		
		// end article wrap
		$out .= '</div>';
		
		// article content
		$out .= '<div class="article-content">';
		
		// post categories
		$out .= '<div class="entry-meta-wrap">';
		$out .= '<div class="entry-meta entry-categories">';
		$out .= '<ul class="post-categories">';
		$serano_categories = get_the_category();
		if ( ! empty( $serano_categories ) ) {

			foreach( $serano_categories as $serano_category ) {

				$out .= '<li class="link">';
				if( $serano_enable_ajax ){
					$out .= wp_kses_post( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_category_link( $serano_category->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $serano_category->name ) . '">' . esc_html( $serano_category->name ) . '</span></a>');
				}
				else {
					$out .= wp_kses_post( '<a href="' . esc_url( get_category_link( $serano_category->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $serano_category->name ) . '">' . esc_html( $serano_category->name ) . '</span></a>');
				}
				$out .= '</li>';
			}
		}
		$out .= '</ul>';
		$out .= '</div>';
		$out .= '</div>';
		
		// post date
		$out .= '<div class="entry-meta-wrap">';
		$out .= '<ul class="entry-meta entry-date">';
		$out .= '<li class="link">';
		if( $serano_enable_ajax ){
			$out .= '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_the_permalink() ) .'"><span data-hover="' . get_the_date() . '">' . get_the_date() . '</span></a>';
		}
		else {
			$out .= '<a href="' . esc_url( get_the_permalink() ) .'"><span data-hover="' . get_the_date() . '">' . get_the_date() . '</span></a>';
		}
		$out .= '</li>';
		$out .= '</ul>';
		$out .= '</div>';
		
		// end article content
		$out .= '</div>';
		
		$out .= '</article>';
		
		$serano_current_item_count++;

	}

	wp_reset_postdata();
	
	return $out;
}

//////////////////////////////////////////////////////////////////
// Add shortcodes buttons to tinyMCE
//////////////////////////////////////////////////////////////////

add_action('init',          'init_shortcodes_menu');
add_action('admin_init',    'admin_init_shortcodes_menu');
	
function init_shortcodes_menu(){
	
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	
	// register the tinyMCE buttons in case visual composer is not installed 
	// otherwise just use the shortcodes from there
	if( function_exists('vc_map') ){

		return;
	}

	if ( get_user_option('rich_editing') == 'true' )
	{
		add_filter( 'mce_external_plugins', 'add_shortcode_plugins' );
		add_filter( 'mce_buttons', 'register_shortcode_menu_buttons' );
	}
}
	
function add_shortcode_plugins( $plugin_array ){

	$plugin_array['SeranoCoreShortcodes'] = SERANO_SHORTCODES_DIR_URL . '/include/shortcodes.js';
	return $plugin_array;
}
	
function register_shortcode_menu_buttons( $buttons ){
	
	array_push( $buttons, "|", 'clapat_shortcode_button' );
	return $buttons;
}
	
function admin_init_shortcodes_menu(){
	
	wp_localize_script( 'jquery', 'ShortcodeAttributes', array('shortcode_folder' => SERANO_SHORTCODES_DIR_URL . '/include' ) );
}