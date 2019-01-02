<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image">
                    <?php
						$post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
						echo $post_thumbnail['thumbnail'];
					?>						
                    <!-- vote    -->
                    <?php do_action('wpo_rating') ?>
                </a>                
            </figure>
        <?php
    }
    ?>
    <div class="entry-content">
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                <div class="entry-category">
                    <?php the_category(); ?>
                </div>
                <div class="entry-create">
                    <span class="meta-sep">|</span>
                    <span class="entry-date"><?php echo get_the_date(); ?></span>
                    <span class="meta-sep">|</span>
                </div>
                <ul class="entry-comment list-inline">
                    <li class="comment-count">
                        <?php comments_popup_link(__(' 0 ', 'basic'), __(' 1 ', 'basic'), __(' % ', 'basic')); ?>
                    </li>
                </ul>
            </div>
        </div>

        <?php
        if (get_the_title()) {
        ?>
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        <?php
        }
        ?>

        <?php
            if (! has_excerpt()) {
                echo "";
            } else {
                ?>
                    <p class="entry-description"><?php echo wpo_excerpt(29,'...'); ?></p>
                <?php
            }
        ?>

    </div>
</article>