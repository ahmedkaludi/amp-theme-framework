<?php
if(!isset($loadComponent['AMP-search']) ) {
	return false;
}
//main output function
function ampforwp_framework_search_html_output($amp_lightbox=false){
	global $redux_builder_amp;
	echo ampforwp_framework_get_search_form();
	if($amp_lightbox){
		add_action('ampforwp_global_after_footer','ampforwp_framework_lightbox_html_output');
		echo ampforwp_framework_search_button_html_output();
	}

}
function ampforwp_framework_search_button_html_output(){
	global $redux_builder_amp;
	   return '<div class="searchmenu">
					<button on="tap:search-icon">
						<i class="icono-search"></i>
					</button>
			</div>';
}

function ampforwp_framework_add_lightbox_and_form_scripts( $data ) {
		if ( empty( $data['amp_component_scripts']['amp-lightbox'] ) ) {
			$data['amp_component_scripts']['amp-lightbox'] = 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js';
		}
		if ( empty( $data['amp_component_scripts']['amp-form'] ) ) {
			$data['amp_component_scripts']['amp-form'] = 'https://cdn.ampproject.org/v0/amp-form-0.1.js';
		}
	return $data;
}


function ampforwp_framework_lightbox_html_output() {
	 	?>
	 	<amp-lightbox id="search-icon" layout="nodisplay">
		    <?php do_action('ampforwp_search_form'); ?>
		    <button on="tap:search-icon.close" class="closebutton">X</button>
		    <i class="icono-cross"></i>
		</amp-lightbox>
	<?php
}

function ampforwp_framework_get_search_form() {
		global $redux_builder_amp;
		$action_url = '';
		$label = ampforwp_translation(isset($redux_builder_amp['ampforwp-search-label']) && $redux_builder_amp['ampforwp-search-label'], 'Type your search query and hit enter');
		$action_url = esc_url( get_bloginfo('url') );
		$action_url = preg_replace('#^http?:#', '', $action_url);
		$placeholder = ampforwp_translation($redux_builder_amp['ampforwp-search-placeholder'], 'Type Here' );
	  $form = '<form role="search" method="get" id="searchform" class="searchform" target="_top" action="' . $action_url  .'">
				<div>
					<label class="screen-reader-text" for="s">' . $label . '</label>
					<input type="text" placeholder="AMP" value="1" name="amp" class="hide" id="ampsomething" />
					<input type="text" placeholder="'.$placeholder.'" value="' . get_search_query() . '" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
				</div>
				</form>';
	    return $form;
		
}

if( !function_exists( 'is_search_enabled_in_ampforwp' ) ) {
	function is_search_enabled_in_ampforwp() {
		global $redux_builder_amp;
		if( ( $redux_builder_amp['amp-design-selector']==1 && $redux_builder_amp['amp-design-1-search-feature'] ) ||
	 			(	$redux_builder_amp['amp-design-selector']==2 && $redux_builder_amp['amp-design-2-search-feature'] ) ||
				(	$redux_builder_amp['amp-design-selector']==3 && $redux_builder_amp['amp-design-3-search-feature'] ) ) {
					return true;
				}
			return false;
	}
}


