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

function aviation_post_members() {

        //labels array added inside the function and precedes args array
    
        $labels = array(
        'name' => _x( 'Members', 'post type general name' ),
        'singular_name' => _x( 'Member', 'post type singular name' ),
        'add_new' => _x( 'Add New', 'Member' ),
        'add_new_item' => __( 'Add New Member' ),
        'edit_item' => __( 'Edit Member' ),
        'new_item' => __( 'New Member' ),
        'all_items' => __( 'All Members' ),
        'view_item' => __( 'View Member' ),
        'search_items' => __( 'Search members' ),
        'not_found' => __( 'No member found' ),
        'not_found_in_trash' => __( 'No member found in the Trash' ),
        'parent_item_colon' => '',
        'menu_name' => 'Members'
        );
    
        // args array
    
        $args = array(
        'labels' => $labels,
        'description' => 'Display all members of aviation team',
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title','thumbnail'),
        'has_archive' => true,
        );
    
        register_post_type( 'members', $args );
    }
    add_action( 'init', 'aviation_post_members' );
    
    function add_aviation_member_meta_box() {
        add_meta_box(
                'add_aviation_member_meta_box', // $id
                'Member Details', // $title
                'aviation_member_action_meta_box', // $callback
                'members', // $screen
                'normal', // $context
                'high' // $priority
        );
    }
    add_action( 'add_meta_boxes', 'add_aviation_member_meta_box' );
    
    function aviation_member_action_meta_box(){
        global $post;
        $memberName = get_post_meta($post->ID, 'member-name', true);
        $memberDesignation = get_post_meta($post->ID, 'member-designation', true);
        $memberQuote = get_post_meta($post->ID, 'member-quote', true);?>
        <label for="member-name">Member Name</label>
        <p>
            <input type="text" name="member-name" id="member-name" class="member-name regular-text" value="<?php echo $memberName; ?>">
        </p>
        <label for="member-designation">Member Designation</label>
        <p>
            <input type="text" name="member-designation" id="member-designation" class="member-designation regular-text" value="<?php echo $memberDesignation; ?>">
        </p>
        <label for="member-designation">Member Quote</label>
        <p>
            <textarea rows = "5" cols = "50" name="member-quote" id="member-quote" class="member-quote regular-text">
            <?php echo $memberQuote;?>
            </textarea>
        </p>
        <?php
    }
    
    function save_aviation_members_fields_meta( $post_id ) {   
        global $post;
        update_post_meta($post->ID, "member-designation", $_POST["member-designation"]);
        update_post_meta($post->ID, "member-name", $_POST["member-name"]);
        update_post_meta($post->ID, "member-quote", $_POST["member-quote"]);
    }
    add_action( 'save_post', 'save_aviation_members_fields_meta' );

    function aviation_customize_about_gallery($wp_customize){
        $wp_customize->add_section(
            'about_gallery_section',
            array(
                'title' => __('About Page Gallery'),
                'priority' => null,
                'description'	=> __('Add gallery images for about us page.'),
            )
        );
        for ($i=1; $i < 6; $i++ ) { 
            $wp_customize->add_setting("about-image-$i");
            $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,"about-image-$i",array(
                'label'	=> __("Galley Image $i"),
                'section'	=> 'about_gallery_section',
                'settings' => "about-image-$i",
                'height' => '1000',
                'width' => '2500'
            )));
        }
        
    }
    add_action( 'customize_register', 'aviation_customize_about_gallery' );