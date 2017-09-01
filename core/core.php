<?php
defined('ABSPATH') OR exit('No direct script access allowed Select respective path');
/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
	//Load MainClass
	require_once(AMP_FRAMEWORK_DIR_PATH.'controllers/AMPComponentClass.php');
	//require_once(AMP_FRAMEWORK_DIR_PATH.'core/utility_functions.php');
	require_once(AMP_FRAMEWORK_DIR_PATH.'core/AMP-functions.php');
	require_once(AMP_FRAMEWORK_DIR_PATH.'core/vendor/amp/amp.php');
    
	/*if ( ! function_exists('amp_load_classes') ) {
		function amp_load_classes() {
			require_once( AMP__DIR__ . '/includes/class-amp-post-template.php' ); // this loads everything else
		}
	}

	if ( ! function_exists('amp_add_post_template_actions') ) {
		function amp_add_post_template_actions() {
			require_once( AMP__DIR__ . '/includes/amp-post-template-actions.php' );
			require_once( AMP__DIR__ . '/includes/amp-post-template-functions.php' );
		}
	}

    //template Untilities
    function amp_template_head_section_data(){
    	amp_load_classes();

		$post_id = get_queried_object_id();
		do_action( 'pre_amp_render_post', $post_id );

		amp_add_post_template_actions();
		$template = new AMP_Post_Template( $post_id );
		$template->load();
		exit;
    }

	

	function get_amp_post_template_data(){
    	amp_template_head_section_data();
		echo $this->get( 'html_tag_attributes' );
    }
    get_amp_post_template_data();*/