<?php

class Slider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasSlider';
    }

    public function get_title() {
        return __("HasSlider", "elementortestplugin");
    }

    public function get_icon() {
        return 'fas fa-sliders-h';
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
                'label' => __( 'Content', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $sliderRepeater = new Elementor\Repeater();
        $sliderRepeater->add_control(
            'title',
            [
                'label' => __( 'Slider Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $sliderRepeater->add_control(
            'description',
            [
                'label'     => __( 'Slider Description', 'elementortestplugin' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $sliderRepeater->add_control(  'image',
            [
                'label'      => __( 'Choose Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);
        $sliderRepeater->add_control(
            'firstButton',
            [
                'label' => __( 'First Button Text', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $sliderRepeater->add_control(
            'firstButtonUrl',
            [
                'label' => __( 'First Button URl', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $sliderRepeater->add_control(
            'secondButton',
            [
                'label' => __( 'Second Button Text', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $sliderRepeater->add_control(
            'secondButtonUrl',
            [
                'label' => __( 'Second Button URl', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control('slidercontent', [
            'label'             => __( 'Slider Section', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $sliderRepeater->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Hello Bangladesh',
                    'description'   => 'This is first slider of my own making',

                ]
            ],



        ]);






        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="intro-slider-wrap section">
            <div class="intro-slider swiper-container">
             <div class="swiper-wrapper">';
        if($settings['slidercontent']){

            foreach ($settings['slidercontent'] as $sliderContent){
                echo ' <div class="swiper-slide">
                        <div class="intro-section section overlay" data-bg-image="'.esc_attr($sliderContent['image']['url']).'">

                            <div class="container">
                                <div class="row row-cols-lg-1 row-cols-1">

                                    <div class="col align-self-center">
                                        <div class="intro-content mt-xl-8 mt-lg-8 mt-md-8 mt-sm-8 mt-xs-8">
                                            <h2 class="title">'.esc_html($sliderContent['title']).'</h2>
                                            <div class="desc">
                                                <p>'.esc_html($sliderContent['description']).'</p>
                                            </div>';
                if($sliderContent['firstButton']){
                    echo '<a href="'.esc_attr($sliderContent['firstButtonUrl']).'" class="btn btn-primary btn-hover-secondary">'.esc_html($sliderContent['firstButton']).'</a>';
                }

                if($sliderContent['secondButton']){
                    echo '<a href="'.esc_attr($sliderContent['secondButtonUrl']).'" class="btn btn-outline-white btn-hover-primary">'.esc_html($sliderContent['secondButton']).'</a>';
                }

                echo '</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>';
            }

            }
        echo '<div class="home-slider-prev swiper-button-prev main-slider-nav"><i class="fal fa-angle-left"></i></div>
                <div class="home-slider-next swiper-button-next main-slider-nav"><i class="fal fa-angle-right"></i>
                </div>
            </div>
            </div>
            </div>';

    }

    protected function _content_template()
    {
      ?>
        <script>
        console.log(settings);
        var titleOne = {
            id: settings.slidercontent.0.title,
        }
        </script>
        <h1>{{{titleOne}}}</h1>
     <?php

    }

}

