<?php
  function post_has_archive($args, $post_type) {
    // 投稿タイプが'post'の場合、アーカイブを有効にする
    if ($post_type == 'post') {
        $args['rewrite'] = true; 
        $args['has_archive'] = true;
        $args['menu_position'] = 5;
    }
    return $args;
  }
  add_filter('register_post_type_args', 'post_has_archive', 10, 2);

  add_action('init', function () {
    add_theme_support( 'post-thumbnails' );
  });

  add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
  function wpcf7_autop_return_false() {
    return false;
  }

  //  function my_enqueue_scripts() {
  //    wp_enqueue_script('mainjs', get_template_directory_uri() . '/dist/assets/main-0810.js', array(), null, false);
  //  }
  //  add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


  if (!is_admin()) {
    wp_deregister_script('jquery');
  }
  
  add_action('wp_enqueue_scripts', 'load_wpcf7_scripts');
  function load_wpcf7_scripts() {
      if (is_page('contact') || is_page('confirm') || is_page('thanks')) {
          if (function_exists('wpcf7_enqueue_scripts')) {
              wpcf7_enqueue_scripts();
          }
          if (function_exists('wpcf7_enqueue_styles')) {
              wpcf7_enqueue_styles();
          }
      }
  }