<?php


class Safan_Contact_widget extends \Elementor\Widget_Base {

	// Widget Name

	public function get_name() {
		return 'contact';
	}

	// Widget Titke

	public function get_title() {
		return __( 'Contact', 'safan' );
	}

	// Widget Icon

	public function get_icon() {
		return 'fa fa-envelope-open-o';
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
				'label' => __( 'Contact Controls', 'safan' ),
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

		// Phone

		$this->add_control(
			'phone',
			[
				'label'     => __( 'Phone', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Phone', 'safan' ),
				'default'     => __( '1800 667 3322', 'safan' ),
			]
		);

		// Email

		$this->add_control(
			'email',
			[
				'label'     => __( 'Email', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Email', 'safan' ),
				'default'     => __( 'wprashed@icloud.com', 'safan' ),
			]
		);

		// Address

		$this->add_control(
			'address',
			[
				'label'     => __( 'Address', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Address', 'safan' ),
				'default'     => __( '3971 Wines Lane Houston, Texas 77036 363 Detroit Street', 'safan' ),
			]
		);

		// Form Title

		$this->add_control(
			'ftitle',
			[
				'label'     => __( 'Form Title', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Form Title', 'safan' ),
				'default'     => __( 'Contact us', 'safan' ),
			]
		);

		// Form Shortcode

		$this->add_control(
			'shortcode',
			[
				'label'     => __( 'Form Shortcode', 'safan' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Form Shortcode', 'safan' ),
				'default'     => __( '[contact-form-7 id="63" title="Contact form 1"]', 'safan' ),
			]
		);

		$this->end_controls_section();



	}

	// Widget Render Output

	protected function render() {
		$settings   = $this->get_settings_for_display();
		
		?>
		<!-- contact start -->
		<section class="contact section">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-4 mb-4 mb-lg-0 col-md-4">
		                <h4>Phone</h4>
		                <p><?php echo $settings['phone'] ?></p>
		            </div>
		            <div class="col-lg-4 mb-4 mb-lg-0 col-md-4">
		                <h4>Email</h4>
		                <p><?php echo $settings['email'] ?></p>
		            </div>
		            <div class="col-lg-4 col-md-4">
		                <h4>Address</h4>
		                 <p><?php echo $settings['address'] ?></p>
		            </div>
		        </div>

		        <div class="row justify-content-center">
		            <div class="col-lg-8">
		                <div class="text-center mb-5 contact-title">
		                    <h2><?php echo $settings['ftitle'] ?></h2>
		                </div>

		                <?php echo $settings['shortcode'] ?>
		            </div>  
		        </div>
		    </div>
		</section>
		<!-- contact end -->
		<?php

	}
}