<div class = "banner-wrapper">
    <div class = "banner-content">
        <div class = "social-links">        
            <?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
            <?php endif; ?>
            <span class="sl-line"></span>
            <span class="sl-text">Connect</span>
        </div>
        <div class = "banner-left">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('banner-image')) ?>"/>
        </div>
        <div class = "banner-right">
            <video width="320" height="240" autoplay="autoplay" loop muted>
                <source src="<?php echo wp_get_attachment_url(get_theme_mod('banner-video')) ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video> 	
        </div>
        <div class="banner-text-container">
                <div class = "banner-title">
                    <h2><?php echo get_theme_mod('banner-title')?></h2>
                </div>
                <div class = "banner-subtitle">
                    <p><?php echo get_theme_mod('banner-subtitle')?></p>
                </div>
                <div class = "banner-btn">	
                    <a class="grey-big-btn" href="<?php echo get_page_link(get_theme_mod('banner-button-link'))?>">
                        <button type="button"> <?php echo get_theme_mod('banner-button-label')?> </button>
                    </a>
                </div>
            </div>
    </div>
</div>