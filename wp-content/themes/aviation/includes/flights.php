<?php 
function aviation_post_flights() {
//labels array added inside the function and precedes args array
$labels = array(
'name' => _x( 'Flights', 'post type general name' ),
'singular_name' => _x( 'Flight', 'post type singular name' ),
'add_new' => _x( 'Add Flight Details', 'Partner' ),
'add_new_item' => __( 'Add New Flight Details' ),
'edit_item' => __( 'Edit Details' ),
'new_item' => __( 'Latest Flight Details' ),
'all_items' => __( 'All Flight Details' ),
'view_item' => __( 'View Flight Details' ),
'search_items' => __( 'Search details' ),
'not_found' => __( 'No details found' ),
'not_found_in_trash' => __( 'No flight details found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Flights'
);
// args array
$args = array(
'labels' => $labels,
'description' => 'Flight details post type',
'public' => true,
'menu_icon' => 'dashicons-performance',
'menu_position' => 4,
'supports' => array( 'title','editor', 'thumbnail'),
'has_archive' => true,
);
register_post_type( 'flights', $args );
}
add_action( 'init', 'aviation_post_flights' );

function add_aviation_flight_meta_box() {
    add_meta_box(
		'add_aviation_flight_featured_text_meta_box', // $id
		'Flights Featured Content', // $title
		'aviation_flight_featured_text_meta_box', // $callback
		'flights', // $screen
		'advanced', // $context
		'high' // $priority
	);
    add_meta_box(
		'add_aviation_flight_chart_1_meta_box', // $id
		'Flight Chart 1', // $title
		'aviation_flight_chart_1_meta_box', // $callback
		'flights', // $screen
		'advanced', // $context
		'high' // $priority
    );
    add_meta_box(
		'add_aviation_flights_chart_2_meta_box', // $id
		'Flight Chart 2', // $title
		'aviation_flights_chart_2_meta_box', // $callback
		'flights', // $screen
		'advanced', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_aviation_flight_meta_box' );

function aviation_flight_featured_text_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'flight_featured_text', true);
    ?>
    <label>This text appears below the featured image in frontend.</label>
    <br> 
    <textarea name="flight_featured_text" rows="5" cols="40"><?php echo $meta;?></textarea> 
    <?php
}

function aviation_flight_chart_1_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'flights_chart_1', true);?>
    <p>
        <label for="flights-chart-1">Upload flight chart 1</label><br>
        <input type="text" name="flights-chart-1" id="flights-chart-1" class="flights-chart-1 regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button flights-chart-1-upload" value="Browse">
    </p>
    <div class="flights-chart-1-preview"><img class = "flights-chart-1-image" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function aviation_flights_chart_2_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'flights_chart_2', true);?>
    <p>
        <label for="flights-chart-2">Upload flight chart 2</label><br>
        <input type="text" name="flights-chart-2" id="flights-chart-2" class="flights-chart-2 regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button flights-chart-2-upload" value="Browse">
    </p>
    <div class="flights-chart-2-preview"><img class = "flights-chart-2-image" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_aviation_flight_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "flight_featured_text", $_POST["flight_featured_text"]);
    update_post_meta($post->ID, "flights_chart_2", $_POST["flights-chart-2"]);
    update_post_meta($post->ID, "flights_chart_1", $_POST["flights-chart-1"]);
}
add_action( 'save_post', 'save_aviation_flight_fields_meta' );