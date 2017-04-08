<?php
// Hook to add meta boxes to the New Event page
add_action( 'add_meta_boxes', 'ekl_add_events_metaboxes' );
// Hook to save meta box data
add_action( 'save_post', 'ekl_save_metaboxes' );



// Add the Events Meta Boxes
function ekl_add_events_metaboxes() {
	add_meta_box('ekl-events-metabox', 'Event Details', 'ekl_events_metabox_function', 'events', 'normal', 'low');
}

// The Event Details Metabox

function ekl_events_metabox_function( $post ) {

	$ekl_meta_start_date = get_post_meta( $post->ID, '_ekl_meta_start_date', true );
	$ekl_meta_end_date = get_post_meta( $post->ID, '_ekl_meta_end_date', true );
	$ekl_meta_start_time = get_post_meta( $post->ID, '_ekl_meta_start_time', true );
	$ekl_meta_end_time = get_post_meta( $post->ID, '_ekl_meta_end_time', true );
	$ekl_meta_location = get_post_meta( $post->ID, '_ekl_meta_location', true );
	$ekl_meta_url = get_post_meta( $post->ID, '_ekl_meta_url', true );
	$ekl_meta_form_url = get_post_meta( $post->ID, '_ekl_meta_form_url', true );
	
?>
<div>
	<table>
		<tr>
			<td>Start Date:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="date" name="ekl_meta_start_date" value="<?php echo esc_attr( $ekl_meta_start_date ); ?>" /></td>
		</tr>
		<tr>
			<td>End Date:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="date" name="ekl_meta_end_date" value="<?php echo esc_attr( $ekl_meta_end_date ); ?>" /></td>
		</tr>
		<tr>
			<td>Start Time:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="time" name="ekl_meta_start_time" value="<?php echo esc_attr( $ekl_meta_start_time ); ?>" /></td>
		</tr>
		<tr>
			<td>End Time:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="time" name="ekl_meta_end_time" value="<?php echo esc_attr( $ekl_meta_end_time ); ?>" /></td>
		</tr>
		<tr>
			<td>Location:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="text" name="ekl_meta_location" value="<?php echo $ekl_meta_location ; ?>" /></td>
		</tr>
		<tr>
			<td>Event URL:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="text" name="ekl_meta_url" value="<?php echo esc_attr( $ekl_meta_url ); ?>" /></td>
		</tr>
		<tr>
			<td>Signup Form URL:</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="text" name="ekl_meta_form_url" value="<?php echo esc_attr( $ekl_meta_form_url ); ?>" /></td>
		</tr>
	</table>
	
</div>
<?php
}

function ekl_save_metaboxes( $post_id ) {

	update_post_meta( $post_id, '_ekl_meta_start_date', strip_tags( $_POST['ekl_meta_start_date'] ) );
	update_post_meta( $post_id, '_ekl_meta_end_date', strip_tags( $_POST['ekl_meta_end_date'] ) );
	update_post_meta( $post_id, '_ekl_meta_start_time', strip_tags( $_POST['ekl_meta_start_time'] ) );
	update_post_meta( $post_id, '_ekl_meta_end_time', strip_tags( $_POST['ekl_meta_end_time'] ) );
	update_post_meta( $post_id, '_ekl_meta_location', strip_tags( $_POST['ekl_meta_location'] ) );
	update_post_meta( $post_id, '_ekl_meta_url', strip_tags( $_POST['ekl_meta_url'] ) );
	update_post_meta( $post_id, '_ekl_meta_form_url', strip_tags( $_POST['ekl_meta_form_url'] ) );

}

?>