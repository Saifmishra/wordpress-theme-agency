<?php

class Accordion extends \Elementor\Widget_Base{
    public function get_name() {
        return 'HasAgency-Accordion';
    }

    public function get_title() {
        return __("HasAgency-Accordion", "elementortestplugin");
    }

    public function get_icon() {
        return 'eicon-accordion';
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
                'label' => __( 'Accordion Section', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $accordion = new Elementor\Repeater();


        $accordion->add_control(
            'accordion_title',
            [
                'label' => __( 'Accordion Title', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $accordion->add_control(
            'accordion_title_url',
            [
                'label' => __( 'Accordion Title URL', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $accordion->add_control(
            'accordion_description',
            [
                'label'     => __( 'Accordion Description', 'elementortestplugin' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,

            ]
        );

        $accordion->add_control(
            'show',
            [
                'label' => __( 'Show Description', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    'show' => __( 'Yes', 'elementortestplugin' ),
                    '' => __( 'No', 'elementortestplugin' ),
                ],
                'default' => 'false',
            ]
        );


        $accordion->add_control(
            'uniqueId',
            [
                'label' => __( 'Please Give a ID*', 'elementortestplugin' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    'collapseOne' => __( 'One', 'elementortestplugin' ),
                    'collapseTwo' => __( 'Two', 'elementortestplugin' ),
                    'collapseThree' => __( 'Three', 'elementortestplugin' ),
                    'collapseFour' => __( 'Four', 'elementortestplugin' ),
                    'collapseFive' => __( 'Five', 'elementortestplugin' ),
                    'collapseSix' => __( 'Six', 'elementortestplugin' ),
                ],
                'default' => 'false',
            ]
        );






        $this->add_control('Accordion', [
            'label'             => __( 'Add Your Work', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $accordion->get_controls(),
            'title_field'       => '{{{ title }}}',
            'default'           => [
                [
                    'title'         => 'Add Your Accordion',



                ]
            ],



        ]);






        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        echo '  <div class="agency-accordion max-mb-n30" id="accordionExample">';
                               foreach ($settings['Accordion'] as $accordions){
                          echo '<div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a href="'.esc_attr($accordions['accordion_title_url']).'" class="acc-btn border-0" data-toggle="collapse" data-target="#'.esc_attr($accordions['uniqueId']).'" aria-expanded="true" aria-controls="collapseOne">'.esc_html($accordions['accordion_title']).'</a>
                                        </h5>
                                    </div>

                                    <div id="'.esc_attr($accordions['uniqueId']).'" class="collapse '.esc_attr($accordions['show']).'" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">'.esc_html($accordions['accordion_description']).'</div>
                                    </div>
                                </div>';

                               }
                              echo  '</div>';


    }

    protected function _content_template(){


    }


}

