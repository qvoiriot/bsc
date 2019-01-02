<?php
function basic_fnc_import_remote_demos() { 
   return array(
      'basic' => array( 'name' => 'basic',  'source'=> 'http://wpsampledemo.com/basic/basic.zip' ),
   );
}

add_filter( 'pbrthemer_import_remote_demos', 'basic_fnc_import_remote_demos' );



function basic_fnc_import_theme() {
   return 'basic';
}
add_filter( 'pbrthemer_import_theme', 'basic_fnc_import_theme' );

function basic_fnc_import_demos() {
   $folderes = glob( WPO_THEME_DIR.'/inc/import/*', GLOB_ONLYDIR ); 

   $output = array(); 

   foreach( $folderes as $folder ){
      $output[basename( $folder )] = basename( $folder );
   }
   
   return $output;
}
add_filter( 'pbrthemer_import_demos', 'basic_fnc_import_demos' );

function basic_fnc_import_types() {
   return array(
         'all' => 'All',
         'content' => 'Content',
         'widgets' => 'Widgets',
         'page_options' => 'Theme + Page Options',
         'menus' => 'Menus',
         'rev_slider' => 'Revolution Slider',
         'vc_templates' => 'VC Templates'
      );
}
add_filter( 'pbrthemer_import_types', 'basic_fnc_import_types' );
