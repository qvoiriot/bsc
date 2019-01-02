<?php
$output = $title = $el_class = $open = $css_animation = '';
extract(shortcode_atts(array(
    'title' => __("Click to toggle", 'basic'),
    'el_class' => '',
    'open' => 'false',
    'css_animation' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$open = ( $open == 'true' ) ? ' wpb_toggle_title_active' : '';
$el_class .= ( $open == ' wpb_toggle_title_active' ) ? ' wpb_toggle_open' : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_toggle panel-heading panel-toggle-heading' . $open, $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);

$output .= apply_filters('wpb_toggle_heading', '<div class="panel-group"><div class="panel panel-default panel-toggle"><h4 class="'.esc_attr($css_class).'">'.esc_html( $title ).'</h4>', array('title'=>$title, 'open'=>$open));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_toggle_content panel-body panel-toggle-body' . $el_class, $this->settings['base'], $atts );
$output .= '<div class="'.esc_attr( $css_class ).'">'.wpb_js_remove_wpautop($content, true).'</div></div></div>'.$this->endBlockComment('toggle')."\n";

echo $output;