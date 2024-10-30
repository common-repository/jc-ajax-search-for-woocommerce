<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       domain.com
 * @since      1.0.0
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/includes
 * @author     Cesar <jcwpplugins@gmail.com>
 */
class Wc_Ajax_Search_Jc_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'jc-ajax-search-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
