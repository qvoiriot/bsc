<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
require_once ( WPO_THEME_SUB_DIR . 'vc/pagebuilder.php' );

if (!class_exists('WPO_VisualComposer')) {

	class WPO_VisualComposer extends WPO_PageBuilder_Base{

		public function __construct(){
		parent::__construct();

			$this->loadThemeShortCode();
			//Edit Elements
			$this->elementTabItem();
			$this->elementButton();
			$this->elementColumn();
			$this->elementRow();
			$this->elementTitle();
		}

		/**
		 *
		 */
		private function loadThemeShortCode(){
			if( WPO_WOOCOMMERCE_ACTIVED ) {
				require_once( WPO_THEME_SUB_DIR.'vc/woocommerce.php');
			}
			require_once( WPO_THEME_SUB_DIR.'vc/theme.php' );
		}

		/**
		 *
		 */
		private function elementTitle(){
			vc_add_param( 'vc_text_separator', array(
				"type" => "textarea",
				"heading" => __("Description", 'basic'),
				"param_name" => "descript",
				"value" => ''
		    ));
		    vc_add_param( 'vc_pie', array(
				"type" => "textarea",
				"heading" => __("Description", 'basic'),
				"param_name" => "descript",
				"value" => ''
		    ));
		    vc_add_param( 'vc_text_separator', array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			));

            vc_add_param( 'vc_column_text', array(
                "type" => "textfield",
                "heading" => __("Title", 'basic'),
                "param_name" => "title",
                "value" => '',
                "admin_label" => true
            ));

            vc_add_param( 'vc_column_text', array(
                'type' => 'dropdown',
                'heading' => __( 'Title Alignment', 'basic' ),
                'param_name' => 'title_align',
                'value' => array(
                    __( 'Align left', 'basic' ) => 'separator_align_left',
                    __( 'Align center', 'basic' ) => 'separator_align_center',
                    __( 'Align right', 'basic' ) => 'separator_align_right'
                )
            ));

            vc_add_param( 'vc_column_text', array(
                'type' => 'dropdown',
                'heading' => __( 'Title font size', 'basic' ),
                'param_name' => 'size',
                'value' => array(
                    __( 'Large', 'basic' ) => 'font-size-lg',
                    __( 'Medium', 'basic' ) => 'font-size-md',
                    __( 'Small', 'basic' ) => 'font-size-sm',
                    __( 'Extra small', 'basic' ) => 'font-size-xs'
                )
            ));

		    vc_add_param( 'vc_posts_grid', array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', 'basic' ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
		    ));

			vc_add_param( 'vc_posts_grid', array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
		    ));
		}

		/**
		 *
		 */
		private function elementRow(){
		     vc_add_param( 'vc_row', array(
                "type" => "checkbox",
                "heading" => __("Parallax", 'basic'),
                "param_name" => "parallax",
                "value" => array(
                    'Yes, please' => true
                )
            ));
			
			vc_add_param( 'vc_row_inner', array(
                "type" => "checkbox",
                "heading" => __("Parallax", 'basic'),
                "param_name" => "parallax",
                "value" => array(
                    'Yes, please' => true
                )
            ));

		     vc_add_param( 'vc_row', array(
		         "type" => "checkbox",
		         "heading" => __("Is Boxed", 'basic'),
		         "param_name" => "isfullwidth",
		         "value" => array(
		         				__('Yes, please', 'basic') => true
		         			)
		    ));

		     vc_add_param( 'vc_row_inner', array(
		         "type" => "checkbox",
		         "heading" => __("Is Boxed", 'basic'),
		         "param_name" => "isfullwidth",
		         "value" => array(
		         				__('Yes, please', 'basic') => true
		         			)
		    ));

		}

		/**
		 *
		 */
		private function elementColumn(){
			$add_css_animation = array(
				"type" => "dropdown",
				"heading" => __("CSS Animation", 'basic'),
				"param_name" => "css_animation",
				"admin_label" => true,
				"value" => $this->cssAnimation,
				"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'basic')
			);
			vc_add_param('vc_column',$add_css_animation);
			vc_add_param('vc_column_inner',$add_css_animation);
		}
		

		/**
		 * Tab Item
		 */
		private function elementTabItem(){
			vc_add_param( 'vc_tab', array(
		         "type" => "textfield",
		         "heading" => __("Icon", 'basic'),
		         "param_name" => "tabicon",
		         "value" => ''
		    ));
		}

		/**
		 * Button
		 */
		private function elementButton(){
			// color
			$param = WPBMap::getParam('vc_button', 'color');
			$param['value'] = array(
								'Default'=>'btn-default',
								'Primary'=>'btn-success',
								'Success'=>'btn-success',
								'Info'=>'btn-warning',
								'Danger'=>'btn-danger',
								'Link'=>'btn-link'
							);
			$param['heading']='Type';
			WPBMap::mutateParam('vc_button', $param);

			// icon
			$param = WPBMap::getParam('vc_button', 'icon');
			$param['type']='textfield';
			$param['value']='';
			WPBMap::mutateParam('vc_button', $param);

			// size
			$param = WPBMap::getParam('vc_button', 'size');
			$param['value']= array(
								'Default'=>'',
								'Large'=>'btn-lg',
								'Small'=>'btn-sm',
								'Extra small'=>'btn-xs'
							);
			WPBMap::mutateParam('vc_button', $param);
		}

		/**
		 * Image Carousel
		 */

		private function elementImageCarousel(){
			$this->deleteParam('vc_images_carousel',array(
														'img_size',
														'onclick',
														'mode',
														'slides_per_view',
														'wrap',
														'partial_view',
														'speed',
														'autoplay'
													));
		}

		private function elementProgressBar(){
			$this->deleteParam('vc_progress_bar',array(
											'title',
											'units',
											'bgcolor',
											'custombgcolor',
											'options'
										));
		}

	}

	add_action( 'init', 'wpo_init_pagebuilder' );
	function wpo_init_pagebuilder(){
		new WPO_VisualComposer();
	}

}