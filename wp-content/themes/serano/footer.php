<?php
/**
 * Created by Clapat.
 * Date: 05/04/23
 * Time: 11:14 AM
 */
?>
			<?php

			// display footer section
			get_template_part('sections/footer_section');

			?>
			
			<?php
			
				$serano_portfolio_items = serano_portfolio_thumbs_list();
				
				if ( !empty( $serano_portfolio_items ) ){ 
			?>
			<div class="thumb-wrapper">
				<div class="thumb-container">
					<?php
					foreach( $serano_portfolio_items as $serano_portfolio_item ){
						
						$serano_hero_image = serano_get_post_meta( SERANO_THEME_OPTIONS, $serano_portfolio_item->post_id, 'serano-opt-portfolio-hero-img' );
					?>
					<div class="thumb-page" data-src="<?php echo esc_url( $serano_hero_image['url'] ); ?>"></div>
					<?php
					}
					?>
				</div>
			</div>
			<?php } ?>
			
			<div id="app"></div>

			</div>
			<!--/Page Content -->
		</div>
		<!--/Cd-main-content -->
	</main>
	<!--/Main -->

	<div class="cd-cover-layer"></div>
	<div id="magic-cursor">
		<div id="ball">
			<div id="ball-drag-x"></div>
			<div id="ball-drag-y"></div>
			<div id="ball-loader"></div>
		</div>
	</div>
	<div id="clone-image">
		<div class="hero-translate"></div>
	</div>
	<div id="rotate-device"></div>

<?php wp_footer(); ?>
</body>
</html>