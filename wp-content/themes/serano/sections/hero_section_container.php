<?php
/**
 * Created by Clapat.
 * Date: 02/06/23
 * Time: 1:34 PM
 */
$serano_hero_properties = new Serano_Hero_Properties();
$serano_hero_properties->getProperties( get_post_type() );

$hero_styles = $serano_hero_properties->width;

if( !empty( $serano_hero_properties->alignment ) ){
	
	$hero_styles .= " " . $serano_hero_properties->alignment;
}
if( !empty( $serano_hero_properties->scroll_position ) ){
	
	$hero_styles .= " " . $serano_hero_properties->scroll_position;
}

if( $serano_hero_properties->enabled ){

?>

		<?php if( $serano_hero_properties->image && !empty( $serano_hero_properties->image['url'] ) ){ ?>
		<!-- Hero Section -->
		<div id="hero" class="has-image">
			<div id="hero-styles">
				<div id="hero-caption" class="<?php echo esc_attr( $hero_styles ); ?>">
					<div class="inner">
						<h1 class="hero-title caption-timeline"><?php echo wp_kses( $serano_hero_properties->caption_title, 'serano_allowed_html' ); ?></h1>
						<?php if( !empty( $serano_hero_properties->caption_subtitle ) ){ ?>
						<div class="hero-subtitle caption-timeline"><?php echo wp_kses( $serano_hero_properties->caption_subtitle, 'serano_allowed_html' ); ?></div>
						<?php } else {
							
							if( is_singular( 'serano_portfolio' ) ){
						?>
						<div class="hero-subtitle subtitle-empty caption-timeline"></div>	
						<?php
							}
						} 
						?>
						<div class="hero-arrow link caption-timeline"><span><i class="arrow-icon"></i></span></div>						
					</div>
				</div>
				<?php if( !empty( $serano_hero_properties->info_text ) ){ ?>
				<div id="hero-description" class="content-max-width text-align-center">
					<div class="inner">
						<div class="hero-text has-mask-fill">
							<span><?php echo wp_kses( $serano_hero_properties->info_text, 'serano_allowed_html' ); ?></span>
						</div>
					</div>
				</div>
				<?php }	else {
					
					if( is_singular( 'serano_portfolio' ) ){
				?>
				<div id="hero-description" class="description-empty content-max-width text-align-center"></div>
				<?php
					}
				}
				?>
				<div id="hero-footer">
					<div class="hero-footer-left">
						<?php if( is_singular( 'serano_portfolio' ) && !empty( $serano_hero_properties->view_project_url ) ){ ?>
						<div class="button-wrap right">
							<div class="icon-wrap parallax-wrap">
								<div class="button-icon parallax-element">
									<i class="arrow-icon-down"></i>
								</div>
							</div>
							<a target="_blank" href="<?php echo esc_url( $serano_hero_properties->view_project_url ); ?>">
								<div class="button-text sticky right"><span data-hover="<?php echo esc_attr( $serano_hero_properties->view_project_caption ); ?>"><?php echo wp_kses( $serano_hero_properties->view_project_caption, 'serano_allowed_html' ); ?></span></div>
							</a>
						</div>
						<?php } else if( !empty( $serano_hero_properties->scroll_down_caption ) ){ ?>
						<div class="button-wrap right scroll-down">
							<div class="icon-wrap parallax-wrap">
								<div class="button-icon parallax-element">
									<i class="arrow-icon-down"></i>
								</div>
							</div>
							<div class="button-text sticky right"><span data-hover="<?php echo esc_attr( $serano_hero_properties->scroll_down_caption ); ?>"><?php echo wp_kses( $serano_hero_properties->scroll_down_caption, 'serano_allowed_html' ); ?></span></div>
						</div>
						<?php } ?>
					</div>
					<?php if( is_singular( 'serano_portfolio' ) && $serano_hero_properties->share && !empty( serano_get_theme_options( 'clapat_serano_portfolio_share_social_networks' ) ) ){ ?>
					<div class="hero-footer-right">
						<div id="share" class="page-action-content" data-text="<?php echo esc_attr( serano_get_theme_options( 'clapat_serano_portfolio_share_social_networks_caption' ) ); ?>"></div>
					</div>
					<?php } else if( !empty( $serano_hero_properties->tagline ) ){ ?>
					<div class="hero-footer-right">
						<div id="info-text"><?php echo wp_kses( $serano_hero_properties->tagline, 'serano_allowed_html' ); ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div id="hero-image-wrapper">
			<div id="hero-background-layer" class="parallax-scroll-image">
				<div id="hero-bg-image" style="background-image:url(<?php echo esc_url( $serano_hero_properties->image['url'] ); ?>)">
				<?php if( $serano_hero_properties->video ){ ?>
					<div class="hero-video-wrapper">
						<video autoplay playsinline loop muted class="bgvid">
						<?php if( !empty( $serano_hero_properties->video_mp4 ) ){ ?>
							<source src="<?php echo esc_url( $serano_hero_properties->video_mp4 ); ?>" type="video/mp4">
						<?php } ?>
						<?php if( !empty( $serano_hero_properties->video_webm ) ){ ?>
							<source src="<?php echo esc_url( $serano_hero_properties->video_webm ); ?>" type="video/webm">
						<?php } ?>
						</video>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<!--/Hero Section -->
		<?php } else { ?>

		<!-- Hero Section -->
		<div id="hero">
			<div id="hero-styles">
				<div id="hero-caption" class="<?php echo esc_attr( $hero_styles ); ?>">
					<div class="inner">                                    
						<h1 class="hero-title caption-timeline"><?php echo wp_kses( $serano_hero_properties->caption_title, 'serano_allowed_html' ); ?></h1>
						<?php if( !empty( $serano_hero_properties->caption_subtitle ) ){ ?>
						<div class="hero-subtitle caption-timeline"><?php echo wp_kses( $serano_hero_properties->caption_subtitle, 'serano_allowed_html' ); ?></div>
						<?php } ?>
						<div class="hero-arrow link caption-timeline"><span><i class="arrow-icon"></i></span></div>
					</div>
				</div>
				<div id="hero-footer">
					<div class="hero-footer-left">
						<?php if( !empty( $serano_hero_properties->scroll_down_caption ) ){ ?>
						<div class="button-wrap right scroll-down">
							<div class="icon-wrap parallax-wrap">
								<div class="button-icon parallax-element">
									<i class="arrow-icon-down"></i>
								</div>
							</div>
							<div class="button-text sticky right"><span data-hover="<?php echo esc_attr( $serano_hero_properties->scroll_down_caption ); ?>"><?php echo wp_kses( $serano_hero_properties->scroll_down_caption, 'serano_allowed_html' ); ?></span></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--/Hero Section -->
		<?php } ?>

<?php
}
?>
