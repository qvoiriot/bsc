<?php

if(!function_exists('wpo_create_type_sliders')){
    function wpo_create_type_sliders(){
        $labels = array(
            'name' => __( 'Sliders', 'basic' ),
            'singular_name' => __( 'Slider', 'basic'),
            'add_new' => __( 'Add New Slider', 'basic' ),
            'add_new_item' => __( 'Add New Slider', 'basic' ),
            'edit_item' => __( 'Edit Slider', 'basic' ),
            'new_item' => __( 'New Slider', 'basic' ),
            'view_item' => __( 'View Slider', 'basic' ),
            'search_items' => __( 'Search Slider', 'basic' ),
            'not_found' => __( 'No Slider found', 'basic' ),
            'not_found_in_trash' => __( 'No Slider found in Trash', 'basic' ),
            'parent_item_colon' => __( 'Parent Slider:', 'basic' ),
            'menu_name' => __( 'Opal Sliders', 'basic' )
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'List Slider',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array('slider_group' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
        register_post_type( 'sliders', $args );


        $labels = array(
            'name' => __( 'Slider groups', 'basic' ),
            'singular_name' => __( 'Slider group', 'basic' ),
            'search_items' =>  __( 'Search Slider groups','basic' ),
            'all_items' => __( 'All Slider groups','basic' ),
            'parent_item' => __( 'Parent Slider group','basic' ),
            'parent_item_colon' => __( 'Parent Slider group:','basic' ),
            'edit_item' => __( 'Edit Slider group','basic' ),
            'update_item' => __( 'Update Slider group','basic' ),
            'add_new_item' => __( 'Add New Slider group','basic' ),
            'new_item_name' => __( 'New Slider group','basic' ),
            'menu_name' => __( 'Slider groups','basic' ),
        );

        register_taxonomy('slider_group',array('sliders'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'slider_group' ),
            'show_in_nav_menus'=>false
        ));
    }
    add_action( 'init','wpo_create_type_sliders' );
}