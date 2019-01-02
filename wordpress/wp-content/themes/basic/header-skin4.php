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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
	<?php if(!wpo_theme_options('enable_viewport_respon', true)){ ?>
		<meta name="viewport" content="width=device-width">
	<?php } ?>
	
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>	
<section class="wpo-page row-offcanvas row-offcanvas-left">

    <!-- START Wrapper -->
	<section class="wpo-wrapper">				
		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header header-v5">
            <div class="container">                
    			<div class="header-wrapper clearfix">
    				<div class="header-wrapper-left pull-left">
    					<!-- vertical menu -->
    					<?php if ( is_active_sidebar( 'vertical-menu' ) ) : ?>
    						<?php dynamic_sidebar('vertical-menu'); ?>
    					<?php endif; ?>
    					<!-- // vertical menu -->					
    					<!-- search -->					
    					<div class="quick-setting search-form-md pull-left">
    						<?php get_search_form(); ?>
    					</div>
    					<!-- // search -->
    				</div>				
    				<div class="header-wrapper-right pull-right">
    					<!-- Accout -->
    					<div class="quick-setting quick-setting-inversed setting-accout">
    						<h3 class="heading-title setting-accout-title">
    							<i class="fa fa-search"></i>
    							<span><?php _e('Accout','basic'); ?></span>
    						</h3>
    						<div class="setting-dropdown setting-accout-menu">
    							<?php if(has_nav_menu( 'topmenu' )){ ?>
    								<?php
    									$args = array(
    										'theme_location'  => 'topmenu',
    										'container_class' => '',
    										'before'          => '',
    										'menu_class'      => 'menu-topbar list-unstyled',
    										'walker' => new Wpo_Megamenu()
    									);
    									wp_nav_menu($args);
    								?>
    							<?php } ?>
    						</div>						
    					</div>	
    					<!-- // Accout -->					
    					<!-- language currency -->
    					<div class="quick-setting quick-setting-inversed setting-language-currency">
    						<h3 class="setting-lc-title heading-title">
    							<i class="fa fa-search"></i>
    							<span><?php _e('Setting','basic'); ?></span>
    						</h3>
    						<div class="setting-dropdown setting-lc-menu">
    							<!--language-->
                                <?php if(wpo_theme_options('enable_language', false)){ ?>			
        							<div class="select-wrapper language_switcher">	
        								<h4 class="select-wrapper-title">
        									<i class="fa fa-flag"></i>
        									<span><?php _e('Language','basic'); ?></span>
        								</h4>
        								<ul class="list-unstyled menu-topbar">
        									<li><a href="#"><?php _e('English','basic'); ?></a></li>
        									<li><a href="#"><?php _e('Arabic','basic'); ?></a></li>																	
        								</ul>
        							</div>
                                <?php } ?>					
    							<!--currency-->
                                <?php if(wpo_theme_options('enable_currency', false)){ ?>				
        							<div class="select-wrapper currency_switcher">																					
        								<h4 class="select-wrapper-title">
        									<i class="fa fa-globe"></i>
        									<span><?php _e('Currency','basic'); ?></span>
        								</h4>
        								<ul class="list-unstyled menu-topbar">
        									<li><a href="#">GBP</a></li>
        									<li><a href="#">USD</a></li>
        									<li><a href="#">EUR</a></li>												
        								</ul>
        							</div>
                                <?php } ?>
    						</div>						
    					</div>
    					<!-- // language currency -->					
    					<!-- Mini cart -->
    					<div class="quick-setting setting-mini-cart">
    						<?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
    						<!-- Setting -->
    						<?php if( wpo_theme_options('woo-show-minicart', true) ) : ?>
    							<div class="top-cart hidden-sm hidden-xs">
    								<?php wpo_cartdropdown(); ?>
    							</div>
    						<?php endif; ?>
    						<?php } ?>		
    					</div>	
    					<!-- // Mini cart -->					
    				</div>		
    				
    				<!-- LOGO -->
                    <div class="logo-in-theme">
                        <?php if( wpo_theme_options('logo') ) { ?>
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                        <?php } else { ?>
                            <div class="logo logo-theme">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                                    <span><?php bloginfo( 'name' ); ?></span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- LOGO -->			
    				
    			</div>
            </div>
		</header>
		<!-- //HEADER -->