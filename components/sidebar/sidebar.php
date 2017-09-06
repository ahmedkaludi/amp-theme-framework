<?php
if(!function_exists('ampforwp_framework_get_sideabr')){
	function ampforwp_framework_get_sideabr($data=array()){
		if(!isset($data['action'])){
			echo 'action not found';
		}
		switch(strtolower($data['action'])) {
			case 'start':
				echo sideber_begin($data);
				break;
			case 'end':
				echo sideber_end();
				break;
			case 'button-open':
				echo sidebar_opening_button($data);
				break;
			case 'button-close':
				echo sidebar_close_button($data);
				break;
			default:
				echo 'action not found';
				break;
		}
	}
}
function sidebar_close_button(){
	$id = 'sidebar';
	$class = 'amp-sidebar-close';
	if(isset($data['id'])){
		$id = $data['id'];
	}
	if(isset($data['class'])){
		$class .= $data['class'];
	}
	return '<div role="button" tabindex="0" on="tap:'.$id.'.close" class="'.$class.'">X</div>';
}
function sidebar_opening_button(){
	$id = 'sidebar';
	$class = 'amp-sidebar-button';
	if(isset($data['id'])){
		$id = $data['id'];
	}
	if(isset($data['class'])){
		$class = $data['class'];
	}
	return '<div on="tap:'.$id.'.toggle" role="button" tabindex="0" class="'.$class.'">
						<a href="#" class="toggle-text">
							<span></span>
							<span></span>
							<span></span>
						</a>
				</div>';
}
function sideber_begin($data){
	$attribute = '';
	if(count($data)>0){
		foreach ($data as $key => $value) {
			$attribute .= $key.'="'.$value.'" ' ;
		}
	}else{
		$attribute = "id='sidebar' layout='nodisplay' side='right'";
	}
	return '<amp-sidebar '.$attribute.'>';
}

function sideber_end(){
	return '</amp-sidebar>';
}
ampforwp_add_sidebar_scripts();
function ampforwp_add_sidebar_scripts(){
	global $scriptComponent;
	if ( empty( $scriptComponent['amp-sidebar'] ) ) {
			$scriptComponent['amp-sidebar'] = 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js';
		}
}