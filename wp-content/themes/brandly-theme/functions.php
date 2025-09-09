<?php function 
ic_load_resources(){ 
wp_enqueue_style("style", "style.css");
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
      "How well do our services meet your expectations?",
      "How effective have our marketing strategies been for your business?",
      "How well do our branding strategies reflect your company’s vision?",
      "How would you rate our responsiveness and communication?",
      "How well do we understand your business goals and challenges?",
      "How satisfied are you with the professionalism of our team?",
      "How satisfied are you with the results so far?",
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

  ?>