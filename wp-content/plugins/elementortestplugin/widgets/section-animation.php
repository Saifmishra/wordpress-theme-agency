<?php

class SectionAnimation extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'Big HasAnimation';
    }

    public function get_title() {
        return __("Big HasAnimation", "elementortestplugin");
    }

    public function get_icon() {
        return 'fab fa-accusoft';
    }

    public function get_categories() {
        return array('general', 'customCategory');
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('HasAnimation', 'elementortestplugin'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'hasAnimation',
            [
                'label' => __( 'HasAnimation', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    'yes' => __( 'Yes', 'elementortestplugin' ),
                    'no' => __( 'No', 'elementortestplugin' ),
                ],
                'default' => 'yes',
            ]
        );

        $this->add_control(  'image',
            [
                'label'      => __( 'Animation Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/shape-animation/about-shape-1.png',
                ]
            ]);

        $this->add_control(
            'depth',
            [
                'label'         => __( 'Depth', 'elementortestplugin' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'default'       => 'gradient-1',
                'options' => [
                    'gradient-1'  => __( 'gradient-1', 'elementortestplugin' ),
                    'gradient-2' => __( 'gradient-2', 'elementortestplugin' ),
                    'gradient-3' => __( 'gradient-3', 'elementortestplugin' ),
                    'gradient-4' => __( 'gradient-4', 'elementortestplugin' ),

                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render() {

        $settings = $this->get_settings_for_display();
        $animation = $settings['hasAnimation'];
        $animationImage = $settings['image']['url'];


        if('yes'==$animation){
        echo '<div class="shape shape-1 scene"><span data-depth="1" style="margin: auto;
  width: 50%;"><img src="'.esc_attr($animationImage).'" alt=""></span></div>';
        }
    }





}