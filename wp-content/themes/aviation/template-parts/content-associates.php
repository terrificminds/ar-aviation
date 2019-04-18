<div class = "associates-wrapper">
  <div class = "associates-content">
      <?php 
        $associates = new WP_Query(array(
          'post_type' => 'associates',
          'post_status' => 'publish',
          'posts_per_page' => -1,  
          'order' => 'ASC',
        )); 
        ?>
        <?php while ($associates->have_posts()):
          $associates->the_post();
          $post_id = get_the_ID();
          $associateWebsiteLink = get_post_meta(get_the_ID(), 'associate_website_link', TRUE);
          $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
        ?>
        <div class = "associates-slider">   
              <div class = "associates-block">
                  <div class = 'associate'>
                      <a href=<?php echo $associateWebsiteLink?>><img src="<?php echo $featuredImage[0]?>"></a>
                  </div>
              </div>
          </div>
        <?php endwhile;
        wp_reset_query(); ?>
    </div>
</div>