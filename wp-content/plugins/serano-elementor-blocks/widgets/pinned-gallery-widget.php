<?php
/**
 * Elementor Serano Pinned Gallery Widget.
 *
 * Elementor widget that inserts an gallery pinning images on scroll.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Pinned_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Pinned Gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_pinned_gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Pinned Gallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Pinned Gallery', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve pinned gallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-parallax';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the pinned gallery widget belongs to.
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
	 * Register Pinned Gallery widget controls.
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
		
		$this->end_controls_section();

	}

	/**
	 * Render Pinned Gallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="pinned-gallery">';
		foreach ( $settings['gallery'] as $image ) {

			$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', TRUE );

			echo '<div class="pinned-image">';
			echo '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image_alt ) . '" />';
			echo '</div>';

		}
		echo '</div>';

	}

}

?>
