<?php

	class WPO_Shortcode_Raw_html extends WPO_Shortcode_Base{

		public function __construct( ){
			// add hook to convert shortcode to html.
			$this->name = str_replace( 'wpo_shortcode_','',strtolower( __CLASS__ ) );
			$this->key = 'wpo_'.$this->name;
			$this->excludedMegamenu = true;
			add_shortcode( $this->key  ,  array($this,'render') );
	 
			parent::__construct( );
		}

		/**
		 * $data format is object field of megamenu_widget record.
		 */
		public function getButton( $data=null ){
			$button = array(
				'icon'	 => 'raw_html',
				'title' => __( 'Raw HTML Code' , 'basic'),
				'desc'  => __( 'Display HTML CODE' , 'basic'),
				'name'  => $this->name
			);

			return $button;
		}

		public function getOptions( ){
		    $this->options[] = array(
		        'label' 	=> __('Raw HTML Code', 'basic'),
		        'id' 		=> 'raw_html',
		        'type' 		=> 'textarea',
		        'explain'	=> __( 'Put your html code here', 'basic' ),
		        'default'	=> '',
		        'hint'		=> '',
		        );

		    $this->options[] = array(
		        'label' 	=> __('Addition Class', 'basic'),
		        'id' 		=> 'class',
		        'type' 		=> 'text',
		        'explain'	=> __( 'Using to make own style', 'basic' ),
		        'default'	=> '',
		        'hint'		=> '',
	        );
		}

		public function render( $attrs, $content="" ){
			return '<div>'.$attrs['style'].'</div>';
		}
	}
?>