<?php global $redux_builder_amp; ?>
<header id="#top" class="amp-wp-header">
     
<!-- Header Site Title and Logo Start -->  
<?php amp_logo();   ?>
<!-- Header Site Title and Logo End -->  

<!-- Navigation Menu Icon Start -->  
  <div on='tap:sidebar.toggle' role="button" tabindex="0" class="nav_container">
      <a href="#" class="toggle-text">
          <span></span>
          <span></span>
          <span></span>
      </a>
  </div>
<!-- Navigation Menu Icon End -->  

</header>

<!-- Navigation Menu Output Start -->  
<amp-sidebar id='sidebar' layout="nodisplay" side="right">
    <div class="toggle-navigationv2">
      <div role="button" tabindex="0" on='tap:sidebar.close' class="close-nav">X</div>
      <?php if( has_nav_menu( 'amp-menu' ) ) { ?>
        <div class="navigation_heading">
            <?php echo esc_html( $redux_builder_amp['amp-translator-navigate-text'] ); ?>
        </div>
      <?php
      /*if ( class_exists( 'AMPforWP_Menu_Walker' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'amp-menu',
            'walker' => new AMPforWP_Menu_Walker()
        ) );
      } else {
        wp_nav_menu( array(
            'theme_location' => 'amp-menu'
        ) );
      }*/
      amp_menu();

      } ?>
    </div>
    <?php amp_search();?>
    <?php amp_social_icons(); ?> 
</amp-sidebar>
<!-- Navigation Menu Output End --> 
<?php  
//Example array
$social = array(
                'twitter' => 'https://www.twitter.com',
                'facebook' => 'https://www.facebook.com'
              );
amp_social_icons($social); ?> 
<div>
<?php do_action('ampforwp_design_1_after_header');