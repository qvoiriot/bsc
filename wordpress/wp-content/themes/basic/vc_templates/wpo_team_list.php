<?php
/*extract( shortcode_atts( array(
	'title'=>'',
	'photo'=> '',
	'job'	=> '',
	'phone'=>'4',
	'information' => '',
	'google' => '',
	'twitter' => '',
	'linkedin'=>'',
	'facebook' => '',
	'pinterest'=> '',
	'style'		=> '',
	'thumbnail_size'    => ''
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );


if( $photo && !empty( $photo )){
        $image = wpb_getImageBySize (array('attach_id'=> $photo, 'thumb_size' => $thumbnail_size));
    }
?>

<div class="media wpo-our-team-list">

	<?php if( !empty($image['thumbnail'] )) { ?>
		<div class="media-left media-middle our-team-image">
			<?php echo ( $image['thumbnail'] ); ?>	
		</div>		
    <?php } ?>


	<div class="media-body our-team-content">
		<h3 class="team-name"><?php echo esc_html( $title ); ?></h3>
		<h5 class="team-job"><?php echo $job; ?></h5>
		<p class="team-info">
			<?php echo $information; ?>
		</p>
		<ul class="team-social list-unstyled list-inline">
			<?php if( $facebook ){  ?>
			<li><a class="fa fa-facebook" href="<?php echo esc_url($facebook); ?>"> </a></li>
				<?php } ?>
			<?php if( $twitter ){  ?>
			<li><a class="fa fa-twitter" href="<?php echo esc_url($twitter); ?>"> </a></li>
			<?php } ?>
			<?php //if( $pinterest ){  ?>
			<!-- <li><a class="fa fa-pinterest" href="<?php echo esc_url($pinterest); ?>"> </a></li> -->
			<?php //} ?>
			<?php //if( $google ){  ?>
			<!-- <li><a class="fa fa-google" href="<?php echo esc_url($google); ?>"> </a></li> -->
			<?php //} ?>
		</ul>
	</div>
</div>