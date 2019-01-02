<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

class WPO_Links extends WPO_Widget {
    public function __construct() {
        parent::__construct(
            // Base ID of your widget
            'wpo_links',
            // Widget name will appear in UI
            __('WPO Links', 'basic'),
            // Widget description
            array( 'description' => __( 'Links for website.', 'basic' ), )
        );
        $this->widgetName = 'links';
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        $wpolink 	= $instance['wpolink'];
		$wpotitle 	= $instance['wpotitle'];
		$wpoclass 	= $instance['wpoclass'];
		$title = apply_filters('widget_title', $instance['title']);
        echo $before_widget; ?>
		<?php 
        echo $before_title;
        echo esc_html($title); 
        echo $after_title; ?>
        <ul class="social list-unstyled list-inline">
		<?php foreach( $wpolink as $key=>$link):
			if( !empty($link) ): ?>
				<li>
					<a href="<?php echo esc_url($link);?>" class="<?php echo esc_attr( $key ); ?>" target="_blank">

						<i <?php if($wpoclass[$key]) : ?> class="fa fa-<?php echo esc_attr($wpoclass[$key]); ?>" <?php endif; ?>> </i>
                        <span class="social-label"><?php if($wpoclass[$key]) : echo esc_attr($wpotitle[$key]); endif; ?></span>

					</a>
				</li>
		<?php
				endif;
			endforeach;
		?>
		</ul>
		<?php
        echo $after_widget;
    }
// Widget Backend
    public function form( $instance ) {
        $defaults = array('title' => 'Find us on social networks','wpotitle' => array(0=>'Twitter',1=>'Youtube',2=>'Pinterest',3=>'Google plus',4=>'LinkedIn'),'wpoclass' => array(0=>'fa fa-twitter',1=>'fa fa-youtube',2=>'fa fa-pinterest',3=>'fa fa-google-plus',4=>'fa fa-linkedin'),'wpolink' => array(0=>'#link1',1=>'#link2',2=>'#link3',3=>'#link4',4=>'#link5'));
        $instance = wp_parse_args((array) $instance, $defaults);
		$wpolink = (isset($instance['wpolink']) && $instance['wpolink'])  ? $instance['wpolink'] : array();
		$wpoclass = (isset($instance['wpoclass']) && $instance['wpoclass'])  ? $instance['wpoclass'] : array();
		$wpotitle = (isset($instance['wpotitle']) && $instance['wpotitle'])  ? $instance['wpotitle'] : array();
		?>
		
		<div class="input_fields_wrap">
		    <p>
				<h3 for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Widget Title', 'basic' ); ?></h3>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_html($instance['title']); ?>" />
			</p>
			<?php if($wpolink) : ?>
				<?php foreach( $wpolink as $key=>$link): ?>
					<p>
						<div>
							<span style="width:30px;display:inline-block"><?php echo __('Title ', 'basic' ); ?></span><input type="text" name="<?php echo $this->get_field_name( 'wpotitle' ).'[]'; ?>" value="<?php echo esc_attr($wpotitle[$key]); ?>"/><br>
							<span style="width:30px;display:inline-block"><?php echo __('Class ', 'basic' ); ?></span><input type="text" name="<?php echo $this->get_field_name( 'wpoclass' ).'[]'; ?>" value="<?php echo esc_attr($wpoclass[$key]); ?>"/><br>
							<span style="width:30px;display:inline-block"><?php echo __('Link ', 'basic' ); ?></span><input type="text" name="<?php echo $this->get_field_name( 'wpolink' ).'[]'; ?>" value="<?php echo esc_attr($link); ?>"/><br>
							<a href="#" class="remove_field"><?php echo __('Remove', 'basic' ); ?></a>
						</div>
					</p>
				<?php  endforeach; ?>
			<?php endif; ?>
		</div>
		<button class="add_field_button"><?php echo __('Add Link', 'basic' ); ?></button>
		<script type="application/javascript">
			var max_fields      = 10; 
			var wrapper         = jQuery(".input_fields_wrap"); 
			var add_button      = jQuery(".add_field_button"); 
		   
			var x = 1;
			jQuery(add_button).click(function(e){ 
				e.preventDefault();
				if(x < max_fields){ 
					x++; 
					jQuery(wrapper).append('<p><div><span style="width:30px;display:inline-block"><?php echo __('Title ', 'basic' ); ?></span><input type="text" name="<?php echo esc_js( $this->get_field_name( 'wpotitle' ).'[]' ); ?>"/><br><span style="width:30px;display:inline-block"><?php echo __('Class ', 'basic' ); ?></span><input type="text" name="<?php echo esc_js( $this->get_field_name( 'wpoclass' ).'[]' ); ?>"/><br><span style="width:30px;display:inline-block"><?php echo __('Link ', 'basic' );?></span><input type="text" name="<?php echo esc_js( $this->get_field_name( 'wpolink' ).'[]' ); ?>"/><br><a href="#" class="remove_field"><?php echo __('Remove', 'basic' ); ?></a></div></p>'); 
				}
			});
		   
			jQuery(wrapper).on("click",".remove_field", function(e){ 
				e.preventDefault(); jQuery(this).parent('div').remove(); x--;
			});
		</script>
		<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
		$instance['title'] 		= $new_instance['title'];
        $instance['wpolink'] 	= $new_instance['wpolink'];
		$instance['wpoclass'] 	= $new_instance['wpoclass'];
		$instance['wpotitle'] 	= $new_instance['wpotitle'];
        return $instance;
    }
}

register_widget( 'WPO_Links');