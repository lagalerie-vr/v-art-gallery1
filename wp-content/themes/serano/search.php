<?php
/**
 * The template for displaying Search Results pages
*/

get_header();

$serano_navigation_type = serano_get_theme_options( 'clapat_serano_blog_navigation_type' );

?>

	<!-- Main -->
	<div id="main">

		<!-- Hero Section -->
		<div id="hero">
			<div id="hero-styles">
				<div id="hero-caption" class="content-full-width parallax-scroll-caption inline-title">
					<div class="inner">
						<h1 class="hero-title caption-timeline"><span><?php echo get_search_query(); ?></span></h1>
						<h5 class="hero-subtitle caption-timeline"><span><?php echo esc_html__( 'Search Results', 'serano'); ?></span></h5>
						<div class="hero-arrow link caption-timeline"><span><i class="arrow-icon"></span></i></div>
					</div>
				</div>
			</div>
		</div>
		<!--/Hero Section -->
		
		<!-- Main Content -->
		<div id="main-content">
			<!-- Blog-->
			<div id="blog-page-content">
				<!-- Blog-Content-->
				<div id="blog-effects" class="content-full-width" data-fx="1">
					<?php

						if( have_posts() ){
						
							while( have_posts() ){

								the_post();

								get_template_part( 'sections/blog_post_minimal_section' );
								
							}
						} else{

							echo '<h2 class="search_results">' . esc_html__('No posts found', 'serano') . '</h2>';

						}

					?>
					
				<!-- /Blog-Content -->
				</div>

			</div>
			<!-- /Blog-->
			<?php

				serano_pagination( null, $serano_navigation_type );
			?>
		</div>
		<!--/Main Content-->
	</div>
	<!-- /Main -->
<?php

get_footer();

?>