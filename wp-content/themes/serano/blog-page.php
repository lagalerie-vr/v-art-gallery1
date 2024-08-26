<?php
/*
Template name: Blog Template
*/
get_header();

while ( have_posts() ){

the_post();

$serano_navigation_type = serano_get_theme_options( 'clapat_serano_blog_navigation_type' );

?>
			
	<!-- Main -->
	<div id="main">
	
	<?php 
		
		// display hero section, if any
		get_template_part('sections/hero_section'); 
		
	?>
		<!-- Main Content -->
		<div id="main-content">
			<!-- Blog-->
			<div id="blog-page-content">
				<!-- Blog-Content-->
				<div id="blog-effects" class="content-full-width" data-fx="1">
				<?php 
						
					$serano_paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					
					$serano_args = array(
						'post_type' => 'post',
						'paged' => $serano_paged
					);
					$serano_posts_query = new WP_Query( $serano_args );

					// the loop
					while( $serano_posts_query->have_posts() ){

						$serano_posts_query->the_post();

						get_template_part( 'sections/blog_post_minimal_section' );
												
					}
							
				?>
				</div>
				<!-- /Blog-Content -->
				
			</div>
			<!-- /Blog-->
			
			<?php
						
				serano_pagination( $serano_posts_query, $serano_navigation_type );

				wp_reset_postdata();
			?>
		</div>
		<!--/Main Content-->
	
	<!-- /Main -->
	</div>
	
<?php

}

get_footer();

?>
