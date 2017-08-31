<?php
Class AMPLoadClass{
	private function view($templateName,$data){
		$this->_object_to_array($data);
		// Set the default data variables
		foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val)
		{
			$$_ci_val = isset($_ci_data[$_ci_val]) ? $_ci_data[$_ci_val] : FALSE;
		}
		return  $this->load(AMP_FRAMEWORK_DIR_PATH."/template".$templateName, $$_ci_val);
	}
	protected function _object_to_array($object)
	{
		return is_object($object) ? get_object_vars($object) : $object;
	}

	protected function load($filePath, $data){
		if(file_exists($filePath)){
			
		}
	}
}