<?php 

function aviation_post_news() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'News', 'post type general name' ),
'singular_name' => _x( 'News', 'post type singular name' ),
'add_new' => _x( 'Add News', 'Partner' ),
'add_new_item' => __( 'Add New News' ),
'edit_item' => __( 'Edit News' ),
'new_item' => __( 'Latest News' ),
'all_items' => __( 'All News' ),
'view_item' => __( 'View News' ),
'search_items' => __( 'Search news' ),
'not_found' => __( 'No news found' ),
'not_found_in_trash' => __( 'No news found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'News & Events'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'News and events post type',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'news', $args );
}
add_action( 'init', 'aviation_post_news' );

function add_aviation_news_meta_box() {
	add_meta_box(
		'add_aviation_news_meta_box', // $id
		'News Banner Image', // $title
		'aviation_news_banner_meta_box', // $callback
		'news', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_aviation_news_meta_box' );

function aviation_news_banner_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'newsbanner', true);?>
    <p>
        <label for="newsbanner">News Banner Upload</label><br>
        <input type="text" name="newsbanner" id="newsbanner" class="newsbanner regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button news-banner-upload" value="Browse">
    </p>
    <div class="news-banner-preview"><img class = "news-banner" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_aviation_news_fields_meta( $post_id ) {
    global $post;
    update_post_meta($post->ID, "newsbanner", $_POST["newsbanner"]);
}
add_action( 'save_post', 'save_aviation_news_fields_meta' );
