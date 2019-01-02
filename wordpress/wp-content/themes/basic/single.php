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
    global $wpopconfig;
    $wpopconfig = $wpoEngine->getPostConfig();

?>

<?php get_header( wpo_theme_options('headerlayout') );  ?>

    <?php if( wpo_theme_options('blog_show-breadcrumb', true)):?>
      <div class="wrapper-breadcrumb"> 
          <?php wpo_breadcrumb(); ?>
      </div>
    <?php endif; ?>


<section id="wpo-mainbody" class="wpo-mainbody clearfix single-page">
	<div class="container">
                <div class="row">
                <?php get_sidebar( 'left' );  ?>                    
                    <!-- MAIN CONTENT -->
                    <div id="wpo-content" class="wpo-content <?php echo esc_attr( $wpopconfig['main']['class'] ); ?>">
                        <?php if( wpo_theme_options('blog_show-title', true)){ ?>
                            <header class="page-header post-header">
                                <h1 class="blog-title">
                                    <?php the_title(); ?>
                                </h1> 
                            </header><!-- /header -->                                                       
                        <?php } ?>

                        <?php if( get_post_type() && get_post_type() != 'post' ) :   ?>
                        <div class="post-<?php echo get_post_type(); ?>">
                             <?php get_template_part( 'templates/'.get_post_type().'/single' ); ?>  
                        </div>
                        <?php else : ?>
                        <div class="post-area single-blog">
                            <?php  while(have_posts()): the_post(); ?>
                            <?php get_template_part( 'templates/content/content', get_post_format() ); ?>

                            <?php the_tags( '<footer class="entry-meta"><span class="tag-links"><span>Tags: </span>', '', '</span></footer>' ); ?>
                                <?php if( wpo_theme_options('show-share-post', true) ){ ?>
                                    <div class="post-share">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6><?php echo __( 'Share this Post!','basic' ); ?></h6>
                                            </div>
                                            <div class="col-sm-8">
                                                <?php wpo_share_box(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <hr>
                                    <div class="author-about">
                                        <?php get_template_part('templates/author-bio'); ?>
                                    </div>
                                    <hr>
                                <?php comments_template(); ?>
                                <div class="post-related">
                                    <?php if( wpo_theme_options('show-related-post', true) ){
                                            $relate_count = wpo_theme_options('blog-items-show', 4);
                                            wpo_related_post($relate_count, 'post', 'category');
                                    } ?>
                                </div>
                           <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- //MAIN CONTENT -->
                    <?php get_sidebar( 'right' );  ?>
                </div>
            </div>        
</section>

<?php get_footer(); ?>