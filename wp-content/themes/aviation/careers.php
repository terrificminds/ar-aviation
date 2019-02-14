<?php /* Template Name: Careers*/ ?>

<?php get_header();?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="careers-content">
			<div class="careers-top">
				<div class="careers-top-left">
					<div class="careers-title">
						<?php single_post_title();?>
					</div>
					<div class="careers-description">
						<?php the_content();?>
					</div>
				</div>
				<div class="careers-top-right">
					<?php the_post_thumbnail();?>
				</div>
			</div>
			<div class="careers-bottom">
                <div class="careers-content">
                    <h2>Open positions</h2>
                    <?php $careers = new WP_Query(array(
                        'post_type' => 'careers',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,  
                        'order' => 'ASC',
                    )); 
                    ?>
                    <?php while ($careers->have_posts()):
                        $careers->the_post();
                        $post_id = get_the_ID();
                        $jobDescription = get_post_meta(get_the_ID(), 'job-description', TRUE);
                        $jobEmail = get_post_meta(get_the_ID(), 'job-email', TRUE); 
                    ?>
                    <div class = "vacancy-accordion">  
                        <div class = "vacancy-block">
                            <div class = "vacancy-title">
                                <?php echo get_the_title();?>
                            </div>
                            <div class = "vacancy-description">
                                <p><?php echo $jobDescription;?></p>
                            </div>
                            <div class = "vacancy-contact">
                                <span>Send your cv to <?php echo $jobEmail;?></span>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;	?>
                </div>
			</div>
		</div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
