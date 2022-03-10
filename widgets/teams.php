<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Elementor_Teams_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-team';
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
		return esc_html__( 'Awesome Teams', 'elementor-team' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
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
		return [ 'elementor-team-cat' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','elementor-team'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Team Card Layout
		$this->add_control(
			'team_layout',
			[
				'label' => esc_html__( 'Select Layout', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'team-style-1',
				'options' => [
					'team-style-1' => esc_html__( 'Team Style 1', 'elementor-team' ),
					'team-style-2' => esc_html__( 'Team Style 2', 'elementor-team' ),
					'team-style-3' => esc_html__( 'Team Style 3', 'elementor-team' ),
					'team-style-4' => esc_html__( 'Team Style 4', 'elementor-team' ),
					'team-style-5' => esc_html__( 'Team Style 5', 'elementor-team' ),
					'team-style-6' => esc_html__( 'Team Style 6', 'elementor-team' ),
					'team-style-7' => esc_html__( 'Team Style 7', 'elementor-team' ),
					'team-style-8' => esc_html__( 'Team Style 8', 'elementor-team' ),
					'team-style-9' => esc_html__( 'Team Style 9', 'elementor-team' ),
					'team-style-10' => esc_html__( 'Team Style 10', 'elementor-team' ),
				],
			]
		);

		// Team Image
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => 'before',
			]
		);

		// Team Name
		$this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your name here', 'plugin-name' ),
				'separator' => 'before',
			]
		);

		// Team Designation
		$this->add_control(
			'team_designation',
			[
				'label' => esc_html__( 'Designtion', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your designation here', 'plugin-name' ),
				'separator' => 'before',
			]
		);

		// Team Socials
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'team_social_name',
			[
				'label' => esc_html__( 'Team Social Name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your icon name here', 'plugin-name' ),
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'team_social_icon',
			[
				'label' => esc_html__( 'Team Social Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'team_social_link', [
				'label' => esc_html__( 'Team Social Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'team_socials',
			[
				'label' => esc_html__( 'Team Socials List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ team_social_name }}}',
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content Style', 'elementor-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		// start everything related to Normal state here
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementor-team' ),
			]
		);
		
		// Heading Title Options
		$this->add_control(
			'ewa_heading_title_options',
			[
				'label' => esc_html__( 'Title', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Title Color
		$this->add_control(
			'ewa_heading_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__title' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ewa_heading_title_typography',
				'label' => esc_html__( 'Typography', 'elementor-team' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-heading__content h5',
			]
		);
        
		// Heading Description Options
		$this->add_control(
			'ewa_heading_des_options',
			[
				'label' => esc_html__( 'Description', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Description Color
		$this->add_control(
			'ewa_heading_des_color',
			[
				'label' => esc_html__( 'Color', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ewa_heading_desc_typography',
				'label' => esc_html__( 'Typography', 'elementor-team' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-heading__content p',
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Normal state here

		// start everything related to Hover state here
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'elementor-team' ),
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Hover state here

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();	
		$team_layout = $settings['team_layout'];
		$team_image = $settings['team_image'];
		$team_name = $settings['team_name'];
		$team_designation = $settings['team_designation'];
		$team_socials = $settings['team_socials'];

		switch ($team_layout) {
			case "team-style-1":
				include( __DIR__ . '/parts/team-style-1.php' );
				break;
			case "team-style-2":
				include( __DIR__ . '/parts/team-style-2.php' );
				break;
			case "team-style-3":
				include( __DIR__ . '/parts/team-style-3.php' );
				break;
			case "team-style-4":
				include( __DIR__ . '/parts/team-style-4.php' );
				break;
			case "team-style-5":
				include( __DIR__ . '/parts/team-style-5.php' );
				break;
			case "team-style-6":
				include( __DIR__ . '/parts/team-style-6.php' );
				break;
			case "team-style-7":
				include( __DIR__ . '/parts/team-style-7.php' );
				break;
			case "team-style-8":
				include( __DIR__ . '/parts/team-style-8.php' );
				break;
			case "team-style-9":
				include( __DIR__ . '/parts/team-style-9.php' );
				break;
			case "team-style-10":
				include( __DIR__ . '/parts/team-style-1.php' );
				break;
			default:
			include( __DIR__ . '/parts/team-style-1.php' );
			}
	}
}