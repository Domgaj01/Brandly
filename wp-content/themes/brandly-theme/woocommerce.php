<?php get_header(); ?>

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