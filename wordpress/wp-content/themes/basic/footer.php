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
global $footer_builder;

$footer = wpo_theme_options('footer-style','default');
?>

	<?php if($footer !='default' && (get_post($footer))){ 
		 echo $footer_builder['footer'];
    ?>
        	<footer id="wpo-footer" class="wpo-footer wpo-footer-builder <?php echo esc_attr( get_post($footer)->post_name ); ?>">
	        	<?php echo do_shortcode( get_post( $footer )->post_content ); ?>
	        </footer>
    <?php }else{ ?>

	<footer id="wpo-footer" class="wpo-footer">
		<div class="footer-bottom">
			<div class="container">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>
	</footer>
    <?php }?>

	<section id="wpo-copyright" class="wpo-copyright">
		<div class="container">			
			<?php
            $img_footer = wpo_theme_options('image-footer','');
            $copyright = wpo_theme_options('copyright_text', 'Copyright &copy; 2014 - Basic theme - All Rights Reserved');
            if($img_footer!=''){
                ?>
                <div class="footer-logo">
                    <img src="<?php echo esc_url( $img_footer ); ?>" alt="img-footer" />
                </div>
            <?php } ?>

            <?php if ( is_active_sidebar('copyright') ) : ?>
                <?php dynamic_sidebar('copyright'); ?>
            <?php endif; ?>

			<?php echo $footer_builder['copyright']; ?>
			<div class="copyright">
				<address>
				<?php if(!empty( $copyright )) 
						echo $copyright;
					else 
						echo 'Copyright &copy; 2015 - Basic theme - All Rights Reserved'; ?>
				</address>
			</div>
		</div>
	</section>

</section>
<!-- END Wrapper -->  
<?php get_sidebar( 'offcanvas-left' );  ?>
<div class="body-overlay"></div>
</section>

<?php wp_footer(); ?>
</body>
</html>