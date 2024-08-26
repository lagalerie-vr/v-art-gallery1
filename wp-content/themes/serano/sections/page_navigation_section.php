 <?php

	$serano_next_page_nav_id			= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-navigation-next-page' );
	$serano_page_nav_enable				= !empty( $serano_next_page_nav_id );
	$serano_page_caption_first_line		= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-page-navigation-caption-first-line' );
	$serano_page_caption_second_line	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-page-navigation-caption-second-line' );
	$serano_next_page_caption_width		= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-navigation-caption-width' );
	$serano_next_page_caption_align		= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-navigation-caption-align' );
	
	$serano_next_url					= get_permalink( $serano_next_page_nav_id );
	
	$serano_hero_properties 			= new Serano_Hero_Properties();
	$serano_hero_properties->post_id	= $serano_next_page_nav_id;
	$serano_hero_properties->getProperties( get_post_type( $serano_next_page_nav_id ) );
	$serano_next_hero_title				= $serano_hero_properties->caption_title;
	$serano_next_hero_subtitle			= $serano_hero_properties->caption_subtitle;
	if( !$serano_hero_properties->enabled ){
		
		$serano_next_hero_title 		= '<span>' . get_the_title( $serano_next_page_nav_id ) . '</span>';
		$serano_next_hero_subtitle		= "";
	}
	$serano_url_class = "next-ajax-link-page";
	if( !$serano_hero_properties->enabled && !serano_get_theme_options( 'clapat_serano_enable_page_title_as_hero' ) ){
		
		// This is a page without hero section so a seamless AJAX transition is not possible
		$serano_url_class = "ajax-link";
	}
	
	// Get the next page title & subtitle captions; if they are empty use the hero section of the next page
	$serano_page_caption_title			= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-navigation-caption-title' );
	if( empty( $serano_page_caption_title ) ){
		
		$serano_page_caption_title = $serano_next_hero_title;
	}
	else {
		
		$title_row	= $serano_page_caption_title;
		$title_list	= preg_split('/\r\n|\r|\n/', $title_row);
		$serano_page_caption_title	= "";
		foreach( $title_list as $title_bit ){
					
			$serano_page_caption_title .= '<span>' . $title_bit . '</span>';
		}
	}
	
	$serano_page_caption_subtitle		= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-navigation-caption-subtitle' );
	if( empty( $serano_page_caption_subtitle ) ){
		
		$serano_page_caption_subtitle = $serano_next_hero_subtitle;
	}
	else {
		
		$title_row	= $serano_page_caption_subtitle;
		$title_list	= preg_split('/\r\n|\r|\n/', $title_row);
		$serano_page_caption_subtitle	= "";
		foreach( $title_list as $title_bit ){
					
			$serano_page_caption_subtitle .= '<span>' . $title_bit . '</span>';
		}
	}

	if( $serano_page_nav_enable ){
?>
				<!-- Page Navigation --> 
				<div id="page-nav">
					<div class="page-nav-wrap">
						<div class="page-nav-caption <?php echo esc_attr( $serano_next_page_caption_width ); ?> <?php echo esc_attr( $serano_next_page_caption_align ); ?>">
							<div class="inner">
								<?php if( !empty( $serano_page_caption_subtitle ) ){ ?>
								<div class="next-hero-subtitle"><?php echo wp_kses( $serano_page_caption_subtitle, 'serano_allowed_html' ); ?></div>
								<?php } ?>
								<a class="page-title <?php echo esc_attr( $serano_url_class ); ?>" href="<?php echo esc_url( $serano_next_url ); ?>" data-type="page-transition" data-firstline="<?php echo esc_attr( $serano_page_caption_first_line ); ?>" data-secondline="<?php echo esc_attr( $serano_page_caption_second_line ); ?>">
									<div class="next-hero-title"><?php echo wp_kses( $serano_page_caption_title, 'serano_allowed_html' ); ?></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--/Page Navigation -->
<?php } ?>
