<?php amp_header(); ?>

    <?php do_action('ampforwp_post_before_design_elements') ?>
    
    <?php while(amp_loop('start')): ?>
                <?php amp_loop_image(); ?>
                <?php amp_loop_title(); ?>
                <?php amp_loop_excerpt(); ?>
                <?php amp_loop_category(); ?>
                <?php amp_loop_date(); ?>
    <?php amp_loop('end'); endwhile;  ?>
    <?php amp_pagination(); ?>

<?php amp_footer(); ?>