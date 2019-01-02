<?php

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

if( WPO_MAILCHIMP_ACTIVED){ ?>
	<div class="widget wpo-newsletter <?php echo esc_attr( $el_class ); ?> <?php echo esc_attr( $class ); ?>">
		<?php if(!empty($title)){ ?>
			<h3 class="widget-title visual-title">
				<span><?php echo esc_html( $title ); ?></span>
			</h3>
		<?php } ?>
		
		<?php if(!empty($description)){ ?>
			<p class="widget-description">
				<?php echo trim( $description ); ?>
			</p>
		<?php } ?>		
		
		<?php
			if(function_exists('mc4wp_get_forms') ){
				try {
		   			$id_forms = ($fomr_id)? $fomr_id : mc4wp_get_form()->ID;
		   			mc4wp_show_form($id_forms);
				}catch( Exception $e ) {
					esc_html_e( 'Please create a newsletter form from Mailchip plugins','basic');
				}
			}else{
		   		esc_html_e( 'Please update last version plugin mailchimp', 'basic' );
			}
		?>
	</div>
<?php }