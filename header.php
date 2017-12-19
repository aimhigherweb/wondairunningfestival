<?php
/**
 * The header template
 *
 *
 * @package Wondai Country Running Festival
 * @version 1.0
 */
?>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <link href="/wondairunnningfestival/wp-content/themes/wondairunningfestival/style.css" rel="stylesheet" />

        <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="site-logo">
            <img src="<?php echo wp_get_attachment_image_src(get_theme_mod( 'custom_logo' ), 'full')[0]; ?>" />
        </div>

        <?php wp_nav_menu(array(
            'theme_location' => 'main_menu',
            'container' => 'nav',
            'container_class' => 'menu main'
            )); 
        ?>
    </header>

    <div class="wrap">
