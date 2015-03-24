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

$optinType = get_option('optin_type');
$optinTimer = get_option('optin_timer');
//$optinTimer1 = get_option('optin_check');



define('OPTIN_TIMER', get_option('optin_timer') );

switch ($optinType) {
  case 'flyin':

    if( $optinTimer == 'scrolldown' ){
      //define('OPTIN_TIMER', 0);
      add_action('wp_footer', 'load_optin_flyin_scrolling');
    }else
    add_action('wp_footer', 'load_optin_flyin');
    break;

  case 'stickytop':
    add_action('wp_head', 'load_optin_stickytop');
    break;  
  
  default:
    add_action('wp_footer', 'load_optin_modal');
    break;
}


// switch ($optinTimer1) {
//   case 1:
//     # code...
//   add_action('wp_footer', 'load_optin_flyin_scrolling');
//     break;
  
//   default:
//     # code...
//     break;
// }


function load_optin_flyin_scrolling(){

  $output = '<div class="optin-flyin-display" >
              <div class="optin-flyin-content">
                  <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
              </div>
              <div clas="text">
                <h1>Helloooasdfasdf</h1>
              </div>
          </div>';
         

           $ts = "<script>
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

    echo $output . $ts;
}




function load_optin_flyin(){

  $output = '<div class="optin-flyin-display" >
              <div class="optin-flyin-content">
                  <a id="menu-close-flyin" href="#" class="btn btn-light btn-lg pull-right">X</a>
              </div>
              <div clas="text">
                <h1>Helloooasdfasdf</h1>
              </div>
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



           // $ts = "<script>
           //  jQuery(document).ready(function () {

           //      jQuery('#menu-close-flyin').on('click',function(){
           //      jQuery('.optin-flyin-display').css({'display':'none'});
           //    });
              
           //    //__footer popup show__//
           //              jQuery('footer').waypoint(function(direction) {
                            
           //                   jQuery('.optin-flyin-display').animate({bottom: '0px'});
                            
           //                 }, {
           //                   offset: '90%' // 
           //                 }) ;
           //              });
           // </script>";

    echo $output  . $js;
}





function load_optin_stickytop(){

  $output = '<div id="stickytop-wrapper">
                 <div class="stickytop-affix">
                   <a id="stickytop-close" href="#" class="btn pull-right">X</a>          
                 <div class = "text-color">            
                     StickytopBar
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
                <p>One fine body&hellip;</p>
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
                //hide a div after 3 seconds
                setTimeout( function(){
                  jQuery('#myModal').modal('show');
                }, ". OPTIN_TIMER ." );
            });
           </script>";

    echo $output . $js;
}

final class TX_XpertOptin
{

    /**
     * Hook WordPress
     */
    public function __construct()
    {
      
        add_action('wp_enqueue_scripts', array($this, 'loaOptinScripts'));
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
}
// Kickstart the class
new TX_XpertOptin();

?>