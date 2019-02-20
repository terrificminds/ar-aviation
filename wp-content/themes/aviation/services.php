<?php /* Template Name: Services*/ ?>

<?php get_header(); 
$categories = get_terms( array(
    'taxonomy' => 'service_category',
    'hide_empty' => false,
) );
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="services-content">
			<div class="services-top">
				<div class="block-container">
					<div class="services-top-left">
						<div class="service-title">
							<?php single_post_title();?>
						</div>
						<div class="services-image">
						<?php the_post_thumbnail();?>
						</div>
						<div class="service-description">
							<?php the_content();?>
						</div>
					</div>
					<div class="services-top-right">
						<?php the_post_thumbnail();?>
					</div>
				</div>
			</div>
			<div class="services-bottom">
				<div class="block-container">
					<?php foreach ($categories as $categoryId):?>
						<div class="service-type-<?php echo $categoryId->term_id ?> service-type">
							<?php $service_1 = new WP_Query(array(
								'post_type' => 'services',
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'tax_query' => array(
									array (
										'taxonomy' => 'service_category',
										'field' => 'term_taxonomy_id',
										'terms' => $categoryId->term_id,
									)
								),
							));
							$category = get_term_by( 'term_taxonomy_id', $categoryId->term_id, 'service_category');
							?>
							<div class="service-type-title">
								<h2 class="block-title"><?php echo $category->name;?></h2>
							</div>
							<section class="regular slider slider-servicepage">
							<?php while ($service_1->have_posts()):
								$service_1->the_post();
								$post_id = get_the_ID();
								$button_label = get_post_meta(get_the_ID(), 'service-button-label', TRUE);
								$button_link = get_post_meta(get_the_ID(), 'service-button-link', TRUE);
								$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
							?>
								<div class = "service-slider">
									<div class = "service-block-left">
										<img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
									</div>    
									<div class = "service-block-right">
										<div class = "service-title">
											<?php echo get_the_title();?>
										</div>
										<div class = "service-body">
											<?php the_content();?>
										</div>
										<div class = "action-label">
											<a class="grey-big-btn" href = "<?php echo $button_link ?>"><button><?php echo $button_label;?></button></a>
										</div>
									</div>
								</div>
							<?php endwhile;	?>
							</section>	
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
