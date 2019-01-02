<div class="products-row has-col<?php echo $columns_count; ?>">
    <?php $cnt = 0;  $_count = 0;$_delay = 150; ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; $cnt++; ?>
        <?php
            $class_fix = ' shopcol';
            // Store loop count we're currently on
         
        ?>

        <?php if( $cnt%$columns_count==1 ) { ?>
        <div class="row">
        <?php } ?>
        <div class="<?php echo esc_attr( $class_column.$class_fix ); ?> wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
            <?php wc_get_template_part( 'content', 'product-inner' ); ?>
        </div>
        <?php $_count++;$_delay+=200; ?>
        <?php
            if($_count==$columns_count){
                $_count=0;$_delay=150;
            }
        ?>
        <?php if( $cnt%$columns_count==0 || $loop->found_posts == $cnt ) { ?>
        </div>
        <?php } ?>

    <?php endwhile; ?>
</div>

<?php wp_reset_postdata(); ?>