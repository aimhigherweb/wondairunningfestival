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

<div class="container main events-feed single-event">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="content">
        <div class="details">
            <div class="event-info">
                <?php
                    $event = get_field('date');
                    $event_date = new DateTime((
                        substr($event, 0, 4)
                        . '-' . 
                        substr($event, 4, 2) 
                        . '-' . 
                        substr($event, 6, 2)
                    ),
                        new DateTimeZone('Australia/Brisbane')
                    );
                ?>
                    <h4 class="date">
                        <?php 
                            echo $event_date->format('j F');
                        ?>
                    </h4>
                    <h4 class="time"><?php echo get_field('start_time'); ?></h4>
                    <h4 class="distance"><?php echo get_field('distance'); ?> km</h4>
                    <?php if(get_field('garmin_connect')) : ?>
                        <a class="garmin" href="<?php echo get_field('garmin_connect'); ?>" target="_blank">
                            <div class="image-container">
                                <?php 
                                    $logo_garmin = get_site_url() . '/wp-content/themes/wondairunningfestival/resources/img/garmin.svg';
                                    echo file_get_contents($logo_garmin);
                                ?>
                            </div>
                        </a>
                    <?php endif; ?>
            </div>
            <div class="pricing">
                <?php
                    if (get_field('super_early_bird')) {
                        $today = new DateTime(null, new DateTimeZone('Australia/Brisbane'));
                        $super_early_bird = get_field('super_early_bird_end');
                        $early_bird = get_field('early_bird_end');
                        $close = get_field('close_date');

                        $super_early_date = new DateTime((
                            substr($super_early_bird, 0, 4)
                            . '-' . 
                            substr($super_early_bird, 4, 2) 
                            . '-' . 
                            substr($super_early_bird, 6, 2)
                        ),
                            new DateTimeZone('Australia/Brisbane')
                        );
                        $early_date = new DateTime((
                            substr($early_bird, 0, 4)
                            . '-' . 
                            substr($early_bird, 4, 2) 
                            . '-' . 
                            substr($early_bird, 6, 2)
                        ),
                            new DateTimeZone('Australia/Brisbane')
                        );
                        $close_date = new DateTime((
                            substr($close, 0, 4)
                            . '-' . 
                            substr($close, 4, 2) 
                            . '-' . 
                            substr($close, 6, 2)
                        ),
                            new DateTimeZone('Australia/Brisbane')
                        );


                    };

                    if (get_field('super_early_bird') && $super_early_date > $today) {
                        echo
                            '<h4>Super Early Bird Pricing</h4>' .
                            '<h4 class="cost">$ ' . get_field('super_early_bird') . '</h4>' .
                            '</div>' .
                            '<a href="#" class="btn">Register Now</a>';
                    }
                    else if (get_field('early_bird') && $early_date > $today) {
                        echo
                            '<h4>Early Bird Pricing</h4>' .
                            '<h4 class="cost">$ ' . get_field('early_bird') . '</h4>' .
                            '</div>' .
                            '<a href="#" class="btn">Register Now</a>';
                    }
                    else if (get_field('pricing') && $close_date > $today) {
                        echo
                            '<h4 class="cost">$ ' . get_field('pricing') . '</h4>' .
                            '</div>' .
                            '<a href="#" class="btn">Register Now</a>';
                    }
                    else if (get_field('pricing') && $close_date < $today) {
                        echo '<h4>Sorry, registrations have closed for this event. <a href="/contact">Get in touch</a> with us and we may be able to assist.</h4>';
                    }
                    else {
                        echo
                            '<h4 class="cost">Free</h4>'
                            . '</div>';                  
                    };
                ?>
        </div>
        <?php if(get_field('google_map')) : ?>
            <div class="map">
                <div class="map-container">
                    <?php 
                        $map_url = get_field('google_map');
                        echo file_get_contents($map_url);
                    ?>
                </div>
            </div>
        <?php endif; ?>

    <?php if (is_active_sidebar('events-feed')) : ?>
    
        <div class="events-feed">
            
            <?php dynamic_sidebar('events-feed'); ?>

        </div>
    
    <?php endif; ?>
</div>

<?php get_footer();