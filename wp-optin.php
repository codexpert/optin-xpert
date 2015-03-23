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

defined( 'TX_OPTIN_PREFIX' ) or define( 'TX_OPTIN_PREFIX', 'tx_optin' );


require "helper/view_lightbox_html.php";

require "helper/view_flying_html.php";

require "helper/view_stickytop_html.php";


//__Select Optin Type cases__//

switch (get_option('select_option' )) {

        case 'lightbox':
            add_action( 'wp_enqueue_scripts',  'frontend_lightbox_script' );
            break;

        case 'flyin':
            add_action( 'wp_enqueue_scripts',  'frontend_flyin_script' );
           add_action('wp_footer', 'frontend_flyin_function');
            break;

        case 'stickytop':
            add_action( 'wp_enqueue_scripts',  'frontend_stickytop_script' );
             add_action('wp_footer', 'frontend_stickytop_function');
            break;
        
        default:
            # code...
            break;
}

     function frontend_lightbox_script(){  
            wp_enqueue_script('lightbox-show-optin-js', plugins_url('assets/js/optin-type/lightbox_show_optin.js', __FILE__), array('jquery') );   

          }
     
     function frontend_flyin_script(){  
            wp_enqueue_script('flyin-show-optin-js', plugins_url('assets/js/optin-type/flyin_show_optin.js', __FILE__), array('jquery') );   

          }

     function frontend_stickytop_script(){  
            wp_enqueue_script('stickytop-show-optin-js', plugins_url('assets/js/optin-type/stickytop_show_optin.js', __FILE__), array('jquery') );   

      }

//__Select Optin Load cases__//

switch ( get_option('optin_load' ) ) {


        case 'onload':
              add_action( 'wp_enqueue_scripts', 'frontend_optin_onload_script' );
            break;

        case '5sec':
            add_action( 'wp_enqueue_scripts',  'frontend_optin_5sec_script' );
            break;

        case '10sec':
            add_action( 'wp_enqueue_scripts',  'frontend_optin_10sec_script' );
            break;

        case '15sec':
             add_action( 'wp_enqueue_scripts',  'frontend_optin_15sec_script' );
            break;

        case '20sec':
             add_action( 'wp_enqueue_scripts',  'frontend_optin_20sec_script' );
            break;

        case 'scrolldown':
            add_action( 'wp_enqueue_scripts',  'frontend_onscroll_down_script' );
            break;
        
        default:
            # code...
            break;
}

    /**
      * Enqueue scripts and styles
      */
      function frontend_optin_onload_script(){  

        wp_enqueue_script('optin-onload-js', plugins_url('assets/js/optin_load/optin_onload_script.js', __FILE__), array('jquery') ); 
  
      }
    
    function frontend_optin_5sec_script(){  
        wp_enqueue_script('optin-5sec-js', plugins_url('assets/js/optin_load/optin_5sec_script.js', __FILE__), array('jquery') );   

      }

    function frontend_optin_10sec_script(){  
        wp_enqueue_script('optin-10sec-js', plugins_url('assets/js/optin_load/optin_10sec_script.js', __FILE__), array('jquery') );   

      }
      function frontend_optin_15sec_script(){  
        wp_enqueue_script('optin-15sec-js', plugins_url('assets/js/optin_load/optin_15sec_script.js', __FILE__), array('jquery') );   

      }

    function frontend_optin_20sec_script(){  
        wp_enqueue_script('optin-20sec-js', plugins_url('assets/js/optin_load/optin_20sec_script.js', __FILE__), array('jquery') );   
      }

     function frontend_onscroll_down_script(){  
            wp_enqueue_script('optin-scrolling-js', plugins_url('assets/js/optin_load/optin_scrolling_script.js', __FILE__), array('jquery') );   

      }
    

// echo  get_option('select_option' );

function frontend_function() {
   // echo '<p>This is inserted at the bottom</p>';
    echo frontend_html();
   
}
add_action('wp_footer', 'frontend_function');

// function frontend_test_function() {
//    // echo '<p>This is inserted at the bottom</p>';
//     echo frontend_flying_html();   
  
// }
// add_action('wp_footer', 'frontend_test_function');




//if ( get_option('select_option' ) == 'flyin') {
  # code...
  function frontend_flyin_function() {
   // echo '<p>This is inserted at the bottom</p>';
    echo frontend_flying_html();
   
}
 // add_action('wp_footer', 'frontend_flyin_function');
//}

function frontend_stickytop_function() {
   // echo '<p>This is inserted at the bottom</p>';
    echo frontend_stickytop_html();
   
}
 // add_action('wp_footer', 'frontend_stickytop_function');



// create custom plugin settings menu
add_action('admin_menu', 'wp_create_menu');

function wp_create_menu() {

	//create new top-level menu
	add_menu_page('Xpert Optin Menu', 'Xpert Optin', 'administrator', __FILE__, 'xpert_settings_page','dashicons-admin-plugins');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'xpert-settings-group', 'new_option_name' );
  register_setting( 'xpert-settings-group', 'optin_load' );
	register_setting( 'xpert-settings-group', 'check_option' );
	register_setting( 'xpert-settings-group', 'select_option' );
}

function xpert_settings_page() {
?>
<div class="wrap">
<h2>Your Plugin Name</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'xpert-settings-group' ); ?>
    <?php do_settings_sections( 'xpert-settings-group' ); ?>
    <table class="form-table">    
        <tr valign="top">
        <th scope="row">Optin Load</th>
            <td>      
        <select name="optin_load">

            <option value="select"<?php selected( get_option('optin_load' ), 'select' ); ?>>Select Your--</option>
            <option value="onload"  <?php selected( get_option('optin_load' ), 'onload' ); ?>>On Load</option>
            <option value="5sec"  <?php selected( get_option('optin_load' ), '5sec' ); ?>>5 SECOND</option>
            <option value="10sec" <?php selected( get_option('optin_load' ), '10sec' ); ?>>10 SECOND</option>
            <option value="15sec" <?php selected( get_option('optin_load' ), '15sec' ); ?>>15 SECOND</option>
            <option value="20sec" <?php selected( get_option('optin_load' ), '20sec' ); ?>>20 SECOND</option>
            <option value="scrolldown" <?php selected( get_option('optin_load' ), 'scrolldown' ); ?>>On Scroll Down</option>


        </select>
        </td>
        </tr>
              
        <tr valign="top">
        <th scope="row">Optin Type</th>
        <td>      
        <select name="select_option">

            <option value="select"  <?php selected( get_option('select_option' ), 'select' ); ?>>Select Your--</option>
            <option value="lightbox"  <?php selected( get_option('select_option' ), 'lightbox' ); ?>>Light Box</option>
            <option value="flyin" <?php selected( get_option('select_option' ), 'flyin' ); ?>>FlyIN</option>
            <option value="stickytop" <?php selected( get_option('select_option' ), 'stickytop' ); ?>>Sticky Top</option>

    	</select>
        </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>


<?php 

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
            TX_OPTIN_PREFIX . '-bs-optin-modal',
            plugins_url('assets/vendor/bootstrap/js/modal.js', __FILE__),
            array()
        );

          wp_enqueue_script(
            TX_OPTIN_PREFIX . '-waypoint-optin-js',
            plugins_url('assets/vendor/waypoint/js/jquery.waypoints.min.js', __FILE__),
            array()
        );

        wp_enqueue_style(
            TX_OPTIN_PREFIX . '-bs-css-load',
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