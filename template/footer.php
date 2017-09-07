<footer class="amp-footer">
      <p>
        <?php
          global $allowed_html;
          global $redux_builder_amp;
          echo wp_kses($redux_builder_amp['amp-translator-footer-text'],$allowed_html) ;
          ?>
      </p>
</footer>
 <?php do_action('ampforwp_global_after_footer');   
 /* TODO: Check ampforwp_global_after_footer hook, it contains search functions which have amp-lightbox, we need to check and remove it. 