<?php amp_header_core() ?>
	<?php do_action('ampforwp_post_before_loop') ?>

    <?php amp_archive_title(); ?>
    <?php amp_loop_template(); ?>
    <?php amp_pagination(); ?>

	<?php do_action('ampforwp_post_after_loop') ?>

<?php amp_footer(); ?>