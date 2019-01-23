<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta name="description" content="<?php if ( is_single() ) {
      single_post_title('', true);
    } else {
      bloginfo('name'); echo " - "; bloginfo('description');
    }
  ?>" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="sr-only sr-only-focusable" href="#content"><?php echo esc_html_x('Skip to content', 'Content', 'simplesphere'); ?></a>
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-navigation" aria-controls="header-navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header-navigation">
              <?php
                wp_nav_menu( array(
                  'theme_location'  => 'navbar',
                  'container'       => false,
                  'menu_class'      => '',
                  'fallback_cb'     => '__return_false',
                  'items_wrap'      => '<ul id="%1$s" class="navbar-nav ml-auto %2$s">%3$s</ul>',
                  'depth'           => 2,
                  'walker'          => new bootstrap_walker_nav_menu()
                ) );
              ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>


