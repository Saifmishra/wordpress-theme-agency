<?php



function agency_enqueue(){
    $ver = THEME_DEV_MODE ? time() : false;
    $uri = get_template_directory_uri();


    wp_enqueue_style('agency_vendor', $uri.'/assets/assets/css/vendor/vendor.min.css',[], $ver);
    wp_enqueue_style('agency_plugins', $uri.'/assets/assets/css/plugins/plugins.min.css', [], $ver);
    wp_enqueue_style('style', $uri.'/assets/assets/css/style.min.css', [], $ver);
    wp_enqueue_style('agency_style', get_stylesheet_uri());




    wp_enqueue_script('jquery');
    wp_enqueue_script('vendor', $uri .'/assets/assets/js/vendor/vendor.min.js', array('jquery'), $ver, true);
    wp_enqueue_script('plugins', $uri.'/assets/assets/js/plugins/plugins.min.js', array('jquery'), $ver, true);

    wp_enqueue_script('main', $uri.'/assets/assets/js/main.js', array('jquery'), $ver, true);



//        wp_enqueue_script( 'widget-1',$uri.'/assets/assets/js/test.js', array('jquery') );
//        wp_localize_script('widget-1', 'agency', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_localize_script('main', 'agency_cat', array('default' => '.All'));






}

