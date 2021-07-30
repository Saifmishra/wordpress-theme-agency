<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
<!--    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">-->

<?php wp_head(); ?>


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JCTSSF');</script>
    <!-- End Google Tag Manager -->

</head>

<body>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JCTSSF" height="0" width="0"
                  style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="section">
    <!-- Header Section Start -->
    <div class="header-section header-transparent sticky-header section">
        <div class="header-inner">
            <div class="container position-relative">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo Start -->
                    <div class="col-xl-2 col-auto order-0">


                            <a href="<?php home_url('/') ?>">
                                  <?php
                                  if(has_custom_logo()){
                                      the_custom_logo();
                                  }else{
                                      bloginfo();
                                  }
                                  ?>
                            </a>

                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Main Menu Start -->
                    <div
                        class="col-auto col-xl d-flex align-items-center justify-content-xl-center justify-content-end order-2 order-xl-1">
                        <div class="menu-column-area d-none d-xl-block position-static">
                            <nav class="site-main-menu">

                                    <?php
                                    if(has_nav_menu('agency_main_menu')){
                                     wp_nav_menu([
                                               'location'           => 'agency_main_menu',
                                                'container'         => true,
                                                'fallback_cb'       => false,
                                                'depth'             => 4,


                                        ]);

                                    }


                                    ?>

                            </nav>
                        </div>
                        <!-- Header Search Start -->
                        <?php if(get_theme_mod('agency_header_search')){ ?>
                        <div class="header-search-area ml-xl-7 ml-0">

                            <!-- Header Login Start -->
                            <div class="header-search">
                                <a href="javascript:void(0)" class="header-search-toggle"><i
                                        class="pe-7s-search pe-2x pe-va"></i></a>
                            </div>
                            <!-- Header Login End -->
                        </div>
                        <!-- Header Search End -->
                         <?php } ?>
                        <!-- Header Mobile Menu Toggle Start -->
                        <div class="header-mobile-menu-toggle d-xl-none ml-sm-2">
                            <button class="toggle">
                                <i class="icon-top"></i>
                                <i class="icon-middle"></i>
                                <i class="icon-bottom"></i>
                            </button>
                        </div>
                        <!-- Header Mobile Menu Toggle End -->
                    </div>
                    <!-- Header Main Menu End -->

                    <!-- Header Right Start -->
                    <?php if(get_theme_mod('agency_header_button_enable/disable')){ ?>
                    <div class="col-xl-2 col d-none d-sm-flex justify-content-end order-1 order-xl-2">
                        <?php if(get_theme_mod('agency_header_button') ) {
                        ?>
                        <a href="<?php if(get_theme_mod('agency_header_button_url')){ echo get_theme_mod('agency_header_button_url');} ?>" class="btn btn-light btn-hover-primary"><?php if(get_theme_mod('agency_header_button')){ echo get_theme_mod('agency_header_button');} ?></a>
                        <?php } ?>
                    </div>
                    <!-- Header Right End -->
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Section End -->

    <!-- Main Search Start -->

    <div class="main-search-active">
        <div class="sidebar-search-icon">
            <button class="search-close"><i class="pe-7s-close"></i></button>
        </div>
        <div class="sidebar-search-input">
            <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
                <div class="form-search">
                    <input id="<?php echo $unique_id ?>" class="input-text" value="<?php the_search_query(); ?>" placeholder="" type="search" name="s">
                    <button>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <p class="form-description">Hit enter to search or ESC to close</p>
        </div>
    </div>
    <!-- Main Search End -->




