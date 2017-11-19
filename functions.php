<?php


function lapizza_setup() {
    add_theme_support( 'post-thumbnails' );

    add_image_size('boxes', 437, 291, true);


    add_image_size('specialties', 768, 515, true);

    update_option('thumbnail_size_w', 253);


    update_option('thumbnail_size_h', 164);


}
add_action( 'after_setup_theme', 'lapizza_setup');

function jquery_migrate( $scripts ) {
    if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
    $jquery_dependencies = $scripts->registered['jquery']->deps;
    $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
}
add_action( 'wp_default_scripts', 'jquery_migrate' );


function lapizza_assets () {

    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900' );
    wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', [], 6.0 );
    wp_register_style( 'fluidboxcss', get_stylesheet_directory_uri() . '/css/fluidbox.min.css', [], 2.0 );
    wp_register_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', array('normalize', 'font-awesome', 'google-fonts'), time() );
  
    wp_enqueue_style( 'google-fonts');
    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'font-awesome');
    wp_enqueue_style( 'fluidboxcss');
    wp_enqueue_style( 'style');

    // Add JS
    wp_register_script( 'debouncejs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js');
    wp_register_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', ['jquery'], time(), true );
    wp_register_script( 'fluidboxjs', get_stylesheet_directory_uri() . '/js/jquery.fluidbox.min.js', ['jquery', 'debouncejs'], 2.0, true );
   

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'debouncejs');
    wp_enqueue_script( 'fluidboxjs');
    wp_enqueue_script( 'script');





}
add_action('wp_enqueue_scripts', 'lapizza_assets' );

// Add Menus

function lapizza_menus() {

    register_nav_menus( array(
        'header-menu'   => __('Header Menu', 'lapizza'),
        'social-menu'   => __('Social Menu', 'lapizza'),
    )  );
}
add_action( 'init', 'lapizza_menus' );

// Custom Post Type

function lapizza_specialties() {
    $labels = array(
        'name'                => _x('Pizzas', 'lapizza'),
        'singular_name'       => _x('Pizzas', 'post type singular name', 'lapizza'),
        'menu_name'           => _x('Pizzas', 'admin menu', 'lapizza'),
        'name_admin_bar'      => _x('Pizzas', 'add new on admin bar','lapizza'),
        'add_new'             => _x('Add New', 'book', 'lapizza'),
        'add_new_item'        => _x('Add New Pizza', 'lapizza'),
        'new_item'            => _x('New Pizzas', 'lapizza'),
        'edit_item'           => _x('Edit Pizzas', 'lapizza'),
        'view_item'           => _x('View Pizzas', 'lapizza'),
        'all_items'           => _x('All Pizzas', 'lapizza'),
        'search_items'        => _x('Search Pizzas', 'lapizza'),
        'parent_item_colon'   => _x('Parent Pizzas', 'lapizza'),
        'not_found'           => _x('No Pizzas found', 'lapizza'),
        'not_found_in_trash'  => _x('No Pizzas found in trash', 'lapizza'),

    );

    $args = array(
        'labels'              => $labels,
        'description'         => __( 'Description.', 'lapizza'),
        'public'              => true,
        'public_queryable'    => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'specialties'),
        'capabaility_type'    => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'supports'            => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'          => array('category'),
    );

    register_post_type('specialties', $args);
}
add_action( 'init', 'lapizza_specialties' );

// Widget Zone

function lapizza_widgets() {

    $args = array(
        'name'           =>  'Blog Sidebar',
        'id'             =>  'blog_sidebar',
        'before_widget'  =>  '<div class="widget">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<h3>',
        'after_title'    =>  '</h3>'

    );
    register_sidebar( $args );
}
add_action('widgets_init', 'lapizza_widgets');