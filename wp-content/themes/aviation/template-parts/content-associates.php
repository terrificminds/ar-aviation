<div class = "associates-wrapper">
  <div class = "associates-content">
  <section class="associate-main-block" id="">
      <h2 class="block-title">Our Associates</h2>
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
            $associateBackground = get_post_meta(get_the_ID(), 'associate_background', TRUE);
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
          ?>
          <div class="associate-content">
          <a href=<?php echo $associateWebsiteLink?>>
            <div class="associate-block" style="background-image: url(<?php echo $associateBackground ?>)">
              <div class = "associates-image">                   
                  <img src="<?php echo $featuredImage[0]?>">                
              </div>
              <div class="associates-link">
                <div class="assoc-link-wrapper">
                  <div class = "associates-title">                   
                      <p><?php echo get_the_title()?></p>                
                  </div>
                  <div class = "associates-visit-website">                   
                      <p>Visit Website</p>                
                  </div>
                </div>                
              </div>              
            </div>
          </a>
          </div>
          <?php endwhile;
          wp_reset_query(); ?>
        </section>  
    </div>
</div>