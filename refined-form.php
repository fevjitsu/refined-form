<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              cfeveck.com
 * @since             1.0.0
 * @package           Refined_Form
 *
 * @wordpress-plugin
 * Plugin Name:       refined-form
 * Plugin URI:        refined-form
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Christopher Feveck
 * Author URI:        cfeveck.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       refined-form
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
define( 'REFINED_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-refined-form-activator.php
 */
function activate_refined_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-refined-form-activator.php';
	Refined_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-refined-form-deactivator.php
 */
function deactivate_refined_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-refined-form-deactivator.php';
	Refined_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_refined_form' );
register_deactivation_hook( __FILE__, 'deactivate_refined_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-refined-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_refined_form() {

	$plugin = new Refined_Form();
	$plugin->run();

}
run_refined_form();
