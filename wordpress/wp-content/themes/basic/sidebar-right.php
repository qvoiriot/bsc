<?php  
global $wpopconfig;
$sidebar_right = isset( $wpopconfig['right-sidebar']['widget'] )? $wpopconfig['right-sidebar']['widget']: 'sidebar-right';
?>

<?php if($wpopconfig['right-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr( $wpopconfig['right-sidebar']['class'] ); ?>">
		<?php if( is_active_sidebar( $sidebar_right) ): ?>
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $sidebar_right ); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
<?php }