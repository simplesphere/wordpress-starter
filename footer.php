  <footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="footer-top">
      <div class="container">
        <div class="row">
        <?php dynamic_sidebar('footer-widget-area'); ?>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
