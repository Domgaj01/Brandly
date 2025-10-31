<?php get_header(); ?>

<?php
if ( function_exists( 'is_singular' ) && is_singular( 'product' ) ) {

    if ( function_exists( 'wc_get_template' ) ) {
        wc_get_template( 'single-product.php' );
    } else {
        $fallback = WP_PLUGIN_DIR . '/woocommerce/templates/single-product.php';
        if ( file_exists( $fallback ) ) {
            include $fallback;
        } elseif ( function_exists( 'wc_get_template_part' ) ) {
            wc_get_template_part( 'content', 'single-product' );
        }
    }

    get_footer();
    return;
}
?>

<div class="shop-container">
    <?php if (woocommerce_product_loop()) : ?>
        <ul class="products">
            <?php while (have_posts()) : the_post(); ?>
                <?php wc_get_template_part('content', 'product'); ?>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p><?php esc_html_e('No products found', 'woocommerce'); ?></p>
    <?php endif; ?>
</div>



<?php get_footer(); ?>