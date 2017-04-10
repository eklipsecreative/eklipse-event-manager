<?php
// create custom plugin settings menu
add_action('admin_menu', 'ekl_event_plugin_create_menu');

function ekl_event_plugin_create_menu() {

	//create new sub-level menu
	add_submenu_page('edit.php?post_type=ekl_events', 'Event Manager Settings', 'Settings', 'edit_posts', basename(__FILE__), 'ekl_custom_post_type_settings_page');

	//call register settings function
	add_action( 'admin_init', 'ekl_register_plugin_settings' );
}


function ekl_register_plugin_settings() {
	//register our settings
	register_setting( 'ekl-plugin-settings-group', 'ekl_bg_color' );
    register_setting( 'ekl-plugin-settings-group', 'ekl_txt_color' );
}

function ekl_custom_post_type_settings_page() {
?>
<div class="wrap">
<h2>Event Manager Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'ekl-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ekl-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Event Background Color</th>
            <td><input class="jscolor" name="ekl_bg_color" value="<?php echo esc_attr( get_option('ekl_bg_color') ); ?>"></td>
        </tr>
        <tr valign="top">
            <th scope="row">Event Text Color</th>
            <td><input class="jscolor" name="ekl_txt_color" value="<?php echo esc_attr( get_option('ekl_txt_color') ); ?>"></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>