<?php

if ( ! class_exists( 'Serano_Hero_Properties' ) ) {

	class Serano_Hero_Properties
	{
		public $post_id;
		public $enabled;
		public $share;
		public $caption_title;
		public $caption_subtitle;
		public $desc;
		public $scroll_position;
		public $alignment;
		public $width;
		public $image;
		public $foreground;
		public $video;
		public $video_webm;
		public $video_mp4;
		public $scroll_down_caption;
		public $tagline;
		public $info_text;
		public $item_no;
		public $change_header_color;
		public $view_project_url;
		public $view_project_caption;

		public function __construct(){

			$this->post_id = "";
			$this->enabled = false;
			$this->share = false;
			$this->caption_title = "";
			$this->caption_subtitle = "";
			$this->desc = "";
			$this->scroll_position = esc_attr("parallax-scroll-caption");
			$this->alignment = esc_attr("text-align-center");
			$this->width = esc_attr("content-full-width");
			$this->image = true;
			$this->foreground= esc_attr('light-content');
			$this->video = false;
			$this->video_webm = "";
			$this->video_mp4 = "";
			$this->scroll_down_caption = "";
			$this->tagline = "";
			$this->info_text = "";
			$this->item_no = 1;
			$this->view_project_url = "";
			$this->view_project_caption = "";
		}

		public function getProperties( $post_type ){

			if( empty( $this->post_id ) ){
				
				$this->post_id = get_the_ID();
			}

			if( $post_type == 'serano_portfolio' ){

				$this->enabled 			= true; // in portfolio projects hero is always enabled and the hero image will be displayed in showcase slider
				$this->share 			= true; // only in portfolio projects you have the sharing on social networks section
				$this->image		 	= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-hero-img' );
				$title_row				= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-hero-caption-title' );
				$title_list				= preg_split('/\r\n|\r|\n/', $title_row);
				$this->caption_title	= "";
				foreach( $title_list as $title_bit ){
					
					$this->caption_title .= $this->titleWrap( $title_bit );
				}
				$subtitle_row			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-hero-caption-subtitle' );
				$subtitle_list			= preg_split('/\r\n|\r|\n/', $subtitle_row);
				$this->caption_subtitle	= "";
				foreach( $subtitle_list as $subtitle_bit ){
					
					$this->caption_subtitle .= $this->subtitleWrap( $subtitle_bit );
				}
				$this->info_text = serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-hero-info-text' );
				$this->scroll_position 	= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-hero-parallax-caption' );
				if( $this->image && !empty( $this->image['url'] ) ){
					
					$this->scroll_position = "";
				}
				$this->alignment 		= esc_attr("text-align-center");
				$this->width	 		= esc_attr("content-max-width");
				$this->foreground 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-bknd-color' );
				$this->video 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-video' );
				$this->video_webm 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-video-webm' );
				$this->video_mp4 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-video-mp4' );
				$this->scroll_down_caption = "";
				$this->tagline = "";
				$this->view_project_caption = serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-view-project-caption' );
				$this->view_project_url = serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-portfolio-view-project-url' );

			} else if( $post_type == 'post' ){

				$this->enabled = true; // the hero section is always enabled in case of blog posts, displaying post title and categories
				$this->caption_title 	= get_the_title();
				$this->caption_subtitle	= serano_blog_post_hero_caption();
				$this->alignment 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-blog-hero-caption-alignment' );
				$this->foreground 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-blog-bknd-color' );
				$this->image		 	= null;

			} 
			else if( !empty( $post_type ) ){

				$this->enabled 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-enable-hero' );

				$this->image		 	= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-img' );
				$title_row				= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-caption-title' );
				$title_list				= preg_split('/\r\n|\r|\n/', $title_row);
				$this->caption_title	= "";
				foreach( $title_list as $title_bit ){
					
					$this->caption_title .= $this->titleWrap( $title_bit );
				}
				$subtitle_row			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-caption-subtitle' );
				$subtitle_list			= preg_split('/\r\n|\r|\n/', $subtitle_row);
				$this->caption_subtitle = "";
				foreach( $subtitle_list as $subtitle_bit ){
					
					$this->caption_subtitle .= $this->subtitleWrap( $subtitle_bit );
				}
				$this->scroll_position 	= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-parallax-caption' );
				if( $this->image && !empty( $this->image['url'] ) ){
					
					$this->scroll_position = "";
				}
				$this->alignment 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-caption-align' );
				$this->width 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-caption-width' );
				$this->foreground 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-bknd-color' );
				$this->video 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-video' );
				$this->video_webm 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-video-webm' );
				$this->video_mp4 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-video-mp4' );
				$this->scroll_down_caption = serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-scroll-caption' );
				$this->tagline 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-caption-tagline' );
				$this->info_text 		= serano_get_post_meta( SERANO_THEME_OPTIONS, $this->post_id, 'serano-opt-page-hero-info-text' );				
			}
			
		}

		protected function titleWrap( $title ){
			
			if( !empty( $title ) ){
					
				$title	= '<span>' . $title . '</span>';
			}
			
			return $title;
		}
		
		protected function subtitleWrap( $subtitle ){
			
			if( !empty( $subtitle ) ){
					
				$subtitle	= '<span>' . $subtitle . '</span>';
			}
			
			return $subtitle;
		}
	}
}

$serano_hero_properties = new Serano_Hero_Properties();

?>
