# ampforwp-custom-theme
A custom AMP theme built on AMPforWP plugin, more details at https://ampforwp.com/step-step-guide-modify-amp-theme

# How to make custom page templates 

Just change the lines here: https://github.com/MohammedKaludi/ampforwp-custom-theme/blob/master/ampforwp-custom-theme.php#L53

into this:

 `if ( is_single() || is_page() ) {
  if('single' === $type && !('product' === $post->post_type )) {
    if ( $post->ID == 'POST ID') {
      $file = AMPFORWP_CUSTOM_THEME . '/template/custom-template.php';
    } else {
      $file = AMPFORWP_CUSTOM_THEME . '/template/single.php';
    } 
   }
}`

You can use this code for any number of pages/posts you want to create.

