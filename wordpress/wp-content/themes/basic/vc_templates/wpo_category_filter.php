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



/*extract( shortcode_atts( array(
    'term_id' 		=> '',
    'el_class'      => '',
    'number'        => -1,
    'image_cat'		=> '',
    'thumbnail_size'    => 'full'
), $atts ) );*/
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

if(empty($term_id)){
    return;
}elseif( $term_id && !empty($term_id) ){
    $term = get_term( $term_id, 'product_cat' );
    if( !$term) return;
    $args = array(
      'taxonomy'     => 'product_cat',
      'child_of'     => 0,
      'parent'       => $term_id,
      'number'       => $number,
    );
    $sub_cats = get_categories( $args );
    if( $image_cat && !empty( $image_cat )){
        
        $image = wpb_getImageBySize (array('attach_id'=> $image_cat, 'thumb_size' => $thumbnail_size));
        
    }

    elseif(get_woocommerce_term_meta( $term_id, 'thumbnail_id', true )) {
        $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
        
        $image = wpb_getImageBySize( array('attach_id'=> $thumbnail_id, 'thumb_size' => $thumbnail_size));
        
    }else {
        $image['thumbnail'] = '';
    }

    $category_link = get_term_link( $term->term_id, 'product_cat' );
}


?>

<div class="widget wpo-category-filter <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
	<div class="widget-content media">
        <?php if( !empty($image['thumbnail'] )) { ?>
    		<a class="media-left category-filter-image" href="<?php echo esc_url( $category_link ); ?>">
    				<?php echo $image['thumbnail']; ?>
    		</a>
        <?php } ?>
		<div class="media-body category-filter-content">
            <h3 class="category-filter-title">
                <span><?php echo esc_html($term->name); ?></span>
            </h3>
			<?php
			if( $sub_cats && !empty($sub_cats)) { ?>
                <ul class="list-unstyled category-filter-list">
					<?php
    					foreach( $sub_cats as $cat){
    						$sub_link = get_term_link( $cat->slug, 'product_cat');
    						$cat_name = $cat->name .' ('. $cat->count .')';
    					?>
                        <li class="category-filter-list-item">
    						<a href="<?php echo esc_url( $sub_link ); ?>">
                                <?php echo esc_html($cat_name); ?>
                            </a>
                        </li>
				    <?php } ?>
                </ul>
			<?php } ?>
			<div class="category-filter-link">
                <a href="<?php echo esc_url($category_link); ?>" title="<?php echo __( 'more', 'basic'); ?>" class="btn btn-link"><?php echo __( 'more', 'basic' ); ?></a>
            </div>
		</div>
	</div>
</div>

<?php wp_reset_query(); ?>