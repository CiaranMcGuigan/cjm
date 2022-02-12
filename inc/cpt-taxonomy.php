<?php

function cjm_register_custom_post_types() {
    
    // Register Staffs
    $labels = array(
        'name'                  => _x( 'Staff Members', 'post type general name' ),
        'singular_name'         => _x( 'Staff Member', 'post type singular name'),
        'menu_name'             => _x( 'Staff Members', 'admin menu' ),
        'name_admin_bar'        => _x( 'Staff Member', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Staff Member' ),
        'add_new_item'          => __( 'Add New Staff Member' ),
        'new_item'              => __( 'New Staff Member' ),
        'edit_item'             => __( 'Edit Staff Member' ),
        'view_item'             => __( 'View Staff Member' ),
        'all_items'             => __( 'All Staff Members' ),
        'search_items'          => __( 'Search Staff Members' ),
        'parent_item_colon'     => __( 'Parent Staff Members:' ),
        'not_found'             => __( 'No Staff Members found.' ),
        'not_found_in_trash'    => __( 'No Staff Members found in Trash.' ),
        'archives'              => __( 'Staff Member Archives'),
        'insert_into_item'      => __( 'Insert into Staff Member'),
        'uploaded_to_this_item' => __( 'Uploaded to this Staff Member'),
        'filter_item_list'      => __( 'Filter Staff Members list'),
        'items_list_navigation' => __( 'Staff Members list navigation'),
        'items_list'            => __( 'Staff Members list'),
        'featured_image'        => __( 'Staff Member featured image'),
        'set_featured_image'    => __( 'Set Staff Member featured image'),
        'remove_featured_image' => __( 'Remove Staff Member featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Staff Members' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );

    register_post_type( 'cjm-staff', $args );

  
}

add_action( 'init', 'cjm_register_custom_post_types' );

function cjm_register_taxonomies() {
    // Add Staff Category taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Category' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'Vview Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'cjm-staff-category', array( 'cjm-staff' ), $args );

}


add_action( 'init', 'cjm_register_taxonomies');


function cjm_rewrite_flush() {
    cjm_register_custom_post_types();
    flush_rewrite_rules();
    cjm_register_taxonomies();
}
add_action( 'after_switch_theme', 'cjm_rewrite_flush' );