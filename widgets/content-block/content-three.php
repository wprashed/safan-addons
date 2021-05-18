<?php


class Safan_Content_Three_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'content-three';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Content Block Three', 'safan' );
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
				'label'     => __( 'Block One Title', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'Your Website', 'safan' ),
			]
		);

		// Content

		$this->add_control(
			'content',
			[
				'label'     => __( 'Block One Description', 'safan' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Content', 'safan' ),
				'default'     => __( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'safan' ),
			]
		);

		// Button

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Block One Button Text', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Button Text', 'safan' ),
				'default'     => __( 'Read More', 'safan' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label'     => __( 'Block One Button Url', 'safan' ),
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

		// Title

		$this->add_control(
			'title_two',
			[
				'label'     => __( 'Amazing Design', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'Froala Blocks', 'safan' ),
			]
		);

		// Content

		$this->add_control(
			'content_two',
			[
				'label'     => __( 'Block Two Description', 'safan' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'		=> '6',
				'placeholder' => __( 'Enter Content', 'safan' ),
				'default'     => __( 'Right at the coast of the Semantics, a large language ocean. A small river named Dude a rge language ocean there live the blind.', 'safan' ),
			]
		);

		// Button

		$this->add_control(
			'button_text_two',
			[
				'label'     => __( 'Block Two Button Text', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Button Text', 'safan' ),
				'default'     => __( 'Read More', 'safan' ),
			]
		);

		$this->add_control(
			'button_url_two',
			[
				'label'     => __( 'Block Two Button Url', 'safan' ),
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

		// Content

		$this->add_control(
			'content_color',
			[
				'label'     => __( 'Description Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#8C95A3',
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
				'selector' => '{{WRAPPER}} .lead',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Button Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#59A7E4',
				'selectors' => [
					'{{WRAPPER}} .lead a' => 'color: {{VALUE}}'
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
		$target_two = $settings['button_url_two']['is_external'] ? ' target="_blank"' : '';
		$nofollow_two = $settings['button_url_two']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<section class="fdb-block">
		  <div class="container">
		    <div class="row text-left align-items-center">
		      <div class="col-12 col-md-6 col-lg-4">
		        <h2 class="title"><?php echo $settings['title'] ?></h2>
		        <p class="lead"><?php echo $settings['content'] ?></p>
		        <p class="lead"><a href="<?php echo $settings['button_url']['url'] ?>" <?php echo $target  ?>  <?php $nofollow ?>><?php echo $settings['button_text'] ?></a></p>
		      </div>

		      <div class="col-12 col-md-6 col-lg-4 pt-4 pt-md-0">
		        <h2 class="title"><?php echo $settings['title_two'] ?></h2>
		        <p class="lead"><?php echo $settings['content_two'] ?></p>
		        <p class="lead"><a href="<?php echo $settings['button_url_two']['url'] ?>" <?php echo $target_two  ?>  <?php $nofollow_two ?>><?php echo $settings['button_text_two'] ?></a></p>
		      </div>

		      <div class="col-12 col-md-8 m-auto m-lg-0 col-lg-4 pt-5 pt-lg-0">
		        <img alt="image" class="img-fluid" src="<?php echo $settings['image']['url'] ?>">
		      </div>
		    </div>
		  </div>
		</section>
		<?php
	}
}