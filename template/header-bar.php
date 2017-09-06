<?php global $redux_builder_amp; ?>
<header id="#top" class="amp-header">
    
<?php amp_logo(); ?>
<?php amp_sidebar('button-open'); ?> 

</header>

<?php amp_sidebar('start',
                    array(
                        'id'=>'sidebar',
                        'layout'=>'nodisplay',
                        'side'=>'right'
                    ) 
                 ); 
?>
    <?php amp_sidebar('button-close'); ?> 
    <?php amp_menu(); ?>
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