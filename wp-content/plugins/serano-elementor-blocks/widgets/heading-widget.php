<?php
/**
 * Elementor Serano Heading Widget.
 *
 * Elementor widget displaying a heading title.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Heading_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Heading', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-editor-h1';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
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
	 * Register heading widget controls.
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
			'title',
			[
				'label' => __( 'Title', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Add Your Heading Text Here', 'serano-elementor-widgets' )
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label'        => __( 'HTML Tag', 'serano-elementor-widgets' ),
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
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-align-left' => [
						'title' => esc_html__( 'Left', 'serano-elementor-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-align-center' => [
						'title' => esc_html__( 'Center', 'serano-elementor-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-align-right' => [
						'title' => esc_html__( 'Right', 'serano-elementor-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
					'text-align-justify' => [
						'title' => esc_html__( 'Justified', 'serano-elementor-widgets' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'text-align-center',
				'toggle' => true,
				'prefix_class' => ''
			]
		);
		
		$this->add_control(
			'css_classes',
			[
				'label' => esc_html__( 'Heading CSS Classes', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT
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
	 * Renders heading widget output on the frontend.
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
		
		$css_classes = $settings['css_classes'];
		if( $serano_animation ){
			
			if( !empty( $css_classes ) ){
			
				$css_classes .= ' ';
			}
			$css_classes .= 'has-animation';
		}
		
		echo '<' . $settings['html_tag'];
		if( !empty( $css_classes ) ){
			
			echo ' class="'. esc_attr( $css_classes ) . '"';
		}
		if( $serano_animation ){
			echo ' data-delay="'. esc_attr( $settings['animation_delay'] ) . '"';
		}
		echo '>';
		
		echo wp_kses_post( $settings['title'] );
		echo '</' . $settings['html_tag'] . '>';
	}

}

?>
