<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplesphere
 */
get_header(); ?>

<main id="primary" class="main-content">
	<div class="container">
	  <div class="row">
	    <div class="col-md-8">
	      <section id="content" class="home-listing" role="main">
	      <?php get_template_part('templates/loops/index-loop'); ?>
	      </section>
	    </div>
	    <div class="col-md-4">
	    	<?php get_sidebar(); ?>
	    </div>
	  </div>
	</div>
</main>

<?php get_footer(); ?>
