<?php

	if( $relates->have_posts() ): ?>

	    <h4 class="related-post-title">
            <span><?php echo __( 'Other Projects', 'basic' ); ?></span>
        </h4>

        <div class="related-posts-content">
            <div class="row">
    		    <?php
                $column = wpo_theme_options('post-number-columns', 4) ;
                $class_column = floor( 12/ $column );

        		while ( $relates->have_posts() ) : $relates->the_post();
                    ?>
        			<div class="col-sm-<?php echo esc_attr( $class_column ); ?> col-md-<?php echo esc_attr( $class_column ); ?> col-lg-<?php echo esc_attr( $class_column ); ?>">
                        <div class="element-item">
                            <?php if ( has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="entry-image">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            <?php endif; ?>
                            <h4 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p class="entry-description"><?php echo wpo_excerpt(25,'...');; ?></p>
                        </div>
                    </div>
                    <?php
                endwhile; ?>
            </div>
        </div>
        <?php
    endif;
?>