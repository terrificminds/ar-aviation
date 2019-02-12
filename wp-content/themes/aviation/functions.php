<?php

// Adding Custom Post Type for Adding Partners

function aviation_post_partners() {

    //labels array added inside the function and precedes args array

    $labels = array(
    'name' => _x( 'Partners', 'post type general name' ),
    'singular_name' => _x( 'Partner', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Partner' ),
    'add_new_item' => __( 'Add New Partner' ),
    'edit_item' => __( 'Edit Partner' ),
    'new_item' => __( 'New Partner' ),
    'all_items' => __( 'All Partners' ),
    'view_item' => __( 'View Partner' ),
    'search_items' => __( 'Search partners' ),
    'not_found' => __( 'No partner found' ),
    'not_found_in_trash' => __( 'No partner found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Partners'
    );

    // args array

    $args = array(
    'labels' => $labels,
    'description' => 'Displays partner details',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-groups',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive' => true,
    );

    register_post_type( 'partner', $args );
}
add_action( 'init', 'aviation_post_partners' );

//creating custom taxonomies for partners custom post

//registration of taxonomies

function aviation_taxonomies_partners() {

    //labels array
    
    $labels = array(
    'name' => _x( 'Partner Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Partner Category', 'taxonomy singular name' ),
    'search_items' => __( 'Search Partner Categories' ),
    'all_items' => __( 'All Partner Categories' ),
    'parent_item' => __( 'Parent Partner Category' ),
    'parent_item_colon' => __( 'Parent Partner Category:' ),
    'edit_item' => __( 'Edit Partner Category' ),
    'update_item' => __( 'Update Partner Category' ),
    'add_new_item' => __( 'Add New Partner Category' ),
    'new_item_name' => __( 'New Partner Category' ),
    'menu_name' => __( ' Partner Categories' ),
    );
    
    //args array
    
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    );
    
    register_taxonomy( 'partner_category', 'partner', $args );
}

add_action( 'init', 'aviation_taxonomies_partners', 0 );

function add_aviation_meta_box() {
	add_meta_box(
		'add_aviation_meta_box', // $id
		'Partner Logo', // $title
		'aviation_partner_logo_meta_box', // $callback
		'partner', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_aviation_meta_box' );

function aviation_partner_logo_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'partnerlogo', true);?>
    <p>
        <label for="partnerlogo">Logo Upload</label><br>
        <input type="text" name="partnerlogo" id="partnerlogo" class="partnerlogo regular-text" value="<?php echo $meta; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>
    <div class="image-preview"><img src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_aviation_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "partnerlogo", $_POST["partnerlogo"]);
}
add_action( 'save_post', 'save_aviation_fields_meta' );


/**
 * Register and enqueue a custom script in the WordPress admin.
 */
function aviation_custom_scripts() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array( 'jquery' )
    );
}
 
add_action( 'admin_enqueue_scripts', 'aviation_custom_scripts');

function add_theme_scripts() {

    wp_enqueue_style( 'style',
       get_stylesheet_directory_uri() . '/css/custom.css',
      array(),
       '1.1', 
       'all'
    );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
include_once( get_stylesheet_directory() .'/includes/services.php');
?>
