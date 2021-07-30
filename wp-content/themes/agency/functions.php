<?php


// setup

define('THEME_DEV_MODE', true);


// Includes
include( get_theme_file_path('/includes/front/enqueue.php'));
include( get_theme_file_path('/includes/setup.php'));
include( get_theme_file_path('/includes/front/widget.php'));
include( get_theme_file_path('/includes/custom_walker.php'));

//pagination function

function hasagency_pagination(){
    global $wp_query;
    $links = paginate_links( array(
        'current' => max(1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'type'    => 'list',
        'mid_size'=>3
    ));

    $links = str_replace('<ul class=\'page-numbers\'>','<ul class="pagination center">', $links );
    $links = str_replace('&laquo; Previous','<i class="fal fa-angle-left"></i>', $links );
    $links = str_replace('Next &raquo;','<i class="fal fa-angle-right"></i>', $links );
    $links = str_replace('current','active', $links );
    $links = str_replace('active-numbers','page-numbers', $links );
    $links = str_replace('<span','<a', $links );
    $links = str_replace('</span>','</a>', $links );
    echo $links;
}




function agency_register_theme_customizer( $wp_customize ) {
    $wp_customize->get_section('title_tagline')->title = 'HasAgency Site Identity';
//bread crumb image
    $wp_customize-> add_setting('agency_breadcrumb_image', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_breadcrumb_section', [
        'title'      => __( 'Breadcrumb Image', 'hasagency' ),
        'priority'   => 160,
        'panel'      => 'breadcrumb'


    ]);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'breadcrumb_image',
            array(
                'label'      => __( 'Upload Breadcrumb Image', 'hasagency' ),
                'section'    => 'agency_breadcrumb_section',
                'settings'   => 'agency_breadcrumb_image',

            )
        )
    );
    //Blog Page Breadcrumb Iamge
    $wp_customize-> add_setting('agency_breadcrumb_image_blog_page', [
        'default' => ''
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'breadcrumb_image_for_blog_page',
            array(
                'label'      => __( 'Upload Breadcrumb Image for Blog Page', 'hasagency' ),
                'section'    => 'agency_breadcrumb_section',
                'settings'   => 'agency_breadcrumb_image_blog_page',


            )
        )
    );
    $wp_customize->add_panel('breadcrumb', [
        'title'         =>  __('Breadcrumb', 'hasagency'),
        'description'   => 'This is Theme Breadcrumb Options',
        'priority'      => 35
    ]);

    //Breadcrumb

    $wp_customize-> add_setting('agency_breadcrumb_enable/disable', [
        'default' => 'yes'
    ]);

    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_enable/disable', array(
        'label'      => __( 'Breadcrumb Option Enable Or Disable', 'hasagency' ),
        'section'    => 'agency_breadcrumb_section',
        'settings'   => 'agency_breadcrumb_enable/disable',
        'type'       => 'checkbox',
        'panel'      =>'theme_options',
        'choices'    => [
            'yes'    => 'yes',


        ]
    ) ) );

    //Breadcrumb for blog page Enable Disable

    $wp_customize-> add_setting('agency_breadcrumb_enable/disable_blog_page', [
        'default' => 'yes'
    ]);

    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_enable/disable_blog_page', array(
        'label'      => __( 'Breadcrumb Option Enable Or Disable for Blog Page', 'hasagency' ),
        'section'    => 'agency_breadcrumb_section',
        'settings'   => 'agency_breadcrumb_enable/disable_blog_page',
        'type'       => 'checkbox',
        'panel'      =>'theme_options',
        'choices'    => [
            'yes'    => 'yes',


        ]
    ) ) );

    //Breadcrumb Title
    $wp_customize-> add_setting('agency_breadcrumb_title', [
        'default' => ''
    ]);


    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_title', array(
        'label'      => __( 'BreadCrumb Tile For Blog Page', 'hasagency' ),
        'section'    => 'agency_breadcrumb_section',
        'settings'   => 'agency_breadcrumb_title',
        'panel'      =>'theme_options'
    ) ) );

    // Theme Header Cuntomizer
    $wp_customize-> add_setting('agency_header_button', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_header_button_section', [
        'title'      => __( 'Header Button Section', 'hasagency' ),
        'priority'   => 30,
        'panel'      => 'theme_options'


    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'Header Button', array(
        'label'      => __( 'Header Button', 'hasagency' ),
        'section'    => 'agency_header_button_section',
        'settings'   => 'agency_header_button',
        'panel'      =>'theme_options'
    ) ) );

    //Header Url
    $wp_customize-> add_setting('agency_header_button_url', [
        'default' => ''
    ]);


    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'header_button_url', array(
        'label'      => __( 'Header Button URL', 'hasagency' ),
        'section'    => 'agency_header_button_section',
        'settings'   => 'agency_header_button_url',
        'panel'      =>'theme_options'
    ) ) );

 //enable or disable button
    $wp_customize-> add_setting('agency_header_button_enable/disable', [
        'default' => ''
    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'header_button', array(
        'label'      => __( 'Header Button Enable or Disable', 'hasagency' ),
        'section'    => 'agency_header_button_section',
        'settings'   => 'agency_header_button_enable/disable',
        'type'       => 'checkbox',
        'panel'      =>'theme_options',
        'choices'    => [
            'yes'    => 'yes'

        ]
    ) ) );

    // Header Search Icon
    $wp_customize-> add_setting('agency_header_search', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_header_header_section', [
        'title'      => __( 'Header Search Option', 'hasagency' ),
        'priority'   => 30,
        'panel'      => 'theme_options'


    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'header_search', array(
        'label'      => __( 'Search Icon In Header', 'hasagency' ),
        'section'    => 'agency_header_header_section',
        'settings'   => 'agency_header_search',
        'type'       => 'checkbox',
        'panel'      =>'theme_options',
        'choices'    => [
            'yes'    => 'yes'

        ]
    ) ) );

    // Footer Phone Number

    $wp_customize-> add_setting('agency_footer_contact', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_footer_contact_section', [
        'title'      => __( 'Footer Contact', 'hasagency' ),
        'priority'   => 160,
        'panel'      => 'theme_options'


    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_contact_number', array(
        'label'      => __( 'Footer Contact Number', 'hasagency' ),
        'section'    => 'agency_footer_contact_section',
        'settings'   => 'agency_footer_contact',
        'panel'      =>'theme_options'
    ) ) );

    // Footer Email

    $wp_customize-> add_setting('agency_footer_email', [
        'default' => ''
    ]);

    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_email', array(
        'label'      => __( 'Footer Email', 'hasagency' ),
        'section'    => 'agency_footer_contact_section',
        'settings'   => 'agency_footer_email',
        'panel'      =>'theme_options'
    ) ) );


    //Footer Social Link
    // Facebook
    $wp_customize-> add_setting('agency_footer_facebook', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_social', [
        'title'      => __( 'Theme Social link', 'hasagency' ),
        'priority'   => 160,
        'panel'      => 'theme_options'


    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_facebook', array(
        'label'      => __( 'Footer Facebook Link', 'hasagency' ),
        'section'    => 'agency_social',
        'settings'   => 'agency_footer_facebook',
        'panel'      =>'theme_options'
    ) ) );
    //twitter
    $wp_customize-> add_setting('agency_footer_twitter', [
        'default' => ''
    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_twitter', array(
        'label'      => __( 'Footer Twitter Link', 'hasagency' ),
        'section'    => 'agency_social',
        'settings'   => 'agency_footer_twitter',
        'panel'      =>'theme_options'
    ) ) );

    //Instagram

    $wp_customize-> add_setting('agency_footer_instagram', [
        'default' => ''
    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_instagram', array(
        'label'      => __( 'Footer Instagram Link', 'hasagency' ),
        'section'    => 'agency_social',
        'settings'   => 'agency_footer_instagram',
        'panel'      =>'theme_options'
    ) ) );

    //CopyRight Text
    $wp_customize-> add_setting('agency_footer_copyright', [
        'default' => ''
    ]);
    $wp_customize-> add_section('agency_footer_copyright_section', [
        'title'      => __( 'Copyright Text', 'hasagency' ),
        'priority'   => 160,
        'panel'      => 'theme_options'


    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'copyright', array(
        'label'      => __( 'Copyright Text ', 'hasagency' ),
        'section'    => 'agency_footer_copyright_section',
        'settings'   => 'agency_footer_copyright',
        'panel'      =>'theme_options'
    ) ) );

    //CopyRight URL
    $wp_customize-> add_setting('agency_footer_copyright_url', [
        'default' => ''
    ]);
    $wp_customize-> add_control( new WP_Customize_Control(
        $wp_customize,
        'copyright_url', array(
        'label'      => __( 'Copyright Url ', 'hasagency' ),
        'section'    => 'agency_footer_copyright_section',
        'settings'   => 'agency_footer_copyright_url',
        'panel'      =>'theme_options'
    ) ) );

    //images option for blog page
    $wp_customize->add_setting('feature_product_one', array(

        'transport'     => 'refresh',

    ));


    $wp_customize->add_section('feature_images', array(
        'title'           => __('Blog and Search Page Section', 'hasagency'),
        'description'     => __('This is essential image for blog and search page.'),
        'priority'        => 160,
        'active_callback' => 'is_front_page',
        'panel'     => 'theme_options'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_page_footer_section_image', array(
        'label'     => __('Image for Footer Section ', 'hasagency'),
        'section'   => 'feature_images',
        'settings'  => 'feature_product_one',
        'panel'     => 'theme_options'
    )));

    // Blog and search page section title

    $wp_customize-> add_setting('section_title', [
        'default' => 'Let’s find out how to work together'
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_section_title_blog', array(
        'label'     => __('Title for the section ', 'hasagency'),
        'section'   => 'feature_images',
        'settings'  => 'section_title',

        'panel'     => 'theme_options'
    )));



    // Blog and search page section Description

    $wp_customize-> add_setting('blog_description', [
        'default' => 'Ready to start your project? The contact information collected through this form will only be used to send a response to your inquiry.',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_section_des', array(
        'label'     => __('Description for the section ', 'hasagency'),
        'section'   => 'feature_images',
        'settings'  => 'blog_description',

        'panel'     => 'theme_options'
    )));


    // Blog and search page section button text

    $wp_customize-> add_setting('blog_btn_text', [
        'default' => 'Get Started',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_section_btn_txt', array(
        'label'     => __('Button Text ', 'hasagency'),
        'section'   => 'feature_images',
        'settings'  => 'blog_btn_text',

        'panel'     => 'theme_options'
    )));


    // Blog and search page section button URL

    $wp_customize-> add_setting('blog_btn_url_blog_page', [
        'default' => '',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_section_btn_url', array(
        'label'     => __('Button Url ', 'hasagency'),
        'section'   => 'feature_images',
        'settings'  => 'blog_btn_url_blog_page',

        'panel'     => 'theme_options'
    )));







    //images option for blog page Subscribe Page
    $wp_customize->add_setting('blog_page_subscribe_option_image', array(

        'transport'     => 'refresh',

    ));


    $wp_customize->add_section('blog_Page_Subscribe_Section', array(
        'title'           => __('Blog and Search Page subscribe Section', 'hasagency'),
        'description'     => __('This is essential image for blog and search page Subscribe Section.'),
        'priority'        => 160,
        'active_callback' => 'is_front_page',
        'panel'     => 'theme_options'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_page_subscribe_image', array(
        'label'     => __('Image for Blog Page Subscribe Section', 'hasagency'),
        'section'   => 'blog_Page_Subscribe_Section',
        'settings'  => 'blog_page_subscribe_option_image',
        'panel'     => 'theme_options'
    )));

    // Blog and search page section title

    $wp_customize-> add_setting('subscribe_title', [
        'default' => 'Let’s find out how to work together'
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_title', array(
        'label'     => __('Title for the section ', 'hasagency'),
        'section'   => 'blog_Page_Subscribe_Section',
        'settings'  => 'subscribe_title',

        'panel'     => 'theme_options'
    )));



    // Blog and search page section Description

    $wp_customize-> add_setting('subscribe_description', [
        'default' => 'Ready to start your project? The contact information collected through this form will only be used to send a response to your inquiry.',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_des', array(
        'label'     => __('Description for the section ', 'hasagency'),
        'section'   => 'blog_Page_Subscribe_Section',
        'settings'  => 'subscribe_description',

        'panel'     => 'theme_options'
    )));


    // Blog and search page section button text

    $wp_customize-> add_setting('subscribe_btn_text', [
        'default' => 'Get Started',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_btn_txt', array(
        'label'     => __('Button Text ', 'hasagency'),
        'section'   => 'blog_Page_Subscribe_Section',
        'settings'  => 'subscribe_btn_text',

        'panel'     => 'theme_options'
    )));


    // Blog and search page section button URL

    $wp_customize-> add_setting('subscribe_btn_url', [
        'default' => '',
    ]);
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_btn_url', array(
        'label'     => __('Button Url ', 'hasagency'),
        'section'   => 'blog_Page_Subscribe_Section',
        'settings'  => 'subscribe_btn_url',

        'panel'     => 'theme_options'
    )));













    // Theme Options Panel
    $wp_customize->add_panel('theme_options', [
        'title'         =>  __('Theme Options', 'hasagency'),
        'description'   => 'This is Theme Option Section',
        'priority'      => 30
    ]);

}

 function isotp_assets(){
    wp_register_script( 'widget-1', plugins_url( 'js/test.js', __FILE__ ), array('jquery') );
    wp_localize_script('widget-1', 'agency', array('ajaxurl' => admin_url('admin-ajax.php')));
}

// Hooks
add_action('wp_enqueue_scripts', 'agency_enqueue');
add_action('after_setup_theme', 'agency_setup_menu_register');
add_action('widgets_init', 'agency_widgets_register');
add_action( 'customize_register', 'agency_register_theme_customizer' );
//add_action("elementor/frontend/after_register_scripts", "isotp_assets");

// Filter Hooks

function add_class_to_href( $classes, $item ) {
    if ( in_array('current_page_item', $item->classes) ) {
        $classes['class'] = 'menu-text';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );




