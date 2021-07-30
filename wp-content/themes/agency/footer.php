
<div class="footer-section section" data-bg-color="#030e22">
    <div class="container">

        <!-- Footer Top Widgets Start -->
        <div class="row mb-lg-14 mb-md-10 mb-6">

            <!-- Footer Widget Start -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 col-12 mb-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html">
                            <?php if(has_custom_logo()){
                                the_custom_logo();
                            }else{
                                bloginfo();
                            }
                            ?>
                        </a>
                    </div>
                    <div class="footer-widget-content">
                        <div class="content">

                            <?php if(get_theme_mod('agency_footer_contact')){ ?>
                            <p><a href="#"><?php echo get_theme_mod('agency_footer_contact') ?></a></p>
                            <?php } ?>
                            <?php if(get_theme_mod('agency_footer_email')){ ?>
                                <p><a href="#"><?php echo get_theme_mod('agency_footer_email') ?></a></p>
                            <?php } ?>

                        </div>
                        <div class="footer-social-inline">
                            <?php if(get_theme_mod('agency_footer_facebook')){ ?>
                            <a href="<?php echo get_theme_mod('agency_footer_facebook') ?>"><i class="fab fa-facebook-square"></i></a>
                            <?php
                            }
                            if(get_theme_mod('agency_footer_twitter')){

                            ?>
                            <a href="<?php echo get_theme_mod('agency_footer_twitter') ?>"><i class="fab fa-twitter-square"></i></a>
                                <?php
                            }
                            if(get_theme_mod('agency_footer_instagram')){

                            ?>
                            <a href="<?php echo get_theme_mod('agency_footer_instagram') ?>"><i class="fab fa-instagram"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 mb-6">
                <div class="footer-widget">
                    <?php

                    if(is_active_sidebar('hasagency_footer_menu_one')){


                        dynamic_sidebar('hasagency_footer_menu_one');
                    }

                    ?>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-6">
                <div class="footer-widget">
                    <?php

                    if(is_active_sidebar('hasagency_footer_menu_two')){


                        dynamic_sidebar('hasagency_footer_menu_two');
                    }

                    ?>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-6">
                <div class="footer-widget">
                    <?php

                    if(is_active_sidebar('hasagency_footer_menu_three')){


                        dynamic_sidebar('hasagency_footer_menu_three');
                    }

                    ?>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-6">
                <div class="footer-widget">
                    <?php

                    if(is_active_sidebar('hasagency_footer_menu_four')){


                        dynamic_sidebar('hasagency_footer_menu_four');
                    }

                    ?>
                </div>
            </div>
            <!-- Footer Widget End -->

        </div>
        <!-- Footer Top Widgets End -->

        <!-- Footer Copyright Start -->
        <div class="row">
            <div class="col">
                <p class="copyright">Copyright &copy;

                    <?php if(get_theme_mod('agency_footer_copyright')){ ?>
                    <a href="<?php echo get_theme_mod('agency_footer_copyright_url'); ?>"><?php echo get_theme_mod('agency_footer_copyright'); ?></a>. All
                    Rights Reserved.</p>
                    <?php } ?>
            </div>
        </div>
        <!-- Footer Copyright End -->

    </div>
</div>

<!-- Scroll Top Start -->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fal fa-long-arrow-up"></i>
    <i class="arrow-bottom fal fa-long-arrow-up"></i>
</a>
<!-- Scroll Top End -->
</div>

<div id="site-main-mobile-menu" class="site-main-mobile-menu">
    <div class="site-main-mobile-menu-inner">
        <div class="mobile-menu-header">
            <div class="mobile-menu-logo">
                <a href="index.html">
                    <?php if(has_custom_logo()){
                        the_custom_logo();
                    } ?>
                </a>
            </div>
            <div class="mobile-menu-close">
                <button class="toggle">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-menu-content">
            <nav class="site-mobile-menu">
               <?php

               if(has_nav_menu('agency_main_menu')){
                   wp_nav_menu([
                       'location'           => 'agency_main_menu',
                       'container'         => true,
                       'fallback_cb'       => false,
                       'depth'             => 4,
                       'walker'            => new hasagency_Theme_Custom_Walker

                   ]);
               }

               ?>
            </nav>
        </div>
    </div>
</div>



<!-- JS
============================================ -->

<!-- Vendors JS -->
<!-- <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script> -->

<!-- Plugins JS -->
<!-- <script src="assets/js/plugins/parallax.min.js"></script>
<script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script> -->

<?php wp_footer(); ?>





</body>

</html>
