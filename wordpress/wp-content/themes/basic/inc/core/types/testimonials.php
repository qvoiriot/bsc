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

if(!function_exists('wpo_create_type_testimonial')){
    function wpo_create_type_testimonial(){
      $labels = array(
        'name' => __( 'Testimonial', 'basic' ),
        'singular_name' => __( 'Testimonial', 'basic' ),
        'add_new' => __( 'Add New Testimonial', 'basic' ),
        'add_new_item' => __( 'Add New Testimonial', 'basic' ),
        'edit_item' => __( 'Edit Testimonial', 'basic' ),
        'new_item' => __( 'New Testimonial', 'basic' ),
        'view_item' => __( 'View Testimonial', 'basic' ),
        'search_items' => __( 'Search Testimonials', 'basic' ),
        'not_found' => __( 'No Testimonials found', 'basic' ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash', 'basic' ),
        'parent_item_colon' => __( 'Parent Testimonial:', 'basic' ),
        'menu_name' => __( 'Opal Testimonials', 'basic' ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => true,
          'description' => 'List Testimonial',
          'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
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
      register_post_type( 'testimonial', $args );
    }

    add_action( 'init','wpo_create_type_testimonial' );
}


