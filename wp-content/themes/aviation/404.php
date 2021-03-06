<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
				<div class="common-content">
					<img class="404-image" src="<?php echo wp_get_attachment_url(get_theme_mod('404-image')) ?>"/>
					<h1>Error 404.</h1>
					<h3>Flight not found !</h3>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->

<?php get_footer(); ?>
