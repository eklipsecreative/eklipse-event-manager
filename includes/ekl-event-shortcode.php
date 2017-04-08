<?php
/*Add this code to your functions.php file of current theme OR plugin file if you're making a plugin*/
//add the button to the tinymce editor
add_action('media_buttons_context','add_my_tinymce_media_button');
function add_my_tinymce_media_button($context){

return $context.=__("
<a href=\"#TB_inline?width=480&inlineId=my_shortcode_popup&width=640&height=513\" class=\"button thickbox\" id=\"my_shortcode_popup_button\" title=\"Add Event List\">Add Event List</a>");
}

add_action('admin_footer','my_shortcode_media_button_popup');
//Generate inline content for the popup window when the "my shortcode" button is clicked
function my_shortcode_media_button_popup(){?>
  <div id="my_shortcode_popup" style="display:none;">
    <--".wrap" class div is needed to make thickbox content look good-->
    <div class="wrap">
      <div>
        <h2>Event List Options</h2>
        <div class="my_shortcode_add">
          <select id="id_of_textbox_user_typed_in">
			  <option value="light">Light</option>
			  <option value="dark">Dark</option>
		  </select>
		  <button class="button-primary" id="id_of_button_clicked">Add Shortcode</button>
        </div>
      </div>
    </div>
  </div>
<?php
}

//javascript code needed to make shortcode appear in TinyMCE edtor
add_action('admin_footer','my_shortcode_add_shortcode_to_editor');
function my_shortcode_add_shortcode_to_editor(){?>
<script>
jQuery('#id_of_button_clicked ').on('click',function(){
  var user_content = jQuery('#id_of_textbox_user_typed_in').val();
  var shortcode = '[ekl-event style="'+user_content+'"/]';
  if( !tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
    jQuery('textarea#content').val(shortcode);
  } else {
    tinyMCE.execCommand('mceInsertContent', false, shortcode);
  }
  //close the thickbox after adding shortcode to editor
  self.parent.tb_remove();
});
</script>
<?php
}

//Code to actually display content on event lister page

add_action('init','register_shortcodes');

function register_shortcodes() {
  add_shortcode( 'ekl-event', 'ekl_generate_event_list' );
}

function ekl_generate_event_list( $atts ) {
    $a = shortcode_atts( array(
        'style' => 'Light',
    ), $atts );

	include_once( 'ekl-event-shortcode-content2.php' );
    //return "You have selected the {$a['style']} style</a>";
}




?>