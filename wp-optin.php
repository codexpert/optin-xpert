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

defined( 'TX_OPTIN_PREFIX' ) or define( 'TX_OPTIN_PREFIX', 'tx_optin' );

$optinType         = get_option('optin_type');
$optinTimer        = get_option('optin_timer');
$optinText         = get_option('wp_editor_data');
$optinPost         = get_option('post_id');
$optinPage         = get_option('page_id');
$optinSession      = get_option('optin_session_value');
$optinSessionInput = get_option('optin_session_input');

// echo $optinSessionInput;

define('OPTIN_DATA',    get_option('wp_editor_data'));
define('OPTIN_TIMER',   get_option('optin_timer') );
define('OPTIN_SESSION', get_option('optin_session_value'));
define('OPTIN_SESSION_INPUT', get_option('optin_session_input'));
//define('OPTIN_POST', get_option('post_id'));

/*switch ($optinType) {

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
     
      add_action('wp_footer', 'load_optin_modal_scrolling');
    }else

    add_action('wp_footer', 'load_optin_modal');

    break;
}*/

function load_optin_flyin_scrolling(){

  $output = '<div class="optin-flyin-display" >
              <div class="optin-flyin-content">
                  <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
              </div>
              <div clas="text">
                <h1>Title</h1>
                '.OPTIN_DATA.'
              </div>
          </div>';
         

           $js = "<script>
            jQuery(document).ready(function () {

                jQuery('#menu-close-flyin').on('click',function(){
                jQuery('.optin-flyin-display').css({'display':'none'});
              });
              
              //__footer popup show__//
                        jQuery('footer').waypoint(function(direction) {
                            
                             jQuery('.optin-flyin-display').animate({bottom: '0px'});
                            
                           }, {
                             offset: '90%' // 
                           }) ;
                        });
           </script>";

    echo $output . $js;
}




function load_optin_flyin(){

  $output = '<div class="optin-flyin-display" >
              <div class="optin-flyin-content">
                  <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
              </div>
              <div class ="optin-header-flyin">             
                 <h2>Tx Optin</h2>    
              </div>
                <div class = "optin-content-flyin">
                    '.OPTIN_DATA.'
                </div>

                <form>
                  <div id = "optin-email-subcribe" class="form-group">                    
                    <input type="email" class="form-control" id="optin-email" placeholder="Enter email">
                  </div>
                  <button id="optin-email-button" type="submit" class="btn btn-primary ">Subscribe!!</button>
                </form>
             </div>';

           

           $js = "<script>
            jQuery(document).ready(function () {
                //hide a div after 3 seconds

                jQuery('#menu-close-flyin').on('click',function(){
                jQuery('.optin-flyin-display').css({'display':'none'});
              });                            
                
           setTimeout( function(){
                    jQuery('.optin-flyin-display').animate({bottom: '0px'});
                      }, ". OPTIN_TIMER ." );

            });
           </script>";

    echo $output  . $js;
}




function load_optin_stickytop_scrolling(){

  $output = '<div id="stickytop-wrapper">
                 <div class="stickytop-affix">
                   <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
                 <div clas="optin-text">                
                     '.OPTIN_DATA.'
                 </div>
              </div>
            </div>';




           $js = "<script>
            jQuery(document).ready(function () {

                jQuery('#stickytop-close').on('click',function(){
                      jQuery('#stickytop-wrapper').css({'display':'none'});
            
                      });    
              
              //__footer popup show__//
                        jQuery('footer').waypoint(function(direction) {
                            
                             jQuery('#stickytop-wrapper').addClass('in');
                            
                           }, {
                             offset: '90%' 
                           }) ;
                        });
           </script>";
                       

    echo $output . $js;

}

function load_optin_stickytop(){

  $output = '<div id="stickytop-wrapper" data-spy="affix" data-offset-top="200">
                 <div class="stickytop-affix">
                   <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
                 <div clas="optin-text">                
                     '.OPTIN_DATA.'
                 </div>
              </div>
            </div>';

              
           $js = "<script>
                  jQuery(document).ready(function () {
                      

                      jQuery('#stickytop-close').on('click',function(){
                      jQuery('#stickytop-wrapper').css({'display':'none'});
            
                      });    
                                   

                      setTimeout( function(){
                        jQuery('#stickytop-wrapper').addClass('in');
                      }, ". OPTIN_TIMER ." );
                    
                 });
                 </script>";


    echo $output . $js;

}

function load_optin_modal(){

  $output = '<div id="myModal" class="modal fade in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <div clas="optin-text">                
                     '.OPTIN_DATA.'
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->';

    $js = "<script>
            jQuery(document).ready(function () {
                //hide a div after  seconds
                setTimeout( function(){
                  jQuery('#myModal').modal('show');
                }, ". OPTIN_TIMER ." );
            });
           </script>";

    echo $output . $js;
}


function load_optin_modal_scrolling(){

  $output = '<div id="myModal" class="modal fade in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <div clas="optin-text">                
                     '.OPTIN_DATA.'
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->';

   
           $js = "<script>
            jQuery(document).ready(function () {
              
              //__footer popup show__//
                        jQuery('footer').waypoint(function(direction) {
                            
                            jQuery('#myModal').modal('show');
                            getRelatedNavigation(this).toggleClass('active', direction === 'down');

                           }, {
                             offset: '90%' // 
                           }) ;
                        });
           </script>";

    echo $output . $js;
}


add_action('template_redirect', 'plugin_is_page');

function plugin_is_page() {
  global $post;
  global $optinType;
  global $optinTimer;
  global $optinPost;
  global $optinPage;
  
  $optinFlag = 1;
  if($optinFlag != $_COOKIE['optinSession']) {
  

 


  //echo $optinPost; 
 //echo get_the_title(); 
  // $newOptinPost = explode(",", $optinPost);

  // foreach ($newOptinPost as $key ) {

    // if(get_posts ($optinPost )){
  // echo $page->ID;
  if(is_page( $optinPage) || is_single( $optinPost )){
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
     
      add_action('wp_footer', 'load_optin_modal_scrolling');
    }else

    add_action('wp_footer', 'load_optin_modal');

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
    {

         wp_enqueue_script(
            TX_OPTIN_PREFIX . '-selectize-js',
            plugins_url('assets/vendor/selectize/js/standalone/selectize.js', __FILE__),
            array('jquery')
        );

          wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-app-js',
            plugins_url('assets/js/app.js', __FILE__),
            array()
        );
           wp_enqueue_script(
            TX_OPTIN_PREFIX . '-optin-app-test-js',
            plugins_url('assets/js/app_test.js', __FILE__),
            array()
        );

           wp_enqueue_style(
            TX_OPTIN_PREFIX . '-optin-selectize-css',
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
                     var totalTime = ". OPTIN_SESSION .";
                     date.setTime(date.getTime() + (timeVale * totalTime * 1000));
                     jQuery.cookie('optinSession',1, { expires: date });

             });

          });
                  </script>";
          echo $inJs;
}
add_action('wp_head','headerInjection');

