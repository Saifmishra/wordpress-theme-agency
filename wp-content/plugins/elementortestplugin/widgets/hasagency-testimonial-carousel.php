<?php

class Testimonial extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Testimonial-Carousel';
    }

    public function get_title() {
        return __("HasAgency-Testimonial-Carousel", "elementortestplugin");
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return array('customCategory');
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Add Testimonial', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $testimonialCarousel = new Elementor\Repeater();



        $testimonialCarousel->add_control(  'testimonial_image',
            [
                'label'      => __( 'Testimonial Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => '',
                ]

            ]);

        $testimonialCarousel->add_control(
            'description',
            [
                'label' => __( 'Testimonial Description', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );
        $testimonialCarousel->add_control(
            'name',
            [
                'label' => __( 'Testimonial Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $testimonialCarousel->add_control(
            'position',
            [
                'label' => __( 'Testimonial Position', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );



        $this->add_control('testimonial_section', [
            'label'             => __( 'Add Testimonial For your WebSite', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $testimonialCarousel->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Testimonial Section',


                ]
            ],

        ]);


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '   <div class="testimonial-section section section-padding-t90 section-padding-bottom" data-bg-color="#f8faff">
            <div class="container-fluid pl-xl-16 pl-lg-3 pl-md-3 pl-sm-3 pl-3 pr-xl-16 pr-lg-3 pr-md-3 pr-sm-3 pr-3">
                <div class="testimonial-slider swiper-container" data-aos="fade-up">
                    <div class="swiper-wrapper"  style="margin-bottom: 30px">';
            foreach ($settings['testimonial_section'] as $testimonial) {
                echo '<div class="swiper-slide">
                            <!-- Static Testimonial Start -->
                            <div class="static-testimonial mb-6">
                                <div class="testimonial-image">
                                    <img src="' . esc_attr($testimonial['testimonial_image']['url']) . '" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>' . esc_html($testimonial['description']) . '</p>
                                </div>
                                <div class="author-info">
                                    <div class="cite">
                                        <h6 class="name">' . esc_html($testimonial['name']) . '</h6>
                                        <span class="position">' . esc_html($testimonial['position']) . '</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Testimonial End -->
                        </div>';
            }

                echo '<!--Testimonial Slider Start -->
              
                    
                    
                    
                    
                       </div>
                    <div class="swiper-pagination"></div> 
                </div>
                <!--Testimonial Slider End -->
            </div>
        </div>
        <!-- Testimonial Section End -->';


    }

    protected function __content_template(){
        ?>
        <div class="testimonial-section section section-padding-t90 section-padding-bottom" data-bg-color="#f8faff">
            <div class="container-fluid pl-xl-16 pl-lg-3 pl-md-3 pl-sm-3 pl-3 pr-xl-16 pr-lg-3 pr-md-3 pr-sm-3 pr-3">
                <div class="testimonial-slider swiper-container" data-aos="fade-up">
                    <div class="swiper-wrapper"  style="margin-bottom: 30px">
        <#
            if(settings.testimonial_section.length]){
                _.each(settings.testimonial_section, function (faq){
        #>


                        <div class="swiper-slide">
                            <!-- Static Testimonial Start -->
                            <div class="static-testimonial mb-6">
                                <div class="testimonial-image">
                                    <img src="{{{ faq.testimonial_image.url }}}" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p>' . esc_html($testimonial['description']) . '</p>
                                </div>
                                <div class="author-info">
                                    <div class="cite">
                                        <h6 class="name">' . esc_html($testimonial['name']) . '</h6>
                                        <span class="position">' . esc_html($testimonial['position']) . '</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Testimonial End -->
                        </div>
         <#
                });
            }

        #>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!--Testimonial Slider End -->
            </div>
        </div>
        <!-- Testimonial Section End -->
<?php


    }


}


