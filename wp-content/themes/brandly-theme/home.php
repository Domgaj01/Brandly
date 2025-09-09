<?php get_header();?>

<section class="bg-white relative">
  <div class="mx-auto w-full max-w-[1440px] grid xl:grid-cols-12 xl:gap-x-[45px] items-center px-4 sm:px-6 py-8 xl:py-12 relative">

    
<h1 class="block xl:hidden text-[32px] sm:text-[48px] font-semibold tracking-[0.05em] font-['Poppins'] text-black mb-6">
  Blogs
</h1>

<div class="hidden xl:block xl:col-start-4 xl:col-end-12 relative h-[320px] sm:h-[420px] xl:h-[520px] overflow-hidden">
  <img
    src="<?php echo get_template_directory_uri(); ?>/images/blogs-hero.jpg"
    alt="Blogs Hero"
    class="absolute inset-0 w-full h-full object-cover"
  />
  <div class="absolute inset-0 bg-black/30"></div>
</div>

    <h1 class="hidden xl:flex xl:col-start-3 xl:col-end-4 absolute top-1/2 -translate-y-1/2
               text-[44px] sm:text-[64px] xl:text-[80px]
               leading-none font-semibold tracking-[0.11em] font-['Poppins']
               z-20">
      <span class="text-black">Bl</span>
      <span class="bg-[linear-gradient(to_right,black_50%,white_50%)] bg-clip-text text-transparent">o</span>
      <span class="text-white">gs</span>
    </h1>

  </div>
</section>

<?php
$paged = max( 1, get_query_var('paged') );
$q = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 6,
  'paged' => $paged,
  'lang' => pll_current_language(),
]);

if ( $q->have_posts() ) :
  while ( $q->have_posts() ) : $q->the_post();

  $excerpt = get_the_excerpt();
  if ( ! $excerpt ) {
    $excerpt = wp_trim_words(
      wp_strip_all_tags( get_the_content() ),
      32,
      '…'
    );
  }
?>
  <section class="bg-white">
    <div class="mx-auto w-full max-w-[1440px] xl:grid xl:grid-cols-12 xl:gap-x-[45px] px-4 sm:px-6 py-10">

      <!-- Image -->
      <a href="<?php the_permalink(); ?>" class="block h-[220px] sm:h-[280px] xl:h-[320px] overflow-hidden md:col-span-5 xl:col-start-1"> 
        <?php if ( has_post_thumbnail() ) : ?> <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover hover:scale-[1.02] transition-transform']); 
        ?> <?php else : ?> <img src="<?php echo get_template_directory_uri(); ?>/images/blog-image.webp" alt="" class="w-full h-full object-cover opacity-80"> 
        <?php endif; ?> </a>

      <!-- Content -->
      <div class="mt-6 xl:mt-0 md:col-span-7 xl:col-start-6 xl:col-end-13">

        <!-- Tags + Categories -->
<div class="flex flex-wrap gap-x-4 gap-y-2 mb-4">
  <?php if ( $tags = get_the_tags() ) : ?>
    <?php foreach ( $tags as $tag ) : ?>
      <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
         class="text-[#8075F7] text-[12px] font-['Poppins'] tracking-[0.05em] uppercase font-bold hover:opacity-80">
        #<?php echo esc_html( $tag->name ); ?>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if ( $cats = get_the_category() ) : ?>
    <?php foreach ( $cats as $cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
         class="text-[#8075F7] text-[12px] font-['Poppins'] tracking-[0.05em] uppercase font-normal hover:opacity-80">
        <?php echo esc_html( $cat->name ); ?>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
</div>


        <!-- Title -->
        <h2 class="text-[16px] sm:text-[16px] xl:text-[18px] font-semibold tracking-[0.05em]
                   font-['Poppins'] text-black uppercase mb-3">
          <a href="<?php the_permalink(); ?>" class="hover:opacity-90">
            <?php the_title(); ?>
          </a>
        </h2>

        
        <p class="text-[16px] leading-7 text-black/80 font-['Poppins'] tracking-[0.05em] mb-5">
          <?php echo esc_html( $excerpt ); ?>
        </p>

        
        <div class="flex flex-wrap items-center gap-6 font-['Poppins'] text-[12px] tracking-[0.05em]">
          <span class="uppercase font-semibold text-[#8075F7]"><?php the_author(); ?></span>
          <span class="uppercase font-light text-black"><?php echo esc_html( get_the_date('F j, Y') ); ?></span>
        </div>
      </div>
    </div>
  </section>
<?php
  endwhile; 
  wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>