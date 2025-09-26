<footer class="bg-white">
  <div class="mx-auto w-full max-w-[1440px] grid grid-cols-1 gap-y-10 md:grid-cols-3 md:gap-x-12 xl:grid-cols-12 xl:gap-x-[45px] py-12 px-4 sm:px-6">

    
    <div class="md:col-span-1 xl:col-start-2 xl:col-end-5">
    <a href="<?php echo esc_url( home_url( '/help-us' ) ); ?>" aria-label="Go to homepage" class="inline-flex rounded focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500">
    <img
      src="<?php echo get_template_directory_uri(); ?>/images/Logo-Brandly.png"
      alt="Brandly Logo"
      class="h-[40px] sm:h-[46px] xl:h-[51px] w-[204px] object-contain"
    />
  </a>

  <div class="space-y-3 text-[14px] leading-7 text-black tracking-[0.05em] font-['Poppins'] max-w-md">
  <p>
    <?php echo esc_html( pll__('We help businesses grow with marketing bundles. From SEO to rebranding, we create simple and effective solutions that make your brand stand out.') ); ?>
  </p>
</div>
      
      <div class="mt-6 flex items-center space-x-4">
        <a href="https://www.instagram.com/" class="inline-flex h-10 w-10 items-center justify-center rounded-full"  aria-label="Instagram">
          <span class="iconify text-[30px]" data-icon="mdi:instagram"></span>
        </a>
        <a href="https://www.facebook.com/?locale=da_DK" class="inline-flex h-10 w-10 items-center justify-center rounded-full" aria-label="Facebook">
          <span class="iconify text-[30px]" data-icon="mdi:facebook"></span>
        </a>
      </div>
    </div>

    
    <div class="md:col-span-1 xl:col-start-6 xl:col-end-10">
  <h3 class="text-[20px] sm:text-[24px] text-black mb-6 tracking-[0.05em] font-['Poppins'] font-semibold">
    Contact Information
  </h3>

  <ul class="space-y-5 text-black">
  <li class="flex items-center space-x-3">
    <span class="iconify text-[24px] sm:text-[30px]" data-icon="ic:baseline-phone" aria-hidden="true"></span>
    <a href="tel:+4512367890"
       class="text-[16px] tracking-[0.05em] font-['Poppins'] focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-black rounded">
      <span class="sr-only">Call us at </span>+45 12 36 78 90
    </a>
  </li>

  <li class="flex items-center space-x-3">
    <span class="iconify text-[24px] sm:text-[30px]" data-icon="ic:outline-email" aria-hidden="true"></span>
    <a href="mailto:info@brandly.com"
       class="text-[16px] tracking-[0.05em] font-['Poppins'] focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-black rounded">
      <span class="sr-only">Email us at </span>info@brandly.com
    </a>
  </li>

  <li class="flex items-center space-x-3">
    <span class="iconify text-[24px] sm:text-[30px]" data-icon="rivet-icons:map-pin" aria-hidden="true"></span>
    <address class="not-italic text-[16px] tracking-[0.05em] font-['Poppins']">
      Esbjerg, Denmark
    </address>
  </li>
</ul>

</div>


    
    <nav class="md:col-span-1 xl:col-start-10 xl:col-end-12">
      <h3 class="text-[20px] sm:text-[24px] text-black mb-6 tracking-[0.05em] font-['Poppins'] font-semibold">Navigation</h3>
      <ul class="space-y-5 tracking-wide text-black">
        <li><a href="<?php echo home_url('/'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Home') );?> </a></li>
        <li><a href="<?php echo home_url('/goals'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Goals') ); ?></a></li>
        <li><a href="<?php echo home_url('/blogs'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Blogs') ); ?></a></li>
        <li><a href="<?php echo home_url('/help-us'); ?>" class="hover:opacity-80 text-[16px] tracking-[0.05em] font-['Poppins']"><?php echo esc_html( pll__('Help Us') ); ?></a></li>
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
  <?php wp_footer(); ?>
</body>
</footer>
