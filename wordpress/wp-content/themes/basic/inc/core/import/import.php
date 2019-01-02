<?php

 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Wordpress Opal  Team <opalwordpress@gmail.com>
  * @copyright  Copyright (C) 2015 www.wpopal.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.wpopal.com
  * @support  http://www.wpopal.com/questions/
  */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PbrThemer_Import {

	/**
	 * @var String $messages 
	 */
	public $message;

	/**
	 * @var Boolean $attachments 
	 */
	public $attachments = false;

	/**
	 * @var String $theme 
	 */
    public $theme;


    /**
	 *  Constructor
	 */
	public function __construct() {
		
		define( 'PBR_THEMER_IMPORT_FOLDER', get_template_directory() . '/inc/import/'  );

		if( is_dir( PBR_THEMER_IMPORT_FOLDER ) ){
			 
			add_action('admin_menu', array(&$this, 'admin_import_page')); 
	        $this->theme = apply_filters( 'pbrthemer_import_theme', 'basic' );
	   
    	}

    	add_action( 'admin_init', array( $this, 'export_data') );
    	add_action( 'admin_init', array( $this, 'get_remote_data') );
	}
 	
 	public function get_remote_data(){
 		if( isset($_GET['doaction']) && $_GET['doaction'] == 'download' && isset($_GET['package']) ){
 			$remotes = apply_filters( 'pbrthemer_import_remote_demos', array() );  

 			$package = trim($_GET['package']);
 			if( isset($remotes[$package]) ){
 				
 				 $lpackage = PBR_THEMER_IMPORT_FOLDER.'demoa.zip'; 	 

 				$data = file_get_contents( $remotes[$package]['source'] );
				$file = fopen($lpackage, "w+");
				fputs($file, $data);
				fclose($file);


   				if( file_exists($lpackage) ){
   					WP_Filesystem();
   					unzip_file( $lpackage , PBR_THEMER_IMPORT_FOLDER );  
   				}
   				@unlink( $lpackage );
   				wp_redirect( admin_url('themes.php?page=pbrthemer_options_import_page') );
 			}
 		
 		}
 	}

 	public function export_data(){
 		if( isset($_GET['epxort_theme']) ){
 			// echo '<pre>'.print_r( "ha cong tien ", 1 );die ;

 			do_action( 'pbrthemer_export_theme_data' );
 		}
 	}	


 	public static function getInstance(){
 		static $_instance;
 		
 		if( !$_instance ){
 			$_instance = new PbrThemer_Import();
 		}

 		return $_instance;
 	}

 	/**
	 * Import Setting of Customizer
	 */
	public function import_customizer_options($file){

		$options = $this->get_file_content_unserialize($file);

		if (is_array($options)) {
			foreach ($options as $key => $val) {
				set_theme_mod( $key, $val );
			}
		}

		$this->message = __("Customizer options imported successfully", 'basic');
	}

	/**
	 * Import menu sample
	 */
	public function import_menus($file){
		global $wpdb;
		$pbrthemer_terms_table = $wpdb->prefix . "terms";
		$this->menus_data = $this->get_file_content_unserialize($file);



		$menu_array = array();
		foreach ($this->menus_data as $registered_menu => $menu_slug) {
			$term_rows = $wpdb->get_results("SELECT * FROM $pbrthemer_terms_table where slug='{$menu_slug}'", ARRAY_A);
			if(isset($term_rows[0]['term_id'])) {
				$term_id_by_slug = $term_rows[0]['term_id'];
			} else {
				$term_id_by_slug = null;
			}
			$menu_array[$registered_menu] = $term_id_by_slug;
		}

		set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );

	}

	/**
	 * Import Page Options
	 */
	public function import_page_options($file){
		$pages = $this->get_file_content_unserialize($file);

		foreach($pages as $pbrthemer_page_option => $pbrthemer_page_id){
			update_option( $pbrthemer_page_option, $pbrthemer_page_id);
		}
	}

	public function import_theme_options($file){
		$pages = $this->get_file_content_unserialize($file);
	 
		if( $pages ){
			update_option( 'wpo_theme_options', $pages );
		}
	}
	/**
	 * Import data sample from xml.
	 */
	public function import_content($file){

		if (!class_exists('WP_Importer')) {
			
			ob_start();
            
            require_once('class.wordpress-importer.php');
			
			$pbrthemer_import = new WP_Import();

			set_time_limit(0);

			$path = PBR_THEMER_IMPORT_FOLDER . $file;
			 
			$pbrthemer_import->fetch_attachments = $this->attachments;
			$returned_value = $pbrthemer_import->import($path);

            echo $returned_value;
            die();

			if(is_wp_error($returned_value)){
				$this->message = __("An Error Occurred During Import", 'basic');
			}
			else {
				$this->message = __("Content imported successfully", 'basic');
			}
			ob_get_clean();
		} else {
			$this->message = __("Error loading files", 'basic');
		}
		return ;
	}

	/**
	 * Import Widget and content
	 */
	public function import_widgets( $file ){
 
		$options = $this->get_file_content_unserialize($file);
 
		if( $options['widgets'] ){
			foreach ( (array) $options['widgets'] as $pbrthemer_widget_id => $pbrthemer_widget_data ) {
				update_option( 'widget_' . $pbrthemer_widget_id, $pbrthemer_widget_data );
			}

			$this->import_sidebars_widgets($file);
		}
		$this->message = __("Widgets imported successfully", 'basic');
	}

	/**
	 * Import widget with data nad logic
	 */
	public function import_widget_logic($file) {

		$file_path = PBR_THEMER_IMPORT_FOLDER . '/' . $file;

		if (file_exists($file_path)) {
			global $wl_options;

			$import = split("\n", file_get_contents($file_path, false));

			if (trim(array_shift($import))=="[START=WIDGET LOGIC OPTIONS]" && trim(array_pop($import))=="[STOP=WIDGET LOGIC OPTIONS]")
			{	
				foreach ( $import as $import_option )
				{	list($key, $value)=split("\t",$import_option);
					$wl_options[$key]=json_decode($value);
				}
			}

			update_option('widget_logic', $wl_options);
		}
	}

	/**
	 * Import Widget to sidebars
	 */
	public function import_sidebars_widgets( $file ){ 

		$pbrthemer_sidebars = get_option("sidebars_widgets");
		
		unset($pbrthemer_sidebars['array_version']);
		
		$data = $this->get_file_content_unserialize($file);
		
		if ( is_array($data['sidebars']) ) {
			$pbrthemer_sidebars = array_merge( (array) $pbrthemer_sidebars, (array) $data['sidebars'] );
			
			unset($pbrthemer_sidebars['wp_inactive_widgets']);
			
			$pbrthemer_sidebars = array_merge(array('wp_inactive_widgets' => array()), $pbrthemer_sidebars);
			$pbrthemer_sidebars['array_version'] = 2;
			wp_set_sidebars_widgets($pbrthemer_sidebars);
		}
	}

	/**
	 * Import data to revolutions
	 */
	public function import_rev_slider($demo) {
		if ( ! class_exists( 'RevSliderAdmin' ) ) {
			require( RS_PLUGIN_PATH . '/admin/revslider-admin.class.php' );			
		}

		$rev_files = glob( PBR_THEMER_IMPORT_FOLDER . $demo . '/rev_sliders/*.zip' );

		if (!empty($rev_files)) {
			foreach ($rev_files as $rev_file) {
				$_FILES['import_file']['error'] = UPLOAD_ERR_OK;
				$_FILES['import_file']['tmp_name']= $rev_file;

				$slider = new RevSlider();
				$slider->importSliderFromPost( true, 'none' );
			}
		}
	}

	/**
	 * Import Visual Composer Templates
	 */
	public function import_vc_templates($file){
		if (!class_exists('WP_Importer')) {
			ob_start();
            require_once('class.wordpress-importer.php');
			$pbrthemer_import = new WP_Import();
			set_time_limit(0);
			$path = PBR_THEMER_IMPORT_FOLDER . $file;

			$pbrthemer_import->fetch_attachments = $this->attachments;
			$returned_value = $pbrthemer_import->import($path);

            echo $returned_value;
            die();

			if(is_wp_error($returned_value)){
				$this->message = __("An Error Occurred During Import", 'basic');
			}
			else {
				$this->message = __("Content imported successfully", 'basic');
			}
			ob_get_clean();
		} else {
			$this->message = __("Error loading files", 'basic');
		}
	}

	/**
	 * Get content inside file with unserialize and decode 64
	 */
	public function get_file_content_unserialize( $file ){
		$file_content = "";
		$file_for_import = PBR_THEMER_IMPORT_FOLDER . $file;
		if ( file_exists($file_for_import) ) {
			$file_content = $this->get_file_contents($file_for_import);
		} else {
			$this->message = __("File doesn't exist", 'basic');
		}
		if ($file_content) {
			$unserialized_content = unserialize(base64_decode($file_content));
			if ($unserialized_content) {
				return $unserialized_content;
			}
		}
		return false;
	}

	/**
	 *  Get content inside file with json
	 */
	public function get_file_content_json($file) {
		$file_content = "";
		$file_for_import = PBR_THEMER_IMPORT_FOLDER . $file;
		if ( file_exists($file_for_import) ) {
			$file_content = $this->get_file_contents($file_for_import);
		} else {
			$this->message = __("File doesn't exist", 'basic');
		}

		if ($file_content) {
			return json_decode($file_content, true);
		}

		return false;
	}

	/**
	 * get file content
	 */
	public function get_file_contents( $path ) {
		$pbrthemer_content = '';
		if ( function_exists('realpath') )
			{$filepath = realpath($path);}
		if ( !$filepath || !@is_file($filepath) )
			{return '';}

		if( ini_get('allow_url_fopen') ) {
			$pbrthemer_file_method = 'fopen';
		} else {
			$pbrthemer_file_method = 'file_get_contents';
		}
		if ( $pbrthemer_file_method == 'fopen' ) {
			$pbrthemer_handle = fopen( $filepath, 'rb' );

			if( $pbrthemer_handle !== false ) {
				while (!feof($pbrthemer_handle)) {
					$pbrthemer_content .= fread($pbrthemer_handle, 8192);
				}
				fclose( $pbrthemer_handle );
			}
			return $pbrthemer_content;
		} else {
			return file_get_contents($filepath);
		}
	}

	/**
	 * Add Import Page Menu to Sidebar Menu in Admin Page.
	 */
	public function admin_import_page() {

		$theme = wp_get_theme();
		$this->pagehook = add_submenu_page( 'themes.php',  __( 'WpOpal Import', 'basic'), esc_html__( 'WpOpal Import', 'basic'), 'manage_options', 'pbrthemer_options_import_page', array(&$this, 'render_admin_import_page'),'dashicons-download');

	}

	/**
	 * Render content of the import page
	 */
	public function render_admin_import_page() {
		$theme = wp_get_theme();
		
		$remotes = apply_filters( 'pbrthemer_import_remote_demos', array() );  
        $demos = apply_filters( 'pbrthemer_import_demos', array() );
        $types = apply_filters( 'pbrthemer_import_types', array() );

     
		?>
        <div class="wrap">
            <h2 class="pbrthemerf-page-title"><?php echo $theme->Name . __(' - One-Click Import', 'basic') ?></h2>
          
			
            <form method="post" action="" id="importContentForm">
                <table class="form-table">
                	<?php if( $remotes  ){ ?>
                	<tr>
                		<td colspan="2">
                			
                			<div class="update-nag">
				                <?php _e( "Click to the follow buttons to get sample demo from our live sites, the package will put into THEME/inc/import folder.<br> Or you can copy the demo package from the downloadable you purchased. <br> Please make sure this folder has writeable permision", 'basic');?>
							</div> 
							<?php 
							if( !is_writable(PBR_THEMER_IMPORT_FOLDER) ){ ?><br>
							<div class="update-nag clearfix clear">
				                <?php _e( "THEME/inc/import folder is not writeable", 'basic');?>
							</div> 
							<?php }
							?>
                		</td>	
                	</tr>	
                	 <tr>
                        <th class="row"><?php _e( 'Get Demo From Live Server', 'basic') ?></th>
                        <td>
                           <ul> 
                           	<?php foreach( $remotes as  $remote ){ ?>
                           	<li><a class="button button-primary" href="<?php echo admin_url( 'themes.php?page=pbrthemer_options_import_page', 'http' ); ?>&package=<?php echo $remote['name'];?>&doaction=download"><?php echo $remote['name'];?> Sampe</a> </li>
                           	<?php } ?>
                           </ul>	
                        </td>
                    </tr>
                    <?php } ?>
                
                    <?php if( $demos ){ ?>
                   <tr>
                    	<td colspan="2">
	            		 	 <div class="update-nag">
				                <?php _e( "Please wait when the import is running! It will take time needed to download all attachments from demo web site.", 'basic');?>
							</div>

                    	</td>
                    </tr>	
                    <tr>
                        <th class="row"><?php _e( 'Demo Source', 'basic') ?></th>
                        <td>
                            <select name="demo_source" id="demo_source">
                                <?php foreach ( $demos as $key => $name ) : ?>
                                <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="row"><?php _e( 'Import Type', 'basic') ?></th>
                        <td>
                            <select name="import_type" id="import_type">
                                <option value=""><?php _e( "Please Select ", 'basic'); ?></option>
                                <?php foreach ( $types as $key => $name ) : ?>
                                <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                    	<th class="row">&nbsp;</th>
                    	<td>
                    	    <p class="submit">
                    	        <input type="submit" name="submit" id="import" class="button button-primary" value="<?php _e( 'Import', 'basic') ?>">
                    	        <span class="spinner" style="float: none;"></span>
                    	    </p>
						</td>
					</tr>
					<?php }  ?> 

					<?php 
					if( empty($demos)  ){
					?>
					<tr>
                    	<td colspan="2">
	            		 	 <div class="update-nag">
				                <?php _e( "This theme has not any package ready for installing demo.", 'basic');?>
							</div>

                    	</td>
                    </tr>	
					<?php } ?>
                </table>
            </form>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var attachmentImport = true,
                    $importBtn = $('#import');

				function pbrthemer_import_successfull() {
					$importBtn
						.prop('disabled', false)
						.next('.spinner')
                            .removeClass('is-active');

					alert('Import is successful!');
				}

                $importBtn.on('click', function(e) {
                    e.preventDefault();

					var import_type = $( "#import_type" ).val(),
						demo_source = $( "#demo_source" ).val();

					if (!import_type) {
						alert( '<?php _e("Please choose import type!", 'basic');?>' );
						return false;
					}

                    if ( confirm('<?php _e("Do you want to import demo now?", 'basic'); ?>') ) {
						
						$importBtn
                            .prop('disabled', true)
	                        .next('.spinner')
	                            .addClass('is-active')

	                    var $action = 'pbrthemer_'+import_type+'Import';   

	                    if( import_type == 'all' ){
	                    	$.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'pbrthemer_contentImport',
                                    xml: 'content.xml',
                                    demo_source: demo_source,
                                    ajax:1,
                                    import_attachments: (attachmentImport ? 1 : 0)
                                },
                                success: function (data, textStatus, XMLHttpRequest){
									$.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'pbrthemer_metaImport',
                                            demo_source: demo_source
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            pbrthemer_import_successfull();
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                        }
                                    });
                                },
                                error: function (MLHttpRequest, textStatus, errorThrown){
                                }
                            });
	                    }  else { 
		                    $.ajax({
	                            type: 'POST',
	                            url: ajaxurl,
	                            data: {
	                                action: $action,
	                                xml: 'content.xml',
	                                demo_source: demo_source,
	                                ajax:1,
	                                import_attachments: (attachmentImport ? 1 : 0)
	                            },
	                            success: function (data, textStatus, XMLHttpRequest){
	                                pbrthemer_import_successfull();
	                            },
	                            error: function (MLHttpRequest, textStatus, errorThrown){
	                            }
	                        });
	                    }    
                    }

                    return false;

                });
            });
        </script>
        </div>
     
    <?php	}
}

PbrThemer_Import::getInstance();

require_once( dirname(__FILE__).'/ajax.php' );