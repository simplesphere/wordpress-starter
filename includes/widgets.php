<?php
  function sidebar() {
    register_sidebar(
      array (
        'name' => __( 'Custom', 'simplesphere' ),
        'id' => 'main-sidebar',
        'description' => __( 'Primary Sidebar', 'simplesphere' ),
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      )
    );
  }
  add_action( 'widgets_init', 'sidebar' );
?>