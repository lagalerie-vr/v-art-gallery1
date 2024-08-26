<?php
/**
 * Elementor Scrolling Panels Gallery Widget.
 *
 * Elementor widget that inserts a scrolling panels gallery on scroll.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Scrolling_Panels_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Scrolling Panels Gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_scrolling_panels_gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Scrolling Panels Gallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Scrolling Panels Gallery', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve scrolling panels widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-photo-library';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the scrolling panels widget belongs to.
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
	 * Register Scrolling Panels widget controls.
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
	 * Render Scrolling Panels widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		echo '<div class="panels" data-widthratio="' . esc_attr( $settings['aspect_ratio'] ) . '">';
		echo '<div class="panels-container">';
		foreach ( $settings['gallery'] as $image ) {

			$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', TRUE );

			echo '<div class="panel">';
			echo '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image_alt ) . '" />';
			echo '</div>';
			
		}
		echo '</div>';
		echo '</div>';
	
	}

}

?>
