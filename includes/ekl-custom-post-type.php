<?php
//Create custom post type
add_action( 'init', 'ekl_create_post_type' );

//Registers the Product's post type
function ekl_create_post_type() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
                'add_new' => __( 'Add New Event' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'Add New Event' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Event' ),
				'not_found' => __( 'No events found' ),
				'not_found_in_trash' => __( 'No events found in trash' )				
            ),
        'public' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-calendar-alt',
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'events' ),
        )
    );
}

/* add_action('admin_menu' , 'ekl_add_custom_post_type_settings_page'); 
 
function ekl_add_custom_post_type_settings_page() {
    add_submenu_page('edit.php?post_type=events', 'Simple Events Lister Settings', 'Settings', 'edit_posts', basename(__FILE__), 'ekl_custom_post_type_settings_page');
}

function ekl_custom_post_type_settings_page() {
	require_once( 'ekl-plugin-settings.php' );
} */
?>