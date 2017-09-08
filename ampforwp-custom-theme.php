<?php
/*
Plugin Name: AMP Theme Framework
Plugin URI: https://wordpress.org/plugins/accelerated-mobile-pages/
Description: This is a custom AMP theme built to show how easy it is to make custom AMP themes.
Version: 1.0
Author:  Mohammed Kaludi, Ahmed Kaludi
Author URI: http://ampforwp.com/themes
License: GPL2
AMP: AMP FRAMEWORK DEFAULT THEME 
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Define the Folder of the theme.
if(!defined('AMPFORWP_CUSTOM_THEME')){
	define('AMPFORWP_CUSTOM_THEME', plugin_dir_path( __FILE__ )); 
}
// Define the components folder
if(!defined('AMP_FRAMEWORK_COMOPNENT_DIR_PATH')){
	define('AMP_FRAMEWORK_COMOPNENT_DIR_PATH', plugin_dir_path( __FILE__ )."/components"); 
}

require_once( AMP_FRAMEWORK_COMOPNENT_DIR_PATH . '/components-core.php' );

//Check if this theme is selected in design manager
global $startCustomTemplateEngine; 
if($startCustomTemplateEngine){

	require_once( AMPFORWP_CUSTOM_THEME . '/AMP-functions.php' );

	// Filter the Template files to override the existing ones
	add_filter( 'amp_post_template_file', 'ampforwp_custom_header_file', 10, 2 );
	add_filter( 'amp_post_template_file', 'ampforwp_designing_custom_template', 10, 3 );
	add_filter( 'amp_post_template_file', 'ampforwp_custom_footer_file', 10, 2 );

	// Custom Header
	function ampforwp_custom_header_file( $file, $type ) {
		if ( 'header' === $type ) {
			$file = AMPFORWP_CUSTOM_THEME . '/header.php';
		}
		return $file;
	}
	// Custom Template Files
	function ampforwp_designing_custom_template( $file, $type, $post ) { 
	 global $redux_builder_amp;
		// Single file
	    if ( is_single() || is_page() ) {
			if('single' === $type && !('product' === $post->post_type )) {
				$file = AMPFORWP_CUSTOM_THEME . '/single.php';
		 	}
		}
	    // Loop Template
	    if ( 'loop' === $type ) {
			$file = AMPFORWP_CUSTOM_THEME . '/loop.php';
		}
	    // Archive
		if ( is_archive() ) {
	        if ( 'single' === $type ) {
	            $file = AMPFORWP_CUSTOM_THEME . '/archive.php';
	        }
	    }
	    $ampforwp_custom_post_page  =  ampforwp_custom_post_page();
	    // Homepage
		if ( is_home() ) {
			if ( 'single' === $type ) {
	        	$file = AMPFORWP_CUSTOM_THEME . '/index.php';
	        
		        if ($redux_builder_amp['amp-frontpage-select-option'] == 1) {
					$file = AMPFORWP_CUSTOM_THEME . '/page.php';
		        }
		        if ( $ampforwp_custom_post_page == "page" && ampforwp_name_blog_page() ) {
					$current_url = home_url( $GLOBALS['wp']->request );
					$current_url_in_pieces = explode( '/', $current_url );
				
					if( in_array( ampforwp_name_blog_page() , $current_url_in_pieces )  ) {
						 $file = AMPFORWP_CUSTOM_THEME . '/index.php';
					}  
				}
		    }
	    }
	    // is_search
		if ( is_search() ) {
	        if ( 'single' === $type ) {
	            $file = AMPFORWP_CUSTOM_THEME . '/search.php';
	        }
	    }
	    
	 	return $file;
	}

	// Custom Footer
	function ampforwp_custom_footer_file($file, $type ){
		if ( 'footer' === $type ) {
			$file = AMPFORWP_CUSTOM_THEME . '/footer.php';
		}
		return $file;
	}
	add_action( 'amp_post_template_head', 'amp_post_template_add_custom_google_font');

	// Loading Custom Google Fonts in the theme
	function amp_post_template_add_custom_google_font( $amp_template ) {
	    $font_urls = $amp_template->get( 'font_urls', array() );
		$font_urls['source_serif_pro'] = 'https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600|Source+Sans+Pro:400,700';  ?>
	<link rel="stylesheet" href="<?php echo esc_url( $font_urls['source_serif_pro'] ); ?>">
	<?php }

	// Loading Core Styles 
	require_once( AMPFORWP_CUSTOM_THEME . '/style.php' );
}