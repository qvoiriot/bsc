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

if(!function_exists('wpo_create_type_brand')){
  function wpo_create_type_brand(){
    $labels = array(
      'name' => __( 'Brand', 'basic' ),
      'singular_name' => __( 'Brand', 'basic' ),
      'add_new' => __( 'Add New Brand', 'basic' ),
      'add_new_item' => __( 'Add New Brand', 'basic' ),
      'edit_item' => __( 'Edit Brand', 'basic' ),
      'new_item' => __( 'New Brand', 'basic' ),
      'view_item' => __( 'View Brand', 'basic' ),
      'search_items' => __( 'Search Brands', 'basic' ),
      'not_found' => __( 'No Brands found', 'basic' ),
      'not_found_in_trash' => __( 'No Brands found in Trash', 'basic' ),
      'parent_item_colon' => __( 'Parent Brand:', 'basic' ),
      'menu_name' => __( 'Opal Brands', 'basic' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Brand',
        'supports' => array( 'title', 'thumbnail' ),
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
    register_post_type( 'brands', $args );
  }

  add_action('init','wpo_create_type_brand');
}