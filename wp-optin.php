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


require "helper/view_html.php";



if( esc_attr( get_option('check_option') ) == 1 ){

  add_action( 'wp_enqueue_scripts',  'frontend_enqueue_script' );
    
 }
//$test = get_option('select_option' );
// echo $test;

switch (get_option('select_option' )) {

        case 'top':
            add_action( 'wp_enqueue_scripts',  'frontend_position1_script' );
            break;

        case 'middle':
            add_action( 'wp_enqueue_scripts',  'frontend_position2_script' );
            break;

        case 'bottom':
            add_action( 'wp_enqueue_scripts',  'frontend_position3_script' );
            break;
        
        default:
            # code...
            break;
}

     function frontend_position1_script(){  
            wp_enqueue_script('position1-optin-js', plugins_url('assets/js/position/optin-top-position.js', __FILE__), array('jquery') );   

          }
     
     function frontend_position2_script(){  
            wp_enqueue_script('position2-optin-js', plugins_url('assets/js/position/interval1-optin.js', __FILE__), array('jquery') );   

          }

     function frontend_position3_script(){  
            wp_enqueue_script('position3-optin-js', plugins_url('assets/js/position/optin-bottom-position.js', __FILE__), array('jquery') );   

      }


switch ( get_option('interval_select' ) ) {

        case '5sec':
            add_action( 'wp_enqueue_scripts',  'frontend_interval1_script' );
            break;

        case '10sec':
            add_action( 'wp_enqueue_scripts',  'frontend_interval2_script' );
            break;

        case '15sec':
             add_action( 'wp_enqueue_scripts',  'frontend_interval3_script' );
            break;

         case '20sec':
             add_action( 'wp_enqueue_scripts',  'frontend_interval4_script' );
            break;
        
        default:
            # code...
            break;
}

   
    
    function frontend_interval1_script(){  
        wp_enqueue_script('interval-optin1-js', plugins_url('assets/js/interval/interval1-optin.js', __FILE__), array('jquery') );   

      }

    function frontend_interval2_script(){  
        wp_enqueue_script('interval-optin2-js', plugins_url('assets/js/interval/interval2-optin.js', __FILE__), array('jquery') );   

      }
      function frontend_interval3_script(){  
        wp_enqueue_script('interval-optin3-js', plugins_url('assets/js/interval/interval3-optin.js', __FILE__), array('jquery') );   

      }

    function frontend_interval4_script(){  
        wp_enqueue_script('interval-optin4-js', plugins_url('assets/js/interval/interval4-optin.js', __FILE__), array('jquery') );   
      }


     /**
      * Enqueue scripts and styles
      */
      function frontend_enqueue_script(){  

        wp_enqueue_script('app-optin-js', plugins_url('assets/js/app_optin.js', __FILE__), array('jquery') ); 
  

      }

// echo  get_option('select_option' );

function frontend_function() {
   // echo '<p>This is inserted at the bottom</p>';
    echo frontend_html();
   
}
add_action('wp_footer', 'frontend_function');



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
    register_setting( 'xpert-settings-group', 'interval_select' );
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
        <th scope="row">Interval</th>
            <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Interval Show</th>
            <td>      
        <select name="interval_select">

            <option value="select"<?php selected( get_option('interval_select' ), 'select' ); ?>>Select Your--</option>
            <option value="5sec"  <?php selected( get_option('interval_select' ), '5sec' ); ?>>5 SECOND</option>
            <option value="10sec" <?php selected( get_option('interval_select' ), '10sec' ); ?>>10 SECOND</option>
            <option value="15sec" <?php selected( get_option('interval_select' ), '15sec' ); ?>>15 SECOND</option>
            <option value="20sec" <?php selected( get_option('interval_select' ), '20sec' ); ?>>20 SECOND</option>

        </select>
        </td>
        </tr>
         
        <tr valign="top">
          <th scope="row">On Page Load Option</th>
            <td>
                 <input type='checkbox' name='check_option' value='1' <?php if ( 1 == get_option('check_option') ) echo 'checked="checked"'; ?> />
             </tr>
        
        <tr valign="top">
        <th scope="row">Position</th>
        <td>      
        <select name="select_option">

            <option value="select"  <?php selected( get_option('select_option' ), 'select' ); ?>>Select Your--</option>
            <option value="top"  <?php selected( get_option('select_option' ), 'top' ); ?>>Top</option>
            <option value="middle" <?php selected( get_option('select_option' ), 'middle' ); ?>>Middle</option>
            <option value="bottom" <?php selected( get_option('select_option' ), 'bottom' ); ?>>Bottom</option>

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
    }
}
// Kickstart the class
new TX_XpertOptin();

?>