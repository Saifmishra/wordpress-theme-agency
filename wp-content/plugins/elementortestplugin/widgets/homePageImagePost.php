<?php

class Image_Box_post extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgrncy-HomePge-post';
    }

    public function get_title() {
        return __("HasAgency-Homepge-Post", "elementortestplugin");
    }

    public function get_icon() {
        return 'eicon-image-box';
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
                'label' => __( 'Image Box Post', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



       $this->add_control(  'post_image',
            [
                'label'      => __( 'Post Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);

        $this->add_control(
            'post_title',
            [
                'label' => __( 'Post Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $this->add_control(
            'post_description',
            [
                'label' => __( 'Post Description', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $this->add_control(
            'post_readMore',
            [
                'label' => __( 'Post read More', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );
        $this->add_control(
            'post_readMore_url',
            [
                'label' => __( 'Post read More Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="blog">
                            <div class="thumbnail">
                                <a href="blog-details.html" class="image"><img src="'.esc_attr($settings['post_image']['url']).'"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="info">
                                <h3 class="title"><a href="blog-details.html">'.esc_html($settings['post_title']).'</a></h3>
                                <p class="desc">'.esc_html($settings['post_description']).'</p>
                                <a href="'.esc_attr($settings['post_readMore_url']).'" class="link "> <mark>'.esc_html($settings['post_readMore']).'</mark> </a>
                            </div>
                        </div>';


    }

    protected function _content_template(){


    }


}

