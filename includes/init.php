<?php
/**!
 * Setup
 */

// Register Theme Features
function theme_setup()  {

	if ( ! isset($content_width) ) {
		$content_width = 1200;
	}

	// Add theme support for Post Formats
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		));

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Set custom thumbnail dimensions
	set_post_thumbnail_size( 300, 300, true );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array(  ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Default image sizes
	update_option('thumbnail_size_w', 285);
	update_option('small_size_w', 350);
	update_option('medium_size_w', 730);
	update_option('large_size_w', 1280);

	// Add theme support for Translation
	load_theme_textdomain( 'simplesphere', get_template_directory() . '/language' );

	// Add custom stylesheet for admin
	add_editor_style('assets/css/admin.css');
}
add_action( 'after_setup_theme', 'theme_setup' );
