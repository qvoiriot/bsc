<?php
 
add_action( 'customize_register', 'wpo_cst_customizer' );


function wpo_cst_customizer($wp_customize){

    # General Settings
    // Panel Header
    $wp_customize->add_section('wpo_cst_general_settings', array(
        'title'      => __('General Settings', 'basic'),
        'description'    => __('Website General Settings', 'basic'),
        'transport'  => 'postMessage',
        'priority'   => 10,
    ));

    // Parameter Options
    $wp_customize->add_setting('blogname', array( 
        'default'    => get_option('blogname'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('blogname', array( 
        'label'    => __('Site Title', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 1,
    ) );
    /// 
    $wp_customize->add_setting('blogdescription', array( 
        'default'    => get_option('blogdescription'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('blogdescription', array( 
        'label'    => __('Tagline', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 2,
    ) );


    //
    $wp_customize->add_setting('wpo_theme_options[favicon]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[favicon]', array(
        'label'    => __('Favicon', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[favicon]',
        'priority' => 5,
    ) ) );

    /* 
     * Custom Logo 
     */
     $wp_customize->add_setting('wpo_theme_options[logo]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[logo]', array(
        'label'    => __('Logo', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[logo]',
        'priority' => 10,
    ) ) );
     /* 
     * Custom Logo 
     */
     $wp_customize->add_setting('wpo_theme_options[image-footer]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[image-footer]', array(
        'label'    => __('Footer Image', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[image-footer]',
        'priority' => 11
    ) ) );

    $wp_customize->add_setting('wpo_theme_options[copyright_text]', array(
        'default'    => 'Copyright 2014 - Basic theme - All Rights Reserved.',
        'type'       => 'option',
        'transport'=>'refresh',
         'sanitize_callback' => 'opal_sanitize_textarea',
    ) );

    $wp_customize->add_control( new WPO_Customize_Control_Textarea( $wp_customize,'wpo_theme_options[copyright_text]', array(
        'label'    => __('Copyright text', 'basic'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[copyright_text]',
        'priority' => 12
    ) ) );
	
	//config responsive
    $wp_customize->add_setting('wpo_theme_options[enable_viewport_respon]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );
	
	$wp_customize->add_control('wpo_theme_options[enable_viewport_respon]', array(
        'priority' => 13,
        'settings'  => 'wpo_theme_options[enable_viewport_respon]',
        'label'     => __('Turn Off Responsive', 'basic'),
        'section'   => 'wpo_cst_general_settings',
        'type'      => 'checkbox'
    ) );
	//end config responsive
	
	


    function opal_sanitize_textarea( $content ){
        return wp_kses_post( force_balance_tags( $content ) );
    }
   /***************************************************************************
    * Theme Settings 
    ***************************************************************************/

  
   /**
     * General Setting
     */
    $wp_customize->add_section( 'ts_general_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Themes And Layouts Setting', 'basic' ),
        'description' => '',
    ) );
    //phone number
    $wp_customize->add_setting( 'wpo_theme_options[phone_number]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'=>'refresh'
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[phone_number]', array(
        'label'      => __( 'Phone number', 'basic' ),
        'section'    => 'ts_general_settings',
        'settings'  => 'wpo_theme_options[phone_number]'
    ) );
//email
     $wp_customize->add_setting( 'wpo_theme_options[email]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'=>'refresh'
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[email]', array(
        'label'      => __( 'Email', 'basic' ),
        'section'    => 'ts_general_settings',
        'settings'  => 'wpo_theme_options[email]'
    ) );

    //config language
    $wp_customize->add_setting( 'wpo_theme_options[enable_language]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field',
        'transport'=>'refresh'
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[enable_language]', array(
        'label'      => __( 'Enabel languague', 'basic' ),
        'section'    => 'ts_general_settings',
        'settings'  => 'wpo_theme_options[enable_language]',
        'type'      => 'checkbox'
    ) );
//config currency
    $wp_customize->add_setting('wpo_theme_options[enable_currency]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field',
        'transport'=>'refresh'
    ) );

    $wp_customize->add_control('wpo_theme_options[enable_currency]', array(
        'settings'  => 'wpo_theme_options[enable_currency]',
        'label'     => __('Enable currency', 'basic'),
        'section'   => 'ts_general_settings',
        'type'      => 'checkbox'
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[skin]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => 'default',
         'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[skin]', array(
        'label'      => __( 'Default Skin', 'basic' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
        'choices'    => wpo_cst_skins(),
    ) );

     $wp_customize->add_setting( 'wpo_theme_options[headerlayout]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[headerlayout]', array(
        'label'      => __( 'Header Layout Style', 'basic' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
        'choices'    => wpo_cst_headerlayouts(),
    ) );



    $wp_customize->add_setting('wpo_theme_options[configlayout]', array(       
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => 'default',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

     $layoutConfig = array(
        'default'=>'Full width',
        'boxed' => 'Boxed'
    );

    $wp_customize->add_control('wpo_theme_options[configlayout]', array(
        'label'      => __( 'Layout Style', 'basic' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
        'choices'    => $layoutConfig
    ) );


    $wp_customize->add_setting( 'wpo_theme_options[footer-style]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

     $wp_customize->add_control( 'wpo_theme_options[footer-style]', array(
        'label'      => __( 'Footer Styles Builder', 'basic' ),
        'section'    => 'ts_general_settings',
        'type'       => 'select',
        'choices'    => get_footerbuilder_profiles()
    ) );


    //if( defined("WPO_CTS_STYLE_PATH") ){
         $wp_customize->add_setting( 'wpo_theme_options[customize-theme]', array(
            'capability'        => 'manage_options',
            'type'       => 'option',
            'default'           => '',
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control(  new WPO_CustomizeProfile_DropDown( $wp_customize, 'wpo_theme_options[customize-theme]', array(
            'label'      => __( 'Custom Theme Profile', 'basic' ),
            'section'    => 'ts_general_settings',
        ) ) );
     //}

     $wp_customize->add_section( 'header_image', array(
        'description' => __( 'Applied to the breadcrumb.', 'basic' ),
        'title'          => __( 'Breadcrumb Image', 'basic' ),
        'priority'   => 88,
    ));

    /******************************************************************
     * Navigation
     ******************************************************************/

     # Sticky Top Bar Option
    $wp_customize->add_setting('wpo_theme_options[verticalmenu]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[verticalmenu]', array(
        'settings'  => 'wpo_theme_options[verticalmenu]',
        'label'     => __('Vertical Megamenu', 'basic'),
        'section'   => 'nav',
        'type'      => 'select',
        'choices' => wpo_get_menugroups(),
    ) );
    


    # Sticky Top Bar Option
    $wp_customize->add_setting('wpo_theme_options[megamenu-is-sticky]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[megamenu-is-sticky]', array(
        'settings'  => 'wpo_theme_options[megamenu-is-sticky]',
        'label'     => __('Sticky Top Bar', 'basic'),
        'section'   => 'nav',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
    
    $wp_customize->add_setting( 'wpo_theme_options[magemenu-animation]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[magemenu-animation]', array(
        'label'      => __( 'Megamenu Animation', 'basic' ),
        'section'    => 'nav',
        'type'    => 'select',
        'choices'    => wpo_get_menuanimation(),
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[megamenu-duration]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '300',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[megamenu-duration]', array(
        'label'      => __(  'Megamenu Duration', 'basic' ),
        'section'    => 'nav',
        'type'    => 'text'
    ) );




    /* 
     /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'pages_setting', array(
        'title'          => __( 'Pages Settings', 'basic' ),
        'priority'       => 120,
        'description'    => __( 'Your theme supports a static front page.', 'basic'),
    ) );

     
    $wp_customize->add_setting( 'wpo_theme_options[404_post]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => ''   ,
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[404_post]', array(
        'label'      => __( '404 Page', 'basic' ),
        'section'    => 'pages_setting',
        'type'       => 'dropdown-pages',
    ) );
}
