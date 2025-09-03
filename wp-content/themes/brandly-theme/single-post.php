<?php get_header(); ?>

<main class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-12 xl:grid xl:grid-cols-12 xl:gap-x-[45px]">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="xl:col-start-3 xl:col-span-8">

      <!-- Title -->
      <h1 class="text-4xl sm:text-5xl font-bold mb-6 font-['Poppins'] leading-snug">
        <?php the_title(); ?>
      </h1>

      <!-- Meta (Author + Date + Tags) -->
      <div class="flex flex-wrap items-center gap-4 text-sm sm:text-base font-['Poppins'] text-black/70 mb-8">
        <span class="uppercase font-semibold text-[#8075F7]"><?php the_author(); ?></span>
        <span class="uppercase"><?php echo get_the_date('F j, Y'); ?></span>

        <?php if ( $tags = get_the_tags() ) : ?>
          <div class="flex flex-wrap gap-2 ml-4">
            <?php foreach ( $tags as $tag ) : ?>
              <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                 class="text-[#8075F7] uppercase text-xs sm:text-sm font-bold hover:opacity-80 transition-opacity duration-200">
                #<?php echo esc_html( $tag->name ); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Featured Image -->
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="mb-10">
          <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg shadow-lg']); ?>
        </div>
      <?php endif; ?>

      <!-- Content -->
      <div class="prose max-w-none font-['Poppins'] text-black leading-relaxed space-y-6 sm:space-y-8">
        <?php the_content(); ?>
      </div>

    </div> <!-- end xl:col-start-3 xl:col-span-8 -->

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
