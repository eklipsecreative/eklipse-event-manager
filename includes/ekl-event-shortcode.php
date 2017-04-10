<?php
//Code to actually display content on event lister page

add_action('init','ekl_event_register_shortcodes');

function ekl_event_register_shortcodes() {
  add_shortcode( 'ekl-event', 'ekl_generate_event_list' );
}

function ekl_generate_event_list() {
	include_once( 'ekl-event-shortcode-content.php' );
}
?>