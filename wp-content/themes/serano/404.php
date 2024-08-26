<?php

get_header();

?>
	
		<!-- Hero -->
		<div id="hero" class="error">
			<div id="hero-styles">
				<!-- Hero Caption -->
				<div id="hero-caption">
					<div class="inner text-align-center">
						<div class="404caption">
							<div class="hero-title caption-timeline"><span><?php echo wp_kses( serano_get_theme_options('clapat_serano_error_title'), 'serano_allowed_html' ); ?></span></div>
							<div class="hero-subtitle caption-timeline"><span><?php echo wp_kses ( serano_get_theme_options('clapat_serano_error_info'), 'serano_allowed_html' ); ?></span></div>

							<a class="button-box ajax-link error-button" href="<?php echo esc_url( serano_get_theme_options('clapat_serano_error_back_button_url') ); ?>" data-type="page-transition">
								<div class="clapat-button-wrap parallax-wrap hide-ball">
									<div class="clapat-button parallax-element">
										<div class="button-border rounded outline parallax-element-second">
											<span data-hover="<?php echo esc_attr( serano_get_theme_options('clapat_serano_error_back_button_hover_caption') ); ?>"><?php echo wp_kses( serano_get_theme_options('clapat_serano_error_back_button'), 'serano_allowed_html' ); ?></span>
										</div>
									</div>
								</div> 
							</a>

						</div>
					</div>
				</div>
				<!--/Hero Caption -->
			</div>
		</div>
		<!-- /Hero --> 

<?php

get_footer();

?>