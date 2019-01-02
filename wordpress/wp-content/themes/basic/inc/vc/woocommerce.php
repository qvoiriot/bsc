<?php  
	/**
	 * wpo_productcategory
	 */
	global $wpdb;
	$sql = $wpdb->prepare( "
		SELECT a.name,a.slug,a.term_id 
		FROM {$wpdb->terms} a JOIN  {$wpdb->term_taxonomy} b ON (a.term_id= b.term_id ) 
		WHERE b.count> %d and b.taxonomy = %s",
		0,'product_cat' );
	$results = $wpdb->get_results($sql);
	$value = array();
	foreach ($results as $vl) {
		$value[$vl->name] = $vl->slug;
	}

	$product_layout = array('Grid'=>'grid','List'=>'list','Carousel'=>'carousel');
	$product_type = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
	$product_columns = array(6,4, 3, 2, 1);
	$show_tab = array(
	                array('recent', __('Latest Products', 'basic')),
	                array( 'featured_product', __('Featured Products', 'basic' )),
	                array('best_selling', __('BestSeller Products', 'basic' )),
	                array('top_rate', __('TopRated Products', 'basic' )),
	                array('on_sale', __('Special Products', 'basic' ))
	            );

	vc_map( array(
	    "name" => __("WPO Product Category",'basic'),
	    "base" => "wpo_productcategory",
	    "class" => "",
	    "category" =>__("Opal Widgets",'basic'),
	    "params" => array(
	    	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Category', 'basic'),
				"param_name" => "category",
				"value" =>$value,
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",'basic'),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'basic'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'basic'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'basic')
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",'basic'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_productcategory', ('wpo_vc_shortcode_render') );



	/**
	* wpo_category_filter
	*/
	$cats = array();
	$query = $wpdb->prepare( "
		SELECT a.name,a.slug,a.term_id 
		FROM {$wpdb->terms} a JOIN  {$wpdb->term_taxonomy} b ON (a.term_id= b.term_id ) 
		WHERE b.count>%d and b.taxonomy = %s and b.parent = %d",
		 0, 'product_cat',0 );
	$categories = $wpdb->get_results($query);
	foreach ($categories as $category) {
		$cats[$category->name] = $category->term_id;
	}

	vc_map( array(
			"name"     => __("WPO Product Categories Filter",'basic'),
			"base"     => "wpo_category_filter",
			"class"    => "",
			"category" => __('Opal Widgets', 'basic'),
			"params"   => array(

			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Category', 'basic'),
				"param_name" => "term_id",
				"value" =>$cats,
				"admin_label" => true,
				"description" => 'Select category parent',
			),

			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories (190px x 190px)", 'basic'),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', 'basic' )
			),

			array(
				"type"       => "textfield",
				"heading"    => __("Thumbnail size",'basic'),
				"param_name" => "thumbnail_size",
				"value"      => '',
				'description' => __('Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) .', 'basic')
			),

			array(
				"type"       => "textfield",
				"heading"    => __("Number of categories to show",'basic'),
				"param_name" => "number",
				"value"      => '5'
			),

			array(
				"type"        => "textfield",
				"heading"     => __("Extra class name",'basic'),
				"param_name"  => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_category_filter', ('wpo_vc_shortcode_render')  );



	/**
	 * wpo_products
	 */
	vc_map( array(
	    "name" => __("WPO Products",'basic'),
	    "base" => "wpo_products",
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'basic'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => ''
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
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),
	    	array(
				"type" => "dropdown",
				"heading" => __("Type",'basic'),
				"param_name" => "type",
				"value" => $product_type,
				"admin_label" => true,
				"description" => __("Select columns count.",'basic')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",'basic'),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'basic'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'basic')
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'basic'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_products', ('wpo_vc_shortcode_render')  );

	/**
	 * wpo_all_products
	 */
	vc_map( array(
	    "name" => __("WPO Products Tabs",'basic'),
	    "base" => "wpo_all_products",
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'basic'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => ''
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
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align left', 'basic' ) => 'separator_align_left',
					__( 'Align center', 'basic' ) => 'separator_align_center',
					__( 'Align right', 'basic' ) => 'separator_align_right'
				)
			),
			array(
	            "type" => "sorted_list",
	            "heading" => __("Show Tab", 'basic'),
	            "param_name" => "show_tab",
	            "description" => __("Control teasers look. Enable blocks and place them in desired order.", 'basic'),
	            "value" => "recent,featured_product,best_selling",
	            "options" => $show_tab
	        ),
	        array(
				"type" => "dropdown",
				"heading" => __("Style",'basic'),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'basic'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'basic'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'basic')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'basic')
			)
	   	)
	));

	/**
	 * wpo_brands
	 */
	vc_map( array(
	    "name" => __("WPO Brands", 'basic' ),
	    "base" => "wpo_brands",
	    "class" => "",
	    "category" => __('Opal Widgets', 'basic'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'basic'),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of brands to show",'basic'),
				"param_name" => "number",
				"value" => '6'
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",'basic'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'basic'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'basic')
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render')  );

?>