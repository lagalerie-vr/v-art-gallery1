<?php

$serano_current_item_count = get_query_var('serano_query_var_item_count');
$serano_portfolio_items = serano_portfolio_thumbs_list();

// validate the current portfolio index
if( array_key_exists( $serano_current_item_count-1, $serano_portfolio_items ) ) {
	
	$serano_portfolio_item = $serano_portfolio_items[$serano_current_item_count-1];
	
	$serano_hero_properties = new Serano_Hero_Properties();
	$serano_hero_properties->post_id = $serano_portfolio_item->post_id;
	$serano_hero_properties->getProperties( 'serano_portfolio' );
	
	$serano_hero_image 					= $serano_hero_properties->image;
	$serano_background_type 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-bknd-color' );
	$serano_background_color 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-bknd-color-code' );
	$serano_background_navigation	= serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-navigation-cursor-color' );
	$serano_caption_title					= $serano_hero_properties->caption_title;
	$serano_caption_subtitle				= $serano_hero_properties->caption_subtitle;
	$serano_page_caption_first_line	= serano_get_theme_options( 'clapat_serano_view_project_caption_first' );
	$serano_page_caption_second_line	= serano_get_theme_options( 'clapat_serano_view_project_caption_second' );
	$serano_project_year					=  serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-project-year' );
	$serano_thumbnail_type 				= serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-thumb-size' );
	$serano_thumbnail_alignment		= serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-thumb-alignment' );

	$serano_item_classes = $serano_thumbnail_type . ' ';
	$serano_item_classes .= $serano_thumbnail_alignment . ' ';
	$serano_item_categories = '';
	$serano_item_cats = get_the_terms( $serano_portfolio_item->post_id, 'portfolio_category' );
	if($serano_item_cats){

		foreach($serano_item_cats as $item_cat) {
			
			$serano_item_classes .= $item_cat->slug . ' ';
			$serano_item_categories .= $item_cat->name . ', ';
		}

		$serano_item_categories = rtrim( $serano_item_categories, ', ');

	}
		
	$item_url = get_the_permalink( $serano_portfolio_item->post_id );
	
	$serano_change_header = "";
	$serano_current_page_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-bknd-color' );
	if( (($serano_current_page_bknd_color == "light-content") && ($serano_background_type  == 'dark-content')) || 
		(($serano_current_page_bknd_color == "dark-content") && ($serano_background_type  == 'light-content'))
	){
							
		$serano_change_header = "change-header";
	}
	if( !empty( $serano_change_header ) ){
	
		$serano_item_classes .= ' ' . $serano_change_header;
	}
?>
						<div class="slide-inner trigger-item <?php echo esc_attr( $serano_item_classes ); ?>" data-color="<?php echo esc_attr( $serano_background_navigation ); ?>">
							<div class="img-mask">
								<a class="slide-link" data-type="page-transition" href="<?php echo esc_url( $item_url ); ?>"></a>
								<div class="section-image trigger-item-link">
									<img src="<?php echo esc_url( $serano_hero_image['url'] ); ?>" class="item-image grid__item-img" alt="<?php echo esc_attr( serano_get_image_alt(  $serano_hero_image['id'] ) ); ?>">
								</div>
								<img src="<?php echo esc_url( $serano_hero_image['url'] ); ?>" class="grid__item-img grid__item-img--large" alt="<?php echo esc_attr( serano_get_image_alt(  $serano_hero_image['id'] ) ); ?>">                              
								<?php if( $serano_hero_properties->video ){ ?>
								<div class="hero-video-wrapper">
									<video playsinline loop muted class="bgvid">
									<?php if( !empty( $serano_hero_properties->video_mp4 ) ){ ?>
										<source src="<?php echo esc_url( $serano_hero_properties->video_mp4 ); ?>" type="video/mp4">
									<?php } ?>
									<?php if( !empty( $serano_hero_properties->video_webm ) ){ ?>
										<source src="<?php echo esc_url( $serano_hero_properties->video_webm ); ?>" type="video/webm">
									<?php } ?>
									</video>
								</div>
								<?php } ?>
							</div>
							<div class="slide-caption">
								<div class="slide-title"><?php echo wp_kses( $serano_caption_title, 'serano_allowed_html' ); ?></div>
								<div class="slide-cat"><span><?php echo wp_kses( $serano_item_categories, 'serano_allowed_html' ); ?></span></div>
								<div class="slide-date"><span><?php echo wp_kses( $serano_project_year, 'serano_allowed_html' ); ?></span></div>                                                    
							</div>
						</div>
<?php

}
?>
