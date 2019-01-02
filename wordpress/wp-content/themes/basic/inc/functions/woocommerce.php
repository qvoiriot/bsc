<?php

add_theme_support( 'woocommerce' );
/////
// Wishlist
add_filter( 'yith_wcwl_button_label',		   'wpo_woocomerce_icon_wishlist'  );
add_filter( 'yith-wcwl-browse-wishlist-label', 'wpo_woocomerce_icon_wishlist_add' );


add_filter('woocommerce_woocommerce_add_to_cart_fragments',				'wpo_woocommerce_header_add_to_cart_fragment' );
add_filter( 'woocommerce_breadcrumb_defaults',  'wpo_woocommerce_breadcrumbs' );

// Out of stock
add_filter('woocommerce_sale_flash', 'woocommerce_sale_flashmessage', 10, 2);


/////
//remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);					// breadcrumbs
remove_action( 'woocommerce_sidebar', 			  'woocommerce_get_sidebar', 10);								// sidebar

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);		// content wrapper begin
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);		// content wrapper end

add_action( 'woocommerce_before_main_content',    'wpo_woocommerce_output_content_wrapper', 10);		// content wrapper begin
add_action( 'woocommerce_after_main_content', 	  'wpo_woocommerce_output_content_wrapper_end', 10);	// content wrapper end

//remove link open and close before button add to cart
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

/// Remove Style Woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function wpo_woocommerce_output_content_wrapper(){ ?>
    <!-- #Content -->
    <section id="wpo-mainbody" class="wpo-mainbody clearfix woocommerce-page">

<?php }


function wpo_woocommerce_output_content_wrapper_end(){
?>
    </section>
    <?php
}
/* ---------------------------------------------------------------------------
 * WooCommerce - Styles
 * --------------------------------------------------------------------------- */
function wpo_woo_styles() {
    $current = wpo_theme_options('skin','default');
    if($current == 'default'){
        $path = WPO_THEME_URI .'/css/woocommerce.css';
    }else{
        $path = WPO_THEME_URI .'/css/skins/'.$current.'/woocommerce.css';
    }
	wp_enqueue_style( 'wpo-woocommerce', $path , 'woocommerce_frontend_styles-css' , WPO_THEME_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'wpo_woo_styles', 50 );

function wpo_woocomerce_icon_wishlist( $value='' ){
    //  return '<i class="fa fa-heart" data-placement="top" data-toggle="tooltip"  data-original-title="Wishlist" ></i><span>'.__('Add to wishlist','basic').'</span>';
    	return '<i class="fa fa-heart-o"></i><span>'.__('Wishlist','basic').'</span>';
}

function wpo_woocomerce_icon_wishlist_add(){
    //  return '<i class="fa fa-check" data-placement="top" data-toggle="tooltip"  data-original-title="Wishlist" ></i><span>'.__('Add to wishlist','basic').'</span>';
    	return '<i class="fa fa-heart-o"></i><span>'.__('Wishlist','basic').'</span>';
}
/*Customise the WooCommerce breadcrumb*/
function wpo_woocommerce_breadcrumbs($array) {
    $style = 'background: #0d292f url('.get_header_image().') no-repeat 0 0;';
	return array(
        'delimiter'   => ' &#47; ',
        'wrap_before' => '<section id="breadcrumb-theme" class="breadcrumb wpo-breadcrumb" style="'.$style.'"><nav class="container">',
        'wrap_after'  => '</nav></section>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'basic' )
	);
}
/**
*
*/
function wpo_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    wpo_cartdropdown();
    $fragments['#cart '] = ob_get_clean();
    return $fragments;
}
/*
* Re-markup html for cart content with bootstrap dropdown
*/

if(!function_exists('wpo_cartdropdown')){
 function wpo_cartdropdown(){
    if(WPO_WOOCOMMERCE_ACTIVED){
        global $woocommerce;
        ?>
            <div id="cart" class="dropdown mini-cart">
                <span class="text-skin cart-icon">
                    <i class="icon-cart2"></i>
                    <span><?php _e('Cart:','basic'); ?></span>
                </span>
                <a class="dropdown-toggle cart_totals" data-toggle="dropdown" data-hover="dropdown" data-delay="0" href="#" title="<?php _e('View your shopping cart', 'basic'); ?>">
                    <?php echo sprintf(_n(' <span class="mini-cart-items"> %d item </span> ', ' <span class="mini-cart-items"> %d items </span> ', $woocommerce->cart->cart_contents_count, 'basic'), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?>
                </a>
                <div class="dropdown-menu">
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}


/*
 *  Display list of navigations info with list of listin + total, info for woocommerce
 */
function wpo_woocommerce_pagination( $per_page,$total ){
    ?>
    <div class="clearfix">
        <?php wpo_pagination($prev = __('Previous','basic'), $next = __('Next','basic'), $pages='',array('class'=>'pull-left pagination-sm')); ?>
        <?php global  $wp_query; ?>
        <div class="result-count pull-right">
            <?php
            $paged    = max( 1, $wp_query->get( 'paged' ) );
            $first    = ( $per_page * $paged ) - $per_page + 1;
            $last     = min( $total, $per_page * $paged );

            if ( 1 == $total ) {
                _e( 'Showing the single result', 'basic' );
            } elseif ( $total <= $per_page || -1 == $per_page ) {
                printf( __( 'Showing all %d results', 'basic' ), $total );
            } else {
                printf( _x( 'Showing %1$d–%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'basic' ), $first, $last, $total );
            }
            ?>
        </div>
    </div>
<?php
}

/*
 *  Display list of navigations info with list of listin + total, info for woocommerce
 */
function wpo_woocommerce_custom_usermenutop() { ?>
    <ul class="setting-menu">
        <li>
            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                <?php _e('My Account','basic'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>">
                <?php _e('Checkout','basic'); ?>
            </a>
        </li>

        <li>
            <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
                <?php _e('Cart','basic'); ?>
            </a>
        </li>
    </ul>
<?php }


/* ---------------------------------------------------------------------------
 * WooCommerce - Function get Query
 * --------------------------------------------------------------------------- */
function wpo_woocommerce_query($type,$post_per_page=-1,$cat='', $paged=1){
    global $woocommerce;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $post_per_page,
        'post_status' => 'publish',
        'paged' => $paged
    );
    switch ($type) {
        case 'best_selling':
            $args['meta_key']='total_sales';
            $args['orderby']='meta_value_num';
            $args['ignore_sticky_posts']   = 1;
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;
        case 'featured_product':
            $args['ignore_sticky_posts']=1;
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = array(
                         'key' => '_featured',
                         'value' => 'yes'
                     );
            $query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;
        case 'top_rate':
            
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;
        case 'recent':
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            break;
        case 'on_sale':
            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            $args['post__in'] = wc_get_product_ids_on_sale();
            break;
        case 'recent_review':
            if($post_per_page == -1) $_limit = 4;
            else $_limit = $post_per_page;
            global $wpdb;
            $query = $wpdb->prepare( "
                SELECT c.comment_post_ID 
                FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c 
                WHERE p.ID = c.comment_post_ID AND c.comment_approved > %d 
                AND p.post_type = %s AND p.post_status = %s
                AND p.comment_count > %d ORDER BY c.comment_date ASC" ,
                0, 'product', 'publish', 0 );
            $results = $wpdb->get_results($query, OBJECT);
            $_pids = array();
            foreach ($results as $re) {
                if(!in_array($re->comment_post_ID, $_pids))
                    $_pids[] = $re->comment_post_ID;
                if(count($_pids) == $_limit)
                    break;
            }

            $args['meta_query'] = array();
            $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            $args['post__in'] = $_pids;
            break;
    }

    if($cat!=''){
        $args['product_cat']= $cat;
    }
    return new WP_Query($args);
}

/* Out of stock label*/
if ( !function_exists('woocommerce_sale_flashmessage') ) {
    function woocommerce_sale_flashmessage($flash){
        global $product;
        $availability = $product->get_availability();

        if ($availability['availability'] == 'Out of stock') :
            $flash = '<span class="out-of-stock-badge onsale">'.__( 'Out of stock', 'basic' ).'</span>';
        endif;
        return $flash;
    }
}

if( wpo_theme_options('wc_cartnotice') ) {
    add_action('init','WPO_jsWoocommerce');
    function WPO_jsWoocommerce(){
        wp_dequeue_script('wc-add-to-cart');
        wp_enqueue_script( 'wc-add-to-cart', WPO_THEME_URI . '/js/add-to-cart.js' , array( 'jquery' ) );
        wp_enqueue_script( 'noty_js', WPO_THEME_URI.'/js/jquery.noty.packaged.min.js', array( 'jquery' ) );
        wp_localize_script('wc-add-to-cart','woocommerce_localize',array(
            'cart_success'=> wpo_theme_options('wc_cartnotice_text', 'Success: Your item has been added to cart!'),
        ));
        
    }
}


// Add form
add_action( 'product_cat_add_form_fields', 'wpo_add_category_fields');
add_action( 'product_cat_edit_form_fields', 'wpo_edit_category_fields', 10, 2 );
add_action( 'created_term', 'wpo_save_category_fields' , 10, 3 );
add_action( 'edit_term', 'wpo_save_category_fields' , 10, 3 );

// Add term page
function wpo_add_category_fields() {  ?>
    <div class="form-field">
        <label for="term_meta[icon_class]"><?php _e( 'Category Icon class', 'basic'); ?></label>
        <input type="text" name="term_meta[icon_class]" id="term_meta[con_class]" value="">
        <p class="description"><?php _e( 'Enter a value for category icon class. If not have icon class, please upload image icon', 'basic' ); ?></p>
    </div>
<?php
}

if(!function_exists('wpo_woo_pagination')){
    function wpo_woo_pagination($per_page,$total, $max_num_pages=''){
        ?>
        <div class="post-pagination clearfix">
            <?php wpo_pagination($prev = __('Previous','basic'), $next = __('Next','basic'), $pages = $max_num_pages,array('class'=>' ')); ?>
            <?php global  $wp_query; ?>
            <div class="woocommerce-result-count result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                if ( 1 == $total ) {
                    _e( 'Showing the single result', 'basic' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( __( 'Showing all %d results', 'basic' ), $total );
                } else {
                    printf( _x( 'Showing %1$d–%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'basic' ), $first, $last, $total );
                }
                ?>
            </div>
        </div>
    <?php
    }
}

// Edit term page
function wpo_edit_category_fields($term, $taxonomy) {
 
    // put the term ID into a variable
    $icon_class     = get_woocommerce_term_meta( $term->term_id, 'cat_icon_class', true );
?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="cat_icon_class"><?php _e( 'Category Icon class', 'basic' ); ?></label></th>
        <td>
            <input type="text" name="cat_icon_class" id="cat_icon_class" value="<?php echo esc_attr( $icon_class ) ? esc_attr( $icon_class ) : ''; ?>">
            <p class="description"><?php _e( 'Enter a value for category icon class. If not have icon class, please upload image icon', 'basic' ); ?></p>
        </td>
    </tr>
<?php
}

// Save extra taxonomy fields callback function.
function wpo_save_category_fields( $term_id, $tt_id, $taxonomy ) {
    if ( isset( $_POST['cat_icon_class'] ) ) {
            update_woocommerce_term_meta( $term_id, 'cat_icon_class', esc_attr( $_POST['cat_icon_class'] ) );
    }
}
function wpo_cartdropdown_2(){
    global $woocommerce; ?>
    <div class="dropdown">
        <a class="dropdown-toggle mini-cart pull-right " data-toggle="dropdown" data-hover="dropdown" data-delay="0" href="#" title="<?php _e('View your shopping cart', 'basic'); ?>">
            <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'basic'), $woocommerce->cart->cart_contents_count);?>
        </a>
        <div class="dropdown-menu">
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>
<?php }

function wpo_cartdropdown_3(){
    global $woocommerce; ?>
    <div class="dropdown">
        <a class="dropdown-toggle mini-cart " data-toggle="dropdown" data-hover="dropdown" data-delay="0" href="#" title="<?php _e('View your shopping cart', 'basic'); ?>">
            <span class="cart-title"><?php echo __('Cart','basic'); ?></span><?php echo $woocommerce->cart->get_cart_total(); ?>
        </a>
        <div class="dropdown-menu">
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>
<?php }

//load more product tabs

add_action( 'wp_ajax_wpo_load_more_product', 'wpo_load_more_product' );
add_action( 'wp_ajax_nopriv_wpo_load_more_product', 'wpo_load_more_product' );

function wpo_load_more_product(){
  $number       = $_POST['number'];
  $paged        = $_POST['paged'];
  $class_column = $_POST['column'];
  $key          = $_POST['key'];
  $style        = $_POST['style'];
  $result       = $posts = array();
  $cols         = $_POST['cols'];

  $loop = wpo_woocommerce_query($key,$number, null, $paged);
  //var_dump( $loop);
  if($loop->have_posts()){
    ob_start();
      wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$loop,'columns_count'=>$cols,'class_column'=>$class_column,'posts_per_page'=>$number ) );
    $posts = ob_get_clean();
  }
  if($paged >= $loop->max_num_pages)
    $result['check'] = false;
  else
    $result['check'] = true;

  $result['posts'] = $posts;
  print_r(json_encode($result));
  exit();
}
