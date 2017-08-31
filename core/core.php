<?php
defined('ABSPATH') OR exit('No direct script access allowed Select respective path');
/**
 * Framework Version
 *
 * @var	string
 *
 */
define('CI_VERSION', '3.1.0');
/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
	require_once(AMP_FRAMEWORK_DIR_PATH.'core/Common.php');


	require_once AMP_FRAMEWORK_DIR_PATH.'core/Controller.php';
	/**
	 * Reference to the AMP_Controller method.
	 *
	 * Returns current AMP instance object
	 *
	 * @return AMP_Controller
	 */
	function &get_instance()
	{
		return AMP_Controller::get_instance();
	}
	//Load MainClass
	require_once(AMP_FRAMEWORK_DIR_PATH.'controllers/AMPLoadClass.php');
	require_once(AMP_FRAMEWORK_DIR_PATH.'controllers/AMPComponentClass.php');
	$e404 = FALSE;
	//load default class
	$class = 'AMPClass';
	$method = 'index';
	if (empty($class) OR ! file_exists(AMP_FRAMEWORK_DIR_PATH.'\/controllers/'.$class.'.php'))
	{
		$e404 = TRUE;
	}else{
		require_once(AMP_FRAMEWORK_DIR_PATH.'controllers/'.$class.'.php');
		if ( ! class_exists($class, FALSE) OR $method[0] === '_' OR method_exists('CI_Controller', $method))
		{
			$e404 = TRUE;
		}
	}
	function rr_404_my_event() {
	  global $post;
	  if ( is_singular( 'event' ) && !rr_event_should_be_available( $post->ID ) ) {
	    global $wp_query;
	    $wp_query->set_404();
	    status_header(404);
	  }
	}
	if($e404){
		add_action( 'wp', 'rr_404_my_event' );
	}

	//$AMPobj = new $class();

	// Single file
    if ( is_single() || is_page() ) {
		if('single' === $type && !('product' === $post->post_type )) {
			//$file = AMPFORWP_CUSTOM_THEME . '/template/single.php';
			$method = 'sigle';
	 	}
	}
    // Archive
	if ( is_archive() ) {
        if ( 'single' === $type ) {
            //$file = AMPFORWP_CUSTOM_THEME . '/template/archive.php';
            $method = 'archive';
        }
    }
    // Homepage
	if ( is_home() ) {
        if ( 'single' === $type ) {
           // $file = AMPFORWP_CUSTOM_THEME . '/template/index.php';
        	$method = 'index';
        }
    }
	//$AMPobj->$method();


    $AMPComponentObj = new AMPComponentClass();
	if(!function_exists('getComponent')){
		function getComponent($componentName){
			global $AMPComponentObj;
			return $AMPComponentObj->loadComponents($componentName);
		}
	}