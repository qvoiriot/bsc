<?php 
global $wpopconfig;

if( is_product()){
	$pos = wpo_theme_options('woocommerce-single-left-sidebar', 'sidebar-left');
}else
	$pos = wpo_theme_options('woocommerce-archive-left-sidebar', 'sidebar-left');

?> 
<?php if($wpopconfig['left-sidebar']['show']){ ?>
	<aside class="<?php echo esc_attr( $wpopconfig['left-sidebar']['class'] ); ?>">
		<?php if( is_active_sidebar( $pos) ): ?>
			<div class="wpo-sidebar wpo-sidebar-left">
				<div class="sidebar-inner">
					<?php dynamic_sidebar( $pos ); ?>
				</div> 
			</div>
		<?php endif; ?>
	</aside>
<?php } ?>