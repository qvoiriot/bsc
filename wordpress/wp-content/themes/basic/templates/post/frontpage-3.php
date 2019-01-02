<?php
/**
* $loop
* $class_column
*
*/

$_count =1;

$colums = '3';
$bscol = floor( 12/$colums );
$end = $loop->post_count;

$sub = 2;
$arr_size = explode("x", $grid_thumb_size);
if(!is_numeric($arr_size[0]))
	$arr_size[0] = 200;

$main_size = ($arr_size[0]*2).'x'.($arr_size[0]*2);


?>
<div class="front-page front-page-featured">

	<?php

		$i = 0;
		$main = $num_mainpost;
		$j = 0;
		while($loop->have_posts()){
			$loop->the_post();
	 ?>
	 		<?php if( $i<=$main-1) { ?>
	 			<?php if( $i == 0 ) {  ?>
	 				<div  class="main-posts">
	 			<?php } ?>
			 	<?php wpo_get_template('post/_single-hover.php',array( 'loop'=> $loop,'grid_thumb_size'=>$main_size ) ); ?>
				<?php if( $i == $main-1 || $i == $end -1 ) { ?>
					</div>
				<?php } ?>
			<?php } else { ?>
					<?php  if( $i == $main  ) { ?>
						<div class="secondary-posts"><div class="cols-inner">
					<?php }  ?>
							
								<div class="cols">									
									<?php wpo_get_template('post/_single-hover.php',array( 'loop'=> $loop,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
								</div>
														
					<?php if( $i == $end-1 ) {   ?>
						</div></div>
					<?php } ?>
				<?php  } ?>
	<?php  $i++; } ?>

</div>