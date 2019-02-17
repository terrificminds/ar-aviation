<?php
function aviation_customize_contact($wp_customize){
    $wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Contact Section'),
            'priority' => null,
            'description'	=> __('Change contact page address'),
        )
    );
    $wp_customize->add_setting('contact-address');
    $wp_customize->add_control('contact-address',array(
            'label'	=> __('Contact Address'),
            'section'	=> 'contact_section',
            'settings' => 'contact-address',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('contact-telephone');
    $wp_customize->add_control('contact-telephone',array(
            'label'	=> __('Tel'),
            'description' => __('Enter your contact number'),
            'section'	=> 'contact_section',
            'settings' => 'contact-telephone',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('contact-map');
    $wp_customize->add_control('contact-map',array(
            'label'	=> __('Map'),
            'section'	=> 'contact_section',
            'description' => __('Enter the embed source url'),
            'settings' => 'contact-map',
            'type'	=> 'textarea',
    ));
}

add_action( 'customize_register', 'aviation_customize_contact' );