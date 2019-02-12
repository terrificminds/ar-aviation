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