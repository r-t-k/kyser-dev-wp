<?php
/*
Plugin Name: Super Advanced Custom Fields
Plugin URI: https://kyser.io/SACF
Description: ACF Pro Supercharged
Version: 0.0.0.5
Author: Tommy Kyser
Author URI: https://kyser.io
Text Domain: SACF
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
ini_set( 'xdebug.var_display_max_data', '-1' );*/

/* ================================================================================================ */
/*                                  WP Plugin Update Server                                         */
/* ================================================================================================ */

require_once plugin_dir_path( __FILE__ ) . 'lib/wp-package-updater/class-wp-package-updater.php';

$prefix_updater = new WP_Package_Updater(
	'https://wp.kyser.dev',
	wp_normalize_path( __FILE__ ),
	wp_normalize_path( plugin_dir_path( __FILE__ ) )
);
/* ================================================================================================ */

function run() {
	require_once plugin_dir_path( __FILE__ ) . 'plugin-loader.php';
}

add_action( 'plugins_loaded', 'run', 10, 0 );
function load_SACF_init() // Classes :: Hook = init
{
	require __DIR__ . '/loader.php';
}

add_action( 'acf/init', 'load_SACF_init', 10 );
