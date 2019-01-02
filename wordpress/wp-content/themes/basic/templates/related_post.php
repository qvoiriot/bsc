<?php

	if( $relates->have_posts() ): ?>
        <div class="widget related-post">           
    		<h4 class="widget-title related-post-title">
                <span><?php echo __( 'Related post', 'basic' ); ?></span>
            </h4>
            <div class="related-posts-content">
                <div class="row">
        		<?php
                    $class_column = floor( 12/ $relate_count ) ;
            		while ( $relates->have_posts() ) : $relates->the_post();
                        ?>
            			<div class="col-sm-<?php echo esc_attr( $class_column ); ?> col-md-<?php echo esc_attr( $class_column ); ?> col-lg-<?php echo esc_attr( $class_column ); ?>">
                            
                                <?php if ( has_post_thumbnail()) : ?>
                                    
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="entry-image">
                                            <?php the_post_thumbnail("fullwidth"); ?>
                                        </a>
                                    
                                <?php endif; ?>

                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <p class="entry-description"><?php echo wpo_excerpt(20,'...');; ?></p>
                                </div>
                            
                        </div>
                        <?php
                    endwhile; ?>
                </div>
            </div>
        </div>
        <?php
    endif;
?>