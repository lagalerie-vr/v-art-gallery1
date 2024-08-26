<?php
/*
Template name: Portfolio Reverse Columns
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

serano_portfolio_thumbs_list( $serano_portfolio_items );

wp_reset_postdata();

if( !function_exists('serano_reverse_column_portfolio_item') ){
	
	function serano_reverse_column_portfolio_item( $portfolio_item_param, $hidden_param = false, $sync_param = false){
		
		$serano_hero_image 					= $portfolio_item_param->image;
		$serano_background_type 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-bknd-color' );
		$serano_background_color 			= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-bknd-color-code' );
		$serano_background_navigation		= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-navigation-cursor-color' );
		$serano_caption_title				= $portfolio_item_param->caption_title;
		$serano_caption_subtitle			= $portfolio_item_param->caption_subtitle;
		$serano_page_caption_first_line		= serano_get_theme_options( 'clapat_serano_view_project_caption_first' );
		$serano_page_caption_second_line	= serano_get_theme_options( 'clapat_serano_view_project_caption_second' );
		$serano_project_year				=  serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-project-year' );
		$serano_thumbnail_type 				= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-thumb-size' );
		$serano_thumbnail_alignment			= serano_get_post_meta( SERANO_THEME_OPTIONS, $portfolio_item_param->post_id, 'serano-opt-portfolio-thumb-alignment' );

		$serano_item_classes = $serano_thumbnail_type . ' ';
		$serano_item_classes .= $serano_thumbnail_alignment . ' ';
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
											<div class="<?php if( $sync_param ) echo 'clapat-sync-slide'; else echo 'clapat-slide'; ?><?php if( $hidden_param ) echo ' hidden-element'; ?>">
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
                                                            <div class="slide-date"><span><?php echo wp_kses( $serano_project_year, 'serano_allowed_html' ); ?></span></div>                                            
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
							<div class="clapat-slider-wrapper showcase-reverse">
								<div class="clapat-slider">
								
									<!-- ClaPat Main Slider-->
									<div class="clapat-slider-viewport">
									<?php
										
										$serano_portfolio_items = serano_portfolio_thumbs_list();
										
										if( !empty( $serano_portfolio_items ) ){
										
											if( count($serano_portfolio_items) > 1 ){
												
												list( $serano_start_column_items, $serano_reverse_column_items ) = array_chunk( $serano_portfolio_items, ceil(count($serano_portfolio_items) / 2) );
											}
											else {
												
												$serano_start_column_items = $serano_reverse_column_items = $serano_portfolio_items;
											}
											
											// get the last  element from the first column and add it as first
											$serano_start_column_item_last = array_pop( $serano_start_column_items );
											
											serano_reverse_column_portfolio_item( $serano_start_column_item_last,  true, false );
											
											foreach( $serano_start_column_items as $serano_portfolio_item ){
												
												serano_reverse_column_portfolio_item( $serano_portfolio_item, false, false );
											}
										}
										?>
									</div>
									<!-- /ClaPat Main Slider-->
									
									<!-- ClaPat Sync Slider -->
									<div class="clapat-sync-slider">
										<div class="clapat-sync-slider-wrapper">
                                        	<div class="clapat-sync-slider-viewport">
											<?php
											
											$serano_first_el = true;
											if( !empty( $serano_reverse_column_items ) ){
												
												foreach( $serano_reverse_column_items as $serano_portfolio_item ){
												
													serano_reverse_column_portfolio_item( $serano_portfolio_item, $serano_first_el, true );
													$serano_first_el = false;
												}
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
								<div id="slide-inner-temporary" class="fadeout-element">
									<div id="slide-inner-caption" class="content-max-width text-align-center block-title">
										<div class="inner">
											<h1 class="slide-hero-title"><?php echo wp_kses( $serano_page_hero_title, 'serano_allowed_html' ); ?></h1>
											<?php if( !empty( $serano_page_hero_subtitle ) ) { ?>
											<h6 class="slide-hero-subtitle"><?php echo wp_kses( $serano_page_hero_subtitle, 'serano_allowed_html' ); ?></h6>
											<?php } ?>
										</div>
									</div> 
								</div>
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