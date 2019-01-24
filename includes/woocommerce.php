<?php
/**
 * WooCommerce Compatibility File
 * @link https://woocommerce.com/
 */

/**
 * WooCommerce setup function.
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 */
function woocommerce_setup() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'woocommerce_setup' );

/**
 * Disable the default WooCommerce stylesheet.
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * WooCommerce specific scripts & stylesheets.
 */
function woocommerce_scripts() {
  wp_enqueue_style( 'dd-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );
  $font_path   = WC()->plugin_url() . '/assets/fonts/';
  $inline_font = '@font-face {
      font-family: "star";
      src: url("' . $font_path . 'star.eot");
      src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
        url("' . $font_path . 'star.woff") format("woff"),
        url("' . $font_path . 'star.ttf") format("truetype"),
        url("' . $font_path . 'star.svg#star") format("svg");
      font-weight: normal;
      font-style: normal;
    }';
  wp_add_inline_style( 'dd-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 */
function woocommerce_active_body_class( $classes ) {
  $classes[] = 'woocommerce-active';
  return $classes;
}
add_filter( 'body_class', 'woocommerce_active_body_class' );

/**
 * Add column width and whatever other additional CSS classes to products in loop.
 */
function woocommerce_listing_columns( $classes, $class = '', $post_id = '' ) {
  // Check if current product is in single view.
  // Important to prevent conflict if other loops are on single product (ex. related products).
  if ( ! is_single( $post_id ) && in_array( 'product', $classes, true ) ) {
    $per_row = 3;

    $column_width = '-' . ( 12 / $per_row );

    // Column responsive breakpoint.
    $breakpoint = get_theme_mod( 'wc_product_column_breakpoint', 'md' );

    if ( '' !== $breakpoint ) {
      $column_breakpoint = '-' . $breakpoint;
    }
    $classes[] = sanitize_html_class( 'col' . $column_breakpoint . $column_width );
  }
  return $classes;
}
add_filter( 'post_class', 'woocommerce_listing_columns', 20, 3 );

/**
 * Product Listing Meta (Start)
 */
function woocommerce_meta_open() {
 	echo '<div class="single-product-meta d-flex flex-row align-items-center justify-content-between">';
}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_meta_open', 15 );

/**
 * Product Listing Meta (End)
 */
function woocommerce_meta_close() {
  echo '</div>';
}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_meta_close', 35 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Listing Wrapper (Start)
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 */
function woocommerce_wrapper_before() {
  ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="container">
  <?php
}
add_action( 'woocommerce_before_main_content', 'woocommerce_wrapper_before' );

/**
 * Listing Wrapper (After)
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 */
function woocommerce_wrapper_after() {
    ?>
      </div>
    </main>
  </div>
  <?php
}
add_action( 'woocommerce_after_main_content', 'woocommerce_wrapper_after' );

/**
 * Default loop columns on product archives.
 */
function woocommerce_loop_columns() {
  return 3;
}
add_filter( 'loop_shop_columns', 'woocommerce_loop_columns' );


/**
 * Product columns wrapper.
 */
function woocommerce_product_columns_wrapper() {
  $columns = woocommerce_loop_columns();
  echo '<div class="col-wrap-' . absint( $columns ) . '">';
}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_columns_wrapper', 40 );


/**
 * Product columns wrapper close.
 */
function woocommerce_product_columns_wrapper_close() {
  echo '</div>';
}

add_action( 'woocommerce_after_shop_loop', 'woocommerce_product_columns_wrapper_close', 40 );


// function woocommerce_product_loop_start() {
// 	echo '<div class="wsis-wc-product-loop">';
// }

// function woocommerce_product_loop_end() {
// 	echo '</div>';
// }