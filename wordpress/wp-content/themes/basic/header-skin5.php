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

    <?php
        $meta_template = get_post_meta(get_the_ID(),'wpo_template',true);
    ?>

    <!-- START Wrapper -->
	<section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? $meta_template['el_class'] : '' ; ?>">				
		<!-- // Topbar -->
		
		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header header-v6">
			<div class="container header-wrapper clearfix">
				<div class="header-wrapper desktop-logo pull-left">				
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
				<div class="header-wrapper desktop-nav">
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
				<div class="header-wrapper desktop-setting hidden-sm hidden-xs">									
					<!-- Accout -->
					<div class="quick-setting setting-accout">	
						<button class="btn-icon btn-icon-outline">
							<i class="fa fa-user"></i>
						</button>						
						<div class="setting-dropdown setting-dropdown-right setting-accout-menu">
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
					<div class="quick-setting setting-language-currency">	
						<button class="btn-icon btn-icon-outline">
							<i class="fa fa-cog"></i>
						</button>					
						<div class="setting-dropdown setting-dropdown-right setting-lc-menu">
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
					<!-- Search -->	
					<div class="quick-setting setting-search">
						<button class="btn-icon">
							<i class="fa fa-search"></i>
						</button>
						<div class="setting-dropdown setting-dropdown-right search-dropdown">
							<?php get_search_form(); ?>
						</div>						
					</div>					
					<!-- // end search -->	
					<!-- Mini cart -->					
					<?php if( wpo_theme_options('woo-show-minicart', true) ) : ?>
						<div class="quick-setting setting-cart">						
							<button class="btn-icon btn-icon-danger">
								<i class="icon-cart2"></i>
							</button>
							<div class="setting-dropdown setting-dropdown-right">
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
						<!-- // Mini cart -->						   
					<?php endif; ?>
				</div>						
			</div>
		</header>
		<!-- //HEADER -->