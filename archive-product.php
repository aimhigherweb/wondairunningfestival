<?php
/**
 * Shop and product archive template
 * 
 *
 *
 * @package Wondai Country Running Festival
 * @version 1.0
 */

get_header(); ?>

<div class="container main">
    <h1 class="page-title">Shop</h1>
    <div class="content">
        <ul class="products">
            <?php if ( have_posts() ) : 
                while ( have_posts() ) : 
                    the_post(); 
                    $product = wc_get_product( $post->ID ); 
                ?>
                    <li>
                        <?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                        <h3>
                            <a href="/shop/<?php echo $product->slug; ?>">
                                <?php echo $product->name; ?>
                            </a>
                        </h3>
                        <p class="price"><?php echo $product->get_price_html(); ?></p>
                    </li>
                <?php endwhile; ?>                 
            <?php endif; ?>
        </ul>
    </div>
</div>

<?php get_footer();