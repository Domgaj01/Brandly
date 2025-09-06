<footer class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] grid grid-cols-1 gap-y-10 md:grid-cols-3 md:gap-x-12 xl:grid-cols-12 xl:gap-x-[45px] py-12 px-4 sm:px-6">

    <!-- logo + about -->
    <div class="md:col-span-1 xl:col-start-2 xl:col-end-5">
      <img
        src="<?php echo get_template_directory_uri(); ?>/images/Logo-Brandly.png"
        alt="Brandly"
        class="h-[40px] sm:h-[46px] xl:h-[51px] w-auto object-contain mb-6"
      />

      <div class="space-y-3 text-[14px] leading-7 text-black tracking-[0.05em] font-['Poppins'] max-w-md">
        <p>
          We help businesses grow with marketing bundles. From SEO to rebranding, we create simple and effective solutions that make your brand stand out.
        </p>
      </div>

      <!-- socials -->
      <div class="mt-6 flex items-center space-x-4">
        <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full">
          <span class="iconify text-[30px]" data-icon="mdi:instagram"></span>
        </a>
        <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full">
          <span class="iconify text-[30px]" data-icon="mdi:facebook"></span>
        </a>
      </div>
    </div>

    <!-- contact -->
    <div class="md:col-span-1 xl:col-start-6 xl:col-end-10">
      <h3 class="text-[20px] sm:text-[24px] text-black mb-6 tracking-[0.05em] font-['Poppins'] font-semibold">Contact Information</h3>
      <ul class="space-y-5 text-black">
        <li class="flex items-center space-x-3">
          <span class="iconify text-[24px] sm:text-[30px]" data-icon="ic:baseline-phone" aria-hidden="true"></span>
          <span class="text-[16px] tracking-[0.05em] font-['Poppins']">+45 12 36 78 90</span>
        </li>
        <li class="flex items-center space-x-3">
          <span class="iconify text-[24px] sm:text-[30px]" data-icon="ic:outline-email" aria-hidden="true"></span>
          <span class="text-[16px] tracking-[0.05em] font-['Poppins']">info@brandly.com</span>
        </li>
        <li class="flex items-center space-x-3">
          <span class="iconify text-[24px] sm:text-[30px]" data-icon="rivet-icons:map-pin" aria-hidden="true"></span>
          <span class="text-[16px] tracking-[0.05em] font-['Poppins']">Esbjerg, Denmark</span>
        </li>
      </ul>
    </div>

    <!-- nav -->
    <nav class="md:col-span-1 xl:col-start-10 xl:col-end-12">
      <h3 class="text-[20px] sm:text-[24px] text-black mb-6 tracking-[0.05em] font-['Poppins'] font-semibold">Navigation</h3>
      <ul class="space-y-5 tracking-wide text-black">
        <li><a href="#" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']">HOME</a></li>
        <li><a href="#" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']">BUNDLES</a></li>
        <li><a href="<?php echo home_url('/blogs'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']">BLOGS</a></li>
        <li><a href="<?php echo home_url('/help-us'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']">Help Us</a></li>
      </ul>
    </nav>

    <!-- divider -->
    <div class="col-span-1 md:col-span-3 xl:col-span-12 border-t border-[#353535]"></div>

    <!-- bottom row -->
    <div class="text-black text-sm md:col-span-1 xl:col-start-2 xl:col-end-6">@ <?php echo date('Y'); ?></div>
    <div class="text-black text-sm md:col-span-2 md:text-right xl:col-start-7 xl:col-end-12">
      Copyright © Brandly. Denmark Esbjerg
    </div>
  </div>
</footer>
