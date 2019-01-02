<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
?>

<form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order">

	<p><?php _e( 'To track your order please enter your Order ID in the box below and press return. This was given to you on your receipt and in the confirmation email you should have received.', 'basic' ); ?></p>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="orderid"><?php _e( 'Order ID', 'basic' ); ?></label> 
				<input class="input-text" type="text" name="orderid" id="orderid" value="<?php echo isset( $_REQUEST['orderid'] ) ? esc_attr( $_REQUEST['orderid'] ) : ''; ?>" placeholder="<?php _e( 'Found in your order confirmation email.', 'basic' ); ?>" />
			</div>			
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="order_email"><?php _e( 'Billing Email', 'basic' ); ?></label>
				<input class="input-text" type="text" name="order_email" id="order_email" value="<?php echo isset( $_REQUEST['order_email'] ) ? esc_attr( $_REQUEST['order_email'] ) : ''; ?>" placeholder="<?php _e( 'Email you used during checkout.', 'basic' ); ?>" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="button" name="track" value="<?php _e( 'Track', 'basic' ); ?>" />
	</div>
	<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>

</form>