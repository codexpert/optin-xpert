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
        <!-- <tr valign="top">
          <th scope="row">Optin Type</th>
          <td>      
            <select name="optin_type">
              <option value="select"  <?php selected( get_option('optin_type' ), 'select' ); ?>>Select Your--</option>
              <option value="lightbox"  <?php selected( get_option('optin_type' ), 'lightbox' ); ?>>Light Box</option>
              <option value="flyin" <?php selected( get_option('optin_type' ), 'flyin' ); ?>>Flyin</option>
              <option value="stickytop" <?php selected( get_option('optin_type' ), 'stickytop' ); ?>>Sticky Top</option>
             </select>
          </td>
        </tr> -->


      <tr valign="top">
          <th scope="row">Optin Type</th>
          <td>      
            <select name="optin_type" id="optin_type_hook">
              <option value="select"  <?php selected( get_option('optin_type' ), 'select' ); ?>>Select Your--</option>
              <option value="lightbox"  <?php selected( get_option('optin_type' ), 'lightbox' ); ?>>Light Box</option>
              <option value="flyin" <?php selected( get_option('optin_type' ), 'flyin' ); ?>>Flyin</option>
              <option value="stickytop" <?php selected( get_option('optin_type' ), 'stickytop' ); ?>>Sticky Top</option>
             </select>
          </td>
        </tr>

          <tr valign="top">
          <th scope="row">Optin layout</th>
          <td>  
            <div class="xpert-optin-layout"> 
                <div class="layout-flyer">
                  <div class="layout-flyer-1">
                     <?php
                      echo '<img src="' . plugins_url('assets/image/flyer.png', __FILE__). '" > ';
                      ?>
                  </div>
                </div>
             </div>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"></th>
          <td>  
              <div class="xpert-optin-preview xpert-optin-preview-none">
                  <div class="flyer-preview">
                     <div class="flyer-pre-back">
                        <?php
                        echo '<img src="' . plugins_url('assets/image/flyer_pre.png', __FILE__). '" > ';
                        ?>

                           <div class="flyer-pre-front">
                              <?php
                                echo '<img src="' . plugins_url('assets/image/flyer-icon.png', __FILE__). '" > ';
                                ?>
                              <h2>Join Our Daily Newsletters</h2>
                              <p>Recieve the most recent enws about <br /> product releases and promotions.</p>
                          </div>
                      </div>
                    
                  </div>
              </div>
          </td>
        </tr>



        <!--  -->


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
                           'quicktags' => false,
                           'wpautop' => false,
                           'mce-ico' => false,
                           'media_buttons' => true,                           
                           'teeny' => false,
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

add_filter("mce_buttons", "tinymce_editor_buttons", 99); //targets the first line
add_filter("mce_buttons_2", "tinymce_editor_buttons_second_row", 99); //targets the second line
// add_filter("mce_buttons_3", "tinymce_editor_buttons_second_row", 99);
// add_filter("mce_buttons_4", "tinymce_editor_buttons_second_row", 99);

function tinymce_editor_buttons($buttons) {
return array(
    "forecolor",   
    "bold",      
    "italic",
    "alignleft",
    "aligncenter",
    "alignright",
    



    
    
    

    //"separator",
    //"bullist", 
    //"separator",
    //add more here...
    );
}

function tinymce_editor_buttons_second_row($buttons) {
   //return an empty array to remove this line
    return array('block_formats'=> 'h1');
}

remove_filter('the_excerpt','wpautop');

// function wpa_45815($arr){
//     $arr['block_formats'] = 'h4';
//     return $arr;
//   }
// add_filter('tiny_mce_before_init', 'wpa_45815');


//__tinymc button name__//

//bold,italic,strikethrough,underline,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,image,styleprops,separator,wp_more,wp_page,separator,spellchecker,search,separator,fullscreen,wp_adv,NextGEN,cforms,vvqYouTube,vvqGoogleVideo,vvqDailyMotion,vvqVimeo,vvqVeoh,vvqViddler,vvqMetacafe,vvqBlipTV,vvqFlickrVideo,vvqSpike,vvqMySpace,vvqFLV,vvqQuicktime,vvqVideoFile,slidedeck", theme_advanced_buttons2:"fontsizeselect,formatselect,pastetext,pasteword,removeformat,separator,charmap,print,separator,forecolor,backcolor,emotions,separator,sup,sub,media,separator,undo,redo,attribs,wp_help", theme_advanced_buttons3:"", theme_advanced_buttons4:"", language:"en", spellchecker_languages:"+English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr,German=de,Italian=it,Polish=pl,Portuguese=pt,Spanish=es,Swedish=sv", theme_advanced_toolbar_location:"top", theme_advanced_toolbar_align:"left", theme_advanced_statusbar_location:"bottom", theme_advanced_resizing:"1", theme_advanced_resize_horizontal:"", dialog_type:"modal", relative_urls:"", remove_script_host:"", convert_urls:"", apply_source_formatting:"", remove_linebreaks:"1", gecko_spellcheck:"1", entities:"38,amp,60,lt,62,gt", accessibility_focus:"1", tabfocus_elements:"major-publishing-actions", media_strict:"", paste_remove_styles:"1", paste_remove_spans:"1", paste_strip_class_attributes:"all", wpeditimage_disable_captions:"", plugins:"safari,inlinepopups,spellchecker,paste,wordpress,media,fullscreen,wpeditimage,wpgallery,tabfocus,-NextGEN,-cforms,-vipersvideoquicktags,-slidedeck,-style,-emotions,-print,-searchreplace,-xhtmlxtras,-advlink,-advimage"

//__End_tinymc button name__//

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

