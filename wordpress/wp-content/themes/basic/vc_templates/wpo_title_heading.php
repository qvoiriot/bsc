<?php
/*extract( shortcode_atts( array(
    'title'       => '',
    'title_align' => '',
    'descript'    => '',
    'size'        =>'',
    'font_color'  =>'',
    'el_class'    => ''
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

?>

<div class="widget widget-text-heading <?php echo esc_attr( $el_class ); ?>">
	<?php if($title!=''): ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($title_align.' '.$size.' '.$el_class ); ?>" style="<?php echo 'color:'.esc_attr($font_color);?>">
            <span><?php echo esc_html( $title ); ?></span>			
        </h3>
    <?php endif; ?>
	<?php if(trim($content)!=''){ ?>
		<p class="visual-description <?php echo esc_attr($title_align); ?>">			            
            <?php echo do_shortcode($content); ?>
		</p>
	<?php } ?>
</div>