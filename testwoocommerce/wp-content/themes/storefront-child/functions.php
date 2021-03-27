<?php

function leeandneetest_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'leeandneetest_woocommerce_support' );

// Add Stylesheets or Scripts
function leeandneetest_add_style_scripts(){

    wp_enqueue_script('lisahub-child-js',get_stylesheet_directory_uri() . '/js/leeandneetest-script.js',array('jquery'),'6.4');

    wp_enqueue_style( 'lisahub-child-style', get_stylesheet_directory_uri() . '/css/leeandneetest-style.css',array(),'8.0.0');

}
add_action('wp_enqueue_scripts', 'leeandneetest_add_style_scripts');

/****************create test custom post type*************************/
add_action( 'init', 'leeandneetest_test_post' );
function leeandneetest_test_post() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'test', // post test
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
        'page-attributes',
        );
    $labels = array(
        'name' => _x('Test', 'plural'),
        'singular_name' => _x('Test', 'singular'),
        'menu_name' => _x('Test', 'admin menu'),
        'name_admin_bar' => _x('Test', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Test'),
        'new_item' => __('New Test'),
        'edit_item' => __('Edit Test'),
        'view_item' => __('View Test'),
        'all_items' => __('All Test'),
        'search_items' => __('Search Test'),
        'not_found' => __('No Test Found.'),
        );
        $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon'  => 'dashicons-welcome-write-blog',
        'taxonomies' => array('post_tag','category'),
);
register_post_type('test', $args);
}

//Remove side bar.

add_action( 'get_header', 'leeandneetest_removing_sidebar_storefront' );
function leeandneetest_removing_sidebar_storefront() {
    if ( is_checkout() || is_page() || is_home() || is_single() || is_category() ) {
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
}