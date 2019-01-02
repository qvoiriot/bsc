<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

abstract class WPO_PageBuilder_Base{

	protected $cssAnimation;
	protected $textdomain;

	public function __construct(){

		add_filter( 'vc_shortcodes_css_class',array($this,'customColumnBuilder'),10,2);
		$this->textdomain = get_option( 'stylesheet' );
    	$this->textdomain = preg_replace("/\W/", "_", strtolower($this->textdomain) );

		$this->setValueCssAnimationInput();
		$this->updateCssAnimationInput();

	}



	protected function deleteParam($name,$element){
		if(is_array($element)){
			foreach ($element as $value) {
				vc_remove_param($name,$value);
			}
		}else{
			vc_remove_param($name,$element);
		}
	}

	public function customColumnBuilder($class_string,$tag){
		if ($tag=='vc_row' || $tag=='vc_row_inner') {
			$class_string = str_replace('vc_row-fluid', 'row', $class_string);
			$class_string = str_replace('wpb_row ', '', $class_string);
		}
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
			$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
			$class_string = preg_replace('/vc_col-(\w)/', 'col-$1', $class_string);
			$class_string = str_replace('wpb_column', '', $class_string);
			$class_string = str_replace('column_container', '', $class_string);
		}
		return $class_string;

	}


	/**
	 * override input CSS Animation
	 */
	private function updateCssAnimationInput(){
		$elements = array(
						'vc_column_text',
						'vc_single_image',
						'vc_message',
						'vc_toggle',
						'vc_single_image'
					);
		foreach ($elements as $value) {
			$param = WPBMap::getParam( $value , 'css_animation');
			$param['value']=$this->cssAnimation;
			WPBMap::mutateParam( $value , $param);
		}
	}

	private function setValueCssAnimationInput(){
		$this->cssAnimation = array(
			__("No", 'basic') => '',
			__("Top to bottom", 'basic') => "top-to-bottom",
			__("Bottom to top", 'basic') => "bottom-to-top",
			__("Left to right", 'basic') => "left-to-right",
			__("Right to left", 'basic') => "right-to-left",
			__("Appear from center", 'basic') => "appear",
			'bounce' => 'bounce',
			'flash' => 'flash',
			'pulse' => 'pulse',
			'rubberBand' => 'rubberBand',
			'shake' => 'shake',
			'swing' => 'swing',
			'tada' => 'tada',
			'wobble' => 'wobble',
			'bounceIn' => 'bounceIn',
			'fadeIn' => 'fadeIn',
			'fadeInDown' => 'fadeInDown',
			'fadeInDownBig' => 'fadeInDownBig',
			'fadeInLeft' => 'fadeInLeft',
			'fadeInLeftBig' => 'fadeInLeftBig',
			'fadeInRight' => 'fadeInRight',
			'fadeInRightBig' => 'fadeInRightBig',
			'fadeInUp' => 'fadeInUp',
			'fadeInUpBig' => 'fadeInUpBig',
			'flip' => 'flip',
			'flipInX' => 'flipInX',
			'flipInY' => 'flipInY',
			'lightSpeedIn' => 'lightSpeedIn',
			'rotateInrotateIn' => 'rotateIn',
			'rotateInDownLeft' => 'rotateInDownLeft',
			'rotateInDownRight' => 'rotateInDownRight',
			'rotateInUpLeft' => 'rotateInUpLeft',
			'rotateInUpRight' => 'rotateInUpRight',
			'slideInDown' => 'slideInDown',
			'slideInLeft' => 'slideInLeft',
			'slideInRight' => 'slideInRight',
			'rollIn' => 'rollIn'
		);
	}
}
