<?php /* Template Name: About Us */ ?>

<?php get_header();?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="about-content">
			<div class="about-top">
				<div class="about-top-content row">
					<div class="about-top-left">
						<div class="about-title">
							<h2><?php single_post_title();?></h2>
						</div>
						<div class="about-img"><?php the_post_thumbnail();?></div>
						<div class="about-description">
							<?php the_content();?>
						</div>
					</div>
					<div class="about-top-right">
						<?php the_post_thumbnail();?>
					</div>
				</div>
			</div>
      <div class = "about-gallery">
          <div class = "about-container">
						<div class="row">
							<div class="col-sm-9 gallery-block-1">
								<div class="row block-1">
									<div class="col-sm-4">
										<div class = "gallery-image-1">
			                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('about-image-1')) ?>"/>
			              </div>
									</div>
									<div class="col-sm-8">
										<div class = "gallery-image-2">
			                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('about-image-2')) ?>"/>
			              </div>
									</div>
								</div>
								<div class="row block-2">
									<div class="col-sm-8">
										<div class = "gallery-image-4">
			                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('about-image-4')) ?>"/>
			              </div>
									</div>
									<div class="col-sm-4">
										<div class = "gallery-image-5">
			                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('about-image-5')) ?>"/>
			              </div>
									</div>
								</div>
							</div>
							<div class="col-sm-3 block-3 gallery-block-2">
								<div class = "gallery-image-3">
	                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('about-image-3')) ?>"/>
	              </div>
							</div>
						</div>              
          </div>
      </div>
			<div class="about-bottom">
                <div class="about-content">
                    <h2>Our Team</h2>
                    <?php $members = new WP_Query(array(
                        'post_type' => 'members',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                    ));
                    ?>
                    <?php while ($members->have_posts()):
                        $members->the_post();
                        $post_id = get_the_ID();
                        $memberName = get_post_meta(get_the_ID(), 'member-name', TRUE);
						$memberDesignation = get_post_meta(get_the_ID(), 'member-designation', TRUE);
						$memberQuote = get_post_meta(get_the_ID(), 'member-quote', TRUE);
                        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                    ?>
                    <div class = "members-wrapper">
                        <div class = "member-block">
                            <div class = "member-image">
                                <img class = "member-image" src="<?php echo $featuredImage[0]; ?>">
                            </div>
                            <div class = "member-name">
                                <h5><?php echo $memberName;?></h5>
                            </div>
                            <div class = "member-designation">
                                <p><?php echo $memberDesignation;?></p>
                            </div>
							<?php if($memberQuote!=""):?>
							<div class = "member-quote">
                                <p>"<?php echo $memberQuote;?>"</p>
                            </div>
							<?php endif;?>
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
