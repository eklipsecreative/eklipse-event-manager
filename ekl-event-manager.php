<?php
/*
Plugin Name: Eklipse Event Manager
Plugin URI: http://eklipsecreative.com
Description: Simple event manager.
Version: 1.32
Author: Chris McCulley
Author URI: http://eklipsecreative.com
License: GPL
*/

if ( ! defined( 'ABSPATH' ) ) exit;

//Load Plugin Libraries
require_once( 'includes/ekl-custom-post-type.php' );
require_once( 'includes/ekl-add-meta-boxes.php' );
require_once( 'includes/ekl-event-shortcode.php' );
require_once( 'includes/ekl-event-settings-page.php' );

//Register Scripts
require_once( 'includes/ekl-register-scripts.php' );

// Runs on activation //
register_activation_hook( __FILE__, 'ekl_event_set_up_options' );
add_action('admin_init', 'ekl_event_settings_redirect');

function ekl_event_set_up_options(){
  //Add default color options for the event plugin
  add_option('ekl_bg_color', '#ccc');
  add_option('ekl_txt_color', '#000');
  add_option('ekl_events_do_activation_redirect', true);
}

function ekl_event_settings_redirect() {
    if (get_option('ekl_events_do_activation_redirect', false)) {
        delete_option('ekl_events_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect(admin_url('edit.php?post_type=ekl_events&page=ekl-event-settings-page.php'));
        }
    }
}

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'ekl_flush_rewrite' );
function ekl_flush_rewrite() {
	flush_rewrite_rules();
}

?>