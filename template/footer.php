<footer class="amp-footer">
      <p>
        <?php
          global $allowed_html;
          global $redux_builder_amp;
          echo wp_kses($redux_builder_amp['amp-translator-footer-text'],$allowed_html) ;
          ?>
      </p>
</footer>
<?php do_action('ampforwp_global_after_footer'); ?><?php // AD slot #2
do_action('amp_post_template_above_footer');?>