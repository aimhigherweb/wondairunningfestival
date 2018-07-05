<?php

/**

 * Template part for displaying evnets feed

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *



 */



?>



<p>Our running festival will have the following events:</p> 



<div class="content-blocks">

    <?php query_posts(array(

        'post_type' => 'event',

        'meta_key' => 'date',

        'orderby' => 'meta_value',

        'order' => 'ASC'

        ));

        while (have_posts()) :

            the_post();

    ?>

        <div class="content-block event">

            <a href="<?php echo get_permalink(); ?>">

                <h3><?php the_title(); ?></h3>

            </a>

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

                    

                    // If there is a custom note set

                    if (get_field('custom_note')) {

                        echo '<h4 class="note">' . get_field('custom_note') . '</h4></div>';

                    }

                    // Price is set and registrations haven't closed

                    else if (get_field('pricing') && $close_date > $today) {

                        // Super Early Bird pricing is set and hasn't closed

                        if (get_field('super_early_bird') && $super_early_date > $today) {

                            echo

                                '<h4>Super Early Bird Pricing</h4>' .

                                '<h4 class="cost">$ ' . get_field('super_early_bird') . '</h4>';

                        };

                        // Early bird pricing is set and hasn't closed

                        if (get_field('early_bird') && $early_date > $today) {

                            echo

                                '<h4>Early Bird Pricing</h4>' .

                                '<h4 class="cost">$ ' . get_field('early_bird') . '</h4>';

                        };

                        // Print pricing

                        echo

                            '<h4>Regular Pricing</h4>' .            

                            '<h4 class="cost">$ ' . get_field('pricing') . '</h4>' .

                            '</div>' .

                            '<a href=' . get_permalink() . ' class="btn">More Info</a>';

                    }
                    
                    else if (get_field('pricing') && $close_date < $today) {

                        echo

                            '<h4 class="">Registration Closed</h4>'

                            . '</div>';        

                    }

                    // If nothing else, it's free

                    else {

                        echo

                            '<h4 class="cost">Free</h4>'

                            . '</div>';                  

                    };

                ?>

       </div>

    <?php endwhile; ?>

</div>