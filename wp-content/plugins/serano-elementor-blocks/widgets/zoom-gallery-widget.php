<?php
/**
 * Elementor Serano Zoom Gallery Widget.
 *
 * Elementor widget that inserts an gallery zooming on scroll.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Zoom_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Zoom Gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_zoom_gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Zoom Gallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Zoom Gallery', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve zoom gallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-preview-medium';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the zoom gallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'serano-widgets' ];
	}

	/**
	 * Register Zoom Gallery widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'serano-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images To Gallery', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		
		$this->add_control(
			'zoom_slide_no',
			[
				'label' => __( 'What number is the zoomed slide in gallery', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'show_label' => true,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 1
			]
		);
		
		$this->add_control(
			'aspect_ratio',
			[
				'label' => __( 'Aspect Ratio', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'show_label' => true,
				'min' => 0.4,
				'max' => 1,
				'step' => 0.1,
				'default' => 0.4
			]
		);
		
		$this->end_controls_section();

	}

	/**
	 * Render Zoom Gallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="zoom-gallery">';
		echo '<ul class="zoom-wrapper-gallery" data-heightratio="' . esc_attr( $settings['aspect_ratio'] ) . '">';
		$zoom_slide_no = $settings['zoom_slide_no'];
		$counter = 1;
		foreach ( $settings['gallery'] as $image ) {

			$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', TRUE );
			
			if( $zoom_slide_no == $counter ){
				
				echo '<li class="zoom-center">';
			}
			else {
				
				echo '<li>';
			}
			echo '<div class="zoom-img-wrapper">';
			echo '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image_alt ) . '" />';
			echo '</div>';
			echo '</li>';

			$counter++;
		}
		echo '</ul>';
		echo '<div class="zoom-wrapper-thumb"></div>';
		echo '</div>';

	}

}

?>
