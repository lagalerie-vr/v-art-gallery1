<?php
/*
Template name: Portfolio Showcase
*/

get_header();

if ( have_posts() ){

	the_post();
	
	$serano_current_page_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-bknd-color' );

	$serano_portfolio_thumb_to_fullscreen = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-thumb-to-fullscreen' );
	if( !serano_get_theme_options('clapat_serano_enable_ajax') ){
		
		$serano_portfolio_thumb_to_fullscreen = 'no-fitthumbs';
	}
	$serano_portfolio_thumb_to_fullscreen_webgl_type = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-thumb-to-fullscreen-webgl-type' );

	// Portfolio Slider Autoplay
	$serano_portfolio_slider_autoplay = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-enable-slider-autoplay' );
	$serano_portfolio_slider_autoplay_delay = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-slider-autoplay-delay' );
	if( $serano_portfolio_slider_autoplay ){
		
		wp_localize_script( 'serano-scripts',
						'ClapatSliderOptions',
						array( 	"speed" 	=> $serano_portfolio_slider_autoplay_delay )
					);
	}
	
	$serano_showcase_tax_query = null;
	$serano_showcase_category_filter	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-filter-category' );

	if( !empty( $serano_showcase_category_filter ) ){

		$serano_array_terms = explode( ",", $serano_showcase_category_filter );
		$serano_showcase_tax_query = array(
											array(
												'taxonomy' 	=> 'portfolio_category',
												'field'		=> 'slug',
												'terms'		=> $serano_array_terms,
												),
										);
	}
?>

		<!-- Main -->
		<div id="main">

			<!-- Main Content -->
			<div id="main-content">

				<!-- Showcase Carousel Holder -->
				<div id="itemsWrapperLinks">
					<div id="itemsWrapper" class="<?php echo sanitize_html_class( $serano_portfolio_thumb_to_fullscreen ); ?> <?php echo sanitize_html_class( $serano_portfolio_thumb_to_fullscreen_webgl_type ); ?>">
						
						<!-- ClaPat Slider -->
						<div class="clapat-slider-wrapper showcase-slider<?php if( !serano_get_theme_options('clapat_serano_enable_ajax') ) { echo ' thumb-no-ajax'; } ?>">
							<div class="clapat-slider">

								<!-- ClaPat Main Slider -->
								<div class="clapat-slider-viewport">
								<?php

									$serano_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$serano_args = array(
														'post_type' => 'serano_portfolio',
														'paged' => $serano_paged,
														'tax_query' => $serano_showcase_tax_query,
														'posts_per_page' => 1000,
													);

									$serano_portfolio = new WP_Query( $serano_args );

									$serano_slides_count = 0;
									$serano_portfolio_items = array();
									while( $serano_portfolio->have_posts() ){

										$serano_portfolio->the_post();

										$serano_bknd_color			= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-bknd-color' );
										$serano_project_nav_color 	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-navigation-cursor-color' );
										
										$serano_change_header		= "";
										if( (($serano_current_page_bknd_color == "light-content") && ($serano_bknd_color == 'dark-content')) || 
											(($serano_current_page_bknd_color == "dark-content") && ($serano_bknd_color == 'light-content'))
										){
										
											$serano_change_header = "change-header";
										}
										
										$serano_hero_properties = new Serano_Hero_Properties();
										$serano_hero_properties->getProperties( get_post_type( get_the_ID() ) );

								?>

									<div class="clapat-slide <?php echo sanitize_html_class( $serano_change_header ); ?>" data-color="<?php echo esc_attr( $serano_project_nav_color ); ?>">
										<div class="slide-inner trigger-item">
											<div class="img-mask">
												<a class="slide-link" data-type="page-transition" href="<?php the_permalink(); ?>"></a>
												<div class="section-image trigger-item-link">
													<img src="<?php echo esc_url( $serano_hero_properties->image['url'] ); ?>" class="item-image grid__item-img" alt="<?php echo serano_get_image_alt( $serano_hero_properties->image['id'] ); ?>">
												</div>
												<img src="<?php echo esc_url( $serano_hero_properties->image['url'] ); ?>" class="grid__item-img grid__item-img--large" alt="<?php echo serano_get_image_alt( $serano_hero_properties->image['id'] ); ?>">
												<?php if( serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-video' ) ){

													$serano_video_webm_url 	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-video-webm' );
													$serano_video_mp4_url 	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-video-mp4' );
												?>
												<div class="hero-video-wrapper">
													<video playsinline loop muted class="bgvid">
													<?php if( !empty( $serano_video_mp4_url ) ) { ?>
														<source src="<?php echo esc_url( $serano_video_mp4_url ); ?>" type="video/mp4">
													<?php } ?>
													<?php if( !empty( $serano_video_webm_url ) ) { ?>
														<source src="<?php echo esc_url( $serano_video_webm_url ); ?>" type="video/webm">
													<?php } ?>
													</video>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>

								<?php

										$serano_portfolio_items[] = $serano_hero_properties;

										$serano_slides_count++;

									}

									wp_reset_postdata();
									
									serano_portfolio_thumbs_list( $serano_portfolio_items );

								?>
								</div>
								<!-- /ClaPat Main Slider -->
								
								<!-- ClaPat Caption Wrapper -->
								<div class="clapat-caption-wrapper">
									<div class="clapat-caption-inner">
                                    
										<!-- ClaPat Sync Slider Large Titles -->
										<div class="clapat-sync-slider large-titles fadeout-element">
											<div class="clapat-sync-slider-wrapper">
												<div class="clapat-sync-slider-viewport">

													<?php
													foreach( $serano_portfolio_items as $serano_hero_properties ){
													?>
													<div class="clapat-sync-slide">
														<div class="slide-title">
															<span><?php echo wp_kses( $serano_hero_properties->caption_title, 'serano_allowed_html' ); ?></span>
														</div>
													</div>
													<?php
													}
													?>
                                                            
												</div>
											</div>
										</div>
										<!--/ClaPat Sync Slider Large Titles -->

										<!-- ClaPat Sync Slider Small Titles -->
										<div class="clapat-sync-slider small-titles fadeout-element">
											<div class="clapat-sync-slider-wrapper">
												<div class="clapat-sync-slider-viewport">

													<?php
													foreach( $serano_portfolio_items as $serano_hero_properties ){
														
														$serano_item_categories = '';
														$serano_item_cats = get_the_terms( $serano_hero_properties->post_id, 'portfolio_category' );
														if($serano_item_cats){

															foreach($serano_item_cats as $item_cat) {

																$serano_item_categories .= $item_cat->name . ', ';
															}

															$serano_item_categories = rtrim( $serano_item_categories, ', ');

														}
													?>
													<div class="clapat-sync-slide">
														<div class="slide-subtitle">
															<span><?php echo wp_kses( $serano_item_categories, 'serano_allowed_html' ); ?></span>
														</div>
													</div>
													<?php
													}
													?>
                                                            
												</div>
											</div>
										</div>
										<!--/ClaPat Sync Slider Small Titles -->
                                                
									</div>    
								</div>
								<!--/ClaPat Caption Wrapper -->
								
							</div>
                                    
							<div class="clapat-pagination fadeout-element"></div>
							
						</div>
						<!-- /ClaPat Slider -->
						
					</div>
				</div>
				<!-- /Showcase Carousel Holder -->

			</div>
			<!--/Main Content -->

		</div>
		<!--/Main -->

<?php

}

get_footer();

?>