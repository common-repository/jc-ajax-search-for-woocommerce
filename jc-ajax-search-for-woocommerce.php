<?php

/**
 * Plugin Name: JC Ajax Search for WooCommerce (Premium)
 * Plugin URI:        https://jcwpplugins.com/jc-ajax-search-for-woocommerce/
 * Description:       JC Ajax Search for WooCommerce allows you to create search forms with different settings to search for products without refreshing the page
 * Version:           1.0.3
 * Author:            JcwpPlugins
 * Author URI:        https://jcwpplugins.com/author/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jc-ajax-search-for-woocommerce
 * Domain Path:       /languages
 * 
 * @package           Wc_Ajax_Search_Jc
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WC_AJAX_SEARCH_JC_VERSION', '1.0.3' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wc-ajax-search-jc-activator.php
 */
function activate_wc_ajax_search_jc()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-ajax-search-jc-activator.php';
    Wc_Ajax_Search_Jc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wc-ajax-search-jc-deactivator.php
 */
function deactivate_wc_ajax_search_jc()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-ajax-search-jc-deactivator.php';
    Wc_Ajax_Search_Jc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_ajax_search_jc' );
register_deactivation_hook( __FILE__, 'deactivate_wc_ajax_search_jc' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-ajax-search-jc.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_ajax_search_jc()
{
    $plugin = new Wc_Ajax_Search_Jc();
    $plugin->run();
}

run_wc_ajax_search_jc();