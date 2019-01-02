<?php
/*extract( shortcode_atts( array(
	'title'=>'',	
	'size'=>'',	
	'alignment'=>'',		
	'el_class'=>'',
	'description'=>'',
	'company'=>'',	
	'country'=>'',
	'locality'=>'',
	'street'=>'',
	'phone'=>'',
	'fax'=>'',
	'working_time'=>'',	
	'skype'=>'',
	'email'=>'',
	'website_url'=>'',	
	'style'	=> '',	
	'icon_company'=>'',
	'icon_country'=>'',
	'icon_locality'=>'',
	'icon_street'=>'',
	'icon_phone'=>'',
	'icon_fax'=>'',
	'icon_skype'=>'',
	'icon_email'=>'',
	'icon_website_url'=>'',
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
?>

<div class="wpo-contact-info widget <?php echo esc_attr( $el_class ); ?>">
	
	<!--title-->
	<?php
	if($title!=''){ ?>
		<h3 class="widget-title visual-title wpo-contact-heading <?php echo esc_attr($size.' '.$alignment); ?>">		
	        <span><?php echo esc_html( $title ); ?></span>
		</h3>
	<?php }
	?>

	<!--description-->
	<?php
	if($description!=''){ ?>
		<p class="wpo-contact-content widget-content">
			<?php echo do_shortcode( $description );?>
		</p>
	<?php }
	?>
	
	<ul class="list-unstyled wpo-contact-content">	
		<!--company-->
		<?php
		if($company!=''){ ?>			
			<li class="company">
				<?php
					if($icon_company!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr($icon_company ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $company ); ?></span>
			</li>
		<?php }
		?>	
		
		<!--country-->
		<?php
		if($country!=''){ ?>			
			<li class="country">
				<?php
					if($icon_country!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr( $icon_country ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $country ); ?></span>
			</li>
		<?php }
		?>

		<!--locality-->
		<?php
		if($locality!=''){ ?>			
			<li class="locality">
				<?php
					if($icon_locality!=''){ ?>	
						<div class="contact-icon"><i class="<?php echo esc_attr( $icon_locality ); ?>"></i></div>
					<?php }
				?>				
				<span><?php echo esc_html( $locality ); ?></span>
			</li>
		<?php }
		?>
		
		<!--street-->
		<?php
		if($street!=''){ ?>			
			<li class="street">
				<?php
					if($icon_street!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr( $icon_street ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $street ); ?></span>
			</li>
		<?php }
		?>
		
		<!--fax-->
		<?php
		if($fax!=''){ ?>			
			<li class="fax">
				<?php
					if($icon_fax!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr( $icon_fax ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $fax ); ?></span>
			</li>
		<?php }
		?>
		
		
		<!--skype-->
		<?php
		if($skype!=''){ ?>			
			<li class="skype">
				<?php
					if($icon_skype!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr( $icon_skype ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $skype ); ?></span>
			</li>
		<?php }
		?>
		
		
		<!--website_url-->
		<?php
		if($website_url!=''){ ?>			
			<li class="website_url">
				<?php
					if($icon_website_url!=''){ ?>	
						<span class="contact-icon"><i class="<?php echo esc_attr( $icon_website_url ); ?>"></i></span>
					<?php }
				?>				
				<span><?php echo esc_html( $website_url ); ?></span>
			</li>
		<?php }
		?>
				
		
		<!--working_time-->
		<?php
		if($working_time!=''){ ?>			
			<li class="working_time">				
				<?php echo esc_html( $working_time ); ?>
			</li>
		<?php }
		?>	

		<!--phone-->
		<?php
		if($phone!=''){ ?>			
			<li class="phone">
				<?php
					if($icon_phone!=''){ ?>	
						<span class="contact-icon">
							<i class="<?php echo esc_attr( $icon_phone ); ?>"></i>
						</span>							
					<?php }
				?>				
				<?php _e('Call us:','basic'); ?>
				<span class="contact-intro"><?php echo esc_html( $phone ); ?></span>				
			</li>
		<?php }
		?>	
		
		<!--email-->
		<?php
		if($email!=''){ ?>			
			<li class="email">
				<?php
					if($icon_email!=''){ ?>	
						<span class="contact-icon">
							<i class="<?php echo esc_attr( $icon_email ); ?>"></i>
						</span>						
					<?php }
				?>			
				<?php _e('Email:','basic'); ?>
				<a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a>				
			</li>
		<?php }
		?>			
	</ul>
</div>