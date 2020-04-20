<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.capitalnumbers.com/
 * @since      1.0.0
 *
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 * @author     CN <https://www.capitalnumbers.com/>
 */
class Kong_Popup_Activator 
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() 
	{
		global $wpdb;

		$sql = [];

		$table_for_kong_popup_analytics = $wpdb->prefix . "kong_popup_analytics";
		$table_for_kong_popup_click_targets = $wpdb->prefix . "kong_popup_click_targets";
		$table_for_kong_popup_content_structures = $wpdb->prefix . "kong_popup_content_structures";
		$kong_popup_analytics_db_version = '1.0.0';
		$charset_collate = $wpdb->get_charset_collate();

		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_for_kong_popup_analytics}'" ) != $table_for_kong_popup_analytics ) {
			$sql[] = "
				CREATE TABLE $table_for_kong_popup_analytics (
					`ID` bigint(20) NOT NULL AUTO_INCREMENT,
					`popup_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
					`data` longtext NULL,
					`template` varchar(255) NULL,
		            `created_at` date NOT NULL DEFAULT '0000-00-00',
					PRIMARY KEY (ID)
				) 
				$charset_collate;
			";
		}

		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_for_kong_popup_click_targets}'" ) != $table_for_kong_popup_click_targets ) {
			$sql[] = "
				CREATE TABLE $table_for_kong_popup_click_targets (
					`ID` bigint(20) NOT NULL AUTO_INCREMENT,
					`popup_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
					`target` varchar(255) NULL,
					`template` varchar(255) NULL,
		            `created_at` date NOT NULL DEFAULT '0000-00-00',
					PRIMARY KEY (ID)
				) 
				$charset_collate;
			";
		}

		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_for_kong_popup_content_structures}'" ) != $table_for_kong_popup_content_structures ) {
			$sql[] = "
				CREATE TABLE $table_for_kong_popup_content_structures (
					`ID` bigint(20) NOT NULL AUTO_INCREMENT,
					`popup_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
					`structures` longtext NULL,
		            `created_at` date NOT NULL DEFAULT '0000-00-00',
					PRIMARY KEY (ID)
				) 
				$charset_collate;
			";
		}

	    if ( ! empty( $sql ) ) {
	        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	        dbDelta( $sql );
		    add_option( 'kong_popup_analytics_db_version', $kong_popup_analytics_db_version );
	    }
	}

}
