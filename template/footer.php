<footer class="container">
  <div id="footer">
      <p>
        <?php
          global $allowed_html;
          global $redux_builder_amp;
          echo wp_kses($redux_builder_amp['amp-translator-footer-text'],$allowed_html) ;
          ?>
      </p>
  </div>
</footer>
<?php do_action('ampforwp_global_after_footer'); ?>