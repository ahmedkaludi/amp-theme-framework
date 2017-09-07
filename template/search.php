<?php global $redux_builder_amp;  ?>
<?php amp_header() ?>
<?php do_action('ampforwp_body_beginning', $this); ?>
<?php $this->load_parts( array( 'header-bar' ) ); ?>

<?php do_action( 'ampforwp_after_header', $this ); ?>


<main>
	<?php do_action('ampforwp_post_before_loop') ?>
	<?php amp_page_title(); ?>
	<?php 
	 while(amp_loop('start')): ?>
			<?php amp_loop_image(); ?>
			<?php amp_loop_title(); ?>
			<?php amp_loop_excerpt(); ?>
			<?php amp_loop_category(); ?>
			<?php amp_loop_date(); ?>
		<?php amp_loop('end'); ?> 
	<?php endwhile;  ?>
	<?php amp_pagination(); ?>

	<?php do_action('ampforwp_post_after_loop') ?>
</main>
<?php amp_footer(); ?>
