<?php
/*
Plugin Name: WP Optin
Plugin URI: http://themexpert.com/wordpress-plugins/xpert-optin
Version: 1.0
Author: ThemeXpert
Authro URI : http://www.themexpert.com
Description: Supercharge your WordPress optin plugin
License: GPLv2 or later
Text Domain: xo
*/

require_once 'admin-settings.php';
require_once 'helper/view.php';

//__MailChimp__//

require_once 'assets/vendor/MailChimp/MCAPI.class.php';


         // if (count($_POST)>0) echo '<div id="form-submit-alert">Form Submitted!</div>'
  
             if( isset( $_POST ["optin_mail"] )) $optin_mail = $_POST ["optin_mail"];
              //echo $optin_mail;
 
$apikey= get_option('optin_mailchimp_api'); // Enter your API key
$api = new MCAPI($apikey);
$retval = $api->lists();
//global $list;

 //echo $apikey;
//var_dump($retval);

if ($api->errorCode){
   "Code=".$api->errorCode;
  "Msg=".$api->errorMessage;
}
else {
    foreach ($retval['data'] as $list){
       $list['name'];// echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp";
       $list['id'];
     // echo "<br />";
    }
  
}

  $listid= $list['id']; // Enter list Id here
  global $optin_mail; // Enter subscriber email address
  $name=''; // Enter subscriber first name
  $lname=''; // Enter subscriber last name

// // By default this sends a confirmation email - you will not see new members
// // until the link contained in it is clicked!

$merge_vars = array('FNAME' => $name, 'LNAME' => $lname);
if($api->listSubscribe($listid, $optin_mail, $merge_vars) === true) {
  // echo 'subscribed!!';

  
            // $ts = "<script>
            //       jQuery('#optin-email-button').on('click',function(){ 
            //            alert('tss');

            //      });
            // </script>";
           // echo $ts;
  
 }

 //  global $optin_email;
  //echo $_POST['subject']; 
 //__End MailChimp__//




defined( 'TX_OPTIN_PREFIX' ) or define( 'TX_OPTIN_PREFIX', 'tx_optin' );



$optinType         = get_option('optin_type');
$optinTimer        = get_option('optin_timer');
$optinText         = get_option('wp_editor_data');
$optinPost         = get_option('post_id');
$optinPage         = get_option('page_id');
$optinHome         = get_option('home_page');
$optinSession      = get_option('optin_session_value');
$optinSessionInput = get_option('optin_session_input');
$MailChimp_content = get_option('optin_mailchimp_content' );

// echo $optinSessionInput;



define('OPTIN_DATA',    get_option('wp_editor_data'));
define('OPTIN_IMAGE',   get_option('optin_upload_media'));
define('OPTIN_TIMER',   get_option('optin_timer') );
define('OPTIN_SESSION', get_option('optin_session_value'));
define('OPTIN_SESSION_INPUT', get_option('optin_session_input'));
define('OPTIN_MAILCHIMP_CONTENT', get_option('optin_mailchimp_content'));



function load_optin_flyin_scrolling(){

  $DATA = array( 
      'OPTIN_DATA'=> OPTIN_DATA,
      'optin_mail' => $_POST ["optin_mail"]      
    ); 
echo view(__DIR__."/views/front/flying.scrolling.tpl.php", $DATA);
 
}




function load_optin_flyin(){
    // echo "<pre>";  die();
    $DATA = array(
      'OPTIN_TIMER'=> OPTIN_TIMER,
      'OPTIN_DATA'=> OPTIN_DATA,
      'optin_mail' => $_POST ["optin_mail"]
    ); 
echo view(__DIR__."/views/front/flying.tpl.php", $DATA);
}




function load_optin_stickytop_scrolling(){
  $DATA = array( 
    'OPTIN_DATA'=> OPTIN_DATA,
    'OPTIN_IMAGE' => OPTIN_IMAGE,
    'optin_mail' => $_POST ["optin_mail"]
  );
  echo view(__DIR__."/views/front/stickytop.scrolling.tpl.php", $DATA);

 
}

function load_optin_stickytop(){

    $DATA = array(
      'OPTIN_TIMER'=> OPTIN_TIMER,
      'OPTIN_DATA' => OPTIN_DATA,
      'OPTIN_IMAGE' => OPTIN_IMAGE,
      'optin_mail' => $_POST ["optin_mail"]
    ); 
echo view(__DIR__."/views/front/stickytop.tpl.php", $DATA);

  
}

function load_optin_lightBox(){

  $DATA = array(
      'OPTIN_TIMER'=> OPTIN_TIMER,
      'OPTIN_DATA'=> OPTIN_DATA,
       'OPTIN_IMAGE' => OPTIN_IMAGE,
      'optin_mail' => $_POST ["optin_mail"]
    ); 
echo view(__DIR__."/views/front/lightbox.tpl.php", $DATA);

}


function load_optin_lightBox_scrolling(){

    $DATA = array(
      'OPTIN_TIMER'=> OPTIN_TIMER,
      'OPTIN_DATA'=> OPTIN_DATA,
       'OPTIN_IMAGE' => OPTIN_IMAGE,
      'optin_mail' => $_POST ["optin_mail"]
    ); 
echo view(__DIR__."/views/front/lightbox.scrolling.tpl.php", $DATA);
  
}

add_action('template_redirect', 'plugin_is_page');

function plugin_is_page() {

  global $post;
  global $optinType;
  global $optinTimer;
  global $optinPost;
  global $optinPage;
  global $optinHome;
  global $optinSession;
  
  //$_COOKIE['optinSession']=0;
  $optinFlag = 1;
  if($optinFlag != $_COOKIE['optinSession']) {
  
  if(is_page( $optinPage) || is_single( $optinPost) || is_home()== $optinHome){
 
    //echo $optinPage;

      switch ($optinType) {

  case 'flyin':
  
    if( $optinTimer == 'scrolldown' ){      
      add_action('wp_footer', 'load_optin_flyin_scrolling');
    }else
    add_action('wp_footer', 'load_optin_flyin');

    break;

  case 'stickytop':


    if( $optinTimer == 'scrolldown' ){
     
      add_action('wp_footer', 'load_optin_stickytop_scrolling');
    }else
    add_action('wp_head', 'load_optin_stickytop');

    break;  
  
  case 'lightbox':

    if( $optinTimer == 'scrolldown' ){
     
      add_action('wp_footer', 'load_optin_lightBox_scrolling');
    }else

    add_action('wp_footer', 'load_optin_lightBox');

    break;
    }
  }

}
    // }
}


// add_action( 'edit_page_form', 'my_second_editor' );
// function my_second_editor() {
//   // get and set $content somehow...
//   wp_editor( $content, 'mysecondeditor' );
// }





final class TX_XpertOptin
{

    /**
     * Hook WordPress
     */
    public function __construct()
    {
      
        add_action('wp_enqueue_scripts', array($this, 'loaOptinScripts'));
        //add_action('wp_enqueue_script', array($this, 'loadBackendSiteScripts'));
        add_action( 'admin_enqueue_scripts', array($this, 'loadBackendSiteScripts' ));
        
    }
    
    /**
     * Load Frontend Scripts
     *
     * @access public
     * @return void
     * @since 0.1
     */
    public function loaOptinScripts()
    {      


         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-bs-optin-js',
            plugins_url('assets/vendor/bootstrap/js/bootstrap.min.js', __FILE__),
            array('jquery')
        );

         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-waypoint-optin-js',
            plugins_url('assets/vendor/waypoint/js/jquery.waypoints.min.js', __FILE__),
            array()
        );

         
         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-style-cookie',
            plugins_url('assets/js/jquery.cookie.js', __FILE__),
            array()
        );

         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-frontapp-js',
            plugins_url('assets/js/frontapp.js', __FILE__),
            array()
        );

         wp_localize_script(
            TX_OPTIN_PREFIX . '-optin-frontapp-js',
            'lightbox_layout',
            get_option('lightbox-layout')
          );

         wp_localize_script(
            TX_OPTIN_PREFIX . '-optin-frontapp-js',
            'flyer_layout',
            get_option('flyer-layout')
          );

        wp_localize_script(
            TX_OPTIN_PREFIX . '-optin-frontapp-js',
            'stickytop_layout',
            get_option('stickytop-layout')
          );

        
        wp_enqueue_style(
            TX_OPTIN_PREFIX . '-bs-optin-css-load',
            plugins_url('assets/vendor/bootstrap/css/bootstrap.min.css', __FILE__),
            array()
        );

        wp_enqueue_style(
            TX_OPTIN_PREFIX . '-optin-style-css',
            plugins_url('assets/css/styles.css', __FILE__),
            array()
        );

       
    }

 function loadBackendSiteScripts()
//     {

//          wp_enqueue_script(
//             TX_OPTIN_PREFIX . '-selectize-js',
//             plugins_url('assets/vendor/selectize/js/standalone/selectize.js', __FILE__),
//             array('jquery')
//         );

//           wp_enqueue_script(
//             TX_OPTIN_PREFIX . '-optin-app-js',
//             plugins_url('assets/js/app.js', __FILE__),
//             array()
//         );
//            wp_enqueue_script(
//             TX_OPTIN_PREFIX . '-optin-app-test-js',
//             plugins_url('assets/js/app_test.js', __FILE__),
//             array()
//         );

//            wp_enqueue_style(
//             TX_OPTIN_PREFIX . '-optin-selectize-css',
//             plugins_url('assets/css/app.css', __FILE__),
//             array()
//         );
// }


 {

         wp_enqueue_media();
         
         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-selectize-js',
            plugins_url('assets/vendor/selectize/js/standalone/selectize.js', __FILE__),
            array('jquery')
        );

         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-image-picker-js',
            plugins_url('assets/vendor/image-picker/js/image-picker.min.js', __FILE__),
            array()
        );
        

          wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-app-js',
            plugins_url('assets/js/app.js', __FILE__),
            array()
        );

          wp_localize_script( 
            TX_OPTIN_PREFIX . '-optin-app-js', 
            'layout_style', 
            get_option('optin_type') 
          );

           wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-app-options-js',
            plugins_url('assets/js/app_optin.js', __FILE__),
            array()
        );

          wp_enqueue_style(
            TX_OPTIN_PREFIX . '-image-picker-css',
            plugins_url('assets/vendor/image-picker/css/image-picker.css', __FILE__),
            array()
        );

           wp_enqueue_style(
            TX_OPTIN_PREFIX . '-optin-selectize-css',
            plugins_url('assets/vendor/selectize/css/app.css', __FILE__),
            array()
        );


          wp_enqueue_style(
            TX_OPTIN_PREFIX . '-optin-app-back-css',
            plugins_url('assets/css/app.css', __FILE__),
            array()
        );
}
    
}
// Kickstart the class
new TX_XpertOptin();


function headerInjection(){
  $inJs = "<script>
              jQuery(document).ready(function () {
                jQuery('#menu-close-flyin').on('click',function(){
                     var date = new Date();
                     var timeVale = ".OPTIN_SESSION_INPUT.";
                     var totalTime = ".OPTIN_SESSION.";
                     date.setTime(date.getTime() + (timeVale * totalTime * 1000));
                     jQuery.cookie('optinSession',1, { expires: date });

             });

          });
                  </script>";
          echo $inJs;
}
add_action('wp_head','headerInjection');

?>