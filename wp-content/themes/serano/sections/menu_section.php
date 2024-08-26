			<?php
				
				$serano_menu_breakpoint = "1025";
				$serano_menu_additional_text = "";
				if( ( serano_get_theme_options( 'clapat_serano_header_menu_type' ) != 'classic-burger-dots' ) &&
					( serano_get_theme_options( 'clapat_serano_header_menu_type' ) != 'classic-burger-lines' ) ){
					
					$serano_menu_breakpoint = "10025";
				}
				
				$serano_theme_location = '';
				if( has_nav_menu( 'primary-menu' ) ){
					
					$serano_theme_location = 'primary-menu';
				}
				wp_nav_menu(array(
					'theme_location' 	=> $serano_theme_location,
					'container' 		=> 'nav',
					'items_wrap' 		=> '<div class="nav-height"><div class="outer"><div class="inner"><ul id="%1$s" data-breakpoint="' . esc_attr( $serano_menu_breakpoint ) . '" class="flexnav %2$s">%3$s</ul></div>' . wp_kses( $serano_menu_additional_text, 'serano_allowed_html' ) . '</div></div>'
				));

			?>
