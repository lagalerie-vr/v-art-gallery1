<?php
/**
 * Elementor Serano Marquee Text Widget.
 *
 * Elementor widget that inserts an rolling, marquee text into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Marquee_Text_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Marquee Text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_marquee_text';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Marquee Text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Marquee Text', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Marquee Text widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-animation-text';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Marquee Text widget belongs to.
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
	 * Register Marquee Text widget controls.
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
			'direction',
			[
				'label'        => __( 'Direction', 'serano-elementor-widgets' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'fw',
				'options'      => array( 'fw' => __( 'Forward', 'serano-elementor-widgets' ),
										'bw' => __( 'Backward', 'serano-elementor-widgets' ) )
			]
		);
		
		$this->add_control(
			'content',
			[
				'label' => __( 'The text', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => false,
				'default' => __( 'Marquee text here', 'serano-elementor-widgets' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Marquee Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="marquee-text-wrapper">';
		echo '<h1 class="marquee-text big-title ' . sanitize_html_class( $settings['direction'] ) . '">' . wp_kses_post( $settings['content'] ) . '</h1>';
		echo '</div>';
	}

}

?>
