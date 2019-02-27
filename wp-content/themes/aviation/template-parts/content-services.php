<div class = "service-wrapper">
  <div class = "service-content">
      <?php 
      $services = new WP_Query(array(
          'post_type' => 'services',
          'post_status' => 'publish',
          'posts_per_page' => -1,  
          'order' => 'ASC',
      )); 
      $count = 1;
      ?>
            <section class="regular slider" id="services-home">
      <?php while ($services->have_posts()) { 
          $serial = sprintf("%02d", $count);
          $services->the_post();
          $post_id = get_the_ID();
          $show_in_homepage = get_post_meta(get_the_ID(), 'service-display', TRUE);
          $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
          if($show_in_homepage == '1'):  
      ?>
 
        <div class = "service-slider">
            <div class = "service-block-left">
                  <img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
              </div>    
              <div class = "service-block-right">
                  <div class = 'service-count'>
                      <span> <?php echo $serial;?> </span>
                  </div>
                  <div class = 'service-title'>
                      <?php echo get_the_title();?>
                  </div>
                  <div class = 'service-excerpt'>
                      <?php the_excerpt();?>
                  </div>
                  <div class = 'view-more'>
                      <a href = "/">View more services</a>
                  </div>
              </div>
          </div>
          <?php $count++;
          endif; 
        }
      wp_reset_query(); ?>
       </section>
    </div>
</div>