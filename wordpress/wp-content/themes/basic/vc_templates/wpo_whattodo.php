<?php
/*extract( shortcode_atts( array(
	'title'=>'',
	'imagebg'=> '',
	'icon'=> '',	
	'colorbg'	=> '',
	'el_class'=>'',
	'information'=>'',
	'size'=>'font-size-md',
	'alignment'=>'separator_align_left',
	'style'	=> '',
	'thumbnail_size'	=> ''	
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

if( $imagebg && !empty( $imagebg )){
        $image = wpb_getImageBySize (array('attach_id'=> $imagebg, 'thumb_size' => $thumbnail_size));
    }

?>

<div class="wpo-whattodo <?php echo esc_attr( $el_class ).' '.esc_attr($style); ?>">
	<div class="whattodo-content">
		<div class="whattodo-icon">
			

			<?php if( !empty($image['thumbnail'] )) { ?>
				<div class="whattodo-icon-image">
					<?php echo ( $image['thumbnail'] ); ?>	
				</div>		
		    <?php } ?>


			<?php
			if($icon!=''){ ?>
				<div class="whattodo-icon-font">
					<div class="whattodo-icon-font-content">
						<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
					</div>
				</div>		
			<?php }
			?>		
		</div>



		<?php
		if($title!=''){ ?>		
			<h3 class="widget-title visual-title whattodo-heading <?php echo $alignment.' '.$size; ?>">
				<span><?php echo esc_html( $title ); ?></span>
			</h3>
		<?php }?>

		
		<?php
		if($information!=''){ ?>
			<div class="widget-content">
				<?php echo do_shortcode( $information );?>
			</div>
		<?php }
		?>
	</div>	
	<?php if( $colorbg ){ ?>
		<div class="whattodo-overlay" style="background-color:<?php echo $colorbg; ?>"></div>
	<?php } ?>
</div>