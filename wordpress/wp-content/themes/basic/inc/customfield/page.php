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
global $wp_registered_sidebars;
$meta_tabs = array(
        array(
            'id'    => 'wpo-config',
            'icon'  => 'fa-wrench',
            'title' => 'General'
        ),
        array(
            'id'    => 'option',
            'icon'  => 'fa-cogs',
            'title' => 'Template Option'
        )
    );

?>
<div id="wpo-post" class="wpo-metabox">
<!-- Nav tabs -->
    <?php $mb->getTabsConfig($meta_tabs); ?>

    <!--Genaral config -->
    <div class="wpo-meta-content active" id="wpo-config">
	<?php
		$layout = array('id' => 'page_layout', 'title' => 'Page Layout');
		$mb->selectLayout($layout);
	?>
	<div style="clear:both;"></div>
		<!--Select left sidebar-->
		<p class="wpo_section left-sidebar">
		    <?php $mb->the_field('left_sidebar'); ?>
    <?php 
    	$left_sidebars = array('id'=> 'left_sidebar','title'=>'Left Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-left');
        $mb->getSelectElement($left_sidebars);
    ?>
		</p>
		<!--Select right sidebar-->
		<p class="wpo_section right-sidebar">
    <?php 
        $right_sidebars = array('id'=> 'right_sidebar','title'=> 'Right Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-right');
        $mb->getSelectElement($right_sidebars); 
    ?>
		</p>
		<!--Select Layout-->
	    <p class="wpo_section">
			<?php
				$data_layout = array(
					array( 'id' => 'global', 'name' => 'Use Global'),
					array( 'id' => 'default', 'name' => 'Full width'),
					array( 'id' => 'boxed', 'name' => 'Boxed')
				);
				$layout = array(
		    		'id' => 'layout',
		    		'title' => 'Layout style',
		    		'data' => $data_layout,
		    		'default' => 'global'
				);
		    	$mb->getSelectElement( $layout );
			?>
		</p>

		<!--Select skins-->
	    <p class="wpo_section">
			<?php
				$skin =  wpo_cst_skins();
				$data_skin = array(array( 'id' => 'global', 'name' => 'Use Global'));
				foreach( $skin as $key=>$val){
					$data_skin[] = array('id'=> $key,'name' => $val);
				}
				$_skin = array(
		    		'id' => 'skins',
		    		'title' => 'Skins',
		    		'data' => $data_skin,
		    		'default' => 'global'
				);
		    	$mb->getSelectElement( $_skin );
			?>
		</p>

		<!--Select header skin-->
		<p class="wpo_section ">
    	<?php
	    	$header = wpo_cst_headerlayouts();
	    	$data = array(array( 'id' => 'global', 'name' => 'Use Global'));
	    	foreach ($header as $key => $value) {
	    		$data[] = array('id'=> $key,'name' => $value);
	    	}
	    	$header_skin = array(
	    		'id' => 'header_skin',
	    		'title' => 'Header Skin',
	    		'data' => $data,
	    		'default' => 'global'
			);
	    	$mb->getSelectElement( $header_skin );
    	?>
	    </p>
		 <!--Show Breadcrumb config -->
        <p class="wpo_section show_breadcrumb">
        <?php
            $_show_breadcrumb = array('id'=>'show_breadcrumb', 'title'=>'Show Breadcrumb');
            $mb->getCheckboxElement($_show_breadcrumb); 
        ?>
        </p>
		<!--show title config -->
        <p class="wpo_section show_title_header">
        <?php 
            $_show_title = array('id'=>'show_title_header','title'=>'Show title header');
            $mb->getCheckboxElement($_show_title); ?>
        </p>
	</div>
	<div class="wpo-meta-content" id="option">
		<!--Blog config -->
		<p class="wpo_section wpo-check wpo-template-template-blog">
		<?php
			$number = array(
                'id'    => 'blog_number',
                'title' => 'Number post',
                'des'   => '(Number post per page)'
            );
			$mb->addNumberElement( $number );
		?>
		</p>
		<p class="wpo_section wpo-check wpo-template-template-blog" data-group="style_blog" data-id="default:list:masonry">
		<?php
			$path = WPO_THEME_DIR.'/templates/blog/blog-*.php';
			$file_name = 'blog-';
			$styles = wpo_get_styles($path, $file_name);
			foreach( $styles as $key=>$val){
				$data_styles[] = array('id'=> $key,'name' => $val);
			}
			$_styles = array(
		    		'id' => 'blog_style',
		    		'title' => 'Blog style',
		    		'data' => $data_styles,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $_styles );
		?>
		</p>

		<p class="wpo_section wpo-check wpo-template-template-blog style_blog masonry">
		<?php 
			$column = array(
	    		'id' => 'blog_columns',
	    		'title' => 'Posts Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $column );
    	?>
		</p>

		<!--Portfolio config -->
		<p class="wpo_section wpo-check wpo-template-template-portfolio">
		<?php
			$data_number = array(
                'id'    => 'portfolio_number',
                'title' => 'Number portfolio per page',
                'des'   => ''
            );
			$mb->addNumberElement( $data_number );
		?>
		</p>
		<p class="wpo_section wpo-check wpo-template-template-portfolio" data-group="style_portfolio" data-id="default:masonry">
		<?php
			$portfolio_path = WPO_THEME_DIR.'/templates/portfolio/portfolio-*.php';
			$portfolio_file = 'portfolio-';
			$portfolio_styles = wpo_get_styles($portfolio_path, $portfolio_file);
			$portfolio_data = array();
			foreach( $portfolio_styles as $_key=>$_val){
				$portfolio_data[] = array('id'=> $_key,'name' => $_val);
			}
			$styles_portfolio = array(
		    		'id' => 'portfolio_style',
		    		'title' => 'Portfolio style',
		    		'data' => $portfolio_data,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $styles_portfolio );
		?>
		</p>

		<p class="wpo_section wpo-check wpo-template-template-portfolio">
		<?php 
			$_column = array(
	    		'id' => 'portfolio_columns',
	    		'title' => 'Portfolio Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $_column );
    	?>
		</p>
	</div>
</div>