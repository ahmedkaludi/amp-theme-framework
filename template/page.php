<?php global $redux_builder_amp;
 global $wp;
$post_id = $redux_builder_amp['amp-frontpage-select-option-pages'];
$template = new AMP_Post_Template( $post_id );?>
<?php amp_header() ?>
	<?php do_action('ampforwp_body_beginning', $this); ?>
	<?php $this->load_parts( array( 'header-bar' ) ); ?>
	
	<?php do_action( 'ampforwp_after_header', $template ); ?>
	<?php amp_title(); ?>
	<?php do_action('ampforwp_frontpage_above_loop',$template, $post_id) ?>

	<?php do_action('ampforwp_frontpage_below_loop') ?>
    <?php do_action( 'amp_post_template_above_footer', $this ); ?>
	<?php $this->load_parts( array( 'footer' ) ); ?>
	<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>