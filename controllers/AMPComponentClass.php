<?php

Class AMPComponentClass{
	public function __construct(){
		
	}

	public function loadComponents($componentName){
		if(empty($componentName)) return '';
		$componentName = str_replace("AMP-", "", $componentName);
		$file = AMP_FRAMEWORK_COMOPNENT_DIR_PATH.'/'.$componentName.'/'.$componentName.".php";
		if(!file_exists($file)){
			return '';
		}
		include_once($file);
	}

}