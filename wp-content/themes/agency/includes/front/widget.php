<?php


function agency_widgets_register(){

    register_sidebar([
        'name'          => __('Footer Widget section One', 'hasagency'),
        'id'            => 'hasagency_footer_menu_one',
        'description'   => __('This is Footer Essential Widgets', 'hasagency'),
        'before_widget' => '<div id="%1$s" class="%2$s footer-widget-content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>'
    ]);
    register_sidebar([
        'name'          => __('Footer Widget Section Two', 'hasagency'),
        'id'            => 'hasagency_footer_menu_two',
        'description'   => __('This is Footer Essential Widgets two', 'hasagency'),
        'before_widget' => '<div id="%1$s" class="%2$s footer-widget-content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>'
    ]);

    register_sidebar([
        'name'          => __('Footer Widget Section Three', 'hasagency'),
        'id'            => 'hasagency_footer_menu_three',
        'description'   => __('This is Footer Essential Widgets Number Three', 'hasagency'),
        'before_widget' => '<div id="%1$s" class="%2$s footer-widget-content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>'
    ]);
    register_sidebar([
        'name'          => __('Footer Widget Section Four', 'hasagency'),
        'id'            => 'hasagency_footer_menu_four',
        'description'   => __('This is Footer Essential Widgets Number Four', 'hasagency'),
        'before_widget' => '<div id="%1$s" class="%2$s footer-widget-content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>'
    ]);


    register_sidebar([
        'name'          => __('Category Of Blog Pages', 'hasagency'),
        'id'            => 'cat_blog_page',
        'description'   => __('This is  Essential Widgets for Search and Blog Page', 'hasagency'),

        'before_widget' => '<li id="%1$s"  class="%2$s sidebar-widget-cate-list">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="sidebar-widget-title mb-2">',
        'after_title'   => '</h3>',

    ]);

    register_sidebar([
        'name'          => __('Popular post of blog and search page', 'hasagency'),
        'id'            => 'popular_post',
        'description'   => __('This is  Essential Widgets for Search and Blog Page (Popular Post)', 'hasagency'),

        'before_widget' => '<li id="%1$s"  class="%2$s sidebar-widget-cate-list">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="sidebar-widget-title mb-2">',
        'after_title'   => '</h3>',

    ]);
    register_sidebar([
        'name'          => __('Subscribe For Search nd blog page', 'hasagency'),
        'id'            => 'subscribe',
        'description'   => __('This is  Essential Widgets for Search and Blog Page (Subscribe Image)', 'hasagency'),

        'before_widget' => '<div id="%1$s"  class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',

    ]);
    register_sidebar([
        'name'          => __('Popular tag for search and blog page', 'hasagency'),
        'id'            => 'tag',
        'description'   => __('This is  Essential Widgets for Search and Blog Page (Tags)', 'hasagency'),

        'before_widget' => '<div id="%1$s"  class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar-widget-title">',
        'after_title'   => '</h3>',

    ]);
}