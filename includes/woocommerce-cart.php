<?php
if ( ! function_exists( 'woocommerce_cart_link_fragment' ) ) {
  /**
   * Cart Fragments.
   *
   * Ensure cart contents update when products are added to the cart via AJAX.
   *
   * @param array $fragments Fragments to refresh via AJAX.
   * @return array Fragments to refresh via AJAX.
   */
  function woocommerce_cart_link_fragment( $fragments ) {
    ob_start();
    woocommerce_cart_link();
    $fragments['cart-content'] = ob_get_clean();
    return $fragments;
  }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_cart_link_fragment' );

if ( ! function_exists( 'woocommerce_cart_link' ) ) {
  /**
   * Cart Link.
   *
   * Displayed a link to the cart including the number of items present and the cart total.
   *
   * @return void
   */
  function woocommerce_cart_link() {
    ?>
    <div class="cart-content" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dd' ); ?>">
      <?php
      $item_count_text = sprintf(
        /* translators: number of items in the mini cart. */
        _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'dd' ),
        WC()->cart->get_cart_contents_count()
      );
      ?>
      <div class="header-cart">
        <i class="la la-shopping-cart"></i>
        <span class="count badge badge-info"><?php echo esc_html( $item_count_text ); ?></span>
      </div>
    </div>
    <?php
  }
}

if ( ! function_exists( 'woocommerce_header_cart' ) ) {
  /**
   * Display Header Cart.
   *
   * @return void
   */
  function woocommerce_header_cart() {
    if ( is_cart() ) {
      $class = 'current-menu-item';
    } else {
      $class = '';
    }
    ?>
    <div class="dropdown">
      <a class="header-cart" data-toggle="dropdown">
        <?php woocommerce_cart_link(); ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right header-cart-dropdown">
      <?php
        $instance = array(
          'title' => '',
        );
        the_widget( 'WC_Widget_Cart', $instance );
      ?>
      </div>
    </div>
    <?php
  }
}

?>