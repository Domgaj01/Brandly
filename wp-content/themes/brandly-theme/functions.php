<?php function 
ic_load_resources(){ 
wp_enqueue_style("style",get_template_directory_uri() . "/style.css");
wp_enqueue_style("script",get_template_directory_uri() . "/script.js", [], null, true);
wp_enqueue_script('iconify','https://code.iconify.design/3/3.1.0/iconify.min.js'); 
wp_enqueue_script('tailwind-play', 'https://cdn.tailwindcss.com', [], null, false);

    } 
    add_action('wp_enqueue_scripts', 'ic_load_resources'); 
    add_action('after_setup_theme', function () {
        add_theme_support('post-thumbnails');
      });
      add_action('wp_enqueue_scripts', function () {
        // tvoje hlavné CSS (napr. style.css)
        wp_enqueue_style('theme-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
      
        // buildnutý Tailwind výstup
        wp_enqueue_style('tw-output', get_template_directory_uri() . '/src/output.css', [], filemtime(get_template_directory() . '/src/output.css'));
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
    
      function demo_sample_form_handler() {
        // Fetch the values
        $options = $_REQUEST["answers"];
    
        // Save to a custom post type
        $feedbackPost = wp_insert_post(array(
            "post_type"   => "feedback",
            "post_status" => "publish",
            "post_title"  => "Customer Feedback"
        ));
    
        
        if ($feedbackPost && !is_wp_error($feedbackPost)) {
            update_field("options", $options, $feedbackPost);
        }
    
        wp_redirect($_SERVER["HTTP_REFERER"]);
        exit;
    }
    add_action("admin_post_sample_form", "demo_sample_form_handler");
    add_action("admin_post_nopriv_sample_form", "demo_sample_form_handler");
    function register_feedback_cpt() {
      $labels = array(
          'name'          => 'Feedback',
          'singular_name' => 'Feedback',
          'menu_name'     => 'Feedback',
          'all_items'     => 'All Feedback',
          'add_new'       => 'Add New',
          'add_new_item'  => 'Add New Feedback',
          'edit_item'     => 'Edit Feedback',
          'view_item'     => 'View Feedback',
          'search_items'  => 'Search Feedback',
          'not_found'     => 'No feedback found.',
          'not_found_in_trash' => 'No feedback found in Trash.'
      );
  
      $args = array(
          'labels'        => $labels,
          'public'        => true,
          'show_ui'       => true,
          'show_in_menu'  => true,
          'menu_icon'     => 'dashicons-feedback',
          'supports'      => array('title', 'custom-fields'),
          'has_archive'   => true,
      );
  
      register_post_type('feedback', $args);
  }
  add_action('init', 'register_feedback_cpt');

  // Add custom metabox for feedback answers
function feedback_add_meta_box() {
  add_meta_box(
      'feedback_answers',
      'Feedback Answers',
      'feedback_render_meta_box',
      'feedback',
      'normal',
      'high'
  );
}
add_action('add_meta_boxes', 'feedback_add_meta_box');

function feedback_render_meta_box($post) {
  $options = get_post_meta($post->ID, 'options', true);

  if (!$options || !is_array($options)) {
      echo '<p>No answers submitted.</p>';
      return;
  }

  $questions = [
    pll__('How well do our services meet your expectations?'),
    pll__('How effective have our marketing strategies been for your business?'),
    pll__('How well do our branding strategies reflect your company’s vision?'),
    pll__('How would you rate our responsiveness and communication?'),
    pll__('How well do we understand your business goals and challenges?'),
    pll__('How satisfied are you with the professionalism of our team?'),
    pll__('How satisfied are you with the results so far?'),
];

  echo '<table class="widefat striped"><tbody>';
  foreach ($options as $index => $answer) {
      $question = isset($questions[$index]) ? $questions[$index] : 'Question ' . ($index+1);
      echo '<tr>';
      echo '<td><strong>' . esc_html($question) . '</strong></td>';
      echo '<td>' . esc_html($answer) . '</td>';
      echo '</tr>';
  }
  echo '</tbody></table>';
}

add_action('wp_head', function () {
  if (!is_front_page()) return;
  $poster = get_stylesheet_directory_uri() . '/images/hero-poster.jpg'; // uprav ak máš iný názov/cestu
  echo '<link rel="preload" as="image" href="' . esc_url($poster) . '">';
}, 1);

add_action('init', function() {
  // Headline
  pll_register_string('form_heading', 'Help Us');

  // Questions
  pll_register_string('q1', 'How well do our services meet your expectations?');
  pll_register_string('q2', 'How effective have our marketing strategies been for your business?');
  pll_register_string('q3', 'How well do our branding strategies reflect your company’s vision?');
  pll_register_string('q4', 'How would you rate our responsiveness and communication?');
  pll_register_string('q5', 'How well do we understand your business goals and challenges?');
  pll_register_string('q6', 'How satisfied are you with the professionalism of our team?');
  pll_register_string('q7', 'How satisfied are you with the results so far?');

  // Answer options
  pll_register_string('a1', 'Very Poor');
  pll_register_string('a2', 'Poor');
  pll_register_string('a3', 'Average');
  pll_register_string('a4', 'Good');
  pll_register_string('a5', 'Excellent');

  // Submit button
  pll_register_string('form_submit', 'Submit');

  // Form aria labels
  pll_register_string('about-us-heading', 'Welcome to Brandly.');
  pll_register_string('help-us-heading', 'Help Us with form');
  pll_register_string('sustainibility-heading', 'Sustainability Initiatives');
  pll_register_string('goals-heading', 'How we support our goals?');
  pll_register_string('hero-title', 'Hero title');
  pll_register_string('about-us-button', 'Schedule a consultation');
  pll_register_string('bundle1', 'Learn more about Social Media bundle');
  pll_register_string('bundle2', 'Learn more about SEO bundle');
  pll_register_string('bundle3', 'Learn more about Rebranding bundle');
  pll_register_string('bundle4', 'Learn more about All-in-One bundle');
});

add_filter('template_include', function ($template) {
  // Mapuj lokalizované slugs -> konkrétne page-{slug}.php templaty (EN)
  $map = [
    'hjaelp-os' => 'page-help-us.php', // DA slug -> EN template
    'maal'      => 'page-goals.php',   // DA slug (mål) -> EN template
    'mal'       => 'page-goals.php',   // alternatívny slug bez diakritiky
  ];

  if (is_page(array_keys($map))) {
    $slug = get_post_field('post_name', get_queried_object_id());
    if (isset($map[$slug])) {
      $alt = locate_template($map[$slug]);
      if ($alt) return $alt;
    }
  }

  return $template;
});

add_action('after_setup_theme', function () {
  if (!function_exists('pll_register_string')) return;
  foreach (['Home','Goals','Blogs','Help Us','Go to homepage'] as $s) {
    pll_register_string('nav_'.$s, $s);
  }
});

add_action('after_setup_theme', function () {
  if (!function_exists('pll_register_string')) return;

  pll_register_string(
    'footer_about',
    'We help businesses grow with marketing bundles. From SEO to rebranding, we create simple and effective solutions that make your brand stand out.'
  );
});

function mytheme_setup() {
  add_theme_support("title-tag");
}
add_action("after_setup_theme", "mytheme_setup");

  ?>