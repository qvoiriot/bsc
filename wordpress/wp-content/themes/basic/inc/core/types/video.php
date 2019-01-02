<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Opal  Team <opalwordpressl@gmail.com >
  * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.wpopal.com
  * @support  http://www.wpopal.com/support/forum.html
  */

if(!function_exists('wpo_create_type_video')){
  function wpo_create_type_video(){
    $labels = array(
      'name' => __( 'Video', 'basic' ),
      'singular_name' => __( 'Video', 'basic' ),
      'add_new' => __( 'Add New Video', 'basic' ),
      'add_new_item' => __( 'Add New Video', 'basic' ),
      'edit_item' => __( 'Edit Video', 'basic' ),
      'new_item' => __( 'New Video', 'basic' ),
      'view_item' => __( 'View Video', 'basic' ),
      'search_items' => __( 'Search Videos', 'basic' ),
      'not_found' => __( 'No Videos found', 'basic' ),
      'not_found_in_trash' => __( 'No Videos found in Trash', 'basic' ),
      'parent_item_colon' => __( 'Parent Video:', 'basic' ),
      'menu_name' => __( 'Opal Videos', 'basic' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Video',
        'supports' => array( 'title', 'editor', 'thumbnail','comments', 'excerpt' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'video', $args );

    $labels = array(
        'name'              => __( 'Categories Video', 'basic' ),
        'singular_name'     => __( 'Category', 'basic' ),
        'search_items'      => __( 'Search Category','basic' ),
        'all_items'         => __( 'All Categories','basic' ),
        'parent_item'       => __( 'Parent Category','basic' ),
        'parent_item_colon' => __( 'Parent Category:','basic' ),
        'edit_item'         => __( 'Edit Category','basic' ),
        'update_item'       => __( 'Update Category','basic' ),
        'add_new_item'      => __( 'Add New Category','basic' ),
        'new_item_name'     => __( 'New Category Name','basic' ),
        'menu_name'         => __( 'Categories Video','basic' ),
      );
      // Now register the taxonomy
      register_taxonomy('category_video',array('video'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'rewrite'           => array( 'slug' => 'skills'
          ),
      ));
  }
  add_action( 'init', 'wpo_create_type_video' );
}


