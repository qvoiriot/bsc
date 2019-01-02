<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version       3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>
<div class="woocommerce-error alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php foreach ( $messages as $message ) : ?>
		<div><?php echo wp_kses_post( $message ); ?></div>
	<?php endforeach; ?>
</div>