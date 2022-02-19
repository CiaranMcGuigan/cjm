<?php

function cjm_register_custom_post_types() {
    
    // Register Staff CPT
    $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Member', 'post type singular name'),
        'menu_name'             => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'        => _x( 'Member', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Member' ),
        'add_new_item'          => __( 'Add New Member' ),
        'new_item'              => __( 'New Member' ),
        'edit_item'             => __( 'Edit Member' ),
        'view_item'             => __( 'View Member' ),
        'all_items'             => __( 'All Staff' ),
        'search_items'          => __( 'Search Staff' ),
        'parent_item_colon'     => __( 'Parent Staff:' ),
        'not_found'             => __( 'No Staff found.' ),
        'not_found_in_trash'    => __( 'No Staff found in Trash.' ),
        'archives'              => __( 'Staff Archives'),
        'insert_into_item'      => __( 'Insert into member'),
        'uploaded_to_this_item' => __( 'Uploaded to this Member'),
        'filter_item_list'      => __( 'Filter Staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'            => __( 'Staff list'),
        'featured_image'        => __( 'Member featured image'),
        'set_featured_image'    => __( 'Set Member featured image'),
        'remove_featured_image' => __( 'Remove Member featured image'),
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
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title'),
    );

    register_post_type( 'cjm-staff', $args );
   
   
    // Register Students CPT
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No Students found.' ),
        'not_found_in_trash'    => __( 'No Students found in Trash.' ),
        'archives'              => __( 'Students Archives'),
        'insert_into_item'      => __( 'Insert into Student'),
        'uploaded_to_this_item' => __( 'Uploaded to this Student'),
        'filter_item_list'      => __( 'Filter Students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'            => __( 'Students list'),
        'featured_image'        => __( 'Student featured image'),
        'set_featured_image'    => __( 'Set Student featured image'),
        'remove_featured_image' => __( 'Remove Student featured image'),
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
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template_lock'      => 'all'
    );

    register_post_type( 'cjm-students', $args );

  
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
  
  
    // Add Students Category taxonomy
    $labels = array(
        'name'              => _x( 'Students Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Students Categories' ),
        'all_items'         => __( 'All Students Category' ),
        'parent_item'       => __( 'Parent Students Category' ),
        'parent_item_colon' => __( 'Parent Students Category:' ),
        'edit_item'         => __( 'Edit Students Category' ),
        'view_item'         => __( 'Vview Students Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Student Category Name' ),
        'menu_name'         => __( 'Student Category' ),
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
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'cjm-student-category', array( 'cjm-students' ), $args );

}


add_action( 'init', 'cjm_register_taxonomies');


function cjm_rewrite_flush() {
    cjm_register_custom_post_types();
    flush_rewrite_rules();
    cjm_register_taxonomies();
}
add_action( 'after_switch_theme', 'cjm_rewrite_flush' );