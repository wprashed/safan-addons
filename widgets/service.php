<?php


class Safan_Service_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'service';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Service', 'safan' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-bars';
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
				'label' => __( 'Service Controls', 'safan' ),
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
				'default'     => __( 'Core Services.', 'safan' ),
			]
		);

		// Description

		$this->add_control(
			'description',
			[
				'label'     => __( 'Description', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'safan' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, totam ipsa quia hic odit a sit laboriosam voluptatem in, blanditiis.', 'safan' ),
			]
		);

		// Feature

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'safan' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'stitle', [
				'label' => __( 'Tilte', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Web Development' , 'safan' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, earum.' , 'safan' ),
				'rows'	=> 4,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Services', 'safan' ),
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
		<!-- Service start -->
		<section class="section service-home border-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h2 class="mb-2 "><?php echo $settings['title'] ?></h2>
						<p class="mb-5"><?php echo $settings['description'] ?></p>
					</div>
				</div>
				
				<div class="row">
					<?php if ( $settings['list'] ) {
                		foreach (  $settings['list'] as $item ) {
                	?>
					<div class="col-lg-4">
						<div class="service-item mb-5" data-aos="fade-left" >
							<i class="<?php echo $item['icon'] ?>"></i>
							<h4 class="my-3"><?php echo $item['stitle'] ?></h4>
							<p><?php echo $item['content'] ?></p>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</section>
		<!-- service end -->
		<?php

	}
}