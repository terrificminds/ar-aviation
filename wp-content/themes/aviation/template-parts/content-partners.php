<div class = "partners-wrapper">
  <div class = "partner-1-background">
    <div class = "partner-1-content">
        <?php
        $partner_1 = new WP_Query(array(
            'post_type' => 'partner',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array (
                    'taxonomy' => 'partner_category',
                    'field' => 'term_taxonomy_id',
                    'terms' => '3',
                )
            ),
        ));
        $category = get_term_by( 'term_taxonomy_id', '3', 'partner_category');
        ?>
        <h2><?php echo $category->name;?></h2>
        <div class = "partner-slider">
          <section class="regular slider" id="partner-home">
            <?php while ($partner_1->have_posts()) {
                $partner_1->the_post();
                $post_id = get_the_ID();
                $partnerTitle = get_the_title();
                // $description = the_content();
                // $summary = the_excerpt();
                $logoUrl = get_post_meta(get_the_ID(), 'partnerlogo', TRUE);
                $websiteLink = get_post_meta(get_the_ID(), 'partner-website', TRUE);
                $modalImage = get_post_meta(get_the_ID(), 'partner-modal-image', TRUE);
                $modalLogo = get_post_meta(get_the_ID(), 'partner-modal-logo', TRUE);
                if(!isset($modalLogo) || empty($modalLogo))
                $modalLogo = $logoUrl;
                $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
            ?>
            <div>
              <div class = "partner-1-left">
                <div class="partner-1-left-content">
                  <div class = 'partner-1-logo'>
                      <img src="<?php echo $logoUrl;?>">
                  </div>
                  <div class = "partner-image-mob">
                      <img class = "partner-featured-image" src="<?php echo $featuredImage[0]; ?>">
                  </div>
                  <div class = 'partner-1-title'>
                      <?php echo get_the_title();?>
                  </div>
                  <div class = 'partner-1-excerpt'>
                      <?php the_excerpt();?>
                  </div>
                  <div class = 'read-more'>
                      <a href = "/">Read More</a>
                  </div>
                </div>
              </div>
              <div class = "partner-1-right">
                  <img class = "partner-featured-image" src="<?php echo $featuredImage[0]; ?>">
              </div>
              <div class = "partner-1-modal">
                  <div class = "partner-modal-left">
                      <div class = "partner-logo">
                        <img src="<?php echo $modalLogo;?>">
                      </div>
                      <div class = "partner-body">
                          <?php the_content();?>
                      </div>
                      <a href = "<?php echo $websiteLink?>">
                          <button type="button"> Visit Website </button>
                      </a>
                  </div>
                  <div class = "partner-modal-right">
                      <img src="<?php echo $modalImage;?>">
                  </div>
              </div>
            </div>
        <?php    }
        wp_reset_query(); ?>
        </section>
      </div>
    </div>
  </div>
  <div class = "partner-2-background">
    <?php
    $partner_2 = new WP_Query(array(
        'post_type' => 'partner',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
            array (
                'taxonomy' => 'partner_category',
                'field' => 'term_taxonomy_id',
                'terms' => '4',
            )
        ),
    ));
    $category = get_term_by( 'term_taxonomy_id', '4', 'partner_category');
    ?>
    <?php while ($partner_2->have_posts()) {
        $partner_2->the_post();
        $post_id = get_the_ID();
        $partnerTitle = get_the_title();
        //$description = the_content();
        $logoUrl = get_post_meta(get_the_ID(), 'partnerlogo', TRUE);
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
    ?>
    <div class = "partner-2-content">
        <div class = "partner-2-left">
            <div class = "partner-2-logo">
                <img src="<?php echo $logoUrl;?>">
            </div>
            <h2><?php echo $category->name;?></h2>
            <div class = 'partner-2-body'>
                <img class = "partner-featured-image" src="<?php echo $featuredImage[0]; ?>">
                <?php echo the_content();?>
            </div>
        </div>
        <div class = "partner-2-right">
            <img class = "partner-featured-image" src="<?php echo $featuredImage[0]; ?>">
        </div>
    </div>
    <?php    }
    wp_reset_query(); ?>
  </div>
</div>
