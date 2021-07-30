<?php

class Work extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Work';
    }

    public function get_title() {
        return __("HasAgency-Workr", "elementortestplugin");
    }

    public function get_icon() {
        return 'fas fa-laptop-house';
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
                'label' => __( 'Work Section', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $workRepeater = new Elementor\Repeater();

        $workRepeater->add_control(  'work_image',
            [
                'label'      => __( 'Work Image', 'plugin-name' ),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => get_template_directory_uri() . '/assets/assets/images/hero-image/hero-3.jpg',
                ]
            ]);
        $workRepeater->add_control(
            'work_title',
            [
                'label' => __( 'Work Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $workRepeater->add_control(
            'work_title_url',
            [
                'label' => __( 'Work Title Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $workRepeater->add_control(
            'work_description',
            [
                'label'     => __( 'Work Description', 'elementortestplugin' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $workRepeater->add_control(
            'work_details',
            [
                'label'     => __( 'Work details', 'elementortestplugin' ),
                'type'      => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $workRepeater->add_control(
            'work_details_url',
            [
                'label' => __( 'Work Details Url', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );




        $this->add_control('work_section', [
            'label'             => __( 'Add Your Work', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $workRepeater->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Add Your Work Section',
                    'description'   => 'Add Your Description Here',

                ]
            ],



        ]);






        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '<div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mb-n6">';
                          foreach($settings['work_section'] as $workContent) {
                              ;
                              echo '<!-- Single Work Start -->
                    <div class="col mb-6" data-aos="fade-up">
                        <div class="work">
                            <div class="thumbnail">
                                <a class="image" href="'.esc_attr($workContent['work_title_url']).'"><img src="'.esc_attr($workContent['work_image']['url']).'" alt="work"></a>
                            </div>
                            <div class="info">
                                <h3 class="title"><a href="#">'.esc_html($workContent['work_title']).'</a></h3>
                                <p class="desc">'.esc_html($workContent['work_description']).'</p>
                                <a href="'.esc_attr($workContent['work_details_url']).'">'.esc_html($workContent['work_details']).'</a>
                            </div>
                        </div>
                    </div>';
                          }
                    echo'</div>';


    }

    protected function _content_template(){
        ?>

                 <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mb-n6">
                     <div class="col mb-6" data-aos="fade-up">
                         <div class="work">
                             <div class="thumbnail">
                                 <a class="image" href="{{{workContent.work_title_url}}}"><img src="{{{workContent.work_image.url}}}'" alt="work"></a>
                             </div>
                            <div class="info">
                                <h3 class="title"><a href="#">{{{workContent.work_title}}}</a></h3>
                                <p class="desc">{{{workContent.work_description}}}</p>
                                <a href="{{{workContent.work_details_url}}}">{{{workContent.work_details}}}</a>
                            </div>
                        </div>
                    </div>
                    </div>
<?php

}


}

