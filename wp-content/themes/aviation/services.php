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
						<div class="services-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
							<?php the_post_thumbnail();?>
						</div>
						<div class="service-description">
							<?php the_content();?>
						</div>
					</div>
					<div class="services-top-right" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
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
							<!-- <section class="regular slider slider-servicepage"> -->
							<div class="services-wrapper">
							<?php while ($service_1->have_posts()):
								$service_1->the_post();
								$post_id = get_the_ID();
								$button_label = get_post_meta(get_the_ID(), 'service-button-label', TRUE);
								$button_link = get_post_meta(get_the_ID(), 'service-button-link', TRUE);
								$modalImage = get_post_meta(get_the_ID(), 'service_modal_image', TRUE);
								$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
							?>
								<div class = "service-slider">
									<div class = "service-block-left">
										<img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
									</div>    
									<div class = "service-block-right ">
										<div class = "service-title">
											<?php echo get_the_title();?>
										</div>
										<div class = "service-body">
											<?php the_excerpt();?>										
										</div>		
										<div class = 'news-readmore'>
                           					 <a href="#" data-toggle="modal" data-target="#servicesReadMoreModal<?php echo $post_id; ?>">Read More</a>
                            			</div>     
										<?php if(($button_link != "") && ($button_label != "")):?>
										<div class = "action-label">
											<a class="grey-big-btn" target="_blank" href = "<?php echo $button_link ?>"><button><?php echo $button_label;?></button></a>
										</div>
										<?php endif;?>
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
							<?php endwhile;	?>
							</div>
							<!-- </section>	 -->
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
