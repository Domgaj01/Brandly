<?php function 
ic_load_resources(){ 
wp_enqueue_script("poppins-font" , "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"); 
wp_enqueue_script("montserrat-font" , "https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"); wp_enqueue_style('site-style', get_template_directory_uri(). '/style.css'); 
wp_enqueue_script('site-script', get_template_directory_uri(). '/script.js'); 
wp_enqueue_style('tailwind', get_template_directory_uri() . '/src/output.css'); 
wp_enqueue_script('iconify','https://code.iconify.design/3/3.1.0/iconify.min.js'); 
wp_enqueue_script('tailwind-play', 'https://cdn.tailwindcss.com', [], null, false);

    } 
    add_action('wp_enqueue_scripts', 'ic_load_resources'); 
    add_action('after_setup_theme', function () {
        add_theme_support('post-thumbnails');
      });

      add_action('init', function () {
        register_post_type('review', [
          'label' => 'Reviews',
          'labels' => [
            'name' => 'Reviews',
            'singular_name' => 'Review',
            'add_new_item' => 'Add New Review',
          ],
          'public' => true,
          'has_archive' => false,
          'rewrite' => ['slug' => 'reviews'],
          'menu_icon' => 'dashicons-testimonial',
          'supports' => ['title', 'editor', 'thumbnail'], // title=name, editor=text
          'show_in_rest' => true,
        ]);
      });
    ?>