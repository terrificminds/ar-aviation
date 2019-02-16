<div class = "news-wrapper">
    <h2 class="block-title">News and Events</h2>
    <div class = "news-content">
        <?php 
        $news = new WP_Query(array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => -1,   
        )); 
        while ($news->have_posts()) { 
            $news->the_post();
            $post_id = get_the_ID();
            $publishDate = get_the_date();
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
        ?>
         <div class = "news-block">
            <div class = "news-image">
                <img class = "news-featured-image" src="<?php echo $featuredImage[0]; ?>">
            </div>
            <div class="news-details-wrapper">
                <div class = 'news-date'>
                    <?php echo $publishDate;?>
                </div>
                <div class = 'news-title'>
                  <p><?php echo get_the_title();?></p>
                </div>
                <div class = 'news-excerpt'>
                    <?php the_excerpt();?>
                </div> 
                <div class = 'news-readmore'>
                <a href="#">Read More</a>
                </div>     
            </div>            
        </div>
        <?php    }
        wp_reset_query(); ?>
    </div>
</div>