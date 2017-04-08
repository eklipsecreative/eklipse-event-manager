<?php
// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

	//create new sub-level menu
	add_submenu_page('edit.php?post_type=events', 'Simple Events Lister Settings', 'Settings', 'edit_posts', basename(__FILE__), 'ekl_custom_post_type_settings_page');

	//call register settings function
	add_action( 'admin_init', 'ekl_register_plugin_settings' );
}


function ekl_register_plugin_settings() {
	//register our settings
	register_setting( 'ekl-plugin-settings-group', 'ekl_color_1' );
	register_setting( 'ekl-plugin-settings-group', 'ekl_color_2' );
	register_setting( 'ekl-plugin-settings-group', 'ekl_color_3' );
}

function ekl_custom_post_type_settings_page() {
?>
<div class="wrap">
<h2>Simple Event Lister Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'ekl-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ekl-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Event Lister Color #1</th>
        <td><input class="jscolor" name="ekl_color_1" value="<?php echo esc_attr( get_option('ekl_color_1') ); ?>"></td>
        </tr>
        
		<tr valign="top">
        <th scope="row">Event Lister Color #2</th>
        <td><input class="jscolor" name="ekl_color_2" value="<?php echo esc_attr( get_option('ekl_color_2') ); ?>"></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Event Lister Color #3</th>
        <td><input class="jscolor" name="ekl_color_3" value="<?php echo esc_attr( get_option('ekl_color_3') ); ?>"></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>