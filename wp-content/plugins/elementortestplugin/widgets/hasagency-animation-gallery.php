<?php

class AnimationGallery extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Animation-Gallery';
    }

    public function get_title() {
        return __("HasAgency-Animation-Gallery", "elementortestplugin");
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array('customCategory');
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Animation Gallery Section', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_title',
            [
                'label' => __( 'Animation Section Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );



        $this->add_control(
            'animation_description',
            [
                'label' => __( 'Animation Section Description', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $this->add_control(
            'animation_section_button',
            [
                'label' => __( 'Animation Section Button', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'animation_section_url',
            [
                'label' => __( 'Animation Section Button Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );



        $this->add_control(  'animation_one',
            [
                'label'      => __( 'Animation One', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);

        $this->add_control(  'animation_two',
            [
                'label'      => __( 'Animation two', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);

        $this->add_control(  'animation_three',
            [
                'label'      => __( 'Animation three', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);


        $this->add_control(  'animation_four',
            [
                'label'      => __( 'Animation four', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);


        $this->add_control(  'animation_five',
            [
                'label'      => __( 'Animation five', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);



        $this->add_control(  'animation_six',
            [
                'label'      => __( 'Animation six', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);


        $this->add_control(  'animation_seven',
            [
                'label'      => __( 'Animation seven', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);



        $this->add_control(  'animation_eight',
            [
                'label'      => __( 'Animation eight', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);


        $this->add_control(  'animation_nine',
            [
                'label'      => __( 'Animation nine', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<!-- CTA Section Start -->
        <div class="cta-section section section-padding-250">
            <div class="container text-center icon-up-down-animation">
                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up">
                    <h2 class="title fz-34">'.esc_html($settings['animation_title']).'</h2>
                    <p class="sub-title">'.esc_html($settings['animation_description']).'</p>
                </div>
                <!-- Section Title End -->';
            if($settings['animation_section_button']){
               echo '<a class="btn btn-primary btn-hover-secondary" href="'.esc_attr($settings['animation_section_url']).'">'.esc_html($settings['animation_section_button']).'</a>';
}
                echo '<!-- Icon Animation Start -->
                <div class="shape shape-1">
                    <span>
                        <img src="'.esc_attr($settings['animation_one']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-2">
                    <span>
                        <img src="'.esc_attr($settings['animation_two']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-3">
                    <span>
                        <img src="'.esc_attr($settings['animation_three']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-4">
                    <span>
                        <img src="'.esc_attr($settings['animation_four']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-5">
                    <span>
                        <img src="'.esc_attr($settings['animation_five']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-6">
                    <span>
                        <img src="'.esc_attr($settings['animation_six']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-7">
                    <span>
                        <img src="'.esc_attr($settings['animation_seven']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-8">
                    <span>
                        <img src="'.esc_attr($settings['animation_eight']['url']).'" alt="">
                    </span>
                </div>
                <div class="shape shape-9">
                    <span>
                        <img src="'.esc_attr($settings['animation_nine']['url']).'" alt="">
                    </span>
                </div>
                <!-- Icon Animation End -->
            </div>
        </div>
        <!-- CTA Section End -->';


    }

    protected function _content_template()
    {
?>
        <div class="cta-section section section-padding-250">
            <div class="container text-center icon-up-down-animation">
                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up">
                    <h2 class="title fz-34">{{{ settings.animation_title }}}</h2>
                    <p class="sub-title">{{{ settings.animation_description }}}</p>
                </div>
                <a class="btn btn-primary btn-hover-secondary" href="{{{settings.animation_section_url}}}">{{{settings.animation_section_button}}}</a>
                <div class="shape shape-1">
                    <span>
                        <img src="{{{settings.animation_one.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-2">
                    <span>
                        <img src="{{{settings.animation_two.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-3">
                    <span>
                        <img src="{{{settings.animation_three.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-4">
                    <span>
                        <img src="{{{settings.animation_four.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-5">
                    <span>
                        <img src="{{{settings.animation_five.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-6">
                    <span>
                        <img src="{{{settings.animation_six.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-7">
                    <span>
                        <img src="{{{settings.animation_seven.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-8">
                    <span>
                        <img src="{{{settings.animation_eight.url}}}" alt="">
                    </span>
                </div>
                <div class="shape shape-9">
                    <span>
                        <img src="{{{settings.animation_nine.url}}}" alt="">
                    </span>
                </div>
                <!-- Icon Animation End -->
            </div>
        </div>





<?php
    }


}



