<?php
/*
Template name: Portfolio Showcase Gallery
*/
get_header();

if ( have_posts() ){

the_post();

$serano_portfolio_tax_query = null;
$serano_portfolio_category_filter	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-filter-category' );

$serano_portfolio_thumb_to_fullscreen	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-thumb-to-fullscreen' );
if( !serano_get_theme_options('clapat_serano_enable_ajax') ){
	
	$serano_portfolio_thumb_to_fullscreen = 'no-fitthumbs';
}
$serano_portfolio_thumb_to_fullscreen_webgl_type = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-thumb-to-fullscreen-webgl-type' );

$serano_page_hero_properties = new Serano_Hero_Properties();
$serano_page_hero_properties->getProperties( get_post_type( get_the_ID() ) );
if( $serano_page_hero_properties->enabled ){

	$serano_page_hero_title = $serano_page_hero_properties->caption_title;
	$serano_page_hero_subtitle = $serano_page_hero_properties->caption_subtitle;
}
else {
	
	$serano_page_hero_title = get_the_title();
	$serano_page_hero_subtitle = "";
}

$serano_array_terms = null;
if( !empty( $serano_portfolio_category_filter ) ){

	$serano_array_terms = explode( ",", $serano_portfolio_category_filter );
	$serano_portfolio_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'		=> 'slug',
											'terms'		=> $serano_array_terms,
											),
									);
}

// Select all portfolio items
$serano_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$serano_args = array(
					'post_type' => 'serano_portfolio',
					'paged' => $serano_paged,
					'tax_query' => $serano_portfolio_tax_query,
					'posts_per_page' => 1000,
					 );

$serano_portfolio = new WP_Query( $serano_args );

$serano_portfolio_items = array();

// collect the posts first
$serano_current_item_count = 1;
while( $serano_portfolio->have_posts() ){

	$serano_portfolio->the_post();

	$serano_hero_properties = new Serano_Hero_Properties();
	$serano_hero_properties->getProperties( get_post_type( get_the_ID() ) );
	$serano_hero_properties->item_no = $serano_current_item_count;
	$serano_portfolio_items[] = $serano_hero_properties;

	$serano_current_item_count++;

}

wp_reset_postdata();

// we need to have at least 8 portfolio items so we can evenly distribute them to the gallery columns
$serano_portfolio_gallery_items = $serano_portfolio_items;
while( count( $serano_portfolio_gallery_items ) < 8 ){
	
	$serano_portfolio_gallery_items = array_merge( $serano_portfolio_gallery_items, $serano_portfolio_items );
}
if( count( $serano_portfolio_items ) < 8 ){
	
	// the number of the original portfolio items is less than 8 so there was some cloning going on to make up the numbers
	// trim back to 8
	$serano_portfolio_gallery_items  = array_slice($serano_portfolio_gallery_items, 0, 8);
}

serano_portfolio_thumbs_list( $serano_portfolio_gallery_items );

// distribute the items to the gallery columns
$serano_count_gallery_items = count( $serano_portfolio_gallery_items );
$serano_main_slider_items = array();
$serano_sync_slider1_items = array();
$serano_sync_slider2_items = array();
$serano_sync_slider3_items = array();
$serano_iterator_gallery_items = 0;
while( $serano_iterator_gallery_items < $serano_count_gallery_items ){

	$serano_gallery_item = $serano_portfolio_gallery_items[$serano_iterator_gallery_items];
	
	if( $serano_iterator_gallery_items < 2 ){
		
		array_push( $serano_main_slider_items,  $serano_gallery_item );
	}
	else if(  $serano_iterator_gallery_items < 4 ){
		
		array_push( $serano_sync_slider2_items,  $serano_gallery_item );
	}
	else if(  $serano_iterator_gallery_items < 6 ){
		
		array_push( $serano_sync_slider3_items,  $serano_gallery_item );
	}
	else if(  $serano_iterator_gallery_items < 8 ){
		
		array_push( $serano_sync_slider1_items,  $serano_gallery_item );
	}
	else if(  $serano_iterator_gallery_items ==  ($serano_count_gallery_items-1) ){
	
		// last item always goes to sync slider 3
		array_push( $serano_sync_slider3_items,  $serano_gallery_item );
	}
	else {
		
		$serano_paged = $serano_iterator_gallery_items % 4;
		if( $serano_paged == 0 ){
			
			array_push( $serano_sync_slider1_items,  $serano_gallery_item );
		}
		else if( $serano_paged == 1 ){
			
			array_push( $serano_main_slider_items,  $serano_gallery_item );
		}
		else if( $serano_paged == 2 ){
			
			array_push( $serano_sync_slider2_items,  $serano_gallery_item );
		}
		else if( $serano_paged == 3 ){
			
			array_push( $serano_sync_slider3_items,  $serano_gallery_item );
		}
		
	}
	
		
	$serano_iterator_gallery_items++;
}

if( !function_exists('serano_showcase_gallery_portfolio_item') ){
	
	function serano_showcase_gallery_portfolio_item( $portfolio_item_param, $sync_slide = true ){
		
		$serano_hero_image 					= $portfolio_item_param->image;
		$serano_background_type 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-bknd-color' );
		$serano_background_color 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-bknd-color-code' );
		$serano_background_navigation		= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-navigation-cursor-color' );
		$serano_caption_title				= $portfolio_item_param->caption_title;
		$serano_caption_subtitle			= $portfolio_item_param->caption_subtitle;
		$serano_page_caption_first_line		= serano_get_theme_options( 'clapat_serano_view_project_caption_first' );
		$serano_page_caption_second_line	= serano_get_theme_options( 'clapat_serano_view_project_caption_second' );
		

		$serano_item_classes = ' ';
		$serano_item_categories = '';
		$serano_item_cats = get_the_terms( $portfolio_item_param->post_id, 'portfolio_category' );
		if($serano_item_cats){

			foreach($serano_item_cats as $item_cat) {
				
				$serano_item_classes .= $item_cat->slug . ' ';
				$serano_item_categories .= $item_cat->name . ', ';
			}

			$serano_item_categories = rtrim( $serano_item_categories, ', ');

		}
			
		$item_url = get_the_permalink( $portfolio_item_param->post_id );
		
		$serano_change_header = "";
		$serano_current_page_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-bknd-color' );
		if( (($serano_current_page_bknd_color == "light-content") && ($serano_background_type  == 'dark-content')) || 
			(($serano_current_page_bknd_color == "dark-content") && ($serano_background_type  == 'light-content'))
		){
								
			$serano_change_header = "change-header";
		}

		?>
											<?php if( !$sync_slide ){ ?>
											<div class="clapat-slide flip-slide">
											<?php } else { ?>
											<div class="clapat-sync-slide flip-slide">
											<?php } ?>
												<div class="slide-inner <?php echo esc_attr( $serano_item_classes ); ?>" data-color="<?php echo esc_attr( $serano_background_navigation ); ?>">
													<div class="trigger-item <?php echo sanitize_html_class( $serano_change_header ); ?>">
														<div class="img-mask">
															<a class="slide-link" data-type="page-transition" href="<?php echo esc_url( $item_url ); ?>"></a>
															<div class="section-image trigger-item-link">
																<img src="<?php echo esc_url( $serano_hero_image['url'] ); ?>" class="item-image grid__item-img" alt="<?php echo esc_attr( serano_get_image_alt(  $serano_hero_image['id'] ) ); ?>">
																<?php if( $portfolio_item_param->video ){ ?>
																<div class="hero-video-wrapper">
																	<video playsinline loop muted class="bgvid">
																	<?php if( !empty( $portfolio_item_param->video_mp4 ) ){ ?>
																		<source src="<?php echo esc_url( $portfolio_item_param->video_mp4 ); ?>" type="video/mp4">
																	<?php } ?>
																	<?php if( !empty( $portfolio_item_param->video_webm ) ){ ?>
																		<source src="<?php echo esc_url( $portfolio_item_param->video_webm ); ?>" type="video/webm">
																	<?php } ?>
																	</video>
																</div>
																<?php } ?>
															</div> 
															<img src="<?php echo esc_url( $serano_hero_image['url'] ); ?>" class="grid__item-img grid__item-img--large" alt="<?php echo esc_attr( serano_get_image_alt(  $serano_hero_image['id'] ) ); ?>">
														</div>
														<div class="slide-caption fadeout-element">
															<div class="slide-title"><?php echo wp_kses( $serano_caption_title, 'serano_allowed_html' ); ?></div>
															<div class="slide-cat"><span><?php echo wp_kses( $serano_item_categories, 'serano_allowed_html' ); ?></span></div>
														</div>
													</div>
												</div>
											</div>
											
		<?php
	}
	
}

?>

			<!-- Main -->
			<div id="main">
			
				<!-- Main Content -->
				<div id="main-content">

					<!-- Showcase Slider Holder -->
					<div id="itemsWrapperLinks">
						<!-- Showcase Columns -->
						<div id="itemsWrapper" class="<?php echo sanitize_html_class( $serano_portfolio_thumb_to_fullscreen ); ?> <?php echo sanitize_html_class( $serano_portfolio_thumb_to_fullscreen_webgl_type ); ?>">
							
							<!-- ClaPat Slider -->
							<div class="clapat-slider-wrapper showcase-gallery">
								<div class="clapat-slider">
								
									 <!-- ClaPat Main Slider -->
									<div class="clapat-slider-viewport">
									<?php
										
										foreach( $serano_main_slider_items as $serano_portfolio_item ){
											
											serano_showcase_gallery_portfolio_item( $serano_portfolio_item, false );
										}
										
									?>
									</div>
									 <!-- /ClaPat Main Slider -->
									 
									<!-- ClaPat Sync Slider -->
									<div class="clapat-sync-slider sync-one">
										<div class="clapat-sync-slider-wrapper">
											<div class="clapat-sync-slider-viewport">
											<?php
										
												foreach( $serano_sync_slider1_items as $serano_portfolio_item ){
													
													serano_showcase_gallery_portfolio_item( $serano_portfolio_item );
												}
												
											?>
											</div>
										</div>
									</div>
									<!-- /ClaPat Sync Slider -->
									
									<!-- ClaPat Sync Slider -->
									<div class="clapat-sync-slider sync-two">
										<div class="clapat-sync-slider-wrapper">
											<div class="clapat-sync-slider-viewport">
											<?php
										
												foreach( $serano_sync_slider2_items as $serano_portfolio_item ){
													
													serano_showcase_gallery_portfolio_item( $serano_portfolio_item );
												}
												
											?>
											</div>
										</div>
									</div>
									<!-- /ClaPat Sync Slider -->
									
									<!-- ClaPat Sync Slider -->
									<div class="clapat-sync-slider sync-three">
										<div class="clapat-sync-slider-wrapper">
											<div class="clapat-sync-slider-viewport">
											<?php
										
												foreach( $serano_sync_slider3_items as $serano_portfolio_item ){
													
													serano_showcase_gallery_portfolio_item( $serano_portfolio_item );
												}
												
											?>
											</div>
										</div>
									</div>
									<!-- /ClaPat Sync Slider -->
									
								</div>
							</div>
							<!-- /ClaPat Slider -->
							
							<div class="slider-fixed-content">
								<div class="close-thumbnail"></div>
								<div class="open-thumbnail"></div>
							</div>
							
						</div>	
						<!--/Showcase Columns -->
					</div>
					<!--/Showcase Slider Holder -->
						
					
				</div>
				<!-- /Main Content -->
			</div>
			<!--/Main -->
<?php

}

get_footer();

?>
