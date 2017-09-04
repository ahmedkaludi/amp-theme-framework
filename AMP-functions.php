<?php
$loadComponent = array();
$scriptComponent = array();
//$removeScriptComponent = array('amp-carousel');
add_filter( 'amp_post_template_data', 'ampforwp_framework_add_and_form_scripts',20);
function ampforwp_framework_add_and_form_scripts($data) {
	global $scriptComponent; //$removeScriptComponent;
	if(count($scriptComponent)>0){
		foreach ($scriptComponent as $key => $value) {
			if ( empty( $data['amp_component_scripts'][$key] ) ) {
				$data['amp_component_scripts']['$key'] = $value;
			}
		}
	}
	/*if(count($removeScriptComponent)>0){
		foreach ($removeScriptComponent as $key => $value) {
			if ( empty( $data['amp_component_scripts'][$key] ) ) {
				unset($data['amp_component_scripts']['$key']);
			}
		}	
	}*/
	return $data;
}

   
   $supportComponent = array('AMP-search');
	function add_amp_theme_support($componentName){
		global $loadComponent,$supportComponent;
		if(in_array($componentName, $supportComponent)){
			$loadComponent[$componentName] = true;
			loadComponents($componentName);
			return true;
		}
		return false;
	}

 	function loadComponents($componentName){
		if(empty($componentName)) return '';
		$componentName = str_replace("AMP-", "", $componentName);

		$file = AMP_FRAMEWORK_COMOPNENT_DIR_PATH.'/'.$componentName.'/'.$componentName.".php";
		if(!file_exists($file)){
			return '';
		}
		include_once($file);
	}
	
/**
 * Component Functions
 **/


	//Search Component Utilities
	function amp_search(){
		global $loadComponent;
		if(isset($loadComponent['AMP-search']) && $loadComponent['AMP-search']==true){
			 ampforwp_framework_get_search_form();
			 echo "sdcsd";
		}
	}
