<?php
/*
Plugin Name: AMP Theme Framework
Plugin URI: https://wordpress.org/plugins/accelerated-mobile-pages/
Description: AMP for WP - AMP Theme Framework for WordPress
Version: 0.0.1
Author: Ahmed Kaludi, Mohammed Kaludi
Author URI: https://ampforwp.com/
Donate link: https://www.paypal.me/Kaludi/25
License: GPL1
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

define('AMP_FRAMEWORK_DIR_PATH', plugin_dir_path( __FILE__ ));
define('AMP_FRAMEWORK_COMOPNENT_DIR_PATH', plugin_dir_path( __FILE__ )."/components");


require_once AMP_FRAMEWORK_DIR_PATH."/core/core.php";
amp_search();