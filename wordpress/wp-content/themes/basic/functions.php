<?php
 /**
 * Theme function
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

define( 'WPO_THEME_DIR', get_template_directory() );
define( 'WPO_THEME_SUB_DIR', WPO_THEME_DIR.'/inc/' );
define( 'WPO_THEME_CSS_DIR', WPO_THEME_DIR.'/css/' );

define( 'WPO_THEME_URI', get_template_directory_uri() );

define( 'WPO_THEME_NAME', 'basic' );
define( 'WPO_THEME_VERSION', '1.0' );

define( 'WPO_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_MAILCHIMP_ACTIVED', in_array( 'mailchimp-for-wp/mailchimp-for-wp.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
/*
 * Include list of files from Opal Framework.
 */ 
require_once( WPO_THEME_DIR . '/inc/loader.php' );
/* 
 * Localization
 */ 
$lang = WPO_THEME_DIR . '/languages' ;
load_theme_textdomain( 'basic', $lang );

/**
 * Create variant objects to modify and proccess actions of only theme.
 */
 
/*
 * Shortcodes
 */
require_once( WPO_THEME_SUB_DIR. '/functions/shortcode.php' );
/*
 * Create & start up instance of framework in application.
 */

/// include list of functions to process logics of worpdress not support 3rd-plugins.
require_once( WPO_THEME_SUB_DIR . 'functions/theme.php' );


/**
 * Create variant objects to modify and proccess actions of only theme.
 */  
if( WPO_VISUAL_COMPOSER_ACTIVED ){
	require_once( WPO_THEME_SUB_DIR . 'vc/visualcomposer.php' );
	$path = WPO_THEME_SUB_DIR . '/vc/class/*.php';
	$files = glob($path);
	foreach ($files as $key => $file) {
		if(is_file($file)){
			require($file);
		}
	}
}


	
require_once( WPO_THEME_SUB_DIR . 'customizer/customizer-custom-classes.php' );
require_once( WPO_THEME_SUB_DIR . 'customizer/theme.php' );
require_once( WPO_THEME_SUB_DIR . 'customizer/portfolio.php' );
require_once( WPO_THEME_SUB_DIR . 'customizer/function.php' );
require_once( WPO_THEME_SUB_DIR . 'customizer/blog.php' );
require_once( WPO_THEME_DIR . '/sample/import.php' );




/// WooCommerce specified functions
if( WPO_WOOCOMMERCE_ACTIVED  ) {
    require_once( WPO_THEME_SUB_DIR . 'woocommerce/woocommerce.php' );
    require_once( WPO_THEME_SUB_DIR . 'functions/woocommerce.php' );
    require_once( WPO_THEME_SUB_DIR . 'customizer/woocommerce.php' );
}



/**
 * Startup theme application
 *  
 */
$wpoEngine = new WPO_Frontend();
$protocol = is_ssl() ? 'https:' : 'http:';



// Add List of Menu Group
$wpoEngine->addMenu('mainmenu','Main Menu');
$wpoEngine->addMenu('topmenu','Top Header Menu');
//$wpoEngine->addThemeSupport( 'post-formats',  array( 'aside', 'link' , 'quote', 'image' ) );


$wpoEngine->init();

/**
 *
 */	
global $wpopconfig;

$wpoconfig = is_single()?  $wpoEngine->configLayout(wpo_theme_options('single-layout','0-1-0')):$wpoEngine->getPageConfig();