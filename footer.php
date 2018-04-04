  <footer id="footer" class="footer bg-light" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="container-fluid">
      <div class="row">
        <?php dynamic_sidebar('footer-widget-area'); ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

</body>
</html>
