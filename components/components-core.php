<?php
$loadComponent = array();
$scriptComponent = array();
$supportComponent = array('AMP-search','AMP-menu','AMP-logo','AMP-social-icons','AMP-sidebar','AMP-featured-image','AMP-author-box');
//$removeScriptComponent = array('amp-carousel');
add_filter( 'amp_post_template_data', 'ampforwp_framework_add_and_form_scripts',20);
function ampforwp_framework_add_and_form_scripts($data) {
	global $scriptComponent, $loadComponent; //$removeScriptComponent;
	if(isset($loadComponent['AMP-search']) && $loadComponent['AMP-search']==true){
		ampforwp_add_scripts();
	}
	if(count($scriptComponent)>0){
		foreach ($scriptComponent as $key => $value) {
			if ( empty( $data['amp_component_scripts'][$key] ) ) {
				$data['amp_component_scripts'][$key] = $value;
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

//Component Loader
function add_amp_theme_support($componentName){
	global $loadComponent,$supportComponent;
	if($supportComponent){
		if(in_array($componentName, $supportComponent)){
			$loadComponent[$componentName] = true;
			loadComponents($componentName);
			return true;
		}
	}
	return false;
}
//Include the Component file
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
	}
}

// Logo Component Utilitis
function amp_logo(){
	global $loadComponent;
	if(isset($loadComponent['AMP-logo']) && $loadComponent['AMP-logo']==true){
		 ampforwp_framework_get_logo();
	}
}

//Menus
function amp_menu(){
		global $loadComponent;
		if(isset($loadComponent['AMP-menu']) && $loadComponent['AMP-menu']==true){
			amp_menu_html();
		}
	}

// Social Icons component
function amp_social_icons($social_icons=""){
	global $loadComponent;
	$amp_social_icons = array();
	//Supported social icons	 
	$amp_social_icons = array('twitter','facebook','pinterest','google-plus','linkedin','youtube','instagram','reddit','VKontakte','snapchat','tumblr');
	if(isset($loadComponent['AMP-social-icons']) && $loadComponent['AMP-social-icons']==true){
		if($social_icons!=null){
		 ampforwp_framework_get_social_icons($social_icons);
		}
		else 
		 ampforwp_framework_get_social_icons($amp_social_icons);
	}
}

//Sidebar
function amp_sidebar($tag='start',$data=array()){
	global $loadComponent;
	if(isset($loadComponent['AMP-sidebar']) && $loadComponent['AMP-sidebar']==true){
		ampforwp_framework_get_sideabr($tag,$data);
	}
}

//Featured Image
function amp_featured_image( ){
	global $loadComponent;
	if(isset($loadComponent['AMP-featured-image']) && $loadComponent['AMP-featured-image']==true){
		ampforwp_framework_get_featured_image( );
	}
}

// Author Box
function amp_author_box( $author_url="" ){
	global $loadComponent;
	if(isset($loadComponent['AMP-author-box']) && $loadComponent['AMP-author-box']==true){
		ampforwp_framework_get_author_box($author_url );
	}
}