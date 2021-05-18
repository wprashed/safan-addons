<?php


class Safan_Content_Five_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'content-five';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Content Block Five', 'safan' );
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
				'default'     => __( 'Froala Blocks', 'safan' ),
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
				'default'     => __( 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 'safan' ),
			]
		);

		// Button

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Button Text', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Button Text', 'safan' ),
				'default'     => __( 'Download', 'safan' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label'     => __( 'Button Url', 'safan' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'safan' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
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
				'selector' => '{{WRAPPER}} .bg-r',
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
					'{{WRAPPER}} .bg-r' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		// Button
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'    => __( 'Button Typography', '`' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .btn',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Button Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => __( 'Button Background Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#329EF8',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

	}

	// Widget Render Output

	protected function render() {
		$settings   = $this->get_settings_for_display();
		$target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<section class="fdb-block py-0">
		  <div class="container py-5 my-5 bg-r" style="background-image: url(<?php echo plugins_url("../img/shapes/9.svg",__FILE__); ?>);">
		    <div class="row text-left py-5">
		      <div class="col-12 col-md-8 col-lg-6 ml-sm-auto">
		        <div class="fdb-box fdb-touch">
		          <div class="row justify-content-center">
		            <div class="col-12 col-xl-8 text-center">
		              <h1 class="title"><?php echo $settings['title'] ?></h1>
		              <p class="lead"><?php echo $settings['content'] ?></p>

		              <p class="h3 mt-4"><a href="<?php echo $settings['button_url']['url'] ?>" <?php echo $target  ?>  <?php $nofollow ?> class="btn btn-primary"><?php echo $settings['button_text'] ?></a></p>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
		<?php
	}
}