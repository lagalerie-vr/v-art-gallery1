<?php
/**
 * Elementor Serano Moving Title Widget.
 *
 * Elementor widget that inserts an rolling text on scroll
 *
 * @since 1.0.0
 */
class Elementor_Serano_Moving_Title_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Moving Title widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_moving_title';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Moving Title widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Moving Title', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Moving Title widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-text-area';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Moving Title widget belongs to.
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
	 * Register Moving Title widget controls.
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
				'label'       	=> __( 'Moving Direction', 'serano-elementor-widgets' ),
				'type'        	=> \Elementor\Controls_Manager::SELECT,
				'default'     	=> 'title-moving-forward',
				'options'     	=> array( 'title-moving-forward' => __( 'Forward', 'serano-elementor-widgets' ),
										'title-moving-backward' => __( 'Backward', 'serano-elementor-widgets' ) )
			]
		);

		$this->add_control(
			'content',
			[
				'label' => __( 'The text', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => false,
				'default' => __( 'Moving title here', 'serano-elementor-widgets' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Moving Title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="title-moving-outer">';
		echo '<h1 class="big-title ' . esc_attr( $settings['direction'] ) . '">' . wp_kses_post( $settings['content'] ) . '</h1>';
		echo '</div>';
	}

}

?>
