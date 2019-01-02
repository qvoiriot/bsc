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


?>
<?php wpo_post_thumbnail(); ?>
<?php if( is_single() ) : ?>
	<div class="post-container">
 
        <div class="information-post">
            <div class="entry-name">
                <?php if(wpo_theme_options('post-title')){ ?>
                    <h1 class="entry-title">
                        <?php the_title(); ?>
                    </h1>
                <?php } ?>
                <p class="entry-meta">
                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                    <span class="meta-sep"> / </span>
				<span class="comment-count">
					<?php comments_popup_link(__(' 0 comment', 'basic'), __(' 1 comment', 'basic'), __(' % comments', 'basic')); ?>
				</span>
                    <span class="meta-sep"> / </span>
                    <span class="entry-author"><?php the_author_posts_link(); ?></span>
                     
                </p>
            </div>
            <div class="entry-content">
                <?php
                 $content = get_the_content();
                  $content = apply_filters('the_content', $content);
                    echo $content;
                 ?>
                <?php wp_link_pages(); ?>
            </div>

        </div>
	</div><!--  End .post-container -->
 
<?php else : ?>
   <?php get_template_part( 'templates/blog/blog'); ?>
<?php endif; ?>