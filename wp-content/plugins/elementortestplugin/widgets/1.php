<?php


class IsotopSection extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Isotop Section';
    }

    public function get_title()
    {
        return __("Isotop Section", "elementortestplugin");
    }

    public function get_icon()
    {
        return 'fas fa-fill-drip';
    }

    public function get_categories()
    {
        return array('general', 'customCategory');
    }
    public function get_script_depends()
    {
        return ['widget-1'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'isotop_section',
            [
                'label' => __( 'Isotop Section', 'elementortestplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );




        $isotopSection = new Elementor\Repeater();
        $isotopSection->add_control(
            'title',
            [
                'label' => __( 'Isotop Section', 'elementortestplugin' ),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $allCategories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));

        $cat = [];
        $bat = ['babu', 'kabu', 'labu'];
      foreach ($allCategories as $category){
          $cat[]=$category->name;
      }

            $isotopSection->add_control(
                'selectcat',
                [
                    'label'     => __('Select Category', 'elementortestplugin'),
                    'type'      => \Elementor\Controls_Manager::SELECT,

                    'options' => $cat,

                ]
            );

        $this->add_control('isotop', [
            'label'             => __( 'Isotop Section', 'elementortestplugin' ),
            'type'              => \Elementor\Controls_Manager::REPEATER,
            'fields'            => $isotopSection->get_controls(),
            'title_field'       => '{{{ title }}}',




        ]);


        $this->end_controls_section();







    }


    protected function render()
    {
        add_action( 'wp_ajax_example_ajax_request', 'agency_ajax_req');

        function agency_ajax_req(){
            $data = $_POST['fruit'];
            echo strtoupper($data);
            die();

        }

        $settings = $this->get_settings_for_display();
        $isotopSection = $settings['isotop'];


        echo '      <div class="section section-padding-t90 ag-masonary-wrapper">
            <div class="container-fluid px-0">
                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up">
                  
                </div>    <div class="messonry-button text-center mb-lg-13 mb-md-13 mb-6" data-aos="fade-up">';

foreach ($isotopSection as $isotopcat){
                    $allCategories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ));

                    $cat = [];

                    foreach ($allCategories as $category){
                        $cat[]=$category->name;
                    }
                    $value = $cat[$isotopcat['selectcat']];


                        echo '<button data-filter=".'.$value.'"><span class="filter-text">'.$value.'</span></button>';





                }

//               $val =  array_keys($_POST);
//               print_r($val);
        $allCategories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));

        $cat = [];

        foreach ($allCategories as $category){
            $cat[]=$category->name;
        }

//var_dump($cat);



for($i=0; $i<count($cat); $i++){


        $args = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'posts_per_page'    => 6,
            'order'             => 'ASC',
            'category_name'     => $cat[$i],


        );
        $arr_posts = new WP_Query($args);




        if ($arr_posts->have_posts()) {
            echo '</div><div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-0 mesonry-list">
                    <div class="resizer col"></div>
                    <!-- Single Portfolio Start -->';
            while ($arr_posts->have_posts()) {
                $arr_posts->the_post();



                    echo '<div class="col '.$cat[$i].'">
                        <div class="single-portfolio">
                            <div class="thumbnail">'.get_the_post_thumbnail('', '' , ['class' => 'img-fluid']).'</div>
                            <div class="content">
                                <h5 class="title"><a href="#">';the_title();echo' <img
                                            src="'.get_template_directory_uri().'/assets/assets/images/icons/arrow-up-right.svg" alt=""></a></h5>
                            </div>
                        </div>
                    </div>';


            }
        }

}

?>
        <script>
            var $isotopeGrid = $('.isotope-grid');

            var $isotopeFilter = $('.isotope-filter');

            $isotopeGrid.imagesLoaded(function () {
                $isotopeGrid.isotope({
                    itemSelector: '.grid-item',
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
                AOS.refresh();
            });
            isotopFilter('');
            $isotopeFilter.on('click', 'button', function () {
                var $this = $(this);
                isotopFilter($this);
            });
            function isotopFilter($filterItem){

                var  $filterValue = $filterItem.attr('data-filter'),
                    $targetIsotop = $filterItem.parent().data('target');
                $filterItem.addClass('active').siblings().removeClass('active');
                $($targetIsotop).isotope({
                    filter: $filterValue
                });
            }
        </script>

       <?php wp_reset_postdata(); ?>
<?php
            echo '</div>';

        echo '</div></div>';


    }
    protected function _content_template(){


    }


}





