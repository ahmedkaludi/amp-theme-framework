<?php
$loadComponent = array();
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

	//Search Component Utilities
	function amp_search(){
		global $loadComponent;
		if(isset($loadComponent['AMP-search']) && $loadComponent['AMP-search']==true){
			ampforwp_framework_search_html_output();
		}
	}

	function amp_search_result(){

	}