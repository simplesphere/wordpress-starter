<?php
/**!
 * Bootstrap pagination for index and category pages
 */

if ( ! function_exists( 'main_pagination' ) ) {
	function main_pagination() {
		global $wp_query;
		$big = 999999999;
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
			'prev_text' => __('Newer', 'simplesphere'),
			'next_text' => __('Older', 'simplesphere'),
			'type' => 'list'
		) );
		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
    $paginate_links = str_replace( "<li>", "<li class='page-item'>", $paginate_links );
    $paginate_links = str_replace( "<li class='page-item'><span aria-current='page' class='page-numbers current'>", "<li class='page-item active'><a class='page-link' href='#'>", $paginate_links );
		$paginate_links = str_replace( "<a", "<a class='page-link' ", $paginate_links );

		$paginate_links = str_replace( "</span>", "</a>", $paginate_links );
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
}
