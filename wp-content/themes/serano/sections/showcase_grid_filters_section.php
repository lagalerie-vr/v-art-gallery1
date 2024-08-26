							<!-- Filters -->
							<div id="filters-wrapper">
								<div class="active-filter-bg"></div>
								<ul id="filters">
									<li class="filters-timeline link"><a id="all" href="#" data-filter="*" class="active hide-ball"><?php echo wp_kses( serano_get_theme_options( 'clapat_serano_portfolio_filter_all_caption' ), 'serano_allowed_html' ); ?></a></li>
									<?php
										
									// check if the category filter is specified in page options
									$serano_portfolio_category_filter	= serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-portfolio-filter-category' );

									$serano_portfolio_category = null;
									if( !empty( $serano_portfolio_category_filter ) ){
					
										$serano_portfolio_category = array();
										$serano_category_slugs = explode( ",", $serano_portfolio_category_filter );
										foreach( $serano_category_slugs as $serano_category_slug ){
														
											$serano_category_object = get_term_by( 'slug', $serano_category_slug, 'portfolio_category' );
											if( $serano_category_object ){
															
												array_push( $serano_portfolio_category, $serano_category_object );
											}
										}
									}
									else {

										$serano_portfolio_category = get_terms('portfolio_category', array( 'hide_empty' => 0 ));
									}

									if( $serano_portfolio_category ){

										foreach( $serano_portfolio_category as $portfolio_cat ){

										?>
										<li class="filters-timeline link"><a href="#" data-filter=".<?php echo sanitize_title( $portfolio_cat->slug ); ?>" class="hide-ball"><?php echo wp_kses( $portfolio_cat->name, 'serano_allowed_html' ); ?></a></li>
										<?php

										}
									}

									?>
								</ul>
								<div id="close-filters"></div>
								<div class="toggle-filters"><?php echo wp_kses( serano_get_theme_options('clapat_serano_portfolio_show_filters_caption'), 'serano_allowed_html' ); ?></div>
							</div>
							<!-- Filters -->