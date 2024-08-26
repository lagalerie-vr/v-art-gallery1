	<?php if( serano_get_theme_options('clapat_serano_enable_preloader') ){ ?>
		<!-- Preloader -->
		<div class="preloader-wrap" data-firstline="<?php echo esc_attr( serano_get_theme_options('clapat_serano_preloader_hover_first_line') ); ?>" data-secondline="<?php echo esc_attr( serano_get_theme_options('clapat_serano_preloader_hover_second_line') ); ?>">

			<div class="outer">
				<div class="inner"> 

					<div class="trackbar">
                    	<div class="preloader-intro">
                        	<span><?php echo wp_kses( serano_get_theme_options('clapat_serano_preloader_intro'), 'serano_allowed_html' ); ?></span>
                        </div>
                        <div class="loadbar"></div>
                        <div class="percentage-wrapper"><div class="percentage" id="precent"></div></div>
                    </div>

					<div class="percentage-intro"><?php echo wp_kses( serano_get_theme_options('clapat_serano_preloader_text'), 'serano_allowed_html' ); ?></div>

				</div>
			</div>

		</div>
		<!--/Preloader -->
	<?php } ?>