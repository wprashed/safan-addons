<?php


class Safan_Content_Six_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'content-six';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Content Block Six', 'safan' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-file-text-o';
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

		// Content

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'safan' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Title

		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'Froala Design Blocks', 'safan' ),
			]
		);

		// Sub Title

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'Right at the coast of the Semantics, a large language ocean.', 'safan' ),
			]
		);

		// Image

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'safan' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		// Content

		$this->add_control(
			'content',
			[
				'label'     => __( 'Description', 'safan' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Content', 'safan' ),
				'default'     => __( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', 'safan' ),
			]
		);

		// Image

		$this->add_control(
			'image_two',
			[
				'label' => __( 'Image', 'safan' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		// Content

		$this->add_control(
			'content_two',
			[
				'label'     => __( 'Description', 'safan' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Content', 'safan' ),
				'default'     => __( 'Right at the coast of the Semantics, a large language ocean. A small river named Duden.', 'safan' ),
			]
		);

		$this->end_controls_section();

		// style

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'safan' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Background

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'safan' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .fdb-block',
			]
		);

		// Padding

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'safan' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fdb-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#444444',
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'safan' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			]
		);

		// Subtitle Title

		$this->add_control(
			'subtitle_color',
			[
				'label'     => __( 'Subtitle Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#444444',
				'selectors' => [
					'{{WRAPPER}} .h2' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'label'    => __( 'Subtitle Typography', 'safan' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .h2',
			]
		);

		// Content

		$this->add_control(
			'content_color',
			[
				'label'     => __( 'Description Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#9792A0',
				'selectors' => [
					'{{WRAPPER}} .lead' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => __( 'Description Typography', 'safan' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .lead',
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {
		
		$settings   = $this->get_settings_for_display();
		?>
		<section class="fdb-block">
		  <div class="container">
		    <div class="row text-center">
		      <div class="col-12">
		        <h1 class="title"><?php echo $settings['title'] ?></h1>
		        <p class="h2"><?php echo $settings['subtitle'] ?></p>
		      </div>
		    </div>

		    <div class="row text-center pt-3 pt-xl-5">
		      <div class="col-12 col-sm-10 m-auto m-md-0 col-md-6">
		        <img alt="image" height="300" src="<?php echo $settings['image']['url'] ?>">
		        <p class="lead pt-3"><?php echo $settings['content'] ?></p>
		      </div>

		      <div class="col-12 col-sm-10 m-auto m-md-0 col-md-6 pt-5 pt-md-0">
		        <img alt="image" height="300" src="<?php echo $settings['image_two']['url'] ?>">
		        <p class="lead pt-3"><?php echo $settings['content_two'] ?></p>
		      </div>
		    </div>
		  </div>
		</section>
		<?php
	}
}