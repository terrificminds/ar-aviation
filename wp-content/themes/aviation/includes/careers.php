<?php
function aviation_post_careers() {

    //labels array added inside the function and precedes args array

    $labels = array(
    'name' => _x( 'Careers', 'post type general name' ),
    'singular_name' => _x( 'Career', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Vacancy' ),
    'add_new_item' => __( 'Add New Job Vacancy' ),
    'edit_item' => __( 'Edit Job' ),
    'new_item' => __( 'New Job Vacancy' ),
    'all_items' => __( 'All Vacancies' ),
    'view_item' => __( 'View Vacancy' ),
    'search_items' => __( 'Search vacancies' ),
    'not_found' => __( 'No job vacancy found' ),
    'not_found_in_trash' => __( 'No vacancy found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Careers'
    );

    // args array

    $args = array(
    'labels' => $labels,
    'description' => 'Add new job vacancies',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-editor-customchar',
    'supports' => array( 'title'),
    'has_archive' => true,
    );

    register_post_type( 'careers', $args );
}
add_action( 'init', 'aviation_post_careers' );

function add_aviation_careers_meta_box() {
	add_meta_box(
		'add_aviation_careers_meta_box', // $id
		'Job Details', // $title
		'aviation_careers_meta_box', // $callback
		'careers', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_aviation_careers_meta_box' );

function aviation_careers_meta_box(){
    global $post;
    $jobDesc = get_post_meta($post->ID, 'job-description', true);
    $jobEmail = get_post_meta($post->ID, 'job-email', true);?>
    <label for="service-button-label">Job Description</label>
    <p>
        <textarea name="job-description" id="job-description" class="job-description regular-text" ><?php echo $jobDesc ; ?></textarea>
    </p>
    <label for="service-button-link">Email Address</label><br>
    <i>email address of the company/organization.</i>
    <p>
        <input type="email" name="job-email" id="job-email" class="job-email regular-text" value="<?php echo $jobEmail; ?>">
    </p>
    <?php
}

function save_aviation_careers_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "job-description", $_POST["job-description"]);
    update_post_meta($post->ID, "job-email", $_POST["job-email"]);
}
add_action( 'save_post', 'save_aviation_careers_fields_meta' );

