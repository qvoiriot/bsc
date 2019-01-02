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
	'title' => '',
	'brand_columns'=> 4,
	'icon'=>'',
	'alignment' => '',
	'size' => '',
	'descript' => '',
	'el_class'=>'',
	'brand_link_target' => '_blank'
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

$_id = wpo_makeid();
$args = array(
	'post_type' => 'brands'
);
$loop = new WP_Query($args);


if ( $loop->have_posts() ) : ?>
<?php
	$_count = 1;
	$col = floor(12/$brand_columns);
    $smcol = ($col > 4)? 6: $col;
    $class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;
?>
	<section class="widget widget-brand-logo <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
		<?php if($title!=''){ ?>
			<h3 class="widget-title visual-title <?php echo esc_attr($alignment.' '.$size); ?>">
				<?php if($icon!=''){ ?>
					<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
				<?php } ?>
				<span><?php echo esc_html( $title ); ?></span>
			</h3>
		<?php } ?>

		<?php if(trim($descript)!=''){ ?>
            <p class="visual-description">
                <?php echo esc_html( $descript ); ?>
            </p>
        <?php } ?>

		<div class="widget-content">
			<div class="widget-brands-inner slide carousel" id="productcarouse-<?php echo esc_attr($_id); ?>">
				<div class="carousel-controls">
					<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="prev" class="left carousel-control">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="next" class="right carousel-control">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				<div class="carousel-inner">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if( $_count%$brand_columns == 1 ) echo '<div class="item'.(($_count==1)?" active":"").'"><div class="row">'; ?>
						<?php
							$meta = get_post_meta(get_the_ID(),'wpo_brandconfig',true);
							$link = isset($meta['brand_link']) ? $meta['brand_link'] : '#';
						?>
						<!-- Product Item -->
						<div class="<?php echo esc_attr( $class_column ); ?> item-brand text-center">
							<a href="<?php echo esc_url($link); ?>" title="<?php the_title() ?>" <?php echo ($brand_link_target=='new_window')? 'target="_blank"': ''; ?>>
								<?php the_post_thumbnail( 'brand-logo' ); ?>
							</a>
						</div>
						<!-- End Product Item -->

					<?php if( ($_count%$brand_columns==0 && $_count!=1) || $_count== $loop->found_posts ) echo '</div></div>'; ?>
					<?php $_count++; ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php wp_reset_query(); ?>