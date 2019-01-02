<article class="blog style1 posts-grid-1">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image">
                    <?php
						$post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
						echo $post_thumbnail['thumbnail'];
					?>						
                    <span class="blog-date">
                        <span><?php echo get_the_date(); ?></span>
                    </span>
                </a>                
            </figure>
        <?php
    }?>
    <h4 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <p class="entry-description"><?php echo wpo_excerpt(22,'...');; ?></p>
</article>
