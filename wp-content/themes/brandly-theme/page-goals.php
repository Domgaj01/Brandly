<?php get_header(); ?>

<?php
$heading = get_field('help-us_heading') ?: get_field('help_us_heading');
$text    = get_field('help_us_text');
$image   = get_field('help_us_image'); 
?>

<section class="bg-[#D9D9D9]">
  <div class="mx-auto w-full max-w-[1440px]
              px-4 sm:px-6 py-10 lg:py-14 xl:py-16
              gap-y-8 lg:grid lg:grid-cols-12 lg:gap-x-[45px] items-center">

    <!-- Left: Text -->
    <div class="lg:col-start-2 lg:col-end-7 xl:col-start-2 xl:col-end-7 order-2 lg:order-1">
      <?php if ($heading) : ?>
        <h1 class="uppercase font-['Poppins'] font-semibold
                   text-[28px] sm:text-[32px] xl:text-[36px]
                   leading-[1.15] tracking-[0.05em] text-black mb-5 sm:mb-6">
          <?php echo esc_html($heading); ?>
        </h1>
      <?php endif; ?>

      <?php if ($text) : ?>
        <div class="text-black font-['Poppins'] text-[15px] sm:text-[17px] xl:text-[18px]
                    leading-7 sm:leading-8 tracking-[0.02em] space-y-4 mb-6 sm:mb-8 max-w-[68ch]">
          <?php echo wp_kses_post( wpautop($text) ); ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right: Image -->
    <div class="lg:col-start-7 lg:col-end-12 xl:col-start-7 xl:col-end-12 order-1 lg:order-2 mb-6 lg:mb-0">
      <div class="relative h-[220px] sm:h-[320px] mt-[45px] md:h-[380px] lg:h-[440px] xl:h-[520px] overflow-hidden">
        <img src="<?php echo esc_url($image['url']); ?>"
             alt="<?php echo esc_attr($image['alt']); ?>"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>
    </div>

  </div>
</section>


<?php
$heading1 = get_field('goals_heading');
$text1    = get_field('goals_letters');
$image1   = get_field('goals_photo'); 
?>

<section class="bg-white">
  <div class="mx-auto w-full max-w-[1440px]
              px-4 sm:px-6 py-10 lg:py-14 xl:py-16
              gap-y-8 lg:grid lg:grid-cols-12 lg:gap-x-[45px] items-center">

    <!-- Left: Image -->
    <div class="lg:col-start-2 lg:col-end-7 xl:col-start-2 xl:col-end-7 order-1 mb-6 lg:mb-0">
      <div class="relative h-[220px] sm:h-[320px] mt-[45px] md:h-[380px] lg:h-[440px] xl:h-[520px] overflow-hidden">
        <img src="<?php echo esc_url($image1['url']); ?>"
             alt="<?php echo esc_attr($image1['alt']); ?>"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>
    </div>

    <!-- Right: Text -->
    <div class="lg:col-start-7 lg:col-end-12 xl:col-start-7 xl:col-end-12 order-2">
      <?php if ($heading1) : ?>
        <h1 class="uppercase font-['Poppins'] font-semibold
                   text-[28px] sm:text-[32px] xl:text-[36px]
                   leading-[1.15] tracking-[0.05em] text-black mb-5 sm:mb-6">
          <?php echo esc_html($heading1); ?>
        </h1>
      <?php endif; ?>

      <?php if ($text1) : ?>
        <div class="text-black font-['Poppins'] text-[15px] sm:text-[17px] xl:text-[18px]
                    leading-7 sm:leading-8 tracking-[0.02em] space-y-4 mb-6 sm:mb-8 max-w-[68ch]">
          <?php echo wp_kses_post( wpautop($text1) ); ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<section class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-10 lg:py-14 xl:py-16">
    <?php if ( have_rows('goals_items') ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

        <?php while ( have_rows('goals_items') ) : the_row();
          $img   = get_sub_field('goals_image'); 
          $title = get_sub_field('goals_title');
          $text  = get_sub_field('goals_text');
        ?>
          <div class="flex flex-col items-center">
            <?php if ($img) : ?>
              <img src="<?php echo esc_url($img['url']); ?>"
                   alt="<?php echo esc_attr($img['alt']); ?>"
                   class="w-[403px] h-[266px] object-cover mb-6" />
            <?php endif; ?>

            <?php if ($title) : ?>
              <h2 class="font-['Poppins'] font-bold text-[32px] text-[#8075F7] tracking-[0.05em] mb-4">
                <?php echo esc_html($title); ?>
              </h2>
            <?php endif; ?>

            <?php if ($text) : ?>
              <div class="font-['Poppins'] text-black text-[18px] tracking-[0.05em] leading-7 max-w-[38ch]">
                <?php echo wp_kses_post( wpautop($text) ); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>

      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>