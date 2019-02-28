<?php
function aviation_post_services() {

    //labels array added inside the function and precedes args array

    $labels = array(
    'name' => _x( 'Services', 'post type general name' ),
    'singular_name' => _x( 'Service', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Service' ),
    'add_new_item' => __( 'Add New Service' ),
    'edit_item' => __( 'Edit Service' ),
    'new_item' => __( 'New Service' ),
    'all_items' => __( 'All Services' ),
    'view_item' => __( 'View Service' ),
    'search_items' => __( 'Search services' ),
    'not_found' => __( 'No service found' ),
    'not_found_in_trash' => __( 'No service found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Services'
    );

    // args array

    $args = array(
    'labels' => $labels,
    'description' => 'Displays partner details',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-admin-tools',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive' => true,
    );

    register_post_type( 'services', $args );
}
add_action( 'init', 'aviation_post_services' );

//creating custom taxonomies for partners custom post

//registration of taxonomies

function aviation_taxonomies_services() {

    //labels array
    
    $labels = array(
    'name' => _x( 'Service Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Service Category', 'taxonomy singular name' ),
    'search_items' => __( 'Search Service Categories' ),
    'all_items' => __( 'All Service Categories' ),
    'parent_item' => __( 'Parent Service Category' ),
    'parent_item_colon' => __( 'Parent Service Category:' ),
    'edit_item' => __( 'Edit Service Category' ),
    'update_item' => __( 'Update Service Category' ),
    'add_new_item' => __( 'Add New Service Category' ),
    'new_item_name' => __( 'New Service Category' ),
    'menu_name' => __( ' Service Categories' ),
    );
    
    //args array
    
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    );
    
    register_taxonomy( 'service_category', 'services', $args );
}

add_action( 'init', 'aviation_taxonomies_services', 0 );

function add_aviation_service_meta_box() {
	add_meta_box(
		'add_aviation_service_meta_box', // $id
		'Service Action Button', // $title
		'aviation_service_action_meta_box', // $callback
		'services', // $screen
		'normal', // $context
		'high' // $priority
    );
    add_meta_box(
		'add_aviation_service_display_meta_box', // $id
		'Display Settings', // $title
		'aviation_service_display_meta_box', // $callback
		'services', // $screen
		'side', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_aviation_service_meta_box' );

function aviation_service_action_meta_box(){
    global $post;
    $buttonlabel = get_post_meta($post->ID, 'service-button-label', true);
    $actionlink = get_post_meta($post->ID, 'service-button-link', true);?>
    <label for="service-button-label">Button Label</label>
    <p>
        <input type="text" name="service-button-label" id="service-button-label" class="service-button-label regular-text" value="<?php echo $buttonlabel; ?>">
    </p>
    <label for="service-button-link">Action Link</label>
    <p>
        <input type="text" name="service-button-link" id="service-button-link" class="service-button-link regular-text" value="<?php echo $actionlink; ?>">
    </p>
    <?php
}

function aviation_service_display_meta_box(){
    global $post;
    $show_in_homepage = get_post_meta($post->ID, 'service-display', true);?>
    <input type="checkbox" name="service-display" <?php if($show_in_homepage == '1') echo 'checked'; ?>>Show in homepage<br>
    <?php
}

function save_aviation_services_fields_meta( $post_id ) {   
    global $post;
    if(isset($_POST["service-button-link"]) && !empty($_POST["service-display"]))
    update_post_meta($post->ID, "service-display", '1');
    else
    update_post_meta($post->ID, "service-display", '0');
    update_post_meta($post->ID, "service-button-link", $_POST["service-button-link"]);
    update_post_meta($post->ID, "service-button-label", $_POST["service-button-label"]);
}
add_action( 'save_post', 'save_aviation_services_fields_meta' );

function aviation_customize_service($wp_customize){
    $wp_customize->add_section(
        'service_section',
        array(
            'title' => __('Service Section'),
            'priority' => null,
            'description'	=> __('Change service section link'),
        )
    );
    $wp_customize->add_setting('service_page_link');
    $wp_customize->add_control('service_page_link',array(
            'label'	=> __('Service Page Link'),
            'section'	=> 'service_section',
            'settings' => 'service_page_link',
            'type'	=> 'dropdown-pages',
    ));
}
add_action( 'customize_register', 'aviation_customize_service' );

