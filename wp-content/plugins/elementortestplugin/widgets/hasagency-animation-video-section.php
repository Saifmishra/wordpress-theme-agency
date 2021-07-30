<?php

class VideoSectionWithAnimation extends \Elementor\Widget_Base{
    public function get_name() {
        return 'Animate-Video-Section';
    }

    public function get_title() {
        return __("Animate-Video-Section", "elementortestplugin");
    }

    public function get_icon() {
        return 'fas fa-file-video';
    }

    public function get_categories() {
        return array('customCategory');
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Animate Video Section ', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );








        $this->add_control(  'poster',
            [
                'label'      => __( 'Video section poster image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);

        $this->add_control(
            'show',
            [
                'label' => __( 'Show or hide Animation', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'show',
                'options' => [

                    'show' => __( 'Yes', 'elementortestplugin' ),
                    'hide' => __( 'No', 'elementortestplugin' ),
                ],

            ]
        );


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="video-popup-area">
                            <!-- Video Popup Start -->
                            <div class="skill-video" data-aos="fade-up">
                                <img class="image" src="'.esc_attr($settings['poster']['url']).'" alt="video popup">
                                <a href="'.esc_attr($settings['video_url']).'" class="icon video-popup"><i
                                        class="fas fa-play"></i></i></a>
                            </div>
                            <!-- Video Popup End -->

                            <!-- Animation Shape Start -->';
                           if('show'== $settings['show']){
                            echo '<div class="shape shape-1 scene">
                                <span data-depth="1">
                                    <img src="'.esc_attr(get_template_directory_uri()).'/assets/assets/images/shape-animation/video-shape-1.png" alt="">
                                </span>
                            </div>
                            <!-- Animation Shape End -->';
                           }
                        echo '</div>';


    }

    protected function _content_template(){


    }


}




