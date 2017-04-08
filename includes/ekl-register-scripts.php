<?php

// Hook to add register forward facing scripts with Wordpress
add_action( 'wp_enqueue_scripts', 'ekl_load_scripts' );
// Add admin scripts
add_action( 'admin_enqueue_scripts', 'ekl_load_admin_scripts' );


function ekl_load_scripts()
{
	//JQuery
	wp_register_script( 'ekl-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	wp_enqueue_script( 'ekl-jquery' );
	
	//Events Plugin Files
	wp_register_style( 'ekl-event-css', plugins_url( '/css/ekl-event-stylesheet.css', dirname(__FILE__) ), array(), '20160307', 'all' );
	wp_enqueue_style( 'ekl-event-css' );
	
	//SlabText Files
	wp_register_style( 'ekl-slabtext-css', plugins_url( '/css/slabtext.css', dirname(__FILE__) ));
	wp_enqueue_style( 'ekl-slabtext-css' );
	wp_register_script( 'ekl-slabtext', plugins_url( '/js/jquery.slabtext.min.js', dirname(__FILE__) ));
	wp_enqueue_script( 'ekl-slabtext' );
	wp_register_script( 'ekl-bigtext', plugins_url( '/js/bigtext.js', dirname(__FILE__) ));
	wp_enqueue_script( 'ekl-bigtext' );
	
	//EightyShades Icon Files
	wp_register_style( 'ekl-eightyshades-font-css', plugins_url( '/css/ekl-eightyshades-font-style.css', dirname(__FILE__) ));
	wp_enqueue_style( 'ekl-eightyshades-font-css' );
}

function ekl_load_admin_scripts()
{
	//JSColor Script
	wp_register_script( 'ekl-jscolor', plugins_url( '/js/jscolor.min.js', dirname(__FILE__) ));
	wp_enqueue_script( 'ekl-jscolor' );
}


?>