<?php




function agency_setup_menu_register(){
   add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');

    register_nav_menu('agency_main_menu', 'This is a primary Menu');
}
