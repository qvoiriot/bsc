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
$liveedit_action = admin_url('themes.php?page=wpo_megamenu');
$action_addwidget = admin_url('admin-ajax.php?action=wpo_list_shortcodes');
$live_site_url = '';
$action_backlink =  admin_url('themes.php');


$nav_menu =  2;
$selectenav =  isset($_GET['group']) && $_GET['group'] ? $_GET['group']:$nav_menu;
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo __( 'Vertical Megamenu Editor', 'basic' );?></h1>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label pull-left"><?php echo __('Menu Group', 'basic'); ?></label>
					<?php $menus = wpo_get_menugroups()  ; ?>
					<div class="col-md-6">
					<select class="form-control" name="menu-group" id="menugroup">
						<?php foreach($menus as $gmenu => $label) :  ?>
						<option value="<?php echo $gmenu;?>"  <?php if( $selectenav == $gmenu ) { ?>selected="selected"<?php } ?>><?php echo $label; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
				</div> 
			</div>
		</div>
	</div>	

<div class="megamenu-pages container">

	<ul class="nav nav-tabs">
	  <li class="active"><a href="#megamenu-editor" data-toggle="tab" ><?php echo __( 'MegaMenu' , 'basic'); ?></a></li>
	  <li><a href="#manage-widget" data-toggle="tab"><?php echo __( 'Manage Widgets' , 'basic'); ?></a></li>
	</ul>

 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" data-backdrop="false" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?php echo __( 'Widget Management' , 'basic'); ?></h4>
        </div>
        <div class="modal-body">
			<span class="spinner top" style="display:block;float:none;"></span>
			<div class="wpo-widget-message"></div>
			<div class="modal-body-inner"></div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

	<div  id="widget-form" style="display: none; left: 340px;  min-width:400px" class="popover bottom   form-setting">
		<div class="arrow"></div>
		<h3 style="display: block;" class="popover-title"><?php echo __('Widget Setting', 'basic');?><span class="badge pull-right"><?php echo __('Close', 'basic');?></span></h3>
		<div class="popover-content">
			 <select name="inject_widget">
			 <?php foreach( $widgets as $w ) { ?>
				<option value="<?php echo $w->id; ?>"><?php echo $w->name; ?></option>
			 <?php } ?>
			</select>
			<button type="button" id="btn-inject-widget" class="btn btn-primary btn-sm"><?php echo __('Insert', 'basic');?></button>
			<a href="<?php echo $action_addwidget; ?>" id="btn-add-widget" rel="refresh-page" class="btn btn-sm btn-modal btn-success btn-action"><?php echo __('Add Widget', 'basic');?></a>
		</div>
	</div>


	<div id="toolbar" class="container-inner">
		<div id="menu-toolbars">
				<div>
					<div class="pull-right">
						<a href="<?php echo $action_addwidget; ?>" id="btn-add-widget" rel="refresh-page" class="btn btn-modal btn-success btn-action"><?php echo __('Add Widget', 'basic');?></a>
						<a href="<?php echo $live_site_url;?>" class="btn btn-modal btn-primary btn-sm btn-action hidden-md hidden-lg" ><?php echo __('Preview', 'basic');?></a> |
						<a id="unset-data-menu" href="#" class="btn btn-danger btn-action"><?php echo __('Reset Megamenu', 'basic');?></a>
						<button id="save-data-menu" class="btn btn-warning"><?php echo __('Save', 'basic')?></button>
					</div>
					<a id="save-data-back" class="btn btn-default" href="<?php echo $action_backlink;?>"><?php echo __('Back', 'basic');?></a>
				</div>
			</div>
	</div>


	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane" id="manage-widget">
			<table class="form table table-striped">
			 	<tr>
			 		<th><?php echo __('Wiget Name', 'basic'); ?></th>
			 		<th><?php echo __('Type', 'basic'); ?></th>
			 		<th><?php echo __('Action', 'basic'); ?></th>
			 	</tr>
			 	<?php if( is_array($widgets) ) { ?>

			 	<?php foreach( $widgets  as $widget ) { ?>
			     	<tr data-widget-id="<?php echo $widget->id; ?>">
			    	 	<td class="name"><?php echo $widget->name; ?></td>
			    	 	<td class="type"><?php echo $widget->type; ?></td>
			    	 	<td>
			    	 		<a class="wpo-edit-widget" rel="edit" data-type="<?php echo $widget->type; ?>" data-id='<?php echo $widget->id; ?>' href="#" ><?php echo __('Edit', 'basic'); ?></a>
			    	 		|
			    	 		<a rel="delete" class="wpo-delete" data-message="<?php echo __('Are You Sure ?', 'basic'); ?>" data-id='<?php echo $widget->id; ?>' href="#"><?php echo __('Delete', 'basic'); ?></a>
			    	 	</td>
			     	<?php } ?>
			     	</tr>
			 	<?php } ?>
			</table>
		</div>

	  	<div class="tab-pane active" id="megamenu-editor">
				<div id="menu-form"  style="display: none; left: 340px; top: 15px; max-width:600px" class="popover top out form-setting">
							<div class="arrow"></div>
							<h3 style="display: block;" class="popover-title">Sub Menu Setting <span class="badge pull-right"><?php echo __('Close', 'basic');?></span></h3>
							<div class="popover-content">
								<form  method="post" action="<?php echo $liveedit_action;?>"  enctype="multipart/form-data" >
								<div class="col-lg-12">
								<table class="table table-hover">

									<tr>
										<td><?php echo __('Create Sub Menu', 'basic');?></td>
										<td>
											<select name="menu_submenu" class="menu_submenu">
												<option value="0"><?php echo __('No', 'basic');?></option>
												<option value="1"><?php echo __('Yes', 'basic');?></option>
											</select>
										</td>
									</tr>

									<tr>
										<td><?php echo __('Width Submenu', 'basic');?></td>
										<td>
											 <input type="text" name="menu_subwidth" class="menu_subwidth">
										</td>
									</tr>
									<tr>
										<td><?php echo __('Text Customize', 'basic');?></td>
										<td>
											 <input type="text" name="text_customize" class="text_customize">
										</td>
									</tr>
									<tr>
										<td><?php echo __('Icon', 'basic');?></td>
										<td>
											 <input type="text" name="menu_icon" class="menu_icon">
										</td>
									</tr>
									<tr>
										<td><?php echo __('Description', 'basic');?></td>
										<td>
											<textarea name="menu_description" class="menu_description" cols="30" rows="2"></textarea>
										</td>
									</tr>
									<tr class="table-alignments">
										<td><?php echo __( 'Alignment' , 'basic'); ?></td>
										<td>
											<div class="btn-group button-alignments">
											  <button type="button" class="btn btn-default" data-option="aligned-left"><span class="glyphicon glyphicon-align-left"></span></button>
											  <button type="button" class="btn btn-default" data-option="aligned-center"><span class="glyphicon glyphicon-align-center"></span></button>
											  <button type="button" class="btn btn-default" data-option="aligned-right"><span class="glyphicon glyphicon-align-right"></span></button>
											  <button type="button" class="btn btn-default" data-option="aligned-fullwidth"><span class="glyphicon glyphicon-align-justify"></span></button>
											</div>

										</td>
									</tr>
									<tr>
										<td colspan="2">
											<button type="button" class="add-row btn btn-success btn-sm"><?php echo __('Add Row', 'basic');?></button>
											<button type="button" class="remove-row btn btn-default  btn-sm"><?php echo __('Remove Row', 'basic');?></button>
											| <button type="button" class="add-col btn btn-success  btn-sm"><?php echo __('Add Column', 'basic');?></button>
										</td>
									</tr>
								</table>
								<input type="hidden" name="menu_id">
								</div>

								</form>
							</div>
						</div>


						<div id="column-form" style="display: none; left: 340px; top: 45px;" class="popover top   form-setting">
							<div class="arrow"></div>
							<h3 style="display: block;" class="popover-title"><?php echo __('Column Setting', 'basic')?> <span class="badge pull-right"><?php echo __('Close', 'basic');?></span></h3>
							<div class="popover-content">
								<form    method="post" action="<?php echo $liveedit_action;?>"  enctype="multipart/form-data" >
								<table class="table table-hover">
									<tr>
										<td><?php echo __('Addition Class', 'basic');?></td>
										<td>
											<input type="text" name="colclass">
										</td>
									</tr>
									<tr>
										<td>Column Width</td>
										<td>
											<select class="colwidth" name="colwidth">
												<?php for( $i = 1; $i<=12; $i++ )  { ?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><button type="button" class="remove-col btn btn-default  btn-sm"><?php echo __('Remove Column', 'basic');?></button> </td>
									</tr>
								</table>
								</form>
							</div>
						</div>


						<div  id="submenu-form" style="display: none; left: 340px; top: 45px;" class="popover top  form-setting">
							<div class="arrow"></div>
							<h3 style="display: block;" class="popover-title"><?php echo __('Setting Sub Menu', 'basic');?><span class="badge pull-right"><?php echo __('Close', 'basic');?></span></h3>
							<div class="popover-content">
								<form   method="post" action="<?php echo $liveedit_action;?>"  enctype="multipart/form-data" >

									<input type="hidden" name="submenu_id">
									<table class="table table-hover">
										<tr>
											<td><?php echo __('Group Submenu', 'basic');?></td>
											<td>
												<select name="submenu_group">
													<option value="0"><?php echo __('No', 'basic');?></option>
													<option value="1"><?php echo __('Yes', 'basic');?></option>
												</select>
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>


				<div class="container-inner">

					<div class="progress" id="wpo-progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 00%;">
					    <span class="sr-only">60% Complete</span>
					  </div>
					</div>


				<div id="megamenu-content" >
					<div id="wpo-mainnav" class="wpo-megamenu navbar navbar-default verticalmenu" role="navigation">
						<div class="navbar-header">
							<a href="javascript:;" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						    </a>
						</div><!-- //END #navbar-header -->
						<?php  
							
					       
					        $args = array(  'menu' => $selectenav,
					                        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
					                        'menu_class' => 'nav navbar-nav megamenu',
					                        'fallback_cb' => '',
					                        'menu_id' => 'mainmenutop',
					                        'walker' => new Wpo_Megamenu_Vertical());
					        wp_nav_menu($args);

							?>
					</div>

				</div>
				</div></div>
	</div></div>

<script type="text/javascript">

	jQuery( function($) {
		var _action 	   = '<?php echo $liveedit_action;?>';
		var _action_menu   = '<?php echo $liveedit_action;?>';
		var _action_widget = '<?php echo admin_url('themes.php?page=wpo_megamenu&renderwidget=1'); ?>';
		$("#megamenu-content").PavMegamenuEditor( {'action':_action, 'action_menu':_action_menu,'action_widget':_action_widget} );
	

	$("#menugroup").change( function(){	 
		if( $("#menugroup").val() ){ 
			location.href="<?php echo  admin_url('themes.php?page=wpo_megamenu_vertical'); ?>&group="+$("#menugroup").val();
		}
	} );

	} ) ;


</script>