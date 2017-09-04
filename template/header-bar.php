<?php global $redux_builder_amp; ?>
<header id="#top" class="amp-wp-header">
     
<!-- Header Site Title and Logo Start -->  
<?php amp_logo();   ?>
<!-- Header Site Title and Logo End -->  

<!-- Navigation Menu Icon Start --> 
  <?php amp_sidebar('button-open'); ?> 
  
<!-- Navigation Menu Icon End -->  

</header>

<!-- Navigation Menu Output Start -->  
<?php amp_sidebar('start', array(
'id'=>'sidebar',
'layout'=>'nodisplay',
'side'=>'right')); ?>
    <div class="toggle-navigationv2">
      <?php amp_sidebar('button-close'); ?> 
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
<?php amp_sidebar('end'); ?>
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