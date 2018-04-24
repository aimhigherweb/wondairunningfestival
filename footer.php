<?php
/**
 * The footer template
 *
 *
 * @package Wondai Country Running Festival
 * @version 1.0
 */

?>

		</div><!-- #content -->
		
		<?php if (is_active_sidebar('sponsors')) : ?>
			
			<div class="sponsors">
				
				<?php dynamic_sidebar('sponsors'); ?>

			</div>
		
		<?php endif; ?>

		<footer>			
			<?php wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'container' => 'nav',
                'container_class' => 'menu footer icons'
                )); 
			?>
			
			<?php wp_nav_menu(array(
                'theme_location' => 'social_menu',
                'container' => 'nav',
                'container_class' => 'menu social icons'
                )); 
			?>

			<div class="sbrc logo">
				<a href="http://www.southburnett.qld.gov.au/" target="_blank" rel="nofollow">
					<img src="/wp-content/themes/wondairunningfestival/resources/img/sbrc.jpg" />
				</a>
				<h3>Major Sponsor</h3>
			</div>

			<div class="aimhigher logo">
				<a href="https://aimhigherwebdesign.com.au" target="_blank" rel="nofollow">
					<?php 
						$logo_aimhigher = get_site_url() . '/wp-content/themes/wondairunningfestival/resources/img/aimhigher.svg';
						echo file_get_contents($logo_aimhigher);
					?>
				</a>
			</div>
		</footer>

		<script src="https://use.fontawesome.com/e86fd8a628.js"></script>
		<script type="text/javascript" src="/wp-content/themes/wondairunningfestival/resources/js/main.js" ></script>

    </body>
</html>
