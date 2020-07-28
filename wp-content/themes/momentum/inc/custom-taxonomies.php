<?php

function add_custom_taxonomies() {

// POST TYPE POST, SPEAKERS
    register_taxonomy('ct_projects', 'pt_projects', array(
        'hierarchical' => true,
        'labels' => array( 'name' => _x( 'Projects Categories', 'taxonomy general name', tk_theme_name() ),
        'singular_name' => _x( 'Projects Categories', 'taxonomy singular name', tk_theme_name() ),
        'search_items' => __( 'Search Projects Categories', tk_theme_name() ),
        'all_items' => __( 'All Projects Categories', tk_theme_name() ),
        'parent_item' => __( 'Parent Projects Category', tk_theme_name() ),
        'parent_item_colon' => __( 'Parent Projects Category', tk_theme_name() ),
        'edit_item' => __( 'Edit Projects Category', tk_theme_name() ),
        'update_item' => __( 'Update Projects Category', tk_theme_name() ),
        'add_new_item' => __( 'Add New Projects Categories', tk_theme_name() ),
        'new_item_name' => __( 'New Projects Category', tk_theme_name() ),
        'menu_name' => __( 'Projects Categories', tk_theme_name() ), ),
        'rewrite' => array( 'slug' => 'locations',
        'with_front' => false, 'hierarchical' => true ),
    ));

}
add_action( 'init', 'add_custom_taxonomies', 0 );

?>