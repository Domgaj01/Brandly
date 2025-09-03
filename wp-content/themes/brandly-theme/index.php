  <?php get_header(); ?>

  <?php
  $rev = new WP_Query([
    'post_type' => 'review',
    'posts_per_page' => 6,
  ]);
  if ($rev->have_posts()): ?>
  <section class="bg-white">
    <div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-12">
      <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        <?php while ($rev->have_posts()): $rev->the_post();
          $title = get_the_title();
          $time = get_field('time_ago');
        ?>
        <article class="bg-[#D9D9D9]/60 p-6 md:p-7 shadow-sm">
          <h3 class="text-[24px] font-semibold text-black font-['Poppins'] mb-2">
            <?php echo esc_html($title); ?>
          </h3>

          <?php if ($time): ?>
            <p class="text-sm text-black mb-4 font-['Poppins']"><?php echo esc_html($time); ?></p>
          <?php endif; ?>

          <div class="text-[16px] leading-7 text-black font-['Poppins']">
            <?php echo wp_kses_post( wpautop( get_the_content() ) ); ?>
          </div>

          <div class="mt-6 flex justify-end">
            <span class="iconify text-[36px] text-[#000000]" data-icon="mdi:format-quote-close"></span>
          </div>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php get_footer(); ?>