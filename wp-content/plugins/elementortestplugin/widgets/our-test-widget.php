<?php

class Out_First_Elementor_Test_Widget extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasProgress';
    }

    public function get_title() {
        return __("HasProgress", "elementortestplugin");
    }

    public function get_icon() {
        return 'fas fa-sliders-h';
    }

    public function get_categories() {
        return array('general', 'customCategory');
    }

//    public function get_script_depends() {}
//
//    public function get_style_depends() {}

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



//
//        $this->add_control(
//            'title',
//            [
//                'label' => __( 'Title', 'elementortestplugin' ),
//                'type' => \Elementor\Controls_Manager::TEXT,
//                'placeholder' => __( 'Progress Bar Title', 'elementortestplugin' ),
//
//            ]
//        );

        $this->add_control(
            'skills',
            [
                'label' => __( 'Skills', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Skill Name', 'elementortestplugin' ),
            ]
        );
        $this->add_control(
            'percentage',
            [
                'label' => __( 'Percentage', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Give Your Skill percentage', 'elementortestplugin' ),
            ]
        );




        $this->add_control(
            'gradient',
            [
                'label'         => __( 'Progress Gradient Color', 'elementortestplugin' ),
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
        $gradient =  $settings['gradient'];
        ?>
        <style>
            .oembed-elementor-widget{
                text-align: <?php echo esc_attr($alignment)?>;
            }
        </style>
<?php
        $settingsofSkills = $this->get_settings_for_display();
        $settings = $this->get_settings_for_display();
        $settingsofTitle = $this->get_settings_for_display();

        $html =  $settings['skills'];
        $settingsofSkills = $settings['percentage'];


//
//<div class="section-title-two">
//                               <span class="sub-title">'.esc_html($settingsofSubTitle).'</span>
//                            </div>

        echo '<div class="progress-bar--one">
                                <!-- Start Single Progress Charts -->
                                <div class="progress-charts">
                                    <h6 class="heading ">'.esc_html($html).'</h6>
                                    <div class="progress">
                                        <div class="progress-bar '.esc_attr($gradient).' wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".3s" role="progressbar" style="width: '.esc_html($settingsofSkills).'%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">'.esc_html($settingsofSkills).'%</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Progress Charts -->
               </div>';

//        echo esc_html($html);
//
//        echo '</h1>';
    }

    protected function _content_template() {}

}
?>


