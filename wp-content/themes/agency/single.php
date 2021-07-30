<?php get_header(); ?>

    <!-- Page Title Section Start -->
<?php if(get_theme_mod('agency_breadcrumb_enable/disable_blog_page')){ ?>
    <div class="page-title-section section section-padding-top" data-overlay="0.7" data-bg-image="<?php
   if (get_theme_mod('agency_breadcrumb_image')){
        echo get_theme_mod('agency_breadcrumb_image');
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
                    <li><a href="<?php home_url('/') ?>">Home</a></li>

                    <li class="current"><?php the_title(); ?></li>
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
                                get_template_part('partsOfTemplate/content');
                            }
                        }



                        ?>

                    <!-- Blog Wrapper End -->


                </div>

                <div class="col-lg-4 col-12 order-lg-2 mb-10">
                    <div class="sidebar-widget-wrapper">
                        <div class="sidebar-widget">
                            <div class="sidebar-widget-content">
                                <div class="sidebar-widget-search">
                                    <?php get_search_form() ?>
                                </div>
                            </div>
                        </div>
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
                                <div class="sidebar-widget-banner" data-overlay="0.7" data-bg-image="<?php if(get_theme_mod('blog_page_subscribe_option_image')){
                                    echo get_theme_mod('blog_page_subscribe_option_image');
                                } ?>">
                                    <h3 class="title"><?php if(get_theme_mod('subscribe_title')){
                                            echo get_theme_mod('subscribe_title');
                                        } ?></h3>
                                    <p><?php if(get_theme_mod('subscribe_description')){
                                            echo get_theme_mod('subscribe_description');
                                        } ?></p>
                                    <a href="<?php if(get_theme_mod('subscribe_btn_url')){
                                        echo get_theme_mod('subscribe_btn_url');
                                    } ?>"><?php if(get_theme_mod('subscribe_btn_text')){
                                            echo get_theme_mod('subscribe_btn_text');
                                        } ?></a>
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
                            <h2 class="title"><?php if(get_theme_mod('section_title')){ echo get_theme_mod('section_title'); } ?></h2>
                            <p class="sub-title fz-18">
                                <?php if(get_theme_mod('blog_description')){ echo get_theme_mod('blog_description'); } ?></p>
                        </div>
                        <!-- Section Title End -->
                        <?php if(get_theme_mod('blog_btn_text')){
                            ?>

                            <a href="<?php echo get_theme_mod('blog_btn_url_blog_page') ?>" class="btn btn-primary btn-hover-secondary mt-6"><?php echo get_theme_mod('blog_btn_text'); ?></a>
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