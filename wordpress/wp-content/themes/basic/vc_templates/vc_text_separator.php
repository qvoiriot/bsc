<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title_align
 * @var $el_width
 * @var $style
 * @var $title
 * @var $align
 * @var $color
 * @var $accent_color
 * @var $el_class
 * @var $layout
 * @var $border_width
 * Shortcode class
 * @var $this WPBakeryShortcode_Vc_Text_Separator
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class = 'vc_separator wpb_content_element';

//$el_width = "90";
//$style = 'double';
//$title = '';
//$color = 'blue';

$class .= ($title_align!='') ? ' vc_'.$title_align : '';
$class .= ($el_width!='') ? ' vc_el_width_'.$el_width : ' vc_el_width_100';
$class .= ($style!='') ? ' vc_sep_'.$style : '';
if( $color!= '' && 'custom' != $color ) {
	$class .= ' vc_sep_color_' . $color;
}
$inline_css = ( 'custom' == $color && $accent_color!='') ? ' style="'.vc_get_css_color('border-color', $accent_color).'"' : '';

$class .= $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

?>
<div class="widget widget-text-separator <?php echo esc_attr(trim($css_class)); ?>">
	<span class="vc_sep_holder vc_sep_holder_l"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
	<?php if($title!=''): ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($title_align.' '.$size); ?>">
            <span><?php echo esc_html( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <?php if(trim($descript)!=''){ ?>
        <p class="visual-description">
            <?php echo $descript; ?>
        </p>
    <?php } ?>
	<span class="vc_sep_holder vc_sep_holder_r"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
</div>
<?php echo $this->endBlockComment( $this->getShortcode() ) . "\n";