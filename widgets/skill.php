<?php


class Safan_Skill_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'skill';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Skill', 'safan' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-briefcase';
	}

	//	Widget Categories

	public function get_categories() {
		return [ 'safan' ];
	}

	// Register Widget Control

	protected function _register_controls() {

		$this->register_controls();

	}

	// Widget Controls 

	function register_controls() {

		// Controls

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Skill Controls', 'safan' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Background

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'transtics_elementor_extension' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .section',
			]
		);

		// Padding

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'transtics_elementor_extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title

		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'My skills.', 'safan' ),
			]
		);

		// Experience

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'myskills', [
				'label' => __( 'Skill', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Business Strategy' , 'safan' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'percentage', [
				'label' => __( 'Percentage', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '80' , 'safan' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Skills', 'safan' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();



	}

	// Widget Render Output

	protected function render() {
		$settings   = $this->get_settings_for_display();
		
		?>
		<!-- Skill Start -->
		<section class="section skills">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h3><?php echo $settings['title'] ?></h3>
					</div>

					<div class="col-lg-8">
						<?php if ( $settings['list'] ) {
			        		foreach (  $settings['list'] as $item ) {
			        	?>
						<div class="progress-bar-content">
							<div class="progress-label d-flex align-items-center">
				                <div class="progress-title"><?php echo $item['myskills'] ?></div>
				                	<span class="progress-bar-units ml-auto"><?php echo $item['percentage'] ?>%</span>
			            	</div>
							<div class="progress">
								  <div class="progress-bar" data-percent="<?php echo $item['percentage'] ?>"></div>
							</div>
						</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</section>
		<!-- Skill end -->
		<?php

	}
}