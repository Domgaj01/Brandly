<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Sticky Navbar -->
  <header class="sticky top-0 inset-x-0 z-50 bg-white backdrop-blur">
    <div class="mx-auto w-full max-w-[1440px] xl:h-[120px] xl:grid xl:grid-cols-12 xl:gap-x-[45px] items-center
                px-4 sm:px-6 py-3 xl:py-0 flex justify-between">

      <!-- Logo -->
      <div class="flex items-center xl:col-start-2 xl:col-end-4">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Go to homepage" class="inline-flex rounded focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500">
    <img
      src="<?php echo get_template_directory_uri(); ?>/images/Logo-Brandly.png"
      alt="Brandly Logo"
      class="h-[40px] sm:h-[46px] xl:h-[51px] w-[204px] object-contain"
    />
  </a>
</div>
  <!-- Nav (desktop only) -->
<nav class="hidden xl:block xl:col-start-5 xl:col-end-10" aria-label="Main menu">
  <ul class="flex justify-center items-center space-x-[45px] text-gray-800">
    <li><a href="<?php echo home_url('/'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Home') ); ?></a></li>
    <li><a href="<?php echo home_url('/shop'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Products') ); ?></a></li>
    <li><a href="<?php echo home_url('/goals'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Goals') ); ?></a></li>
    <li><a href="<?php echo home_url('/blogs'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Blogs') ); ?></a></li>
    <li><a href="<?php echo home_url('/help-us'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Help Us') ); ?></a></li>
  </ul>
</nav>

<div id="lang-switcher-wrap"
     class="relative xl:col-start-10 xl:col-end-11 font-[Poppins] min-w-[24px] min-h-[24px] flex items-center justify-center px-4">

  <!-- Visually hidden label text -->
  <label for="lang-switcher" id="language-switcher-label" class="sr-only">
    <?php echo esc_html( pll__('Select language') ); ?>
  </label>

  <?php
    pll_the_languages([
      'dropdown'      => 1,
      'show_flags'    => 1,
      'show_names'    => 0,
      'hide_if_empty' => 0,
      'force_home'    => 0,
      'dropdown_id'   => 'lang-switcher', // ensures <select id="lang-switcher">
    ]);
  ?>
</div>


<script>
(function () {
  var wrap = document.getElementById('lang-switcher-wrap');
  if (!wrap) return;

  var sel = wrap.querySelector('select');
  if (!sel) return;

  if (!sel.id) sel.id = 'language-switcher';


  var labId = 'language-switcher-label';
  sel.setAttribute('aria-labelledby', labId);

  if (!sel.hasAttribute('aria-label')) {
    sel.setAttribute('aria-label', <?php echo json_encode( pll__('Select language') ); ?>);
  }

  if (!wrap.querySelector('label[for="'+ sel.id +'"]')) {
    var hardLabel = document.createElement('label');
    hardLabel.className = 'sr-only';
    hardLabel.setAttribute('for', sel.id);
    hardLabel.textContent = <?php echo json_encode( pll__('Select language') ); ?>;
    sel.parentNode.insertBefore(hardLabel, sel);
  }
})();
</script>



      <!-- Cart -->
      <div class="flex items-center gap-4 xl:col-start-11 xl:col-end-12">
  <a href="<?php echo wc_get_cart_url(); ?>" aria-label="Cart">
    <span class="iconify text-[28px] xl:text-[40px] text-gray-800" data-icon="mdi:cart-outline"></span>
  </a>
  <button id="navToggle" aria-label="Toggle menu" class="xl:hidden">
    <span class="iconify text-[30px] text-gray-900" data-icon="mdi:menu"></span>
  </button>
</div>
</div>
    

   <!-- Mobile Nav -->
   <nav id="mobileNav" class="xl:hidden hidden border-t border-gray-200 bg-white" aria-label="Main menu mobile">
  <ul class="flex flex-col items-center sm:text-gray-800 text-center">
    <li><a href="<?php echo home_url('/'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Home') ); ?></a></li>
    <li><a href="<?php echo home_url('/shop'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Products') ); ?></a></li>
    <li><a href="<?php echo home_url('/goals'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Goals') ); ?></a></li>
    <li><a href="<?php echo home_url('/blogs'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Blogs') ); ?></a></li>
    <li><a href="<?php echo home_url('/help-us'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Help Us') ); ?></a></li>
  </ul>
</nav>


</header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const btn = document.getElementById('navToggle');
      const menu = document.getElementById('mobileNav');
      if (btn && menu) {
        btn.addEventListener('click', () => {
          menu.classList.toggle('hidden');
        });
      }
    });
  </script>