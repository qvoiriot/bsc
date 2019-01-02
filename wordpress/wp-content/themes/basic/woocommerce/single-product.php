<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
?>


	<?php
		/**
		* woocommerce_before_main_content hook
		*
		* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		* @hooked woocommerce_breadcrumb - 20
		*/
		do_action( 'woocommerce_before_main_content' );
	?>


	<section class="wpo-single-product content-product">
		<section class="container">
			<section class="row">
			<?php get_sidebar( 'shop-left' );  ?>
				<section class="<?php echo esc_attr( $wpopconfig['main']['class'] ); ?>">
					<div class="wpo-content">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php wc_get_template_part( 'content', 'single-product' ); ?>
						<?php endwhile; // end of the loop. ?>
					</div>
				</section>
				<?php get_sidebar( 'shop-right' ); ?>
			</section>
		</section>
	</section>


	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
