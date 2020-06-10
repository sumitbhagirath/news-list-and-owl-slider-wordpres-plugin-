<?php
/*
Plugin Name: Simple News List and Slider
Plugin URL: 
Text Domain: nwowls-news
Description: A simple News list and OWL Slider plugin. Also work with Gutenberg shortcode block.
Version: 1.1.0
Author: Sumit Bhagirath
Contributors: Sumit Bhagirath
*/

if( !defined( 'NWOWLS_VERSION' ) ) {
	define( 'NWOWLS_VERSION', '1.1.0' ); // Version of plugin
}
if( !defined( 'NWOWLS_DIR' ) ) {
	define( 'NWOWLS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'NWOWLS_POST_TYPE' ) ) {
	define( 'NWOWLS_POST_TYPE', 'news' ); // Plugin post type
}
if( !defined( 'NWOWLS_CAT' ) ) {
	define( 'NWOWLS_CAT', 'news-category' ); // Plugin Category
}

// register post type
require_once( NWOWLS_DIR . '/includes/post-type.php' );

//Common Function
require_once( NWOWLS_DIR . '/includes/common.php' );

//Slider Settings
require_once( NWOWLS_DIR . '/includes/settings.php' );

//Shortcode
require_once( NWOWLS_DIR . '/includes/shortcode.php' );

//Shortcode
require_once( NWOWLS_DIR . '/includes/admin.php' );

if (!function_exists('NWOWLS_styles_script')) {
	function NWOWLS_styles_script() {
		// css for owl slider
		wp_enqueue_style( 'nwslcss-defualt',  plugin_dir_url( __FILE__ ). 'assets/css/nwowls.css', array(), NWOWLS_VERSION );
		wp_enqueue_style( 'nwslowlcss-carousel',  plugin_dir_url( __FILE__ ). 'assets/owlcarousel/assets/owl.carousel.css', array(), NWOWLS_VERSION );
		wp_enqueue_style( 'nwslowlcss-default',  plugin_dir_url( __FILE__ ). 'assets/owlcarousel/assets/owl.theme.default.css', array(), NWOWLS_VERSION );

		// js for owl slider
		wp_enqueue_script( 'nwslowl-jquery', plugin_dir_url( __FILE__ ) . 'assets/vendors/jquery.min.js', array( 'jquery' ), NWOWLS_VERSION);
		wp_enqueue_script( 'nwslowl-library', plugin_dir_url( __FILE__ ) . 'assets/owlcarousel/owl.carousel.js', array( 'jquery' ), NWOWLS_VERSION);
	}
	add_action( 'wp_enqueue_scripts', 'NWOWLS_styles_script' );
}