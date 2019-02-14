<?php
function aviation_customize_about($wp_customize){
    $wp_customize->add_section(
        'about_section',
        array(
            'title' => __('About Us'),
            'priority' => null,
            'description'	=> __('Change about us contents'),
        )
    );
    $wp_customize->add_setting('about-title');
    $wp_customize->add_control('about-title',array(
            'label'	=> __('Title'),
            'section'	=> 'about_section',
            'settings' => 'about-title',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('about-image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about-image',array(
            'label'	=> __('About Us Image'),
            'section'	=> 'about_section',
            'settings' => 'about-image',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about-shortdescription');
    $wp_customize->add_control('about-shortdescription',array(
            'label'	=> __('About Us Short Description'),
            'section'	=> 'about_section',
            'settings' => 'about-shortdescription',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('about-background');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about-background',array(
            'label'	=> __('Background Image'),
            'section'	=> 'about_section',
            'settings' => 'about-background',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about-readmore');
    $wp_customize->add_control('about-readmore',array(
            'label'	=> __('Read More Link'),
            'description' => __('Choose about us page'),
            'section'	=> 'about_section',
            'settings' => 'about-readmore',
            'type'	=> 'dropdown-pages',
    ));
}
add_action( 'customize_register', 'aviation_customize_about' );