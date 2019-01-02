<article class="blog style3 posts-list">
	<div class="post-list-container">
		<div class="media">
			<?php
			if ( has_post_thumbnail() ) {
				?>				
					<a href="<?php the_permalink(); ?>" title="" class="entry-image entry-thumb media-left media-middle">                            
						<?php
							$post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
							echo $post_thumbnail['thumbnail'];
						?>											
					</a>			
				<?php
			}?>

			<div class="media-body">
				<div class="entry-content">                
					<h4 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<div class="blog-date">
						<div class="blog-date-inner">
							<span><?php echo get_the_date(); ?></span>
							<?php //the_author_posts_link(); ?>
						</div>
					</div>
					<p class="entry-description"><?php echo wpo_excerpt(160,'...');; ?></p>
				</div>
			</div>
		</div>
	</div>
</article>