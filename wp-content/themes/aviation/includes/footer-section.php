<?php

/* Add new footer menu */
function register_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
  }
  add_action( 'init', 'register_footer_menu' );

function aviation_customize_footer($wp_customize){
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('Footer Section'),
            'priority' => null,
            'description'	=> __('Change footer contents'),
        )
    );
    $wp_customize->add_setting('footer-logo');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'footer-logo',array(
            'label'	=> __('Footer Logo'),
            'section'	=> 'footer_section',
            'settings' => 'footer-logo',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('footer-description');
    $wp_customize->add_control('footer-description',array(
            'label'	=> __('Footer Description'),
            'section'	=> 'footer_section',
            'settings' => 'footer-description',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('address-block');
    $wp_customize->add_control('address-block',array(
            'label'	=> __('Address Block'),
            'section'	=> 'footer_section',
            'settings' => 'address-block',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('telephone-block');
    $wp_customize->add_control('telephone-block',array(
            'label'	=> __('Tel'),
            'description' => __('Enter your contact number'),
            'section'	=> 'footer_section',
            'settings' => 'telephone-block',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('website-copyright');
    $wp_customize->add_control('website-copyright',array(
            'label'	=> __('Copyright'),
            'section'	=> 'footer_section',
            'settings' => 'website-copyright',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('website-terms');
    $wp_customize->add_control('website-terms',array(
            'label'	=> __('Terms and Conditions'),
            'description' => __('Choose a page'),
            'section'	=> 'footer_section',
            'settings' => 'website-terms',
            'type'	=> 'dropdown-pages',
    ));
    $wp_customize->add_setting('website-privacy');
    $wp_customize->add_control('website-privacy',array(
            'label'	=> __('Privacy Policy'),
            'description' => __('Choose a privacy policy page'),
            'section'	=> 'footer_section',
            'settings' => 'website-privacy',
            'type'	=> 'dropdown-pages',
    ));
}

add_action( 'customize_register', 'aviation_customize_footer' );