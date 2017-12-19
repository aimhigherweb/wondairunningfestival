<?php
/**
 * Template Name: Home
 * 
 * The template file for the homepage
 *
 *
 * @package Wondai Country Running Festival
 * @version 1.0
 */

get_header(); ?>

<div class="container main">
    <div class="image-banner">
        <div class="image-container">
            <img src="<?php echo get_field('banner_image'); ?>" />
        </div>
        <div class="banner-content home-block">
            <?php
                while ( have_posts() ) : the_post();

                    the_content();

                endwhile; // End of the loop.
            ?>
        </div>
    </div>

    <div class="content-blocks">
        <?php query_posts('cat=2');
            while (have_posts()) :
                the_post();
        ?>
            <div class="content-block">
                <h3><?php the_title(); ?></h3>
                <div class="icon">
                    <img src="<?php echo get_field('icon'); ?>" />
                </div>
                <p>
                    <?php get_the_excerpt(); ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script type="text/javascript" src="/wondairunnningfestival/wp-content/themes/wondairunningfestival/resources/js/countdown.js" ></script>

<?php 
    get_footer(); 