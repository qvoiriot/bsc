<?php
/**
 * $loop
 * $class_column
 *
 */

$_count =1;
$colums = '3';
$bscol = 12;

?>

<div class="posts-list">
<?php
    $i = 0;	
    while($loop->have_posts()){
    $loop->the_post();
?>    
<?php wpo_get_template('post/_single.php',array( 'loop'=> $loop,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
<?php  } ?>
</div>