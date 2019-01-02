<div class="clearfix loop-products">
	<?php $_count = 0;$_delay = 150; ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

        <?php
        $class_fix = ' shopcol';
        // Store loop count we're currently on
        if ( $_count == 0 || $columns_count == 1 ){
            $class_fix .= ' last-row';
        ?>
        	<div class="col-md-12 col-sm-12<?php echo esc_attr( $class_fix ); ?> wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
				<?php wc_get_template_part( 'content', 'product-feature' ); ?>
			</div>
		<?php } else{ ?>
            <?php if($_count%$columns_count==0) $class_fix .= ' last-row';  ?>
			<div class="<?php echo esc_attr( $class_column.$class_fix ); ?> wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
				<?php wc_get_template_part( 'content', 'product-inner' ); ?>
			</div>
		<?php } ?>
		<?php $_count++;$_delay+=200; ?>
	<?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
