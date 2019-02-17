<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php 
		get_template_part( 'template-parts/content', 'banner' );
		get_template_part( 'template-parts/content', 'services' );?>
		<div class = "about-wrapper">
			<div class = "about-content">
				<div class = "about-left">
					<div class="about-det-wrapper"  style="background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('about-background')) ?>)">
					
					<div class = "about-title">
						<h2 class="block-title"><?php echo get_theme_mod('about-title')?></h2>
					</div>
					<div class = "about-description">
						<p><?php echo get_theme_mod('about-shortdescription')?></p>
					</div>
					<div class = "about read-more">	
						<a href="<?php echo get_page_link(get_theme_mod('about-readmore'))?>">Read more</a>
					</div>
					</div>
				</div>
				<div class = "about-right">
					<img class="about-image" src="<?php echo wp_get_attachment_url(get_theme_mod('about-image')) ?>"/>		
				</div>
			</div>
		</div>
		<?php
		get_template_part( 'template-parts/content', 'partners' );
		get_template_part( 'template-parts/content', 'news' );
        ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
