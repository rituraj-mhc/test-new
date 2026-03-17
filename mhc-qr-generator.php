<?php
/**
 * Plugin Name: MHC QR Generator
 * Plugin URI: https://myheartcreative.com/
 * Description: QR Generator with styling using qr-code-styling.js
 * Version: 1.0.0
 * Author: MHC
 * Author URI: https://myheartcreative.com/
 * License: GPL2+
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

define( 'MHCQR_VERSION', '1.0.0' );
define( 'MHCQR_PLUGIN_FILE', __FILE__ );
define( 'MHCQR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MHCQR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/*
|--------------------------------------------------------------------------
| LOAD REQUIRED FILES
|--------------------------------------------------------------------------
*/

require_once MHCQR_PLUGIN_DIR . 'includes/class-mhcqr-assets.php';
require_once MHCQR_PLUGIN_DIR . 'includes/class-mhcqr-shortcode.php';
require_once MHCQR_PLUGIN_DIR . 'includes/class-mhcqr-render.php';
require_once MHCQR_PLUGIN_DIR . 'includes/class-mhcqr-security.php';


/*
|--------------------------------------------------------------------------
| INIT PLUGIN
|--------------------------------------------------------------------------
*/

class MHC_QR_Generator {

    public function __construct() {

        add_action( 'init', [ $this, 'init_plugin' ] );

    }

    public function init_plugin() {

        // Assets
        new MHCQR_Assets();

        // Shortcode
        new MHCQR_Shortcode();

    }

}

new MHC_QR_Generator();