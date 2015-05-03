 <?php

 


function wp_create_menu() {
  //create new top-level menu
  add_menu_page('Xpert Optin Menu', 'Xpert Optin', 'administrator', __FILE__, 'xpert_settings_page','dashicons-admin-plugins');
  //call register settings function
  

  add_action( 'admin_init', 'register_mysettings' );
}
// create custom plugin settings menu
add_action('admin_menu', 'wp_create_menu');

function register_mysettings() {
  //register our settings
    
  register_setting( 'xpert-settings-group', 'optin_timer' );    
  register_setting( 'xpert-settings-group', 'optin_type' );
  register_setting( 'xpert-settings-group', 'lightbox-layout');
  register_setting( 'xpert-settings-group', 'flyer-layout');
  register_setting( 'xpert-settings-group', 'stickytop-layout');
  register_setting( 'xpert-settings-group', 'wp_editor_data' );
  register_setting( 'xpert-settings-group', 'post_id' );
  register_setting( 'xpert-settings-group', 'page_id' );
  register_setting( 'xpert-settings-group', 'optin_session_value' );
  register_setting( 'xpert-settings-group', 'optin_session_input' );
  register_setting( 'xpert-settings-group', 'optin_mailchimp_api' );
  register_setting( 'xpert-settings-group', 'optin_mailchimp_content' );
  register_setting( 'xpert-settings-group', 'optin_upload_media');
  register_setting( 'xpert-settings-group', 'layout_checkbox');
  register_setting( 'xpert-settings-group', 'layout_custom');
  register_setting( 'xpert-settings-group', 'is_home');
}
 



// Sanitize and validate input. Accepts an array, return a sanitized array.
function wpet_validate_options($input) {
  
  return $input;
}
 
 

function xpert_settings_page() {
  
  // echo $image_url; die();
  echo view(__DIR__. "/views/settings.tpl.php");
}

add_filter("mce_buttons", "tinymce_editor_buttons", 99); //targets the first line
add_filter("mce_buttons_2", "tinymce_editor_buttons_second_row", 99); //targets the second line

function tinymce_editor_buttons($buttons) {
return array(
    "forecolor",   
    "bold",      
    "italic",
    "alignleft",
    "aligncenter",
    "alignright", 
    "formatselect",
      

    //add more here...
    );
}

function tinymce_editor_buttons_second_row($buttons) {
   //return an empty array to remove this line
    return array('block_formats'=> 'h1');
}

remove_filter('the_excerpt','wpautop');

