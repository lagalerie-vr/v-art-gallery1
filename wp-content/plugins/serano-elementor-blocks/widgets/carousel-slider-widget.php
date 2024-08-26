<?php
/**
 * Elementor Serano Carousel Slider Widget.
 *
 * Elementor widget that inserts a carousel slider.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Carousel_Slider_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Carousel Slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_carousel_slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Carousel Slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Carousel Slider', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve carousel slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the carousel slider widget belongs to.
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
	 * Register Carousel Slider widget controls.
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
				'label' => __( 'Add Images', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'size',
			[
				'label'        => __( 'Size', 'serano-elementor-widgets' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'looped-carousel',
				'options'      => array( 'looped-carousel' => __( 'Big', 'serano-elementor-widgets' ),
										'small-looped-carousel' => __( 'Small', 'serano-elementor-widgets' ) )
			]
		);

		$this->add_control(
			'cursor_type',
			[
				'label'        => __( 'Cursor Type', 'serano-elementor-widgets' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'light-cursor',
				'options'      => array( 'light-cursor' => __( 'Light', 'serano-elementor-widgets' ),
										'dark-cursor' => __( 'Dark', 'serano-elementor-widgets' ) )
			]
		);

		$this->add_control(
			'enable_dots_nav',
			[
				'label' => __( 'Enable Dots Navigation', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'serano-elementor-widgets' ),
				'label_off' => __( 'No', 'serano-elementor-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autocenter',
			[
				'label' => __( 'Autocenter', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'serano-elementor-widgets' ),
				'label_off' => __( 'No', 'serano-elementor-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
	 * Render Carousel Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();


		echo '<div class="clapat-slider-wrapper content-slider';
		echo ' ' . sanitize_html_class( $settings['size'] );
		if( $settings['has_animation'] === 'yes' ){

			echo ' has-animation';
		}
		echo ' ' . sanitize_html_class( $settings['cursor_type'] );
		if( $settings['autocenter'] === 'yes' ){

			echo ' autocenter';
		}
		if( $settings['enable_dots_nav'] !== 'yes' ){

			echo ' disabled-slider-dots';
		}
		echo '"';
		if( $settings['has_animation'] === 'yes' ){

			echo ' data-delay="' . esc_attr( $settings['animation_delay'] ) . '"';
		}
		echo '>';
		echo '<div class="clapat-slider">';
		echo '<div class="clapat-slider-viewport">';

		foreach ( $settings['gallery'] as $image ) {

			$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', TRUE );

			echo '<div class="clapat-slide">';
			echo '<div class="slide-img">';
			echo '<img src="' . esc_url(  $image['url'] ) . '" alt="' . esc_attr( $image_alt ) . '" />';
			echo '</div>';
			echo '</div>';

		}

		echo '</div>';
		echo '</div>';
		
		echo '<div class="clapat-controls">';
		echo '<div class="clapat-button-next slider-button-next"></div>';
		echo '<div class="clapat-button-prev slider-button-prev"></div>';
		echo '<div class="clapat-pagination"></div>';
		echo '</div>';
		echo '</div>';

	}

}

?>
