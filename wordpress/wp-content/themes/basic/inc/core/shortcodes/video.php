<?php

	class WPO_Shortcode_Video extends WPO_Shortcode_Base{

		public function __construct( ){
			// add hook to convert shortcode to html.
			$this->name = str_replace( 'wpo_shortcode_','',strtolower( __CLASS__ ) );
			$this->key = 'wpo_'.$this->name;
			add_shortcode( $this->key  ,  array($this,'render') );
			parent::__construct( );
		}

		/**
		 * $data format is object field of megamenu_widget record.
		 */
		public function getButton( $data=null ){
			$button = array(
				'icon'	 => 'video',
				'title' => __( 'Video' , 'basic'),
				'desc'  => __( 'Embed Youtube/Vimeo Video' , 'basic'),
				'name'  => $this->name
			);
			return $button;
		}

		public function getOptions( ){
		    $this->options[] = array(
		        'label' 	=> __('Video Link', 'basic'),
		        'id' 		=> 'link',
		        'type' 		=> 'embed',
		        'explain'	=> __( 'Enter Vimeo Link or Youtube Here' , 'basic'),
		        'default'	=> '',
		        'hint'		=> '',
	        );
	        $this->options[] = array(
		        'label' 	=> __('Addition Class', 'basic'),
		        'id' 		=> 'class',
		        'type' 		=> 'text',
		        'explain'	=> __( 'Using to make own style' , 'basic'),
		        'default'	=> '',
		        'hint'		=> '',
	        );
		}

		public function render( $atts ){
			$class = ($atts['class']!='')?" ".$atts['class']:"";
			$output='
				<div class="embed-responsive embed-responsive-16by9'.$class.'">
					'.wp_oembed_get($atts["link"]).'
				</div>
			';
			return $output;
		}
	}
?>