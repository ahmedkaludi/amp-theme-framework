<?php
global $redux_builder_amp;
global $wp;
$post_id = $redux_builder_amp['amp-frontpage-select-option-pages'];
$template = new AMP_Post_Template( $post_id );?>
<?php amp_header_core() ?>
	
	<?php amp_title(); ?>
	<?php do_action('ampforwp_frontpage_above_loop',$template, $post_id) ?>

	<?php do_action('ampforwp_frontpage_below_loop') ?>
	
<?php amp_footer(); ?>