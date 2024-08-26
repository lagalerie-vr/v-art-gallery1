<?php
/**
 * Created by Clapat.
 * Date: 12/06/23
 * Time: 11:33 AM
 */

// hero section container properties
$serano_hero_properties = new Serano_Hero_Properties();
$serano_hero_properties->getProperties( get_post_type() );

if( $serano_hero_properties->enabled ){

	get_template_part('sections/hero_section_container');
}
else {
	
	$serano_hero_styles = $serano_hero_properties->width . " " . $serano_hero_properties->scroll_position . " " . $serano_hero_properties->alignment;
	
?>
		<!-- Hero Section -->
		<div id="hero" <?php if( !serano_get_theme_options( 'clapat_serano_enable_page_title_as_hero' ) ){ echo 'class="hero-hidden"'; } ?>>
			<div id="hero-styles">
				<div id="hero-caption" class="<?php echo esc_attr( $serano_hero_styles ); ?>">
					<div class="inner">
						<h1 class="hero-title caption-timeline"><span><?php the_title(); ?></span></h1>
						<div class="hero-arrow link caption-timeline"><span><i class="arrow-icon"></i></span></div>
					</div>
				</div>
			</div>
		</div>
		<!--/Hero Section -->   
		
<?php

}

?>
