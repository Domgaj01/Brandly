<?php get_header(); ?>

<main class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 py-10">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Title -->
    <h1 class="text-3xl font-bold mb-4 font-['Poppins']"><?php the_title(); ?></h1>

    <!-- Meta (Author + Date + Tags) -->
    <div class="flex flex-wrap items-center gap-4 text-sm font-['Poppins'] text-black/70 mb-6">
      <span class="uppercase font-semibold text-[#8075F7]"><?php the_author(); ?></span>
      <span class="uppercase"><?php echo get_the_date('F j, Y'); ?></span>

      <?php if ( $tags = get_the_tags() ) : ?>
        <div class="flex flex-wrap gap-2 ml-4">
          <?php foreach ( $tags as $tag ) : ?>
            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
               class="text-[#8075F7] uppercase text-xs font-bold hover:opacity-80">
              #<?php echo esc_html( $tag->name ); ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Featured Image -->
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="mb-8">
        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-md']); ?>
      </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="prose max-w-none font-['Poppins'] text-black">
      <?php the_content(); ?>
    </div>

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
