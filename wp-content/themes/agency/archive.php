<?php get_header(); ?>

<!-- Page Title Section Start -->
<?php if(get_theme_mod('agency_breadcrumb_enable/disable')){ ?>
<div class="page-title-section section section-padding-top" data-overlay="0.7" data-bg-image="<?php
if(get_theme_mod('agency_breadcamb_image')){
    echo get_theme_mod('agency_breadcamb_image');
}
?>">
    <div class="page-title">
        <div class="container">
            <h1 class="title"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="page-breadcrumb position-static">
        <div class="container">
            <ul class="breadcrumb justify-content-center">
                <li><a href="index.html">Home</a></li>
                <li class="current"><?php $category = get_the_archive_title();

                $category = ltrim($category,'Category:');
                echo $category;



                ?></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
<!-- Page Title Section End -->
<div class="section section-padding-t90-b100">
    <div class="container shape-animate">
        <!-- Section Title Start -->

        <?php the_content(); ?>


    </div>
</div>


<?php get_footer(); ?>
