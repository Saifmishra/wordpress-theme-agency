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
                <h1 class="title"><?php _e('Search Result For - ', 'hasagency'). the_search_query(); ?></h1>
            </div>
        </div>
        <div class="page-breadcrumb position-static">
            <div class="container">
                <ul class="breadcrumb justify-content-center">
                    <li><a href="index.html">Home</a></li>
                    <li class="current"><?php the_search_query(); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- Page Title Section End -->

    <!-- Blog Section Start -->
    <div class="section section-padding fix">
        <div class="container">
            <div class="row mb-n10">

                <div class="col-lg-8 col-12 order-lg-1 mb-10">
                    <!-- Blog Wrapper Start -->


                    <?php
                    //                    get_template_part('partsOfTemplate/content', 'excerpts');
                    if(have_posts()){
                        while (have_posts()){
                            the_post();
                            get_template_part('partsOfTemplate/content','excerpts');
                        }
                    }



                    ?>

                    <!-- Blog Wrapper End -->


                    <!-- Pagination Start -->
                    <div class="row">
                        <div class="col">

                               <?php

                               hasagency_pagination();



                               ?>
                        </div>
                    </div>
                </div>

                <!-- Pagination End -->

                <div class="col-lg-4 col-12 order-lg-2 mb-10">
                    <div class="sidebar-widget-wrapper">
                       <?php get_search_form() ?>
                        <div class="sidebar-widget">
                          <?php

                            if(is_active_sidebar('cat_blog_page')){
                                dynamic_sidebar('cat_blog_page');
                            }

                          ?>
                        </div>
                        <div class="sidebar-widget">
                            <?php

                            if(is_active_sidebar('popular_post')){
                                dynamic_sidebar('popular_post');
                            }

                            ?>
                        </div>

                        <div class="sidebar-widget">
                            <div class="sidebar-widget-content">
                                <div class="sidebar-widget-banner" data-overlay="0.7" data-bg-image="<?php echo get_template_directory_uri();?>/assets/assets/images/bg/breadcrumb-bg.jpg">
                                    <?php

                                    if(is_active_sidebar('subscribe')){
                                        dynamic_sidebar('subscribe');
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <?php

                            if(is_active_sidebar('tag')){
                                dynamic_sidebar('tag');
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- CTA Section Start -->
    <div class="section section-padding-t110-b120 newsletter-section" data-overlay="0.7" data-bg-image="<?php if(get_theme_mod('feature_product_one')){ echo get_theme_mod('feature_product_one'); } ?>">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-12 m-auto">
                    <!-- CTA Content Start -->
                    <div class="cta-content text-center">
                        <!-- Section Title Start -->
                        <div class="section-title color-light text-center mb-0" data-aos="fade-up">
                            <h2 class="title"><?php if(get_theme_mod('title')){ echo get_theme_mod('title'); } ?></h2>
                            <p class="sub-title fz-18">
                                <?php if(get_theme_mod('description')){ echo get_theme_mod('description'); } ?></p>
                        </div>
                        <!-- Section Title End -->
                        <?php if(get_theme_mod('btn_text')){
                            ?>

                        <a href="<?php echo get_theme_mod('btn_url') ?>" class="btn btn-primary btn-hover-secondary mt-6"><?php echo get_theme_mod('btn_text') ?></a>
    <?php } ?>
                    </div>
                    <!-- CTA Content End -->
                </div>
            </div>
        </div>

        <!-- Animation Shape Start -->
        <div class="shape shape-1 scene">
                <span data-depth="1">
                    <img src="<?php echo get_template_directory_uri();?>/assets/assets/images/shape-animation/newsletter-shape.png" alt="">
                </span>
        </div>
        <!-- Animation Shape End -->
    </div>
    <!-- CTA Section End -->


<?php get_footer(); ?>