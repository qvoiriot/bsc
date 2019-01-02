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
global $column, $portfolio;

$col = floor(12/$column);
$smcol = ($col > 4)? 6: $col;
$class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;

wp_enqueue_script( 'wpo_isotope_js', WPO_THEME_URI.'/js/isotope.pkgd.min.js', array( 'jquery' ) );
wp_enqueue_script( 'wpo_prettyPhoto_js', WPO_THEME_URI.'/js/jquery.prettyPhoto.js', array( 'jquery' ) );
wp_enqueue_style( 'wpo_prettyPhoto_css', WPO_THEME_URI.'/css/prettyPhoto.css');

$terms = get_terms('Categories',array('orderby'=>'id'));

$_id = wpo_makeid();
?>

<div class="wpo-portfolio portfolio-margins">
<?php if( $portfolio->have_posts()): ?>
    <!-- filters category -->
    <div id="filters" class="isotope-filter">
      <ul class="nav nav-tabs wpo-portfolio-filters">
        <li>
          <a href="javascript:void(0)" title="" data-filter=".all" class="active">
            <?php _e('All', 'basic'); ?>
          </a>
        </li>
    <?php if ( count($terms) > 0 ){
          foreach ( $terms as $term ): ?>
            <li><a href="javascript:void(0)" title="" data-filter=".<?php echo esc_attr($term->slug); ?>">
            <?php echo esc_html( $term->name ); ?>
            </a></li>
      <?php endforeach;
          }
      ?>
      </ul>
    </div>
  <div class="isotope" data-isotope-duration="400" id="isotope-<?php echo esc_attr($_id); ?>">
  <?php while($portfolio->have_posts()): $portfolio->the_post();
     $item_classes = 'all ';
     $item_cats = get_the_terms( $portfolio->post->ID, 'Categories' );
     foreach((array)$item_cats as $item_cat){
       if(count($item_cat)>0){
         $item_classes .= $item_cat->slug . ' ';
        }
      }
      $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $portfolio->post->ID ), 'blog-thumbnails' );
      $_video = array('type' => 'wpo_portfolio', 'format' =>'video_link');
?>

<?php /*
<div class="col-sm-<?php echo $class_column; ?> item col-md-<?php echo $class_column; ?> col-lg-<?php echo $class_column; ?> <?php echo $item_classes; ?>">
*/ ?>

<div class="item <?php echo esc_attr( $item_classes ); ?>">
	<div class="wpo-portfolio-content">
		<div class="wpo-portfolio-content-inner">
			<?php if( wpo_embed( $_video) ){ ?>
				<figure class="wpo-portfolio-thumbnail post-type-video embed-responsive embed-responsive-16by9">
					<?php echo wpo_embed( $_video); ?>
				</figure>
				<?php }elseif ( has_post_thumbnail()) { ?>
				<figure class="wpo-portfolio-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('blog-thumbnails'); ?>
					</a>
          <div class="wpo-prettyPhoto">
        <?php
          if( wpo_embed( $_video) ){ ?>
            <a class="video-popup" href="javascript:void(0)" data-title="<?php the_title(); ?>" data-id="<?php the_ID(); ?>" data-toggle="modal" data-target="#videoModal">
              <i class="fa fa-youtube-play"></i>
              <?php the_title(); ?>
            </a>
          <?php }elseif( $image_attributes ) { ?>
            <a href="<?php echo esc_url( $image_attributes[0] ); ?>" rel="prettyPhoto[all]" title="<?php the_title_attribute(); ?>" class="btn btn-outline-inverse">
              <i class="fa fa-plus"></i>
            </a>
        <?php } ?>
      </div>  
				</figure>
				<?php } ?>      	
		</div>
	</div>
</div>
<?php endwhile; ?>
</div>

<?php endif; ?>
</div>
<?php wp_reset_query(); ?>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><span class="spinner"></span></div>
        </div>
    </div>
</div>