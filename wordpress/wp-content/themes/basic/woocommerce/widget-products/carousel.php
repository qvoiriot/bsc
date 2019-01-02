<?php

$_total = $loop->post_count;
$_count = 1;
$_id = wpo_makeid();
?>

<div class="widget-products-carousel carousel slide" id="productcarouse-<?php echo $_id; ?>">
    <?php if($posts_per_page>$columns_count && $_total>$columns_count){ ?>
        <div class="carousel-controls">
            <a class="prev carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="next carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    <?php } ?>
    <div class="carousel-inner">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <?php if( $_count%$columns_count == 1 ) echo '<div class="has-col'.$posts_per_page.' row item'.(($_count==1)?" active":"").'">'; ?>

            <!-- Product Item -->
            <div class="<?php echo esc_attr( $class_column ); ?>">
                <?php wc_get_template_part( 'content', 'product-inner' ); ?>
            </div>
            <!-- End Product Item -->

            <?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $posts_per_page || $_count==$_total ) echo '</div>'; ?>
            <?php $_count++; ?>
        <?php endwhile; ?>
    </div>
</div>

<?php wp_reset_postdata(); ?>