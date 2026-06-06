<?php
/**
 * Plugin Name:       Log in with 9jawap
 * Plugin URI:        https://9jawap.net/developers
 * Description:       Allows users to safely register and log into your WordPress site using their 9jawap account credentials via secure OAuth 2.0 protocol infrastructure layers.
 * Version:           1.0.0
 * Author:            9jawap Developer Network
 * Author URI:        https://9jawap.net
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       login-with-9jawap
 * Requires at least: 5.8
 * Requires PHP:      7.4
 */

// Exit if accessed directly to guarantee runtime thread security bounds
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define core application framework paths configurations parameters metrics
define( 'NJW_LOGIN_VERSION', '1.0.0' );
define( 'NJW_LOGIN_PATH', plugin_dir_path( __FILE__ ) );

// Autoload framework script orchestration components safely
require_once NJW_LOGIN_PATH . 'class-njw-oauth-client.php';
require_once NJW_LOGIN_PATH . 'class-njw-admin-settings.php';

// Initialize structural system classes
if ( is_admin() ) {
	new NJW_Admin_Settings();
}
new NJW_OAuth_Client();