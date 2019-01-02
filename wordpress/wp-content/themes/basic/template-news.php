<?php
/*
*Template Name: Magazine
*
*/
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

global $wpopconfig;
$wpopconfig = $wpoEngine->getPageConfig();

$header_skin = ( $wpopconfig['header_skin']=='global' )? wpo_theme_options('headerlayout',''): $wpopconfig['header_skin'];
$footer_style = ( $wpopconfig['footer']=='global' )? wpo_theme_options('footer-style',''): $wpopconfig['footer'];
?>

<?php get_header( $header_skin ); ?>

<?php if($wpopconfig['show_breadcrumb']){ ?>
    <?php wpo_breadcrumb(); ?>
<?php } ?>


<section id="wpo-mainbody" class="wpo-mainbody news-page clearfix">
    <div class="container">
        <div class="row">
			<!-- MAIN CONTENT -->
            <?php get_sidebar( 'left' );  ?>
			<div id="wpo-content" class="<?php echo esc_attr( $wpopconfig['main']['class'] ); ?>">	
                <?php if($wpopconfig['show_title_header']){ ?>
                    <header class="page-header">
                        <h1 class="page-title"><span><?php the_title(); ?></span></h1>
                    </header>
                <?php } ?>

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						<?php the_content(); ?>
					</article><!-- #post -->
					<?php //comments_template(); ?>
				<?php endwhile; ?>
			</div>
			<!-- //MAIN CONTENT -->
			  
			
			<?php get_sidebar( 'right' );  ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>