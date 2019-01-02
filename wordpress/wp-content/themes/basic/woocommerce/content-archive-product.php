<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version       3.3.1
 */
?>

<?php if( wpo_theme_options('woocommerce-product-show-title', true) ) : ?>

    <header class="header-title">
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
    </header>

<?php endif; ?>

<?php do_action( 'woocommerce_archive_description' ); ?>
<?php if ( have_posts() ) : ?>
	<div id="wpo-filter" class="clearfix">
        
        <?php if( !woocommerce_products_will_display() ): ?>
            <?php remove_action( 'wpo_button_display', array( 'WPO_Woocommerce', 'renderButton' ), 20 ); ?>
        <?php endif; ?>
        <?php do_action('wpo_button_display'); ?>
        <?php
            /**
             * woocommerce_before_shop_loop hook
             *
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
             //woocommerce_show_messages();
            woocommerce_catalog_ordering();
        ?>
	</div>
    

    <?php woocommerce_product_subcategories(); ?>
    <?php woocommerce_product_loop_start(); ?>
        
        <?php
            $style = wpo_theme_options('wc_listgrid', 'product');

            if (isset($_COOKIE['wpo_cookie_layout']) && $_COOKIE['wpo_cookie_layout']== 'product') {
                $layout = 'product';
            }elseif (isset($_COOKIE['wpo_cookie_layout']) && $_COOKIE['wpo_cookie_layout']== 'list') {
                $layout = 'product-list';
            }else{
                $layout = $style;
            }
        ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                wc_get_template_part( 'content', $layout );
            ?>
        <?php endwhile; // end of the loop. ?>

    <?php woocommerce_product_loop_end(); ?>

    <div class="clearfix product-bottom">
        <?php
            /**
            * woocommerce_after_shop_loop hook
            *
            * @hooked woocommerce_pagination - 10
            */
            add_action( 'woocommerce_after_shop_loop','woocommerce_result_count' ,20);
            do_action( 'woocommerce_after_shop_loop' );
        ?>
    </div>                    

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

    <?php wc_get_template( 'loop/no-products-found.php' ); ?>

<?php endif; ?>