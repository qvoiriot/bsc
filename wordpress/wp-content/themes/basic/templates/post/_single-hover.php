 
<article class="post">
    <figure class="entry-thumb">       
		<a href="<?php the_permalink(); ?>" title="" class="entry-image">
            <?php
				$post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
				echo $post_thumbnail['thumbnail'];
			?>						
            <!-- vote    -->
            <?php do_action('wpo_rating') ?>
        </a>

        <div class="entry-overlap">
        	<p class="entry-meta">
				<span class="entry-date"><?php echo get_the_date(); ?></span>
				<span class="meta-sep"> / </span>
				<span class="comment-count">
					<?php comments_popup_link(__(' 0 comment', 'basic'), __(' 1 comment', 'basic'), __(' % comments', 'basic')); ?>
				</span>
				<span class="meta-sep"> / </span>
				<span class="entry-author"><?php the_author_posts_link(); ?></span>
				<?php if(is_tag()): ?>
				<span class="meta-sep"> / </span>
				<span class="tag-link"><?php the_tags('Tags: ',', '); ?></span>
				<?php endif; ?>
			</p>
			<h4 class="entry-title">
		        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		    </h4>
		    <p class="entry-description"><?php echo wpo_excerpt(25,'...');; ?></p>
		</div>
    </figure>

</article>