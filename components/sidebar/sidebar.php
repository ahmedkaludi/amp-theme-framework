<?php
if(!function_exists('ampforwp_framework_get_sideabr')){
	function ampforwp_framework_get_sideabr($tag='start',$data=array(),$side="right"){
		switch(strtolower($tag)) {
			case 'start':
				echo sideber_begin($side,$data);
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
				echo 'tag not found';
				break;
		}
	}
}
function sidebar_close_button(){
	$id = 'sidebar';
	$class = 'close-nav';
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
	$class = 'nav_container';
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
function sideber_begin($side="right",$data){
	$attribute = '';
	if(count($data)>0){
		foreach ($data as $key => $value) {
			$attribute .= $key.' = "'.$value.'" ' ;
		}
	}else{
		$attribute = "id='sidebar' layout='nodisplay'";
	}
	return '<amp-sidebar '.$attribute.' side="'.$side.'">';
}

function sideber_end(){
	return '</amp-sidebar>';
}

function ampforwp_add_sidebar_scripts(){
	global $scriptComponent;
	if ( empty( $scriptComponent['amp-form'] ) ) {
			$scriptComponent['amp-form'] = 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js';
		}
}