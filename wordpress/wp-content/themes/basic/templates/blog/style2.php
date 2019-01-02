<article class="blog style2 posts-grid-2">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image">
                    <?php
						$post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
						echo $post_thumbnail['thumbnail'];
					?>	
                </a>
            </figure>
        <?php
    }?>
    <div class="entry-content">
        <div class="blog-date">
            <div class="blog-date-inner">
                <span class="date"><?php the_time( 'd' ); ?></span>
                <span class="month"><?php the_time( 'M' ); ?>,</span>
                <span class="year"><?php the_time( 'Y' ); ?></span>
            </div>
        </div>
        <h4 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <p class="entry-description"><?php echo wpo_excerpt(22,'...');; ?></p>
    </div>
</article>