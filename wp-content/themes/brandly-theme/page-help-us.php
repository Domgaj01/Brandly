<?php get_header();
$heading     = get_field('help-us_heading');  
$text        = get_field('help_us_text');    
$image       = get_field('help_us_image');     
$cta_txt     = get_field('help_us_cta_text'); 
$cta_url     = get_field('help_us_cta_url');   
$formHeading = get_field('form_title');        
?>

<section class="bg-[#D9D9D9]/60" role="region" aria-labelledby="about-heading" aria-describedby="about-text">
  <div class="mx-auto w-full max-w-[1440px]
              px-4 sm:px-6 py-10 lg:py-14 xl:py-16
              gap-y-8 lg:grid lg:grid-cols-12 lg:gap-x-[45px] items-center">

    <!-- Left: Text -->
    <div class="lg:col-start-2 lg:col-end-7 xl:col-start-2 xl:col-end-7 order-2 lg:order-1">
      <?php if ($heading) : ?>
        <h1  id="about-heading"class="uppercase font-['Poppins'] font-semibold
                   text-[28px] sm:text-[32px] xl:text-[36px]
                   leading-[1.15] tracking-[0.05em] text-black mb-5 sm:mb-6" aria-label="<?php echo pll__('Welcome to Brandly.'); ?>" tabindex="0">
          <?php echo esc_html($heading); ?>
        </h1>
      <?php endif; ?>

      <?php if ($text) : ?>
        <div class="text-black font-['Poppins'] text-[15px] sm:text-[17px] xl:text-[18px]
                    leading-7 sm:leading-8 tracking-[0.02em] space-y-4 mb-6 sm:mb-8 max-w-[68ch]">
                    <p id="about-text" tabindex="0">
          <?php echo wp_kses_post( wpautop($text) ); ?>
          </p>
        </div>
      <?php endif; ?>

      <?php if ($cta_txt && $cta_url) : ?>
        <div class="mt-6 sm:mt-8">
          <a href="<?php echo esc_url($cta_url); ?>"
             class="inline-flex w-full sm:w-auto items-center justify-center
                    bg-black text-white
                    px-6 py-4 font-['Poppins'] text-[14px] sm:text-[16px] tracking-[0.05em]
                    hover:shadow-[0_6px_0_rgba(0,0,0,0.2)]
                    transition-transform hover:-translate-y-[2px]" aria-label="<?php echo pll__('Schedule a consultation'); ?>">
            <?php echo esc_html($cta_txt); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right: Image -->
    <div class="lg:col-start-7 lg:col-end-12 xl:col-start-7 xl:col-end-12 order-1 lg:order-2 mb-6 lg:mb-0">
      <div class="relative h-[220px] sm:h-[320px] mt-[45px] md:h-[380px] lg:h-[440px] xl:h-[520px] overflow-hidden">
        <?php if (!empty($image)) : ?>
          <img
            src="<?php echo esc_url($image['url']); ?>"
            alt="<?php echo esc_attr($image['alt']); ?>"
            class="absolute inset-0 w-full h-full object-cover" />
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>


<section role="region" aria-labelledby="form-heading" aria-describedby="form-questions form-answers">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <h2 id="form-heading"
        class="font-['Poppins'] text-[28px] sm:text-[36px] md:text-[48px] font-semibold tracking-[0.05em] text-[#4f44c6] text-center mb-8 sm:mb-11"
        aria-label="<?php echo esc_attr( pll__( 'Help Us' ) ); ?>"
        tabindex="0">
      <?php echo esc_html( pll__( 'Help Us' ) ); ?>
    </h2>

    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" class="space-y-6" novalidate>
      <input type="hidden" name="action" value="sample_form" />
      <?php wp_nonce_field( 'sample_form_action', 'sample_form_nonce' ); ?>

      <div class="space-y-8 sm:space-y-10 font-['Poppins'] font-semibold text-[16px] sm:text-[18px] md:text-[20px] tracking-[0.05em]" tabindex="0">

        <?php
        // Define static, trusted strings server-side
        $questions = [
          pll__( 'How well do our services meet your expectations?' ),
          pll__( 'How effective have our marketing strategies been for your business?' ),
          pll__( 'How well do our branding strategies reflect your company’s vision?' ),
          pll__( 'How would you rate our responsiveness and communication?' ),
          pll__( 'How well do we understand your business goals and challenges?' ),
          pll__( 'How satisfied are you with the professionalism of our team?' ),
          pll__( 'How satisfied are you with the results so far?' ),
        ];

        $options = [
          pll__( 'Very Poor' ),
          pll__( 'Poor' ),
          pll__( 'Average' ),
          pll__( 'Good' ),
          pll__( 'Excellent' ),
        ];

        foreach ( $questions as $index => $question ) :
          // Defensive: ensure $index is an integer
          $q_index = (int) $index; ?>
          <fieldset class="space-y-2">
            <legend class="mb-2">
              <?php echo esc_html( $question ); ?> <span class="text-red-600">*</span>
            </legend>

            <div class="flex flex-wrap sm:flex-nowrap items-center gap-4 sm:gap-8 md:gap-12">
              <?php foreach ( $options as $optIndex => $option ) :
                $id = 'q' . $q_index . '_opt' . (int) $optIndex; ?>
                <div class="flex items-center gap-2 w-1/2 sm:w-auto">
                  <input
                    type="radio"
                    id="<?php echo esc_attr( $id ); ?>"
                    name="answers[<?php echo esc_attr( (string) $q_index ); ?>]"
                    value="<?php echo esc_attr( $option ); ?>"
                    class="bg-[#4F44C6]"
                    required
                    />
                  <label for="<?php echo esc_attr( $id ); ?>"
                         class="font-['Poppins'] text-[11px] sm:text-[12px] md:text-[14px] font-semibold tracking-[0.05em]">
                    <?php echo esc_html( $option ); ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>
          </fieldset>
        <?php endforeach; ?>
      </div>

      <div class="text-center pt-8 sm:pt-[45px]">
        <button type="submit" class="bg-[#333333] text-white px-4 sm:px-6 py-2 sm:py-3 font-semibold font-['Poppins'] text-[16px] sm:text-[18px] tracking-[0.05em]">
          <?php echo esc_html( pll__( 'Submit' ) ); ?>
        </button>
      </div>
    </form>
  </div>
</section>



<?php get_footer(); ?>
