<?php

/**
 * Fired during plugin activation
 *
 * @link       domain.com
 * @since      1.0.0
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/includes
 * @author     Cesar <jcwpplugins@gmail.com>
 */
class Wc_Ajax_Search_Jc_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE wcjc_ajax_search_shorcode (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            wcjc_title text NOT NULL,
            wcjc_placeholder text NOT NULL,
            wcjc_addtocartlabel text NOT NULL,
            wcjc_limitresult numeric NOT NULL,
            wcjc_search_title boolean NOT NULL,
            wcjc_search_category boolean NOT NULL,
            wcjc_search_tag boolean NOT NULL,
            wcjc_search_content boolean NOT NULL,
            wcjc_display_image boolean NOT NULL,
            wcjc_display_image_link boolean NOT NULL,
            wcjc_display_price boolean NOT NULL,
            wcjc_display_quantity boolean NOT NULL,
            wcjc_display_addtocart boolean NOT NULL,
            wcjc_style_setting longtext NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
	}
}