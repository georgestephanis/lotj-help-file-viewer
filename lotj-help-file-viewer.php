<?php

/*
 * Plugin Name: LotJ Help File Viewer
 * Author: George Stephanis
 * Author URI: http://stephanis.info
 * Description: Displays helpfiles.
 * Version: 1.0
 * License: GPLv2+
 */

/**
 * To use, just add `[lotj_help]` in a post.
 */
function shortcode_lotj_help_file_viewer() {
	global $wpdb_log;
	$help_search = $_GET['help'];
	
	$results = $wpdb_log->get_results( $wpdb_log->prepare( "SELECT * FROM `help` WHERE `name` LIKE '%%%s%%' ORDER BY `name` ASC" ), $help_search );

	ob_start();
	?>
	
	<h1>Results:</h1>
	<pre><?php print_r( $results ); ?></pre>
	
	<?php
	return ob_get_clean();
}
add_shortcode( 'lotj_help', 'shortcode_lotj_help_file_viewer' );
