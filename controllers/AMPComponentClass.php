<?php

Class AMPComponentClass extends AMPLoadClass{
	public function __construct(){
		
	}

	public function loadComponents($componentName){
		if(empty($componentName)) return '';
		$file = AMP_FRAMEWORK_COMOPNENT_DIR_PATH.'/'.$componentName.'/'.$componentName.".php";
		if(!file_exists($file)){
			return '';
		}
		include($file);
		
		$buffer = ob_get_contents();
		@ob_end_clean();
		return $buffer;
	}

}