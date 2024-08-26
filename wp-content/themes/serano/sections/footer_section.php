			<?php
			if ( function_exists( 'elementor_theme_do_location' ) ){
				
				elementor_theme_do_location( 'footer' );
			}
			?>
			<!-- Footer -->
			<footer class="hidden">
				<div id="footer-container">

				<?php if( serano_get_theme_options( 'clapat_serano_enable_back_to_top' ) ){?>
					<?php if( serano_display_back_to_top() ){ ?>
					<div id="backtotop" class="button-wrap left">
						<div class="icon-wrap parallax-wrap">
							<div class="button-icon parallax-element">
								<i class="arrow-icon-up"></i>
							</div>
						</div>
						<div class="button-text sticky left"><span data-hover="<?php echo esc_attr( serano_get_theme_options( 'clapat_serano_back_to_top_caption' ) ); ?>"><?php echo wp_kses( serano_get_theme_options( 'clapat_serano_back_to_top_caption' ), 'serano_allowed_html' ); ?></span></div>
					</div>
					<?php } ?>
				<?php } ?>

				<?php if( serano_display_copyright() ){
					if( serano_get_theme_options('clapat_serano_footer_copyright') ){ ?>
					<div class="footer-middle"><div class="copyright"><?php echo wp_kses( serano_get_theme_options('clapat_serano_footer_copyright'), 'serano_allowed_html' ); ?></div></div>
				<?php }
				}	?>

				<?php if( is_page_template('portfolio-showcase-page.php') ||
						is_page_template('portfolio-list-page.php')) {

						get_template_part('sections/showcase_navigation_section');
					} 
				?>
					
				<?php if( is_page_template('portfolio-carousel-page.php') ) {

						get_template_part('sections/carousel_navigation_section');
					} 
				?>
				
				<?php if( is_page_template('portfolio-showcase-grid-page.php') || is_page_template('portfolio-showcase-gallery-page.php') ) {

						get_template_part('sections/showcase_grid_filters_section');
					} 
				?>
				
				<?php if( is_page_template('portfolio-reverse-columns-page.php') ) {

						get_template_part('sections/reverse_columns_navigation_section');
					} 
				?>

				<?php
					if( display_footer_social_links_section() ){

						get_template_part('sections/footer_social_links_section');
					}
				?>

				</div>
			</footer>
			<!--/Footer -->

		</div>