<?php

//auto add footer type in visual composer
function set_visual_composer_post_type(){
 if($options = get_option('wpb_js_content_types')){
    $check = true;
    foreach ($options as $key => $value) {
      if($value=='footer') $check=false;
    }
    if($check)
      $options[] = 'footer';
  }else{
    $options = array('page','footer');
  }
  update_option( 'wpb_js_content_types',$options );
}
add_action('init','set_visual_composer_post_type',100);


/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Twenty Fourteen 1.0
 */
function wpo_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous ) {
    return;
  }

  ?>
  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'basic' ); ?></h1>
    <div class="nav-links">
      <?php
      if ( is_attachment() ) :
        previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'basic' ) );
      else :
        previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'basic' ) );
        next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'basic' ) );
      endif;
      ?>
    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}

/**
 * Set up the WordPress core custom header settings.
 *
 * @since WPOpal Framework version 2.0
 *
 * @uses wpo_header_style()
 * @uses wpo_admin_header_style()
 * @uses wpo_admin_header_image()
 */
function wpo_custom_header_setup() {
  /**
   * Filter Twenty Fourteen custom-header support arguments.
   *
   * @since Twenty Fourteen 1.0
   *
   * @param array $args {
   *     An array of custom-header support arguments.
   *
   *     @type bool   $header_text            Whether to display custom header text. Default false.
   *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
   *     @type int    $height                 Height in pixels of the custom header image. Default 240.
   *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
   *     @type string $admin_head_callback    Callback function used to style the image displayed in
   *                                          the Appearance > Header screen.
   *     @type string $admin_preview_callback Callback function used to create the custom header markup in
   *                                          the Appearance > Header screen.
   * }
   */
  add_theme_support( 'custom-header', apply_filters( 'wpo_custom_header_args', array(
    'default-text-color'     => 'fff',
    'width'                  => 1260,
    'height'                 => 240,
    'flex-height'            => true,
    'wp-head-callback'       => 'wpo_header_style',
    'admin-head-callback'    => 'wpo_admin_header_style',
    'admin-preview-callback' => 'wpo_admin_header_image',
  ) ) );
}

//add_action( 'after_setup_theme', 'wpo_custom_header_setup' );

function wpo_header_style(){
    $text_color = get_header_textcolor();
    return ;
}

// This theme allows users to set a custom background.
add_theme_support( 'custom-background', apply_filters( 'wpo_custom_background_args', array(
    'default-color' => 'f5f5f5',
  ) ) );


/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since Twenty Fourteen 1.0
 */
function wpo_post_thumbnail() {
  
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>
  
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'fullwidth' );
    } else {
      the_post_thumbnail();
    }
  ?>
  
  <?php else : ?>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>">
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'fullwidth-single' );
    } else {
      the_post_thumbnail();
    }
  ?>
  </a>

  <?php endif; // End is_singular()
}


/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 */
function wpo_posted_on() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    echo '<h2 class="featured-post">' . __( 'Sticky', 'basic' ) . '</h2>';
  }

  // Set up and print post meta information.
  printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
    esc_url( get_permalink() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    get_the_author()
  );
}
 

/**
 * Find out if blog has more than one category.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function wpo_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'wpo_category_count' ) ) ) {
    // Create an array of all the categories that are attached to posts
    $all_the_cool_cats = get_categories( array(
      'hide_empty' => 1,
    ) );

    // Count the number of categories that are attached to the posts
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'wpo_category_count', $all_the_cool_cats );
  }

  if ( 1 !== (int) $all_the_cool_cats ) {
    // This blog has more than 1 category so wpo_categorized_blog should return true
    return true;
  } else {
    // This blog has only 1 category so wpo_categorized_blog should return false
    return false;
  }
}

/**
 * Get template part (for templates like the shop-loop).
 *
 * @access public
 * @param mixed $slug
 * @param string $name (default: '')
 * @return void
 */
function wpo_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/woocommerce/slug-name.php
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", WC()->template_path() . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php
	if ( ! $template && $name && file_exists( WC()->plugin_path() . "/templates/{$slug}-{$name}.php" ) ) {
		$template = WC()->plugin_path() . "/templates/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/woocommerce/slug.php
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", WC()->template_path() . "{$slug}.php" ) );
	}

	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'wc_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 *
 */
function wpo_get_categories( $category ) {
	$categories = get_categories( array( 'taxonomy' => $category ));

	$output = array( '' => __( 'All', 'basic' ) );
	foreach( $categories as $cat ){
		if( is_object($cat) ) $output[$cat->slug] = $cat->name;
	}
	return $output;
}

///// Define  list of function processing theme logics.
function wpo_vc_shortcode_render( $atts, $content='' , $tag='' ){
	$output = '';
	if(is_file( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER. $tag.'.php')){
		ob_start();
		require( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER.$tag.'.php' );
		$output .= ob_get_clean();
	}
	return $output;
}
/// //
if(wpo_theme_options('is-effect-scroll','1')=='1'){
    add_filter('body_class', 'wpo_animate_scroll');
    function wpo_animate_scroll($classes){
    $classes[] = 'wpo-animate-scroll';
        return $classes;
    }
}


add_filter('body_class', 'wpo_body_class');
function wpo_body_class( $classes ){
  foreach ( $classes as $key => $value ) {
      if ( $value == 'boxed' || $value == 'default' ) 
        unset( $classes[$key] );
  }
  $classes[] = wpo_theme_options('configlayout');
  return $classes;
}


if(function_exists('PostRatings')){
  add_action( 'wpo_rating', 'wpo_vote_count' );
  function wpo_vote_count(){
    $options = PostRatings()->getRating(get_the_ID());
    $classRating = "vote-default";
    if(isset($options['bayesian_rating']) && $options['bayesian_rating']>0 ){
      if(85<$options['bayesian_rating'] && $options['bayesian_rating'] <=100){
        $classRating = "vote-perfect";
      }
      if(75<$options['bayesian_rating'] && $options['bayesian_rating'] <=85){
        $classRating = "vote-good";
      }
      if(65<$options['bayesian_rating'] && $options['bayesian_rating'] <=75){
        $classRating = "vote-average";
      }
      if(55<$options['bayesian_rating'] && $options['bayesian_rating'] <=65){
        $classRating = "vote-bad";
      }
      if(0<$options['bayesian_rating'] && $options['bayesian_rating'] <=55){
        $classRating = "vote-poor";
      }
  ?>
  <?php
    $result_ratings = number_format((float)$options['bayesian_rating']/10,1,'.','');

  ?>
      <div class="entry-vote <?php echo esc_attr( $classRating ); ?>"><span class="entry-vote-inner"><?php echo  $result_ratings ?></span></div>
  <?php
    }
  }
}


/*
** Search With Category
*/

if(!function_exists('categories_searchform')){
    function categories_searchform(){
        if(class_exists('WooCommerce')){
        	global $wpdb;
			$dropdown_args = array(
                'show_counts'        => false,
                'hierarchical'       => true,
                'show_uncategorized' => 0
            );
        ?>
		<form role="search" method="get" class="input-group search-category" action="<?php echo home_url('/'); ?>">
            <div class="input-group-addon search-category-container">
            	<label class="select">
            		<?php wc_product_dropdown_categories( $dropdown_args ); ?>
            	</label>
            </div>
            <input name="s" id="s" maxlength="60" class="form-control search-category-input" type="text" size="20" placeholder="Enter search...">
            <div class="input-group-btn">
                <label class="btn btn-link btn-search"><input type="submit" id="searchsubmit" class="fa searchsubmit" value="&#xf002;"/></label>
                <input type="hidden" name="post_type" value="product"/>
            </div>
        </form>
        <?php
        }else{
        	get_search_form();
        }
    }
}

/*
** Load More Portfolio
*/
add_action( 'wp_ajax_wpo_load_more_portfolio', 'wpo_load_more_portfolio' );
add_action( 'wp_ajax_nopriv_wpo_load_more_portfolio', 'wpo_load_more_portfolio' );

if( !function_exists ('wpo_load_more_portfolio')) {
    function wpo_load_more_portfolio() {
        $number = $_POST['number'];
        $paged = $_POST['paged'];
        $class_column = $_POST['column'];
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page'=>$number,
            'paged' => $paged
        );
        $loop = new WP_Query($args);
        $result = $posts = array();

        if($loop->have_posts()){
            while($loop->have_posts()) : $loop->the_post();

                $item_classes = 'all ';
                $item_cats = get_the_terms($loop->post->ID, 'Categories');

             foreach((array)$item_cats as $item_cat){
                 if(count($item_cat)>0){
                   $item_classes .= $item_cat->slug . ' ';
                }
             }
             $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'blog-thumbnails' );
                ob_start();
            ?>
             <div class="col-sm-<?php echo esc_attr( $class_column ); ?> item col-md-<?php echo esc_attr($class_column); ?> col-lg-<?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
                 <div class="wpo-portfolio-content">
                      <?php if ( has_post_thumbnail()) : ?>
                          <figure class="wpo-portfolio-thumbnail">
                              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                  <?php the_post_thumbnail('blog-thumbnails'); ?>
                              </a>
                          </figure>
                      <?php endif; ?>
                      <div class="wpo-portfolio-title caption">
                          <h4 class="entry-title">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </h4>
                          <?php if( $image_attributes ) : ?>
                              <a href="<?php echo esc_url( $image_attributes[0] ); ?>" rel="prettyPhoto[<?php echo $item_classes; ?>]" title="<?php the_title_attribute(); ?>" class="btn btn-outline-inverse">
                                <i class="fa fa-plus"></i>
                              </a>
                        <?php endif; ?>
                          <p class="entry-description"><?php echo wpo_excerpt(20,'...'); ?></p>
                      </div>
                 </div>
             </div>

            <?php
                $posts[] = ob_get_clean();
            endwhile;
        }
        if($paged >= $loop->max_num_pages)
            $result['check'] = false;
        else
            $result['check'] = true;

        $result['posts'] = $posts;
        print_r(json_encode($result));
        exit();
    }
}


if ( !function_exists( 'wpo_print_style_footer' ) ) {
  function wpo_print_style_footer(){
    $footer = wpo_theme_options('footer-style','default');
    if($footer!='default'){
    $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
              '.$shortcodes_custom_css.'
            </style>
          ';
      }
    }
  }
}
add_action('wp_head','wpo_print_style_footer', 18);
 

if(!function_exists('wpo_add_extra_fields_menu_config')){
    add_action( 'wpo_megamenu_item_config' , 'wpo_add_extra_fields_menu_config' );
    function wpo_add_extra_fields_menu_config($item){
        $item_id = esc_attr( $item->ID );
    ?>
        <p class="field-addclass description description-wide">
            <label for="edit-menu-item-iconclass-<?php echo esc_attr($item_id); ?>">
                <?php  echo __( 'Icon Class', 'basic' ); ?><br />
                <input type="text" name="menu-item-iconclass[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-iconclass-<?php echo esc_attr($item_id); ?>" value="<?php echo esc_attr($item->iconclass)?>"/>
            </label>
        </p>
    <?php
    }
}

if(!function_exists('wpo_custom_nav_update')){
    add_action('wp_update_nav_menu_item', 'wpo_custom_nav_update',10, 3);
    function wpo_custom_nav_update($menu_id, $menu_item_db_id, $args ) {
      if(!isset($_POST['menu-item-iconclass'][$menu_item_db_id])){
          $_POST['menu-item-iconclass'][$menu_item_db_id] = "";
      }
      $custom_value = $_POST['menu-item-iconclass'][$menu_item_db_id];
      update_post_meta( $menu_item_db_id, 'iconclass', $custom_value );
    }
}

/*
 * Adds value of new field to $item object that will be passed to     Walker_Nav_Menu_Edit_Custom
 */

if(!function_exists('wpo_custom_nav_item')){
    add_filter( 'wp_setup_nav_menu_item','wpo_custom_nav_item' );
    function wpo_custom_nav_item($menu_item) {
        $menu_item->iconclass = get_post_meta( $menu_item->ID, 'iconclass', true );
        return $menu_item;
    }
}

if(!function_exists('wpo_custom_nav_edit_walker')){
    add_filter( 'wp_edit_nav_menu_walker', 'wpo_custom_nav_edit_walker',10,2 );
    function wpo_custom_nav_edit_walker($walker,$menu_id) {
        return 'WPO_Megamenu_Config';
    }
}

if(!function_exists('wpo_renderButtonToggle')){
    function wpo_renderButtonToggle($class='btn-primary btn-xs visible-xs', $toggle='offcanvas'){
    ?>
      <button data-toggle="<?php echo esc_attr($toggle); ?>" class="btn btn-offcanvas btn-toggle-canvas btn-trm <?php echo esc_attr( $class ); ?>" type="button">
           <i class="fa fa-bars"></i>
        </button>
    <?php
    }
}
if(!function_exists('wpo_comment_form')){
    function wpo_comment_form($arg,$class='btn-primary'){
      ob_start();
      comment_form($arg);
      $form = ob_get_clean();
      echo str_replace('id="submit"','id="submit" class="btn '.$class.'"', $form);
    }
}
if(!function_exists('wpo_comment_reply_link')){
    function wpo_comment_reply_link($arg,$class='btn btn-default btn-xs'){
      ob_start();
      comment_reply_link($arg);
      $reply = ob_get_clean();
      echo str_replace('comment-reply-link','comment-reply-link '.$class, $reply);
    }
}


function wpo_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  } // end if

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  } // end if

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = sprintf( __( 'Page %s', 'basic' ), max( $paged, $page ) ) . " $sep $title";
  } // end if

  return $title;

}
add_filter( 'wp_title', 'wpo_wp_title', 10, 2 );
