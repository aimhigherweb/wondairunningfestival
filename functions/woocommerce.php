<?php

    //Add Woocommerce support
    function customtheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

    /**
     * Trim zeros in price decimals
     **/
    add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

    add_filter( 'woocommerce_get_price_html', 'aimhigher_price_free_zero_empty', 9999, 2 );
   
    function aimhigher_price_free_zero_empty( $price, $product ){
        if ( $product->is_type( 'variable' ) ) {
            return $price;
        }

        if ( '' === $product->get_price() || 0 == $product->get_price() ) {
            return '<span class="woocommerce-Price-amount amount">Free</span>';
        }  
        return $price;
    }

    // Hide/Show sections
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
?>