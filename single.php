<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package simplesphere
 */
get_header(); ?>

<main id="primary" class="main-content">
	<div class="container">
	  <div class="row">
	    <div class="col-md-8">
	      <section id="content" class="home-listing" role="main">
	      <?php get_template_part('templates/loops/single-post', get_post_format()); ?>
	      </section>
	    </div>
	    <div class="col-md-4">
	    	<aside id="sidebar" class="sidebar-right">
	    	<?php get_sidebar(); ?>
	    	</aside>
	    </div>
	  </div>
	</div>
</main>

<?php get_footer(); ?>