<?php get_header(); ?>

<section class="bg-white relative">
  <div id="hero-video"
       class="mx-auto w-full max-w-[1440px] grid xl:grid-cols-12 xl:gap-x-[45px] 
              px-4 sm:px-6 py-12 xl:py-16 relative">

    <!-- Mobile heading -->
    <h1 class="xl:hidden text-center 
               text-[32px] sm:text-[40px] 
               leading-tight font-semibold tracking-[0.05em] font-['Poppins'] text-black">
      "We Scale<br/>Businesses."
    </h1>

    <!-- Desktop hero (obrázok alebo video môžeš vrátiť sem) -->
    <div class="xl:block xl:col-start-4 xl:col-end-12 relative overflow-hidden" style="aspect-ratio:16/9;">
      <img
        src="<?php echo esc_url( get_template_directory_uri().'/images/blogs-hero.jpg'); ?>"
        alt="Hero image"
        class="absolute inset-0 w-full h-full object-cover"
        width="1920" height="1080"
        loading="eager" fetchpriority="high" decoding="async" />
      <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
    </div>

    <!-- Desktop heading -->
    <h1 class="split-title hidden xl:flex xl:col-start-2 xl:col-end-5 
               absolute top-1/2 -translate-y-1/2
               text-[44px] sm:text-[64px] xl:text-[80px]
               leading-none font-semibold tracking-[0.08em] font-['Poppins'] z-20 text-white">
      We&nbsp;Scale<br/>Businesses.
    </h1>

  </div>
</section>



<script>
(function(){
  const container = document.getElementById('hero-video');
  const mediaDesktop = document.getElementById('hero-media');
  const title = document.getElementById('hero-video-title');
  if (!container || !title) return;

  const visible = el => {
    if (!el) return false;
    const s = getComputedStyle(el);
    return s.display !== 'none' && s.visibility !== 'hidden' && el.offsetParent !== null;
  };

  function activeMedia(){ return visible(mediaDesktop) ? mediaDesktop : mediaMobile; }

  function update(){
    const media = activeMedia();
    if (!media) return;
    const c = container.getBoundingClientRect();
    const m = media.getBoundingClientRect();
    const r = title.getBoundingClientRect();
    title.style.setProperty('--split', (m.left - c.left) + 'px');
    title.style.setProperty('--bg-w',  c.width + 'px');
    title.style.setProperty('--bg-x',  (r.left - c.left) + 'px');
  }

  window.addEventListener('load', update, {passive:true});
  window.addEventListener('resize', update, {passive:true});
  window.addEventListener('orientationchange', update, {passive:true});
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(update);

  const ro = new ResizeObserver(update);
  ro.observe(container);
  if (mediaDesktop) ro.observe(mediaDesktop);
  if (mediaMobile)  ro.observe(mediaMobile);
  ro.observe(title);
  update();
})();
</script>

<?php
$trust1      = get_field('trust1');
$trust2      = get_field('trust2');
$trust3      = get_field('trust3');
$trust_sub1  = get_field('trust_sub1');
$trust_sub2  = get_field('trust_sub2');
$trust_sub3  = get_field('trust_sub3');
?>

<section class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-10 md:py-14">
    <dl class="grid grid-cols-1 md:grid-cols-3 gap-y-10 md:gap-y-0">
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black"><?php echo esc_html($trust1); ?></dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]"><?php echo esc_html($trust_sub1); ?></dd>
      </div>
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black"><?php echo esc_html($trust2); ?></dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]"><?php echo esc_html($trust_sub2); ?></dd>
      </div>
      <div class="flex flex-col items-center text-center">
        <dt class="font-['Poppins'] font-bold text-[40px] md:text-[48px] text-black"><?php echo esc_html($trust3); ?></dt>
        <dd class="mt-2 font-['Poppins'] font-normal text-[22px] md:text-[30px] text-black uppercase tracking-[0.08em]"><?php echo esc_html($trust_sub3); ?></dd>
      </div>
    </dl>
  </div>
</section>

<?php
$heading     = get_field('help-us_heading');
$text        = get_field('help_us_text');
$image       = get_field('help_us_image');     // ACF array: url, alt, width, height, ...
$cta_txt     = get_field('help_us_cta_text');
$cta_url     = get_field('help_us_cta_url');
$formHeading = get_field('form_title');
?>

<section class="bg-[#D9D9D9]">
  <div class="mx-auto w-full max-w-[1440px]
              px-4 sm:px-6 py-10 lg:py-14 xl:py-16
              gap-y-8 lg:grid lg:grid-cols-12 lg:gap-x-[45px] items-center">

    <!-- Left: Text -->
    <div class="lg:col-start-2 lg:col-end-7 xl:col-start-2 xl:col-end-7 order-2 lg:order-1">
      <?php if ($heading) : ?>
        <h1 class="uppercase font-['Poppins'] font-semibold text-[28px] sm:text-[32px] xl:text-[36px] leading-[1.15] tracking-[0.05em] text-black mb-5 sm:mb-6">
          <?php echo esc_html($heading); ?>
        </h1>
      <?php endif; ?>

      <?php if ($text) : ?>
        <div class="text-black font-['Poppins'] text-[15px] sm:text-[17px] xl:text-[18px] leading-7 sm:leading-8 tracking-[0.02em] space-y-4 mb-6 sm:mb-8 max-w-[68ch]">
          <?php echo wp_kses_post( wpautop($text) ); ?>
        </div>
      <?php endif; ?>

      <?php if ($cta_txt && $cta_url) : ?>
        <div class="mt-6 sm:mt-8">
          <a href="<?php echo esc_url($cta_url); ?>"
             class="inline-flex w-full sm:w-auto items-center justify-center bg-black text-white px-6 py-4 font-['Poppins'] text-[14px] sm:text-[16px] tracking-[0.05em] hover:shadow-[0_6px_0_rgba(0,0,0,0.2)] transition-transform hover:-translate-y-[2px]">
            <?php echo esc_html($cta_txt); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right: Image -->
    <div class="lg:col-start-7 lg:col-end-12 xl:col-start-7 xl:col-end-12 order-1 lg:order-2 mb-6 lg:mb-0">
      <div class="relative mt-[45px] overflow-hidden" style="aspect-ratio: 16 / 9;">
        <?php if (!empty($image)) : ?>
          <img
            src="<?php echo esc_url($image['url']); ?>"
            alt="<?php echo esc_attr($image['alt']); ?>"
            width="<?php echo (int)($image['width'] ?? 1440); ?>"
            height="<?php echo (int)($image['height'] ?? 810); ?>"
            loading="lazy"
            decoding="async"
            class="absolute inset-0 w-full h-full object-cover" />
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>

<?php
$bundle_heading = get_field('front_page_bundle_heading');
$social_media   = get_field('social_media');   // ACF image array
$seo            = get_field('seo');
$re_branding    = get_field('re-branding');
$all_in_one     = get_field('all_in_one');
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
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all hover:-translate-y-1 hover:shadow-2xl">
          <img src="<?php echo esc_url($social_media['url']); ?>"
               alt="<?php echo esc_attr($social_media['alt']); ?>"
               width="<?php echo (int)$social_media['width']; ?>"
               height="<?php echo (int)$social_media['height']; ?>"
               loading="lazy" decoding="async"
               class="w-full h-full object-contain transition-transform group-hover:scale-[1.02]" />
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all hover:-translate-y-1 hover:shadow-2xl">
          <img src="<?php echo esc_url($seo['url']); ?>"
               alt="<?php echo esc_attr($seo['alt']); ?>"
               width="<?php echo (int)$seo['width']; ?>"
               height="<?php echo (int)$seo['height']; ?>"
               loading="lazy" decoding="async"
               class="w-full h-full object-contain transition-transform group-hover:scale-[1.02]" />
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all hover:-translate-y-1 hover:shadow-2xl">
          <img src="<?php echo esc_url($re_branding['url']); ?>"
               alt="<?php echo esc_attr($re_branding['alt']); ?>"
               width="<?php echo (int)$re_branding['width']; ?>"
               height="<?php echo (int)$re_branding['height']; ?>"
               loading="lazy" decoding="async"
               class="w-full h-full object-contain transition-transform group-hover:scale-[1.02]" />
        </a>
      </li>
      <li>
        <a href="#" class="group block relative overflow-hidden bg-white shadow-md transition-all hover:-translate-y-1 hover:shadow-2xl">
          <img src="<?php echo esc_url($all_in_one['url']); ?>"
               alt="<?php echo esc_attr($all_in_one['alt']); ?>"
               width="<?php echo (int)$all_in_one['width']; ?>"
               height="<?php echo (int)$all_in_one['height']; ?>"
               loading="lazy" decoding="async"
               class="w-full h-full object-contain transition-transform group-hover:scale-[1.02]" />
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
        <h3 class="text-[24px] font-semibold text-black font-['Poppins'] mb-2"><?php echo esc_html($title); ?></h3>
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
