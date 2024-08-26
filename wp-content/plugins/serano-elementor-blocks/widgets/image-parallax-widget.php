<?php
/**
 * Elementor Serano Image Parallax Widget.
 *
 * Elementor widget that inserts a parallax image
 *
 * @since 1.0.0
 */
class Elementor_Serano_Image_Parallax_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image parallax widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_image_parallax';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image parallax widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Parallax', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image parallax widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the image parallax widget belongs to.
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
	 * Register image parallax widget controls.
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
			'image',
			[
				'label' => __( 'Parallax Image', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'overlay_text',
			[
				'label' => __( 'Overlay Text', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'overlay_text_size',
			[
				'label'        => __( 'Overlay Text Size', 'serano-elementor-widgets' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'h1',
				'options'      => array( 'h1' => __( 'H1', 'serano-elementor-widgets' ),
																'h2' => __( 'H2', 'serano-elementor-widgets' ),
																'h3' => __( 'H3', 'serano-elementor-widgets' ),
																'h4' => __( 'H4', 'serano-elementor-widgets' ),
																'h5' => __( 'H5', 'serano-elementor-widgets' ),
																'h6' => __( 'H6', 'serano-elementor-widgets' ))
			]
		);

		$this->add_control(
			'overlay_text_align',
			[
				'label'        => 'Overlay Text Alignment',
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'text-align-center',
				'options'      => array( 'text-align-center' => __( 'Center', 'serano-elementor-widgets' ),
										'text-align-left' => __( 'Left', 'serano-elementor-widgets' ),
										'text-align-right' => __( 'Right', 'serano-elementor-widgets' ) ),
				'prefix_class' => ''
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

		$this->add_control(
			'animation_delay',
			[
				'label' => __( 'Animation Delay', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'show_label' => true,
				'default' => 0
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Renders image parallax widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$serano_animation = $settings['has_animation'];
		if( $serano_animation == 'no'){

			$serano_animation = false;
		}

		echo '<figure class="has-parallax has-parallax-content';
		if( $serano_animation ){

			echo ' has-animation';
		}
		echo '"';
		if( $serano_animation ){

			echo ' data-delay="'. esc_attr( $settings['animation_delay'] ) . '"';
		}
		echo '>';

		$serano_elementor_img_alt = trim( strip_tags( get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true ) ) );
		echo '<img src="' . esc_url( $settings['image']['url'] ) . '" alt="' . esc_attr( $serano_elementor_img_alt ) . '">';

		echo '<div class="parallax-image-content content-max-width ' . esc_attr( $settings['overlay_text_align'] ) . '">';
		echo '<div class="outer">';
		echo '<div class="inner">';
		echo '<' . $settings['overlay_text_size'] . ' class="has-mask">';
		echo wp_kses_post( $settings['overlay_text'] );
		echo '</' . $settings['overlay_text_size'] . '>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</figure>';

	}

}

?>
