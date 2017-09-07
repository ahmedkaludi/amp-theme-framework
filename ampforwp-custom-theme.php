<?php
/*
Plugin Name: AMP Theme Framework
Plugin URI: https://wordpress.org/plugins/accelerated-mobile-pages/
Description: This is a custom AMP theme built to show how easy it is to make custom AMP themes.
Version: 1.0
Author:  Mohammed Kaludi, Ahmed Kaludi
Author URI: http://ampforwp.com/themes
License: GPL2
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Define the Folder of the theme.
define('AMPFORWP_CUSTOM_THEME', plugin_dir_path( __FILE__ )); 
define('AMP_FRAMEWORK_COMOPNENT_DIR_PATH', plugin_dir_path( __FILE__ )."/components"); 

require_once( AMP_FRAMEWORK_COMOPNENT_DIR_PATH . '/components-core.php' );
require_once( AMPFORWP_CUSTOM_THEME . '/AMP-functions.php' );

// Remove old files
add_action('init','ampforwp_custom_theme_remove_old_files',11);
function ampforwp_custom_theme_remove_old_files(){
    remove_action('pre_amp_render_post','ampforwp_stylesheet_file_insertion', 12 );
	remove_filter( 'amp_post_template_file', 'ampforwp_custom_header', 10, 3 );
	if ( is_single() ) {
		remove_filter( 'amp_post_template_file', 'ampforwp_custom_template', 10, 3 );
	}
	add_action('amp_post_template_head', function() {
		remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts');
	}, 9);
}


// Register New Files
add_action('init','ampforwp_custom_theme_files_register', 10);
function ampforwp_custom_theme_files_register(){
	add_filter( 'amp_post_template_file', 'ampforwp_custom_header_file', 10, 2 );
	add_filter( 'amp_post_template_file', 'ampforwp_designing_custom_template', 10, 3 );
	add_filter( 'amp_post_template_file', 'ampforwp_custom_footer_file', 10, 2 );
}


// Custom Header
function ampforwp_custom_header_file( $file, $type ) { 
	if ( 'header' === $type ) {
		$file = AMPFORWP_CUSTOM_THEME . '/template/header.php';
	}
	return $file;
}


// Custom Template Files
function ampforwp_designing_custom_template( $file, $type, $post ) { 
 global $redux_builder_amp;
	// Single file
    if ( is_single() || is_page() ) {
		if('single' === $type && !('product' === $post->post_type )) {
			$file = AMPFORWP_CUSTOM_THEME . '/template/single.php';
	 	}
	}
    // Archive
	if ( is_archive() ) {
        if ( 'single' === $type ) {
            $file = AMPFORWP_CUSTOM_THEME . '/template/archive.php';
        }
    }
    $ampforwp_custom_post_page  =  ampforwp_custom_post_page();
    // Homepage
	if ( is_home() ) {
		if ( 'single' === $type ) {
        	$file = AMPFORWP_CUSTOM_THEME . '/template/index.php';
        
	        if ($redux_builder_amp['amp-frontpage-select-option'] == 1) {
				$file = AMPFORWP_CUSTOM_THEME . '/template/page.php';
	        }
	        if ( $ampforwp_custom_post_page == "page" && ampforwp_name_blog_page() ) {
				$current_url = home_url( $GLOBALS['wp']->request );
				$current_url_in_pieces = explode( '/', $current_url );
			
				if( in_array( ampforwp_name_blog_page() , $current_url_in_pieces )  ) {
					 $file = AMPFORWP_CUSTOM_THEME . '/template/index.php';
				}  
			}
	    }
    }
    // is_search
	if ( is_search() ) {
        if ( 'single' === $type ) {
            $file = AMPFORWP_CUSTOM_THEME . '/template/search.php';
        }
    }
    
 	return $file;
}

// Custom Footer
function ampforwp_custom_footer_file($file, $type ){
	if ( 'footer' === $type ) {
		$file = AMPFORWP_CUSTOM_THEME . '/template/footer.php';
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
require_once( AMPFORWP_CUSTOM_THEME . '/template/style.php' );


// Add Scripts only when AMP Menu is Enabled
/*if( has_nav_menu( 'amp-menu' ) ) {
    if ( empty( $data['amp_component_scripts']['amp-accordion'] ) ) {
        $data['amp_component_scripts']['amp-accordion'] = 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js';
    }
}*/

// Supported Components

