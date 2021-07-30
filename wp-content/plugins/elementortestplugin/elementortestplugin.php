<?php
/*
 * Plugin Name: Elementor Test Plugin
 * Description: This is a Plugin of creation Elementor Addons. You must install Elementor Plugin First.
 * Version: 1.0
 * Author: MD. Saiful Islam
 * Author URI: https://devsaifulislam.com/
 * Text Domain: elementortestplugin
 */


if (!defined('ABSPATH')) {
    die(__("Direct access of this plugin is not allowed", "elementortestplugin"));
}

final class ElementorTestExtension {

    const VERSION = 1.0;
    const MINIMUM_ELEMENTOR_VERSION= 3.0;
    const MINIMUM_PHP_VERSION = 5.2;

    private static $_instance = null;
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );
        add_action('elementor/elements/categories_registered', [ $this, 'our_custom_categories' ] );
//        add_action("elementor/frontend/after_register_scripts", [ $this, "isotp_assets"]);


    }
    public function isotp_assets(){

        //testing

        //testing

        wp_localize_script('widget-1', 'agency', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

    public function our_custom_categories($manager){
        $manager->add_category('customCategory', [
            'title' => __('HasAgency Category', 'elementortestplugin'),
            'icon' => 'fas fa-book'
        ]);
    }
    public function on_plugins_loaded() {}

        public function is_compatible() {

            // Check for required PHP version
            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return false;
            }

            return true;
        }



    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
        /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'elementortestplugin' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'elementortestplugin' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }


        public function init() {
            add_action("elementor/frontend/after_register_scripts", [ $this, "isotp_assets"]);
            load_plugin_textdomain( 'elementortestplugin' );

            // Check if Elementor installed and activated
            if ( ! did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
                return false;
            }

            // Check for required Elementor version
            if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
                return false;
            }
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
            add_action( 'wp_ajax_agency_test_ajax', [ $this, 'ajax_request' ]);


        }

        public function init_widgets(){
            require_once( __DIR__ . '/widgets/our-test-widget.php' );
            require_once( __DIR__ . '/widgets/theme-animation.php' );
            require_once( __DIR__ . '/widgets/section-animation.php' );
            require_once( __DIR__ . '/widgets/isotop-section.php' );
            require_once( __DIR__ . '/widgets/hasagency-work.php' );
            require_once( __DIR__ . '/widgets/hasagency-galleryStaticSlider.php' );
            require_once( __DIR__ . '/widgets/hasagency-accordion.php' );
            require_once( __DIR__ . '/widgets/hasagency-videoSection.php' );
            require_once( __DIR__ . '/widgets/hasagency-testimonial-carousel.php' );
            require_once( __DIR__ . '/widgets/hasagency-animation-gallery.php' );
            require_once( __DIR__ . '/widgets/hasagency-animation-video-section.php' );
            require_once( __DIR__ . '/widgets/homePageImagePost.php' );
            require_once( __DIR__ . '/widgets/agencyworkDetails.php' );
            // Register widget
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Out_First_Elementor_Test_Widget() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Slider() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \SectionAnimation() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Work() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Image_Static_Slider() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Accordion() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \VideoSection() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Testimonial() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AnimationGallery() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \VideoSectionWithAnimation() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \IsotopSection() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Image_Box_post() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AgencyWorkDetails() );

        }


    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'elementortestplugin' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementortestplugin' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }


    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementortestplugin' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'elementortestplugin' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementortestplugin' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

        public function includes() {}

    }
ElementorTestExtension::instance();