<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-primary-color="<?php echo esc_attr( serano_get_theme_options('clapat_serano_primary_color') ); ?>">
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

	<main>
	<?php
		// display header section
		get_template_part('sections/preloader_section');
	?>
	
		<?php
		
		?>
		<!--Cd-main-content -->
		<div class="cd-index cd-main-content">

		<?php
		$serano_bknd_color = "";
		if( is_singular( 'serano_portfolio' ) ){

			$serano_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-bknd-color' );
			$serano_bknd_color_attribute = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-portfolio-bknd-color-code' );
		}
		else if( is_singular( 'post' ) ){

			$serano_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-blog-bknd-color' );
			$serano_bknd_color_attribute = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-blog-bknd-color-code' );
		}
		else if( is_404() ){

			$serano_bknd_color = serano_get_theme_options( 'clapat_serano_error_page_bknd_type' );
			$serano_bknd_color_attribute = "#ffffff";
			if( $serano_bknd_color == "light-content" ){

				$serano_bknd_color_attribute = "#0c0c0c";
			}

		}
		else if( is_page() ){

			$serano_bknd_color = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-bknd-color' );
			$serano_bknd_color_attribute = serano_get_post_meta( SERANO_THEME_OPTIONS, get_the_ID(), 'serano-opt-page-bknd-color-code' );
		}
		
		if( empty( $serano_bknd_color ) ){

			$serano_bknd_color = serano_get_theme_options( 'clapat_serano_default_page_bknd_type' );
			
			$serano_bknd_color_attribute = "#ffffff";
			if( $serano_bknd_color == "light-content" ){

				$serano_bknd_color_attribute = "#0c0c0c";
			}
		}

		?>

		<?php $serano_page_content_classes = ""; ?>

		<?php
		// Body classes (useful in ajax page transitions)
		$serano_body_classes = get_body_class();
		$serano_page_content_classes .= implode(' ', $serano_body_classes);
		?>
		
		<?php
		// Check if Elementor is installed and activated
		if ( did_action( 'elementor/loaded' ) ) {

			if( !empty( $serano_page_content_classes ) ){

				$serano_page_content_classes .= " ";
			}

			$serano_page_content_classes .= "with-elementor";
		}
		?>
		
		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() ){ ?>
			<!-- Page Content -->
			<div id="page-content" class="blog-template-content <?php echo sanitize_html_class( $serano_bknd_color ); if( !serano_get_theme_options( 'clapat_serano_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?> <?php echo esc_attr( $serano_page_content_classes ); ?>" data-bgcolor="<?php echo esc_attr( $serano_bknd_color_attribute ); ?>" >
		<?php } else if( is_singular( 'post' ) ){ ?>
			<!-- Page Content -->
			<div id="page-content" class="post-template-content <?php echo sanitize_html_class( $serano_bknd_color ); if( !serano_get_theme_options( 'clapat_serano_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?> <?php echo esc_attr( $serano_page_content_classes ); ?>" data-bgcolor="<?php echo esc_attr( $serano_bknd_color_attribute ); ?>" >
		<?php } else { ?>
			<!-- Page Content -->
			<div id="page-content" class="<?php echo sanitize_html_class( $serano_bknd_color ); if( !serano_get_theme_options( 'clapat_serano_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?> <?php echo esc_attr( $serano_page_content_classes ); ?>" data-bgcolor="<?php echo esc_attr( $serano_bknd_color_attribute ); ?>" >
		<?php } ?>

		<?php
			// display header section
			get_template_part('sections/header_section');
		?>