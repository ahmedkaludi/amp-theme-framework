<?php 
function ampforwp_framework_get_the_title() { 
	global $redux_builder_amp, $post;
	$ID = '';
	if(is_home()){
		if ($redux_builder_amp['amp-frontpage-select-option'] == 1) {
			if( $redux_builder_amp['ampforwp-title-on-front-page'] ) {
				$ID = $redux_builder_amp['amp-frontpage-select-option-pages'];
			}
		}
	}
	else
		$ID = $post->ID;
	if( $ID!=null ){
		do_action('ampforwp_above_the_title',$this); ?>
		<header class="amp-wp-content amp-wp-article-header ampforwp-title">
			<h1 class="amp-wp-title"> <?php 
				$ampforwp_title = get_the_title($ID);
				$ampforwp_title =  apply_filters('ampforwp_filter_single_title', $ampforwp_title);
				echo wp_kses_data( $ampforwp_title ); ?>
			</h1>
			<?php do_action('ampforwp_below_the_title',$this); ?>
		</header> <?php 
	}
}	

 