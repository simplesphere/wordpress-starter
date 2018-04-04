<?php

/**
 * Image Sizes
 */

/* Enable support for Post Thumbnails on posts and pages. */
add_theme_support('post-thumbnails');
add_image_size('related-article-size', 400, 200, true);
add_image_size('homepage-grid-size', 400, 200, array( 'center', 'center'));
add_image_size('homepage-list-size', 1440, 600, array( 'center', 'center'));
add_image_size('homepage-list-post', 400, 200, array( 'center', 'center'));
