<?php /* Template Name: Contact Us*/ ?>

<?php get_header();?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();?>
		<div class="contact-content">
			<div class="contact-top">
					<div class="contact-title">
						<?php single_post_title();?>
					</div>
					<div class="contact-form">
                        <h2>Drop us a line</h2>
                        <?php echo do_shortcode('[contact-form-7 id="134" title="Contact form 1"]')?>
					</div>
			</div>
			<div class="contact-bottom">
                <div class="contact-content">  
                    <?php 
                    $contactPhone = get_theme_mod('contact-telephone');
                    $contactAddress = get_theme_mod('contact-address');
                    $contactMap = get_theme_mod('contact-map'); 
                    ?>
                    <h2>Physical address</h2>
                    <div class = "contact-block">
                        <div class = "contact-address">
                            <p><?php echo $contactAddress;?></p>
                        </div>
                        <div class = "contact-tele">
                            <span>Phone :</span><p><?php echo $contactPhone;?></p>
                        </div>
                        <div class = "contact-map">
                            <iframe src="<?php echo $contactMap; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<?php endwhile;?>	
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
