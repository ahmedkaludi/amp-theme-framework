<?php

Class AMPClass extends AMPLoadClass{
	public function __construct(){
		//Replace Wordpress 
		$this->add_hooks('wp_head', 'AMPHeader');
		add_filter( 'Defaultheader',    'AMPTOPHeader_before' );
	}


	public function add_hooks($hook, $function){
		add_action($hook, array($this,$function));
	}

	public function AMPHead(){
		wp_register_script( 'AMP-script', 'https://cdn.ampproject.org/v0.js' );
	}

	public function sigle(){
		
	}

	public function archive(){

	}

	public function index(){
		$this->AMPHead();
		
		echo $this->headerData();
	}

	public function headerData(){
		$Defaultheader ='';
		//$Defaultheader  = apply_filter('AMPTOPHeader_before',$Defaultheader);
		$Defaultheader .= get_header();
		//$Defaultheader  = apply_filter('AMPTOPHeader_after',$Defaultheader);
	//	echo $Defaultheader;
	}












}