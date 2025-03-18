<?php
/**
 * Plugin Name: Mori Core
 * Plugin URI: https://webrito.com
 * Description: A Core Plugin Of Mori WP Theme.
 * Version: 1.0.0
 * Author: Webrito LLC
 * Author URI: https://webrito.com
 * Text Domain: mori
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MORI_VERSION', '1.0.0' );
define( 'MORI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MORI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue custom CSS and JS
function MORI_enqueue_assets() {
    wp_enqueue_style( 'mori-custom-style', plugin_dir_url( __FILE__ ) . 'assets/css/mori.css', array(), MORI_VERSION );
    wp_enqueue_script( 'mori-tilt-js', 'https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js', array('jquery'), '1.2.1', true );
    wp_enqueue_script( 'mori-custom-script', plugin_dir_url( __FILE__ ) . 'assets/js/mori-core.js', array('jquery'), MORI_VERSION, true );

    // Adding custom JS to handle state population based on country selection
    wp_enqueue_script( 'mori-custom-ajax-script', plugin_dir_url( __FILE__ ) . 'assets/js/mori-ajax.js', array('jquery'), MORI_VERSION, true );
    wp_localize_script( 'mori-custom-ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'MORI_ONCE_ACTION_SECURITY' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'MORI_enqueue_assets' );

// Include required files.
//require_once MORI_PLUGIN_DIR . 'includes/class-api.php';

function mori_framework_init_check() {
    if( !class_exists( 'CSF' ) ) {
        require_once MORI_PLUGIN_DIR .'includes/codestar-framework/codestar-framework.php';
        require_once MORI_PLUGIN_DIR .'includes/options/customizer.php';
    }
    require_once MORI_PLUGIN_DIR .'includes/block-init.php';
    require_once MORI_PLUGIN_DIR .'vendor/admin.php';
}

add_action( 'plugins_loaded', 'mori_framework_init_check' );