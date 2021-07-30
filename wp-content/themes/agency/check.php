<?php

/*
 * Template Name: Check
 */

//$allCatewgories = get_categories( array(
//    'orderby' => 'name',
//    'order'   => 'ASC'
//) );
//
//
//echo "<pre>";
//
//
//var_dump($allCatewgories);
//foreach ($allCatewgories as $categories){
//    echo $categories->name."<br>";
//
//
//    $categories_post = get_posts(
//        array(
//            'category' =>$categories->cat_ID,
//            'orderby'  => 'DESC'
//        )
//    );
//
//
//    foreach ($categories_post as $post){
//        setup_postdata($post);
//        echo the_title().'<br>';
//    }
//
//
//}



$allCatewgories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );

$cat = [];
foreach ($allCatewgories as $category){
    $cat[] = $category->name;
}

print_r($cat);
echo count($cat);

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'sports',

    );
    $arr_posts = new WP_Query($args);

    if ($arr_posts->have_posts()) {

        while ($arr_posts->have_posts()) {
            $arr_posts->the_post();
            echo "<br>";
            echo the_title() . "<br>";
        }
    }




$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $val[0],

);
$arr_posts = new WP_Query($args);

if ($arr_posts->have_posts()) {

    while ($arr_posts->have_posts()) {
        $arr_posts->the_post();
        echo "<br>";
        echo the_title() . "<br>";
    }
}

//?>
<!--<form method="post" action="http://localhost/agency/check-page/">-->
<!--<input type="text" name="name"><br>-->
<!--<input type="text" name="email"><br>-->
<!--<input type="submit" name="btn">-->
<!--</form>-->
<!---->
<?php
//
//print_r($_REQUEST);


    //perfect section
        /*
          <!-- Portfolio Section Start -->
        <div class="section section-padding-t90 ag-masonary-wrapper">
            <div class="container-fluid px-0">
                <div class="messonry-button text-center mb-lg-13 mb-md-13 mb-6" data-aos="fade-up">';

//        var_dump($isotopSection);
        $value = '';
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
                    echo '<form action="" method="post">';
                    echo '<button type="submit" name="'.$cat[$isotopcat['selectcat']].'" data-filter=".'.$value.'"><span class="filter-text">'.  $value.'</span></button>';
                    echo'</form>';

                }
               $val =  array_keys($_POST);

             echo '<h1>'.$val[0].'<h1>';



                echo '</div>';

                echo '<div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-0 mesonry-list">
                    <div class="resizer col"></div>';




        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => $val[0],

        );
        $arr_posts = new WP_Query($args);

        if ($arr_posts->have_posts()) {

            while ($arr_posts->have_posts()) {
                $arr_posts->the_post();
                echo '<div class="col '.$val[0].'">';
                                    echo '<div class="single-portfolio">
                         <div class="thumbnail">
                                <img class="img-fluid" src="'.the_post_thumbnail().'">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">'.the_title().' <img
                                            src="'.get_template_directory_uri().'/assets/assets/images/icons/arrow-up-right.svg" alt="hello"></a></h5>
                            </div>
                        </div>';
                echo '</div>';
                                }


                                }




                echo '</div>

            </div>
        </div>
        <!-- Portfolio Section End -->

