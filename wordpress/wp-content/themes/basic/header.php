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
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
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
		<!-- Top bar -->
        <section class="wpo-search-form search-form-lg">
            <?php get_search_form(); ?>
        </section>
		<section id="wpo-topbar" class="wpo-topbar">
			<div class="container">
				<div class="hidden-lg hidden-md pull-right">					
					
					

                    <div class="active-mobile pull-left search-popup hidden-xs btn-group">
                        <button class="btn btn-trm btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
                            <span class="fa fa-search"></span>                           
                        </button> 
                        <div class="active-content dropdown-menu">
                            <?php get_search_form(); ?>
                        </div>
                    </div>





					<div class="active-mobile pull-left setting-popup btn-group">
                        <button class="btn btn-trm btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
                            <span class="fa fa-user"></span>
                        </button> 						
						<div class="active-content dropdown-menu">
							<h3 class="white title"><?php _e('Settings','basic'); ?></h3>
							<?php if(has_nav_menu( 'topmenu' )){ ?>
								<div class="pull-left">
									<?php
										$args = array(
											'theme_location'  => 'topmenu',
											'container_class' => '',
											'menu_class'      => 'menu-topbar list-inline list-unstyled'
										);
										wp_nav_menu($args);
									?>
								</div>
							<?php } ?>
						</div>
					</div>


					<div class="active-mobile pull-left cart-popup btn-group">						
                        <button class="btn btn-trm btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
                            <span class="icon-cart2"></span>
                        </button> 
						<div class="active-content dropdown-menu">
							<h3 class="white title">
								<?php _e('Shopping Bag','basic'); ?>
							</h3>
							<div class="widget_shopping_cart_content"></div>
						</div>
					</div>
				</div>

				<div class="topbar-menu pull-left hidden-sm hidden-xs">
					<?php if(has_nav_menu( 'topmenu' )){ ?>
						<?php
							$args = array(
								'theme_location'  => 'topmenu',
								'container_class' => '',
								'menu_class'      => 'menu-topbar list-inline list-unstyled'
							);
							wp_nav_menu($args);
						?>
					<?php } ?>
					<!--language-->
					<?php if(wpo_theme_options('enable_language', false)){ ?>				
						<div class="select-wrapper language_switcher pull-left btn-group">

							<a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown"><?php _e('Language','basic'); ?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><?php _e('English','basic'); ?></a></li>
								<li><a href="#"><?php _e('Arabic','basic'); ?></a></li>																	
							</ul>
						</div>
					<?php } ?>				
					<!--currency-->
					<?php if(wpo_theme_options('enable_currency', false)){ ?>				
					<div class="select-wrapper currency_switcher pull-left btn-group">					
						<a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown"><?php _e('Currency','basic'); ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">GBP</a></li>
							<li><a href="#">USD</a></li>
							<li><a href="#">EUR</a></li>												
						</ul>
					</div>
					<?php } ?>			    
				</div>

				<div class="topbar-quick-settings pull-right hidden-sm hidden-xs">
					<button type="button" class="btn button-search"><i class="fa fa-search"></i></button>
					<?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
					<!-- Setting -->
					<?php if( wpo_theme_options('woo-show-minicart', true) ) : ?>
						<div class="top-cart hidden-sm hidden-xs">
							<?php wpo_cartdropdown(); ?>
						</div>
					<?php endif; ?>
					<?php } ?>
				</div>
            </div>
		</section>
		<!-- // Topbar -->
		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header">
            <div class="container">
			    <div class="container-inner header-wrap">
                    <div class="header-wrapper-inner">
        				<!-- LOGO -->
                        <div class="logo-in-theme">
                            <?php if( wpo_theme_options('logo') ) { ?>
                            <div class="site-logo logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <img src="<?php echo esc_url( wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            </div>
                            <?php } else { ?>
                                <div class="logo logo-theme site-introduction">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                                        <span><?php bloginfo( 'name' ); ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- LOGO -->

                        <!-- MENU -->
                        <nav id="wpo-mainnav" data-duration="<?php echo wpo_theme_options('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                        	<div class="navbar-header">
                        		<?php wpo_renderButtonToggle(); ?>
                        	</div>
                        	<?php
                                $args = array(  'theme_location' => 'mainmenu',
                                                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                                'menu_class' => 'nav navbar-nav megamenu',
                                                'fallback_cb' => '',
                                                'menu_id' => 'main-menu',
                                                'walker' => new Wpo_Megamenu());
                                wp_nav_menu($args);
                            ?>
                        </nav>
                        <!-- //MENU -->								
			        </div>
                </div>
            </div>
		</header>
		<!-- //HEADER -->