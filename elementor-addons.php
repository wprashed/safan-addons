<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       Safan Elementor Addons
 * Description:       Safan Elementor Addons for Elementor Page Builder
 * Version:           3.0.0
 * Author:            Md Rashed Hossain
 * Author URI:        https://wprashed.com
 * Tags:			  elementor, elementor widget, elementor extention, elementor content block, elementor content widget
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       safan
 * Domain Path:       /languages
 */

final class Safan_Elementor_Extension {

	// Widget Version

	const VERSION = '2.0.0';

	// Minimum Elementor Version

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	// Minimum PHP Version

	const MINIMUM_PHP_VERSION = '5.6';

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {

		load_plugin_textdomain( 'safan' );

	}

	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_new_category'] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles'] );
		add_action( "elementor/frontend/after_enqueue_scripts", [ $this, 'widget_scripts' ] );
	}

	function widget_scripts(){
		wp_enqueue_script("bootstrap-js",plugins_url("/assets/plugins/bootstrap/bootstrap.min.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("aos-js",plugins_url("/assets/plugins/aos/aos.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("shuffle-js",plugins_url("/assets/plugins/shuffle/shuffle.min.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("animated-js",plugins_url("/assets/plugins/animated-text/animated-text.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("apear-js",plugins_url("/assets/plugins/counto/apear.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("counTo-js",plugins_url("/assets/plugins/counto/counTo.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("flipclock-js",plugins_url("/assets/js/flipclock.min.js",__FILE__),array('jquery'),'1.0',true);
		wp_enqueue_script("timerelement-helper-js",plugins_url("/assets/js/scripts.js",__FILE__),array('jquery','flipclock-js'),time(),true);
		wp_enqueue_script("script-js",plugins_url("/assets/js/script.js",__FILE__),array('jquery','flipclock-js'),time(),true);
	}

	function widget_styles(){
		wp_enqueue_style("bootstrap", plugins_url("/assets/css/bootstrap.css", __FILE__));
		wp_enqueue_style("font-awesome", plugins_url("/assets/css/font-awesome.css", __FILE__));
		wp_enqueue_style("font-awesome", plugins_url("/assets/plugins/themify/css/themify-icons.css", __FILE__));
		wp_enqueue_style("font-awesome", plugins_url("/assets/plugins/counto/animate.css", __FILE__));
		wp_enqueue_style("font-awesome", plugins_url("/assets/plugins/aos/aos.css", __FILE__));
		wp_enqueue_style("font-awesome", plugins_url("/assets/plugins/animated-text/animated-text.css", __FILE__));
		wp_enqueue_style("frola", plugins_url("/assets/css/style.css", __FILE__));
		wp_enqueue_style("frola", plugins_url("/assets/css/froala_blocks.min.css", __FILE__));
		wp_enqueue_style("flipclock-css",plugins_url("/assets/css/flipclock.css",__FILE__));
	}

	public function register_new_category($manager){
		$manager->add_category('safan', [
			'title'=>__('Safan Addons', 'safan'),
			'icon'=>'fa fa-image'
		]);
	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'safan' ),
			'<strong>' . esc_html__( 'Safan Elementor Extension', 'safan' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'safan' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'safan' ),
			'<strong>' . esc_html__( 'Safan Elementor Extension', 'safan' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'safan' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'safan' ),
			'<strong>' . esc_html__( 'Safan Elementor Extension', 'safan' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'safan' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/content-block/content-one.php' );
		require_once( __DIR__ . '/widgets/content-block/content-two.php' );
		require_once( __DIR__ . '/widgets/content-block/content-three.php' );
		require_once( __DIR__ . '/widgets/content-block/content-four.php' );
		require_once( __DIR__ . '/widgets/content-block/content-five.php' );
		require_once( __DIR__ . '/widgets/content-block/content-six.php' );
		require_once( __DIR__ . '/widgets/content-block/content-seven.php' );
		require_once( __DIR__ . '/widgets/timer-widget.php' );
		require_once( __DIR__ . '/widgets/about.php' );
		require_once( __DIR__ . '/widgets/experience.php' );
		require_once( __DIR__ . '/widgets/skill.php' );
		require_once( __DIR__ . '/widgets/service.php' );
		require_once( __DIR__ . '/widgets/contact.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_One_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Two_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Three_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Four_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Five_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Six_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Content_Seven_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Timer_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_About_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Experience_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Skill_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Service_widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Safan_Contact_widget() );

	}

}

Safan_Elementor_Extension::instance();