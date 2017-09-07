<?php global $redux_builder_amp;  ?>
<?php amp_header() ?>
<?php $this->load_parts( array( 'header-bar' ) ); ?>

<div class="amp-wp-article ampforwp-custom-index amp-wp-home">

<?php do_action('ampforwp_post_before_design_elements') ?>

    
  <?php amp_page_title(); ?>

    <?php while(amp_loop('start')): ?>
			<?php amp_loop_image(); ?>
			<?php amp_loop_title(); ?>
			<?php amp_loop_excerpt(); ?>
			<?php amp_loop_category(); ?>
			<?php amp_loop_date(); ?>
		<?php amp_loop('end'); endwhile;  ?>
	<?php amp_pagination(); ?>








</div>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>
