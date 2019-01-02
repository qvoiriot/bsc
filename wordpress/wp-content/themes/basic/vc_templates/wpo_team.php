<?php
/*extract( shortcode_atts( array(
	'title'=>'',
	'photo'=> '',
	'job'	=> '',
	'phone'=>'',
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

<div class="panel panel-default wpo-our-team <?php echo esc_attr( $style ); ?>">
	<?php if( !empty($image['thumbnail'] )) { ?>
		<div class="panel-body team-member-image">
			<?php echo ( $image['thumbnail'] ); ?>	
		</div>		
    <?php } ?>

	<div class="panel-footer team-member-body">
		<div class="team-member-body-content">
			<div class="team-member-content-inner">
				<?php if( $job ){  ?>
					<h3 class="team-member-name"><?php echo esc_html( $title ); ?></h3>
				<?php } ?>

			    <?php if( $job ){  ?>
				    <h5 class="team-member-position">
				    	<?php echo esc_html($job); ?>					    
				    </h5>
			    <?php } ?>
			    
			    <?php if( $information ){  ?>
				    <p class="team-member-info">					    
					    <?php echo esc_html($information); ?>	
				    </p>
			    <?php } ?>

			    <?php if( $phone ){  ?>
			    	<p class="team-member-phone"><?php echo esc_html($phone); ?></p>					
				<?php } ?>
			</div>
		</div>		
		<ul class="team-member-social list-inline list-unstyled">
			<?php if( $facebook ){  ?>
			<li><a class="fa fa-facebook" href="<?php echo esc_url( $facebook ); ?>"> </a></li>
				<?php } ?>
			<?php if( $twitter ){  ?>
			<li><a class="fa fa-twitter" href="<?php echo esc_url( $twitter ); ?>"> </a></li>
			<?php } ?>
			<?php if( $pinterest ){  ?>
			<li><a class="fa fa-pinterest" href="<?php echo esc_url( $pinterest ); ?>"> </a></li>
			<?php } ?>
			<?php if( $google ){  ?>
			<li><a class="fa fa-google" href="<?php echo esc_url( $google ); ?>"> </a></li>
			<?php } ?>
		</ul>
	</div>
</div>