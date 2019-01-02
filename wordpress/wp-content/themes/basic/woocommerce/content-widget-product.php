 <?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version   3.3.1
 */

global $product; ?>

<?php
	$class=$attrs='';
	if(isset($animate) && $animate){
		$class= 'wow fadeInUp';
		$attrs = 'data-wow-duration="0.6s" data-wow-delay="'.$delay.'ms"';
	}
?>

<div class="media widget-product product-block <?php echo esc_attr( $class ); ?>" <?php echo $attrs; ?>>
	<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_html( $product->get_name() ); ?>" class="image media-left media-middle">
		<?php echo $product->get_image(); ?>
	</a>
	<div class="media-body widget-product-body">
		<h3 class="name">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo $product->get_name(); ?></a>
		</h3>

        <?php /*
		<div class="rating clearfix">
            <?php if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) { ?>
                <div class="pull-left"><?php echo $rating_html; ?></div>
            <?php }else{ ?>
                <div class="star-rating pull-left"></div>
            <?php } ?>
        </div>
        */ ?>

		<div class="price"><?php echo $product->get_price_html(); ?></div>
	</div>
</div>
