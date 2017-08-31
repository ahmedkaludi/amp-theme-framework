<?php global $redux_builder_amp; ?>
<header id="#top" class="amp-wp-header">
<div class="ampforwp-logo-area" >
      
<!-- Header Site Title and Logo Start -->  
    <?php if($redux_builder_amp['amp-on-off-support-for-non-amp-home-page']){ ?>
         <a href="<?php echo esc_url( untrailingslashit( $this->get( 'home_url' ) ).'?nonamp=1'); ?>">
    <?php } else { ?>
        <?php if($redux_builder_amp['ampforwp-homepage-on-off-support']) { ?>
         <a href="<?php echo esc_url( trailingslashit( $this->get( 'home_url' ) ) )  . AMP_QUERY_VAR; ?>">
        <?php } else { ?>
         <a href="<?php echo esc_url( trailingslashit( $this->get( 'home_url' ) ).'?nonamp=1'); ?>">
        <?php }
     } ?>

        <?php if (true == ($redux_builder_amp['opt-media']['url'])) {  ?>
        <?php if($redux_builder_amp['ampforwp-custom-logo-dimensions'] == true)  { ?>
             
            <amp-img src="<?php echo $redux_builder_amp['opt-media']['url']; ?>" width="<?php echo $redux_builder_amp['opt-media-width']; ?>" height="<?php echo $redux_builder_amp['opt-media-height']; ?>" alt="logo" class="amp-logo"></amp-img>
             
        <?php } else { ?>

            <amp-img src="<?php echo $redux_builder_amp['opt-media']['url']; ?>" width="190" height="36" alt="logo" class="amp-logo"></amp-img>
             
         <?php } } else { echo esc_html( $this->get( 'blog_name' ) ); } ?>
    </a>
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

</div>

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
      if ( class_exists( 'AMPforWP_Menu_Walker' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'amp-menu',
            'walker' => new AMPforWP_Menu_Walker()
        ) );
      } else {
        wp_nav_menu( array(
            'theme_location' => 'amp-menu'
        ) );
      }

      } ?>
    </div>
</amp-sidebar>
<!-- Navigation Menu Output End -->  

<?php do_action('ampforwp_design_1_after_header');