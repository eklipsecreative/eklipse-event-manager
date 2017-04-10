<?php
/*
Plugin Name: Eklipse Event Manager
Plugin URI: http://eklipsecreative.com
Description: Simple event manager.
Version: 1.21
Author: Chris McCulley
Author URI: http://eklipsecreative.com
License: GPL
*/

if ( ! defined( 'ABSPATH' ) ) exit;

//Load Plugin Libraries
require_once( 'includes/ekl-custom-post-type.php' );
require_once( 'includes/ekl-event-settings-page.php' );
require_once( 'includes/ekl-add-meta-boxes.php' );
require_once( 'includes/ekl-event-shortcode.php' );

//Register Scripts
require_once( 'includes/ekl-register-scripts.php' );

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'ekl_flush_rewrite' );
function ekl_flush_rewrite() {
	flush_rewrite_rules();
}

?>