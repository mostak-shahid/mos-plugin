<?php
/**
 * Plugin Name:       Mos Plugin
 * Plugin URI:        http://www.mdmostakshahid.com/
 * Description:       Base of future plugin
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Mostak Shahid
 * Author URI:        http://www.mdmostakshahid.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        http://www.mdmostakshahid.com/
 * Text Domain:       mos-form-pdf
 * Domain Path:       /languages
**/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define MOS_PLUGIN_FILE.
if ( ! defined( 'MOS_PLUGIN_FILE' ) ) {
	define( 'MOS_PLUGIN_FILE', __FILE__ );
}
// Define MOS_PLUGIN_SETTINGS.
if ( ! defined( 'MOS_PLUGIN_SETTINGS' ) ) {
  //define( 'MOS_PLUGIN_SETTINGS', admin_url('/edit.php?post_type=post_type&page=plugin_settings') );
	define( 'MOS_PLUGIN_SETTINGS', admin_url('/options-general.php?page=mos_plugin_settings') );
}
$mos_plugin_options = get_option( 'mos_plugin_options' );
$plugin = plugin_basename(MOS_PLUGIN_FILE); 
require_once ( plugin_dir_path( MOS_PLUGIN_FILE ) . 'mos-plugin-functions.php' );
require_once ( plugin_dir_path( MOS_PLUGIN_FILE ) . 'mos-plugin-settings.php' );
//require_once ( plugin_dir_path( MOS_PLUGIN_FILE ) . 'custom-settings.php' );

require_once('plugins/update/plugin-update-checker.php');
$pluginInit = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/mostak-shahid/update/master/mos-plugin.json',
	MOS_PLUGIN_FILE,
	'mos-plugin'
);


register_activation_hook(MOS_PLUGIN_FILE, 'mos_plugin_activate');
add_action('admin_init', 'mos_plugin_redirect');
 
function mos_plugin_activate() {
    $mos_plugin_option = array();
    // $mos_plugin_option['mos_login_type'] = 'basic';
    // update_option( 'mos_plugin_option', $mos_plugin_option, false );
    add_option('mos_plugin_do_activation_redirect', true);
}
 
function mos_plugin_redirect() {
    if (get_option('mos_plugin_do_activation_redirect', false)) {
        delete_option('mos_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi'])){
            wp_safe_redirect(MOS_PLUGIN_SETTINGS);
        }
    }
}

// Add settings link on plugin page
function mos_plugin_settings_link($links) { 
  $settings_link = '<a href="'.MOS_PLUGIN_SETTINGS.'">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
} 
add_filter("plugin_action_links_$plugin", 'mos_plugin_settings_link' );



