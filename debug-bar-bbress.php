<?php
/*
Plugin Name: Debug Bar bbPress
Plugin URI:
Description: Helps debug bbPress using the Debug Bar
Author: Daniel Dvorkin
Version: 0.2
Author URI: http://danieldvork.in
*/


add_filter( 'debug_bar_panels', 'bbp_add_to_debug_bar' );
function bbp_add_to_debug_bar( $panels ) {
	if ( ! function_exists( 'bbpress' ) )
		return $panels;

	include_once ( 'class-debug-bar-bbpress.php' );
	$panels[] = new bbpPress_Debug_Bar();
	return $panels;
}

