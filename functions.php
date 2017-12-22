<?php
    // Main Nav
    register_nav_menus(array (
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu',
        'social_menu' => 'Social Menu',
    ));

    // Social Feed Widget Area
    register_sidebar(array(
        'id' => 'social-feed',
        'name' => 'Social Feed',
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

    // Hide the widget titles
    add_filter('widget_title','my_widget_title'); 

    function my_widget_title($t) {
        return null;
    }
    

    //Allow using SVGs
    // Allow SVG
    add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    
        global $wp_version;
        if ( $wp_version !== '4.7.1' ) {
            return $data;
        }
        
        $filetype = wp_check_filetype( $filename, $mimes );
        
        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
        
    }, 10, 4 );
    
    function cc_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter( 'upload_mimes', 'cc_mime_types' );
    
    function fix_svg() {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
            </style>';
    }
    add_action( 'admin_head', 'fix_svg' );
        

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