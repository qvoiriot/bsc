<?php  if ( have_posts() ) : ?>
<div class="post-area">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'templates/content/content', get_post_format() ); ?>  
    <?php endwhile; ?>
</div>

<?php else : ?>
<?php get_template_part( 'templates/none' ); ?>
<?php endif; ?>