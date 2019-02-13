<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Aviation
 * @since Aviation 1.0
 */
?>
	</div><!-- .site-content -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class = "footer-container">
				<div class = "footer-top">
					<div class = "footer-column-1">
						<img class="footer-logo" src="<?php echo wp_get_attachment_url(get_theme_mod('footer-logo')) ?>"/>
						<p><?php echo get_theme_mod('footer-description') ;?></p>
					</div>
					<div class = "footer-column-2">
						<div class = "title">LINKS</div>
						<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
							<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'menu_class'     => 'footer-menu',
										'depth'          => 1,
									) );
								?>
							</nav><!-- .footer-menu -->
						<?php endif; ?>
					</div>
					<div class = "footer-column-3">
						<div class = "title">ADDRESS</div>	
						<div class = "address"><?php echo get_theme_mod('address-block') ;?></div>
						<div class = "tel"><span>Tel:</span><?php echo get_theme_mod('telephone-block') ;?></div>				
					</div>
				</div>
				<div class = "footer-bottom">
					<div class = "footer-column-1">
						<div class = "copyright"><?php echo get_theme_mod('website-copyright') ;?></div>
					</div>
					<div class = "footer-column-2">
						<div class = "footer-links">
							<a href="<?php echo get_page_link(get_theme_mod('website-terms'))?>">Terms and Conditions</a> |
							<a href="<?php echo get_page_link(get_theme_mod('website-policy'))?>">Privacy Policy</a>
						</div>
					</div>	
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
