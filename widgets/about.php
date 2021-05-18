<?php


class Safan_About_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'about';
	}

	// Widget Titke

	public function get_title() {
		return __( 'About', 'safan' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-user';
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
				'label' => __( 'About Controls', 'safan' ),
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
				'default'     => __( 'Jems Smith', 'safan' ),
			]
		);

		// Subtitle

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Subtitle', 'safan' ),
				'default'     => __( 'I create premium designs and technology', 'safan' ),
			]
		);

		// Description

		$this->add_control(
			'description',
			[
				'label'     => __( 'Description', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Details', 'safan' ),
				'default'     => __( 'I was born in Los Angeles in 1980.I am 23 years old creative web designer, specializing in User Interface Design and Development.Veritatis culpa sunt alias esse fuga accusamus nostrum, iusto neque.', 'safan' ),
				'rows'	=> 6,
			]
		);

		// Image

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'transtics_elementor_extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		// Service

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service', [
				'label' => __( 'My Service', 'safan' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Web Development' , 'safan' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Service List', 'safan' ),
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
		<!-- About start -->
		<section class="section banner-3">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-3">
						<div class="profile mb-5">
							<img src="<?php echo $settings['image']['url'] ?>" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-6">
						<h2><?php echo $settings['title'] ?></h2>
						<p class="lead mb-4"><?php echo $settings['subtitle'] ?></p>

						<p class="mb-4"><?php echo $settings['description'] ?></p>
					</div>

					<div class="col-lg-3">
						<h3>My Services</h3>
						<ul class="list-unstyled mt-3 mb-5 about-list">
							<?php if ( $settings['list'] ) {
		                		foreach (  $settings['list'] as $item ) {
		                	?>
							<li>- <?php echo $item['service'] ?></li>
							<?php } } ?>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- About End -->
		<?php

	}
}