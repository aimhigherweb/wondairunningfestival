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

			<div class="sponsor_main logo">
				
			</div>

			<div class="aimhigher logo">
				<a href="https://aimhigherweb.design" target="_blank" rel="nofollow">
					AimHigher Web
				</a>
			</div>
		</footer>

		<script src="https://use.fontawesome.com/e86fd8a628.js"></script>
		<script type="text/javascript" src="/wp-content/themes/wondairunningfestival/resources/js/main.js" ></script>
		<?php wp_footer(); ?>
    </body>
</html>
