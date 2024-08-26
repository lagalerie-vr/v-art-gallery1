<?php
/**
 * Elementor Serano Reveal Gallery Widget.
 *
 * Set of three images, centered image is fixed slowly revealing side images on scroll.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Reveal_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve reveal gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_reveal_ gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve reveal gallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Reveal Gallery', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve reveal gallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the reveal gallery widget belongs to.
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
	 * Register reveal gallery widget controls.
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
			'left_img',
			[
				'label' => __( 'Left image', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'center_img',
			[
				'label' => __( 'Center (Fixed) image', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		
		$this->add_control(
			'right_img',
			[
				'label' => __( 'Right image', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Renders reveal gallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$serano_elementor_left_img_alt = trim( strip_tags( get_post_meta( $settings['left_img']['id'], '_wp_attachment_image_alt', true ) ) );
		$serano_elementor_center_img_alt = trim( strip_tags( get_post_meta( $settings['center_img']['id'], '_wp_attachment_image_alt', true ) ) );
		$serano_elementor_right_img_alt = trim( strip_tags( get_post_meta( $settings['right_img']['id'], '_wp_attachment_image_alt', true ) ) );
				
		echo '<div class="reveal-gallery">';
		
		// Left image
		echo '<div class="reveal-img">';
		echo '<img src="' . esc_url ( $settings['left_img']['url'] ) . '" alt="' . esc_attr( $serano_elementor_left_img_alt ) . '" />';
		echo '</div>';
		// Center image
		echo '<div class="reveal-img-fixed">';
		echo '<img src="' . esc_url ( $settings['center_img']['url'] ) . '" alt="' . esc_attr( $serano_elementor_center_img_alt ) . '" />';
		echo '</div>';
		// Right image
		echo '<div class="reveal-img">';
		echo '<img src="' . esc_url ( $settings['right_img']['url'] ) . '" alt="' . esc_attr( $serano_elementor_right_img_alt ) . '" />';
		echo '</div>';
	
		echo '</div>';

	}

}

?>
