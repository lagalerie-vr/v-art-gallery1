<?php
/**
 * Elementor Serano Image Collage Widget.
 *
 * Elementor widget that inserts a collage images that open in a popup.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Image_Collage_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image Collage widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_image_collage';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image Collage widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Collage', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image collage widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the image collage widget belongs to.
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
	 * Register Image Collage widget controls.
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
			'thumbnails',
			[
				'label' => __( 'Add Thumbnail Images', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'fullres',
			[
				'label' => __( 'Add Fullres Images', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'has_animation',
			[
				'label' => __( 'Has Animation', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'serano-elementor-widgets' ),
				'label_off' => __( 'No', 'serano-elementor-widgets' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Image Collage widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="justified-grid"';
		if( $settings['has_animation'] === 'yes' ){

			echo ' class="has-animation"';
		}
		echo '>';

		$image_count = 0;
		foreach ( $settings['thumbnails'] as $image_thumb ) {

			$serano_elementor_image_alt = get_post_meta( $image_thumb['id'], '_wp_attachment_image_alt', TRUE );
			$serano_elementor_img_caption = wp_get_attachment_caption( $image_thumb['id'] );

			$serano_elementor_img_url = empty( $settings['fullres'][$image_count] ) ? "" : $settings['fullres'][$image_count]['url'];

			echo '<div class="collage-thumb">';
			echo '<a class="image-link" href="' . esc_url( $serano_elementor_img_url ) . '">';
			echo '<img src="' . esc_url(  $image_thumb['url'] ) . '" alt="' . esc_attr( $serano_elementor_image_alt ) . '" />';
			echo '<div class="thumb-info">' . wp_kses_post( $serano_elementor_img_caption ) . '</div>';
			echo '</a>';
			echo '</div>';

			$image_count++;
		}

		echo '</div>';

	}

}

?>
