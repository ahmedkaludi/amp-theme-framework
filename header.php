<?php amp_header_core() ?>
 <header class="header container">
    <?php amp_logo(); ?>
    <?php amp_sidebar(['action'=>'open-button']); ?> 
    <?php amp_call_now(); ?>
    <?php amp_social([
        'twitter' => 'https://www.twitter.com/marqas36',
        'facebook' => 'https://www.facebook.com'
    ]);?>    
</header>


<?php amp_sidebar(['action'=>'start',
    'id'=>'sidebar',
    'layout'=>'nodisplay',
    'side'=>'right'
] ); ?>
<?php amp_sidebar(['action'=>'close-button']); ?>
<?php amp_menu(); ?>
<?php amp_search();?>
<?php amp_social(); ?> 
<?php amp_sidebar(['action'=>'end']); ?>

<div class="content-wrapper container">