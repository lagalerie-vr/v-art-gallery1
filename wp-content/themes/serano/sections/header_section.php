<?php
// retrieve the path to the logo displayed in the menu bar
$serano_logo = serano_get_theme_options( 'clapat_serano_logo' );
$serano_logo_path = esc_url( $serano_logo );
if( !$serano_logo_path ){
	$serano_logo_path = get_template_directory_uri() . "/images/logo.png";
}

$serano_logo_light = serano_get_theme_options( 'clapat_serano_logo_light' );
$serano_logo_light_path = esc_url( $serano_logo_light );
if( !$serano_logo_light_path ){
	$serano_logo_light_path = get_template_directory_uri() . "/images/logo-white.png";
}

?>
		<!-- Header -->
		<header class="<?php echo sanitize_html_class( serano_get_theme_options( 'clapat_serano_menu_background_type' ) ); ?> <?php if( ( serano_get_theme_options( 'clapat_serano_header_menu_type' ) != 'classic-burger-dots' ) && ( serano_get_theme_options( 'clapat_serano_header_menu_type' ) != 'classic-burger-lines' ) ){ echo "fullscreen-menu"; } else { echo "classic-menu"; } ?>" data-menucolor="<?php echo esc_attr( serano_get_theme_options( 'clapat_serano_menu_background_color' ) ); ?>">
			<div id="header-container">

				<!-- Logo -->
				<div id="logo" class="hide-ball">
					<a class="ajax-link" data-type="page-transition" href="<?php echo esc_url( get_home_url() ); ?>">
						<img class="black-logo" src="<?php echo esc_url( $serano_logo_path ); ?>" alt="<?php echo esc_attr__('Logo Black', 'serano'); ?>">
						<img class="white-logo" src="<?php echo esc_url( $serano_logo_light_path ); ?>" alt="<?php echo esc_attr__('Logo White', 'serano'); ?>">
					</a>
				</div>
				<!--/Logo -->

				<?php

				get_template_part('sections/menu_section');

				?>
				<!-- Menu Burger -->
				<div class="button-wrap right menu <?php
					if( ( serano_get_theme_options( 'clapat_serano_header_menu_type' ) == 'classic-burger-dots' ) || 
						( serano_get_theme_options( 'clapat_serano_header_menu_type' ) == 'fullscreen-burger-dots' ) ) {
						
						echo "burger-dots";
					}
					else if( ( serano_get_theme_options( 'clapat_serano_header_menu_type' ) == 'classic-burger-lines' ) ||
								( serano_get_theme_options( 'clapat_serano_header_menu_type' ) == 'fullscreen-burger-lines' ) ) {
						
						echo "burger-lines";
					}
					else {
						
						echo "burger-dots";
					}
					?>">
					<div class="icon-wrap parallax-wrap">
						<div class="button-icon parallax-element">
							<div id="burger-wrapper">
								<div id="menu-burger">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</div>
					<div class="button-text sticky right"><span data-hover="<?php echo esc_attr( serano_get_theme_options('clapat_serano_menu_btn_caption') ); ?>"><?php echo wp_kses( serano_get_theme_options('clapat_serano_menu_btn_caption'), 'serano_allowed_html' ); ?></span></div>
				</div>
				<!--/Menu Burger -->

				<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() || is_singular( 'post' ) ){

					if( !is_tax('portfolio_category') ){

						if( is_active_sidebar( 'serano-blog-sidebar' ) ){
				?>
				<div id="open-sidebar-nav"><i class="fa-solid fa-arrow-left"></i></div>
				<?php
						}
					}
				}
				?>
			</div>
		</header>
		<!--/Header -->

		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() || is_singular( 'post' ) ){

			if( !is_tax('portfolio_category') ){

				// display sidebar section, if defined
				get_template_part('sections/blog_sidebar_section');
			}
		}
		?>

		<?php if( is_page_template( 'portfolio-grid-page.php' ) ){ ?>

			<div id="show-filters" data-tooltip="<?php echo esc_attr( serano_get_theme_options('clapat_serano_portfolio_show_filters_caption') ); ?>" data-placement="top">
				<div class="show-filters-wrap parallax-wrap">
					<div class="open-filters parallax-element">
						<i class="fa-solid fa-sort"></i>
					</div>
				</div>
			</div>

		<?php
			// display filters section, if defined
			get_template_part('sections/portfolio_filters_section');
		}
		?>
		
		<div id="content-scroll">
		
		<?php
			if ( function_exists( 'elementor_theme_do_location' ) ){
				
				elementor_theme_do_location( 'header' );
			}
		?>
