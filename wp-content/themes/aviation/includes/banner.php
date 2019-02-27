<?php
function aviation_banner_customizer( $wp_customize ) {

$wp_customize->add_section("homepage-banner", array(
"title" => __("Homepage Banner"),
"priority" => 0,
));

$wp_customize->add_setting( 'banner-video',
array(
'default' => '',
'transport' => 'refresh',
'sanitize_callback' => 'absint',
     'type' => 'theme_mod',
)
);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner-video',
array(
'label' => __( 'Homepage Banner Video' ),
'description' => esc_html__( 'Please upload a banner video' ),
'section' => 'homepage-banner',
'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
'button_labels' => array( // Optional
 'select' => __( 'Select File' ),
 'change' => __( 'Change File' ),
 'default' => __( 'Default' ),
 'remove' => __( 'Remove' ),
 'placeholder' => __( 'No file selected' ),
 'frame_title' => __( 'Select File' ),
 'frame_button' => __( 'Choose File' ),

)
)));
$wp_customize->add_setting('banner-image');
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'banner-image',array(
        'label'	=> __('Homepage Banner'),
        'section'	=> 'homepage-banner',
        'settings' => 'banner-image',
        'height' => '1000',
        'width' => '2500'
)));
$wp_customize->add_setting('banner-title');
$wp_customize->add_control('banner-title',array(
        'label'	=> __('Banner Title'),
        'section'	=> 'homepage-banner',
        'settings' => 'banner-title',
        'type'	=> 'text',
));
$wp_customize->add_setting('banner-subtitle');
$wp_customize->add_control('banner-subtitle',array(
        'label'	=> __('Banner SubTitle'),
        'section'	=> 'homepage-banner',
        'settings' => 'banner-subtitle',
        'type'	=> 'text',
));
$wp_customize->add_setting('banner-button-label');
$wp_customize->add_control('banner-button-label',array(
        'label'	=> __('Banner Button Label'),
        'section'	=> 'homepage-banner',
        'settings' => 'banner-button-label',
        'type'	=> 'text',
));
$wp_customize->add_setting('banner-button-link');
$wp_customize->add_control('banner-button-link',array(
        'label'	=> __('Banner Button Link'),
        'section'	=> 'homepage-banner',
        'settings' => 'banner-button-link',
        'type'	=> 'dropdown-pages',
));
}

add_action( 'customize_register', 'aviation_banner_customizer' );