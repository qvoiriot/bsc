<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version   3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">

	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php do_action( 'woocommerce_before_mini_cart_contents' ); ?>
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="media widget-product">
						<a href="<?php echo esc_url( $product_permalink ); ?>" class="image media-left media-middle">
							<?php echo $thumbnail; ?>
						</a>
						<div class="cart-main-content media-body">
							<h3 class="name">
								<a href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo $product_name; ?>
								</a>
							</h3>
							<p class="cart-item">
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</p>

							<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'basic' ),
								esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
							?>


						</div>
					</div>
					<?php
				}
			}
		?>

		<?php do_action( 'woocommerce_mini_cart_contents' ); ?>

	<?php else : ?>

		<div class="empty"><?php _e( 'No products in the cart.', 'basic' ); ?></div>

	<?php endif; ?>

</div><!-- end product list -->

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<p class="total"><strong><?php _e( 'Subtotal', 'basic' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-outline btn-sm wc-forward"><?php _e( 'View Cart', 'basic' ); ?></a>
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-outline btn-sm checkout wc-forward"><?php _e( 'Checkout', 'basic' ); ?></a>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>