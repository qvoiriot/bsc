<?php

	/*********************************************************************************************************************
	 *  Portfolio
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Portfolio",'basic'),
	    "base" => "wpo_portfolio",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Portfolio',
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),

	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', 'basic' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),

			array(
				"type" => "textarea",
				'heading' => __( 'Description', 'basic' ),
				"param_name" => "descript",
				"value" => ''
		    ),

			array(
				"type" => "textfield",
				"heading" => __("Number of portfolio to show", 'basic'),
				"param_name" => "number",
				"value" => '6'
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Columns count', 'basic' ),
				'param_name' => 'columns_count',
				'value' => array( 6, 4, 3, 2, 1 ),
				'std' => 3,
				'admin_label' => true,
				'description' => __( 'Select columns count.', 'basic' )
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_portfolio', ('wpo_vc_shortcode_render') );


	/**********************************************************************************************************************
	 * Testimonials
	 **********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Testimonials",'basic'),
	    "base" => "wpo_testimonials",
	    'description'=> __('Play Testimonials In Carousel', 'basic'),
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => '',
					"admin_label" => true
			),

	    	array(
                'type' => 'dropdown',
                'heading' => __( 'Title font size', 'basic' ),
                'param_name' => 'size',
                'value' => array(
                    __( 'Large', 'basic' ) => 'font-size-lg',
                    __( 'Medium', 'basic' ) => 'font-size-md',
                    __( 'Small', 'basic' ) => 'font-size-sm',
                    __( 'Extra small', 'basic' ) => 'font-size-xs'
                )
            ),

            array(
                'type' => 'dropdown',
                'heading' => __( 'Title Alignment', 'basic' ),
                'param_name' => 'alignment',
                'value' => array(
                    __( 'Align left', 'basic' ) => 'separator_align_left',
                    __( 'Align center', 'basic' ) => 'separator_align_center',
                    __( 'Align right', 'basic' ) => 'separator_align_right'
                )
            ),

			array(
				"type" => "dropdown",
				"heading" => __("Skin", 'basic'),
				"param_name" => "skin",
				"value" => array('Skin 1'=>'skin-1','Skin 2'=>'skin-2','Skin 3'=>'skin-3','Skin 4'=>'skin-4'),
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'basic')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_testimonials', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Brands Carousel
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Brands Carousel",'basic'),
	    "base" => "wpo_brands",
	    'description'=>'Show Brand Logos, Manufacture Logos',
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				"type" => "textarea",
				"heading" => __('Description', 'basic'),
				"param_name" => "descript",
				"value" => ''
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', 'basic' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),

			array(
				"type" => "dropdown",
				"heading" => __("Brand Columns", 'basic'),
				"param_name" => "brand_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 4
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Link Target', 'basic' ),
				'param_name' => 'brand_link_target',
				'value' => array(
					__( 'Same window', 'basic' ) => '_self',
					__( 'New window', 'basic' ) => "_blank",
				),
				'std' => '_blank',
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon", 'basic'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	 * Pricing Table
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Pricing",'basic'),
	    "base" => "wpo_pricing",
	    "description" => __('Make Plan for membership', 'basic' ),
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Price", 'basic'),
				"param_name" => "price",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Currency", 'basic'),
				"param_name" => "currency",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Period", 'basic'),
				"param_name" => "period",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Subtitle", 'basic'),
				"param_name" => "subtitle",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "dropdown",
				"heading" => __("Is Featured", 'basic'),
				"param_name" => "featured",
				'value' 	=> array(  __('No', 'basic') => 0,  __('Yes', 'basic') => 1 ),
			),

			array(
				"type" => "dropdown",
				"heading" => __("Box Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'boxed' => __('pricing-boxed', 'basic'), 'label' => __('pricing-label', 'basic') , 'table' => __('pricing-table', 'basic') ),
			),

			array(
				"type" => "textarea_html",
				"heading" => __("Content", 'basic'),
				"param_name" => "content",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),

			array(
				"type" => "textfield",
				"heading" => __("Link Title", 'basic'),
				"param_name" => "linktitle",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Link", 'basic'),
				"param_name" => "link",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_pricing', ('wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
	    "name" => __("WPO Our Team Grid Style",'basic'),
	    "base" => "wpo_team",
	    "class" => "",
	    "description" => 'Show Personal Profile Info',
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "attach_image",
				"heading" => __("Photo", 'basic'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'basic' ),
                'param_name' => 'thumbnail_size',
                'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
            ),            
			array(
				"type" => "textfield",
				"heading" => __("Job", 'basic'),
				"param_name" => "job",
				"value" => 'CEO',
				'description'	=>  ''
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),
			array(
				"type" => "textfield",
				"heading" => __("Phone", 'basic'),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Google Plus", 'basic'),
				"param_name" => "google",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", 'basic'),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", 'basic'),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Pinterest", 'basic'),
				"param_name" => "pinterest",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", 'basic'),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('our-team-circle', 'basic'), 'vertical' => __('our-team-vertical', 'basic') , 'horizontal' => __('our-team-horizontal', 'basic') ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_team', ('wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
		"name" => __("WPO Our Team List Style",'basic'),
		"base" => "wpo_team_list",
		"class" => "",
		"description" => __('Show Info In List Style', 'basic'),
		"category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
            array(
                "type" => "textfield",
                "heading" => __("Job", 'basic'),
                "param_name" => "job",
                "value" => '',
                    "admin_label" => true
            ),
			array(
				"type" => "attach_image",
				"heading" => __("Photo", 'basic'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'basic' ),
                'param_name' => 'thumbnail_size',
                'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
            ),
			array(
				"type" => "textfield",
				"heading" => __("Phone", 'basic'),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textarea",
				"heading" => __("information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),
			array(
				"type" => "textarea",
				"heading" => __("blockquote", 'basic'),
				"param_name" => "blockquote",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Email", 'basic'),
				"param_name" => "email",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", 'basic'),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", 'basic'),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", 'basic'),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'basic'), 'vertical' => __('vertical', 'basic') , 'horizontal' => __('horizontal', 'basic') ),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)

	   	)
	));
	add_shortcode( 'wpo_team_list', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Info Box
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Info Box",'basic'),
	    "base" => "wpo_inforbox",
	    "class" => "",
	    "description"=> __( 'Show header, text in special style', 'basic'),
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value'      => array(
					__( 'Large', 'basic' )       => 'font-size-lg',
					__( 'Medium', 'basic' )      => 'font-size-md',
					__( 'Small', 'basic' )       => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title Alignment', 'basic' ),
				'param_name' => 'title_align',
				'value'      => array(
				__( 'Align left', 'basic' )   => 'separator_align_left',
				__( 'Align center', 'basic' ) => 'separator_align_center',
				__( 'Align right', 'basic' )  => 'separator_align_right'
				)
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),
			array(
				"type" => "attach_image",
				"heading" => __("Backgroup Image", 'basic'),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "colorpicker",
				"heading" => __("Background Color", 'basic'),
				"param_name" => "colorbg",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_inforbox', ('wpo_vc_shortcode_render') );



	/*********************************************************************************************************************
	 *  Our Service
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Our Service",'basic'),
	    "base" => "wpo_service",
	    "description"=> __('Decreale Service Info', 'basic'),
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'basic' ),
				'param_name'                     => 'title_align',
				'value'                          => array(
				__( 'Align left', 'basic' )   => 'separator_align_left',
				__( 'Align center', 'basic' ) => 'separator_align_center',
				__( 'Align right', 'basic' )  => 'separator_align_right'
				)
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'basic'),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
			),

			array(
				"type" => "attach_image",
				"heading" => __("Photo", 'basic'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),

            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'basic' ),
                'param_name' => 'thumbnail_size',
                'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
            ),

			array(
				"type" => "textarea",
				"heading" => __("information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'basic' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'basic'), 'vertical' => __('vertical', 'basic') , 'horizontal' => __('horizontal', 'basic'), 'author' => __('author', 'basic') ),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_service', ('wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	 *  What To Do
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO What To Do",'basic'),
	    "base" => "wpo_whattodo",
	    "class" => "",
	    "description"=> __('Decreale todo info', 'basic'),
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'basic' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'basic' )   => 'separator_align_left',
				__( 'Align center', 'basic' ) => 'separator_align_center',
				__( 'Align right', 'basic' )  => 'separator_align_right'
				)
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'basic'),
				"param_name" => "icon",
				"value" => 'fa-desktop',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),
			array(
				"type" => "attach_image",
				"heading" => __("Backgroup Image", 'basic'),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),

            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'basic' ),
                'param_name' => 'thumbnail_size',
                'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
            ),

			array(
				"type" => "colorpicker",
				"heading" => __("Background Color", 'basic'),
				"param_name" => "colorbg",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'basic'), 'vertical' => __('vertical', 'basic') , 'horizontal' => __('horizontal', 'basic') ),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_whattodo', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  WPO Counter
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Counter",'basic'),
	    "base" => "wpo_counter",
	    "class" => "",
	    "description"=> __('Counting number with your term', 'basic'),
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Number", 'basic'),
				"param_name" => "number",
				"value" => ''
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'basic'),
				"param_name" => "icon",
				"value" => 'fa-desktop',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", 'basic'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', 'basic' )
			),

			array(
				"type" => "colorpicker",
				"heading" => __("Icon Color", 'basic'),
				"param_name" => "color",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'basic'), 'vertical' => __('vertical', 'basic') , 'horizontal' => __('horizontal', 'basic') ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	 



	/*********************************************************************************************************************
	 *  Mega Posts
	 *********************************************************************************************************************/

	function parramMegaLayout($settings,$value){
		$dependency = vc_generate_dependencies_attributes($settings);
		ob_start();
		?>
			<div class="layout_images">
				<?php foreach ($settings['layout_images'] as $key => $image) {
					echo '<img src="'.esc_url($image).'" data-layout="'.esc_attr($key).'" class="'.esc_attr($key).' '.(($key==$value)?'active':'').'">';
				} ?>
			</div>
			<input 	type="hidden"
					name="<?php echo $settings['param_name']; ?>"
					class="layout_image_field wpb_vc_param_value wpb-textinput <?php echo esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field'; ?>"
					value="<?php echo esc_attr($value); ?>" <?php echo $dependency; ?>>
		<?php
		return ob_get_clean();
	}
	 

 
	$layout_image = array(
		__('Grid','basic')             => 'grid-1',
		__('List','basic')             => 'list',
		__('Grid By Categories','basic') => 'categories-posts',
	);


	vc_map( array(
		'name' => __( 'WPO Grid Posts', 'basic' ),
		'base' => 'wpo_gridposts',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', 'basic'),
		'description' => __( 'Post having news,managzine style', 'basic' ),
	 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'basic' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'basic' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'basic' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'basic' )   => 'separator_align_left',
				__( 'Align center', 'basic' ) => 'separator_align_center',
				__( 'Align right', 'basic' )  => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'basic' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'basic' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Layout Type", 'basic'),
				"param_name" => "layout",
				"layout_images" => $layout_image,
				"value" => $layout_image,
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'basic')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'basic'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'basic' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'basic' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'basic' )
			)
		)
	) );


	/**********************************************************************************
	 * Front Page Posts
	 **********************************************************************************/

	$layout = array(
		/*__('Split','basic') 	=> 'frontpage-1',
		__('Inline','basic') 	=> 'frontpage-2',*/
		__('Default','basic') 	=> 'frontpage-3',
	);


	vc_map( array(
		'name' => __( 'WPO FrontPage Posts', 'basic' ),
		'base' => 'wpo_frontpageposts',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', 'basic'),
		'description' => __( 'Create Post having blog styles', 'basic' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'basic' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'basic' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'basic' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'basic' )   => 'separator_align_left',
				__( 'Align center', 'basic' ) => 'separator_align_center',
				__( 'Align right', 'basic' )  => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'basic' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'basic' )
			),

			array(
				"type" => "dropdown",
				"heading" => __("Layout", 'basic' ),
				"param_name" => "layout",
				"value" => $layout,
				"std" => 'frontpage-1'
			),

			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'basic'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Image size main posts', 'basic' ),
				'param_name' => 'grid_thumb_size',
                "std" => '200x200',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'basic' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'basic' )
			)
		)
	) );
	/**********************************************************************************
	 * Mega Blogs
	 **********************************************************************************/
	vc_map( array(
		'name' => __( 'WPO Mega Blogs', 'basic' ),
		'base' => 'wpo_megablogs',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', 'basic'),
		'description' => __( 'Create Post having blog styles', 'basic' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'basic' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'basic' ),
				"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', 'basic' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'textarea',
				'heading' => __( 'Description', 'basic' ),
				'param_name' => 'descript',
				"value" => ''
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'basic' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 10 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'basic' )
			),

			array(
				"type" => "dropdown",
				"heading" => __("Layout", 'basic' ),
				"param_name" => "layout",
				"value" => array( __('Default', 'basic' ) => 'blog'  ,  __('Grid 1', 'basic' ) => 'style1' ,  __('Grid 2', 'basic' ) => 'style2', __('List', 'basic' ) => 'style3' ),
				"std" => 3
			),

			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'basic'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),


			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'basic' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'basic' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'basic' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'basic' )
			)
		)
	) );

	/* Heading Text Block
	---------------------------------------------------------- */
	vc_map( array(
		'name'        => __( 'WPO Title Heading','basic'),
		'base'        => 'wpo_title_heading',
		"class"       => "",
		"category"    => __('Opal Widgets', 'basic'),
		'description' => __( 'Create title for one block', 'basic' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'basic' ),
				'param_name' => 'title',
				'value'       => __( 'Title', 'basic' ),
				'description' => __( 'Enter heading title.', 'basic' ),
				"admin_label" => true
			),
			array(
			    'type' => 'colorpicker',
			    'heading' => __( 'Title Color', 'basic' ),
			    'param_name' => 'font_color',
			    'description' => __( 'Select font color', 'basic' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				),
				'description' => __( 'Select title font size.', 'basic' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Align', 'basic' ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align right', 'basic' ) => "separator_align_right"
				),
				'description' => __( 'Select title align.', 'basic' )
			),
			
            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'heading' => __( 'Text', 'basic' ),
                'param_name' => 'content',
                'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'basic' )
            ),

			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'basic' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'basic' )
			)
		),
	));
	add_shortcode( 'wpo_title_heading', ('wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	*  Reassuarence
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Reassuarence",'basic'),
	    "base" => "wpo_reassuarence",
	    "class" => "",
	    "description"=> __('Counting number with your term', 'basic'),
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', 'basic' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'basic' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'basic' ) => 'font-size-lg',
					__( 'Medium', 'basic' ) => 'font-size-md',
					__( 'Small', 'basic' ) => 'font-size-sm',
					__( 'Extra small', 'basic' ) => 'font-size-xs'
				)
			),


		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'basic'),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon Color", 'basic'),
				"param_name" => "color",
				"value" => 'black'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", 'basic'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', 'basic' )
			),

		 	array(
				"type" => "textarea",
				"heading" => __("Short Information", 'basic'),
				"param_name" => "description",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),


		 	array(
				"type" => "textarea_html",
				"heading" => __("Detail Information", 'basic'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','basic')
			),


			array(
				"type" => "dropdown",
				"heading" => __("Style", 'basic'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'basic'), 'vertical' => __('vertical', 'basic') , 'horizontal' => __('horizontal', 'basic') ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_reassuarence', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	*  Newsletter
	*********************************************************************************************************************/
	if(function_exists( 'mc4wp_get_forms')){
		$id_forms = mc4wp_get_forms();
		$data_forms = array();
		if($id_forms && is_array( $id_forms)){
			foreach($id_forms as $form){
				$name_form = ($form->name)? $form->name : 'Form-'.$form->ID;
				$data_forms[$name_form] = $form->ID;
			}
		}

		vc_map( array(
		    "name" => __("WPO Newsletter",'basic'),
		    "base" => "wpo_newsletter",
		    "class" => "",
		    "description"=> __('Show form newsletter', 'basic'),
		    "category" => __('Opal Widgets', 'basic'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => __("Title", 'basic'),
					"param_name" => "title",
					"value" => 'Newsletter',
					"admin_label" => true
				),

				array(
					"type" => "textarea",
					"heading" => __("Description", 'basic'),
					"param_name" => "description",
					"value" => '',
				),

				array(
					'type' => 'dropdown',
					"heading" => __("Select form", 'basic'),
					'param_name' => 'fomr_id',
					'value' => $data_forms,
					"description" => __("Changing layout style.", 'basic')
				),

				array(
					'type' => 'dropdown',
					"heading" => __("Layout Style", 'basic'),
					'param_name' => 'el_class',
					'value' => array(
						__( 'Style 1 (Default)', 'basic' ) => 'style-1',
						__( 'Style 2', 'basic' ) => 'style-2',
						__( 'Style 3', 'basic' ) => 'style-3'
					),
					"description" => __("Changing layout style.", 'basic')
				),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'basic'),
					"param_name" => "class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
				),
		   	)
		));
		add_shortcode( 'wpo_newsletter', ('wpo_vc_shortcode_render') );
	}

	/*********************************************************************************************************************
	*  Contact Info
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Contact Info",'basic'),
	    "base" => "wpo_contact_info",
	    "class" => "",
	    "description"=> __('Show Contact Information', 'basic'),
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'basic'),
				"param_name" => "title",
				"value" => 'Contact Info',
				"admin_label" => true
			),

            array(
                'type' => 'dropdown',
                'heading' => __( 'Title Alignment', 'basic' ),
                'param_name' => 'alignment',
                'value' => array(
                    __( 'Align left', 'basic' ) => 'separator_align_left',
                    __( 'Align center', 'basic' ) => 'separator_align_center',
                    __( 'Align right', 'basic' ) => 'separator_align_right'
                )
            ),

            array(
                'type' => 'dropdown',
                'heading' => __( 'Title font size', 'basic' ),
                'param_name' => 'size',
                'value' => array(
                    __( 'Large', 'basic' ) => 'font-size-lg',
                    __( 'Medium', 'basic' ) => 'font-size-md',
                    __( 'Small', 'basic' ) => 'font-size-sm',
                    __( 'Extra small', 'basic' ) => 'font-size-xs'
                )
            ),

			array(
				"type" => "textarea",
				"heading" => __("Description", 'basic'),
				"param_name" => "description",
				"value" => '',
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon company", 'basic'),
				"param_name" => "icon_company",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )								
			),

			array(
				"type" => "textfield",
				"heading" => __("Company", 'basic'),
				"param_name" => "company",
				"value" => '',
				"admin_label" => true
			),	

            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'heading' => __( 'Text', 'basic' ),
                'param_name' => 'working_time',
                'value' => ''
            ),

			array(
				"type" => "textfield",
				"heading" => __("Icon country", 'basic'),
				"param_name" => "icon_country",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
			),

			array(
				"type" => "textfield",
				"heading" => __("Country", 'basic'),
				"param_name" => "country",
				"value" => '',
				"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon locality", 'basic'),
				"param_name" => "icon_locality",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Locality", 'basic'),
				"param_name" => "locality",
				"value" => '',
				"admin_label" => true
			),	

			array(
				"type" => "textfield",
				"heading" => __("Icon street", 'basic'),
				"param_name" => "icon_street",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Street", 'basic'),
				"param_name" => "street",
				"value" => '',
				"admin_label" => true
			),	

			array(
				"type" => "textfield",
				"heading" => __("Icon phone", 'basic'),
				"param_name" => "icon_phone",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Phone", 'basic'),
				"param_name" => "phone",
				"value" => '',
				"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon fax", 'basic'),
				"param_name" => "icon_fax",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Fax", 'basic'),
				"param_name" => "fax",
				"value" => '',
				"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon skype", 'basic'),
				"param_name" => "icon_skype",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Skype", 'basic'),
				"param_name" => "skype",
				"value" => '',
				"admin_label" => true
			),	

			array(
				"type" => "textfield",
				"heading" => __("Icon email", 'basic'),
				"param_name" => "icon_email",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Email Address", 'basic'),
				"param_name" => "email",
				"value" => '',
				"admin_label" => true
			),	

			array(
				"type" => "textfield",
				"heading" => __("Icon website url", 'basic'),
				"param_name" => "icon-website_url",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome', 'basic' )
								
								
			),

			array(
				"type" => "textfield",
				"heading" => __("Website URL", 'basic'),
				"param_name" => "website_url",
				"value" => '',
				"admin_label" => true
			),			


			array(
				'type' => 'dropdown',
				"heading" => __("Layout Style", 'basic'),
				'param_name' => 'el_class',
				'value' => array(
					__( 'Style 1 (Default)', 'basic' ) => 'style-1',
					__( 'Style 2', 'basic' ) => 'style-2',
					__( 'Style 3', 'basic' ) => 'style-3'
				),
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'basic')
			),
	   	)
	));
	add_shortcode( 'wpo_contact_info', ('wpo_vc_shortcode_render') );

?>