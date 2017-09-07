</div> <!-- .amp-wrapper -->
<footer class="footer container">
        <?php
          global $allowed_html;
          global $redux_builder_amp;
          echo wp_kses($redux_builder_amp['amp-translator-footer-text'],$allowed_html) ;
          if($redux_builder_amp['amp-footer-link-non-amp-page']=='1') { ?> | <?php ampforwp_view_nonamp(); } 
          ?>
</footer>
<?php do_action('ampforwp_global_after_footer');
/* TODO: Check ampforwp_global_after_footer hook, it contains search functions which have amp-lightbox, we need to check and remove it.