<?php global $redux_builder_amp; ?>
<header id="#top" class="amp-wp-header">
     
<!-- Header Site Title and Logo Start -->  
<?php amp_logo(); ?>
<!-- Header Site Title and Logo End -->  
<?php  amp_call_now(); ?>
<!-- Navigation Menu Icon Start --> 
  <?php amp_sidebar('button-open'); ?> 
  
<!-- Navigation Menu Icon End -->  

</header>

<!-- Navigation Menu Output Start -->  
<?php amp_sidebar('start',
                    array(
                        'id'=>'sidebar',
                        'layout'=>'nodisplay',
                        'side'=>'right'
                    ) 
                 ); 
?>
    <div class="toggle-navigationv2">
      <?php amp_sidebar('button-close'); ?> 
      <?php amp_menu(); ?>
    </div>
    <?php amp_search();?>
    <?php amp_social_icons(); ?> 
<?php amp_sidebar('end'); ?>

<?php  
//Example array
$social = array(
                'twitter' => 'https://www.twitter.com/marqas36',
                'facebook' => 'https://www.facebook.com '
              );
amp_social_icons(
  array(
                'twitter' => 'https://www.twitter.com/marqas36',
                'facebook' => 'https://www.facebook.com '
       )
  ); 
?> 
<div>
<?php do_action('ampforwp_design_1_after_header');