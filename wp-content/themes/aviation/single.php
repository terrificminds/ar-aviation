<?php

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); 
		$bannerImage = get_post_meta(get_the_ID(), 'newsbanner', TRUE);
		?>
		<div class = "post-wrapper">
			<div class = "post-container">
				<div class = "post-banner">
					<img src="<?php echo $bannerImage;?>">
				<div>
				<div class = "post-content">
					<div class = "post-date">
						<?php echo get_the_date();?>
					</div>
					<div class = "post-title">
						<?php echo get_the_title();?>
					</div>
					<div class = "post-content">
						<?php the_content();?>
					</div>	
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
