<?php

class Image_Static_Slider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Brand-Gallery';
    }

    public function get_title() {
        return __("HasAgency-Brand-Gallery", "elementortestplugin");
    }

    public function get_icon() {
        return 'fab fa-slideshare';
    }

    public function get_categories() {
        return array('customCategory');
    }

//    public function get_script_depends() {}
//
//    public function get_style_depends() {}

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Brand Static Slider', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $workRepeater = new Elementor\Repeater();

        $workRepeater->add_control(  'brand_image',
            [
                'label'      => __( 'Brand Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/brand/client-logo-01.png',
                ]
            ]);

        $workRepeater->add_control(
            'brand_image_url',
            [
                'label' => __( 'Brand Image Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );







        $this->add_control('brand_image_section', [
            'label'             => __( 'Add Your Brand Image', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $workRepeater->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Brand Section',


                ]
            ],



        ]);






        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="brand-section section section-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-wrapper">
                            <div class="brand-list">
                                <div class="brand-carousel swiper-container" data-aos="fade-up">
                                    <div class="swiper-wrapper">';

                       foreach ($settings['brand_image_section'] as $brandContent){
                           echo' <div class="swiper-slide brand">
                                            <a href="'.esc_attr($brandContent['brand_image_url']).'">
                                                <img src="'.esc_attr($brandContent['brand_image']['url']).'" alt="Brand Image">
                                            </a>
                                        </div>';


                       }
                                    echo '</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';


    }

    protected function _content_template(){


    }


}

