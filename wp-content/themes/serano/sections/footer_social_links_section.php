<?php

if( !function_exists('serano_render_footer_social_links' ) )
{
	function serano_render_footer_social_links(){

		global $serano_social_links_icons;
		$serano_social_links = "";
		for( $idx = 1; $idx <= SERANO_MAX_SOCIAL_LINKS; $idx++ ){

			$social_name = serano_get_theme_options( 'clapat_serano_footer_social_' . $idx );
			$social_url  = serano_get_theme_options( 'clapat_serano_footer_social_url_' . $idx );

			if( $social_url ){

				if( serano_get_theme_options( 'clapat_serano_social_links_icons' ) ){
					
					$serano_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank"><i class="fa-brands fa-'. esc_attr( $serano_social_links_icons[ $social_name ] ) . '"></i></a></span></li>';
				}
				else {
					
					$serano_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank">' . wp_kses( $social_name, 'serano_allowed_html' ) . '</a></span></li>';
				}

			}

		}
		
		if( !empty( $serano_social_links ) ){
?>
						<div class="socials-wrap">
							<div class="socials-icon"><i class="fa-solid fa-share-nodes"></i></div>
							<div class="socials-text"><?php echo wp_kses( serano_get_theme_options( 'clapat_serano_footer_social_links_prefix' ), 'serano_allowed_html' ); ?></div>
							<ul class="socials">
								<?php echo wp_kses( $serano_social_links, 'serano_allowed_html' ); ?>
							</ul>
						</div>
<?php			
		
		}

	}
}

serano_render_footer_social_links();

?>
