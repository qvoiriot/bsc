<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version       3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = wc_get_related_products( $product->get_id() );

if ( sizeof( $related ) == 0 ) return;
$posts_per_page = wpo_theme_options('woo-number-product-single',6);
$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );
$_id = wpo_makeid();
$_count =1;
$products = new WP_Query( $args );

$columns_count = wpo_theme_options('product-number-columns',3);
$class_column = 'col-md-' . floor( 12/$columns_count );

if ( $products->have_posts() ) : ?>

	<div class="widget widget-related-products widget-products products">
		<h3 class="widget-title visual-title">
	        <span><?php _e( 'Related Products', 'basic' ); ?></span>
		</h3>
		<div class="widget-content">
			<?php wc_get_template( 'widget-products/carousel.php' , array( 'loop'=>$products,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$posts_per_page ) ); ?>
		</div>
	</div>

<?php endif;

wp_reset_postdata();
