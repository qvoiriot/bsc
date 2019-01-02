<?php 
global $wpopconfig;
$sidebar = isset( $wpopconfig['left-sidebar']['widget'] )? $wpopconfig['left-sidebar']['widget']: 'sidebar-left';
?> 
<?php if($wpopconfig['left-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr( $wpopconfig['left-sidebar']['class'] ); ?>">
		<?php if( is_active_sidebar( $sidebar) ): ?>
			<div class="wpo-sidebar wpo-sidebar-left">
				<div class="sidebar-inner">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php } ?>
 