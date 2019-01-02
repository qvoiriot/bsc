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
$_count =0;

?>

<?php if( $portfolio->have_posts()): ?>
      <?php while($portfolio->have_posts()): 
            $portfolio->the_post(); 
            $_count++;
        ?>
        <?php if($_count == 1 || $_count % $column ==1): ?>
            <div class="row">
        <?php endif; ?>
    
            <div class="<?php echo esc_attr( $class_column ); ?>">
              <div class="wpo-portfolio">
                <div class="wpo-portfolio-content-inner">
                  <?php if ( has_post_thumbnail()) : ?>
                    <div class="wpo-portfolio-thumbnail">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'large' );?>
                      </a>
                    </div>
                  <?php endif; ?>

                  <div class="wpo-portfolio-title caption">
                    <h4 class="entry-title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <?php if($column !=4): ?>
                        <p class="entry-description"><?php echo wpo_excerpt(40,'...'); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php if($_count %$column==0 || $_count == $portfolio->post_count): ?>
                </div>
            <?php endif;?>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
<?php endif;