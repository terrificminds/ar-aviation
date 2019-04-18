<?php /* Template Name: Flights */ ?>

<?php get_header();?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="flights-content-wrapper">
			<div class="flights-container">
				<div class="Flights-content">
					<?php $flights = new WP_Query(array(
						'post_type' => 'flights',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					));
					?>
					<?php while ($flights->have_posts()):
						$flights->the_post();
						$post_id = get_the_ID();
						$featuredContent = get_post_meta(get_the_ID(), 'flight_featured_text', TRUE);
						$chart1Link = get_post_meta(get_the_ID(), 'flights_chart_1', TRUE);
						$chart2Link = get_post_meta(get_the_ID(), 'flights_chart_2', TRUE);
						$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
					?>
						<div class = "flights-block">
							<div class = "flight-title">
								<?php echo get_the_title();?>
							</div>
							<div class = "flight-featured-image">
								<img class = "flight-featured-image" src="<?php echo $featuredImage[0]; ?>">
							</div>    
							<div class = "flight-featured-text">
								<p><?php echo $featuredContent;?></p>
							<div>
							<div class = "flight-chart-1">
								<img src="<?php echo $chart1Link?>">
							</div>
							<div class = "flight-bottom-content">
								<div class = "flight-chart-2">
									<img src="<?php echo $chart2Link?>">
								</div>
								<div class = "service-body">
									<?php the_content();?>
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
