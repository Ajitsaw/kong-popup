<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.capitalnumbers.com/
 * @since      1.0.0
 *
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 * @author     CN <https://www.capitalnumbers.com/>
 */
class Kong_Popup_i18n 
{

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() 
	{
		load_plugin_textdomain(
			'kong-popup',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
