<?php

class AgencyWorkDetails extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Custom-Work-Details';
    }

    public function get_title() {
        return __("HasAgency-Custom-Work-Details", "elementortestplugin");
    }

    public function get_icon() {
        return 'fa fa-industry';
    }

    public function get_categories() {
        return array('customCategory');
    }



    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Add your project details', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $projectDetails = new Elementor\Repeater();
        $projectDetails->add_control(
            'project_details',
            [
                'label' => __( 'Your Project Details', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );
        $this->add_control('projectDetailsOfWork', [
            'label'             => __( 'Project Details', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $projectDetails->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Add Your Project Details',



                ]
            ],
        ]);
        $this->add_control(
            'project_date',
            [
                'label' => __( 'Project Date', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'client_name',
            [
                'label' => __( 'Client Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'category_name',
            [
                'label' => __( 'Category Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'category_url',
            [
                'label' => __( 'Category URL', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );


        $this->add_control(
            'award_name',
            [
                'label' => __( 'Award Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'link_name',
            [
                'label' => __( 'Link Button Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'link_url',
            [
                'label' => __( 'Link Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(  'project_main_image',
            [
                'label'      => __( 'Project Main Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);


        $this->add_control(
            'project_name',
            [
                'label' => __( 'Project Name', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'project_excerpt',
            [
                'label' => __( 'Project Excerpt', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $this->add_control(  'project_gallery_image_one',
            [
                'label'      => __( 'Project Gallery Image One', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);
        $this->add_control(  'project_gallery_image_two',
            [
                'label'      => __( 'Project Gallery Image Two', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);

        $this->add_control(  'project_gallery_image_three',
            [
                'label'      => __( 'Project Gallery Image Three', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);



        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="section section-padding">
            <div class="container">
                <div class="row pt--100 pb--80">

                    <!-- Portfolio Left -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="work-left work-details" data-aos="fade-up">
                            <div class="portfolio-main-info">
                                <h2 class="title">About the <br> project</h2>
                                <!-- Start Details List -->
                                <div class="work-details-list mt-lg-12 mt-8">

                                    <div class="details-list">
                                        <label>Date</label>
                                        <span>'.esc_html($settings['project_date']).'</span>
                                    </div>

                                    <div class="details-list">
                                        <label>Client</label>
                                        <span>'.esc_html($settings['client_name']).'</span>
                                    </div>

                                    <div class="details-list">
                                        <label>Categories</label>
                                        <span><a href="'.esc_attr($settings['category_url']).'">'.esc_html($settings['category_name']).'</a></span>
                                    </div>

                                    <div class="details-list">
                                        <label>Awards</label>
                                        <span>'.esc_html($settings['award_name']).'</span>
                                    </div>

                                </div>
                                <!-- End Details List -->
                                <!-- Start Work Share -->
                                <div class="work-share">
                                    <h6 class="mt-6" >SHARE</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Work Right -->
                    <div class="col-lg-7 col-md-6 offset-lg-1 col-12">
                        <div class="work-left work-details mt-6">
                            <div class="work-main-info">
                                <div class="work-content">
                                    <h6 class="title" data-aos="fade-up">ABOUT THE PROJECT</h6>

                                    <div class="desc mt-8">';
                                            foreach ($settings['projectDetailsOfWork'] as $detailsOfProject){
                                        echo '<div class="content mb-8" data-aos="fade-up">
                                            <p>'.esc_html($detailsOfProject['project_details']).'</p>
                                        </div>';
                                            }

                                        echo '<div class="work-btn">';
                                            if($settings['link_name']){
                                            echo'<a class="btn btn-primary btn-hover-secondary" href="'.esc_attr($settings['link_url']).'">'.esc_html($settings['link_name']).'</a>';
                                            }
                                        echo '</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-column-thumbnail mt-lg-14 mt-10" data-aos="fade-up">
                            <img class="w-100" src="'.esc_attr($settings['project_main_image']['url']).'" alt="Agency">
                        </div>
                    </div>
                </div>

                <div class="row mt-lg-20 mt-12">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="digital-marketing" data-aos="fade-up">
                            <h3 class="heading heading-h3">'.esc_html($settings['project_name']).'</h3>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12 offset-lg-1">
                        <div class="digital-marketing mt-lg-0 mt-6" data-aos="fade-up">
                            <div class="inner">
                                <p>'.esc_html($settings['project_excerpt']).'';
        echo '</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-layout-gallery mt-lg-20 mt-12">
                    <div class="row mb-n6">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="thumbnail" data-aos="fade-up">
                                <img class="w-100" src="'.esc_attr($settings['project_gallery_image_one']['url']).'" alt="Agency Gallery Image one">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-lg-0 mt-md-0 mt-10">
                            <div class="thumbnail" data-aos="fade-up">
                                <img class="w-100" src="'.esc_attr($settings['project_gallery_image_two']['url']).'" alt="Agency gallery Image Two">
                            </div>
                        </div>

                        <div class="col-lg-12 my-6">
                            <div class="thumbnail" data-aos="fade-up">
                                <img class="w-100" src="'.esc_attr($settings['project_gallery_image_three']['url']).'" alt="Agency Gallery Image Three">
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



