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

		
			<?php if (is_active_sidebar('social-feed')) : ?>
			
				<div class="social-feed">
					
					<?php dynamic_sidebar('social-feed'); ?>

				</div>
			
			<?php endif; ?>
		

		<footer>
			<?php wp_nav_menu(array(
                'theme_location' => 'social_menu',
                'container' => 'nav',
                'container_class' => 'menu social icons'
                )); 
			?>
			<div class="aimhigher">
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
