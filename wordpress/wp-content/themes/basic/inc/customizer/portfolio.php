<?php
add_action( 'customize_register', 'wp_ct_portfolio_setting' );
function wp_ct_portfolio_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_portfolio', array(
        'priority' => 80,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Portfolio', 'basic' ),
        'description' =>__( 'Make default setting for page, general', 'basic' ),
    ) );


    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'portfolio_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Portfolio Setting', 'basic' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

     ///  Archive layout setting
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '0-1-1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[portfolio-layout]', array(
        'settings'  => 'wpo_theme_options[portfolio-layout]',
        'label'     => __('Layout', 'basic'),
        'section'   => 'portfolio_settings',
        'priority' => 1

    ) ) );

   
   
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[portfolio-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[portfolio-left-sidebar]',
        'label'     => __('Left Sidebar', 'basic'),
        'section'   => 'portfolio_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[portfolio-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[portfolio-right-sidebar]',
        'label'     => __('Right Sidebar', 'basic'),
        'section'   => 'portfolio_settings',
         'priority' => 2 
    ) ) );


    $wp_customize->add_setting('wpo_theme_options[portfolio_show-title]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[portfolio_show-title]', array(
        'settings'  => 'wpo_theme_options[portfolio_show-title]',
        'label'     => __('Show title', 'basic'),
        'section'   => 'portfolio_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[portfolio_show-breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[portfolio_show-breadcrumb]', array(
        'settings'  => 'wpo_theme_options[portfolio_show-breadcrumb]',
        'label'     => __('Show breadcrumb', 'basic'),
        'section'   => 'portfolio_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

     /**
     * Archive Setting
     */
    $wp_customize->add_section( 'portfolio_archive', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Portfolio Archive', 'basic' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[portfolio-items-show]', array(
        'type'       => 'option',
        'default'    => 4,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[portfolio-items-show]', array(
        'label'      => __( 'Number Of post to show', 'basic' ),
        'section'    => 'portfolio_archive',
        'type'       => 'select',
        'choices'     => array(
            '2' => __('2 posts', 'basic' ),
            '3' => __('3 posts', 'basic' ),
            '4' => __('4 posts', 'basic' ),
        )
    ) );

    $wp_customize->add_setting('wpo_theme_options[portfolio-style]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $path = WPO_THEME_DIR.'/templates/portfolio/portfolio-*.php';
    $file_name = 'portfolio-';

    $wp_customize->add_control( 'wpo_theme_options[portfolio-style]', array(
        'label'      => __( 'Archive style', 'basic' ),
        'section'    => 'portfolio_archive',
        'type'       => 'select',
        'choices'     => wpo_get_styles($path, $file_name)
    ) );

     /**
     * Single Setting
     */
    $wp_customize->add_section( 'portfolio_single', array(
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Portfolio Single', 'basic' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

    $wp_customize->add_setting('wpo_theme_options[show-share-portfolio]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-share-portfolio]', array(
        'settings'  => 'wpo_theme_options[show-share-portfolio]',
        'label'     => __('Show share portfolio', 'basic'),
        'section'   => 'portfolio_single',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[show-related-portfolio]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-related-portfolio]', array(
        'settings'  => 'wpo_theme_options[show-related-portfolio]',
        'label'     => __('Show related portfolio', 'basic'),
        'section'   => 'portfolio_single',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );


}
