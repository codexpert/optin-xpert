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
  register_setting( 'xpert-settings-group', 'wp_editor_data' );
  register_setting( 'xpert-settings-group', 'post_id' );
}
 

// Sanitize and validate input. Accepts an array, return a sanitized array.
function wpet_validate_options($input) {
  
  return $input;
}
 

function xpert_settings_page() {
?>
<div class="wrap">
<h2>Xpert Optin</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'xpert-settings-group' ); ?>
    <?php do_settings_sections( 'xpert-settings-group' ); ?>    

    <table class="form-table">   
        <tr valign="top">
          <th scope="row">Optin Type</th>
          <td>      
            <select name="optin_type">
              <option value="select"  <?php selected( get_option('optin_type' ), 'select' ); ?>>Select Your--</option>
              <option value="lightbox"  <?php selected( get_option('optin_type' ), 'lightbox' ); ?>>Light Box</option>
              <option value="flyin" <?php selected( get_option('optin_type' ), 'flyin' ); ?>>Flyin</option>
              <option value="stickytop" <?php selected( get_option('optin_type' ), 'stickytop' ); ?>>Sticky Top</option>
             </select>
          </td>
        </tr>

        <tr valign="top">
        <th scope="row">Optin Time</th>
            <td>      
        <select name="optin_timer">

            <option value="select"<?php selected( get_option('optin_timer' ), 'select' ); ?>>Select Your--</option>
            <option value="onload"  <?php selected( get_option('optin_timer' ), 'onload' ); ?>>On Load</option>
            <option value="5000"  <?php selected( get_option('optin_timer' ), '5000' ); ?>>5 SECOND</option>
            <option value="10000" <?php selected( get_option('optin_timer' ), '10000' ); ?>>10 SECOND</option>
            <option value="15000" <?php selected( get_option('optin_timer' ), '15000' ); ?>>15 SECOND</option>
            <option value="20000" <?php selected( get_option('optin_timer' ), '20000' ); ?>>20 SECOND</option>
            <option value="scrolldown" <?php selected( get_option('optin_timer' ), 'scrolldown' ); ?>>SCROLL DOWN</option>
           

        </select>
        </td>
        </tr>

     <tr valign="top">
        <th scope="row">Post ID</th>
        <td><input type="text" name="post_id" value="<?php echo esc_attr( get_option('post_id') ); ?>" /></td>
      </tr>
   
      <tr valign="top">
        <th scope="row">Optin Text</th>
            <td name="wp_editor_text">
             <?php
              $settings = array( 'wp_editor_data' => 'wp_editor_data',
                           'quicktags' => true,
                           'media_buttons' => true,
                           'teeny' => true,
                           'tinymce'=> array(
                           'theme_advanced_disable' => 'fullscreen'
                           ));

            wp_editor(  get_option('wp_editor_data'),'wp_editor_data', $settings );?>    
          </td>
        </tr>
   
      
      

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php }
?>