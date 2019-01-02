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
	<meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>	
<section class="wpo-page row-offcanvas row-offcanvas-left">

    <!-- START Wrapper -->
	<section class="wpo-wrapper">
		<!-- Top bar -->
		<section class="wpo-topbar"><div class="container"><div class="container-inner">
            <div class="hidden-lg hidden-md pull-right">
                <div class="active-mobile pull-left search-popup hidden-xs btn-group">
                    <button class="btn btn-icon-light btn-icon-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
                        <span class="fa fa-search"></span>                         
                    </button>                     
                    <div class="active-content dropdown-menu">
                        <?php get_search_form(); ?>
                    </div>
                </div>

                <div class="active-mobile pull-left setting-popup btn-group">
                    <button class="btn btn-icon-light btn-icon-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
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
                    <button class="btn btn-icon-light btn-icon-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">                        
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
                <ul class="list-unstyled list-inline list-contact">
                    <?php if(wpo_theme_options('phone_number')): ?>
                        <li><i class="fa fa-phone">&nbsp;</i>
                            <?php echo wpo_theme_options( 'phone_number' ); ?> 
                        </li>
                    <?php endif; ?>
                    <?php if(wpo_theme_options('email')): ?>
                        <li><i class="fa fa-envelope">&nbsp;</i> 
                            <a href="mailto:<?php echo esc_url( wpo_theme_options('email') );?>">
                                <?php echo wpo_theme_options('email'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            </div></div>
		</section>
		<!-- // Topbar -->
		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header header-inverse header-v3"><div class="container">
			<div class="container-inner header-top header-wrap clearfix">
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
                <!-- MENU -->
            </div>
        </div>
	</header>
    <!-- //HEADER -->

    <!-- MENU -->
    <nav id="wpo-mainnav" data-duration="<?php echo wpo_theme_options('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega navbar-mega-full-width hidden-sm hidden-xs" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <?php wpo_renderButtonToggle(); ?>
            </div><!-- //END #navbar-header -->
            <?php
                $args = array(
                    'theme_location'  => 'mainmenu',
                    'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                    'menu_class'      => 'nav navbar-nav megamenu',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'walker'          => new Wpo_Megamenu());
                wp_nav_menu($args);
            ?>
        </div>
    </nav>
    <!-- //MENU -->