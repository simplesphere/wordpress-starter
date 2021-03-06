<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package simplesphere
 */
get_header(); ?>

<main id="primary" class="main-content">
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
	      <section id="content" role="main">
	      <?php get_template_part('templates/loops/page-content'); ?>
	      </section>
	    </div>
	  </div>
	</div>
</main>

<?php get_footer(); ?>