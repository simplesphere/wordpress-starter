<?php
/**!
 * Cleanup
 */

// Less stuff in <head>
if ( ! function_exists('clean_head') ) {
  function clean_head() {
    remove_action('wp_head', 'feed_links_extra', 3);
    add_action('wp_head', 'ob_start', 1, 0);
    add_action('wp_head', function () {
      $pattern = '/.*' . preg_quote(esc_url(get_feed_link('comments_' . get_default_feed())), '/') . '.*[\r\n]+/';
      echo preg_replace($pattern, '', ob_get_clean());
    }, 3, 0);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('use_default_gallery_style', '__return_false');
    add_filter('emoji_svg_url', '__return_false');
    add_filter('show_recent_comments_widget_style', '__return_false');
    add_filter('the_generator', '__return_false');
  }
}
add_action('init', 'clean_head');

// Remove Query Strings From Static Resources (e.g style.css?v=1.1)
if ( ! function_exists('remove_version') ) {
  function remove_version( $src ) {
    $parts = explode( '?', $src );
    return $parts[0];
  }
}
add_filter( 'script_loader_src', 'remove_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_version', 15, 1 );

// Hide Login Hints
function disable_login_hints(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'disable_login_hints' );

// Search Slug
function change_search_slug() {
  if ( is_search() && ! empty( $_GET['s'] ) ) {
    wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
    exit();
  }
}
add_action( 'template_redirect', 'change_search_slug' );

// RSS posts thumbnails
function rss_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
    $content = '<p>' . get_the_post_thumbnail($post->ID) .'</p>' . get_the_content();
  }
  return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

// Allow shortcodes in widgetes
add_filter( 'widget_text', 'do_shortcode' );

// Allow HTML in author bio section
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');