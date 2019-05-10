<?php
function aviation_post_associates() {

    //labels array added inside the function and precedes args array

    $labels = array(
    'name' => _x( 'Associates', 'post type general name' ),
    'singular_name' => _x( 'Associate', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Associate' ),
    'add_new_item' => __( 'Add New Associate' ),
    'edit_item' => __( 'Edit Associate' ),
    'new_item' => __( 'New Associate' ),
    'all_items' => __( 'All Associates' ),
    'view_item' => __( 'View Associate' ),
    'search_items' => __( 'Search associates' ),
    'not_found' => __( 'No associate found' ),
    'not_found_in_trash' => __( 'No associate found in the Trash' ),
    'parent_item_colon' => '',
    'featured_image' => __( 'Associate Logo'),
    // Overrides the “Set featured image” label
    'set_featured_image'=> __( 'Set Associate logo'),
    // Overrides the “Remove featured image” label
    'remove_featured_image' => __( 'Remove Associate logo'),
    'menu_name' => 'Associates'
    );

    // args array

    $args = array(
    'labels' => $labels,
    'description' => 'Displays associate details',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-image-filter',
    'supports' => array( 'title','thumbnail'),
    'has_archive' => true,
    );

    register_post_type( 'associates', $args );
}
add_action( 'init', 'aviation_post_associates' );

function add_aviation_associate_meta_box() {
	add_meta_box(
		'add_aviation_associate_meta_box', // $id
		'Associate Website Link', // $title
		'aviation_associate_website_meta_box', // $callback
		'associates', // $screen
		'advanced', // $context
		'high' // $priority
    );
    add_meta_box(
		'add_aviation_associate_background_meta_box', // $id
		'Associate Block Background', // $title
		'aviation_associate_background_meta_box', // $callback
		'associates', // $screen
		'advanced', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_aviation_associate_meta_box' );

function aviation_associate_website_meta_box(){
    global $post;
    $associateWebsite = get_post_meta($post->ID, 'associate_website_link', true);?>
    <label for="associate-website-link">Associate Website Link</label>
    <p>
        <input type="text" name="associate-website-link" id="associate-website-link" class="associate-website-link regular-text" value="<?php echo $associateWebsite; ?>">
    </p>
    <?php
}

function aviation_associate_background_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'associate_background', true);?>
    <p>
        <label for="associate-background">Associate Block Background</label><br>
        <input type="text" name="associate-background" id="associate-background" class="associate-background regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button associate-background-upload" value="Browse">
    </p>
    <div class="associate-background-preview"><img class = "associate-background-image" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_aviation_associates_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "associate_website_link", $_POST["associate-website-link"]);
    update_post_meta($post->ID, "associate_background", $_POST["associate-background"]);
}
add_action( 'save_post', 'save_aviation_associates_fields_meta' );

function avaiation_associates_title_text( $title ){
    $screen = get_current_screen();
    if  ( 'associates' == $screen->post_type ) {
         $title = 'Enter associate name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'avaiation_associates_title_text' );