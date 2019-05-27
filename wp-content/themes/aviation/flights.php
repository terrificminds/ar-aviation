<?php /* Template Name: Flights */ ?>

<?php get_header();?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post();?>
	<div class="flights-content-wrapper">
			<div class="flights-container">
				<div class="flights-content">
					<?php $flights = new WP_Query(array(
										'post_type' => 'flights',
										'post_status' => 'publish',
										'posts_per_page' => -1,
									));
									$count=0;
									?>
						 	<div class="flight-tab-slider" role="tabpanel">								
								<ul class="nav nav-tabs" role="tablist">
									<!-- <li class="active"><a href="#test" role="tab" data-toggle="tab">test</a></li> -->
										<?php while ($flights->have_posts()):
												$flights->the_post();
												$post_id = get_the_ID();
												$count+=1;
											?>
											<li class="<?php if($count==1){ echo "active";} ?>"><a href="#tab-<?php echo $post_id;?>" role="tab" data-toggle="tab"><?php echo get_the_title();?></a></li>
										 
									
											<?php endwhile;	?>	
								</ul>
								<div class="tab-content">
									<!-- <div role="tabpanel" class="tab-pane active" id="test">Sunday</div> -->
									<?php 	$count=0; while ($flights->have_posts()):
										$flights->the_post();
										$post_id = get_the_ID();
										$featuredContent = get_post_meta(get_the_ID(), 'flight_featured_text', TRUE);
										$chart1Link = get_post_meta(get_the_ID(), 'flights_chart_1', TRUE);
										$chart2Link = get_post_meta(get_the_ID(), 'flights_chart_2', TRUE);
										$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
									
									?>
									<div role="tabpanel" class="tab-pane <?php if($count==0){ echo "active";} $count++ ?>" id="tab-<?php echo $post_id;?>">
										<div class = "flight-featured-image">
											<?php if(isset($featuredImage[0]) || $featuredImage[0] != ""):?>
											<img src="<?php echo $featuredImage[0]; ?>">
											<?php endif;?>
										</div>    
										<div class = "flight-featured-text">
											<p><?php echo $featuredContent;?></p>	
											<?php if($chart1Link != ""):?>					 
											<div class = "flight-chart-1">
												<img src="<?php echo $chart1Link?>">
											</div>
											<?php endif;?>
											<div class = "flight-bottom-content">
												<?php if($chart2Link != ""):?>
												<div class = "flight-chart-2">
													<img src="<?php echo $chart2Link?>">
												</div>
												<?php endif;?>
												<div class = "flight-body">
													<?php the_content();?>
												</div>
											</div>
										</div>	
									</div>
									<?php endwhile;	?>								 
								</div>
						</div>
				</div>
			</div>
		</div>		
	<?php endwhile;?>

	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
