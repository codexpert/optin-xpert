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
  register_setting( 'xpert-settings-group', 'page_id' );
  register_setting( 'xpert-settings-group', 'optin_session_value' );
  register_setting( 'xpert-settings-group', 'optin_session_input' );
  register_setting( 'xpert-settings-group', 'optin_mailchimp_api' );
  register_setting( 'xpert-settings-group', 'optin_mailchimp_content' );
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
            <option value="onload" <?php selected( get_option('optin_timer' ), 'onload' ); ?>>On Load</option>
            <option value="5000"  <?php selected( get_option('optin_timer' ), '5000' ); ?>>5 SECOND</option>
            <option value="10000" <?php selected( get_option('optin_timer' ), '10000' ); ?>>10 SECOND</option>
            <option value="15000" <?php selected( get_option('optin_timer' ), '15000' ); ?>>15 SECOND</option>
            <option value="20000" <?php selected( get_option('optin_timer' ), '20000' ); ?>>20 SECOND</option>
            <option value="scrolldown" <?php selected( get_option('optin_timer' ), 'scrolldown' ); ?>>SCROLL DOWN</option>
           

        </select>
        </td>
        </tr>

        <tr valign="top">
          <th scope="row">Optin Session</th>
          <td>  
            <input type="text" name="optin_session_input" value="<?php echo esc_attr( get_option('optin_session_input') ); ?>" /> 
            <select name="optin_session_value">
              <option value="select"  <?php selected( get_option('optin_session_value' ), 'select' ); ?>>Select Your--</option>
              <option value="60"  <?php selected( get_option('optin_session_value' ), '60' ); ?>>Minutes</option>
              <option value="3600"  <?php selected( get_option('optin_session_value' ), '3600' ); ?>>Hours</option>
              <option value="86400"  <?php selected( get_option('optin_session_value' ), '86400' ); ?>>Days</option>
              <option value="2592000"  <?php selected( get_option('optin_type' ), '2592000' ); ?>>Months</option>
             </select>
          </td>
        </tr>



         <tr valign="top">
        <th scope="row">Select Your Post</th>
            <td >

            <select  name="post_id[]" multiple="multiple" accesskey="e">
            <?php
            $result = get_posts();
            $selecteded = get_option('post_id', array());

            foreach ($result as $post):
                ?>
                <option value="<?php echo $post->post_name; ?>" <?php echo selected(in_array($post->post_name, $selecteded)); ?>>
                    <?php echo $post->post_title; ?>
                </option>
                <?php
               endforeach;
            ?>
         </select>
            </td>
        </tr>

<!-- 
     <tr valign="top">
        <th scope="row">Post ID</th>
        <td><input type="text" name="post_id" value="<?php echo esc_attr( get_option('post_id') ); ?>" /></td>
      </tr> -->

      
    
    <!--  <tr valign="top">
        <th scope="row">Select Your Page</th>
            <td name="page_id">
            <?php $arg = array(
                  'name' => 'page_id',
                 'selected' => get_option('page_id'),
              );
              wp_dropdown_pages($arg);
              ?>

             </td>
        </tr>
    -->

       <tr valign="top">
        <th scope="row">Select Your Page</th>
            <td >

            <select  name="page_id[]" multiple="multiple" accesskey="e">
            <?php
            $results = get_pages();
            $selected = get_option('page_id', array());

            foreach ($results as $page):
                ?>
                <option value="<?php echo $page->post_name; ?>" <?php echo selected(in_array($page->post_name, $selected)); ?>>
                    <?php echo $page->post_title; ?>
                </option>
                <?php
               endforeach;
            ?>
         </select>
            </td>
        </tr>


    <tr valign="top">
     <th scope="row">MailChimp API Key</th>
      <td>  
        <input type="text" name="optin_mailchimp_api" placehold="Enter MailChimp API Key" value="<?php echo esc_attr( get_option('optin_mailchimp_api') ); ?>" /> 
      </td>
    </tr>

    <!--   <tr valign="top">
        <th scope="row">MailChimp Content</th>
            <td >

            <select  name="optin_mailchimp_content[]" multiple="multiple" accesskey="e">
            <?php
            //$results = get_pages();
            $selected = get_option('optin_mailchimp_content', array());

            foreach ($results as $page):
                ?>
                <option value="<?php echo $page->post_name; ?>" <?php echo selected(in_array($page->post_name, $selected)); ?>>
                    <?php echo $page->post_title; ?>
                </option>
                <?php
               endforeach;
            ?>
         </select>
            </td>
      </tr> -->

        <tr valign="top">
          <th scope="row">MailChimp Content</th>
          <td>              
            <select name="optin_mailchimp_content">
              <option value="select_"  <?php selected( get_option('optin_mailchimp_content' ), 'select_' ); ?>>Select Your--</option>
              <option value="name"  <?php selected( get_option('optin_mailchimp_content' ), 'name' ); ?>>Name</option>
              <option value="email"  <?php selected( get_option('optin_mailchimp_content' ), 'email' ); ?>>E-Mail Address</option>     
               <option value="name_email"  <?php selected( get_option('optin_mailchimp_content' ), 'name_email' ); ?>>Name With E-Mail</option>                     
             </select>
          </td>
        </tr>

        
      <!-- 
      <tr valign="top">
        <th scope="row">Select Your Page</th>
            <td >
                <select multiple name="page_id">
                  <option value="0"<?php selected( get_option('page_id' ), '0' ); ?>>Zero</option>
                  <option value="1"<?php selected( get_option('page_id' ), '1' ); ?>>One</option>
                  
                </select>

          </td>
        </tr> -->

      <tr valign="top">
        <th scope="row">Optin Text</th>
            <td name="wp_editor_text">
             <?php
              $settings = array( 'wp_editor_data' => 'wp_editor_data',
                           'quicktags' => true,
                           'wpautop' => false,
                           'media_buttons' => true,
                           'teeny' => true,
                           'tinymce'=> array(
                            'forced_root_block' => "h2",
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




/*$flag = 1;

if($flag == 1){
  $cookie_name = 'WP-Optin';
  $cookie_value = 1;
  setcookie($cookie_name, $cookie_value, time() + (10 * 1), '/'); 
  $flag += $_COOKIE[$cookie_name];
}


echo $flag;

*/
?>  

