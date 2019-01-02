<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
global $product;
?>
<div class="product-block product product-grid">
	<figure class="image">
        <?php woocommerce_show_product_loop_sale_flash(); ?>
        <a href="<?php the_permalink(); ?>" class="product-image img-responsive">
            <?php
                /**
                * woocommerce_before_shop_loop_item_title hook
                *
                * @hooked woocommerce_show_product_loop_sale_flash - 10
                * @hooked woocommerce_template_loop_product_thumbnail - 10
                */
               
               woocommerce_template_loop_product_thumbnail();
            ?>
        </a>
    </figure>

	<div class="caption">
        <?php
            $_category = wc_get_product_category_list( $product->get_id(), ', ', '<h5 class="category">', '</h5>' );
            if($_category==''){
            ?>
                <h5 class="category"><?php echo __('Uncategorized','basic'); ?></h5>
            <?php
            }else{
                echo $_category;
            }
        ?>
		<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
            /**
            * woocommerce_after_shop_loop_item_title hook
            *
            * @hooked woocommerce_template_loop_rating - 5
            * @hooked woocommerce_template_loop_price - 10
            */
            // Remove the product rating display on product loops
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
	</div>
    <div class="button-groups">
        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
        <?php
            $action_add = 'yith-woocompare-add-product';
            $url_args = array(
                'action' => $action_add,
                'id' => $product->get_id()
            );
        ?>
        <div class="add-links">
            <?php if(wpo_theme_options('is-quickview',true)){ ?>
                <div class="quick-view">
                    <a href="#" class="quickview hidden-xs hidden-sm" data-productslug="<?php echo $product->get_slug(); ?>" data-toggle="modal" data-target="#wpo_modal_quickview">
                        <i class="icon-eye"></i>
                        <span><?php echo __('Quickview','basic'); ?></span>
                    </a>
                </div>
            <?php } ?>

            <?php
                if( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                }
            ?>
            <?php if( class_exists( 'YITH_Woocompare' ) ) { ?>
                <?php
                    $action_add = 'yith-woocompare-add-product';
                    $url_args = array(
                        'action' => $action_add,
                        'id' => $product->get_id()
                    );
                ?>
                <div class="yith-compare hidden-xs hidden-sm">
                    <a href="<?php echo esc_url( wp_nonce_url( add_query_arg( $url_args ), $action_add ) ); ?>" class="compare" data-product_id="<?php echo $product->get_id(); ?>">
                        <em class="fa fa-files-o"></em>
                        <span><?php echo __('Compare','basic'); ?></span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>