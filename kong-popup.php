<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.capitalnumbers.com/
 * @since             1.0.0
 * @package           Kong_Popup
 *
 * @wordpress-plugin
 * Plugin Name:       Kong Popup
 * Plugin URI:        http://3.134.153.89/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            CN
 * Author URI:        https://www.capitalnumbers.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kong-popup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'KONG_POPUP_VERSION', '1.0.0' );
define( 'PLUGIN_BASE_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_BASE_DIR', plugin_dir_path( __FILE__ ) );
define( 'POPUP_BASE', home_url( '/' ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kong-popup-activator.php
 */
function activate_kong_popup() {
	require_once PLUGIN_BASE_DIR . 'includes/class-kong-popup-activator.php';
	Kong_Popup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kong-popup-deactivator.php
 */
function deactivate_kong_popup() {
	require_once PLUGIN_BASE_DIR . 'includes/class-kong-popup-deactivator.php';
	Kong_Popup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kong_popup' );
register_deactivation_hook( __FILE__, 'deactivate_kong_popup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require PLUGIN_BASE_DIR . 'includes/class-kong-popup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kong_popup() {

	$plugin = new Kong_Popup();
	$plugin->run();

}
run_kong_popup();

function print_data( $data, $type = '' ) {
	echo "<pre style='background-color: #eee; font-size: 14px; font-weight: bold;'>";
	if ( $type == true ) {
        var_dump( $data );
    } else {
        print_r( $data );
    }
	echo "</pre>";
}