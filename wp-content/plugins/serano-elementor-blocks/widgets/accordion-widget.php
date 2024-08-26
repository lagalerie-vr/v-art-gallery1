<?php
/**
 * Elementor Serano Accordion Widget.
 *
 * Elementor widget that inserts an accordion element into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Serano_Accordion_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve accordion widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'serano_accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve accordion widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Accordion', 'serano-elementor-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve accordion widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the accordion widget belongs to.
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
	 * Register accordion widget controls.
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
			'type',
			[
				'label'       	=> __( 'Accordion Type', 'serano-elementor-widgets' ),
				'type'        	=> \Elementor\Controls_Manager::SELECT,
				'default'     	=> 'small-acc',
				'options'     	=> array( 'small-acc' => __( 'Small', 'serano-elementor-widgets' ),
										'bigger-acc' => __( 'Big', 'serano-elementor-widgets' ) )
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'accordion_title',
			[
				'label' => __( 'Accordion Title', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Title Here', 'serano-elementor-widgets' ),
			]
		);

		$repeater->add_control(
			'accordion_content',
			[
				'label' => __( 'Accordion Content', 'serano-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => false,
				'default' => __( 'Content Here', 'serano-elementor-widgets' ),
			]
		);

		$this->add_control(
			'accordion_items',
			[
				'label' => __( 'Accordion Items', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'accordion_title' => __( 'Title #1', 'serano-elementor-widgets' ),
						'accordion_content' => __( 'Item content. Click the edit button to change this text.', 'serano-elementor-widgets' ),
					],
					[
						'accordion_title' => __( 'Title #2', 'serano-elementor-widgets' ),
						'accordion_content' => __( 'Item content. Click the edit button to change this text.', 'serano-elementor-widgets' ),
					],
				],
				'title_field' => '{{{ accordion_title }}}',
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
	 * Render accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<dl class="accordion ' . sanitize_html_class( $settings['type'] );
		if( $settings['has_animation'] === 'yes' ){

			echo ' has-animation';
		}
		echo '"';
		if( $settings['has_animation'] === 'yes' ){

			echo ' data-delay="' . esc_attr( $settings['animation_delay'] ) . '"';
		}
		echo '>';

		foreach ( $settings['accordion_items'] as $accordion_item ) {

			echo '<dt>';
			echo '<span class="link">' . wp_kses_post( $accordion_item['accordion_title'] ) . '</span>';
			echo '<div class="acc-icon-wrap parallax-wrap">';
			echo '<div class="acc-button-icon parallax-element">';
			echo '<i class="fa fa-arrow-right"></i>';
			echo '</div>';
			echo '</div>';
			echo '</dt>';
			echo '<dd class="accordion-content">' . wp_kses_post( $accordion_item['accordion_content'] ) . '</dd>';
		}

		echo '</dl>';

	}

}

?>
