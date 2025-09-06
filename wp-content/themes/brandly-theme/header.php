<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brandly</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white'); ?>>

  <!-- Sticky Navbar -->
  <header class="sticky top-0 inset-x-0 z-50 bg-white backdrop-blur">
    <div class="mx-auto w-full max-w-[1440px] xl:h-[120px] xl:grid xl:grid-cols-12 xl:gap-x-[45px] items-center
                px-4 sm:px-6 py-3 xl:py-0 flex justify-between">

      <!-- Logo -->
      <div class="flex items-center xl:col-start-2 xl:col-end-4">
        <img
          src="<?php echo get_template_directory_uri(); ?>/images/Logo-Brandly.png"
          alt="Brandly Logo"
          class="h-[40px] sm:h-[46px] xl:h-[51px] w-auto object-contain"
        />
      </div>

      <!-- Nav (desktop only) -->
      <nav class="hidden xl:block xl:col-start-5 xl:col-end-10" aria-label="Primary">
  <ul class="flex justify-center items-center space-x-[45px] text-gray-800">
    <li><a href="<?php echo home_url('/'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']">Home</a></li>
    <li><a href="#" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']">Bundles</a></li>
    <li><a href="<?php echo home_url('/blogs'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']">Blogs</a></li>
    <li><a href="<?php echo home_url('/help-us'); ?>" class="hover:text-black text-[20px] tracking-[0.05em] font-['Poppins']">Help Us</a></li>
  </ul>
</nav>
<!-- Language Selector (Navbar) -->
<div class="relative xl:col-start-10 xl:col-end-11 font-[Poppins]">
  <?php pll_the_languages([
      'dropdown'   => 1,       // output as dropdown
      'show_flags' => 1,       // show flags
      'show_names' => 0,       // only flags
      'hide_if_empty' => 0      // show even if no translation
  ]); ?>
</div>


      <!-- Cart -->
      <div class="flex items-center gap-4 xl:col-start-11 xl:col-end-12">
        <button aria-label="Cart" class="p-1">
          <span class="iconify text-[28px] xl:text-[40px] text-gray-800" data-icon="mdi:cart-outline"></span>
        </button>
        <button id="navToggle" aria-label="Toggle menu" class="xl:hidden p-2">
          <span class="iconify text-[30px] text-gray-900" data-icon="mdi:menu"></span>
        </button>
      </div>
    </div>

    <!-- Mobile Nav -->
    <nav id="mobileNav" class="xl:hidden hidden border-t border-gray-200 bg-white">
      <ul class="flex flex-col gap-2 px-4 sm:px-6 py-4 text-gray-800">
        <li><a href="#" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']">Home</a></li>
        <li><a href="#" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']">Bundles</a></li>
        <li><a href="<?php echo home_url('/blogs'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']">Blogs</a></li>
        <li><a href="<?php echo home_url('/help-us'); ?>" class="block py-2 text-[18px] tracking-[0.05em] font-['Poppins']">Help Us</a></li>
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