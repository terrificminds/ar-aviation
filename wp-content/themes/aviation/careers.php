<?php /* Template Name: Careers*/ ?>

<?php get_header();?>
<div id="primary" class="content-area careers-wrapper">
	<main id="main" class="site-main1" role="main">
        <?php while ( have_posts() ) : the_post();?>
		<div class=" careers-top">
			<div class="careers-content">
            <div class="careers-top-right">
					<?php the_post_thumbnail();?>
				</div>
				<div class="careers-top-left">
					<h2 class="careers-title">
						<?php single_post_title();?>
                    </h2>
                    <div class="careers-image">
                        <?php the_post_thumbnail();?>
					</div>
					<div class="careers-description">
                        <p><?php the_content();?></p>
					</div>
				</div>
            </div>
        </div>
			<div class="careers-bottom">
                <div class="careers-content">
                    <h2 class="block-title">Open positions</h2>
                    <?php $careers = new WP_Query(array(
                        'post_type' => 'careers',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,  
                        'order' => 'ASC',
                    )); 
                    ?>
                    <?php $i=1; 
                        while ($careers->have_posts()):
                        $careers->the_post();
                        $post_id = get_the_ID();
                        $jobDescription = get_post_meta(get_the_ID(), 'job-description', TRUE);
                        $jobEmail = get_post_meta(get_the_ID(), 'job-email', TRUE); 
                    ?>
                    <div class="panel-group vacancy-accordion" id="accordionGroupClosed" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default vacancy-block">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <div class="panel-title vacancy-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionGroupClosed" href="#<?php echo $i ?>" aria-expanded="true" aria-controls="<?php echo $i ?>">
                                    <?php echo get_the_title();?>
                                    </a>
                                </div>
                            </div>
                            <div id="<?php echo $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body">
                                     <?php echo $jobDescription;?>
                                    <div class = "vacancy-contact">
                                        <?php if($jobEmail != ""):?>
                                        <span>Send your cv to <a href = "mailto: <?php echo $jobEmail;?>"><?php echo $jobEmail;?></a></span>
                                        <?php endif;?>
                                    </div>
                                  </div>
                                </div>
                        </div>
                    </div>
                    <?php   $i++;
                    endwhile;
                   	?>
                </div>
            </div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
