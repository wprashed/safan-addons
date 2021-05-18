<?php


class Safan_Experience_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'experience';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Experience', 'safan' );
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
				'label' => __( 'Experience Controls', 'safan' ),
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
				'default'     => __( 'Work Experiences.', 'safan' ),
			]
		);

		// Experience

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'duration', [
				'label' => __( 'Duration', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'January 2015 - August 2018' , 'safan' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'company', [
				'label' => __( 'Company & Possition', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'UI UX Designer at Behance' , 'safan' ),
				'rows'	=> 2,
			]
		);

		$repeater->add_control(
			'details', [
				'label' => __( 'Details', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec bibendum mauris. Curabitur quis vehicula leo. Vivamus leo ipsum' , 'safan' ),
				'rows'	=> 4,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Experiences', 'safan' ),
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
		<!-- Experience start -->
		<section class="section about border-top border-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 mb-5">
						<h3 class="mb-2"><?php echo $settings['title'] ?></h3>
					</div>
			
					<div class="col-lg-8">
						<div class="row">
							<?php if ( $settings['list'] ) {
				        		foreach (  $settings['list'] as $item ) {
				        	?>
							<div class="col-lg-6">
								<div class="about-info mb-5">
									<span><?php echo $item['duration'] ?></span>
									<h4 class="mb-3 mt-1"><?php echo $item['company'] ?></h4>
									<p><?php echo $item['details'] ?></p>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Experience End -->
		<?php

	}
}