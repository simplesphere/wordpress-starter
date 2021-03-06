<?php
  function sidebar() {
    register_sidebar(
      array (
        'name' => __( 'Page Sidebar'),
        'id' => 'page-sidebar',
        'description' => __( 'Page Sidebar'),
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    register_sidebar(
      array (
        'name' => __( 'Product Sidebar'),
        'id' => 'product-sidebar',
        'description' => __( 'Product Sidebar'),
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
  }
  add_action( 'widgets_init', 'sidebar' );
?>