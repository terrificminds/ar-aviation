<?php /* Template Name: News*/ ?>

<?php get_header(); 
$categories = get_terms( array(
    'taxonomy' => 'service_category',
    'hide_empty' => false,
) );
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="news-wrapper">
			<div class="new-container">
				<div class="news-top">
					<div class="newslist-title">
						<?php single_post_title();?>
					</div>
                </div>
                 
                <?php 
                    $news = new WP_Query(array(
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,   
                    )); 
                ?>
                <div class="news-bottom news-content loadMore" data-count="<?php echo $news->post_count ?>"> 
                <?php                    
                    while ($news->have_posts()):
                        $news->the_post();
                        $post_id = get_the_ID();
                        $publishDate = get_the_date();
                        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
                ?>
                    <div class = "news-block item">
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
                            <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Read More</a>
                            </div>     
                        </div>            
                    </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
			</div>
		</div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
