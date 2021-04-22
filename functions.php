<?php
    require_once(__DIR__ . '/functions/acf.php');
    require_once(__DIR__ . '/functions/woocommerce.php');
    require_once(__DIR__ . '/functions/wordpress.php');

    // Main Nav
    register_nav_menus(array (
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu',
        'social_menu' => 'Social Menu',
    ));

    // Social Feed Widget Area
    register_sidebar(array(
        'id' => 'sponsors',
        'name' => 'Sponsors',
        'before_widget' => '<div class = "widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Event Blocks Widget Area
    register_sidebar(array(
        'id' => 'events-feed',
        'name' => 'Events Feed',
        'before_widget' => '<div class = "widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // All Routes Map Widget Area
    register_sidebar(array(
        'id' => 'routes-map',
        'name' => 'Routes Map',
        'before_widget' => '<div class = "widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Custom post type for events
    function create_post_type() {
        register_post_type('event',
            array(
                'labels' => array(
                    'name' => _('Events'),
                    'singular_name' => _('Event'),
                ),
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-calendar-alt'
            )
        );
    }
    add_action('init', 'create_post_type');

    //Custom widget to display event posts
    class EventsFeed extends WP_Widget {
        
            function __construct() {
                // Instantiate the parent object
                parent::__construct( false, 'Events Feed' );
            }
        
            function widget( $args, $instance ) {
                include('parts/events-feed.php');
            }
        
            function update( $new_instance, $old_instance ) {
                // Save widget options
            }
        
            function form( $instance ) {
                // Output admin widget options form
            }
        }
        
        function myplugin_register_widgets() {
            register_widget( 'EventsFeed' );
        }
        
        add_action( 'widgets_init', 'myplugin_register_widgets' );
?>