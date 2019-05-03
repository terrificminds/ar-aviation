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
    <section class="services-homepage" id="services-homepage">
      <?php while ($services->have_posts()) { 
          $services->the_post();
          $post_id = get_the_ID();
          $button_label = get_post_meta(get_the_ID(), 'service-button-label', TRUE);
		  $button_link = get_post_meta(get_the_ID(), 'service-button-link', TRUE);
		  $modalImage = get_post_meta(get_the_ID(), 'service_modal_image', TRUE);
          $show_in_homepage = get_post_meta(get_the_ID(), 'service-display', TRUE);
          $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
          if($show_in_homepage == '1' && $count <=3):  
          $count++;  
      ?>
        <div class = "service">
            <div class = "service-block">
                <img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
                <div class = "service-title">
                    <?php echo get_the_title();?>
                </div>
            </div>    
            <div class = "service-block-overlay">
                <div class = "service-body">
                    <?php the_excerpt();?>										
                </div>		
                <div class = 'news-readmore'>
                        <a href="#" data-toggle="modal" data-target="#servicesReadMoreModal<?php echo $post_id; ?>">Read More</a>
                </div>     
            </div>
        </div>
        <!-- Modal For Services ReadMore Link -->
        <div class="modal fade" id="servicesReadMoreModal<?php echo $post_id; ?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                    </div>
                    <div class="modal-body">
                        <!-- modal data -->
                        <div class = "service-block-left">
                            <img class = "service-featured-image" src="<?php echo $modalImage; ?>">
                        </div>    
                        <div class = "service-block-right ">
                            <div class = "service-title">
                                <?php echo get_the_title();?>
                            </div>
                            <div class = "service-body">
                                <?php the_content();?>									
                            </div>
                            <?php if(($button_link != "") && ($button_label != "")):?>
                            <div class = "action-label">
                                <a class="grey-big-btn" target="_blank" href = "<?php echo $button_link ?>"><button><?php echo $button_label;?></button></a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
            </div>	                        
          <?php
          endif; 
        }
      wp_reset_query(); ?>
       </section>
    </div>
</div>