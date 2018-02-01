<?php

/**
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function stephanerenard_customize_register( $wp_customize ) {
    
    // Add company section -----------------------------------------------------
    
    $wp_customize->add_section( 'company', array(
        'title' => 'Informations de contact',
    ) );

    // Add Company settings and controls in related section
    $wp_customize->add_setting( 'company_email', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_setting( 'company_phone', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_setting( 'company_address', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'company_email', array(
        'label'     => 'Email',
        'section'   => 'company',
        'settings'  => 'company_email',
        'type'      => 'email',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'company_phone', array(
        'label'     => 'Numéro de téléphone',
        'section'   => 'company',
        'settings'  => 'company_phone',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'company_address', array(
        'label'     => 'Adresse',
        'section'   => 'company',
        'settings'  => 'company_address',
        'type'      => 'textarea'
    ) ) );

    // Add Gmap section --------------------------------------------------------
    $wp_customize->add_section( 'map', array(
        'title' => 'Carte',
    ) );

    $wp_customize->add_setting( 'map_lat_01', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_lat_01', array(
        'label'     => 'Latitude de la première adresse',
        'section'   => 'map',
        'settings'  => 'map_lat_01',
        // 'type'      => 'number',
    ) ) );

    $wp_customize->add_setting( 'map_lng_01', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_lng_01', array(
        'label'     => 'Longitude de la première adresse',
        'section'   => 'map',
        'settings'  => 'map_lng_01',
        // 'type'      => 'number',
    ) ) );

    $wp_customize->add_setting( 'map_title_01', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_title_01', array(
        'label'     => 'Titre de la première adresse',
        'section'   => 'map',
        'settings'  => 'map_title_01',
        // 'type'      => 'number',
    ) ) );

       $wp_customize->add_setting( 'map_lat_02', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_lat_02', array(
        'label'     => 'Latitude de la deuxième adresse',
        'section'   => 'map',
        'settings'  => 'map_lat_02',
        // 'type'      => 'number',
    ) ) );

    $wp_customize->add_setting( 'map_lng_02', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_lng_02', array(
        'label'     => 'Longitude de la deuxième adresse',
        'section'   => 'map',
        'settings'  => 'map_lng_02',
        // 'type'      => 'number',
    ) ) );

    $wp_customize->add_setting( 'map_title_02', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_title_02', array(
        'label'     => 'Titre de la deuxième adresse',
        'section'   => 'map',
        'settings'  => 'map_title_02',
        // 'type'      => 'number',
    ) ) );

    $wp_customize->add_setting( 'map_zoom', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'map_zoom', array(
        'label'     => 'Zoom',
        'section'   => 'map',
        'settings'  => 'map_zoom',
        // 'type'      => 'number',
    ) ) );


    // Add socials section -----------------------------------------------------
    
    $wp_customize->add_section( 'socials', array(
        'title' => 'Réseaux sociaux',
    ) );

    // Add Company settings and controls in related section
    // FACEBOOK
    $wp_customize->add_setting( 'social_facebook', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_facebook', array(
        'label'     => 'Facebook',
        'section'   => 'socials',
        'settings'  => 'social_facebook',
        'type'      => 'url',
    ) ) );
    
    // TWITTER
    $wp_customize->add_setting( 'social_twitter', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter', array(
        'label'     => 'Twitter',
        'section'   => 'socials',
        'settings'  => 'social_twitter',
        'type'      => 'url',
    ) ) );
    
    // GOOGLE +
    $wp_customize->add_setting( 'social_googleplus', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

     $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_googleplus', array(
        'label'     => 'Google+',
        'section'   => 'socials',
        'settings'  => 'social_googleplus',
        'type'      => 'url',
    ) ) );

     // Add Footer section -----------------------------------------------------

    $wp_customize->add_section( 'footer', array(
        'title' => 'Les images du footer',
    ) );

    $wp_customize->add_setting( 'footer_img_first', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_setting( 'footer_img_third', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_setting( 'footer_img_second', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_img_first', array(
        'label'      => __( 'Sélectionnez la première photo', 'stephanerenard' ),
        'section'    => 'footer',
        'settings'   => 'footer_img_first',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_img_second', array(
        'label'      => __( 'Sélectionnez la seconde photo', 'stephanerenard' ),
        'section'    => 'footer',
        'settings'   => 'footer_img_second', 
    ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_img_third', array(
        'label'      => __( 'Sélectionnez la troisième photo', 'stephanerenard' ),
        'section'    => 'footer',
        'settings'   => 'footer_img_third',
    ) ) );
}
add_action( 'customize_register', 'stephanerenard_customize_register', 11 );

if ( function_exists( 'eae_encode_emails' ) ) :

function stephanerenard_option_encode_email( $value ) {
    return eae_encode_emails( $value );
}
add_filter( 'option_email', 'stephanerenard_option_encode_email' );

endif;