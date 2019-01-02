<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

	<?php
        /**
        * woocommerce_before_main_content hook
        *
        * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
        * @hooked woocommerce_breadcrumb - 20
        */
		
        if( !wpo_theme_options('woocommerce-show-breadcrumb', true) ) :
            remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
        endif;
                
        do_action( 'woocommerce_before_main_content' );

	?>


    <section class="wpo-content-product content-product">
        <div class="container">
            <div class="row">
                <?php get_sidebar( 'shop-left' );  ?>
                    <section class="<?php echo esc_attr( $wpopconfig['main']['class'] ); ?>">
                        <div id="wpo-main-content" class="wpo-content">
                            <?php wc_get_template_part( 'content', 'archive-product' ); ?>
                        </div>
                    </section>
                <?php get_sidebar( 'shop-right' ); ?>
            </div>
        </div>
    </section>
     
<?php
/**
* woocommerce_after_main_content hook
*
* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
*/
do_action( 'woocommerce_after_main_content' );
?>