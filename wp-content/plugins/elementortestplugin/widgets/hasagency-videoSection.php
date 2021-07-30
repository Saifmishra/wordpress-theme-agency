<?php

class VideoSection extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Video-Section';
    }

    public function get_title() {
        return __("HasAgency-Video-Section", "elementortestplugin");
    }

    public function get_icon() {
        return 'eicon-youtube';
    }

    public function get_categories() {
        return array('customCategory');
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Video Section', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(  'poster',
            [
                'label'      => __( 'Poster For Video Section', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/brand/client-logo-01.png',
                ]
            ]);

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );


        $this->add_control(
            'video_section_title',
            [
                'label' => __( 'Video Section Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'animation_enable/disable',
            [
                'label'         => __( 'Enable Animation or Disable', 'elementortestplugin' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'default'       => 'yes',
                'options' => [
                    'yes'  => __( 'Yes', 'elementortestplugin' ),
                    'no' => __( 'No', 'elementortestplugin' ),


                ],
            ]
        );



        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="video-section section section-padding-150" data-overlay="0.7" data-bg-image="'.esc_attr($settings['poster']['url']).'">

            <div class="container text-center">

                <!-- Section Title Start -->
                <div class="section-title color-light text-center mb-lg-14 mb-md-8 mb-6" data-aos="fade-up">
                    <h2 class="title">'.esc_html($settings['video_section_title']).'</h2>
                </div>
                <!-- Section Title End -->
                <a href="https://www.youtube.com/watch?v=eS9Qm4AOOBY" class="play-btn icon video-popup"><i class="fas fa-play"></i></i></a>

            </div>';
if('yes'== $settings['animation_enable/disable']) {
   echo '<!-- Animation Shape Start -->
            <div class="shape shape-1 scene">
                <span data-depth="1">
                    <img src="'.get_template_directory_uri().'/assets/assets/images/shape-animation/newsletter-shape.png" alt="">
                </span>
            </div>
            <!-- Animation Shape End -->

        </div>';
}

    }

    protected function _content_template(){


    }


}


