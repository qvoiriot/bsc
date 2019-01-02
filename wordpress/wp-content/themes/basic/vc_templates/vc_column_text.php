<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass($el_class);
$_title = ($title) ? "\n\t".'<h3 class="widget-title '.esc_attr($title_align).' '.esc_attr($size).' '.esc_attr( $el_class ).'"><span>'.esc_html( $title ).'</span></h3>': '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'widget widget-text-column wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
$output .= "\n\t".'<div class="'.esc_attr( $css_class ).'">';
$output .= $_title;
$output .= "\n\t\t".'<div class="widget-content wpb_text_column_content widget-text-column--content">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content, true);
$output .= "\n\t\t".'</div> ' . $this->endBlockComment('.wpb_wrapper');
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $this->getShortcode() );

echo $output;