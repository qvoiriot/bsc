<?php
/*extract( shortcode_atts( array(
	'title'=>'',
	'size' => '',
	'icon'=> '',
	'style'	=> '',
	'el_class'=>'',
	'title_align'=>'',
	'information'=>'',
	'photo' =>'',
	'thumbnail_size'    => ''
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );


if( $photo && !empty( $photo )){
        $image = wpb_getImageBySize (array('attach_id'=> $photo, 'thumb_size' => $thumbnail_size));
		//echo '<pre>'.print_r($image, 1).'</pre>'; 
    }
	
?>

<div class="widget wpo-ourservice <?php echo esc_attr( $el_class ).' '.esc_attr($style).' '; ?>">
	<?php if($icon!=''): ?>
		<div class="ourservice-icon ourservice-icon-font">
			<i class="fa <?php echo esc_attr( $icon ); ?> text-skin"></i>
		</div>
	<?php endif; ?>

    <?php if( !empty($image['thumbnail'] )) { ?>
		<div class="ourservice-icon ourservice-icon-image">
			<?php echo ( $image['thumbnail'] ); ?>	
		</div>		
    <?php } ?>

	<?php if($title!=''): ?>
		<h3 class="widget-title ourservice-heading <?php echo esc_attr($size.' '.$title_align).' '; ?>">
			<span><?php echo esc_html( $title ); ?></span>
		</h3>
	<?php endif; ?>

	<?php if(trim($information)!=''){ ?>
        <p class="ourservice-content">
			<?php echo do_shortcode( $information );?>
		</p>
    <?php } ?>
</div>