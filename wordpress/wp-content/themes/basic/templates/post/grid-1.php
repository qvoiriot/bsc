<?php
/**
 * $loop
 * $class_column
 *
 */

$_count =0;

$colums = $grid_columns;
$bscol = floor( 12/$colums );
?>
<?php
	if( $colums >1 ){
	$i = 0;
	while($loop->have_posts()){
	$loop->the_post();
 ?>
 		<?php if(  $i++%$colums==0 ) {  ?>
 		<div class="posts-grid"><div class="row">
 		<?php } ?>
	 	<div class="col-sm-<?php echo esc_attr( $bscol ); ?>">		    
			<?php wpo_get_template('post/_single.php',array( 'loop'=> $loop,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
		</div>
		<?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
		</div></div>
		<?php } ?>
<?php  } } else { ?>
	<div class="posts-list">
	<?php
		while($loop->have_posts()){  $loop->the_post(); ?>		
		<?php wpo_get_template('post/_single.php',array( 'loop'=> $loop,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
	<?php 	}
	?>
	</div>
<?php } ?>

