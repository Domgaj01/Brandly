  <?php get_header(); ?>

  <section class="bg-white relative">
  <div class="mx-auto w-full max-w-[1440px] grid xl:grid-cols-12 xl:gap-x-[45px] items-center px-4 sm:px-6 py-8 xl:py-12 relative">

  
    <h1 class="block xl:hidden text-[42px] sm:text-[48px] font-semibold tracking-[0.05em] font-['Poppins'] text-black mb-6">
      "We Scale Businesses. "
    </h1>

   
    <div class="xl:hidden relative w-full aspect-video overflow-hidden rounded-[0px]">
      <video
        class="absolute inset-0 w-full h-full object-cover"
        autoplay
        loop
        muted
        playsinline
        preload="metadata"
      >
        <source src="<?php echo get_template_directory_uri(); ?>/videos/video-hero1.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="absolute inset-0 bg-black/40"></div>
    </div>


    <div class="hidden xl:block xl:col-start-4 xl:col-end-12 relative h-[320px] sm:h-[420px] xl:h-[520px] overflow-hidden">
      <video 
        class="absolute inset-0 w-full h-full object-cover" 
        autoplay 
        loop 
        muted 
        playsinline
        preload="metadata">
        <source src="<?php echo get_template_directory_uri(); ?>/videos/video-hero1.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="absolute inset-0 bg-black/40"></div>
    </div>

  
    <h1 class="hidden xl:flex xl:col-start-2 xl:col-end-5 absolute top-1/2 -translate-y-1/2
           text-[44px] sm:text-[64px] xl:text-[80px]
           leading-none font-semibold tracking-[0.06em] font-['Poppins']
           z-20">
      <span class="text-black mr-[20px]">We</span>
      <span class="text-black">S</span>
      <span class="bg-[linear-gradient(to_right,black_50%,white_50%)] bg-clip-text text-transparent">c</span>
      <span class="text-white">ale</span>
    </h1>

    <h1 class="hidden xl:flex xl:col-start-2 xl:col-end-5 absolute top-[55%] -translate-y-1/2
           text-[44px] sm:text-[64px] xl:text-[80px]
           leading-none font-semibold tracking-[0.06em] font-['Poppins']
           z-20">
      <span class="text-black"><br/>Busin</span>
      <span class="text-white"><br/>esses.</span>
    </h1>

  </div>
</section>

<?php
/* ========= ACF (trust stats) ========= */
$trust1 = get_field('trust1');           if (!$trust1)     { $trust1 = get_field('trust_1'); }
$trust2 = get_field('trust2');           if (!$trust2)     { $trust2 = get_field('trust_2'); }
$trust3 = get_field('trust3');           if (!$trust3)     { $trust3 = get_field('trust_3'); }

$trust_sub1 = get_field('trust_sub1');   if (!$trust_sub1) { $trust_sub1 = get_field('trust_sub_1'); }
$trust_sub2 = get_field('trust_sub2');   if (!$trust_sub2) { $trust_sub2 = get_field('trust_sub_2'); }
$trust_sub3 = get_field('trust_sub3');   if (!$trust_sub3) { $trust_sub3 = get_field('trust_sub_3'); }
?>

<section class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-10 md:py-14">
    <dl class="grid grid-cols-1 md:grid-cols-3 gap-y-10 md:gap-y-0">
      
      <!-- Item 1 -->
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black">
          <?php echo esc_html($trust1); ?>
        </dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]">
          <?php echo esc_html($trust_sub1); ?>
        </dd>
      </div>

      <!-- Item 2 -->
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black">
          <?php echo esc_html($trust2); ?>
        </dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]">
          <?php echo esc_html($trust_sub2); ?>
        </dd>
      </div>

      <!-- Item 3 -->
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black">
          <?php echo esc_html($trust3); ?>
        </dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]">
          <?php echo esc_html($trust_sub3); ?>
        </dd>
      </div>

    </dl>
  </div>
</section>

<?php
/* ========= ACF (hero) ========= */
$heading = get_field('help-us_heading');
if (!$heading) { $heading = get_field('help_us_heading'); } // fallback if used underscore
$text     = get_field('help_us_text');
$image    = get_field('help_us_image');
$cta_txt  = get_field('help_us_cta_text');
$cta_url  = get_field('help_us_cta_url');
$formHeading = get_field('form_title');

// Build image URL (accepts array | id | url)
$img_url = '';
if ($image) { $img_url = is_array($image) ? ($image['url'] ?? '') : $image; }
if (!$img_url) { $img_url = get_template_directory_uri() . '/images/help-us.jpg'; }
?>

<section class="bg-[#D9D9D9]">
  <div class="mx-auto w-full max-w-[1440px]
              px-4 sm:px-6 py-10 lg:py-14 xl:py-16
              gap-y-8 lg:grid lg:grid-cols-12 lg:gap-x-[45px] items-center">

    <!-- Left: Text -->
    <div class="lg:col-start-2 lg:col-end-7 xl:col-start-2 xl:col-end-7 order-2 lg:order-1">
      <?php if (!empty($heading)) : ?>
        <h1 class="uppercase font-['Poppins'] font-semibold
                   text-[28px] sm:text-[32px] xl:text-[36px]
                   leading-[1.15] tracking-[0.05em] text-black mb-5 sm:mb-6">
          <?php echo esc_html($heading); ?>
        </h1>
      <?php endif; ?>

      <?php if (!empty($text)) : ?>
        <div class="text-black font-['Poppins'] text-[15px] sm:text-[17px] xl:text-[18px]
                    leading-7 sm:leading-8 tracking-[0.02em] space-y-4 mb-6 sm:mb-8 max-w-[68ch]">
          <?php echo wp_kses_post( wpautop($text) ); ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($cta_txt) && !empty($cta_url)) : ?>
        <div class="mt-6 sm:mt-8">
          <a href="<?php echo esc_url($cta_url); ?>"
             class="inline-flex w-full sm:w-auto items-center justify-center
                    bg-black text-white
                    px-6 py-4 font-['Poppins'] text-[14px] sm:text-[16px] tracking-[0.05em]
                    hover:shadow-[0_6px_0_rgba(0,0,0,0.2)]
                    transition-transform hover:-translate-y-[2px]">
            <?php echo esc_html($cta_txt); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right: Image -->
    <div class="lg:col-start-7 lg:col-end-12 xl:col-start-7 xl:col-end-12 order-1 lg:order-2 mb-6 lg:mb-0">
      <div class="relative h-[220px] sm:h-[320px] mt-[45px] md:h-[380px] lg:h-[440px] xl:h-[520px] overflow-hidden">
        <img src="<?php echo esc_url($img_url); ?>"
             alt="<?php echo esc_attr( $heading ? wp_strip_all_tags($heading) : 'Help Us image' ); ?>"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>
    </div>

  </div>
</section>

<?php
/* ========= ACF (front page bundles) ========= */
$bundle_heading = get_field('front_page_bundle_heading');
$social_media   = get_field('social_media');   // image (array/ID/URL)
$seo            = get_field('seo');            // image
$re_branding    = get_field('re-branding');    // image
$all_in_one     = get_field('all_in_one');     // image

// helpers: turn any ACF image return (array/ID/URL) into URL + ALT
$acf_img_url = function($img, $size='full'){
  if (empty($img)) return '';
  if (is_array($img))  return $img['sizes'][$size] ?? $img['url'] ?? '';
  if (is_int($img))    return wp_get_attachment_image_url($img, $size) ?: '';
  return $img; // already a URL
};
$acf_img_alt = function($img, $fallback=''){
  if (empty($img)) return $fallback;
  if (is_array($img))  return $img['alt'] ?? $fallback;
  if (is_int($img))    return get_post_meta($img, '_wp_attachment_image_alt', true) ?: $fallback;
  return $fallback;
};

// build src/alt
$sm_src  = $acf_img_url($social_media);  $sm_alt  = $acf_img_alt($social_media, 'Social Media');
$seo_src = $acf_img_url($seo);           $seo_alt = $acf_img_alt($seo, 'SEO');
$rb_src  = $acf_img_url($re_branding);   $rb_alt  = $acf_img_alt($re_branding, 'Re-Branding');
$all_src = $acf_img_url($all_in_one);    $all_alt = $acf_img_alt($all_in_one, 'All in One');
?>

<section class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-12 md:py-16">
    <!-- Heading -->
    <h2 class="text-center font-['Poppins'] font-bold text-[32px] md:text-[40px] text-black mb-10 md:mb-14">
      <?php echo esc_html($bundle_heading); ?>
    </h2>

    <!-- Phones grid -->
    <ul class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 items-start">
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-black/15">
          <img src="<?php echo esc_url($sm_src); ?>" alt="<?php echo esc_attr($sm_alt); ?>" class="w-full h-full object-contain transition-transform duration-300 ease-out group-hover:scale-[1.02] select-none pointer-events-none" loading="lazy" />
          <span class="pointer-events-none absolute inset-0 ring-1 ring-black/10 group-hover:ring-black/20 transition"></span>
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-black/15">
          <img src="<?php echo esc_url($seo_src); ?>" alt="<?php echo esc_attr($seo_alt); ?>" class="w-full h-full object-contain transition-transform duration-300 ease-out group-hover:scale-[1.02] select-none pointer-events-none" loading="lazy" />
          <span class="pointer-events-none absolute inset-0 ring-1 ring-black/10 group-hover:ring-black/20 transition"></span>
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-black/15">
          <img src="<?php echo esc_url($rb_src); ?>" alt="<?php echo esc_attr($rb_alt); ?>" class="w-full h-full object-contain transition-transform duration-300 ease-out group-hover:scale-[1.02] select-none pointer-events-none" loading="lazy" />
          <span class="pointer-events-none absolute inset-0 ring-1 ring-black/10 group-hover:ring-black/20 transition"></span>
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-black/15">
          <img src="<?php echo esc_url($all_src); ?>" alt="<?php echo esc_attr($all_alt); ?>" class="w-full h-full object-contain transition-transform duration-300 ease-out group-hover:scale-[1.02] select-none pointer-events-none" loading="lazy" />
          <span class="pointer-events-none absolute inset-0 ring-1 ring-black/10 group-hover:ring-black/20 transition"></span>
        </a>
      </li>
    </ul>
  </div>
</section>


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