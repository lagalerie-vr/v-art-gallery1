<?php
$serano_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

$serano_post_title = get_the_title();
if( empty( $serano_post_title ) ){
	
	$serano_post_title = esc_html__("Post has no title", "serano");
}

?>
				
				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="article-bg">
						<div class="article-wrap">
							<?php if( $serano_post_image  ){ ?>
							<div class="hover-reveal">
								<div class="hover-reveal__inner">
									<div class="hover-reveal__img">
										<a class="ajax-link" href="<?php echo esc_url( the_permalink() ); ?>" data-type="page-transition">
											<img src="<?php echo esc_url( $serano_post_image[0] ); ?>" alt="<?php esc_attr_e("Post Image", "serano"); ?>">                                      	 
										</a>
									</div>
								</div>
							</div>
							<?php } ?>
							<a class="post-title ajax-link has-mask-fill link" href="<?php echo esc_url( the_permalink() ); ?>" data-type="page-transition"><?php echo wp_kses( $serano_post_title, 'serano_allowed_html' ); ?></a>
						</div>	
						<div class="article-content">
									
							<div class="entry-meta-wrap">    
								<div class="entry-meta entry-categories">
									<ul class="post-categories">
										<?php 
											$serano_categories = get_the_category();
											if ( ! empty( $serano_categories ) ) {

												foreach( $serano_categories as $serano_category ) {

													echo '<li class="link">';
													echo wp_kses( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_category_link( $serano_category->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $serano_category->name ) . '">' . esc_html( $serano_category->name ) . '</span></a>', 'serano_allowed_html' );
													echo '</li>';
												}
											}
										?>
									</ul>
								</div>
							</div>
							
							<div class="entry-meta-wrap">
								<ul class="entry-meta entry-date">
									<li class="link"><a class="ajax-link" href="<?php the_permalink(); ?>"><span data-hover="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></span></a></li>
								</ul>
							</div>
							
						</div>
						<div class="article-links">
							<div class="button-box">
								<a class="ajax-link" data-type="page-transition" href="<?php the_permalink(); ?>">
									<div class="clapat-button-wrap parallax-wrap hide-ball">
										<div class="clapat-button parallax-element">
											<div class="button-border outline rounded parallax-element-second">
												<span data-hover="<?php echo esc_attr( serano_get_theme_options( 'clapat_serano_blog_read_more_caption' ) ); ?>"><?php echo wp_kses( serano_get_theme_options( 'clapat_serano_blog_read_more_caption' ), 'serano_allowed_html' ); ?></span>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="page-links">
							<?php
								wp_link_pages();
							?>
							</div>

							<?php
							if( serano_get_theme_options('clapat_serano_blog_excerpt_type') != 'blog-excerpt-none' ) {
							?>
							<div class="blog-excerpt">
								<?php
								if( serano_get_theme_options('clapat_serano_blog_excerpt_type') == 'blog-excerpt-full' ) {
									
									the_content( esc_html__('Continue Reading...', 'serano') );
								}
								else {
									
									the_excerpt();
								}
							?>
							</div>
							<?php
							}
							?>
						</div>
						<a class="ajax-link" href="<?php echo esc_url( the_permalink() ); ?>" data-type="page-transition">
							<div class="read-more parallax-wrap">
								<div class="parallax-element">
									<i class="fa-solid fa-plus"></i>
								</div>
							</div>
						</a>
					</div>
				</article>
				<!--/Article -->