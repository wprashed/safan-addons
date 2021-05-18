<?php


class Safan_Content_Seven_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'content-seven';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Content Block Seven', 'safan' );
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

		// Button

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Button Text', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Button Text', 'safan' ),
				'default'     => __( 'Button', 'safan' ),
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

		// Follow Title

		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Follow Title', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Title', 'safan' ),
				'default'     => __( 'Follow Us', 'safan' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Social Icon', 'safan' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
		);

		$repeater->add_control(
			'icon_url',
			[
				'label'     => __( 'Social Url', 'safan' ),
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

		$this->add_control(
			'list',
			[
				'label' => __( 'Social Icon', 'safan' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
				'default'   => '#FE6756',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background-color: {{VALUE}}'
				]
			]
		);

		// Follow Title

		$this->add_control(
			'subtitle_color',
			[
				'label'     => __( 'Follow Title Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#A5ACB6',
				'selectors' => [
					'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'label'    => __( 'Follow Title Typography', 'safan' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .subtitle',
			]
		);

		// Icon

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Social Icon Color', 'safan' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6E757E',
				'selectors' => [
					'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}'
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
		<section class="fdb-block">
		  <div class="col-fill-right" style="background-image: url(<?php echo $settings['image']['url'] ?>);">
		  </div>

		  <div class="container py-5">
		    <div class="row">
		      <div class="col-12 col-md-5 text-center">
		        <h1 class="title"><?php echo $settings['title'] ?></h1>
		        <p class="lead"><?php echo $settings['content'] ?></p>
		        <p class="mt-4 mb-5"><a class="btn btn-secondary" href="<?php echo $settings['button_url']['url'] ?>" <?php echo $target  ?>  <?php $nofollow ?>><?php echo $settings['button_text'] ?></a></p>

		        <p class="subtitle"><?php echo $settings['subtitle'] ?></p>
		        <p>
	        	<?php if ( $settings['list'] ) {
            		foreach (  $settings['list'] as $item ) {
            	?>
            	<?php
	        		$social_target = $item['icon_url']['is_external'] ? ' target="_blank"' : '';
					$social_nofollow = $item['icon_url']['nofollow'] ? ' rel="nofollow"' : '';
	        	?>
		          <a href="<?php echo $item['icon_url']['url'] ?>" <?php echo $social_target  ?>  <?php $social_nofollow ?> class="mx-2 text-secondary"><i class="<?php echo $item['icon'] ?>"></i></a>
		        <?php } } ?>
		        </p>
		      </div>
		    </div>
		  </div>
		</section>
		<?php
	}
}