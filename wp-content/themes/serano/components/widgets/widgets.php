<?php

// more widgets in the (near) future...

// Register widgetized locations
if(  !function_exists('serano_widgets_init') ){

    function serano_widgets_init(){

		$args = 			array( 'name'		=> esc_html__( 'Blog Sidebar', 'serano' ),
								'id'           	=> 'serano-blog-sidebar',
								'description'  	=> '',
								'class'        	=> '',
								'before_widget'	=> '<div id="%1$s" class="widget clapat-sidebar-widget %2$s">',
								'after_widget'  => '</div>',
								'before_title'  => '<h5 class="widgettitle clapat-widgettitle">',
								'after_title'   => '</h5>' );
		
		register_sidebar( $args );
		        
    }
}

add_action( 'widgets_init', 'serano_widgets_init' );

?>