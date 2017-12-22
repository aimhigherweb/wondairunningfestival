<?php
/**
 * Template Name: Content Page with Events Feed
 * 
 * The template file for the homepage
 *
 *
 * @package Wondai Country Running Festival
 * @version 1.0
 */

get_header(); ?>

<div class="container main events-feed">
    <h1><?php the_title(); ?></h1>
    <div>
        <?php  
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>
    </div>

    <?php if (is_active_sidebar('events-feed')) : ?>
    
        <div class="events-feed">
            
            <?php dynamic_sidebar('events-feed'); ?>

        </div>
    
    <?php endif; ?>
</div>

<?php get_footer();