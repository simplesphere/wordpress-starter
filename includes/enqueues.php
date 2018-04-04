<?php
/**!
 * Enqueues
 */
if ( ! function_exists('scripts_import') ) {
	function scripts_import() {
		wp_register_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css', false, '4.0.0', null);
		wp_enqueue_style('bootstrap-css');

	  wp_register_style('custom-css', get_template_directory_uri() . '/assets/css/main.min.css', false, null);
		wp_enqueue_style('custom-css');


		wp_register_script('jquery-3.3.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1', true);
		wp_enqueue_script('jquery-3.3.1');

		wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '1.12.9', true);
		wp_enqueue_script('popper');

	  wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js', false, '4.0.0', true);
		wp_enqueue_script('bootstrap-js');

		wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', false, null, true);
		wp_enqueue_script('custom-js');

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'scripts_import', 100);
