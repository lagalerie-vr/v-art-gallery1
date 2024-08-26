<?php
/*
Template name: Portfolio Showcase Grid
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
							<div class="clapat-slider-wrapper showcase-portfolio">
								<div class="clapat-slider">
								
									<!-- ClaPat Slider Viewport-->
									<div class="clapat-slider-viewport">
									<?php
										
										$serano_portfolio_items = serano_portfolio_thumbs_list();
										
										if( !empty( $serano_portfolio_items ) ){
											
										?>
										<div class="clapat-slide space-left hero-intro">
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
											<?php
											// check if there is an even or odd number of items, the last two items are part of the intro slide
											$serano_even_portfolio_items = (count( $serano_portfolio_items ) % 2 == 0);
											$serano_items_count = count( $serano_portfolio_items );
																																	
											if( $serano_even_portfolio_items ){
												
												$serano_current_item_count = $serano_items_count - 1;
												set_query_var('serano_query_var_item_count', $serano_current_item_count);
												
												get_template_part('sections/portfolio_section_item');
																							
											}
											
											$serano_current_item_count = $serano_items_count;
											set_query_var('serano_query_var_item_count', $serano_current_item_count);
												
											get_template_part('sections/portfolio_section_item');
											?>
										</div>
										
										<?php
											$serano_space_between = true;
											$serano_intro_slides = 1;
											if( $serano_even_portfolio_items ){
												
												 // if there is an even number of items, the last two items are part of the intro slide
												$serano_intro_slides = 2;
											}
											for( $idx = 1; $idx <= ($serano_items_count-$serano_intro_slides); $idx++ ) {
												
												$serano_current_item_count = $idx;
												
												// we must include every two items in a clapat slide
												// every odd item we open a new slide div
												if( ($serano_current_item_count % 2) != 0 ){
												?>
												<div class="clapat-slide <?php if( $serano_space_between ) echo "space-between"; else echo "space-around"; ?>">
												<?php
												
													$serano_space_between = !$serano_space_between;
												}
																								
												set_query_var('serano_query_var_item_count', $serano_current_item_count);
													
												get_template_part('sections/portfolio_section_item');
												
												// every even item we close the slide div
												if( ($serano_current_item_count % 2) == 0 ){
												?>
												</div>
												<?php
												}
											}
										}
										?>
									</div>
									<!-- /ClaPat Slider Viewport-->
									
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
