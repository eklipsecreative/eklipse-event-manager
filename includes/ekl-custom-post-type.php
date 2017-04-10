<?php
//Create custom post type
add_action( 'init', 'ekl_create_post_type' );

//Registers the Product's post type
function ekl_create_post_type() {
    register_post_type( 'ekl_events',
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
        'public' => false,
        'show_ui' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-calendar-alt',
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'events' ),
        )
    );
}
?>